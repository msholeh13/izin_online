// script.js
function validateForm() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');

    // Clear any previous error message
    errorMessage.textContent = "";

    // Basic validation: Ensure both fields are filled
    if (username === "" || password === "") {
        errorMessage.textContent = "Please fill in both fields.";
        return false;
    }

    // You can add more complex validation logic here (e.g., checking for specific patterns)

    return true; // Submit the form if validation passes
}
