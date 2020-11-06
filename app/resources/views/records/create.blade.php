@extends('app')

@section('title', '記録を残す')

@section('content')
    @include('navs.create')

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

    <canvas id="chart">
        canvas not supported...
    </canvas>

    <div class="my-2 mx-4">
        <form action="" class="range-field my-5">
            <div class="text-center">
                <h3>記録日 : 20
                    <select name="" id="" class="mdb-select md-form">
                        <option value="0" selected>20</option>
                        <option value="1">21</option>
                        <option value="2">22</option>
                    </select>
                    年-
                    <select name="" id="" class="mdb-select md-form">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    月</h3>
            </div>
    
            <div class="md-form mt-0">
                <label for="income">今月の収入</label>
                <input type="number" id="income" class="form-control" name="income">
            </div>
            
            <div class="md-form mt-0">
                <label for="outgo">今月のクレジットカードの使用額</label>
                <input type="number" id="outgo" class="form-control" name="outgo">
            </div>

            <div class="md-form">
                <label for="title">タイトル</label>
                <input type="text" id="title" class="form-control" name="title">
            </div>
    
            <div class="md-form mt-1">
                <label for="text_area">コメントを残す</label>
                <textarea name="comment" id="text_area"  rows="3" class="md-textarea form-control"></textarea>
            </div>
            
            <div class="custom-control custom-checkbox text-center">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">タイムラインに投稿しない</label>
            </div>
        </form>
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
                    data: [100, 203, 130, 260, 154, 182, 134, 132, 145, 136, 201, 108],
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
