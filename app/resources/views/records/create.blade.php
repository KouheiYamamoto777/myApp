@extends('app')

@section('title', '記録を残す')

@section('content')
    @include('navs.create')

    <h1 class="text-center mt-2">{{ Auth::user()->name }}'s Record.</h1>
    <h1 class="h2 text-center">2020年の記録</h1>
    <canvas id="chart">
        canvad not supported...
    </canvas>

    <p>記録フォーム</p>
    <form action="">
        <input type="text">

    </form>

    
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css"></script>
    <script>
        (function() {
            'use strict';

            var type = 'line';
            var data = {
                labels: [4, 5, 6, 7, 8, 9, 10, 11, 12, 1, 2, 3],
                datasets: [{
                    label: 'kouhei',
                    data: [100, 203, 130, 460],
                }],
            };

            var options;
            var ctx = document.getElementById('chart').getContext('2d');

            var chart = new Chart(ctx, {
                type: type,
                data: data,
                options: options,
            });
        })();
    </script>
@endsection
