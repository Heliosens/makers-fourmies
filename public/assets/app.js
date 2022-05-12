let main = document.querySelector('main');
let h = document.querySelector('header').offsetHeight;
let f = document.querySelector('footer').offsetHeight;

main.style.minHeight = innerHeight - h - f + "px";
