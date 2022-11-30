@extends('web')
@section('title', $user->name.' | YIF')
@section('meta_keywords', 'YIF')
@section('meta_description', 'News on Indian Youth and Politics')

@section('content')
<div class="page__category"> 
    <!-- Main Container -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">        
                <div class="yn-page__header mb-4">
                    <div class="ynps__article-content-footer-author-inner">
                        <div class="author__photo">
                            <div class="ynps__article-content-footer-author-img">
                                <img class="rounded-circle" src="{{ URL::asset('images/author') }}/{{ $user_meta->avatar }}" alt="author">
                            </div>
                            <div class="yn__author-share">
                                @if($user_meta->facebook != '#' && $user_meta->facebook != '')
                                <div class="yn__share-buttons-item item-facebook">
                                    <a href="{{$user_meta->facebook}}">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                </div>
                                @endif
                                @if($user_meta->twitter != '#' && $user_meta->twitter != '')
                                <div class="yn__share-buttons-item item-twitter">
                                    <a href="{{$user_meta->twitter}}">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                </div>
                                @endif
                                @if($user_meta->instagram != '#' && $user_meta->instagram != '')
                                <div class="yn__share-buttons-item item-instagram">
                                    <a href="{{$user_meta->instagram}}">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                </div>
                                @endif
                                @if($user_meta->linkedin != '#' && $user_meta->linkedin != '')
                                <div class="yn__share-buttons-item item-linkedin">
                                    <a href="{{$user_meta->linkedin}}">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="ynps__article-content-footer-author-info">
                            <div class="ynps__article-content-footer-author-name">
                                <h1 class="yn-page__title">{{$user->name}}</h1>                                
                            </div>
                            <div class="yn-page__archive-count">
                                <?=count($articles)?> posts
                            </div>
                            <div class="ynps__article-content-footer-author-description">
                                <p>
                                    {{$user_meta->about}}
                                </p>
                                <p>
                                    {{$user->email}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="yn-posts__area">
                    <div class="yn-posts__area-outer">
                        <div class="yn-posts__area-main">
                            @foreach($articles as $article)
                            <?php $category = App\Models\Category::where('id', $article->category)->first();?>
                            <article class="yn-posts__item">
                                <div class="yn-posts__item-outer row">
                                    <div class="yn-posts__item-image col-12 col-md-4 mb-4 mb-md-0">
                                        <a href="{{url('article/'.$article->id)}}/{{$article->slug}}">
                                            <img height="180" class="w-100" src="{{URL::asset('images/article/'.$article->title_image)}}" alt="">
                                        </a>
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