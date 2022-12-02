(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /**
     * Easy selector helper function
     */
     const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    /**
     * Easy on scroll event listener 
     */
     const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
    }
    
    /**
     * Back to top button & Navbar transition
     */
    let backtotop = select('.back-to-top')
    let navbar = select('.navbar')
    let ex_header = select('.yn__extra-header')
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 80) {
                backtotop.classList.add('active')
                navbar.classList.add('scrolled')
                navbar.classList.remove('bg-white')
                navbar.classList.add('bg-black')
                ex_header.classList.remove('bg-white')
                ex_header.classList.add('bg-black')
                ex_header.classList.add('scrolled')
            } else {
                backtotop.classList.remove('active')
                navbar.classList.remove('scrolled')
                navbar.classList.remove('bg-black')
                navbar.classList.add('bg-white')
                ex_header.classList.remove('bg-black')
                ex_header.classList.remove('scrolled')
                ex_header.classList.add('bg-white')
            }
        }
        window.addEventListener('load', toggleBacktotop)
        onscroll(document, toggleBacktotop)
    }

    /**
     * On hover transition of News Section
     */
    $('.yn-layout-large__col').hover(function(){
        var n = $(this).index();
        $(this).addClass('active').siblings().removeClass("active").closest(".fullscreen-news").find('.yn-overlay__background').removeClass("active").eq(n).addClass('active');
    })
    $('.navbar-toggler').on('click', function(){
        if(!$(this).hasClass('collapsed')) {
            $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        }
    });
    /**
     * Search Button
     */
    $('.search_button').on('click', function(){
        $('.yn__search-container').toggleClass('active');
        $('.search__content .search__posts').show();
        $('.search__content .search__tags').show();
        $('.search__content .search__results').removeClass('active');
    })
    $('.search__btn-close').on('click', function(e){
        e.preventDefault();
        $('.search__content .search__results').removeClass('active');
        $('.search__content .search__posts').show();
        $('.search__content .search__tags').show();
        $('.yn__search-container').removeClass('active');
    })
    $('input[name="s"]').keyup(function(){
        var s = $('input[name="s"]').val();
        var url = $('input[name="url"]').val();
        var img_url = $('input[name="img_url"]').val();
        var art_url = $('input[name="article_url"]').val();
        $.ajax({
            url: url,
            type: 'post',
            data:{'s':s},
            success: function(res){
                console.log(res);
                $('.search__content .search__results').addClass('active');
                $('.search__content .search__posts').hide();
                $('.search__content .search__tags').hide();
                if(res.length != 0){
                    $('.search__content .search__results').empty();
                    $.each(res, function(key, value){
                        var date = new Date(value['created_at']);
                        $('.search__content .search__results').append(`<div class="row align-items-center pt-2 pb-2">
                            <div class="col-1">
                                <div class="search_img">
                                    <a href="`+art_url+`/`+value['id']+`/`+value['slug']+`">
                                        <img height="80" width="80" class="rounded-circle" src="`+img_url+`/`+value['title_image']+`" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-11">
                                <h6 class="meta-title">
                                    <a href="`+art_url+`/`+value['id']+`/`+value['slug']+`">
                                        `+value['title']+`
                                    </a>
                                </h6>
                                <div class="meta-date">
                                    `+moment(date).format('LL')+`
                                </div>
                            </div>
                        </div>`);
                    });
                } else {
                    $('.search__content .search__results').empty().append(`<p>No results found.</p>`);
                }
            }
        })
    })

    /**
     * Loadmore Ajax
     */
    $('.yn__loadmore').on('click', function(){
        var url = $(this).data('url');
        var nextPage = $(this).attr('data-nextPage');
        var lastPage = $(this).attr('data-lastPage');
        url += '?page='+nextPage;
        if(lastPage === nextPage){
            $(this).hide();
        }
        $(this).empty().html('loading');
        $.ajax({
            url:url,
            type:'post',
            success: function(res){
                $('.scroll-wrapper .scroll__inner').append(res);
                $('.yn__loadmore').empty().html('load more');
                $('.yn__loadmore').attr('data-nextPage', parseInt(nextPage)+1);
            }
        })
    })
})();