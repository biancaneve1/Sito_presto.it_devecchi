<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index(){
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }

    public function uncheckLastArticle () {
        $lastchecked = Article::where('is_accepted','!=',NULL)->orderBy('updated_at','desc')->take(1)->get();
        $lastCheckedArticle = $lastchecked[0];
        $lastCheckedArticle->setAccepted(NULL);
        return redirect()->back()->with('messageCancelLast',"Hai annullatto correttamente l'ultima operazione");
    }

    public function accept(Article $article){
        $article->setAccepted(true);
        return redirect()->back()->with('messageAccepted', "Hai accettato l'articolo $article->title");
    }

    public function reject(Article $article){
        $article->setAccepted(false);
        return redirect()->back()->with('messageRefused', "Hai rifiutato l'articolo $article->title");
    }

    public function becomeRevisor(Request $request){
        $Reason = $request->reason;
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user(),$Reason));
        return redirect()->route('HomePage')->with('messageRevisor','Complimenti hai richiesto di diventare revisor');
    }

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }

}
