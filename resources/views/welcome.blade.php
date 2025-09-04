<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Welcome — laravel 12 Modern</title>

  <!-- Google Fonts: Poppins & Nunito -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
  <!-- Bootstrap 5.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <!-- AOS (Animate On Scroll) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

  <!-- Custom CSS -->
  <style>
    :root {
      --primary-color: #6c63ff;
      --secondary-color: #3f3da1;
      --accent-color: #2b2a82;
      --light-bg: #f9f9f9;
      --text-color: #333;
    }
    body {
      font-family: 'Poppins', 'Nunito', sans-serif;
      background: var(--light-bg);
      color: var(--text-color);
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }
    /* HERO SECTION */
    .hero {
      min-height: 100vh;
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 0 20px;
      color: #fff;
    }
    .hero h1 {
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 20px;
    }
    .hero p {
      font-size: 1.25rem;
      margin-bottom: 30px;
      max-width: 600px;
    }
    .btn-cta {
      background-color: #fff;
      color: var(--secondary-color);
      padding: 12px 40px;
      border: none;
      border-radius: 50px;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    .btn-cta:hover {
      background-color: var(--accent-color);
      color: #fff;
      transform: scale(1.05);
    }
    /* SECTION STYLE */
    .section {
      padding: 80px 20px;
    }
    .section-title {
      font-size: 2.5rem;
      font-weight: 600;
      margin-bottom: 40px;
    }
    /* FEATURE CARDS */
    .feature-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background-color: #fff;
    }
    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }
    .feature-card i {
      font-size: 3rem;
      color: var(--primary-color);
      margin-bottom: 15px;
    }
    /* CONTRIBUTORS */
    .contributors img {
      border-radius: 50%;
      border: 4px solid #fff;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .contributors img:hover {
      transform: scale(1.1);
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    /* FOOTER */
    footer {
      background: var(--secondary-color);
      color: #fff;
      text-align: center;
      padding: 30px 20px;
    }
  </style>
</head>
<body>

  <!-- HERO SECTION -->
  <section class="hero">
    <h1 class="animate__animated animate__fadeInDown">Welcome to laravel 12</h1>
    <a href="{{ route('login') }}" class="btn btn-cta animate__animated animate__zoomIn">Inicia sesión</a>
  </section>

  <!-- JS Libraries -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true,
      duration: 800,
    });
  </script>
</body>
</html>
