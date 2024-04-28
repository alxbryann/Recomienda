<!DOCTYPE html>
<html>
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #3c3c47;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .form-container {
            width: 100%; 
            margin-top: 2%;
            margin-left: 10%;
            margin-right: 10%;
            padding: 50px; 
            background-color: #fff;
            border-radius: 30px;
            border: 3px solid black;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            animation: fadein 2s;
        }
        .form-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-container label {
            color: #555555;
            display: block;
            margin-bottom: 5px;
        }
        .form-container input[type="text"] {
            width: 100%;
            padding: 15px; 
            margin-bottom: 15px; 
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-container button {
            width: 100%;
            padding: 15px; 
            background-color: #74748a;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; 
            color: black;
            font-size: large;
        }
        .form-container button:hover {
            background-color: #3c3c47;
        }
        @keyframes fadein {
            from { opacity: 0; }
            to   { opacity: 3; }
        }
        .password-panel a {
            display: block;
            margin-top: 20px;
        }
        span.psw {
            float: right;
            padding-top: 16px;
        }

        .form-container .error {
            color: #E53935;
            margin-bottom: 20px;
        }
/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
    </style>
</head>
<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];

    if (verify_code($code)) {
        // Si el código es correcto, redirige al usuario a la página para restablecer su contraseña
        header('Location: olvidarcontraseña.html');
        exit;
    } else {
        $error = 'El código de verificación es incorrecto.';
    }
}
?>

<body>
    <div class="form-container">
        <h2>Ingrese el codigo de verificación</h2>
        <form method="POST">
            <label for="code">Código de verificación:</label>
            <input type="text" placeholder="Ingrese el código" id="code" name="code" required>
            <button type="submit">Verificar código</button>
            <a>¿Te acordaste de tu cuenta?</a>
            <a href="login.php">Ve a tu cuenta</a>
        </form>
        <?php if (isset($error)): ?>
        <p class="error">Error: <?= $error ?></p>
        <?php endif; ?>
    </div>
</body>
</html>


