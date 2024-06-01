const avatarInputFile = document.querySelector('input[type="file"][name="avatar"]');

if (avatarInputFile) {
    avatarInputFile.addEventListener('change', () => {
        avatarInputFile.closest('form').submit();
    });
}

const addBioBtn = document.querySelector('.add-bio-btn');
const addBioForm = document.querySelector('.add-bio-form');
const deleteBioBtn = document.querySelector('.delete-bio-btn');
const deleteBioForm = document.querySelector('.delete-bio-form');


if (addBioBtn) {
    addBioBtn.addEventListener('click', () => {
        addBioForm.submit();
    });
}
if (deleteBioBtn) {
    deleteBioBtn.addEventListener('click', () => {
        deleteBioForm.submit();
    });
}

const textarea = document.querySelector('textarea');

if (textarea) {
    const textareaInitialValue = textarea.value;

    textarea.addEventListener('input', () => {
        if (textarea.value !== textareaInitialValue) {
            addBioBtn.classList.add('show');
        } else {
            addBioBtn.classList.remove('show');
        }
        if (textarea.value === '') {
            addBioBtn.classList.remove('show');
        }
    });
}
