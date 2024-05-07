'use strict';

const pageWrapperElement = document.querySelector('.page-wrapper');
const navElement = document.querySelector('.nav');
pageWrapperElement.style.setProperty('--nav-height', `${navElement.offsetHeight}px`);
