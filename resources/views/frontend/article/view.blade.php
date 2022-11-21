@extends('web')
@section('title', $article->title.' | YIF')
@section('meta_keywords', 'YIF')
@section('meta_description', 'News on Indian Youth and Politics')

@section('content')
<div class="page__single-news"> 
    <!-- Main Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-12">
                <div class="yn-page-single__article">
                    <div class="ynps__article-header">
                        <div class="ynps__article-header-meta">
                            <div class="yn__meta-category">
                                {{ $article->category }}
                            </div>
                        </div>
                        <h1 class="ynps__article-header-title">                            
                            {{ $article->title }}                            
                        </h1>
                        <div class="ynps__article-header-subtitle">
                            @if($article->subtitle != null)
                            <p>
                                {{ $article->subtitle }}
                            </p>
                            @endif
                        </div>
                        <div class="ynps__article-header-meta d-flex">
                            <div class="ynps__article-header-meta-author">
                                <a class="d-flex" href="#">
                                    <div class="ynps__author-avatar">
                                        <img class="rounded-circle" src="{{ URL::asset('images/author/') }}/{{ $author_meta->avatar }}" alt="thumbnail">
                                    </div>
                                    <span>by <strong>{{ $author->name }}</strong></span>
                                </a>
                            </div>
                            <div class="ynps__article-header-meta-date">
                                <span>
                                    <?=date_format(date_create($article->created_at), "M j, Y")?>
                                </span>
                            </div>
                        </div>
                        <div class="ynps__article-header-img-outer">
                            <figure class="ynps__article-header-figure">
                                <img class="img-fluid" src="{{ URL::asset('images/article/'.$article->title_image) }}" alt="header">
                            </figure>                        
                            <figcaption class="ynps__article-header-caption">
                            </figcaption>
                        </div>
                    </div>
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
                                <div class="ynps__article-content">
                                    <div class="ynps__article-content-outer">
                                        <div class="ynps__article-content-data">
                                            <p class="introduction">
                                                <strong>
                                                    @if($article->introduction!=null){{ $article->introduction }}@endif
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
                                                        <a href="{{ url('#') }}">{{$tag}}</a>
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
                                                <div class="ynps__article-content-footer-author-inner">
                                                    <a class="ynps__article-content-footer-author-img" href="#">
                                                        <img class="rounded-circle" src="{{ url::asset('images/author') }}/{{ $author_meta->avatar }}" alt="author">
                                                    </a>
                                                    <div class="ynps__article-content-footer-author-info">
                                                        <span class="ynps__article-content-footer-author-position">
                                                            {{$author->role}}
                                                        </span>
                                                        <div class="ynps__article-content-footer-author-name">
                                                            <a href="{{ url('#') }}">
                                                                {{$author->name}}
                                                            </a>
                                                            <div class="ynps__article-content-footer-author-social"></div>
                                                        </div>
                                                        <div class="ynps__article-content-footer-author-description">
                                                            <p>
                                                                {{$author_meta->about}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
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
                <div class="yn-page-single__right-sidebar">
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