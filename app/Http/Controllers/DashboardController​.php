<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use App\Models\UserMeta;
use App\Models\Homepage;
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

    public function s_first(Request $request)
    {
        Homepage::updateOrCreate([
            'meta_key' => 'sfirst_heading'
        ],[
            'meta_value' => $request->sfirst_heading
        ]);
        Homepage::updateOrCreate([
            'meta_key' => 'sfirst_title'
        ],[
            'meta_value' => $request->sfirst_title
        ]);
        Homepage::updateOrCreate([
            'meta_key' => 'sfirst_subtitle'
        ],[
            'meta_value' => $request->sfirst_subtitle
        ]);
        Homepage::updateOrCreate([
            'meta_key' => 'sfirst_desc'
        ],[
            'meta_value' => $request->sfirst_desc
        ]);
        Homepage::updateOrCreate([
            'meta_key' => 'sfirst_articles'
        ],[
            'meta_value' => serialize($request->sfirst_articles)
        ]);

        return redirect('yn-admin');
    }

    public function s_second(Request $request)
    {
        Homepage::updateOrCreate([
            'meta_key' => 'swatch_heading'
        ],[
            'meta_value' => $request->swatch_heading
        ]);
        Homepage::updateOrCreate([
            'meta_key' => 'swatch_featured'
        ],[
            'meta_value' => $request->swatch_featured
        ]);

        Homepage::updateOrCreate([
            'meta_key' => 'swatch_others'
        ],[
            'meta_value' => serialize($request->swatch_others)
        ]);

        return redirect('yn-admin');
    }

    public function s_featured(Request $request)
    {
        Homepage::updateOrCreate([
            'meta_key' => 'sfeatured_heading'
        ],[
            'meta_value' => $request->sfeatured_heading
        ]);
        Homepage::updateOrCreate([
            'meta_key' => 'sfeatured_aticle'
        ],[
            'meta_value' => $request->sfeatured_aticle
        ]);

        return redirect('yn-admin');
    }

    public function s_agenda(Request $request)
    {
        Homepage::updateOrCreate([
            'meta_key' => 'sagenda_heading'
        ],[
            'meta_value' => $request->sagenda_heading
        ]);
        Homepage::updateOrCreate([
            'meta_key' => 'sagenda_articles'
        ],[
            'meta_value' => serialize($request->sagenda_articles)
        ]);

        return redirect('yn-admin');
    }

    public function s_scoop(Request $request)
    {
        Homepage::updateOrCreate([
            'meta_key' => 'sscoop_heading'
        ],[
            'meta_value' => $request->sscoop_heading
        ]);
        Homepage::updateOrCreate([
            'meta_key' => 'sscoop_articles'
        ],[
            'meta_value' => serialize($request->sscoop_articles)
        ]);

        return redirect('yn-admin');
    }

    public function s_fullscreen(Request $request)
    {
        Homepage::updateOrCreate([
            'meta_key' => 'sfullscreen_heading'
        ],[
            'meta_value' => $request->sfullscreen_heading
        ]);
        Homepage::updateOrCreate([
            'meta_key' => 'sfullscreen_articles'
        ],[
            'meta_value' => serialize($request->sfullscreen_articles)
        ]);

        return redirect('yn-admin');
    }

    public function s_g_three(Request $request)
    {
        Homepage::updateOrCreate([
            'meta_key' => 'sgthree_heading'
        ],[
            'meta_value' => $request->sgthree_heading
        ]);
        Homepage::updateOrCreate([
            'meta_key' => 'sgthree_articles'
        ],[
            'meta_value' => serialize($request->sgthree_articles)
        ]);

        return redirect('yn-admin');
    }

    public function s_g_five(Request $request)
    {
        Homepage::updateOrCreate([
            'meta_key' => 'sgfive_articles'
        ],[
            'meta_value' => serialize($request->sgfive_articles)
        ]);

        return redirect('yn-admin');
    }

    public function s_last(Request $request)
    {
        Homepage::updateOrCreate([
            'meta_key' => 'slast_heading'
        ],[
            'meta_value' => $request->slast_heading
        ]);

        return redirect('yn-admin');
    }

    public function get_meta($meta_key)
    {
        $meta = Homepage::where('meta_key', $meta_key)->first();
        if($meta == null)
        {
            return null;
        } else {
            return $meta->meta_value;
        }        
    }
}
