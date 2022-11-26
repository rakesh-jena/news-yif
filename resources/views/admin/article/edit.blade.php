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
                    @if($article->status=='processing')
                    <form method="POST" action="{{url('approved')}}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="processing">
                        <input type="hidden" name="id" value="{{$article->id}}">
                        <button class="btn btn-primary rounded-pill btn-sm ms-2" type="submit">Approve</button>
                    </form>
                    @endif
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
                <form class="row g-3" id="article" enctype="multipart/form-data" method="POST" action="{{url("yn-admin/articles/{$article->id}")}}">
                    @csrf
                    @method('PUT')
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
                        <input class="form-control" type="file" id="formFile" name="title_image" accept="image/*" value="{{$article->title_image}}">
                        <img class="w-100" src="{{url('images/article/'.$article->title_image)}}" alt="">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="#caption" class="form-label">Image Caption</label>
                        <input type="text" class="form-control" id="caption" name="image_caption" value="{{$article->image_caption}}">
                    </div>
                    <div class="col-12">
                        <label for="#author_multiSelect" class="form-label">Author(s)</label>
                        <select class="form-select" id="author_multiSelect" name="author_id[]" required="" multiple>
                            @foreach($authors as $author)
                            @if($author_ids != null && in_array($author->id, $author_ids))
                            <option value="{{$author->id}}" selected>
                                {{$author->name}}
                            </option>
                            @else
                            <option value="{{$author->id}}">{{$author->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="#category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category" required="">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" 
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
                    <input type="hidden" name="wordcount" value="0">
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