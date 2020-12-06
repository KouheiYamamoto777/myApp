<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>テスト</title>
    <style>
        [v-cloak] {
            display: none;
        }
    </style>
</head>
<body>

    <div id="app">
        <canvas-component
            :user-id="1"
            :year="20"
        ></canvas-component>
    </div>
    
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

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
