<template>
    <div>
        <div v-show="errorStatus">
            The data could not be loaded...
        </div>
        <div v-show="errorStatus === false">
            <div v-show="loadingStatus">
                Loading...
            </div>
            <div v-show="loadingStatus === false">
                <canvas id="myChart" style="width: 600px;" v-cloak>
                    Your browser does not support the canvas element...
                </canvas>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            userData: [],
            incomeData: [],
            errorStatus: false,
            loadingStatus: false,
        }
    },
    props: {
        userId: {
            type: Number,
        },
        year: {
            type: Number,
        }
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
                        borderColor: 'hsla(0, 60%, 60%, 0.8)',
                        backgroundColor: 'hsla(210, 60%, 60%, 0.6)',
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
                        xAxes: [{
                            ticks: {
                                callback: function(value) {
                                    return value + '月'
                                }
                            }
                        }]
                    },
                    legend: {
                        position: false,
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
}
</script>
