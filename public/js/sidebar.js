const handleSidebar = () => {
    const menu = document.querySelector('.menu');
    const menuContent = menu.querySelector('.menu__content');
    const menuButtonOpen = document.querySelector('.menu__button');
    const menuButtonClose = document.querySelector('.close');

    menuButtonOpen.addEventListener('click', () => {
        menuContent.classList.add('active');  
    });

    menuButtonClose.addEventListener('click', () => {
        menuContent.classList.remove('active');
    })
}

document.addEventListener('DOMContentLoaded', handleSidebar)