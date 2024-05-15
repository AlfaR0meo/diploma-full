'use strict';

const pageWrapperElement = document.querySelector('.page__wrapper');
const navElement = document.querySelector('.nav');

if (pageWrapperElement && navElement) {
    pageWrapperElement.style.setProperty('--nav-height', `${navElement.offsetHeight}px`);
}
