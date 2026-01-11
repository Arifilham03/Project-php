<?php
// Contoh data, silakan sesuaikan dengan sumber data sebenarnya
$jumlah_pendaftar = 120;
$jumlah_peserta = 85;
$jumlah_instruktur = 10;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Statistik LPK</title>
    <!-- Font Awesome CDN -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-papbWyRg9S76HSH+4jQQ+8hBb5jaEJxGFG4Kf4XD+ik+JRCdvYZCTora4v1NXy7uXK0Lp72Hmv1XDldo6V/7mw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <!-- Animate.css CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        :root {
            --primary-blue: #667eea;
            --primary-purple: #764ba2;
            --primary-orange: #f7971e;
            --primary-yellow: #ffd200;
            --primary-teal: #43cea2;
            --primary-dark-blue: #185a9d;
        }
        
        body {
            background: #f0f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px;
            display: flex;
            justify-content: center;
            min-height: 100vh;
            align-items: center;
        }
        .card-container {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            max-width: 900px;
            width: 100%;
        }
        .card {
            flex: 1 1 250px;
            color: white;
            border-radius: 15px;
            padding: 30px 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: default;
            position: relative;
            overflow: hidden;
        }
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        .card:hover::before {
            opacity: 1;
        }
        .card:active {
            transform: translateY(-4px) scale(1.01);
        }
        .card.pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.03); }
            100% { transform: scale(1); }
        }
        .icon {
            font-size: 50px;
            flex-shrink: 0;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }
        .card:hover .icon {
            transform: rotate(15deg) scale(1.1);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }
        .content {
            flex-grow: 1;
        }
        .content .number {
            font-size: 2.6rem;
            font-weight: 700;
            line-height: 1;
            position: relative;
            display: inline-block;
        }
        .content .number::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 3px;
            background: white;
            transition: width 0.5s ease;
        }
        .card:hover .content .number::after {
            width: 100%;
        }
        .content .label {
            font-size: 1.15rem;
            opacity: 0.85;
            margin-top: 5px;
            text-transform: uppercase;
            letter-spacing: 1.1px;
            transition: all 0.3s ease;
        }
        .card:hover .content .label {
            letter-spacing: 1.3px;
            opacity: 1;
        }

        /* Gradient backgrounds */
        .card.pendaftar {
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-purple));
        }
        .card.peserta {
            background: linear-gradient(135deg, var(--primary-orange), var(--primary-yellow));
            color: #444;
        }
        .card.instruktur {
            background: linear-gradient(135deg, var(--primary-teal), var(--primary-dark-blue));
        }

        /* Floating particles animation */
        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }
        .particle {
            position: absolute;
            background: rgba(255,255,255,0.6);
            border-radius: 50%;
            animation: float-up linear infinite;
        }
        @keyframes float-up {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Counter animation */
        @keyframes count-up {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        .counter-animate {
            animation: count-up 1.5s ease-out forwards;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            body {
                padding: 20px;
            }
            .card-container {
                flex-direction: column;
                max-width: 400px;
            }
            .card {
                flex: 1 1 auto;
            }
        }
    </style>
</head>
<body>
    <section class="card-container" role="region" aria-label="Dashboard Statistik LPK">
        <article class="card pendaftar animate__animated animate__fadeInLeft" tabindex="0" aria-labelledby="pendaftar-label pendaftar-number">
            <div class="particles" id="particles-1"></div>
            <div class="icon" aria-hidden="true">
                <i class="fas fa-user-plus"></i>
            </div>
            <div class="content">
                <div class="number counter-animate" id="pendaftar-number"><?php echo $jumlah_pendaftar; ?></div>
                <div class="label" id="pendaftar-label">Pendaftar</div>
            </div>
        </article>

        <article class="card peserta animate__animated animate__fadeInUp" tabindex="0" aria-labelledby="peserta-label peserta-number">
            <div class="particles" id="particles-2"></div>
            <div class="icon" aria-hidden="true">
                <i class="fas fa-users"></i>
            </div>
            <div class="content">
                <div class="number counter-animate" id="peserta-number"><?php echo $jumlah_peserta; ?></div>
                <div class="label" id="peserta-label">Peserta</div>
            </div>
        </article>

        <article class="card instruktur animate__animated animate__fadeInRight" tabindex="0" aria-labelledby="instruktur-label instruktur-number">
            <div class="particles" id="particles-3"></div>
            <div class="icon" aria-hidden="true">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="content">
                <div class="number counter-animate" id="instruktur-number"><?php echo $jumlah_instruktur; ?></div>
                <div class="label" id="instruktur-label">Instruktur</div>
            </div>
        </article>
    </section>

    <script>
        // Create floating particles for each card
        document.addEventListener('DOMContentLoaded', function() {
            createParticles('particles-1', 15);
            createParticles('particles-2', 15);
            createParticles('particles-3', 15);
            
            // Add click animation
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.addEventListener('click', function() {
                    this.classList.add('pulse');
                    setTimeout(() => {
                        this.classList.remove('pulse');
                    }, 2000);
                });
            });
        });

        function createParticles(containerId, count) {
            const container = document.getElementById(containerId);
            if (!container) return;
            
            for (let i = 0; i < count; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random size between 2px and 6px
                const size = Math.random() * 4 + 2;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Random position
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                
                // Random animation duration between 5s and 15s
                const duration = Math.random() * 10 + 5;
                particle.style.animationDuration = `${duration}s`;
                
                // Random delay
                particle.style.animationDelay = `${Math.random() * 5}s`;
                
                container.appendChild(particle);
            }
        }

        // Animate numbers if they change (example for dynamic updates)
        function animateValue(id, start, end, duration) {
            const obj = document.getElementById(id);
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                obj.innerHTML = Math.floor(progress * (end - start) + start);
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        // Example usage if you want to update numbers dynamically:
        // animateValue("pendaftar-number", 0, <?php echo $jumlah_pendaftar; ?>, 1500);
    </script>
</body>
</html>