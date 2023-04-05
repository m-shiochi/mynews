@extends('layouts.admin')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form row">
                        <label class="col-md-2">お名前</label>
                        <label class="col-md-1">氏</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="familyname" value="{{ $profile_form->familyname }}" placeholder="Last name">
                        </div>
                        <label class="col-md-1">名</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}" placeholder="First name">
                        </div>
                    </div>
                    <div class="form row">
                        <label class="col-md-2">性別</label>
                        {{-- <div class="col-2">
                            <input class="form-check-input" type="radio" name="gender" value="男性" {{ $profile_form->gender == '男性' ? 'checked' : '' }} id="check1">
                            <input class="form-check-input" type="radio" name="gender" value="男性" id="check1">
                            <label class="form-check-label" for="check1">男性</label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="gender" value="女性" {{ $profile_form->gender == '女性' ? 'checked' : '' }} id="check2">
                            <input class="form-check-input" type="radio" name="gender" value="女性" id="check2">
                            <label class="form-check-label" for="check2">女性</label>
                        </div>
                        <div class="col-6">
                            <input class="form-check-input" type="radio" name="gender" value="どちらでもない" {{ $profile_form->gender == 'どちらでもない' ? 'checked' : '' }} id="check3">
                            <input class="form-check-input" type="radio" name="gender" value="どちらでもない" id="check3">
                            <label class="form-check-label" for="check3">どちらでもない</label>
                        </div>　--}}
                        <div class="col-2">
                        <label><input type="radio" name="gender" value="男性" {{ $profile_form->gender == '男性' ? 'checked' : '' }}>男性</label>
                        </div>
                        <div class="col-2">
                        <label><input type="radio" name="gender" value="女性" {{ $profile_form->gender == '女性' ? 'checked' : '' }}>女性</label>
                        </div>
                        <div class="col-6">
                        <label><input type="radio" name="gender" value="どちらでもない" {{ $profile_form->gender == 'どちらでもない' ? 'checked' : '' }}>どちらでもない</label>                             
                        </div>
                    </div>
                        {{-- <label class="col-md-2" for="gender">性別</label>
                        @if($profile_form->gender == 'male' )
                            <label><input type="radio" class="radio" name="gender" value="male" checked>男性</label>
                            <label><input type="radio" class="radio" name="gender" value="female">女性</label>
                            <label><input type="radio" name="gender" value="男性" {{ $profile_form->gender == '男性' ? 'checked' : '' }}>男性</label>
                            <label><input type="radio" name="gender" value="女性" {{ $profile_form->gender == '女性' ? 'checked' : '' }}>女性</label>
                            <label><input type="radio" name="gender" value="どちらでもない" {{ $profile_form->gender == 'どちらでもない' ? 'checked' : '' }}>どちらでもない</label>                             
                        @else
                             <label><input type="radio" class="radio" name="gender" value="male">男性</label>
                             <label><input type="radio" class="radio" name="gender" value="female" checked>女性</label>
                        @endif --}}
                    
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="3">{{ $profile_form->hobby }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10" placeholder="introduction">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自分の写真</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection