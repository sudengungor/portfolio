
document.addEventListener('DOMContentLoaded', () => {
    
    // --- 1. DARK MODE TOGGLE (State Management & Persistence) ---
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;

    // Check localStorage for user preference from previous visits
    const currentTheme = localStorage.getItem('theme');
    if (currentTheme === 'dark') {
        body.classList.add('dark-theme');
        themeToggle.innerHTML = '☀️'; // Switch icon to sun
    }

    themeToggle.addEventListener('click', () => {
        body.classList.toggle('dark-theme');
        let theme = 'light';
        
        if (body.classList.contains('dark-theme')) {
            theme = 'dark';
            themeToggle.innerHTML = '☀️';
        } else {
            themeToggle.innerHTML = '🌙';
        }
        
        // Save preference to satisfy "Persistence" requirement
        localStorage.setItem('theme', theme);
    });

    // --- 2. MOBILE MENU (DOM Manipulation) ---
    const mobileMenu = document.getElementById('mobile-menu');
    const navLinks = document.querySelector('.nav-links');

    mobileMenu.addEventListener('click', () => {
        navLinks.classList.toggle('active'); // CSS'de .nav-links.active görünür olmalı
        mobileMenu.classList.toggle('is-active'); // Hamburger animasyonu için
    });

    // --- 3. DYNAMIC PROJECTS LOADER (AJAX / Fetch API - GET) ---
    const loadProjects = () => {
        const projectGrid = document.getElementById('projects-grid');

        // Fetching data from PHP without refreshing the page
        fetch('php/get_projects.php')
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(projects => {
                projectGrid.innerHTML = ''; // Clear static placeholders
                
                projects.forEach(project => {
                    const projectHTML = `
                        <article class="project-card">
                            <div class="project-img">
                                <img src="${project.image_url}" alt="${project.title}">
                            </div>
                            <div class="project-info">
                                <h3>${project.title}</h3>
                                <p>${project.description}</p>
                                <div class="tags">
                                    <span class="badge">${project.tech_stack}</span>
                                </div>
                                <a href="${project.github_link}" target="_blank" class="btn-sm">Source Code</a>
                            </div>
                        </article>
                    `;
                    projectGrid.innerHTML += projectHTML;
                });
            })
            .catch(error => {
                console.error('Error fetching projects:', error);
                // Fallback content if database fails
            });
    };

    // Load projects on page start
    loadProjects();

    // --- 4. CONTACT FORM VALIDATION & SUBMISSION (AJAX - POST) ---
    const contactForm = document.getElementById('contact-form');
    const formResponse = document.getElementById('form-response');

    contactForm.addEventListener('submit', (e) => {
        e.preventDefault(); // Prevents the traditional page refresh

        // Select inputs
        const name = document.getElementById('name');
        const email = document.getElementById('email');
        const subject = document.getElementById('subject');
        const message = document.getElementById('message');

        // Client-Side Validation Logic
        let isValid = true;
        let errorMessage = "";

        if (name.value.trim().length < 3) {
            errorMessage += "Name must be at least 3 characters. ";
            isValid = false;
        }

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email.value)) {
            errorMessage += "Please enter a valid email address. ";
            isValid = false;
        }

        if (message.value.trim().length < 10) {
            errorMessage += "Message is too short.";
            isValid = false;
        }

        if (!isValid) {
            formResponse.style.color = "#ff4d4d";
            formResponse.innerText = errorMessage;
            return; // Stop the function here
        }

        // If valid, send data using Fetch API
        const formData = new FormData(contactForm);
        formResponse.style.color = "var(--primary-color)";
        formResponse.innerText = "Sending your message...";

        fetch('php/save_contact.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            formResponse.style.color = "#28a745";
            formResponse.innerText = "Thank you! Your message has been saved to the database.";
            contactForm.reset();
        })
        .catch(err => {
            formResponse.style.color = "#ff4d4d";
            formResponse.innerText = "Oops! Something went wrong on the server.";
            console.error('Submission Error:', err);
        });
    });
});

/* --- Veritabanından Projeleri Çeken Yeni Kodlar --- */
document.addEventListener('DOMContentLoaded', () => {
    fetchProjects(); // Sayfa açılır açılmaz projeleri çekmeye başla
});

function fetchProjects() {
    fetch('php/get_projects.php')
        .then(response => response.json())
        .then(data => {
            const grid = document.getElementById('projects-grid');
            if(!grid) return; // Eğer id bulunamazsa hata vermemesi için
            
            grid.innerHTML = ''; 

            if (data.length === 0) {
                grid.innerHTML = '<p style="text-align:center; grid-column: 1/-1;">No projects found. Add some from Admin Dashboard!</p>';
                return;
            }

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
            console.error('Error:', err);
            document.getElementById('projects-grid').innerHTML = 'Veri çekilirken bir hata oluştu.';
        });
}