const slider = () => {
    const slider = document.querySelector('.slider__wrapper');
    const slides = slider.querySelectorAll('.slide');
    const dots = slider.querySelectorAll('.dot');

    dots.forEach((item, i) => {
        item.addEventListener('click', () => {
            dots.forEach(el => el.classList.remove('active'));
            slides.forEach(el => el.classList.remove('active'));

            slides.forEach((slide, indx) => {
                i == indx && (slide.classList.add('active'), item.classList.add('active'));
            })
            console.log(i);
        })
    })
}

document.addEventListener('DOMContentLoaded', slider)