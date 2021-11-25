<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleCommentsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('main');
});
Route::get('/articles', [ArticleController::class,'index']);
Route::get('/articles/create', [ArticleController::class,'create']);
Route::get('/articles/{id}', [ArticleController::class,'view']);
Route::post('/articles', [ArticleController::class, 'store']);
Route::post('articles/{id}/comment', [ArticleCommentsController::class, 'store']);

// Route::post('articles/{id}/comment', function ($id){
//     $article = App\Models\Articles::find($id);
//     if ($article){
//         $comment_title = request('comment_title');
//         $comment = request('comment');
//         if ($comment && $comment_title){
//             $new_comment = new App\Models\ArticleComment();
//             $new_comment->title = $comment_title;
//             $new_comment->comment = $comment;
//             $new_comment->article()->associate($article);
//             $new_comment->save();
//             return redirect('articles/'.$id);
//         }
//     }
// });

Route::get('/about', function () {
    $contact=[
        'adres'=>'Большая семеновская',
        'tel'=>'8(495)232-2323',
        'email'=>'@mospolitech.ru'
    ];

    return view('about',['contact' => $contact]);
});