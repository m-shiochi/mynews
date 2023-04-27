<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 追記
use App\Models\Profile;

class ProfileController extends Controller
{
    
    public function index(Request $request)
    {
        $posts = Profile::all()->sortBy('familyname');
        
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('profile.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
