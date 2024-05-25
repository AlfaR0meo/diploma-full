const fieldsets = document.querySelectorAll('fieldset');
const ERROR_FORM_CLASS_SELECTOR = '.error';

if (fieldsets) {
    fieldsets.forEach(fieldset => {
        const input = fieldset.querySelector('input');

        input.addEventListener('input', () => {
            const errorEl = fieldset.querySelector(ERROR_FORM_CLASS_SELECTOR) ||
                fieldset.parentElement.querySelector(ERROR_FORM_CLASS_SELECTOR);
            if (errorEl) errorEl.remove();
            input.removeEventListener('input', this);
        });
    })
}