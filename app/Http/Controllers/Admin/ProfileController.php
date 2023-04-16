<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 以下の1行を追記(14課題で追記)することで、News Modelが扱えるようになる
use App\Models\Profile;

// 以下、１７の課題で追記
use App\Models\ProfileHistory;

use Carbon\Carbon;


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
    
    public function edit(Request $request)
    {
         // News modelからデータを取得する
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request) // 13の課題で追記
    {
        // Validaionをかける
        $this->validate($request, Profile::$rules);
        // Profile Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        
        if ($request->remove == 'true') {
            $profile_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $profile_form['image_path'] = basename($path);
        } else {
            $profile_form['image_path'] = $profile->image_path;
        }
        
        unset($profile_form['image']);
        unset($profile_form['remove']);
        unset($profile_form['_token']);
        
        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        
        // 以下を17の課題で追記
        $history = new ProfileHistory();
        $history->profilehistory_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/profile/edit?id=1');
    }
}
