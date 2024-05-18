'use strict';

const pageWrapperElement = document.querySelector('.page__wrapper');
const navElement = document.querySelector('.nav');
const navProfileBtn = document.querySelector('.nav__btn--profile-name');
const navAccountMenu = document.querySelector('.nav__account-menu');

if (pageWrapperElement && navElement) {
    pageWrapperElement.style.setProperty('--nav-height', `${navElement.offsetHeight}px`);
}

if (navProfileBtn && navAccountMenu) {
    navProfileBtn.addEventListener('click', () => {
        navAccountMenu.classList.toggle('nav__account-menu--active');
    });
}
