const productsUpdate = document.querySelector('.products-update-page');

if (productsUpdate) {
  const editors = document.getElementsByClassName('simditor-textarea'),
    textareas = [],
    deleteBtn = productsUpdate.querySelector('[data-action="delete-product"]'),
    confirmModal = productsUpdate.querySelector('.confirm-modal');
  //change Simditor default locale
  Simditor.locale = 'ru-RU';

  for (i = 0; i < editors.length; i++) {
    textareas[i] = new Simditor({
      textarea: editors[i],
      toolbarFloatOffset: '60px',
      upload: {
        //  url: '/upload/simditor_photo',   //image upload url by server
        //  params: {
        //     folder: 'news' //used in store folder path
        //  },
        //  fileKey: 'simditor_photo', //name of input
        //  connectionCount: 10,
        //  leaveConfirm: 'Пожалуйста дождитесь окончания загрузки изображений на сервер! Вы уверены что хотите закрыть страницу?'
      },
      //   defaultImage: '/img/news/simditor/default/default.png', //default image thumb while uploading
      cleanPaste: true, //clear all styles while copy pasting,
      imageButton: 'upload',
      toolbar: ['bold', 'underline', '|', 'ol', 'ul', '|', 'link', 'hr'], //image removed
      toolbarFloat: false,
    });
  }

  const photoChooserEl = document.querySelector('input[name="photo"]');
  const photoPreviewEl = document.querySelector('.form__photo-preview');
  const ruInstructionChooserEl = document.querySelector('input[name="ru-instruction"]');
  const ruInstructionDeleteEl = document.querySelector('button[data-action="delete-ru-instruction"]');
  const ruInstructionDeletedEl = document.querySelector('input[name="ru-instruction-deleted"]');
  const ruInstructionPreviewEl = document.querySelector('[data-instruction="ru"]');
  const enInstructionChooserEl = document.querySelector('input[name="en-instruction"]');
  const enInstructionPreviewEl = document.querySelector('[data-instruction="en"]');
  const enInstructionDeleteEl = document.querySelector('button[data-action="delete-en-instruction"]');
  const enInstructionDeletedEl = document.querySelector('input[name="en-instruction-deleted"]');

  window.setPhotoPreview(photoChooserEl, photoPreviewEl);
  window.setFilePreview(ruInstructionChooserEl, ruInstructionPreviewEl);
  window.setFilePreview(enInstructionChooserEl, enInstructionPreviewEl);

  ruInstructionDeleteEl.addEventListener('click', () => {
    ruInstructionPreviewEl.textContent = 'Файл не выбран';
    ruInstructionDeletedEl.checked = true;
  });

  enInstructionDeleteEl.addEventListener('click', () => {
    enInstructionPreviewEl.textContent = 'Файл не выбран';
    enInstructionDeletedEl.checked = true;
  });
}
