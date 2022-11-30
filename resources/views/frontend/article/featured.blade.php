@extends('web')
@section('title', $article->title)
@section('meta_keywords', 'YIF')
@section('meta_description', $article->introduction)
@section('meta')
<link rel="canonical" href="{{url()->current()}}">
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{$article->title}}" />
<meta property="og:description" content="{{$article->introduction}}" />
<meta property="og:image" content="{{URL::asset('images/article/'.$article->title_image)}}" />
@endsection

@section('content')
<div class="page__featured-news"> 
    <!-- Main Container -->
    <section class="yn-section featured">
        <div class="yn-featured__outer">
            <div class="yn-featured__banner">
                <img loading="lazy"class="w-100" src="{{URL::asset('images/article/'.$article->title_image)}}" alt="banner">
            </div>
            <div class="yn-featured__content">
                <div class="container">
                    <div class="yn-featured__category meta-category">
                        <a href="{{url('category/'.$category->slug)}}">{{$category->category}}</a>
                    </div>
                    <div class="yn-featured__title meta-title mb-4">
                        <h2>
                            <a href="#">
                                {{$article->title}}
                            </a>
                        </h2>
                    </div>
                    <div class="yn-featured__excerpt meta-subtitle mb-4">
                        {{$article->subtitle}}
                    </div>
                    <div class="ynps__article-header-meta d-flex justify-content-center align-items-center">
                        <?php $i = 0;?>
                        @foreach ($authors as $author)
                        <?php $author_meta = App\Models\UserMeta::where('user_id', $author->id)->first();?>
                        
                        @if($i>0)
                        <span class="ynps__multiAuthor">and</span>
                        @endif
                        <div class="ynps__article-header-meta-author">
                            <a class="d-flex" href="{{url('author/'.$author_meta->slug)}}">
                                <div class="ynps__author-avatar">
                                    <img loading="lazy"class="rounded-circle" src="{{URL::asset('images/author/'.$author_meta->avatar)}}" alt="author">
                                </div>
                                <span>by <strong>{{$author->name}}</strong></span>
                            </a>
                        </div>
                        <?php $i++;?>
                        @endforeach
                        <div class="ynps__article-header-meta-date">
                            <span>
                                <?=date_format(date_create($article->created_at), "F j, Y")?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-12">
                <div class="yn-page-single__article">
                    <div class="ynps__article-body">
                        <div class="row">
                            <!-- Sidebar Left -->
                            <div class="col-md-1 col-12">
                                <div class="ynps__article-left-sidebar">
                                    <div class="yn__share-buttons">
                                        <div class="yn__share-buttons-item item-twitter">
                                            <a class="yn__share-button-link button-twitter" href="#">
                                                <i class="bi bi-twitter"></i>
                                            </a>
                                        </div>
                                        <div class="yn__share-buttons-item item-facebook">
                                            <a class="yn__share-button-link button-facebook" href="#">
                                                <i class="bi bi-facebook"></i>
                                            </a>
                                        </div>
                                        <div class="yn__share-buttons-item item-envelope">
                                            <a class="yn__share-button-link button-envelope" href="#">
                                                <i class="bi bi-envelope"></i>
                                            </a>
                                        </div>
                                        <div class="yn__share-buttons-item item-linkedin">
                                            <a class="yn__share-button-link button-linkedin" href="#">
                                                <i class="bi bi-linkedin"></i>
                                            </a>
                                        </div>
                                        <div class="yn__share-buttons-item item-reddit">
                                            <a class="yn__share-button-link button-reddit" href="#">
                                                <i class="bi bi-reddit"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Sidebar Left -->

                            <!-- Article Content -->
                            <div class="col-md-11 col-12">
                                <div class="ynps__article-content ibm-plex-sans">
                                    <div class="ynps__article-content-outer">
                                        <div class="ynps__article-content-data">
                                            <p class="introduction">
                                                <strong>
                                                    <em>
                                                    @if($article->introduction!=null){{ $article->introduction }}@endif
                                                    </em>
                                                </strong>
                                            </p>
                                            {!! $article->content !!}
                                        </div>
                                        <div class="ynps__article-content-footer">
                                            <div class="ynps__article-content-footer-briefing">
                                                <em>
                                                    The Yappie is your must-read briefing on AAPI power, politics, and influence, fiscally sponsored by the Asian American Journalists Association. Make a donation, subscribe, and follow us on Twitter (@theyappie). Send tips and feedback to editors@theyappie.com.
                                                </em>
                                            </div>
                                            <div class="ynps__article-content-footer-tags">
                                                <ul class="yn__tag-list">
                                                    @foreach($tags as $tag)
                                                    <li class="yn__tag-item">
                                                        <a href="{{ url('tag/'.$tag['slug']) }}">{{$tag['tag']}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="ynps__article-content-footer-share">
                                                <div class="yn__share-buttons">
                                                    <div class="yn__share-buttons-item">
                                                        <a class="yn__share-button-link button-twitter" href="{{ url('#') }}">
                                                            <i class="bi bi-twitter"></i>
                                                        </a>
                                                    </div>
                                                    <div class="yn__share-buttons-item">
                                                        <a class="yn__share-button-link button-facebook" href="{{ url('#') }}">
                                                            <i class="bi bi-facebook"></i>
                                                        </a>
                                                    </div>
                                                    <div class="yn__share-buttons-item">
                                                        <a class="yn__share-button-link button-envelope" href="{{ url('#') }}">
                                                            <i class="bi bi-envelope"></i>
                                                        </a>
                                                    </div>
                                                    <div class="yn__share-buttons-item">
                                                        <a class="yn__share-button-link button-linkedin" href="{{ url('#') }}">
                                                            <i class="bi bi-linkedin"></i>
                                                        </a>
                                                    </div>
                                                    <div class="yn__share-buttons-item">
                                                        <a class="yn__share-button-link button-reddit" href="{{ url('#') }}">
                                                            <i class="bi bi-reddit"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ynps__article-content-footer-author">
                                                @foreach($authors as $author)
                                                <?php $author_meta = App\Models\UserMeta::where('user_id', $author->id)->first();?>
                                                <div class="ynps__article-content-footer-author-inner">
                                                    <a class="ynps__article-content-footer-author-img" href="#">
                                                        <img class="rounded-circle" src="{{ URL::asset('images/author') }}/{{ $author_meta->avatar }}" alt="author">
                                                    </a>
                                                    <div class="ynps__article-content-footer-author-info">
                                                        <span class="ynps__article-content-footer-author-position">
                                                            {{$author->role}}
                                                        </span>
                                                        <div class="ynps__article-content-footer-author-name">
                                                            <a href="{{ url('#') }}">
                                                                {{$author->name}}
                                                            </a>
                                                            <div class="ynps__article-content-footer-author-social">
                                                                @if($author_meta->facebook != '#' && $author_meta->facebook != '')
                                                                <div class="yn__share-buttons-item item-facebook">
                                                                    <a href="{{$author_meta->facebook}}">
                                                                        <i class="bi bi-facebook"></i>
                                                                    </a>
                                                                </div>
                                                                @endif
                                                                @if($author_meta->twitter != '#' && $author_meta->twitter != '')
                                                                <div class="yn__share-buttons-item item-twitter">
                                                                    <a href="{{$author_meta->twitter}}">
                                                                        <i class="bi bi-twitter"></i>
                                                                    </a>
                                                                </div>
                                                                @endif
                                                                @if($author_meta->instagram != '#' && $author_meta->instagram != '')
                                                                <div class="yn__share-buttons-item item-instagram">
                                                                    <a href="{{$author_meta->instagram}}">
                                                                        <i class="bi bi-instagram"></i>
                                                                    </a>
                                                                </div>
                                                                @endif
                                                                @if($author_meta->linkedin != '#' && $author_meta->linkedin != '')
                                                                <div class="yn__share-buttons-item item-linkedin">
                                                                    <a href="{{$author_meta->linkedin}}">
                                                                        <i class="bi bi-linkedin"></i>
                                                                    </a>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="ynps__article-content-footer-author-description">
                                                            <p>
                                                                {{$author_meta->about}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Article Content -->
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar Right -->
            <div class="col-md-3 col-12">
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
            <!-- End Sidebar Right -->
        </div>        
    </div>
    <!-- End Main Container -->
</div>
@endsection
<?php
$art = App\Models\Article::where('id', $article->id);
$art->update([
    'views' => $article->views+1,
]);
?>