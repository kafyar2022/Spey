const productsPage = document.querySelector('.products-page');

if (productsPage) {
  const deleteBtns = productsPage.querySelectorAll('[data-action="delete-product"]'),
    confirmModal = productsPage.querySelector('.confirm-modal'),
    confirmInput = confirmModal.querySelector('[name="id"]');
  //* confirm-modal start
  deleteBtns.forEach(button => {
    button.onclick = () => {
      confirmModal.classList.remove('hidden');
      confirmInput.value = button.dataset.product;
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
