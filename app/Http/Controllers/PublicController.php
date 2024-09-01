<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PublicController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth', only: ['becomeRevisor'])
        ];
    }
    public function GetHomePage()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(3)->get();
        return view('welcome', compact('articles'));
    }

    public function getRevisorPage()
    {
        return view('becomeRevisor');
    }


    public function searchArticles(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->paginate(9);
        return view('article.searched', ['articles' => $articles, 'query' => $query]);
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
