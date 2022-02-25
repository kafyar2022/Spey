const aboutPage = document.querySelector('.about-page');

if (aboutPage) {

  const historySection = aboutPage.querySelector('#history');
  const viewAllBtn = aboutPage.querySelector('.our-history__view-all-btn');

  viewAllBtn.addEventListener('click', () => {
    historySection.classList.toggle('hidden');
  });

  const historyItems = aboutPage.querySelectorAll('.histories__item');

  if (window.screen.width < 1300 && window.screen.width > 833) {
    historyItems.forEach((item, index) => {
      item.dataset.row = Math.ceil((index + 1) / 2);
    });
  }
  if (window.screen.width >= 1300 && window.screen.width > 833) {
    historyItems.forEach((item, index) => {
      item.dataset.row = Math.ceil((index + 1) / 3);
    });
  }

  historyItems.forEach(item => {
    item.addEventListener('click', () => {
      historyItems.forEach(element => {
        element.classList.remove('show');
      });
      const items = historySection.querySelectorAll(`[data-row="${item.dataset.row}"]`);
      items.forEach(element => {
        !element.classList.contains('show') ? element.classList.add('show') : element.classList.remove('show');
      });
    });
  });

  document.body.addEventListener('click', (evt) => {
    if (evt.target.dataset.family !== 'history') {
      historyItems.forEach(element => {
        element.classList.remove('show');
      });
      historySection.classList.add('hidden');
    }
  });




  //* company in numbers start
  $('.company-carousel').owlCarousel({
      loop: true,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      nav: true,
      margin: 24,
      // autoWidth: true,
      responsive: {
        0: {
          items: 1,
        },
        834: {
          margin: 16,
          items: 2,
        },
        1300: {
          items: 3,
        }
      }
    })
    //* company in numbers end
  $('.values-carousel').owlCarousel({
    nav: false,
    items: 6,
    responsive: {
      0: {
        autoWidth: true,
        loop: true,
        margin: 32,
      },
      834: {
        autoWidth: true,
        loop: true,
        margin: 32,
      },
      1300: {
        mouseDrag: false,
        loop: false,
        margin: 48,
      }
    }
  });
  $('.rdp-areas-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    margin: 16,
    nav: true,
    items: 1,
  })
}