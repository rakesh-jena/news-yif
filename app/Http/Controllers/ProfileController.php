<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('admin.profile.listing', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.add');
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
            'organization' => 'required'
        ]);

        $request = request()->all();

        if($_FILES['image_profile']['name'] != ''){
            $tmpFile = $_FILES['image_profile']['tmp_name'];
            $newFile = 'images/tut/' . $_FILES['image_profile']['name'];
            $result = move_uploaded_file($tmpFile, $newFile);

            $request['image_profile'] = $_FILES['image_profile']['name'];
        }

        if($_FILES['image_banner']['name'] != ''){
            $tmpFile = $_FILES['image_banner']['tmp_name'];
            $newFile = 'images/tut/' . $_FILES['image_banner']['name'];
            $result = move_uploaded_file($tmpFile, $newFile);

            $request['image_banner'] = $_FILES['image_banner']['name'];
        }

        $slug = Str::of($request['name'])->slug('-');
        $request['slug'] = $slug;

        Profile::create($request);

        return redirect('yn-admin/profiles')
            ->with('success', 'Profile created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::where('id',$id)->first();
        return view('admin.profile.edit', compact('profile'));
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
            'organization' => 'required'
        ]);

        $request = request()->all();
        $profile = Profile::where('id', $id);

        if($_FILES['image_profile']['name'] != ''){
            $tmpFile = $_FILES['image_profile']['tmp_name'];
            $newFile = 'images/tut/' . $_FILES['image_profile']['name'];
            $result = move_uploaded_file($tmpFile, $newFile);

            $request['image_profile'] = $_FILES['image_profile']['name'];
        } else {
            $request['image_profile'] = $profile->first()->image_profile;
        }

        if($_FILES['image_banner']['name'] != ''){
            $tmpFile = $_FILES['image_banner']['tmp_name'];
            $newFile = 'images/tut/' . $_FILES['image_banner']['name'];
            $result = move_uploaded_file($tmpFile, $newFile);

            $request['image_banner'] = $_FILES['image_banner']['name'];
        } else {
            $request['image_banner'] = $profile->first()->image_banner;
        }

        $slug = Str::of($request['name'])->slug('-');        

        $profile->update([
            'name' => $request['name'],
            'organization' => $request['organization'],
            'age' => $request['age'],
            'about' => $request['about'],
            'image_profile' => $request['image_profile'],
            'image_banner' => $request['image_banner'],
            'category' => $request['category'],
            'slug' => $slug,
            'address' => $request['address']
        ]);

        return redirect('yn-admin/profiles')
        ->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::where('id', $id);
        $profile->delete();

        return redirect('yn-admin/profiles');
    }
}
