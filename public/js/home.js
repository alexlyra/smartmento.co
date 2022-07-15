/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./public/pages/home.ts ***!
  \******************************/


var mentorBtn = document.querySelectorAll('button.mentorBtn');
mentorBtn.forEach(function (btn) {
  btn.addEventListener('click', function (event) {
    if (btn.dataset.action) {
      if (btn.dataset.action === 'login') {} else if (btn.dataset.action === 'register') {
        window.location.href = '/cadastrar/mentor';
      }
    }
  });
});
/******/ })()
;
//# sourceMappingURL=home.js.map