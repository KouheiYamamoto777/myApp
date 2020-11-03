<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showUserProfile($id)
    {
        return view('profiles.profile');
    }

    public function showProfileCustom($id)
    {
        return view('profiles.profile_custom');
    }
}
