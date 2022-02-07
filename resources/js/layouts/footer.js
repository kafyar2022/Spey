const footer = document.querySelector('.footer');

if (footer) {
    //* Scroll to top start
    $("#top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });
    //* Scroll to top start
    //* show hide mobile navigation start
    const navBtns = footer.querySelectorAll('[data-action="show"]');
    navBtns.forEach(btn => {
        btn.onclick = () => {
            btn.parentNode.classList.toggle('show');
        };
    });
    //* show hide mobile navigation end
}