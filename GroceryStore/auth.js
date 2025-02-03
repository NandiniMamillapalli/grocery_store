// Form validation functions
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validatePassword(password) {
    return password.length >= 8 && 
           /[A-Z]/.test(password) && 
           /[a-z]/.test(password) && 
           /[0-9]/.test(password);
}

function validateUsername(username) {
    return username.length >= 3 && username.length <= 50;
}

// Login function
async function loginUser() {
    const username = document.getElementById('loginUsername').value.trim();
    const password = document.getElementById('loginPassword').value;

    if (!validateUsername(username)) {
        alert('Username must be between 3 and 50 characters');
        return;
    }

    try {
        const response = await fetch('login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                username: username,
                password: password
            })
        });

        const data = await response.json();
        
        if (data.success) {
            window.location.href = 'profile.php';
        } else {
            alert(data.error || 'Login failed');
        }
    } catch (error) {
        alert('An error occurred during login');
    }
}

// Register function
async function registerUser() {
    const username = document.getElementById('registerUsername').value.trim();
    const email = document.getElementById('registerEmail').value.trim();
    const password = document.getElementById('registerPassword').value;
    const confirmPassword = document.getElementById('registerConfirmPassword').value;

    // Validate username
    if (!validateUsername(username)) {
        alert('Username must be between 3 and 50 characters');
        return;
    }

    // Validate email
    if (!validateEmail(email)) {
        alert('Please enter a valid email address');
        return;
    }

    // Validate password
    if (!validatePassword(password)) {
        alert('Password must be at least 8 characters and contain uppercase, lowercase, and numbers');
        return;
    }

    // Check if passwords match
    if (password !== confirmPassword) {
        alert('Passwords do not match');
        return;
    }

    try {
        const response = await fetch('register.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                username: username,
                email: email,
                password: password
            })
        });

        const data = await response.json();
        
        if (data.success) {
            alert('Registration successful! Please login.');
            toggleAuthForms(); // Switch to login form
        } else {
            alert(data.error || 'Registration failed');
        }
    } catch (error) {
        alert(`An error occurred during registration ${error}`);
    }
}

// Toggle between login and registration forms
function toggleAuthForms() {
    const loginForm = document.getElementById('loginForm');
    const registrationForm = document.getElementById('registrationForm');
    const authTitle = document.getElementById('authTitle');

    if (loginForm.style.display === 'none') {
        loginForm.style.display = 'block';
        registrationForm.style.display = 'none';
        authTitle.textContent = 'Login';
    } else {
        loginForm.style.display = 'none';
        registrationForm.style.display = 'block';
        authTitle.textContent = 'Register';
    }
}
