const productsCreate = document.querySelector('.products-create-page');

if (productsCreate) {
  const editors = document.getElementsByClassName('simditor-textarea'),
    textareas = [];
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
      cleanPaste: false, //clear all styles while copy pasting,
      imageButton: 'upload',
      toolbar: ['bold', 'underline', '|', 'ol', 'ul', '|', 'link', 'hr'], //image removed
      toolbarFloat: false,
    });
  }

  const photoChooserEl = document.querySelector('input[name="photo"]');
  const photoPreviewEl = document.querySelector('.form__photo-preview');
  const ruInstructionChooserEl = document.querySelector('input[name="ru-instruction"]');
  const ruInstructionPreviewEl = document.querySelector('[data-instruction="ru"]');
  const enInstructionChooserEl = document.querySelector('input[name="en-instruction"]');
  const enInstructionPreviewEl = document.querySelector('[data-instruction="en"]');

  window.setPhotoPreview(photoChooserEl, photoPreviewEl);
  window.setFilePreview(ruInstructionChooserEl, ruInstructionPreviewEl);
  window.setFilePreview(enInstructionChooserEl, enInstructionPreviewEl);
}
