@extends('web')
@section('title', 'YIF | News on Indian Youth and Politics')
@section('meta_keywords', 'YIF')
@section('meta_description', 'News on Indian Youth and Politics')

@section('content')
<div class="page__home">
    <!-- Election News Section -->
    <section class="yn-section election-news">
        <div class="container">
            <div class="en-header text-center">
                <div class="header-title">
                    <h6 class="d-flex">
                        <span class="d-flex">{{ App\Http\Controllers\DashboardController​::get_meta('sfirst_heading')}}</span>
                    </h6>
                </div>
                <div class="news-title meta-title">
                    <h1>
                        {{ App\Http\Controllers\DashboardController​::get_meta('sfirst_title')}}
                    </h1>
                </div>
                <p class="news-subtitle meta-subtitle">
                    {{ App\Http\Controllers\DashboardController​::get_meta('sfirst_subtitle')}}
                </p>
                <hr>
                <p class="news-sub-sub-title meta-subtitle">
                    {{ App\Http\Controllers\DashboardController​::get_meta('sfirst_desc')}}
                </p>
            </div>
            <div class="row">
                <?php $ids = unserialize(App\Http\Controllers\DashboardController​::get_meta('sfirst_articles'));?>
                @foreach($ids as $id)
                <?php $article = App\Models\Article::select('id','title','subtitle','title_image','slug','read_time','created_at','category')->where('id', (int)$id)->first();?>
                
                <div class="col-12 col-md-6">
                    <div class="mb-2">
                        <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                            <img height="360" class="w-100" src="{{URL::asset('images/article/'.$article->title_image)}}" alt="">
                        </a>
                    </div>
                    <div class="meta-title">
                        <h3>
                            <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                {{$article->title}}
                            </a>
                        </h3>
                    </div>
                    <div class="meta-date">
                        <?=date_format(date_create($article->created_at), "F j, Y")?>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Election News Section -->

    <!-- First Section -->
    <section class="yn-section first">
        <div class="title">
            <h2>
                {{ App\Http\Controllers\DashboardController​::get_meta('swatch_heading')}}
            </h2>
        </div>
        <div class="container">
            <div class="row">
                <!-- Lastest News -->
                <div class="col-md-3">
                    <div class="yn-sf__column latest-news">
                        <div class="yn-sf__column__header d-flex">
                            <div class="yn-sf__column__title">
                                <h2 class="work-sans">THE LATEST</h2>
                            </div>
                            <div class="yn-sf__title-date meta-date ms-auto">
                                <span>
                                    <?php echo date('M j, Y');?>
                                </span>
                            </div>
                        </div>
                        <div class="yn-sf__column__body">
                            <?php $articles = App\Models\Article::select('id','title','subtitle','title_image','slug','read_time','created_at','category')->orderBy('updated_at', 'desc')->limit(4)->get();?>
                            @foreach($articles as $article)                            
                            <?php $category = App\Models\Category::where('id',$article->category)->first();?>
                            <article class="latest-post__outer">
                                <div class="latest-post__inner">
                                    <div class="latest-post__data d-flex">
                                        <div class="latest-post__thumbnail">
                                            <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                                <img loading="lazy" width="80" height="80" src="{{ URL::asset('images/article/'.$article->title_image)}}" alt="thumbnail">
                                            </a>
                                        </div>
                                        <div class="latest-post__content">
                                            <div class="latest-post__meta">
                                                <div class="meta-category">
                                                    <a href="{{url('category/'.$category->slug)}}">{{$category->category}}</a>
                                                </div>
                                            </div>
                                            <h6 class="latest-post__title meta-title">
                                                <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                                    {{$article->title}}
                                                </a>
                                            </h6>
                                            <div class="latest-post__meta">
                                                <div class="meta-date">
                                                    <?=date_format(date_create($article->created_at), "F j, Y")?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Single News -->
                <?php $id = (int)App\Http\Controllers\DashboardController​::get_meta('swatch_featured');?>
                <?php $article = App\Models\Article::select('id','title','subtitle','title_image','slug','read_time','created_at','category')->where('id', (int)$id)->first();?>
                <?php $category = App\Models\Category::where('id',$article->category)->first();?>
                <div class="col-md-6 border-sn">
                    <div class="yn-sf__column single-news">
                        <div class="single-post__thumbnail mb-4 img__wrap">
                            <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                <img height="360" loading="lazy"class="w-100" src="{{URL::asset('images/article/'.$article->title_image)}}" alt="thumbnail">
                            
                                <div class="img__overlay">
                                    <span class="yn__read-more">Read More</span>
                                    <div class="yn__read-time">
                                        <div class="meta-reading-time">
                                            <span>
                                                <i class="bi bi-clock"></i>
                                            </span>
                                            {{$article->read_time}} minute read
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="single-post__body">
                            <div class="single-post__meta">
                                <div class="meta-category">
                                    <a href="{{url('category/'.$category->slug)}}">{{$category->category}}</a>
                                </div>
                            </div>
                            <div class="single-post__title meta-title">
                                <h2>
                                    <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                        {{$article->title}}
                                    </a>
                                </h2>
                            </div>
                            <div class="single-post__sub-title meta-subtitle">
                                <p>{{$article->subtitle}}</p>
                                <p>{{$article->introduction}}</p>
                            </div>
                            <div class="single-post__meta">
                                <div class="meta-date">
                                    <?=date_format(date_create($article->created_at), "F j, Y")?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Watching News -->
                <div class="col-md-3">
                    <div class="yn-sf__column watching">
                        <div class="yn-sf__column__header">
                            <div class="yn-sf__column__title meta-title">
                                <h2 class="work-sans">WHAT WE'RE WATCHING</h2>
                            </div>
                        </div>
                        <div class="yn-sf__column__body">
                            <?php $count=0;?>
                            <?php $ids = unserialize(App\Http\Controllers\DashboardController​::get_meta('swatch_others'));?>
                            @foreach($ids as $id)
                            <?php $article = App\Models\Article::select('id','title','subtitle','title_image','slug','read_time','created_at','category')->where('id', (int)$id)->first();?>
                            <?php $category = App\Models\Category::where('id',$article->category)->first();?>
                            @if($count == 0)
                            <article class="watching-post__first">
                                <div class="yn-entry__outer">
                                    <div class="yn-entry__inner">
                                        <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" target="_blank">
                                            <div class="yn-entry__image">
                                                <img loading="lazy"class="w-100" src="{{URL::asset('images/article/'.$article->title_image)}}" alt="News">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="meta-category mt-2">
                                        <a href="{{url('category/'.$category->slug)}}">{{$category->category}}</a>
                                    </div>
                                    <div class="yn-entry__inner">
                                        <h2 class="yn-entry__title meta-title">
                                            <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" target="_blank">
                                                {{$article->title}}
                                            </a>
                                        </h2>
                                        <div class="yn-entry_meta">
                                            <div class="meta-date">
                                                <?=date_format(date_create($article->created_at), "F j, Y")?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @else
                            <article class="watching-post__outer">
                                <div class="watching-post__inner d-flex">
                                    <div class="watching-post__content">
                                        <div class="watching-post__data">
                                            <h6 class="watching-post__title meta-title">
                                                <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                                    {{$article->title}}
                                                </a>
                                            </h6>
                                            <div class="watching-post__meta">
                                                <div class="meta-date">
                                                    <?=date_format(date_create($article->created_at), "F j, Y")?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="watching-post__thumbnail">
                                        <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                            <img loading="lazy"width="80" height="80" src="{{URL::asset('images/article/'.$article->title_image)}}" alt="thumbnail">
                                        </a>
                                    </div>
                                </div>
                            </article>
                            @endif
                            <?php $count++;?>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End First Section -->

    <!-- Featured News Section -->
    <?php $id = (int)App\Http\Controllers\DashboardController​::get_meta('sfeatured_aticle');?>
    <?php $article = App\Models\Article::select('id','author_id','title','subtitle','title_image','slug','read_time','created_at','category')->where('id', (int)$id)->first();?>
    <?php $category = App\Models\Category::where('id',$article->category)->first();?>
    <?php $author_ids = unserialize($article->author_id);?>
    <section class="yn-section featured">
        <div class="title">
            <h2>
                {{ App\Http\Controllers\DashboardController​::get_meta('sfeatured_heading')}}
            </h2>
        </div>
        <div class="yn-featured__outer">
            <div class="yn-featured__banner">
                <a href="{{url($article->slug)}}">
                    <img loading="lazy"class="w-100" src="{{URL::asset('images/article/'.$article->title_image)}}" alt="banner">
                </a>
            </div>
            <div class="yn-featured__content">
                <div class="container">
                    <div class="yn-featured__category meta-category">
                        <a href="{{url('category/'.$category->slug)}}">{{$category->category}}</a>
                    </div>
                    <div class="yn-featured__title meta-title mb-4">
                        <h2>
                            <a href="{{url($article->slug)}}">
                                {{$article->title}}
                            </a>
                        </h2>
                    </div>
                    <div class="yn-featured__excerpt meta-subtitle mb-4">
                        <p>{{$article->subtitle}}</p>
                        <p>{{$article->introduction}}</p>
                    </div>
                    <div class="ynps__article-header-meta d-flex justify-content-center align-items-center">
                        <?php $i = 0;?>
                        @foreach ($author_ids as $id)
                        <?php $author = App\Models\User::where('id',(int)$id)->first();?>
                        <?php $author_meta = App\Models\UserMeta::where('user_id', (int)$id)->first();?>
                        
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
    <!-- End Featured Section -->

    <!-- Our Agenda Section -->
    <section class="yn-section agenda">
        <div class="title">
            <h2>
                {{ App\Http\Controllers\DashboardController​::get_meta('sagenda_heading')}}
            </h2>
        </div>
        <div class="yn__agenda">
            <div class="container">
                <div class="row">
                    <?php $ids = unserialize(App\Http\Controllers\DashboardController​::get_meta('sagenda_articles'));?>
                    @foreach($ids as $id)
                    <?php $article = App\Models\Article::select('id','title','subtitle','title_image','slug','read_time','created_at','category')->where('id', (int)$id)->first();?>
                    <?php $category = App\Models\Category::where('id',$article->category)->first();?>
                    <div class="col-12 col-md-3">
                        <div class="article__outer">
                            <div class="article__img mb-3 img__wrap">
                                <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                    <img height="180" loading="lazy"class="w-100" src="{{URL::asset('images/article/'.$article->title_image)}}" alt="post">
                                
                                    <div class="img__overlay">                                        
                                        <span class="yn__read-more">Read More</span>
                                        <div class="yn__read-time">
                                            <div class="meta-reading-time">
                                                <span>
                                                    <i class="bi bi-clock"></i>
                                                </span>
                                                {{$article->read_time}} minute read
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="meta-category">
                                <a href="{{url('category'.$category->slug)}}">
                                    {{$category->category}}
                                </a>
                            </div>
                            <div class="post__title meta-title">
                                <h5>
                                    <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                        {{$article->title}}
                                    </a>
                                </h5>
                            </div>
                            <div class="meta-date">
                                <?=date_format(date_create($article->created_at), "F j, Y")?>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Agenda Section -->

    <!-- Our Scoops Section -->
    <section class="yn-section scoop">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-2 d-flex align-items-center">
                    <h2 class="scoop__title">
                        {{ App\Http\Controllers\DashboardController​::get_meta('sscoop_heading')}}
                    </h2>
                </div>                
                <div class="col-12 col-md-10">
                    <div class="row">
                        <?php $ids = unserialize(App\Http\Controllers\DashboardController​::get_meta('sscoop_articles'));?>
                        @foreach($ids as $id)
                        <?php $article = App\Models\Article::select('id','title','subtitle','title_image','slug','read_time','created_at','category')->where('id', (int)$id)->first();?>
                        <div class="col-12 col-md-4 scoop-item">
                            <div class="d-flex">
                                <div class="scoop_image me-2">
                                    <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">                                        
                                        <img height="80" loading="lazy"width="80" class="rounded-circle" src="{{URL::asset('images/article/'.$article->title_image)}}" alt="scoop">
                                    </a>
                                </div>
                                <div class="scoop_data">
                                    <div class="yn_article-title meta-title">
                                        <h5>
                                            <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                                {{$article->title}}
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="meta-date">
                                        <?=date_format(date_create($article->created_at), "F j, Y")?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Scoops Section -->

    <!-- Full Screen News Section -->
    <div class="fs-title">
        <h2>
            {{ App\Http\Controllers\DashboardController​::get_meta('sfullscreen_heading')}}
        </h2>
    </div>
    <section class="yn-section fullscreen-news">
        <div class="yn-overlay__background-wrapper">
            <?php $ids = unserialize(App\Http\Controllers\DashboardController​::get_meta('sfullscreen_articles'));$count=0;?>
            @foreach($ids as $id)
            <?php $article = App\Models\Article::select('title_image')->where('id', (int)$id)->first();?>
            <div class="yn-overlay__background {{($count==0)? 'active' : ''}}">
                <img loading="lazy"class="w-100" src="{{URL::asset('images/article/'.$article->title_image)}}" alt="">
            </div>
            <?php $count++;?>
            @endforeach
        </div>
        <div class="yn-layout-large__inner">
            <div class="row">
                <?php $ids = unserialize(App\Http\Controllers\DashboardController​::get_meta('sfullscreen_articles'));$count=0;?>
                @foreach($ids as $id)
                <?php $article = App\Models\Article::select('id','title','slug')->where('id', (int)$id)->first();?>
                <div class="col-12 col-md-6 yn-layout-large__col {{($count==0)? 'active' : ''}}">
                    <div class="yn-entry">
                        <div class="yn-entry__outer">
                            <div class="yn-entry__inner meta-title {{($count==0)? 'ps-md-0':'pe-md-0'}}">
                                <h4>
                                    <a href="{{url($article->slug)}}">
                                        {{$article->title}}
                                    </a>
                                </h4>
                            </div>
                            <a href="{{url('article/'.$article->id.'/'.$article->slug)}}" class="yn-overlay-link"></a>
                        </div>
                    </div>
                </div>
                <?php $count++;?>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Full Screen News Section -->    

    <!-- Grid News Section -->
    <section class="yn-section grid-news">
        <div class="title">
            <h2>
                {{ App\Http\Controllers\DashboardController​::get_meta('sgthree_heading')}}
            </h2>
        </div>
        <div class="container">
            <div class="grid-of-3">
                <div class="row">
                    <?php $ids = unserialize(App\Http\Controllers\DashboardController​::get_meta('sgthree_articles'));?>
                    @foreach($ids as $id)
                    <?php $article = App\Models\Article::select('id','title','subtitle','title_image','slug','read_time','created_at','category')->where('id', (int)$id)->first();?>
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="article__outer">
                            <div class="article__img mb-2 img__wrap">
                                <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                    <img height="240" loading="lazy"class="w-100" src="{{URL::asset('images/article/'.$article->title_image)}}" alt="post">
                                
                                    <div class="img__overlay">
                                        <span class="yn__read-more">Read More</span>
                                        <div class="yn__read-time">
                                            <div class="meta-reading-time">
                                                <span>
                                                    <i class="bi bi-clock"></i>
                                                </span>
                                                {{$article->read_time}} minute read
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="post__title meta-title">
                                <h5>
                                    <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                        {{$article->title}}
                                    </a>
                                </h5>
                            </div>
                            <div class="meta-date">
                                <?=date_format(date_create($article->created_at), "F j, Y")?>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="grid-of-5">
                <div class="row row-cols-md-5 row-cols-1">
                    <?php $ids = unserialize(App\Http\Controllers\DashboardController​::get_meta('sgfive_articles'));?>
                    @foreach($ids as $id)
                    <?php $article = App\Models\Article::select('id','title','subtitle','title_image','slug','read_time','created_at','category')->where('id', (int)$id)->first();?>
                    <div class="col mb-4 mb-md-0">
                        <div class="article__outer">
                            <div class="article__img mb-2 img__wrap">
                                <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                    <img height="140" loading="lazy"class="w-100" src="{{URL::asset('images/article/'.$article->title_image)}}" alt="post">
                                
                                    <div class="img__overlay">
                                        <span class="yn__read-more">Read More</span>
                                        <div class="yn__read-time">
                                            <div class="meta-reading-time">
                                                <span>
                                                    <i class="bi bi-clock"></i>
                                                </span>
                                                {{$article->read_time}} minute read
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="post__title meta-title">
                                <h6>
                                    <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                        {{$article->title}}
                                    </a>
                                </h6>
                            </div>
                            <div class="meta-date">
                                <?=date_format(date_create($article->created_at), "F j, Y")?>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Election News Section -->

    <!-- Inline Infinite Scroll -->
    <section class="yn-section infinite-scroll">
        <div class="container">
            <div class="title">
                <h2>
                    {{ App\Http\Controllers\DashboardController​::get_meta('slast_heading')}}
                </h2>
            </div>
            <div class="scroll-wrapper">
                <div class="scroll__inner">
                    <?php $articles = App\Models\Article::select('id','title','subtitle','title_image','slug','read_time','created_at','category')->orderBy('created_at', 'desc')->paginate(5);?>
                    @foreach($articles as $article)                            
                    <?php $category = App\Models\Category::where('id',$article->category)->first();?>
                    <article class="yn__infinite-item">
                        <div class="item-outer row">
                            <div class="item__image col-12 col-md-4 mb-3 mb-md-0">
                                <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                    <img height="200" class="w-100" loading="lazy"src="{{URL::asset('images/article/'.$article->title_image)}}" alt="">
                                </a>
                            </div>
                            <div class="item-content col-12 col-md-8">
                                <div class="meta-category">
                                    <a href="{{url('category/'.$category->slug)}}">{{$category->category}}</a>
                                </div>
                                <div class="meta-title">
                                    <h4>
                                        <a href="{{url('article/'.$article->id.'/'.$article->slug)}}">
                                            {{$article->title}}
                                        </a>
                                    </h4>
                                </div>
                                <div class="meta-subtitle">
                                    {{$article->subtitle}}
                                </div>
                                <div class="meta-date">
                                    <?=date_format(date_create($article->created_at), "F j, Y")?>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>                
                <button class="yn__loadmore" data-url="{{url('ajax-load-more')}}" data-nextPage="{{$articles->currentPage()+1}}" data-lastPage="{{$articles->lastPage()}}">
                    load more
                </button>
            </div>
        </div>
    </section>
    <!-- End Inline Infinite Scroll -->
</div>
@endsection