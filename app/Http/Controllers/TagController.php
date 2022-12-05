<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Article;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.listing', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'tag' => 'required'
        ]);

        $request = request()->all();
        $slug = Str::of($request['tag'])->slug('-');
        
        $request['slug'] = $slug;

        Tag::create($request);

        return redirect('yn-admin/tags')
            ->with('success', 'Tag created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $articles = Article::select('id', 'tags', 'category', 'title', 'subtitle', 'slug', 'created_at', 'title_image')->get();
        $a = [];
        foreach($articles as $article){
            $tags = unserialize($article->tags);
            if(in_array($tag->id, $tags)){                
                $a[] = $article;
            }
        }
        //$articles = Article::where('tags', unserialize())
        return view('frontend.tag.view', compact('tag', 'a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::where('id', $id)->first();
        return view('admin.tag.edit', compact('tag'));
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
            'tag' => 'required'
        ]);

        $tag = Tag::where('id', $id);
        $request = request()->all();
        $slug = Str::of($request['tag'])->slug('-');
        
        $request['slug'] = $slug;

        $tag->update([
            'tag' => $request['tag'],
            'slug' => $request['slug']
        ]);

        return redirect('yn-admin/tags')
            ->with('success', 'Tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::where('id', $id);
        $tag->delete();

        return redirect('yn-admin/tags')
            ->with('success', 'Tag deleted successfully');
    }

    public function check_if_used($id)
    {
        $articles = Article::select('title','id')->get();
        $a = [];
        foreach($articles as $article){
            $tags = unserialize($article->tags);
            if(in_array($id, $tags)){                
                $a[] = $article;
            }
        }
        
        return $a;
    }
}
