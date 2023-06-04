const menu = document.querySelector('#mobile-menu');
const menu_links = document.querySelector('.navbar_menu');


menu.addEventListener("click",()=>{
menu.classList.toggle("is-active");
menu_links.classList.toggle("active");
});