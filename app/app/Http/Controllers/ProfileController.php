<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showUserProfile($id)
    {
        $user_data = Income::where('user_id', $id)->get();
        return view('profiles.profile');
    }

    public function showProfileCustom($id)
    {
        return view('profiles.profile_custom');
    }
}
