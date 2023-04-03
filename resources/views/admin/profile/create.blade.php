{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- profile.blade.phpの@yield('title')に'プロフィール'を埋め込む --}}
@section('title', 'プロフィール')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>My Profile</h2>
                {{-- 13の課題で追記 --}}
                <form action="{{ route('admin.profile.create') }}" method="post" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="family-name" value="{{ old('family-name') }}" placeholder="Last name">
                        </div>
                        <label class="col-md-1">名</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="First name">
                        </div>
                    </div>
                    <div class="form row">
                        <label class="col-md-2">性別</label>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="gender" value="男性" id="check1">
                            <label class="form-check-label" for="check1">男性</label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="gender" value="女性" id="check2">
                            <label class="form-check-label" for="check2">女性</label>
                        </div>
                        <div class="col-6">
                            <input class="form-check-input" type="radio" name="gender" value="どちらでもない" id="check3">
                            <label class="form-check-label" for="check3">どちらでもない</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="3">{{ old('hobby') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10" placeholder="introduction">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自分の写真</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
                {{-- ここまで --}}
            </div>
        </div>
    </div>
@endsection
