<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMeta;
use App\Models\Article;
use Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 'author')->get();
        return view('admin.user.listing', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('admin.user.add');
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create(request(['name', 'email', 'password', 'role']));

        $request = request()->all();

        if($_FILES['avatar']){
            $tmpFile = $_FILES['avatar']['tmp_name'];
            $newFile = 'images/author/' . $_FILES['avatar']['name'];
            $result = move_uploaded_file($tmpFile, $newFile);

            $request['avatar'] = $_FILES['avatar']['name'];
        } else {
            $request['avatar'] = 'default.png';
        }

        $meta = [
            'user_id' => $user->id,
            'avatar' => $request['avatar'],
            'gender' => $request['gender'],
            'about' => $request['about'],
            'facebook' => $request['facebook'],
            'linkedin' => $request['linkedin'],
            'instagram' => $request['instagram'],
            'twitter' => $request['twitter'],
            'slug' => Str::of($request['name'])->slug('-')
        ];
        UserMeta::create($meta);

        return redirect('yn-admin/users')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user_meta = UserMeta::where('slug', $slug)->first();
        $user = User::where('id', $user_meta->user_id)->first();
        $a = Article::select('id', 'tags', 'category', 'title', 'author_id', 'subtitle', 'slug', 'created_at', 'title_image')->get();
        $articles = [];
        foreach($a as $article){
            $ids = unserialize($article->author_id);
            if(in_array($user->id, $ids)){                
                $articles[] = $article;
            }
        }

        return view('frontend.author.view', compact('user', 'articles', 'user_meta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $user_meta = UserMeta::where('user_id', $id)->first();
        return view('admin.user.edit', compact('user', 'user_meta'));
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
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = User::where('id', $id);
        $user_meta = UserMeta::where('user_id', $id)->first();

        $request = request()->all();

        if($_FILES['avatar']['name'] != ''){
            $tmpFile = $_FILES['avatar']['tmp_name'];
            $newFile = 'images/author/' . $_FILES['avatar']['name'];
            $result = move_uploaded_file($tmpFile, $newFile);

            $request['avatar'] = $_FILES['avatar']['name'];
        } else {
            $request['avatar'] = $user_meta->avatar;
        }

        $meta = [
            'user_id' => $id,
            'avatar' => $request['avatar'],
            'gender' => $request['gender'],
            'about' => $request['about'],
            'facebook' => $request['facebook'],
            'linkedin' => $request['linkedin'],
            'instagram' => $request['instagram'],
            'twitter' => $request['twitter'],
            'slug' => Str::of($request['name'])->slug('-')
        ];
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);

        UserMeta::where('user_id', $id)->update($meta);

        return redirect('yn-admin/users')
            ->with('success', 'User created successfully.');
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

    public function all_users()
    {
        $users = User::all();
        return view('admin.all-users', compact('users'));
    }
}
