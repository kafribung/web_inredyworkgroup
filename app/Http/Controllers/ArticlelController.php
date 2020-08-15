<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import Class Str
use Illuminate\Support\Str;

// Import Class ArticleRequest
use App\Http\Requests\ArticleRequest;

// Import DB Article
use App\Models\Article;

class ArticlelController extends Controller
{
    // READ
    public function index()
    {
        $articles = Article::latest()->get();
        return view('dashboard.article', compact('articles'));
    }

    // CREATE
    public function create()
    {
        return view('dashboard_create.article_create');
    }

    // STORE
    public function store(ArticleRequest $request)
    {
        $data = $request->all();

        if ($request->has('img')) {
            $img = $request->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('img_articles'), $name);

            $data['img'] = $name;
        }

        $data['slug'] = Str::slug($request->title);

        $request->user()->articles()->create($data);

        return redirect('/article')->with('msg', 'Data Artikel Berhasil ditambahkan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    //
    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->first();

        return view('dashboard_edit.article_edit', compact('article'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:200'],
            'img'   => ['mimes:png,jpg,jpeg'],
            'description' => ['required']
        ]);

        if ($request->has('img')) {
            $img = $request->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('img_articles'), $name);

            $data['img'] = $name;
        }

        $data['slug'] = Str::slug($request->title);

        Article::findOrFail($id)->update($data);

        return redirect('/article')->with('msg', 'Data Artikel Berhasil di update');
    }

    // DELETE
    public function destroy($id)
    {
        Article::destroy($id);

        return redirect('/article', ['msg' => 'Data Artikel Berhasil ditambahkan']);
    }
}
