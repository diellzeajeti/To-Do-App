'use strict';
//Login and Signup form functions
const loginBtn = document.getElementById('login-btn');
const signupBtn = document.getElementById('signup-btn');
const loginForm = document.querySelector('.login-form');
const signupForm = document.querySelector('.signup-form');

signupBtn.addEventListener('click', function () {
    if (!loginForm.classList.contains('hidden')) loginForm.classList.add('hidden');

    if (signupForm.classList.contains('hidden')) signupForm.classList.remove('hidden');
})
loginBtn.addEventListener('click', function () {
    if (loginForm.classList.contains('hidden')) loginForm.classList.remove('hidden');

    if (!signupForm.classList.contains('hidden')) signupForm.classList.add('hidden');
})
