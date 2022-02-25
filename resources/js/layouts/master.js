//! Ajax request setup 
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
//! Scroll window to top (button event)
$("#top").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});
//! vitrin dropdown start
const vitrinDropdown = document.querySelector('.vitrin-dropdown'),
  body = document.querySelector('body'),
  modals = body.querySelectorAll('.modal');
if (vitrinDropdown) {
  const dropdownBtn = vitrinDropdown.querySelector('.vitrin-dropdown__button');

  dropdownBtn.onclick = () => {
    vitrinDropdown.classList.toggle('show');
  };

  body.addEventListener('click', e => {
    if (e.target.dataset.family != 'vitrin-dropdown') {
      vitrinDropdown.classList.remove('show');
    }
  });
}
//! vitrin dropdown end
//! hide modals start
body.addEventListener('click', e => {
  modals.forEach(modal => {
    modal.classList.add('hidden');
  });
});
//! hide modals end
