<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Kepegawaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="welcomith.css">
    <style>
        :root {
    --background: #1E3E62;
    --primary: #FFBF61;
    --nav: #72BF78;
    --font: #fff;
    --hover: #DDD8D8;
    --box1: #C4E1F6;
    --box2: #F4EEEE;
    --card: #C62E2E;
}

body {
    font-family: Arial, sans-serif;
    background-image: url('{{ asset('images/latar.jpg') }}');
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}


    .container {
        text-align: center;
        background-color:var(--font);
        padding: 30px;
        border-radius: 8px;
        max-width: 400px;
    }
    .logo img {
        width: 100px;
        margin-bottom: 20px;
    }
    .welcome-message {
        font-size: 16px;
        margin-bottom: 20px;
        color: #000;
    }
    .btn-masuk {
        background-color: var(--primary);
        color: var(--font);
        border: none;
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }
    .btn-masuk:hover {
        background-color: var(--primary);
    }
    .btn-download {
        background-color: var(--nav);
        color: white;
        border: none;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
    }
    .btn-download:hover {
        background-color: var(--nav);
    }

    :root {
        --background: #1E3E62;
        --primary: #FFBF61;
        --nav: #72BF78;
        --font: #fff;
        --hover: #DDD8D8;
        --box1: #C4E1F6;
        --box2: #F4EEEE;
        --card: #C62E2E;
    }
    
    /* Background setup */
    body {
        font-family: Arial, sans-serif;
        background-image: url('your-background-image.jpg'); /* Set your background image here */
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    
    /* Form container */
    .login-container {
        background-color: rgba(255, 255, 255, 0.8); /* Transparent white */
        border-radius: 10px;
        padding: 30px;
        width: 300px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
    }
    
    /* Profile icon */
    .login-container .profile-icon {
        font-size: 40px;
        color: #555;
        margin-bottom: 20px;
    }
    
    /* Form fields */
    .login-container input[type="text"],
    .login-container input[type="password"] {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    
    /* Login button */
    .login-container button {
        width: 100%;
        padding: 12px;
        background-color: #003366;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    
    .login-container button:hover {
        background-color: #002244;
    }
    
        </style>
</head>

<body>
<div class="container">
    <div class="logo">
         <img src="{{ asset('images/logo_clean.png') }}" alt="Logo">
    </div>
        <div class="welcome-message">
            "Selamat datang di Sistem Manajemen Kepegawaian Institut Teknologi Bachruddin Jusuf Habibie. Akses informasi kepegawaian Anda dengan lebih efisien. Silakan login untuk melanjutkan."
        </div>
        <button class="btn btn-masuk" onclick="location.href='{{ url('/login') }}'">Masuk</button>

        <button class="btn btn-download">Download</button>
    </div>
</body>

</html>
