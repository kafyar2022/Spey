const productsPage = document.querySelector('[data-id="products-page"]');
if (productsPage) {
    let page = 1,
        keyword = '',
        filter = 'all',
        category = productsPage.querySelector('[data-id="current-category"]').value;

    if (category == 'null') {
        category = null;
    }

    const productSearchSection = productsPage.querySelector('[data-id="product-search"]'),
        prodCategoriesWrap = productSearchSection.querySelector('[data-id="products-categories"]'),
        categoryLinks = productSearchSection.querySelectorAll('[data-name="category-link"]'),
        searchSubmitBtn = productSearchSection.querySelector('[data-id="search-submit-btn"]'),
        searchInput = productSearchSection.querySelector('[data-id="search-input"]'),
        productsSection = productsPage.querySelector('[data-id="products-section"]'),
        filterWrap = productSearchSection.querySelector('[data-id="product-filter"]'),
        filterLinks = filterWrap.querySelectorAll('[data-action="filter"]'),
        body = document.querySelector('body');

    function search(page, keyword, filter, category) {
        $.ajax({
            type: 'POST',
            url: `/products/search`,
            data: { page, keyword, filter, category },

            success: function (productsList) {
                productsSection.innerHTML = productsList;
            }
        });
    }
    //! product-search section start */
    //* search start
    searchSubmitBtn.addEventListener('click', e => {
        e.preventDefault();
    });
    searchInput.onkeyup = e => {
        e.preventDefault();
        page = 1;
        keyword = searchInput.value;
        filter = 'all';
        category = null;
        filterWrap.classList.remove('with-recipe');
        filterWrap.classList.remove('without-recipe');
        filterLinks.forEach((link, index) => {
            if (index == 0) {
                link.classList.add('current');
            } else {
                link.classList.remove('current');
            }
        });
        categoryLinks.forEach(link => {
            link.classList.remove('current');
        });
        search(page, keyword, filter, category);
    };
    //* search end
    //* filter start
    filterWrap.addEventListener('click', e => {
        filterLinks.forEach(link => {
            link.classList.remove('current')
        });
        e.target.classList.add('current')
        const productFilter = e.target.dataset.filter;
        switch (productFilter) {
            case 'with-recipe':
                filterWrap.classList.remove('without-recipe');
                filterWrap.classList.add('with-recipe');
                filter = 'with-recipe';
                break;

            case 'without-recipe':
                filterWrap.classList.remove('with-recipe');
                filterWrap.classList.add('without-recipe');
                filter = 'without-recipe';
                break;

            default:
                filterWrap.classList.remove('with-recipe');
                filterWrap.classList.remove('without-recipe');
                filter = 'all';
                break;
        }
        page = 1;
        search(page, keyword, filter, category);
    });
    //* filter end
    //* categories start
    body.addEventListener('click', e => {
        if (e.target.dataset.action == 'categories-btn') {
            prodCategoriesWrap.classList.toggle('hidden');
        } else if (e.target.dataset.type == 'category') {
            e.preventDefault();
            if (category == e.target.dataset.category) {
                category = null;;
            } else {
                category = e.target.dataset.category;
            }
            page = 1;
            categoryLinks.forEach(link => {
                if (link.dataset.category == category) {
                    link.classList.add('current');
                } else {
                    link.classList.remove('current');
                }
            });
            search(page, keyword, filter, category);
            if (window.screen.width > 1299) {
                const scrollToEl = productSearchSection.querySelector('#products');
                scrollToEl.scrollIntoView();
            }
        } else if (
            e.target.dataset.action != 'filter'
            && e.target.className != 'page-link'
            && e.target.dataset.type != 'footer-category'
            && e.target.dataset.type != 'product-card'
        ) {
            prodCategoriesWrap.classList.add('hidden');
            category = null;
            categoryLinks.forEach(link => {
                link.classList.remove('current');
            });
            searchInput.value = '';
            keyword = '';
            search(page, keyword, filter, category);
        }
    });
    //* categories end
    //! product-search section start */
    //! all-products section start */
    //* pagination start
    productsSection.addEventListener('click', e => {
        if (e.target.className == 'page-link') {
            e.preventDefault();
            page = e.target.href.split('page=')[1];
            search(page, keyword, filter, category);
        }
    });
    //* pagination end
    //! all-products section end */
}