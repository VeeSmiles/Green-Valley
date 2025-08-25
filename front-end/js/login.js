document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;

    // Here you would typically use AJAX to send the data to the server for authentication
    // and receive a response indicating success or failure.
    // For this example, we'll simply log the credentials to the console.
    console.log('Username:', username);
    console.log('Password:', password);
});

document.getElementById('signupForm').addEventListener('submit', function(e) {
    e.preventDefault();
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;
    let email = document.getElementById('email').value;

    // Here you would typically use AJAX to send the data to the server for user registration
    // and receive a response indicating success or failure.
    // For this example, we'll simply log the data to the console.
    console.log('Username:', username);
    console.log('Password:', password);
    console.log('Email:', email);
});