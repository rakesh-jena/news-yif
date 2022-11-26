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

class DashboardController​ extends Controller
{
    public function index() 
    {
        $user = Auth::user();
        $user_meta = UserMeta::where('user_id', Auth::user()->id)->first();
        return view('admin.dashboard', compact('user', 'user_meta'));
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $id = Auth::user()->id;

        $user = User::where('id', $id);
        $user_meta = UserMeta::where('user_id', $id)->first();

        $request = request()->all();

        if($_FILES['avatar']['name'] != ''){
            $tmpFile = $_FILES['avatar']['tmp_name'];
            $newFile = 'images/author/' . $_FILES['avatar']['name'];
            $result = move_uploaded_file($tmpFile, $newFile);

            $avatar = $_FILES['avatar']['name'];
        } else {
            $avatar = $user_meta->avatar;
        }

        $user->update([
            'name' => $request['name'],
            'email' => $request['email']
        ]);

        $meta = [
            'user_id' => $id,
            'avatar' => $avatar,
            'gender' => $request['gender'],
            'about' => $request['about'],
            'facebook' => $request['facebook'],
            'linkedin' => $request['linkedin'],
            'instagram' => $request['instagram'],
            'twitter' => $request['twitter'],
        ];
        
        $user_meta = UserMeta::where('user_id', $id);
        $user_meta->update($meta);

        return redirect('yn-admin')
            ->with('success', 'User created successfully.');
    }
}
