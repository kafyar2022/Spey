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