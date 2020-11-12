@extends('app')

@section('title')
    {{ Auth::user()->name }}さんのプロフィール
@endsection

@section('content')
    @include('navs.profile')

    <h1>ユーザープロフィール表示画面</h1>
    {{-- @if () --}}
        <p>ようこそ,{{ Auth::user()->name }}さん</p>
    {{-- @endif --}}

    <canvas id="chart">
        canvas not supported...
    </canvas>

@endsection

@section('script')
    <script>
        (function() {
            'use strict';

            var type;
            var data;
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
