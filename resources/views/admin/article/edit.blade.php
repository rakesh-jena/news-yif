@extends('admin')
@section('title', 'Articles | YIF')

@section('content')
<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Edit Article</h5>
                </div>
                <form class="row g-3" enctype="multipart/form-data" method="PUT" action="{{url("yn-admin/articles/{$article->id}")}}">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label for="#title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$article->title}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="#subtitle" class="form-label">Subtitle</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{$article->subtitle}}">
                    </div>                    
                    <div class="col-12 col-md-6 th_input">
                        <label for="#formFile" class="form-label">Thumbnail Image</label>
                        <input class="form-control" type="file" id="formFile" name="title_image" accept="image/*">
                        <img class="w-100" src="{{url('images/article/'.$article->title_image)}}" alt="">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="#caption" class="form-label">Image Caption</label>
                        <input type="text" class="form-control" id="caption" name="image_caption" value="{{$article->image_caption}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="#category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category" required="">
                            @foreach($categories as $category)
                            <option value="{{$category->category}}" 
                                <?php $article->category == $category->id ? 'selected' : '' ?>>
                                {{$category->category}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="#tag_multiSelect" class="form-label">Tags</label>
                        <select class="form-select" id="tag_multiSelect" name="tags[]" required="" multiple>
                            @foreach($tags as $tag)
                            @if($tag_ids != null && in_array($tag->id, $tag_ids))
                            <option value="{{$tag->id}}" selected>
                                {{$tag->tag}}
                            </option>
                            @else
                            <option value="{{$tag->id}}">{{$tag->tag}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="#introduction" class="form-label">Synopsis</label>
                        <textarea id="introduction" name="introduction" class="form-control" style="height: 100px">{{$article->introduction}}</textarea>
                    </div>
                    <div class="col-12">
                        <label for="#introduction" class="form-label">Article</label>
                        <textarea id="introduction" name="content" class="tinymce-editor form-control">{{$article->content}}</textarea>
                    </div>
                    <input type="hidden" name="author_id" value="{{$article->author_id}}">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@endsection