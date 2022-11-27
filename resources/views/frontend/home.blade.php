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
                        <span class="d-flex">election 2024</span>
                    </h6>
                </div>
                <div class="news-title meta-title">
                    <h1>
                        With California wins, GOP clinches House control
                    </h1>
                </div>
                <p class="news-subtitle meta-subtitle">
                    Midterms: Incumbent Republicans Young Kim and Michelle Steel fend off challenges. Full coverage.
                </p>
                <hr>
                <p class="news-sub-sub-title meta-subtitle">
                    Results: Tokuda, Thanedar score victories; Democrats’ hold on Asian American voters slips; most GOP candidates falter. Read more.
                </p>
            </div>
            <div class="row">
                <?php for($i = 0; $i<2; $i++) { ?>
                <div class="col-12 col-md-6">
                    <div class="mb-2">
                        <img class="w-100" src="{{URL::asset('images/others/joshua-sukoff-SYHi8oX0JC8-unsplash-768x512.jpg')}}" alt="">
                    </div>
                    <div class="meta-title">
                        <h3>
                            <a href="#">
                                Election briefing: Incumbents dominate as GOP’s Asian American hopefuls are shut out
                            </a>
                        </h3>
                    </div>
                    <div class="meta-date">
                        November 23, 2024
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- End Election News Section -->

    <!-- First Section -->
    <section class="yn-section first">
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
                            <article class="latest-post__outer">
                                <div class="latest-post__inner">
                                    <div class="latest-post__data d-flex">
                                        <div class="latest-post__thumbnail">
                                            <img loading="lazy"width="80" height="80" src="{{ URL::asset('images/others/289538617_438191711463423_3215499776845285901_nE-80x80.jpg')}}" alt="thumbnail">
                                        </div>
                                        <div class="latest-post__content">
                                            <div class="latest-post__meta">
                                                <div class="meta-category">
                                                    politics
                                                </div>
                                            </div>
                                            <h6 class="latest-post__title meta-title">
                                                Republican Dean Tran loses bid to become Massachusetts’ first Asian American Congress member
                                            </h6>
                                            <div class="latest-post__meta">
                                                <div class="meta-date">
                                                    November 9, 2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="latest-post__outer">
                                <div class="latest-post__inner">
                                    <div class="latest-post__data d-flex">
                                        <div class="latest-post__thumbnail">
                                            <img loading="lazy"width="80" height="80" src="{{ URL::asset('images/others/289538617_438191711463423_3215499776845285901_nE-80x80.jpg')}}" alt="thumbnail">
                                        </div>
                                        <div class="latest-post__content">
                                            <div class="latest-post__meta">
                                                <div class="meta-category">
                                                    politics
                                                </div>
                                            </div>
                                            <h6 class="latest-post__title meta-title">
                                                Republican Dean Tran loses bid to become Massachusetts’ first Asian American Congress member
                                            </h6>
                                            <div class="latest-post__meta">
                                                <div class="meta-date">
                                                    November 9, 2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="latest-post__outer">
                                <div class="latest-post__inner">
                                    <div class="latest-post__data d-flex">
                                        <div class="latest-post__thumbnail">
                                            <img loading="lazy"width="80" height="80" src="{{ URL::asset('images/others/289538617_438191711463423_3215499776845285901_nE-80x80.jpg')}}" alt="thumbnail">
                                        </div>
                                        <div class="latest-post__content">
                                            <div class="latest-post__meta">
                                                <div class="meta-category">
                                                    politics
                                                </div>
                                            </div>
                                            <h6 class="latest-post__title meta-title">
                                                Republican Dean Tran loses bid to become Massachusetts’ first Asian American Congress member
                                            </h6>
                                            <div class="latest-post__meta">
                                                <div class="meta-date">
                                                    November 9, 2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

                <!-- Single News -->
                <div class="col-md-6 border-sn">
                    <div class="yn-sf__column single-news">
                        <div class="single-post__thumbnail mb-4 img__wrap">
                            <a href="#">
                                <img loading="lazy"class="w-100" src="{{URL::asset('images/others/lanhee-chen-2-800x500.jpg')}}" alt="thumbnail">
                            </a>
                            <div class="img__overlay">
                                <span class="yn__read-more">Read More</span>
                                <div class="yn__read-time">
                                    <div class="meta-reading-time">
                                        <span>
                                            <i class="bi bi-clock"></i>
                                        </span>
                                        3 minute read
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-post__body">
                            <div class="single-post__meta">
                                <div class="meta-category">
                                    politics
                                </div>
                            </div>
                            <div class="single-post__title meta-title">
                                <h2>
                                    <a href="#">
                                        Republican Lanhee Chen concedes in race for California controller after an ambitious campaign
                                    </a>
                                </h2>
                            </div>
                            <div class="single-post__sub-title meta-subtitle">
                                <p>
                                    Chen, who would've been the first Republican elected to statewide office since 2006, campaigned on his ability to hold Democrats accountable in state spending.
                                </p>
                            </div>
                            <div class="single-post__meta">
                                <div class="meta-date">
                                    November 15, 2022
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
                            <article class="watching-post__first">
                                <div class="yn-entry__outer">
                                    <div class="yn-entry__inner">
                                        <a href="https://youngindiafdn.medium.com/do-the-youth-of-the-country-actually-value-their-vote-6c2e01db0093" target="_blank">
                                            <div class="yn-entry__image">
                                                <img loading="lazy"class="w-100" src="{{URL::asset('images/others/Red-Hill-fuel-leak-v9-380x280.jpeg')}}" alt="News">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="meta-category mt-2">
                                        <a href="#">newsletter</a>
                                    </div>
                                    <div class="yn-entry__inner">
                                        <h2 class="yn-entry__title meta-title">
                                            <a href="https://youngindiafdn.medium.com/do-the-youth-of-the-country-actually-value-their-vote-6c2e01db0093" target="_blank">
                                                Do the Youth of the Country Actually Value Their Vote?
                                            </a>
                                        </h2>
                                        <div class="yn-entry_meta">
                                            <div class="meta-date">
                                                Feb 9, 2020
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="watching-post__outer">
                                <div class="watching-post__inner d-flex">
                                    <div class="watching-post__content">
                                        <div class="watching-post__data">
                                            <h6 class="watching-post__title meta-title">
                                                Where affirmative action stands in Asian America
                                            </h6>
                                            <div class="watching-post__meta">
                                                <div class="meta-date">
                                                    November 7, 2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="watching-post__thumbnail">
                                        <img loading="lazy"width="80" height="80" src="{{URL::asset('images/others/2022_Roberts_Court_Formal_083122_Web-110x110.jpg')}}" alt="thumbnail">
                                    </div>
                                </div>
                            </article>
                            <article class="watching-post__outer">
                                <div class="watching-post__inner d-flex">
                                    <div class="watching-post__content">
                                        <div class="watching-post__data">
                                            <h6 class="watching-post__title meta-title">
                                                Where affirmative action stands in Asian America
                                            </h6>
                                            <div class="watching-post__meta">
                                                <div class="meta-date">
                                                    November 7, 2022
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="watching-post__thumbnail">
                                        <img loading="lazy"width="80" height="80" src="{{URL::asset('images/others/2022_Roberts_Court_Formal_083122_Web-110x110.jpg')}}" alt="thumbnail">
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End First Section -->

    <!-- Featured News Section -->
    <section class="yn-section featured">
        <div class="title">
            <h2>
                featured
            </h2>
        </div>
        <div class="yn-featured__outer">
            <div class="yn-featured__banner">
                <img loading="lazy"class="w-100" src="{{URL::asset('images/others/52034842342_c968c57fa4_b-3-768x432.jpg')}}" alt="banner">
            </div>
            <div class="yn-featured__content">
                <div class="container">
                    <div class="yn-featured__category meta-category">
                        <a href="#">policy</a>
                    </div>
                    <div class="yn-featured__title meta-title mb-4">
                        <h2>
                            <a href="#">
                                A statistical storm: data disaggregation and the debate over AAPI identity
                            </a>
                        </h2>
                    </div>
                    <div class="yn-featured__excerpt meta-subtitle mb-4">
                        For years, efforts to disaggregate Asian American and Pacific Islander data have been slowed by community infighting, government bureaucracy, and bitter debates over identity. But as demand for quality data surges, supporters have reason to hope for movement on the decades-old issue.
                    </div>
                    <div class="ynps__article-header-meta d-flex justify-content-center align-items-center">
                        <div class="ynps__article-header-meta-author">
                            <a class="d-flex" href="#">
                                <div class="ynps__author-avatar">
                                    <img loading="lazy"class="rounded-circle" src="{{URL::asset('images/author/default.png')}}" alt="author">
                                </div>
                                <span>by <strong>Théo Lemonnier</strong></span>
                            </a>
                        </div>
                        <span class="ynps__multiAuthor">and</span>
                        <div class="ynps__article-header-meta-author">
                            <a class="d-flex" href="#">
                                <div class="ynps__author-avatar">
                                    <img loading="lazy"class="rounded-circle" src="{{URL::asset('images/author/default.png')}}" alt="author">
                                </div>
                                <span>by <strong>Théo Lemonnier</strong></span>
                            </a>
                        </div>
                        <span class="ynps__multiAuthor">and</span>
                        <div class="ynps__article-header-meta-author">
                            <a class="d-flex" href="#">
                                <div class="ynps__author-avatar">
                                    <img loading="lazy"class="rounded-circle" src="{{URL::asset('images/author/default.png')}}" alt="author">
                                </div>
                                <span>by <strong>Théo Lemonnier</strong></span>
                            </a>
                        </div>
                        <div class="ynps__article-header-meta-date">
                            <span>
                                Nov 21, 2022
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
                on the agenda
            </h2>
        </div>
        <div class="yn__agenda">
            <div class="container">
                <div class="row">
                    <?php for($i = 0; $i<4; $i++) { ?>
                    <div class="col-12 col-md-3">
                        <div class="article__outer">
                            <div class="article__img mb-3 img__wrap">
                                <a href="#">
                                    <img loading="lazy"class="w-100" src="{{URL::asset('images/others/AllanFung-43-768x492.jpg')}}" alt="post">
                                </a>
                                <div class="img__overlay">
                                    <span class="yn__read-more">Read More</span>
                                    <div class="yn__read-time">
                                        <div class="meta-reading-time">
                                            <span>
                                                <i class="bi bi-clock"></i>
                                            </span>
                                            3 minute read
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="meta-category">
                                politics
                            </div>
                            <div class="post__title meta-title">
                                <h5>
                                    Allan Fung falls short in push for GOP win in deep-blue Rhode Island
                                </h5>
                            </div>
                            <div class="meta-date">
                                November 12, 2022
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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
                    <h4 class="scoop__title">
                        our<br>scoops
                    </h4>
                </div>                
                <div class="col-12 col-md-10">
                    <div class="row">
                        <?php for($i = 0; $i<3; $i++) { ?>
                        <div class="col-12 col-md-4 scoop-item">
                            <div class="d-flex">
                                <div class="scoop_image me-2">
                                    <img loading="lazy"width="80" class="rounded-circle" src="{{URL::asset('images/others/Obma-80x80.jpg')}}" alt="scoop">
                                </div>
                                <div class="scoop_data">
                                    <div class="yn_article-title meta-title">
                                        <h5>
                                            <a href="#">
                                                AAPIs saw ‘significant’ coverage gains after Affordable Care Act rollout, HHS says
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="meta-date">
                                        November 21, 2022
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Scoops Section -->

    <!-- Full Screen News Section -->
    <section class="yn-section fullscreen-news">
        <div class="yn-overlay__background-wrapper">
            <div class="yn-overlay__background active">
                <img loading="lazy"class="w-100" src="{{URL::asset('images/others/Yappie-Background-1160x659.png')}}" alt="">
            </div>
            <div class="yn-overlay__background">
                <img loading="lazy"class="w-100" src="{{URL::asset('images/others/1_ytyuJLaRrQ_wOEjNSvPrJQ-1160x776.jpeg')}}" alt="">
            </div>
        </div>
        <div class="yn-layout-large__inner">
            <div class="row">
                <div class="col-12 col-md-6 yn-layout-large__col active">
                    <div class="yn-entry">
                        <div class="yn-entry__outer">
                            <div class="yn-entry__inner meta-title">
                                <h4>
                                    <a href="#">
                                        The Yappie’s guide for AAPI interns in Washington, D.C.
                                    </a>
                                </h4>
                            </div>
                            <a href="#" class="yn-overlay-link"></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 yn-layout-large__col">
                    <div class="yn-entry">
                        <div class="yn-entry__outer">
                            <div class="yn-entry__inner meta-title">
                                <h4>
                                    <a href="#">
                                        The Yappie’s guide for AAPI interns in Washington, D.C.
                                    </a>
                                </h4>
                            </div>
                            <a href="#" class="yn-overlay-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Full Screen News Section -->    

    <!-- Grid News Section -->
    <section class="yn-section grid-news">
        <div class="container">
            <div class="grid-of-3">
                <div class="row">
                    <?php for($i = 0; $i<3; $i++) { ?>
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="article__outer">
                            <div class="article__img mb-2 img__wrap">
                                <a href="#">
                                    <img loading="lazy"class="w-100" src="{{URL::asset('images/others/304048374_177326704859204_2374254376936713355_n-768x512.jpg')}}" alt="post">
                                </a>
                                <div class="img__overlay">
                                    <span class="yn__read-more">Read More</span>
                                    <div class="yn__read-time">
                                        <div class="meta-reading-time">
                                            <span>
                                                <i class="bi bi-clock"></i>
                                            </span>
                                            3 minute read
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post__title meta-title">
                                <h5>
                                    Allan Fung falls short in push for GOP win in deep-blue Rhode Island
                                </h5>
                            </div>
                            <div class="meta-date">
                                November 12, 2022
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="grid-of-5">
                <div class="row row-cols-md-5 row-cols-1">
                    <?php for($i = 0; $i<5; $i++) { ?>
                    <div class="col mb-4 mb-md-0">
                        <div class="article__outer">
                            <div class="article__img mb-2 img__wrap">
                                <a href="#">
                                    <img loading="lazy"class="w-100" src="{{URL::asset('images/others/304048374_177326704859204_2374254376936713355_n-768x512.jpg')}}" alt="post">
                                </a>
                                <div class="img__overlay">
                                    <span class="yn__read-more">Read More</span>
                                    <div class="yn__read-time">
                                        <div class="meta-reading-time">
                                            <span>
                                                <i class="bi bi-clock"></i>
                                            </span>
                                            3 minute read
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post__title meta-title">
                                <h6>
                                    Allan Fung falls short in push for GOP win in deep-blue Rhode Island
                                </h6>
                            </div>
                            <div class="meta-date">
                                November 12, 2022
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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
                    AAPI NATION
                </h2>
            </div>
            <div class="scroll-wrapper">
                <div class="scroll__inner">
                    <?php for($i = 0; $i<5; $i++) { ?>
                    <article class="yn__infinite-item">
                        <div class="item-outer row">
                            <div class="item__image col-12 col-md-4 mb-3 mb-md-0">
                                <img class="w-100" loading="lazy"src="{{URL::asset('images/others/Bee-Nguyen-Final-380x253.jpg')}}" alt="">
                            </div>
                            <div class="item-content col-12 col-md-8">
                                <div class="meta-category">
                                    politics
                                </div>
                                <div class="meta-title">
                                    <h4>
                                        <a href="#">
                                            Meet the Asian American candidates hoping to make history in key states
                                        </a>
                                    </h4>
                                </div>
                                <div class="meta-subtitle">
                                    With a week left to go in this year’s midterm elections, here are some of the national and state races we’re watching.
                                </div>
                                <div class="meta-date">
                                    November 13, 2022
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End Inline Infinite Scroll -->
</div>
@endsection