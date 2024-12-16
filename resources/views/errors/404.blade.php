<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404 Not Found Page</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap");

        :root {
            --primary-color: #f9b23c;
            --primary-color-dark: #f49a20;
            --text-dark: #333333;
            --text-light: #767268;
            --extra-light: #ffffff;
            --bg-gradient: linear-gradient(120deg, #f9b23c, #f49a20);
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--extra-light);
            font-family: "Roboto", sans-serif;
            text-align: center;
            overflow: hidden;
            background: var(--bg-gradient);
            animation: gradient-animation 6s infinite alternate;
        }

        @keyframes gradient-animation {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
        }

        .container {
            position: relative;
            display: grid;
            grid-template-columns: 1fr;
            align-items: center;
            justify-items: center;
            gap: 2rem;
            padding: 3rem;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .decorative-icons {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .decorative-icons span {
            position: absolute;
            width: 10px;
            height: 10px;
            background: var(--primary-color);
            opacity: 0.7;
            border-radius: 50%;
            animation: move 5s infinite alternate ease-in-out;
        }

        .header h1 {
            font-size: 6rem;
            font-weight: 900;
            color: var(--primary-color);
        }

        .header h3 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .container img,
        dotlottie-player {
            max-width: 100%;
            width: 300px;
            height: 300px;
        }

        .footer p {
            font-size: 1rem;
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        .footer button {
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            background-color: var(--primary-color);
            color: var(--extra-light);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .footer button:hover {
            background-color: var(--primary-color-dark);
        }

        @media (min-width: 640px) {
            .container {
                grid-template-columns: repeat(2, 1fr);
                text-align: left;
                gap: 3rem;
            }

            .header {
                align-self: center;
            }

            .footer {
                grid-column: span 2;
                text-align: center;
            }
        }

        @keyframes move {
            0% {
                transform: translateY(0px);
            }
            100% {
                transform: translateY(-40px);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Decorative Floating Icons -->
        <div class="decorative-icons">
            <span style="top: 10%; left: 20%; animation-delay: 0s;"></span>
            <span style="top: 15%; left: 80%; animation-delay: 2s;"></span>
            <span style="top: 60%; left: 30%; animation-delay: 1s;"></span>
            <span style="top: 35%; left: 50%; animation-delay: 1.5s;"></span>
        </div>

        <!-- Header Section -->
        <div class="header">
            <h1>404</h1>
            <h3>Page Not Found!</h3>
        </div>

        <!-- Animation Section -->
        <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
        <dotlottie-player src="https://lottie.host/02080b26-4889-409d-9196-11d6fab760b7/911uiy0Tck.lottie"
            background="transparent" speed="1" style="width: 300px; height: 300px" loop autoplay></dotlottie-player>

        <!-- Footer Section -->
        <div class="footer">
            <p>Maaf, halaman yang Anda minta tidak dapat ditemukan. Silakan kembali ke beranda!</p>
            <button onclick="location.href='/'">BERANDA KONI</button>
        </div>
    </div>
</body>

</html>
