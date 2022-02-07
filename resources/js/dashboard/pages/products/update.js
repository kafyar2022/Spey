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