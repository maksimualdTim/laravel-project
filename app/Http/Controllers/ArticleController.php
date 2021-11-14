<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
   public function index(){
        $article= Article::latest()->get();
        return view('main', ['letters' =>$article]);
   }

    public function create(){
       return view('articles.create');
        return redirect('/main')->with('msg', 'Новость создана!');
    }
}
