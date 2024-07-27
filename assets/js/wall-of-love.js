document.addEventListener('DOMContentLoaded', function () {
    const carouselWrapper = document.querySelector('.carousel-wrapper');
    let isDragging = false;
    let startX;
    let scrollLeft;

    // Start dragging
    carouselWrapper.addEventListener('mousedown', (e) => {
        isDragging = true;
        startX = e.pageX - carouselWrapper.offsetLeft;
        scrollLeft = carouselWrapper.scrollLeft;
        carouselWrapper.style.cursor = 'grabbing'; // Change cursor to grabbing
    });

    // Stop dragging
    carouselWrapper.addEventListener('mouseleave', () => {
        isDragging = false;
        carouselWrapper.style.cursor = 'grab'; // Change cursor back to grab
    });

    carouselWrapper.addEventListener('mouseup', () => {
        isDragging = false;
        carouselWrapper.style.cursor = 'grab'; // Change cursor back to grab
    });

    // Handle dragging
    carouselWrapper.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX - carouselWrapper.offsetLeft;
        const walk = (x - startX) * 2; // Adjust scroll speed (2 can be changed for different speeds)
        carouselWrapper.scrollLeft = scrollLeft - walk;
    });

    // Optional: Allow touch dragging for mobile devices
    carouselWrapper.addEventListener('touchstart', (e) => {
        isDragging = true;
        startX = e.touches[0].pageX - carouselWrapper.offsetLeft;
        scrollLeft = carouselWrapper.scrollLeft;
    });

    carouselWrapper.addEventListener('touchend', () => {
        isDragging = false;
    });

    carouselWrapper.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.touches[0].pageX - carouselWrapper.offsetLeft;
        const walk = (x - startX) * 2; // Adjust scroll speed (2 can be changed for different speeds)
        carouselWrapper.scrollLeft = scrollLeft - walk;
    });
});
