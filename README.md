<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuel Wangai - Flutter & Backend Developer</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: auto;
            overflow: hidden;
            padding: 20px;
        }

        h1, h2, h3 {
            color: #5f27cd;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 20px;
        }

        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .hero-text {
            flex: 1;
        }

        .hero img {
            max-width: 150px;
            height: auto;
            margin-left: 20px;
            border-radius: 8px; /* Optional: Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Shadow */
        }

        .skills-tools {
            text-align: center;
            margin-bottom: 40px;
        }

        .skills-grid, .tools-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            justify-items: center;
            margin-top: 20px;
        }

        .skills-grid > div, .tools-grid > div {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .connect {
            text-align: center;
            margin-bottom: 40px;
        }

        .connect a {
            margin: 0 10px;
        }

        .portfolio {
            text-align: center;
        }

        .separator {
            border: none;
            height: 1px;
            background-color: #ddd;
            margin: 30px 0;
        }

        img.icon {
            height: 40px;
            margin: 5px;
        }
        .badge{
            display: block;
            margin: 20px auto;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <section class="hero">
            <div class="hero-text">
                <h1>Hi there! 👋 I'm <span style="color:#5f27cd;">Samuel Wangai</span></h1>
                <p>Flutter & Backend Developer with Springboot(Java) ,ruby on rails and rust| Passionate about crafting efficient, scalable, and visually stunning applications</p>
                <a href="https://wakatime.com/@1f31a92c-750e-4dcf-9828-0b20a598cc20" class="badge">
                    <img src="https://wakatime.com/badge/user/1f31a92c-750e-4dcf-9828-0b20a598cc20.svg" alt="Total time coded since Apr 3 2023" />
                </a>
            </div>
            <div>
                <img src="http://tmokk5.co.za/images/mobi-app.gif" alt="MasterHead">
                <img src="https://terminalroot.com/assets/img/dart/flutter-dart.jpg" alt="Flutter and Dart">
            </div>
        </section>

        <section class="skills-tools">
            <h2>⚙️ Skills</h2>
            <p>Here are some of the technologies I work with:</p>
            <div class="skills-grid">
                <div>
                    <h3>Frontend</h3>
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg" alt="Flutter logo" class="icon">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/dart/dart-original.svg" alt="Dart logo" class="icon">
                </div>
                <div>
                    <h3>Backend</h3>
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg" alt="Java logo" class="icon">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/spring/spring-original.svg" alt="Spring logo" class="icon">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg" alt="Laravel logo" class="icon">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/django/django-plain.svg" alt="Django logo" class="icon">
                </div>
            </div>
        </section>

        <hr class="separator">

        <section class="skills-tools">
            <h2>🛠️ Tools</h2>
            <div class="tools-grid">
                <div>
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vscode/vscode-original.svg" alt="VSCode logo" class="icon">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" alt="Git logo" class="icon">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg" alt="GitHub logo" class="icon">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg" alt="Docker logo" class="icon">
                </div>
            </div>
        </section>

        <hr class="separator">

        <section class="connect">
            <h2>📞 Connect with Me</h2>
            <p>Let's build something amazing together!</p>
            <a href="https://www.linkedin.com/in/samuel-wangai-6115681a8" target="_blank">
                <img src="https://img.shields.io/static/v1?message=LinkedIn&logo=linkedin&label=&color=0077B5&logoColor=white&labelColor=&style=for-the-badge" height="35" alt="LinkedIn logo">
            </a>
            <a href="https://www.instagram.com/samuelmwangi3410" target="_blank">
                <img src="https://img.shields.io/static/v1?message=Instagram&logo=instagram&label=&color=E4405F&logoColor=white&labelColor=&style=for-the-badge" height="35" alt="Instagram logo">
            </a>
            <a href="mailto:swangai7178@gmail.com">
                <img src="https://img.shields.io/static/v1?message=Email&logo=gmail&label=&color=D14836&logoColor=white&labelColor=&style=for-the-badge" height="35" alt="Email logo">
            </a>
        </section>

        <section class="portfolio">
            <h2>🌐 Portfolio</h2>
            <p>Visit my portfolio at <a href="https://quadvendor.com">quadvendor.com</a> to see more of my work!</p>
        </section>
    </div>
</body>
</html>
