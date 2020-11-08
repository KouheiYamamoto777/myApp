@extends('app')

@section('title', '記録を残す')

@section('content')
    @include('navs.create')

    <div class="container">
        <h1 
        class="text-center mt-2"
        >  
            記録をつけましょう
        </h1>
    
        <h2
        class="h2 text-center"
        >
            2020年の記録
        </h1>
    
        <canvas id="chart" style="max-width: 800px;">
            canvas not supported...
        </canvas>
    
        <div class="my-2 mx-4">
            <form action="{{ route('records.store') }}" class="range-field my-5" method="post" name="store">
                @csrf

                <div class="text-center">
                    <h3>記録日&nbsp;:&nbsp;20
                        <select name="year" id="" class="mdb-select md-form">
                            <option value="20" selected>20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                        </select>
                        年-
                        <select name="month" id="" class="mdb-select md-form">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        月</h3>
                </div>
        
                <div class="md-form mt-0">
                    <label for="income">今月の収入</label>
                    <input type="number" id="income" class="form-control" name="income" value="{{ old('income') }}">
                </div>
                
                <div class="md-form mt-0">
                    <label for="outgo">今月のクレジットカードの使用額</label>
                    <input type="number" id="outgo" class="form-control" name="outgo" value="{{ old('outgo') }}">
                </div>
    
                <div class="md-form">
                    <label for="title">タイトル</label>
                    <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}">
                </div>
        
                <div class="md-form mt-1">
                    <label for="text_area">コメントを残す</label>
                    <textarea name="comment" id="text_area"  rows="3" class="md-textarea form-control">
                        {{ old('comment') }}
                    </textarea>
                </div>
                
                <div class="custom-control custom-checkbox text-center">
                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember" name="done" value="0">
                    <label class="custom-control-label" for="defaultLoginFormRemember">タイムラインに投稿しない</label>
                </div>
                
            </form>
        </div>
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
                datasets: [{
                    label: 'Yuki',
                    data: [100000, 203000, 130000, 260000, 154000, 182000, 134000, 132000, 145000, 136000, 201000, 108000],
                    backgroundColor: 'hsla(210, 60%, 60%, 0.6)',
                    borderWidth: 0,
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
