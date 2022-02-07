const newsRead = document.querySelector('.news-read-page');

if (newsRead) {
    $('.reports-carousel').owlCarousel({
        nav: true,
        items: 3,
        margin: 32,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
                margin: 16,
            },
            834: {
                items: 2,
                margin: 24,
            },
            1300: {
                loop: false,
            }
        }
    });
}