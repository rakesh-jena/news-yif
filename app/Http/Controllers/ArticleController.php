<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::select('id', 'status','title_image', 'views', 'author_id', 'title', 'created_at', 'category', 'slug')->where('status', 'approved')->orWhere('status', 'processing')->orderBy('created_at', 'desc')->get();
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
            'content' => 'required',
            'wordcount' => 'required'
        ]);

        $read_time = round((int)$request['wordcount']/200);
        if($read_time < 1) {
            $read_time = 1;
        }

        $tmpFile = $_FILES['title_image']['tmp_name'];
        $newFile = 'images/article/' . $_FILES['title_image']['name'];
        $result = move_uploaded_file($tmpFile, $newFile);

        $request = request()->all();
        $slug = Str::of($request['title'])->slug('-');
        $tags = serialize($request['tags']);
        $authors = serialize($request['author_id']);
        $request['author_id'] = $authors;
        $request['tags'] = $tags;
        $request['title_image'] = $_FILES['title_image']['name'];
        $request['slug'] = $slug;
        $request['read_time'] = $read_time;

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
        $article = Article::where('id', $id)->first();
        $tag_ids = unserialize($article->tags);
        $author_ids = unserialize($article->author_id);
        $authors = [];
        foreach($author_ids as $a_id){
            $authors[] = User::where('id', $a_id)->first();
        }
        $category = Category::where('id', $article->category)->first();
        $tags = [];
        foreach($tag_ids as $id) {
            $tag = Tag::where('id', (int)$id)->first();
            $tags[] = $tag;
        }

        return view('frontend.article.view', compact('article', 'tags', 'authors', 'category'));
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
        $authors = User::where('role', 'author')->orWhere('role', 'administrator')->get();
        $categories = Category::all();
        $article = Article::where('id', $id)->first();
        $tag_ids = unserialize($article->tags);
        $author_ids = unserialize($article->author_id);
        return view('admin.article.edit', compact('tags', 'tag_ids', 'categories', 'article', 'authors', 'author_ids'));
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
            'tags' => 'required',
            'category' => 'required',
            'content' => 'required',
            'wordcount' => 'required'
        ]);

        $read_time = round((int)$request['wordcount']/200);
        if($read_time < 1) {
            $read_time = 1;
        }
        $article = Article::where('id', $id);

        // var_dump($_FILES['title_image']['name']);
        // var_dump($article->first()->title_image);
        // var_dump($request['title_image']);
        // die();
        
        if($_FILES['title_image']['name'] != ''){
            $tmpFile = $_FILES['title_image']['tmp_name'];
            $newFile = 'images/article/' . $_FILES['title_image']['name'];
            $result = move_uploaded_file($tmpFile, $newFile);
            $title_image = $_FILES['title_image']['name'];
        } else {
            $title_image = $article->first()->title_image;
        }
        
        $slug = Str::of($request['title'])->slug('-');
        
        $article->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'tags' => serialize($request['tags']),
            'category' => $request['category'],
            'slug' => $slug,
            'subtitle' => $request['subtitle'],
            'title_image' => $title_image,
            'image_caption' => $request['image_caption'],
            'introduction' => $request['introduction'],
            'read_time' => $read_time,
            'keywords' => $request['keywords'],
            'author_id' => serialize($request['author_id']),
            'created_at' => $request['created_at']
        ]);

        return redirect('yn-admin/articles')
            ->with('success', 'Article updated successfully');
    }

    public function update_status_processing(Request $request)
    {
        $article = Article::where('id', $request['id']);
        $article->update(['status' => 'processing']);
        return redirect('yn-author/articles')
            ->with('success', 'Send for approval');
    }

    public function update_status_approved(Request $request)
    {
        $article = Article::where('id', $request['id']);
        $article->update(['status' => 'approved']);
        return redirect('yn-admin/articles')
            ->with('success', 'Send for approval');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::where('id', $id);
        $article->delete();

        return redirect('yn-admin/articles');
    }

    public function featured($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $tag_ids = unserialize($article->tags);
        $author_ids = unserialize($article->author_id);
        $authors = [];
        foreach($author_ids as $a_id){
            $authors[] = User::where('id', $a_id)->first();
        }
        $category = Category::where('id', $article->category)->first();
        $tags = [];
        foreach($tag_ids as $id) {
            $tag = Tag::where('id', (int)$id)->first();
            $tags[] = $tag;
        }

        return view('frontend.article.featured', compact('article', 'tags', 'authors', 'category'));
    }

    public function search(Request $request)
    {
        $key = $request->s;
        $articles = Article::select('id','title_image', 'status', 'views', 'author_id', 'title', 'created_at', 'category', 'slug')->where('status', 'approved')->where('title', 'LIKE', '%'.$key.'%')->orderBy('created_at', 'desc')->get();

        return view('frontend.search', compact('articles', 'key'));
    }

    public function ajax_search(Request $request)
    {
        $key = $request->s;
        $articles = Article::select('id','title_image', 'status', 'views', 'author_id', 'title', 'created_at', 'category', 'slug')->where('status', 'approved')->where('title', 'LIKE', '%'.$key.'%')->orderBy('created_at', 'desc')->limit(5)->get();

        return $articles;
    }

    public function ajax_loadmore(Request $request)
    {
        $articles = Article::select('id','title','subtitle','title_image','slug','read_time','created_at','category')->where('status', 'approved')->orderBy('created_at', 'desc')->paginate(5);
        
        return view('frontend.loadmore',compact('articles'));
    }
}
