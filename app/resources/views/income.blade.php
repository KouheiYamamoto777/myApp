<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div id="app">
        <table></table>
    </div>
    

    {{-- Vue.js --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    {{-- axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    {{-- Chart.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    {{-- vue-chartjs (Chart.jsのラッパー) --}}
    <script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>
    {{-- lodash --}}
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
    <script>

        
        
        var vm = new Vue({
            el: '#app',
            data: {
                incomes: [],
                userId: 1,
                year: 20,
            },
            methods: {
                getIncomes() {
                    const params = {
                        query:
                            `{
                                user(id: ${this.userId}) {
                                    income(year: ${this.year}) {
                                        month
                                        income
                                    }
                                }
                            }`
                    }
                    axios.post('/graphql', params)
                        .then(response => {
                            // user_idが1のユーザーの
                            // 2020年のデータをプロパティincomesに代入
                            this.incomes = response.data.data.user.income
                        })
                        .catch(error => {
                            console.log(error)
                        })
                }
            },
            mounted() {
                this.getIncomes()
            }
        })

    </script>
</body>
</html>
