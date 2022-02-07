const historiesPage = document.querySelector('.histories-page');

if (historiesPage) {
    const deleteBtns = historiesPage.querySelectorAll('[data-action="delete-history"]'),
        confirmModal = historiesPage.querySelector('.confirm-modal'),
        confirmInput = confirmModal.querySelector('[name="id"]');
    //* confirm-modal start
    deleteBtns.forEach(button => {
        button.onclick = () => {
            confirmModal.classList.remove('hidden');
            confirmInput.value = button.dataset.history;
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