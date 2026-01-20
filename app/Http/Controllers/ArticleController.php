<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->latest()->get();
        return view('dashboard', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|url',
        ]);

        $article = $request->user()->articles()->create($validated);
        return redirect()->route('articles.show', $article)->with('success', 'Article created successfully.');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        if (Auth::id() !== $article->user_id) abort(403);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        if (Auth::id() !== $article->user_id) abort(403);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|url',
        ]);

        $article->update($validated);
        return redirect()->route('articles.show', $article)->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        if (Auth::id() !== $article->user_id) abort(403);
    
        $article->delete();
        return redirect()->route('home')->with('success', 'Article deleted successfully.');
    }
}