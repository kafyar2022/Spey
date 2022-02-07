const body = document.querySelector('body'),
  homePage = body.querySelector('.home-page');

if (homePage) {
  // values start
  $('.values-carousel').owlCarousel({
    nav: false,
    items: 6,
    mouseDrag: false,
    responsive: {
      0: {
        mouseDrag: true,
        autoWidth: true,
        loop: true,
        margin: 32,
      },
      834: {
        mouseDrag: true,
        autoWidth: true,
        loop: true,
        margin: 32,
      },
      1300: {
        loop: false,
        margin: 48,
      }
    }
  });
  // values end
  // industry-news start
  $('.industry-news-carousel').owlCarousel({
    nav: false,
    mouseDrag: false,

    responsive: {
      0: {
        mouseDrag: true,
        loop: true,
        autoWidth: true,
        margin: 32,
      },
      834: {
        mouseDrag: true,
        loop: true,
        autoWidth: true,
        margin: 32,
      },
      1300: {
        margin: 96,
        items: 4,
      }
    }
  });
  // industry-news end
  // popular products carousel start
  $('.popular-products-carousel').owlCarousel({
    nav: false,
    mouseDrag: false,
    responsive: {
      0: {
        mouseDrag: true,
        loop: true,
        margin: 0,
        items: 1,
      },
      834: {
        mouseDrag: true,
        loop: true,
        margin: 24,
        items: 2,
      },
      1300: {
        margin: 0,
        items: 6,
      }
    }
  });
  // popular products carousel end

}