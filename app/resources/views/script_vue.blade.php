

<script>
    (() => {
        'use strict';
        
        var vm = new Vue({
            el: '#app',
            data: {
                test: '',
                userData: [],
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
                            this.userData = response.data.data.user.dataForYear
    
                            this.incomeData = this.userData.map(data => data.income)
    
                            this.drawCanvas()

                            
                        }.bind(this))
                        .catch(function(error) {
                            console.log(error)
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

    })();

</script>
