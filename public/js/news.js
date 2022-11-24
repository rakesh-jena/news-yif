(function(){
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
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 80) {
                backtotop.classList.add('active')
                navbar.classList.add('scrolled')
                navbar.classList.remove('bg-white')
                navbar.classList.add('bg-black')
            } else {
                backtotop.classList.remove('active')
                navbar.classList.remove('scrolled')
                navbar.classList.remove('bg-black')
                navbar.classList.add('bg-white')
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
})();