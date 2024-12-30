<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
    <style>
        /* welcomith.css */
    /* welcomith.css */
body {
    font-family: 'Roboto', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-image: url('{{ asset('images/latar.jpg') }}');
    background-size: cover;
    background-position: center;
}

.login-section {
    width: 100%;
    max-width: 420px;
    padding: 40px;
    background-color: rgba(255, 255, 255, 0.85); /* Membuat latar belakang form login transparan */
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
    border-radius: 12px;
    backdrop-filter: blur(10px); /* Efek blur untuk latar belakang */
}

.login-section h2 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

.form-group {
    margin-bottom: 20px;
    position: relative;
}

.form-group label {
    font-size: 16px;
    margin-bottom: 8px;
    color: #555;
    font-weight: 500;
}

.form-group input {
    width: 100%;
    padding: 12px 20px;
    padding-left: 40px;  /* Memberikan ruang untuk ikon */
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    color: #333;
    transition: all 0.3s ease;
    box-sizing: border-box; /* Agar padding tidak mempengaruhi lebar */
}

.form-group input:focus {
    border-color: #2c3e50;
    outline: none;
    box-shadow: 0px 0px 5px rgba(44, 62, 80, 0.6);
}

.form-group i {
    position: absolute;
    left: 15px;
    top: 60%;
    transform: translateY(-50%);
    color: #777;
    font-size: 18px;
}

.btn-submit {
    width: 100%;
    padding: 14px;
    font-size: 18px;
    background-color: #2c3e50;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-submit:hover {
    background-color: #34495e;
    transform: translateY(-2px); /* Efek tombol mengangkat sedikit saat hover */
}

.btn-submit:active {
    transform: translateY(2px); /* Efek tombol menekan */
}

.alert {
    margin-top: 20px;
    padding: 15px;
    text-align: center;
    font-weight: 500;
    border-radius: 8px;
}

.alert-success {
    background-color: #2ecc71;
    color: white;
}

.alert-danger {
    background-color: #e74c3c;
    color: white;
}

        </style>
</head>
<body>
   <!-- Login Section -->
<div class="login-section">
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
    @csrf
        <div class="form-group">
            <label for="username">
                <i class="fas fa-user"></i> Username
            </label>
            <input type="text" id="username" name="username" placeholder="Masukkan username" required>
        </div>
        <div class="form-group">
            <label for="password">
                <i class="fas fa-lock"></i> Kata Sandi
            </label>
            <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
        </div>
        <button type="submit" class="btn-submit">Login</button>
    </form>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
</div>

</body>
</html>
