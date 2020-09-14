@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
        @include('users.card')
            
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                {{-- ユーザ詳細タブ --}}
                <li class="nav-item">
                    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
                        TimeLine
                        <span class="badge badge-secondary">{{ $user->microposts_count }}</span>
                    </a>
                </li>
                {{-- フォロー一覧タブ --}}
                <li class="nav-item">
                    <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
                        Followings
                        <span class="badge badge-secondary">{{ $user->followings_count }}</span>
                    </a>
                </li>
                {{-- フォロワー一覧タブ --}}
                <li class="nav-item">
                    <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
                        Followers
                        <span class="badge badge-secondary">{{ $user->followers_count }}</span>
                    </a>
                </li>
                {{-- お気に入りー一覧タブ --}}
                <li class="nav-item">
                    <a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.favorites') ? 'active' : '' }}">
                        Favorite
                        <span class="badge badge-secondary">{{ $user->favorites_count }}</span>
                    </a>
                </li>

            </ul>
            
            @if (Auth::id() == $user->id)
                {{-- 投稿フォーム --}}
                @include('microposts.form')
            @endif
            {{-- 投稿一覧 --}}
            @include('microposts.microposts')
            
             
        </div>
    </div>
@endsection