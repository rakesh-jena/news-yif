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
                                politics
                            </div>
                        </div>
                        <h1 class="ynps__article-header-title">                            
                            Indian Governance: The Lok Sabha Election                            
                        </h1>
                        <div class="ynps__article-header-subtitle">
                            <p>
                                The first-term Congress member faced backlash in recent weeks for using “red-baiting” tactics to attack Democrat Jay Chen.
                            </p>
                        </div>
                        <div class="ynps__article-header-meta d-flex">
                            <div class="ynps__article-header-meta-author">
                                <a class="d-flex" href="#">
                                    <div class="ynps__author-avatar">
                                        <img class="rounded-circle" src="{{ URL::asset('images/author/test.jpg') }}" alt="">
                                    </div>
                                    <span>by <strong>Cian Dreyar</strong></span>
                                </a>
                            </div>
                            <div class="ynps__article-header-meta-date">
                                <span>
                                    <?=date('M j, Y')?>
                                </span>
                            </div>
                        </div>
                        <div class="ynps__article-header-img-outer">
                            <figure class="ynps__article-header-figure">
                                <img class="img-fluid" src="{{ URL::asset('images/article/art-header.png') }}" alt="header">
                            </figure>                        
                            <figcaption class="ynps__article-header-caption">
                                Rep. Michelle Steel (R). Photo courtesy of the campaign.
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
                                                    Incumbent Rep. Michelle Steel (R) defeated Jay Chen (D) in California’s 45th congressional district on Tuesday following a controversial race in which public officials condemned Steel for using “red-baiting” tactics against her opponent, the Associated Press reports.
                                                </strong>
                                            </p>
                                            <p>
                                                Steel successfully flipped California’s 48th congressional district from blue to red in 2020, but chose to run in the 45th district following last year’s redistricting.
                                            </p>
                                            <p>
                                                Despite the recent leftward shift in historically conservative Orange County, Steel’s victory confirms that trust on issues like the economy and cost of living still lies with the Republican Party, particularly among Vietnamese Americans. Steel, who has edged further right-wing compared to fellow Republican Rep. Young Kim (California), ran on a platform of lowering taxes for all Californians, reducing crime, and combating homelessness. She has taken a hardline stance on abortion and opposes marriage equality.
                                            </p>
                                            <p>
                                                Roughly a third of the new district’s registered voters are Asian American—and over 16% are Vietnamese American. Before redistricting last year, only one district was majority Asian American. Just two held pluralities of 40% or greater despite the state’s significant Asian American population. Redistricting was intended to better account for rapid growth in Orange County’s Asian American community over the past decade. 
                                            </p>
                                            <p>
                                                Kim drew early and sustained support from the Republican National Committee, which launched its first Asian Pacific American community center in Orange County in a bid to target AAPI voters. Her campaign, however, has been embroiled in multiple high-profile controversies this cycle. 
                                            </p>
                                            <p>
                                                In the weeks leading up to Election Day, Steel’s campaign distributed fliers and released an ad claiming that Chen—a second-generation Taiwanese American and U.S. Navy veteran—had Communist ties.
                                            </p>
                                            <p>
                                                The ploy was part of an attempt to target strong anti-communist sentiments among Vietnamese Americans, who have historically leaned more conservative compared to other Asian groups. Prominent Asian American lawmakers condemned the“red-baiting” tactic for its exploitation of harmful stereotypes.
                                            </p>
                                            <p>
                                                Chen faced a slew of criticism himself after he claimed “you kind of need an interpreter” to understand Steel’s words earlier this year. “My accent is my story,” Steel, who along with Kim is the first Korean immigrant to hold congressional office, wrote in an opinion piece in response. 
                                            </p>
                                        </div>
                                        <div class="ynps__article-content-footer">
                                            <div class="ynps__article-content-footer-briefing">
                                                <em>
                                                    The Yappie is your must-read briefing on AAPI power, politics, and influence, fiscally sponsored by the Asian American Journalists Association. Make a donation, subscribe, and follow us on Twitter (@theyappie). Send tips and feedback to editors@theyappie.com.
                                                </em>
                                            </div>
                                            <div class="ynps__article-content-footer-tags">
                                                <ul class="yn__tag-list">
                                                    <li class="yn__tag-item">
                                                        <a href="{{ url('#') }}">campaign</a>
                                                    </li>
                                                    <li class="yn__tag-item">
                                                        <a href="{{ url('#') }}">congress</a>
                                                    </li>
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
                                                        <img class="rounded-circle" src="{{ url::asset('images/author/test.jpg') }}" alt="author">
                                                    </a>
                                                    <div class="ynps__article-content-footer-author-info">
                                                        <span class="ynps__article-content-footer-author-position">
                                                            author
                                                        </span>
                                                        <div class="ynps__article-content-footer-author-name">
                                                            <a href="{{ url('#') }}">
                                                                Cian Dreyar
                                                            </a>
                                                            <div class="ynps__article-content-footer-author-social"></div>
                                                        </div>
                                                        <div class="ynps__article-content-footer-author-description">
                                                            <p>
                                                                Cindy Xie is a staff writer at The Yappie. You can reach her at editors@theyappie.com.
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