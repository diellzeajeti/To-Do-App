'use strict';

//Modal functions
const modal = document.querySelector('.modal');
const closeModalBtn = document.querySelector('.close-modal');
const overlay = document.querySelector('.overlay');
const showModalBtn = document.querySelector('.show-modal');
const closeModal = function () {
    modal.classList.add('hidden');
    overlay.classList.add('hidden');
}
const openModal = function () {
    modal.classList.remove('hidden');
    overlay.classList.remove('hidden');
}
// Open modal
showModalBtn.addEventListener('click', openModal);

// Close modal
closeModalBtn.addEventListener('click', closeModal)
overlay.addEventListener('click', closeModal)

document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
        closeModal();
    }
})