// Get all star elements
const stars = document.querySelectorAll(".star");

// Get rating value and display it
const ratingValue = document.querySelector(".rating-value");

stars.forEach((star) => {
    star.addEventListener("click", () => {
        const rating = star.getAttribute("data-rating");
        ratingValue.textContent = rating;
        highlightStars(+rating);
    });
});

function highlightStars(rating) {
    stars.forEach((star) => {
        const starRating = star.getAttribute("data-rating");
        if (starRating <= rating) {
            star.style.transform = "scale(1.1)";
        } else {
            star.style.transform = "scale(1)";
        }
    })
}

// Submit review
const submitButton = document.querySelector(".submit-review");
const userComment = document.querySelector(".user-comment");
const userReviews = document.querySelector(".user-review");

submitButton.addEventListener("click", () => {
    const rating = ratingValue.textContent;
    const comment = userComment.value;

    if (comment) {
        const review = document.createElement("div");
        review.innerHTML = `<p><strong>Rating: ${rating}/5</strong></p><p>${comment}</p>`;
        userReviews.appendChild(review);
        userComment.value = "";
        ratingValue.textContent = "0";
        resetStars();
    }
});

function resetStars() {
    stars.forEach((star) => {
        star.style.transform = "scale(1)";
    });
}

