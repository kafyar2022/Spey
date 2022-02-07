const newsPage = document.querySelector('.news-page');

if (newsPage) {
    const deleteBtns = newsPage.querySelectorAll('[data-action="delete-news"]'),
        confirmModal = newsPage.querySelector('.confirm-modal'),
        confirmInput = confirmModal.querySelector('[name="id"]');
    //* confirm-modal start
    deleteBtns.forEach(button => {
        button.onclick = () => {
            confirmModal.classList.remove('hidden');
            confirmInput.value = button.dataset.news;
        };
    });
    confirmModal.addEventListener('click', e => {
        if (e.target.className == 'confirm-modal' || e.target.dataset.action == 'cancel') {
            confirmModal.classList.add('hidden');
            confirmInput.value = '';
        }
    });
    //* confirm-modal end
}