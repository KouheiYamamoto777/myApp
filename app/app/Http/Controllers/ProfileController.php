<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Income;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showUserProfile($id)
    {
        $user = User::find($id);
        return view('profiles.profile')->with(['user' => $user]);
    }

    public function showProfileCustom($id)
    {
        return view('profiles.profile_custom');
    }
}
