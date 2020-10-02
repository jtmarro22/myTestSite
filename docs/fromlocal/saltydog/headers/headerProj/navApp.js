const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const closeButton = document.querySelector('#closeBtn');
    const line1 = document.querySelector('.line1');
    const line2 = document.querySelector('.line2');
    const line3 = document.querySelector('.line3');
    burger.addEventListener('click', ()=>{
        nav.classList.toggle('nav-active');
        // line1.classList.toggle('burgerToggle');
        // line2.classList.toggle('burgerToggle');
        // line3.classList.toggle('burgerToggle');
        burger.classList.toggle('burgerToggle');
    });
    closeButton.addEventListener('click', ()=>{
        nav.classList.toggle('nav-active');
        // line1.classList.toggle('burgerToggle');
        // line2.classList.toggle('burgerToggle');
        // line3.classList.toggle('burgerToggle');
        // burger.classList.toggle('burgerToggle');
    });
}

navSlide();