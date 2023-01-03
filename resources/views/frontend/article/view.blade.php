@extends('web')
@section('title', $article->title)
@section('meta_keywords', $article->keywords)
@section('meta_description', $article->introduction)
@section('meta')
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{$article->title}}" />
<meta property="og:description" content="{{$article->introduction}}" />
<meta property="og:image" content="{{URL::asset('images/article/'.$article->title_image)}}" />
@endsection

@section('content')
<div class="page__single-news"> 
    <!-- Main Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-12 topspace">
                <div class="yn-page-single__article">
                    <div class="ynps__article-header">
                        <div class="ynps__article-header-meta">
                            <div class="meta-category yn__meta-category">
                                <a href="{{url('category/'.$category->slug)}}">
                                    {{ $category->category }}
                                </a>
                            </div>
                        </div>
                        <h1 class="ynps__article-header-title meta-title">                            
                            {{ $article->title }}                            
                        </h1>
                        <div class="ynps__article-header-subtitle meta-subtitle">
                            @if($article->subtitle != null)
                            <p>
                                {{ $article->subtitle }}
                            </p>
                            @endif
                        </div>
                        <div class="ynps__article-header-meta d-flex">
                            <div class="ynps__article-header-meta-author meta-author d-flex align-items-center">
                                <?php $i = 0;?>
                                @foreach($authors as $author)
                                <?php $author_meta = App\Models\UserMeta::where('user_id', $author->id)->first();?>
                                <div class="author d-flex align-items-center">                                    
                                    @if($i>0)
                                    <span class="ps-1 pe-1">and</span>
                                    @endif
                                    <div class="ynps__author-avatar">
                                        <a href="{{url('author/'.$author_meta->slug)}}">
                                            <img class="rounded-circle" src="{{ URL::asset('images/author/') }}/{{ $author_meta->avatar }}" alt="thumbnail">
                                        </a>
                                    </div>                                    
                                    <span>by <strong><a href="{{url('author/'.$author_meta->slug)}}">{{ $author->name }}</a></strong></span>
                                </div>
                                <?php $i++;?>
                                @endforeach
                            </div>
                            <div class="ynps__article-header-meta-date meta-date">
                                <span>
                                    <?=date_format(date_create($article->created_at), "M j, Y")?>
                                </span>
                            </div>
                        </div>
                        <div class="ynps__article-header-img-outer">
                            <figure class="ynps__article-header-figure">
                                <img class="w-100" src="{{ URL::asset('images/article/'.$article->title_image) }}" alt="header">
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
                                            <a class="yn__share-button-link button-twitter" target="_blank" href="https://twitter.com/share?&text={{$article->title}}&url={{url()->current()}}">
                                                <i class="bi bi-twitter"></i>
                                            </a>
                                        </div>
                                        <div class="yn__share-buttons-item item-facebook">
                                            <a class="yn__share-button-link button-facebook" 
                                            href="https://www.facebook.com/sharer.php?u={{url()->current()}}" target="_blank">
                                                <i class="bi bi-facebook"></i>
                                            </a>
                                        </div>
                                        <div class="yn__share-buttons-item item-envelope">
                                            <a class="yn__share-button-link button-envelope" href="mailto:?subject={{$article->title}}&body={{$article->title}} {{url()->current()}}" target="_blank">
                                                <i class="bi bi-envelope"></i>
                                            </a>
                                        </div>
                                        <div class="yn__share-buttons-item item-linkedin">
                                            <a class="yn__share-button-link button-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}" target="_blank">
                                                <i class="bi bi-linkedin"></i>
                                            </a>
                                        </div>
                                        <div class="yn__share-buttons-item item-reddit">
                                            <a class="yn__share-button-link button-reddit" href="https://www.reddit.com/submit?url={{url()->current()}}" target="_blank">
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
                                                <em></em>
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
                                                        <a class="yn__share-button-link button-twitter" href="https://twitter.com/share?&text={{$article->title}}&url={{url()->current()}}" target="_blank">
                                                            <i class="bi bi-twitter"></i>
                                                        </a>
                                                    </div>
                                                    <div class="yn__share-buttons-item">
                                                        <a class="yn__share-button-link button-facebook" href="https://www.facebook.com/sharer.php?u={{url()->current()}}" target="_blank">
                                                            <i class="bi bi-facebook"></i>
                                                        </a>
                                                    </div>
                                                    <div class="yn__share-buttons-item">
                                                        <a class="yn__share-button-link button-envelope" href="mailto:?subject={{$article->title}}&body={{$article->title}} {{url()->current()}}" target="_blank">
                                                            <i class="bi bi-envelope"></i>
                                                        </a>
                                                    </div>
                                                    <div class="yn__share-buttons-item">
                                                        <a class="yn__share-button-link button-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}" target="_blank">
                                                            <i class="bi bi-linkedin"></i>
                                                        </a>
                                                    </div>
                                                    <div class="yn__share-buttons-item">
                                                        <a class="yn__share-button-link button-reddit" href="https://www.reddit.com/submit?url={{url()->current()}}" target="_blank">
                                                            <i class="bi bi-reddit"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ynps__article-content-footer-author">
                                                @foreach($authors as $author)
                                                <?php $author_meta = App\Models\UserMeta::where('user_id', $author->id)->first();?>
                                                <div class="ynps__article-content-footer-author-inner">
                                                    <a class="ynps__article-content-footer-author-img" href="{{ url('author/'.$author_meta->slug) }}">
                                                        <img class="rounded-circle" src="{{ URL::asset('images/author') }}/{{ $author_meta->avatar }}" alt="author">
                                                    </a>
                                                    <div class="ynps__article-content-footer-author-info">
                                                        <span class="ynps__article-content-footer-author-position">
                                                            {{$author->role}}
                                                        </span>
                                                        <div class="ynps__article-content-footer-author-name">
                                                            <a href="{{ url('author/'.$author_meta->slug) }}">
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
                                                            <p>
                                                                {{$author->email}}
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