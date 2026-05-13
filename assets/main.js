/**
 * Main Application Logic
 * Responsible for Theme Management, Mobile Navigation, and Dynamic Data Fetching.
 */
document.addEventListener('DOMContentLoaded', () => {
    
    // --- 1. DARK MODE TOGGLE (State Management & Persistence) ---
    // Handles the switching between light and dark themes using CSS class toggling.
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;

    // Persist user preference: Retrieve saved theme from localStorage on page load.
    const currentTheme = localStorage.getItem('theme');
    if (currentTheme === 'dark') {
        body.classList.add('dark-theme');
        themeToggle.innerHTML = '☀️'; // Update UI icon
    }

    themeToggle.addEventListener('click', () => {
        // Toggle the dark-theme class and update visual indicators.
        body.classList.toggle('dark-theme');
        let theme = 'light';
        
        if (body.classList.contains('dark-theme')) {
            theme = 'dark';
            themeToggle.innerHTML = '☀️';
        } else {
            themeToggle.innerHTML = '🌙';
        }
        
        // Save the updated preference to localStorage to ensure UX consistency across sessions.
        localStorage.setItem('theme', theme);
    });

    // --- 2. MOBILE MENU (DOM Manipulation) ---
    // Controls the visibility of the navigation links on small screens.
    const mobileMenu = document.getElementById('mobile-menu');
    const navLinks = document.querySelector('.nav-links');

    mobileMenu.addEventListener('click', () => {
        // Toggles active state for the dropdown menu and hamburger animation.
        navLinks.classList.toggle('active');
        mobileMenu.classList.toggle('is-active');
    });

    // --- 3. DYNAMIC PROJECTS LOADER (Asynchronous Data Fetching) ---
    /**
     * Fetches project data from the database via a PHP endpoint.
     * Implements Asynchronous JavaScript to update the UI without page refreshes.
     */
    const fetchProjects = () => {
        const grid = document.getElementById('projects-grid');
        if(!grid) return; // Guard clause to prevent errors if the grid element is missing.

        // Fetch API is used to perform a GET request to the backend.
        fetch('php/get_projects.php')
            .then(response => {
                // Ensure the network response is successful before proceeding.
                if (!response.ok) throw new Error('Failed to retrieve data from server.');
                return response.json(); // Parse the data into a usable JSON format.
            })
            .then(data => {
                grid.innerHTML = ''; // Clear static placeholders to inject dynamic data.

                // Handle empty state if no projects exist in the database.
                if (data.length === 0) {
                    grid.innerHTML = '<p style="text-align:center; grid-column: 1/-1;">No projects found.</p>';
                    return;
                }

                // Map through the retrieved data and construct HTML project cards dynamically.
                data.forEach(project => {
                    const card = `
                        <article class="project-card">
                            <div class="project-info">
                                <h3>${project.title}</h3>
                                <p>${project.description}</p>
                                <div class="badges">
                                    <span class="badge">${project.tech_stack}</span>
                                </div>
                                <br>
                                <a href="${project.github_link}" target="_blank" class="btn secondary">View Code</a>
                            </div>
                        </article>
                    `;
                    grid.innerHTML += card;
                });
            })
            .catch(err => {
                console.error('Runtime Error:', err);
                grid.innerHTML = '<p>Error loading projects. Please try again later.</p>';
            });
    };

    // Execute the fetch function on application startup.
    fetchProjects();

    // --- 4. CONTACT FORM VALIDATION & ASYNCHRONOUS SUBMISSION ---
    const contactForm = document.getElementById('contact-form');
    const formResponse = document.getElementById('form-response');

    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault(); // Intercept the standard form submission to allow AJAX handling.

            // Retrieve input values for validation.
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const message = document.getElementById('message');

            // Robust Client-Side Validation Logic.
            let isValid = true;
            let errorMessage = "";

            if (name.value.trim().length < 3) {
                errorMessage += "Name is too short. ";
                isValid = false;
            }

            // Regex for standard email format validation.
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email.value)) {
                errorMessage += "Invalid email format. ";
                isValid = false;
            }

            if (message.value.trim().length < 10) {
                errorMessage += "Message must be at least 10 characters.";
                isValid = false;
            }

            // UI Feedback for validation failures.
            if (!isValid) {
                formResponse.style.color = "#ff4d4d";
                formResponse.innerText = errorMessage;
                return;
            }

            // Prepare form data for asynchronous POST request.
            const formData = new FormData(contactForm);
            formResponse.style.color = "var(--primary-color)";
            formResponse.innerText = "Processing your message...";

            // Asynchronously send form data to the server-side script.
            fetch('php/save_contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Success feedback and UI reset.
                formResponse.style.color = "#28a745";
                formResponse.innerText = "Success! Your message has been saved.";
                contactForm.reset();
            })
            .catch(err => {
                formResponse.style.color = "#ff4d4d";
                formResponse.innerText = "Server Error. Please try again later.";
                console.error('Submission Error:', err);
            });
        });
    }
});