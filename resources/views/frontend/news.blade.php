@extends('web')
@section('title', 'News | YIF')
@section('meta_keywords', 'YIF')
@section('meta_description', 'News on Indian Youth and Politics')

@section('content')
<div class="page__single-news"> 
    <!-- Main Container -->
    <div class="container d-flex">
        <div class="yn-page-single__article">
            <div class="ynps__article-header">
                <div class="ynps__article-header-meta">
                    <div class="ynps__article-header-meta-category"></div>
                </div>
                <div class="ynps__article-header-title">
                    <h1>
                        Indian Governance: The Lok Sabha Election
                    </h1>
                </div>
                <div class="ynps__article-header-subtitle">
                    <p>
                        The first-term Congress member faced backlash in recent weeks for using “red-baiting” tactics to attack Democrat Jay Chen.
                    </p>
                </div>
                <div class="ynps__article-header-meta d-flex">
                    <div class="ynps__article-header-meta-author">
                        <div class="ynps__author-avatar">
                            <img src="{{ URL::asset('images/author/test.jpg') }}" alt="">
                        </div>
                        <span>by <strong>Cian Dreyar</strong></span>
                    </div>
                    <div class="ynps__article-header-meta-date">
                        <span>
                            <?=date('M j, Y')?>
                        </span>
                    </div>
                </div>
                <div class="ynps__article-header-img-outer">
                    <figure class="ynps__article-header-figure">
                        <img src="{{ URL::asset('images/article/art-header.png') }}" alt="header">
                    </figure>                        
                    <figcaption class="ynps__article-header-caption"></figcaption>
                </div>
            </div>
            <div class="ynps__article-body d-flex">
                <!-- Sidebar Left -->
                <div class="ynps__article-left-sidebar">
                    <div class="yn__share-buttons">
                        <div class="yn__share-buttons-item">
                            <a href="#">

                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Sidebar Left -->
                <!-- Article Content -->
                <div class="ynps__article-content">
                    <div class="ynps__article-content-outer">
                        <div class="ynps__article-content-data"></div>
                        <div class="ynps__article-content-footer">
                            <div class="ynps__article-content-footer-briefing"></div>
                            <div class="ynps__article-content-footer-tags"></div>
                            <div class="ynps__article-content-footer-share"></div>
                            <div class="ynps__article-content-footer-author">
                                <div class="ynps__article-content-footer-author-img"></div>
                                <div class="ynps__article-content-footer-author-info">
                                    <span class="ynps__article-content-footer-author-position"></span>
                                    <div class="ynps__article-content-footer-author-name">
                                        <a href="#"></a>
                                        <div class="ynps__article-content-footer-author-social"></div>
                                    </div>
                                    <div class="ynps__article-content-footer-author-description"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Article Content -->
            </div>
        </div>
        <!-- Sidebar Right -->
        <div class="yn-page-single__right-sidebar">
            <div class="yn-support__inner">
                <h5>support our work</h5>
                <p>If you like what you’ve read, support our team by making a donation.</p>
            </div>
        </div>
        <!-- End Sidebar Right -->
    </div>
    <!-- End Main Container -->
</div>
@endsection