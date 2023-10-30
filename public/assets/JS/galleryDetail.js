const mainImage = document.querySelector('#gp_main-image_galery');
const smallImages = document.querySelectorAll('.gp_small-image-galery');

smallImages.forEach((image) => {
    image.addEventListener('click', (e) => {
        mainImage.src = e.target.src;
    });
});
