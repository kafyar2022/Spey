const historiesUpdate = document.querySelector('.histories-update-page');

if (historiesUpdate) {
    const editors = document.getElementsByClassName('simditor-textarea'),
        textareas = [],
        deleteBtn = historiesUpdate.querySelector('[data-action="delete-product"]'),
        confirmModal = historiesUpdate.querySelector('.confirm-modal');
    //* confirm-modal start
    deleteBtn.onclick = () => {
        confirmModal.classList.remove('hidden');
    };
    confirmModal.addEventListener('click', e => {
        if (e.target.className == 'confirm-modal' || e.target.dataset.action == 'cancel') {
            confirmModal.classList.add('hidden');
        }
    });
    //* confirm-modal end
}