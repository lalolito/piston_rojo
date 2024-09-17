<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro e Inicio de Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #2c3e50;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            position: relative;
        }

        .form-container h2 {
            color: #ecf0f1;
            margin-bottom: 15px;
        }

        .form-container label {
            display: block;
            text-align: left;
            color: #ecf0f1;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .form-container input {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            background-color: #34495e;
            border: none;
            border-bottom: 2px solid #bdc3c7;
            color: #ecf0f1;
            font-size: 14px;
            transition: background-color 0.3s, border-bottom 0.3s;
        }

        .form-container input:focus {
            background-color: #1abc9c;
            border-bottom: 2px solid #16a085;
            outline: none;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background-color: #1abc9c;
            border: none;
            color: white;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
        }

        .form-container button:hover {
            background-color: #16a085;
        }

        .form-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .form-header button {
            flex: 1;
            background-color: #34495e;
            padding: 8px;
            border: none;
            color: #ecf0f1;
            font-size: 12px;
            cursor: pointer;
            border-radius: 5px 5px 0 0;
            transition: background-color 0.3s;
        }

        .form-header button.active {
            background-color: #1abc9c;
        }

        .form-header button:first-child {
            margin-right: 8px;
        }

        .form-header button:hover {
            background-color: #16a085;
        }

        .form-content {
            display: none;
        }

        .form-content.active {
            display: block;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 15px;
        }

        .form-grid-full {
            grid-column: span 2;
        }
    </style>

    <script>
        function showForm(formId) {
            document.querySelectorAll('.form-content').forEach(form => {
                form.classList.remove('active');
            });
            document.getElementById(formId).classList.add('active');

            document.querySelectorAll('.form-header button').forEach(btn => btn.classList.remove('active'));
            document.getElementById('btn-' + formId).classList.add('active');
        }

        window.onload = function() {
            showForm('login');
        };
    </script>
</head>

<body>
    <div class="form-container">
        <div class="form-header">
            <button id="btn-login" onclick="showForm('login')" class="active">Iniciar Sesión</button>
            <button id="btn-register" onclick="showForm('register')">Registrarse</button>
        </div>

        <!-- Formulario de Inicio de Sesión -->
        <div id="login" class="form-content active">
            <h2>Iniciar Sesión</h2>
            <form action="../Controlador/controladorLogin.php" method="POST">
                <label for="loginEmail">Email:</label>
                <input type="email" id="loginEmail" name="userEmail" placeholder="Correo electrónico" required>

                <label for="loginPassword">Contraseña:</label>
                <input type="password" id="loginPassword" name="userPassword" placeholder="Contraseña" required>

                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>

        <!-- Formulario de Registro -->
        <div id="register" class="form-content">
            <h2>Registrarse</h2>
            <form action="../Controlador/controladorUsuario.php" method="POST">
                <input type="hidden" name="accion" value="registrar"> <!-- Campo oculto para registrar -->
                <div class="form-grid">
                    <div>
                        <label for="tipoDocumento">Tipo de Documento:</label>
                        <input type="text" id="tipoDocumento" name="tipoDocumento" placeholder="CC, TI, etc." required>
                    </div>
                    <div>
                        <label for="numeroDocumento">Número de Documento:</label>
                        <input type="text" id="numeroDocumento" name="numeroDocumento" required>
                    </div>
                    <div>
                        <label for="userName">Nombre:</label>
                        <input type="text" id="userName" name="userName" required>
                    </div>
                    <div>
                        <label for="userApellido">Apellido:</label>
                        <input type="text" id="userApellido" name="userApellido" required>
                    </div>
                    <div>
                        <label for="userTelefono">Teléfono:</label>
                        <input type="tel" id="userTelefono" name="userTelefono" placeholder="Ingrese su teléfono" required>
                    </div>
                    <div>
                        <label for="userDireccion">Dirección:</label>
                        <input type="text" id="userDireccion" name="userDireccion" placeholder="Ingrese su dirección" required>
                    </div>
                    <div class="form-grid-full">
                        <label for="userEmail">Correo Electrónico:</label>
                        <input type="email" id="userEmail" name="userEmail" placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="form-grid-full">
                        <label for="userPassword">Contraseña:</label>
                        <input type="password" id="userPassword" name="userPassword" required>
                    </div>
                </div>
                <button type="submit">Registrarse</button>
            </form>
        </div>
    </div>
</body>

</html>