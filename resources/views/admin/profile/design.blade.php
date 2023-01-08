@extends('admin')
@section('title', 'Design 25under25 | YIF')

@section('content')
<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <h4>Design 25under25</h4>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Featured</h5>
                        <form action="{{url('yn-admin/section_featured')}}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="featured_title" class="col-md-4 col-lg-3 col-form-label">Title</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="featured_title" type="text" class="form-control" id="featured_title"
                                     value="{{ App\Http\Controllers\TutDesignController​::get_meta('featured_title')}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="featured_content" class="col-md-4 col-lg-3 col-form-label">Content</label>
                                <div class="col-md-8 col-lg-9">
                                    <textarea name="featured_content" type="text" class="form-control" id="featured_content">
                                        {{ App\Http\Controllers\TutDesignController​::get_meta('featured_content')}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Section 1</h5>
                        <form action="{{url('yn-admin/section_one')}}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="title_one" class="col-md-4 col-lg-3 col-form-label">Title</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="title_one" type="text" class="form-control" id="title_one"
                                     value="{{ App\Http\Controllers\TutDesignController​::get_meta('title_one')}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="subtitle_one" class="col-md-4 col-lg-3 col-form-label">Sub-Title</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="subtitle_one" type="text" class="form-control" id="subtitle_one"
                                     value="{{ App\Http\Controllers\TutDesignController​::get_meta('subtitle_one')}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php $selected = App\Http\Controllers\TutDesignController​::get_meta('banner_one'); ?>
                                <label for="banner_one" class="col-md-4 col-lg-3 col-form-label">Banner</label>
                                <div class="col-md-8 col-lg-9">
                                    <select name="banner_one" class="form-control" id="banner_one">
                                        @foreach($profiles as $profile)
                                        <option value="{{$profile->id}}" <?php $selected == $profile->id ? 'selected' : '';?>>
                                            {{$profile->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="list_one" class="col-md-4 col-lg-3 col-form-label">Content</label>
                                <div class="col-md-8 col-lg-9">
                                    <select class="form-select" id="list_one_multiSelect" name="list_one[]" required="" multiple>
                                        @foreach($profiles as $profile)
                                            <?php $ids = unserialize(App\Http\Controllers\TutDesignController​::get_meta('list_one'));?>
                                            @if($ids !=null && in_array(strval($profile->id), $ids))
                                            <option value="{{$profile->id}}" selected>{{$profile->name}}</option>
                                            @else
                                            <option value="{{$profile->id}}">{{$profile->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Section 2</h5>
                        <form action="{{url('yn-admin/section_two')}}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="title_two" class="col-md-4 col-lg-3 col-form-label">Title</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="title_two" type="text" class="form-control" id="title_two"
                                     value="{{ App\Http\Controllers\TutDesignController​::get_meta('title_two')}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="subtitle_two" class="col-md-4 col-lg-3 col-form-label">Sub-Title</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="subtitle_two" type="text" class="form-control" id="subtitle_two"
                                     value="{{ App\Http\Controllers\TutDesignController​::get_meta('subtitle_two')}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php $selected = App\Http\Controllers\TutDesignController​::get_meta('banner_two'); ?>
                                <label for="banner_two" class="col-md-4 col-lg-3 col-form-label">Banner</label>
                                <div class="col-md-8 col-lg-9">
                                    <select name="banner_two" class="form-control" id="banner_two">
                                        @foreach($profiles as $profile)
                                        <option value="{{$profile->id}}" <?php $selected == $profile->id ? 'selected' : '';?>>
                                            {{$profile->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="list_two" class="col-md-4 col-lg-3 col-form-label">Content</label>
                                <div class="col-md-8 col-lg-9">
                                    <select class="form-select" id="list_two_multiSelect" name="list_two[]" required="" multiple>
                                        @foreach($profiles as $profile)
                                            <?php $ids = unserialize(App\Http\Controllers\TutDesignController​::get_meta('list_two'));?>
                                            @if($ids !=null && in_array(strval($profile->id), $ids))
                                            <option value="{{$profile->id}}" selected>{{$profile->name}}</option>
                                            @else
                                            <option value="{{$profile->id}}">{{$profile->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Section 3</h5>
                        <form action="{{url('yn-admin/section_three')}}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="title_three" class="col-md-4 col-lg-3 col-form-label">Title</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="title_three" type="text" class="form-control" id="title_three"
                                     value="{{ App\Http\Controllers\TutDesignController​::get_meta('title_three')}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="subtitle_three" class="col-md-4 col-lg-3 col-form-label">Sub-Title</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="subtitle_three" type="text" class="form-control" id="subtitle_three"
                                     value="{{ App\Http\Controllers\TutDesignController​::get_meta('subtitle_three')}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php $selected = App\Http\Controllers\TutDesignController​::get_meta('banner_three'); ?>
                                <label for="banner_three" class="col-md-4 col-lg-3 col-form-label">Banner</label>
                                <div class="col-md-8 col-lg-9">
                                    <select name="banner_three" class="form-control" id="banner_three">
                                        @foreach($profiles as $profile)
                                        <option value="{{$profile->id}}" <?php $selected == $profile->id ? 'selected' : '';?>>
                                            {{$profile->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="list_three" class="col-md-4 col-lg-3 col-form-label">Content</label>
                                <div class="col-md-8 col-lg-9">
                                    <select class="form-select" id="list_three_multiSelect" name="list_three[]" required="" multiple>
                                        @foreach($profiles as $profile)
                                            <?php $ids = unserialize(App\Http\Controllers\TutDesignController​::get_meta('list_three'));?>
                                            @if($ids !=null && in_array(strval($profile->id), $ids))
                                            <option value="{{$profile->id}}" selected>{{$profile->name}}</option>
                                            @else
                                            <option value="{{$profile->id}}">{{$profile->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Section 4</h5>
                        <form action="{{url('yn-admin/section_four')}}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="title_four" class="col-md-4 col-lg-3 col-form-label">Title</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="title_four" type="text" class="form-control" id="title_four"
                                     value="{{ App\Http\Controllers\TutDesignController​::get_meta('title_four')}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="subtitle_four" class="col-md-4 col-lg-3 col-form-label">Sub-Title</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="subtitle_four" type="text" class="form-control" id="subtitle_four"
                                     value="{{ App\Http\Controllers\TutDesignController​::get_meta('subtitle_four')}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php $selected = App\Http\Controllers\TutDesignController​::get_meta('banner_four'); ?>
                                <label for="banner_four" class="col-md-4 col-lg-3 col-form-label">Banner</label>
                                <div class="col-md-8 col-lg-9">
                                    <select name="banner_four" class="form-control" id="banner_four">
                                        @foreach($profiles as $profile)
                                        <option value="{{$profile->id}}" <?php $selected == $profile->id ? 'selected' : '';?>>
                                            {{$profile->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="list_four" class="col-md-4 col-lg-3 col-form-label">Content</label>
                                <div class="col-md-8 col-lg-9">
                                    <select class="form-select" id="list_four_multiSelect" name="list_four[]" required="" multiple>
                                        @foreach($profiles as $profile)
                                            <?php $ids = unserialize(App\Http\Controllers\TutDesignController​::get_meta('list_four'));?>
                                            @if($ids !=null && in_array(strval($profile->id), $ids))
                                            <option value="{{$profile->id}}" selected>{{$profile->name}}</option>
                                            @else
                                            <option value="{{$profile->id}}">{{$profile->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Section 5</h5>
                        <form action="{{url('yn-admin/section_five')}}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="title_five" class="col-md-4 col-lg-3 col-form-label">Title</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="title_five" type="text" class="form-control" id="title_five"
                                     value="{{ App\Http\Controllers\TutDesignController​::get_meta('title_five')}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="subtitle_five" class="col-md-4 col-lg-3 col-form-label">Sub-Title</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="subtitle_five" type="text" class="form-control" id="subtitle_five"
                                     value="{{ App\Http\Controllers\TutDesignController​::get_meta('subtitle_five')}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php $selected = App\Http\Controllers\TutDesignController​::get_meta('banner_five'); ?>
                                <label for="banner_five" class="col-md-4 col-lg-3 col-form-label">Banner</label>
                                <div class="col-md-8 col-lg-9">
                                    <select name="banner_five" class="form-control" id="banner_five">
                                        @foreach($profiles as $profile)
                                        <option value="{{$profile->id}}" <?php $selected == $profile->id ? 'selected' : '';?>>
                                            {{$profile->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="list_five" class="col-md-4 col-lg-3 col-form-label">Content</label>
                                <div class="col-md-8 col-lg-9">
                                    <select class="form-select" id="list_five_multiSelect" name="list_five[]" required="" multiple>
                                        @foreach($profiles as $profile)
                                            <?php $ids = unserialize(App\Http\Controllers\TutDesignController​::get_meta('list_five'));?>
                                            @if($ids !=null && in_array(strval($profile->id), $ids))
                                            <option value="{{$profile->id}}" selected>{{$profile->name}}</option>
                                            @else
                                            <option value="{{$profile->id}}">{{$profile->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@endsection