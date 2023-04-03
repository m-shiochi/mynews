<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 以下の1行を追記(14課題で追記)することで、News Modelが扱えるようになる
use App\Models\Profile;

class ProfileController extends Controller
{
    // 以下が課題5の回答
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request) // 13の課題で追記
    {
        // 以下を14の課題で追記
        // Validationを行う
        $this->validate($request, Profile::$rules);

        $profiles = new Profile;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profiles->image_path = basename($path);
        } else {
            $profiles->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $profiles->fill($form);
        $profiles->save();
        
        
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
