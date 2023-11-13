document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('#rating-stars .star');
    const ratingInput = document.getElementById('testimony_rating');

    function updateStars(rating) {
        stars.forEach(s => {
            let starValue = s.getAttribute('data-value');
            let img = s.querySelector('img');
            img.src = starValue <= rating ? "../../image/icon/star-fill.svg" : "../../image/icon/star.svg";
        });
    }

    stars.forEach(star => {
        star.addEventListener('click', function () {
            let rating = this.getAttribute('data-value');
            ratingInput.value = rating; 
            updateStars(rating); 
        });
    });
});
