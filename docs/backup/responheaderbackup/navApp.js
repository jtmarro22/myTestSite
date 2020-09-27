
const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const overlayMenu = document.querySelector('.overlay');
    const closeButton = document.querySelector('#closeBtn');
    const appClose = document.querySelector('#appCloseBtn');
    const line1 = document.querySelector('.line1');
    const line2 = document.querySelector('.line2');
    const line3 = document.querySelector('.line3');
    burger.addEventListener('click', ()=>{
        nav.classList.toggle('nav-active');
        overlayMenu.classList.toggle('overlay-active');
        // line1.classList.toggle('burgerToggle');
        // line2.classList.toggle('burgerToggle');
        // line3.classList.toggle('burgerToggle');
        burger.classList.toggle('burgerToggle');
    });
    closeButton.addEventListener('click', ()=>{
        nav.classList.toggle('nav-active');
        overlayMenu.classList.toggle('overlay-active');
        // line1.classList.toggle('burgerToggle');
        // line2.classList.toggle('burgerToggle');
        // line3.classList.toggle('burgerToggle');
        // burger.classList.toggle('burgerToggle');
    });
    appClose.addEventListener('click', ()=>{
        nav.classList.toggle('nav-active');
        overlayMenu.classList.toggle('overlay-active');
        // line1.classList.toggle('burgerToggle');
        // line2.classList.toggle('burgerToggle');
        // line3.classList.toggle('burgerToggle');
        // burger.classList.toggle('burgerToggle');
        burger.classList.toggle('burgerToggle');
    });
}

    navSlide();
