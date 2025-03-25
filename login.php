<?php
require __DIR__ .'/src/includes/functions.php';
require __DIR__ . '/src/includes/config/database.php';

$db = conectarDB();
incluirTemplates('header', false, true);


$errores = [];


// print_r($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = 'Correo es obligatorio o no valido';
    }
    if (!$password) {
        $errores[] = 'Contraseña es obligatoria';
    }

    if (!$errores) {
        $query = "SELECT * FROM usuarios WHERE email = '{$email}' ";
        $consulta = mysqli_query($db, $query);
        if ($consulta->num_rows) {
            // var_dump($consulta);
            $usuario = mysqli_fetch_assoc($consulta);
            $auth = password_verify($password, $usuario['password']);
            if ($auth) {
                // var_dump($usuario['password']);
                session_start();
                $_SESSION['login'] = true;
                header('location: /admin');
            }else{
                $errores[] = 'Contraseña no valida';
            }
        } else{
            $errores[] = 'El usuario no existe';
        }
    }
}
?>

<main class="contenido-login contenedor seccion">
    <h1>Iniciar Sesion</h1>
    <?php
        foreach ($errores as $error) { ?>
        <div class="aviso error">
            <p><?php echo $error; ?></p>
        </div>

        <?php
        }
    ?>

    <section class="formulario">
        <form class="personalF" method="POST">
            <fieldset>

                <legend>Usuario y Contraseña</legend>
                
                <div class="type">
                    <label for="email">Usuario</label>
                    <input type="email" name="email" placeholder="Tu email" id="email">
                </div>

                <div class="type">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" placeholder="Tu contraseña" id="paswword">
                </div>

            </fieldset>

            <div class="boton-gris-from">
                <input type="submit" class="boton-gris" value="Enviar">
            </div>

        </form>
    </section>
</main>

<?php 
incluirTemplates('footer');
?>