@extends('web')

@section('content')
<div id="page">
    <!-- First Section -->
    <section class="yn-section first">
        <div class="container">
            <div class="row">
                <!-- Lastest News -->
                <div class="col-md-3">
                    <div class="yn-sf__column latest-news">
                        <div class="yn-sf__column__header">
                            <div class="yn-sf__column__title">
                                <h2>THE LATEST</h2>
                            </div>
                            <div>
                                <span>
                                    <?php echo date('M j, Y');?>
                                </span>
                            </div>
                        </div>
                        <div class="yn-sf__column__body">
                            <article class="latest-post__outer">
                                <div class="latest-post__inner d-flex">
                                    <div class="latest-post__data">
                                        <div class="latest-post__content">
                                            <div class="latest-post__meta">
                                                <div class="latest-post__meta-category"></div>
                                            </div>
                                            <h5 class="latest-post__title"></h5>
                                            <div class="latest-post__meta">
                                                <div class="latest-post__meta-date"></div>
                                            </div>
                                        </div>
                                        <div class="latest-post__thumbnail">
                                            <img src="#" alt="thumbnail">
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

                <!-- Single News -->
                <div class="col-md-6">
                    <div class="yn-sf__column single-news">
                        <div class="single-post__thumbnail">
                            <a href="#">
                                <img src="#" alt="thumbnail">
                            </a>
                        </div>
                        <div class="single-post__body">
                            <div class="watching-post__meta">
                                <div class="watching-post__meta-category"></div>
                            </div>
                            <div class="single-post__title">
                                <h2>
                                    <a href="#"></a>
                                </h2>
                            </div>
                            <div class="single-post__sub-title">
                                <p></p>
                            </div>
                            <div class="watching-post__meta">
                                <div class="watching-post__meta-date"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Watching News -->
                <div class="col-md-3">
                    <div class="yn-sf__column watching">
                        <div class="yn-sf__column__header">
                            <div class="yn-sf__column__title">
                                <h2>WHAT WE'RE WATCHING</h2>
                            </div>
                        </div>
                        <div class="yn-sf__column__body">
                            <article class="watching-post__first">
                                <div class="yn-entry__outer">
                                    <div class="yn-entry__inner">
                                        <a href="https://youngindiafdn.medium.com/do-the-youth-of-the-country-actually-value-their-vote-6c2e01db0093" target="_blank">
                                            <div class="yn-entry__image">
                                                <img src="images/news-1.jpeg" alt="News">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="yn-entry__inner">
                                        <h2 class="yn-entry__title">
                                            <a href="https://youngindiafdn.medium.com/do-the-youth-of-the-country-actually-value-their-vote-6c2e01db0093" target="_blank">
                                                Do the Youth of the Country Actually Value Their Vote?
                                            </a>
                                        </h2>
                                        <div class="yn-entry_meta">
                                            <div class="yn-meta-date">
                                                Feb 9, 2020
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="watching-post__outer">
                                <div class="watching-post__inner d-flex">
                                    <div class="watching-post__thumbnail">
                                        <img src="#" alt="thumbnail">
                                    </div>
                                    <div class="watching-post__content">
                                        <div class="watching-post__data">
                                            <h5 class="watching-post__title"></h5>
                                            <div class="watching-post__meta">
                                                <div class="watching-post__meta-date"></div>
                                            </div>
                                        </div>
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
        <div class="yn-featured__outer">
            <div class="yn-featured__banner">
            </div>
            <div class="yn-featured__content">
                <div class="container">
                    <div class="yn-featured__category"></div>
                    <div class="yn-featured__title">
                        <h1>
                            <a href="#"></a>
                        </h1>
                    </div>
                    <div class="yn-featured__excerpt"></div>
                    <div class="yn-featured__post-meta">
                        <div class="yn-featured__post-author"></div>
                        <div class="yn-featured__post-date"></div>
                    </div>
                </div>
            </div>            
        </div>
    </section>
    <!-- End Featured Section -->

    <!-- Our Agenda Section -->
    <!-- End Our Agenda Section -->

    <!-- Our Scoops Section -->
    <!-- End Our Scoops Section -->

    <!-- Full Screen News Section -->
    <!-- End Full Screen News Section -->

    <!-- Election News Section -->
    <!-- End Election News Section -->

    <!-- Election News Section -->
    <!-- End Election News Section -->
</div>