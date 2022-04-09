const productsCategories = document.querySelector('.products-categories-page');

if (productsCategories) {
  const createBtn = document.querySelector('[data-action="create-category"]'),
    updateBtns = productsCategories.querySelectorAll('[data-action="update-category"]'),
    deleteBtns = productsCategories.querySelectorAll('[data-action="delete-category"]'),
    createModal = productsCategories.querySelector('.create-modal'),
    updateModal = productsCategories.querySelector('.update-modal'),
    confirmModal = productsCategories.querySelector('.confirm-modal'),
    updateInput = updateModal.querySelector('[name="id"]'),
    ruTitleInput = updateModal.querySelector('[name="ru-title"]'),
    enTitleInput = updateModal.querySelector('[name="en-title"]'),
    confirmInput = confirmModal.querySelector('[name="id"]');
  //* confirm-modal start
  deleteBtns.forEach(button => {
    button.onclick = () => {
      confirmModal.classList.remove('hidden');
      confirmInput.value = button.dataset.category;
    };
  });
  confirmModal.addEventListener('click', e => {
    if (e.target.className == 'confirm-modal' || e.target.dataset.action == 'cancel') {
      confirmModal.classList.add('hidden');
      confirmInput.value = '';
    }
  });
  //* confirm-modal end
  //* confirm-modal start
  createBtn.onclick = () => {
    createModal.classList.remove('hidden');
  };
  createModal.addEventListener('click', e => {
    if (e.target.className == 'create-modal' || e.target.dataset.action == 'cancel') {
      createModal.classList.add('hidden');
    }
  });
  //* confirm-modal end
  //* confirm-modal start
  updateBtns.forEach(button => {
    button.onclick = () => {
      updateModal.classList.remove('hidden');
      updateInput.value = button.dataset.id;
      ruTitleInput.value = button.dataset.ru;
      enTitleInput.value = button.dataset.en;
    };
  });
  updateModal.addEventListener('click', e => {
    if (e.target.className == 'update-modal' || e.target.dataset.action == 'cancel') {
      updateModal.classList.add('hidden');
      updateInput.value = '';
    }
  });
  //* confirm-modal end
}
