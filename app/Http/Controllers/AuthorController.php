<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\User;
use App\Models\UserMeta;
use App\Models\Tag;
use App\Models\Category;

class AuthorController extends Controller
{
    public function index() {
        $user = Auth::user();
        $user_meta = UserMeta::where('user_id', $user->id)->first();
        return view('author.dashboard', compact('user', 'user_meta'));
    }

    public function update_profile(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $request = request()->all();
        $user = User::where('id', Auth::user()->id)->first();
        $user_meta = UserMeta::where('user_id', $user->id)->first();
        //var_dump($request['avatar']);die;
        if($request['avatar'] != $user_meta->avatar){
            $tmpFile = $_FILES['avatar']['tmp_name'];
            $newFile = 'images/author/' . $_FILES['avatar']['name'];
            $result = move_uploaded_file($tmpFile, $newFile);

            $request['avatar'] = $_FILES['avatar']['name'];
        } else if($user_meta->avatar != 'default.png'){
            $request['avatar'] = $user_meta->avatar;
        }
        
        $user->update([
            'name' => $request['name'],
            'email' => $request['email']
        ]);
        $user_meta->update([
            'about' => $request['about'],
            'gender' => $request['gender'],
            'facebook' => $request['facebook'],
            'linkedin' => $request['linkedin'],
            'instagram' => $request['instagram'],
            'twitter' => $request['twitter'],
            'avatar' => $request['avatar'],
        ]);

        return redirect('yn-author')->with('success', 'Profile updated successfully');
    }

    public function articles() {
        $a = Article::select('id', 'category', 'title', 'slug', 'created_at', 'views', 'author_id')->get();
        $articles = [];
        foreach($a as $article){
            $authors = unserialize($article->author_id);
            if(in_array(Auth::user()->id, $authors)){                
                $articles[] = $article;
            }
        }
        return view('author.listing', compact('articles'));
    }

    public function update_article() {
        $request->validate([
            'title' => 'required',
            'title_image' => 'required',
            'tags' => 'required',
            'category' => 'required',
            'content' => 'required',
            'wordcount' => 'required'
        ]);

        $read_time = round($request['wordcount']/200);
        if($read_time < 1) {
            $read_time = 1;
        }
        
        $slug = Str::of($request['title'])->slug('-');
        $article = Article::where('id', $id);

        if($_FILES['title_image']['name'] != ''){
            $tmpFile = $_FILES['title_image']['tmp_name'];
            $newFile = 'images/article/' . $_FILES['title_image']['name'];
            $result = move_uploaded_file($tmpFile, $newFile);
            $title_image = $_FILES['title_image']['name'];
        } else {
            $title_image = $article->first()->title_image;
        }

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
            'read_time' => $read_time
        ]);

        return redirect('yn-author/articles')
            ->with('success', 'Article updated successfully');
    }

    public function edit_article($id) {
        $tags = Tag::all();
        $categories = Category::all();
        $article = Article::where('id', $id)->first();
        $tag_ids = unserialize($article->tags);
        return view('author.edit-article', compact('tags', 'categories', 'article', 'tag_ids'));
    }

    public function delete_article() {
        return view('author.listing');
    }

    public function add_article() {
        $tags = Tag::all();
        $categories = Category::all();
        return view('author.add-article', compact('tags', 'categories'));
    }

    public function store_article(Request $request) {
        
        $request->validate([
            'title' => 'required',
            'title_image' => 'required',
            'tags' => 'required',
            'category' => 'required',
            'content' => 'required',
            'wordcount' => 'required'
        ]);

        $read_time = round($request['wordcount']/200);
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

        return redirect('yn-author/articles')
            ->with('success', 'Article created successfully.');
    }
}
