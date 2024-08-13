// Handle registration form submission
document.getElementById('registerForm').addEventListener('submit', async (event) => {
    event.preventDefault(); // Prevent the default form submission
    const formData = new FormData(event.target); // Get form data

    try {
        const response = await fetch(event.target.action, {
            method: 'POST',
            body: formData
        });

        const result = await response.json(); // Parse JSON response
        document.getElementById('regResponse').innerText = result.message; // Display message
    } catch (error) {
        console.error('Error:', error);
        document.getElementById('regResponse').innerText = 'An error occurred. Please try again.';
    }
});