<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // 以下が課題5の回答
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request) // 13の課題で追記
    {
        return redirect('admin/profile/create');
    }
    
    // 以下を13で追記
    // public function create(Request $request)
    // {
        // admin/news/createにリダイレクトする
    //     return redirect('admin/news/create');
    // }
    
    public function edit()
    {
        return view('admin.profile.edit');
    }
    
    public function update(Request $request) // 13の課題で追記
    {
        return redirect('admin/profile/edit');
    }
}
