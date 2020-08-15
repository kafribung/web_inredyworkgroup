<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import Class Str
use Illuminate\Support\Str;
// Import Class ArticleRequest
use App\Http\Requests\ArticleRequest;
// Import DB Article
use App\Models\Article;
use Illuminate\Support\Facades\File;

class ArticlelController extends Controller
{
    // READ
    public function index()
    {
        $seacrh = urldecode(request('search'));
        if ($seacrh) {
            $articles = Article::orderBy('id', 'DESC')->where('title', 'like', '%' . $seacrh . '%')->get();
        } else
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
        $data['slug']   = Str::slug($request->title);
        $data['status'] = 1;
        $request->user()->articles()->create($data);
        return redirect('/article')->with('msg', 'Data Artikel Berhasil ditambahkan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
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
            'description' => ['required', 'min:5']
        ]);
        $article = Article::findOrFail($id);
        if ($request->has('img')) {
            $img = $request->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            if ($article->img != 'default_article.png') {
                File::delete('img_articles/' . $article->img);
            }
            $img->move(public_path('img_articles'), $name);
            $data['img'] = $name;
        }
        if ($article->title != null) {
            $data['title'] = $request->title . '-' . time();
        }
        $data['slug'] = Str::slug($request->title);
        $article->update($data);
        return redirect('/article')->with('msg', 'Data Artikel Berhasil di update');
    }

    // DELETE
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if ($article->img != 'default_article.png') {
            File::delete('img_articles/' . $article->img);
        }
        Article::destroy($id);
        return redirect()->back()->with('msg', 'Data Artikel Berhasil di update');
    }

    // Active
    public function active(Article $article)
    {
        Article::findOrFail($article->id)->update([
            'status' => 1,
        ]);
        return redirect()->back()->with('msg', 'Data Artikel Berhasil diapprove');
    }

    // Panding
    public function panding(Article $article)
    {
        $article  = Article::findOrFail($article->id);
        $article->status = 0;
        $article->save();
        return redirect()->back()->with('msg', 'Data Artikel Berhasil diunapprove');
    }
}
