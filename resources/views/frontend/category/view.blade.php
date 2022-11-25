@extends('web')
@section('title', $category->category.' | YIF')
@section('meta_keywords', 'YIF')
@section('meta_description', 'News on Indian Youth and Politics')

@section('content')
<div class="page__category"> 
    <!-- Main Container -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">        
                <div class="yn-page__header ">
                    <span class="yn-page__subtitle">Browsing Category</span>
                    <h1 class="yn-page__title">{{$category->category}}</h1>
                    <div class="yn-page__archive-count">
                        <?=count($articles)?> posts
                    </div>
                </div>
                <div class="yn-posts__area">
                    <div class="yn-posts__area-outer">
                        <div class="yn-posts__area-main">
                            @foreach($articles as $article)
                            <article class="yn-posts__item">
                                <div class="yn-posts__item-outer row">
                                    <div class="yn-posts__item-image col-12 col-md-4">
                                        <img height="180" class="w-100" src="{{URL::asset('images/article/'.$article->title_image)}}" alt="">
                                    </div>
                                    <div class="yn-posts__item-content col-12 col-md-8">
                                        <div class="meta-category">
                                            {{$category->category}}
                                        </div>
                                        <div class="meta-title">
                                            <h2>
                                                <a href="{{url('article/'.$article->id)}}/{{$article->slug}}">
                                                    {{ $article->title }}
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="meta-subtitle">
                                            {{ $article->subtitle }}
                                        </div>
                                        <div class="meta-date">
                                            <?=date_format(date_create($article->created_at), "F j, Y")?>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="yn-page__right-sidebar">
                    <div class="yn-support__inner">
                        <h5>support our work</h5>
                        <p>If you like what you’ve read, support our team by making a donation.</p>
                        <button type="button" class="btn btn-danger">
                            Donate
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection