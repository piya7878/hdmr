@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')
<div class="profile-wrap text-center">
      @if ($user->image)
        <p>
          <!--- ユーザーが画像を投稿していた場合 --->
          <img class="round-img" src="data:image/png;base64,{{ $user->image }}"/>
        </p>
        @else
        <!--- ユーザーが画像を投稿していない場合 --->
          <img class="round-img" src="{{ asset('/images/blank_profile.png') }}"/>
      @endif
        <h1>{{ $user->name }}</h1>
        <!--- 現在サインインしているユーザーと詳細画面のユーザーIDとが一致した場合 --->
        @if ($user->id == Auth::user()->id)
          <a class="btn btn-outline-dark common-btn edit-profile-btn" href="/users/edit">プロフィールを編集</a>
          <a class="btn btn-outline-dark common-btn edit-profile-btn" rel="nofollow" data-method="post" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
          <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">{{ csrf_field() }}</form>
        @endif
      </div>
@endsection