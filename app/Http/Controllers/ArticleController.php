<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::select('id', 'author_id', 'title', 'created_at', 'category')->get();
        return view('admin.article.listing', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.article.add', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'title_image' => 'required',
            'tags' => 'required',
            'category' => 'required',
            'content' => 'required'
        ]);

        $tmpFile = $_FILES['title_image']['tmp_name'];
        $newFile = 'images/article/' . $_FILES['title_image']['name'];
        $result = move_uploaded_file($tmpFile, $newFile);

        $request = request()->all();
        $slug = Str::of($request['title'])->slug('-');
        $tags = serialize($request['tags']);
        $request['tags'] = $tags;
        $request['title_image'] = $_FILES['title_image']['name'];
        $request['slug'] = $slug;

        Article::create($request);

        return redirect('yn-admin/articles')
            ->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.article.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $article = Article::where('id', $id)->get();
        return view('admin.article.edit', compact('tags', 'categories', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'title_image' => 'required',
            'tags' => 'required',
            'category' => 'required',
            'content' => 'required'
        ]);
        
        $slug = Str::of($request['title'])->slug('-');
        $article = Article::where('id', $id);
        $article->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'tags' => serialize($request['tags']),
            'category' => $request['category'],
            'slug' => $slug,
            'subtitle' => $request['subtitle'],
            'title_image' => $request['title_image'],
            'image_caption' => $request['image_caption'],
            'introduction' => $request['introduction'],
        ]);

        return redirect('yn-article/articles/{$id}')
            ->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
