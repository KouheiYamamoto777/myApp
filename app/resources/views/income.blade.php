<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>テスト</title>
</head>
<body>

    <div id="app">
        {{-- <div v-if="errorStatus">
            The data could not be loaded...
        </div>
        <div>
            <div v-if="loadingStatus">
                Loading...
            </div>
            <div v-else> --}}
                <canvas id="myChart" style="width: 600px;">
                    canvas not supported...
                </canvas>
            {{-- </div>
            <ul>
                <li v-for="personData in userData">@{{ personData }}</li>
            </ul>
        </div> --}}

        <pre>@{{ $data }}</pre>
    </div>
    
    @include('script_vue')
    
</body>
</html>
