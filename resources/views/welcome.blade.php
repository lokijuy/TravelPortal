<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Travel Insurance - Maagap Insurance</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                font-family: 'Arial', sans-serif;
                min-height: 100vh;
                overflow: hidden;
                background: #000;
            }
            #myVideo {
                position: fixed;
                right: 0;
                bottom: 0;
                min-width: 100%;
                min-height: 100%;
                width: auto;
                height: auto;
                z-index: -1;
            }
            .overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 1;
            }
            .header {
                padding: 2rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
                position: relative;
                z-index: 2;
            }
            .logo {
                width: 200px;
            }
            .logo img {
                width: 100%;
                height: auto;
                filter: brightness(0) invert(1);
            }
            .login-btn {
                background: transparent;
                border: 2px solid white;
                color: white;
                padding: 0.75rem 2rem;
                border-radius: 5px;
                text-decoration: none;
                font-weight: bold;
                transition: all 0.3s ease;
            }
            .login-btn:hover {
                background: white;
                color: #000;
            }
            .content {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                color: white;
                width: 100%;
                padding: 0 2rem;
                z-index: 2;
            }
            .title {
                font-size: 4.5rem;
                font-weight: bold;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
                margin-bottom: 1rem;
                letter-spacing: 2px;
            }
            .subtitle {
                font-size: 1.5rem;
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
                letter-spacing: 1px;
            }
            @media (max-width: 768px) {
                .title {
                    font-size: 3rem;
                }
                .subtitle {
                    font-size: 1.2rem;
                }
            }
        </style>
    </head>
    <body>
        <video autoplay muted loop id="myVideo">
            <source src="{{ asset('videos/travel-video.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        
        <div class="overlay"></div>
        
        <header class="header">
            <div class="logo">
                <img src="{{ asset('images/MAAGAP LOGO-06.png') }}" alt="Maagap Insurance">
            </div>
            @if (Route::has('login'))
                <nav>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="login-btn">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="login-btn">Log in</a>
                    @endauth
                </nav>
            @endif
        </header>

        <div class="content">
            <h1 class="title" style="font-family: Impact, sans-serif; font-style: italic; text-transform: uppercase; letter-spacing: 2px; color: #ffd700; text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.5);">TRAVEL<br>INSURANCE</h1>
            <p class="subtitle" style="font-family: Arial, sans-serif; text-transform: uppercase; letter-spacing: 1px; color: #ffd700; text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.5);">YOUR FUTURE IS OUR CONCERN</p>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var video = document.getElementById('myVideo');
                video.play().catch(function(error) {
                    console.log("Video autoplay failed:", error);
                });
            });
        </script>
    </body>
</html>
