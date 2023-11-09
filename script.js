<<<<<<< HEAD
// Select all elements with the "i" tag and store them in a NodeList called "stars"
const stars = document.querySelectorAll(".stars i");

// Loop through the "stars" NodeList
stars.forEach((star, index1) => {
  // Add an event listener that runs a function when the "click" event is triggered
  star.addEventListener("click", () => {
    // Loop through the "stars" NodeList Again
    stars.forEach((star, index2) => {
      // Add the "active" class to the clicked star and any stars with a lower index
      // and remove the "active" class from any stars with a higher index
      index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
    });
  });
});
=======
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

>>>>>>> 22e8e27eadc9a962c4410cc859af6c565b51f627
