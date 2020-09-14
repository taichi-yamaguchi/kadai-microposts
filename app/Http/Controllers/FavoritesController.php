<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller 
{   
    
    public function index()
    {
    $users = User::orderBy('id', 'desc')->paginate(10);
    
    return view('users.index',['users' => $users
    
    ]);

    }
   public function store($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザの投稿をお気に入りする
        \Auth::user()->favorite($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function destroy($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザの投稿のお気に入りを外す
        \Auth::user()->unfavorite($id);
        // 前のURLへリダイレクトさせる
        return back();
    }

}
