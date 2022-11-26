@extends('author')
@section('title', 'Articles | YIF')

@section('content')
<!-- Start #main -->
<main id="main" class="main">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Add Article</h5>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="row g-3" id="article" enctype="multipart/form-data" method="POST" action="{{url('yn-author/articles')}}">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label for="#title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="#subtitle" class="form-label">Subtitle</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle">
                    </div>                    
                    <div class="col-12 col-md-6 th_input">
                        <label for="#formFile" class="form-label">Thumbnail Image</label>
                        <input accept="image/*" class="form-control" type="file" id="formFile" name="title_image">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="#caption" class="form-label">Image Caption</label>
                        <input type="text" class="form-control" id="caption" name="image_caption">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="#category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category" required="">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="#tag_multiSelect" class="form-label">Tags</label>
                        <select class="form-select" id="tag_multiSelect" name="tags[]" required="" multiple>
                            @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->tag}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="#introduction" class="form-label">Synopsis</label>
                        <textarea id="introduction" name="introduction" class="form-control" style="height: 100px"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="#introduction" class="form-label">Article</label>
                        <textarea id="introduction" name="content" class="tinymce-editor form-control"></textarea>
                    </div>
                    <input type="hidden" name="author_id[]" value="{{Auth::id()}}">
                    <input type="hidden" name="status" value="approved">
                    <input type="hidden" name="wordcount" value="0">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Draft</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@endsection