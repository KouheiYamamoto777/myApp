@extends('app')

@section('title', '記録を残す')

@section('content')
    @include('navs.create')

    <div class="container">
        <h1 
        class="text-center mt-2 h1-responsive"
        >  
            記録をつけましょう
        </h1>
    
        <h2
        class="h2 text-center h2-responsive"
        >
            2020年の記録
        </h1>
    
        <div class="w-75 mx-auto">
            <canvas 
                id="chart"
            >
                canvas not supported...
            </canvas>
        </div>
    
        <div class="my-2 mx-auto w-75">
            <form action="{{ route('records.store') }}" class="range-field my-5" method="post" name="store">
                @csrf

                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                <div class="text-center">
                    <h3 class="h3-responsive">記録日&nbsp;:&nbsp;20
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
        
                @if ($errors->has('income'))
                    <span class="deep-orange-text">{{ $errors->first('income') }}</span>
                @endif
                <div class="md-form mt-0">
                    <label for="income">今月の収入</label>
                    <input type="number" id="income" class="form-control" name="income" value="{{ old('income') }}">
                </div>
                
                @if ($errors->has('outgo'))
                    <span class="deep-orange-text">{{ $errors->first('outgo') }}</span>
                @endif
                <div class="md-form mt-0">
                    <label for="outgo">今月のクレジットカードの使用額</label>
                    <input type="number" id="outgo" class="form-control" name="outgo" value="{{ old('outgo') }}">
                </div>
    
                @if ($errors->has('title'))
                    <span class="deep-orange-text">{{ $errors->first('title') }}</span>
                @endif
                <div class="md-form mb-2">
                    <label for="title">タイトル(20文字以内.省略可)</label>
                    <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}">
                </div>
        
                @if ($errors->has('comment'))
                    <span class="deep-orange-text">{{ $errors->first('comment') }}</span>
                @endif
                <div class="md-form">
                    <textarea id="form7" class="md-textarea form-control mt-3" rows="3" name="comment">{{ old('comment') }}</textarea>
                    <label for="form7">コメントを残す(120文字以内.省略可)</label>
                </div>
                
                <div class="custom-control custom-checkbox text-center">
                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember" name="published" value="0">
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
