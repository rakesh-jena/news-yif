<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TutDesign;

class TutController extends Controller
{
    public function featured(Request $request)
    {
        TutDesign::updateOrCreate([
            'meta_key' => 'featured_title'
        ],[
            'meta_value' => $request->featured_title
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'featured_content'
        ],[
            'meta_value' => $request->featured_content
        ]);

        return redirect('yn-admin/design_25under25');
    }

    public function section_one(Request $request)
    {
        TutDesign::updateOrCreate([
            'meta_key' => 'title_one'
        ],[
            'meta_value' => $request->title_one
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'subtitle_one'
        ],[
            'meta_value' => $request->subtitle_one
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'banner_one'
        ],[
            'meta_value' => $request->banner_one
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'list_one'
        ],[
            'meta_value' => serialize($request->list_one)
        ]);

        return redirect('yn-admin/design_25under25');
    }

    public function section_two(Request $request)
    {
        TutDesign::updateOrCreate([
            'meta_key' => 'title_two'
        ],[
            'meta_value' => $request->title_two
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'subtitle_two'
        ],[
            'meta_value' => $request->subtitle_two
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'banner_two'
        ],[
            'meta_value' => $request->banner_two
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'list_two'
        ],[
            'meta_value' => serialize($request->list_two)
        ]);

        return redirect('yn-admin/design_25under25');
    }

    public function section_three(Request $request)
    {
        TutDesign::updateOrCreate([
            'meta_key' => 'title_three'
        ],[
            'meta_value' => $request->title_three
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'subtitle_three'
        ],[
            'meta_value' => $request->subtitle_three
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'banner_three'
        ],[
            'meta_value' => $request->banner_three
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'list_three'
        ],[
            'meta_value' => serialize($request->list_three)
        ]);

        return redirect('yn-admin/design_25under25');
    }

    public function section_four(Request $request)
    {
        TutDesign::updateOrCreate([
            'meta_key' => 'title_four'
        ],[
            'meta_value' => $request->title_four
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'subtitle_four'
        ],[
            'meta_value' => $request->subtitle_four
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'banner_four'
        ],[
            'meta_value' => $request->banner_four
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'list_four'
        ],[
            'meta_value' => serialize($request->list_four)
        ]);

        return redirect('yn-admin/design_25under25');
    }

    public function section_five(Request $request)
    {
        TutDesign::updateOrCreate([
            'meta_key' => 'title_five'
        ],[
            'meta_value' => $request->title_five
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'subtitle_five'
        ],[
            'meta_value' => $request->subtitle_five
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'banner_five'
        ],[
            'meta_value' => $request->banner_five
        ]);

        TutDesign::updateOrCreate([
            'meta_key' => 'list_five'
        ],[
            'meta_value' => serialize($request->list_five)
        ]);

        return redirect('yn-admin/design_25under25');
    }

    public function get_meta($meta_key)
    {
        $meta = TutDesign::where('meta_key', $meta_key)->first();
        if($meta == null)
        {
            return null;
        } else {
            return $meta->meta_value;
        }        
    }
}
