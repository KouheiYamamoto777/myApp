{{-- Vue.js --}}
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
{{-- axios --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
{{-- vue-chartjs --}}
<script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>
{{-- lodash --}}
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
{{-- Chart.js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

<script>
    var vm = new Vue({
        el: '#app',
        data: {
            incomeData: [], 
            userId: 1,
            year: 20,
            errorStatus: false,
            loadingStatus: true,
        },
        methods: {
            getIncomes() {
                const dataGetQuery = {
                    query:
                        `{
                            user(id: ${this.userId}) {
                                dataForYear(year: ${this.year}) {
                                    month
                                    income
                                }
                            }
                        }`
                }
                axios.post('/graphql', dataGetQuery)
                    .then(function(response) {
                        const userData = response.data.data.user.dataForYear

                        this.incomeData = userData.map(data => data.income)
                        this.labelsMonth = userData.map(data => data.month)

                        this.drawCanvas()
                    }.bind(this))
                    .catch(function(error) {
                        this.errorStatus = true
                    }.bind(this))
                    .finally(function() {
                        this.loadingStatus = false
                    }.bind(this))
            },
            drawCanvas() {
            
                var ctx = document.getElementById('myChart').getContext('2d');
                var type = 'bar';
                var data = {
                    labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                    datasets: [{
                        label: 'Chart',
                        data: this.incomeData,
                    }],
                };
                var options = {
                    scales: {
                        yAxes: [{
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 200000,
                                stepSize: 100000,
                            }
                        }],
                    }
                };

                var myChart = new Chart(ctx, {
                    type: type,
                    data: data, 
                    options: options,
                });
            }
        },
        mounted() {
            this.getIncomes()
        }
    })

</script>
