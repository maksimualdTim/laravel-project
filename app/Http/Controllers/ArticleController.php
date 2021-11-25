<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\ArticleComment;

class ArticleController extends Controller
{
    public function index(){
        $articles = Articles::paginate(2);

        return view('articles.index',['articles'=> $articles]);
    }

    public function create(){
        return view('articles.create');
    }

    public function store(){
        $article = new Articles();
        $article->name = request('name');
        $article->short_text = request('description');
        $article->data_create = request('date');
        $article->save();

        return redirect('articles');
    }

    public function view($id){
        $article = Articles::findOrFail($id);
        $comment = ArticleComment::where('article_id', $id)->paginate(2);
        return view('articles.view',['article'=>$article, 'comments'=>$comment]);
    }
}
