<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
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
    public function show($id)
    {
        $tag = Tag::where('id', $id)->first();
        return view('frontend.tag.view', compact('tag'));
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
}
