<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Income;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        return view('income');
    }

    // public function getJson()
    // {
    //     return Income::all();
    // }
}
