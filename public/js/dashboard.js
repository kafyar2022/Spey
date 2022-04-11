/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!******************************************!*\
  !*** ./resources/js/dashboard/master.js ***!
  \******************************************/
//! Ajax request setup
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
var html = document.querySelector('html'),
    modals = html.querySelectorAll('.modal'); //! hide modals start

html.addEventListener('click', function (e) {
  modals.forEach(function (modal) {
    modal.classList.add('hidden');
  });
}); //! hide modals end

window.setPhotoPreview = function (fileChooserEl, previewEl) {
  fileChooserEl.addEventListener('change', function (evt) {
    var file = evt.target.files[0];
    previewEl.src = URL.createObjectURL(file);
    previewEl.style.backgroundColor = 'transparent';
  });
};

window.setFilePreview = function (fileChooserEl, previewEl) {
  fileChooserEl.addEventListener('change', function (evt) {
    previewEl.textContent = evt.target.value;
  });
};
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***********************************************!*\
  !*** ./resources/js/components/pagination.js ***!
  \***********************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!********************************************************!*\
  !*** ./resources/js/dashboard/pages/products/index.js ***!
  \********************************************************/
var productsPage = document.querySelector('.products-page');

if (productsPage) {
  var deleteBtns = productsPage.querySelectorAll('[data-action="delete-product"]'),
      confirmModal = productsPage.querySelector('.confirm-modal'),
      confirmInput = confirmModal.querySelector('[name="id"]'); //* confirm-modal start

  deleteBtns.forEach(function (button) {
    button.onclick = function () {
      confirmModal.classList.remove('hidden');
      confirmInput.value = button.dataset.product;
    };
  });
  confirmModal.addEventListener('click', function (e) {
    if (e.target.className == 'confirm-modal' || e.target.dataset.action == 'cancel') {
      confirmModal.classList.add('hidden');
      confirmInput.value = '';
    }
  }); //* confirm-modal end
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*********************************************************!*\
  !*** ./resources/js/dashboard/pages/products/create.js ***!
  \*********************************************************/
var productsCreate = document.querySelector('.products-create-page');

if (productsCreate) {
  var editors = document.getElementsByClassName('simditor-textarea'),
      textareas = []; //change Simditor default locale

  Simditor.locale = 'ru-RU';

  for (i = 0; i < editors.length; i++) {
    textareas[i] = new Simditor({
      textarea: editors[i],
      toolbarFloatOffset: '60px',
      upload: {//  url: '/upload/simditor_photo',   //image upload url by server
        //  params: {
        //     folder: 'news' //used in store folder path
        //  },
        //  fileKey: 'simditor_photo', //name of input
        //  connectionCount: 10,
        //  leaveConfirm: 'Пожалуйста дождитесь окончания загрузки изображений на сервер! Вы уверены что хотите закрыть страницу?'
      },
      //   defaultImage: '/img/news/simditor/default/default.png', //default image thumb while uploading
      cleanPaste: false,
      //clear all styles while copy pasting,
      imageButton: 'upload',
      toolbar: ['bold', 'underline', '|', 'ol', 'ul', '|', 'link', 'hr'],
      //image removed
      toolbarFloat: false
    });
  }

  var photoChooserEl = document.querySelector('input[name="photo"]');
  var photoPreviewEl = document.querySelector('.form__photo-preview');
  var ruInstructionChooserEl = document.querySelector('input[name="ru-instruction"]');
  var ruInstructionPreviewEl = document.querySelector('[data-instruction="ru"]');
  var enInstructionChooserEl = document.querySelector('input[name="en-instruction"]');
  var enInstructionPreviewEl = document.querySelector('[data-instruction="en"]');
  window.setPhotoPreview(photoChooserEl, photoPreviewEl);
  window.setFilePreview(ruInstructionChooserEl, ruInstructionPreviewEl);
  window.setFilePreview(enInstructionChooserEl, enInstructionPreviewEl);
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*********************************************************!*\
  !*** ./resources/js/dashboard/pages/products/update.js ***!
  \*********************************************************/
var productsUpdate = document.querySelector('.products-update-page');

if (productsUpdate) {
  var editors = document.getElementsByClassName('simditor-textarea'),
      textareas = [],
      deleteBtn = productsUpdate.querySelector('[data-action="delete-product"]'),
      confirmModal = productsUpdate.querySelector('.confirm-modal'); //change Simditor default locale

  Simditor.locale = 'ru-RU';

  for (i = 0; i < editors.length; i++) {
    textareas[i] = new Simditor({
      textarea: editors[i],
      toolbarFloatOffset: '60px',
      upload: {//  url: '/upload/simditor_photo',   //image upload url by server
        //  params: {
        //     folder: 'news' //used in store folder path
        //  },
        //  fileKey: 'simditor_photo', //name of input
        //  connectionCount: 10,
        //  leaveConfirm: 'Пожалуйста дождитесь окончания загрузки изображений на сервер! Вы уверены что хотите закрыть страницу?'
      },
      //   defaultImage: '/img/news/simditor/default/default.png', //default image thumb while uploading
      cleanPaste: true,
      //clear all styles while copy pasting,
      imageButton: 'upload',
      toolbar: ['bold', 'underline', '|', 'ol', 'ul', '|', 'link', 'hr'],
      //image removed
      toolbarFloat: false
    });
  }

  var photoChooserEl = document.querySelector('input[name="photo"]');
  var photoPreviewEl = document.querySelector('.form__photo-preview');
  var ruInstructionChooserEl = document.querySelector('input[name="ru-instruction"]');
  var ruInstructionDeleteEl = document.querySelector('button[data-action="delete-ru-instruction"]');
  var ruInstructionDeletedEl = document.querySelector('input[name="ru-instruction-deleted"]');
  var ruInstructionPreviewEl = document.querySelector('[data-instruction="ru"]');
  var enInstructionChooserEl = document.querySelector('input[name="en-instruction"]');
  var enInstructionPreviewEl = document.querySelector('[data-instruction="en"]');
  var enInstructionDeleteEl = document.querySelector('button[data-action="delete-en-instruction"]');
  var enInstructionDeletedEl = document.querySelector('input[name="en-instruction-deleted"]');
  window.setPhotoPreview(photoChooserEl, photoPreviewEl);
  window.setFilePreview(ruInstructionChooserEl, ruInstructionPreviewEl);
  window.setFilePreview(enInstructionChooserEl, enInstructionPreviewEl);
  ruInstructionDeleteEl.addEventListener('click', function () {
    ruInstructionPreviewEl.textContent = 'Файл не выбран';
    ruInstructionDeletedEl.checked = true;
  });
  enInstructionDeleteEl.addEventListener('click', function () {
    enInstructionPreviewEl.textContent = 'Файл не выбран';
    enInstructionDeletedEl.checked = true;
  });
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*************************************************************!*\
  !*** ./resources/js/dashboard/pages/products/categories.js ***!
  \*************************************************************/
var productsCategories = document.querySelector('.products-categories-page');

if (productsCategories) {
  var createBtn = document.querySelector('[data-action="create-category"]'),
      updateBtns = productsCategories.querySelectorAll('[data-action="update-category"]'),
      deleteBtns = productsCategories.querySelectorAll('[data-action="delete-category"]'),
      createModal = productsCategories.querySelector('.create-modal'),
      updateModal = productsCategories.querySelector('.update-modal'),
      confirmModal = productsCategories.querySelector('.confirm-modal'),
      updateInput = updateModal.querySelector('[name="id"]'),
      ruTitleInput = updateModal.querySelector('[name="ru-title"]'),
      enTitleInput = updateModal.querySelector('[name="en-title"]'),
      confirmInput = confirmModal.querySelector('[name="id"]'); //* confirm-modal start

  deleteBtns.forEach(function (button) {
    button.onclick = function () {
      confirmModal.classList.remove('hidden');
      confirmInput.value = button.dataset.category;
    };
  });
  confirmModal.addEventListener('click', function (e) {
    if (e.target.className == 'confirm-modal' || e.target.dataset.action == 'cancel') {
      confirmModal.classList.add('hidden');
      confirmInput.value = '';
    }
  }); //* confirm-modal end
  //* confirm-modal start

  createBtn.onclick = function () {
    createModal.classList.remove('hidden');
  };

  createModal.addEventListener('click', function (e) {
    if (e.target.className == 'create-modal' || e.target.dataset.action == 'cancel') {
      createModal.classList.add('hidden');
    }
  }); //* confirm-modal end
  //* confirm-modal start

  updateBtns.forEach(function (button) {
    button.onclick = function () {
      updateModal.classList.remove('hidden');
      updateInput.value = button.dataset.id;
      ruTitleInput.value = button.dataset.ru;
      enTitleInput.value = button.dataset.en;
    };
  });
  updateModal.addEventListener('click', function (e) {
    if (e.target.className == 'update-modal' || e.target.dataset.action == 'cancel') {
      updateModal.classList.add('hidden');
      updateInput.value = '';
    }
  }); //* confirm-modal end
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************************!*\
  !*** ./resources/js/dashboard/pages/news/index.js ***!
  \****************************************************/
var newsPage = document.querySelector('.news-page');

if (newsPage) {
  var deleteBtns = newsPage.querySelectorAll('[data-action="delete-news"]'),
      confirmModal = newsPage.querySelector('.confirm-modal'),
      confirmInput = confirmModal.querySelector('[name="id"]'); //* confirm-modal start

  deleteBtns.forEach(function (button) {
    button.onclick = function () {
      confirmModal.classList.remove('hidden');
      confirmInput.value = button.dataset.news;
    };
  });
  confirmModal.addEventListener('click', function (e) {
    if (e.target.className == 'confirm-modal' || e.target.dataset.action == 'cancel') {
      confirmModal.classList.add('hidden');
      confirmInput.value = '';
    }
  }); //* confirm-modal end
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*****************************************************!*\
  !*** ./resources/js/dashboard/pages/news/create.js ***!
  \*****************************************************/
var newsCreate = document.querySelector('.news-create-page');

if (newsCreate) {
  var editors = document.getElementsByClassName('simditor-textarea'),
      textareas = []; //change Simditor default locale

  Simditor.locale = 'ru-RU';

  for (i = 0; i < editors.length; i++) {
    textareas[i] = new Simditor({
      textarea: editors[i],
      toolbarFloatOffset: '60px',
      upload: {//  url: '/upload/simditor_photo',   //image upload url by server
        //  params: {
        //     folder: 'news' //used in store folder path
        //  },
        //  fileKey: 'simditor_photo', //name of input
        //  connectionCount: 10,
        //  leaveConfirm: 'Пожалуйста дождитесь окончания загрузки изображений на сервер! Вы уверены что хотите закрыть страницу?'
      },
      //   defaultImage: '/img/news/simditor/default/default.png', //default image thumb while uploading
      cleanPaste: true,
      //clear all styles while copy pasting,
      imageButton: 'upload',
      toolbar: ['bold', 'underline', '|', 'ol', 'ul', '|', 'link', 'hr'],
      //image removed
      toolbarFloat: false
    });
  }

  var photoChooserEl = document.querySelector('input[name="photo"]');
  var photoPreviewEl = document.querySelector('.form__photo-preview');
  window.setPhotoPreview(photoChooserEl, photoPreviewEl);
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*****************************************************!*\
  !*** ./resources/js/dashboard/pages/news/update.js ***!
  \*****************************************************/
var newsUpdate = document.querySelector('.news-update-page');

if (newsUpdate) {
  var editors = document.getElementsByClassName('simditor-textarea'),
      textareas = []; //change Simditor default locale

  Simditor.locale = 'ru-RU';

  for (i = 0; i < editors.length; i++) {
    textareas[i] = new Simditor({
      textarea: editors[i],
      toolbarFloatOffset: '60px',
      upload: {//  url: '/upload/simditor_photo',   //image upload url by server
        //  params: {
        //     folder: 'news' //used in store folder path
        //  },
        //  fileKey: 'simditor_photo', //name of input
        //  connectionCount: 10,
        //  leaveConfirm: 'Пожалуйста дождитесь окончания загрузки изображений на сервер! Вы уверены что хотите закрыть страницу?'
      },
      //   defaultImage: '/img/news/simditor/default/default.png', //default image thumb while uploading
      cleanPaste: true,
      //clear all styles while copy pasting,
      imageButton: 'upload',
      toolbar: ['bold', 'underline', '|', 'ol', 'ul', '|', 'link', 'hr'],
      //image removed
      toolbarFloat: false
    });
  }

  var photoChooserEl = document.querySelector('input[name="photo"]');
  var photoPreviewEl = document.querySelector('.form__photo-preview');
  window.setPhotoPreview(photoChooserEl, photoPreviewEl);
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*********************************************************!*\
  !*** ./resources/js/dashboard/pages/news/categories.js ***!
  \*********************************************************/
var newsCategories = document.querySelector('.news-categories-page');

if (newsCategories) {
  var createBtn = document.querySelector('[data-action="create-category"]'),
      updateBtns = newsCategories.querySelectorAll('[data-action="update-category"]'),
      deleteBtns = newsCategories.querySelectorAll('[data-action="delete-category"]'),
      createModal = newsCategories.querySelector('.create-modal'),
      updateModal = newsCategories.querySelector('.update-modal'),
      confirmModal = newsCategories.querySelector('.confirm-modal'),
      updateInput = updateModal.querySelector('[name="id"]'),
      ruTitleInput = updateModal.querySelector('[name="ru-title"]'),
      enTitleInput = updateModal.querySelector('[name="en-title"]'),
      confirmInput = confirmModal.querySelector('[name="id"]'); //* confirm-modal start

  deleteBtns.forEach(function (button) {
    button.onclick = function () {
      confirmModal.classList.remove('hidden');
      confirmInput.value = button.dataset.category;
    };
  });
  confirmModal.addEventListener('click', function (e) {
    if (e.target.className == 'confirm-modal' || e.target.dataset.action == 'cancel') {
      confirmModal.classList.add('hidden');
      confirmInput.value = '';
    }
  }); //* confirm-modal end
  //* confirm-modal start

  createBtn.onclick = function () {
    createModal.classList.remove('hidden');
  };

  createModal.addEventListener('click', function (e) {
    if (e.target.className == 'create-modal' || e.target.dataset.action == 'cancel') {
      createModal.classList.add('hidden');
    }
  }); //* confirm-modal end
  //* confirm-modal start

  updateBtns.forEach(function (button) {
    button.onclick = function () {
      updateModal.classList.remove('hidden');
      updateInput.value = button.dataset.id;
      ruTitleInput.value = button.dataset.ru;
      enTitleInput.value = button.dataset.en;
    };
  });
  updateModal.addEventListener('click', function (e) {
    if (e.target.className == 'update-modal' || e.target.dataset.action == 'cancel') {
      updateModal.classList.add('hidden');
      updateInput.value = '';
    }
  }); //* confirm-modal end
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*********************************************************!*\
  !*** ./resources/js/dashboard/pages/histories/index.js ***!
  \*********************************************************/
var historiesPage = document.querySelector('.histories-page');

if (historiesPage) {
  var deleteBtns = historiesPage.querySelectorAll('[data-action="delete-history"]'),
      confirmModal = historiesPage.querySelector('.confirm-modal'),
      confirmInput = confirmModal.querySelector('[name="id"]'); //* confirm-modal start

  deleteBtns.forEach(function (button) {
    button.onclick = function () {
      confirmModal.classList.remove('hidden');
      confirmInput.value = button.dataset.history;
    };
  });
  confirmModal.addEventListener('click', function (e) {
    if (e.target.className == 'confirm-modal' || e.target.dataset.action == 'cancel') {
      confirmModal.classList.add('hidden');
      confirmInput.value = '';
    }
  }); //* confirm-modal end
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**********************************************************!*\
  !*** ./resources/js/dashboard/pages/histories/create.js ***!
  \**********************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**********************************************************!*\
  !*** ./resources/js/dashboard/pages/histories/update.js ***!
  \**********************************************************/
var historiesUpdate = document.querySelector('.histories-update-page');

if (historiesUpdate) {
  var editors = document.getElementsByClassName('simditor-textarea'),
      textareas = [],
      deleteBtn = historiesUpdate.querySelector('[data-action="delete-product"]'),
      confirmModal = historiesUpdate.querySelector('.confirm-modal'); //* confirm-modal start

  deleteBtn.onclick = function () {
    confirmModal.classList.remove('hidden');
  };

  confirmModal.addEventListener('click', function (e) {
    if (e.target.className == 'confirm-modal' || e.target.dataset.action == 'cancel') {
      confirmModal.classList.add('hidden');
    }
  }); //* confirm-modal end
}
})();

/******/ })()
;