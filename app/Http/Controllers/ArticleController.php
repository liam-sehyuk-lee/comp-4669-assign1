<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
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

        $request->user()->articles()->create($validated);
        return redirect()->route('home')->with('success', 'Article created successfully.');
    }
}