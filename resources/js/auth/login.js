const loginPage = document.querySelector('.login-page');

if (loginPage) {
  const visibilityBtn = loginPage.querySelector('.login-eye-btn'),
    passwordInput = loginPage.querySelector('#password');

  visibilityBtn.onclick = () => {
    if (visibilityBtn.classList.contains('show')) {
      visibilityBtn.classList.remove('show');
      passwordInput.setAttribute('type', 'password');
    } else {
      visibilityBtn.classList.add('show');
      passwordInput.setAttribute('type', 'text');
    }
  };
}
