// You can add JavaScript functionality here, like handling user interactions.

// Example: Handle click events for the dishes
const dishes = document.querySelectorAll('.dish');

dishes.forEach(dish => {
    dish.addEventListener('click', () => {
        alert(`You clicked on ${dish.querySelector('h2').textContent}`);
    });
});
