<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;

Route::get('/',[PublicController::class,'GetHomePage'])->name('HomePage');
Route::get('/becomerevisor', [PublicController::class, 'getRevisorPage'])->name('GetRevisorPage');
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');

Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');

Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');

Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::post('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');


Route::get('/last-check/cancel', [RevisorController::class, 'uncheckLastArticle'])->middleware('isRevisor')->name('UncheckLastArticle');

Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');
