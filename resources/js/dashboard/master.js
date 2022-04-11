//! Ajax request setup
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
const html = document.querySelector('html'),
  modals = html.querySelectorAll('.modal');

//! hide modals start
html.addEventListener('click', e => {
  modals.forEach(modal => {
    modal.classList.add('hidden');
  });
});
//! hide modals end

window.setPhotoPreview = (fileChooserEl, previewEl) => {
  fileChooserEl.addEventListener('change', (evt) => {
    const file = evt.target.files[0];

    previewEl.src = URL.createObjectURL(file);
    previewEl.style.backgroundColor = 'transparent'
  });
};
window.setFilePreview = (fileChooserEl, previewEl) => {
  fileChooserEl.addEventListener('change', (evt) => {
    previewEl.textContent = evt.target.value;
  });
};
