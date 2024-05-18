'use strict';

const bodyElement = document.body;
const pageWrapperElement = document.querySelector('.page__wrapper');
const navElement = document.querySelector('.nav');

const NAV_USER_AVATAR_NAME_CLASS = 'nav__user-avatar-name';
const NAV_USER_AVATAR_NAME_ACTIVE_CLASS = `${NAV_USER_AVATAR_NAME_CLASS}--active`;
const navUserAvatarNameElement = document.querySelector(`.${NAV_USER_AVATAR_NAME_CLASS}`);

const NAV_USER_ACCOUNT_MENU_CLASS = 'nav__user-account-menu';
const NAV_USER_ACCOUNT_MENU_ACTIVE_CLASS = `${NAV_USER_ACCOUNT_MENU_CLASS}--active`;
const navUserAccountMenuElement = document.querySelector(`.${NAV_USER_ACCOUNT_MENU_CLASS}`);

if (pageWrapperElement && navElement) {
    pageWrapperElement.style.setProperty('--nav-height', `${navElement.offsetHeight}px`);
}

if (bodyElement && navUserAvatarNameElement && navUserAccountMenuElement) {
    bodyElement.addEventListener('click', (e) => {
        if (e.target.closest(`.${NAV_USER_AVATAR_NAME_CLASS}`)) {
            navUserAvatarNameElement.classList.toggle(NAV_USER_AVATAR_NAME_ACTIVE_CLASS);
            navUserAccountMenuElement.classList.toggle(NAV_USER_ACCOUNT_MENU_ACTIVE_CLASS);
        } else {
            navUserAvatarNameElement.classList.remove(NAV_USER_AVATAR_NAME_ACTIVE_CLASS)
            navUserAccountMenuElement.classList.remove(NAV_USER_ACCOUNT_MENU_ACTIVE_CLASS);
        }
    });
}
