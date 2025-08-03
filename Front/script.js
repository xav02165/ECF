// Burger menu toggle
const burger = document.querySelector('.burger');
const menu = document.querySelector('.menu-desktop');

burger.addEventListener('click', () => {
  menu.classList.toggle('active');
});

// Custom cursor
const cursor = document.querySelector('.cursor');
document.addEventListener('mousemove', e => {
  cursor.style.left = e.pageX + 'px';
  cursor.style.top = e.pageY + 'px';
});
