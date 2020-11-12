@extends('app')

@section('title')
    {{ Auth::user()->name }}さんのプロフィール
@endsection

@section('content')
    @include('navs.profile')

    <div class="container text-center">
        <h1>ユーザープロフィール表示画面</h1>
        {{-- @if () --}}
            <p>ようこそ,{{ Auth::user()->name }}さん</p>
        {{-- @endif --}}

        <canvas id="chart" style="max-width: 800px;">
            canvas not supported...
        </canvas>
    </div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css"></script>
    <script>
        (function() {
            'use strict';

            var type = 'bar';
            var data = {
                labels: [4, 5, 6, 7, 8, 9, 10, 11, 12, 1, 2, 3],
                datasets: [
                        {
                            type: 'line',
                            data: [30000, 20000, 23000, 30000, 18000, 19400, 35000, 17300, 40000, 29000, 27000, 21000],
                            borderColor: 'hsla(0, 60%, 60%, 0.8)',
                            borderWidth: 3,
                            fill: false,
                        },
                        {
                            label: 'Yuki',
                            data: [100000, 203000, 130000, 260000, 154000, 182000, 134000, 132000, 145000, 136000, 201000, 108000],
                            backgroundColor: 'hsla(210, 60%, 60%, 0.6)',
                            borderWidth: 0,
                        },
                    ],
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
                                return value + '月';
                            }
                        }
                    }]
                },
                legend: {
                    position: false,
                },
            };
            var ctx = document.getElementById('chart').getContext('2d');

            var chart = new Chart(ctx, {
                type: type,
                data: data,
                options: options,
            });
        })();
    </script>
@endsection
