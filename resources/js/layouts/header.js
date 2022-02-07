const header = document.querySelector('.header');

if (header) {
    const sitesDropdown = header.querySelector('.sites-dropdown'),
        sitesDropdownBtn = sitesDropdown.querySelector('.sites-dropdown__button'),
        searchWrap = document.querySelector('.search'),
        searchForm = searchWrap.querySelector('.search-form'),
        searchInput = searchForm.querySelector('.search-input'),
        searchBtn = searchForm.querySelector('.search-submit-btn'),
        langsDropdown = header.querySelector('.langs-dropdown'),
        langsDropdownBtn = langsDropdown.querySelector('.langs-dropdown__button'),
        resultWrap = document.querySelector('.search-result'),
        body = document.querySelector('body');

    //* sites dropdown start
    sitesDropdownBtn.onclick = e => {
        e.preventDefault();
        sitesDropdown.classList.toggle('show');
    };
    body.addEventListener('click', e => {
        if (e.target.dataset.family != 'sites-dropdown' && sitesDropdown.classList.contains('show')) {
            sitesDropdown.classList.remove('show');
        }
    });
    //* sites dropdown end
    //* search start
    searchBtn.onclick = e => {
        e.preventDefault();
    };
    body.addEventListener('click', e => {
        if (e.target.dataset.family != 'search' && !searchForm.classList.contains('hidden')) {
            searchWrap.classList.add('hidden');
            resultWrap.innerHTML = '';
            searchForm.reset();
        }
    });
    searchInput.onkeyup = () => {
        const keyword = searchInput.value;

        $.ajax({
            url: `/search?keyword=${keyword}`,

            success: function (result) {
                resultWrap.innerHTML = result;
            }
        });
    };
    //* search end
    //* langs dropdown start 
    langsDropdownBtn.onclick = e => {
        langsDropdown.classList.toggle('show');
    };
    body.addEventListener('click', e => {
        if (e.target.dataset.family != 'langs-dropdown' && langsDropdown.classList.contains('show')) {
            langsDropdown.classList.remove('show');
        }
    });
    //* langs dropdown end
    //* main navigation start
    const hamburder = header.querySelector('.hamburger'),
        navigationWrap = header.querySelector('.main-navigation__container'),
        closeBtn = navigationWrap.querySelector('.main-navigation-btn');       

        hamburder.onclick = () => {
            navigationWrap.classList.remove('hidden');
        };
        closeBtn.onclick = () => {
            navigationWrap.classList.add('hidden');
        };
        navigationWrap.addEventListener('click', e => {
            if (e.target.dataset.id == 'navigation-wrap') {
                navigationWrap.classList.add('hidden');
            }
        });
    //* main navigation end
}