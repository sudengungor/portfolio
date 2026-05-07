<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Professional Portfolio of Sudenur Güngör - Software Engineer & Flutter Developer">
    <title>Sudenur Güngör | Software Engineering Portfolio</title>
    
    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Header & Navigation -->
    <header>
        <nav class="navbar" id="navbar">
            <div class="logo">
                <a href="#">sudenurgungor<span>.</span></a>
            </div>
            
            <div class="menu-toggle" id="mobile-menu" aria-label="Open Menu"> 
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
                <li>
                    <button id="theme-toggle" title="Toggle Dark/Light Mode">
                        <span class="mode-icon">🌙</span>
                    </button>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section id="home" class="hero-section">
            <div class="hero-content">
                <h1>Sudenur Güngör</h1>
                <p>Third-year <strong>Software Engineering</strong> student focused on Mobile Development and Web Development.</p>
                <div class="hero-btns">
                    <a href="#projects" class="btn primary">View My Work</a>
                    <a href="#contact" class="btn secondary">Hire Me</a>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about-section">
            <div class="container">
                <h2>About Me</h2>
                <div class="about-grid">
                    <div class="about-text">
                        <p>I am a passionate developer currently studying at Haliç University. I specialize in building cross-platform mobile applications and performing complex data analysis.</p>
                    </div>
                    
                    <div class="education-info">
                        <h3>Academic Timeline</h3>
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Institution / Event</th>
                                    <th>Focus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2023 - Present</td>
                                    <td>Haliç University</td>
                                    <td>BSc Software Engineering</td>
                                </tr>
                                <tr>
                                    <td>2026</td>
                                    <td>Mobile Dev Summit</td>
                                    <td>Mobile App Technologies</td>
                                </tr>
                                <tr>
                                    <td>2025</td>
                                    <td>Data Science Workshop</td>
                                    <td>Python & Statistical Analysis</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Section (Dynamic Content Container) -->
        <section id="projects" class="projects-section">
            <div class="container">
                <h2>Featured Projects</h2>
                <!-- Bu alan JavaScript (AJAX) tarafından otomatik doldurulacak -->
                <div class="projects-grid" id="projects-grid">
                    <p class="loading-text">Loading projects from database...</p>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact-section">
            <div class="container">
                <h2>Get In Touch</h2>
                <p>Have a project in mind? Let's talk.</p>
                
                <form id="contact-form" action="php/store_message.php" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" placeholder="email@example.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="What is this about?" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Your message details..." required></textarea>
                    </div>
                    <button type="submit" class="submit-btn" id="submit-btn">Send Message</button>
                    <p id="form-response"></p>
                </form>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="social-links">
                <a href="https://github.com/sudengungor" target="_blank">GitHub</a>
                <a href="https://www.linkedin.com/in/sudenur-gungor/" target="_blank">LinkedIn</a>
            </div>
            <p>&copy; 2026 Sudenur Güngör | Built with PHP, MySQL</p>
        </div>
    </footer>

    <script src="main.js"></script>
</body>
</html>