<?php

error_reporting(0);

session_start();
if ( isset( $_SESSION['ID'] ) ) {
    
    if(($_SESSION["tipo"] == "usuario")){
        echo "<script>window.location.href='index.php';</script>";
    }


} else {
    echo "<script>window.location.href='../../index.php';</script>";
}

include_once 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentenciaUsuario = $bd->prepare("select * from usuarios where identificacion = ?;");
$sentenciaUsuario->execute([$codigo]);
$usuario = $sentenciaUsuario->fetch(PDO::FETCH_OBJ);

$nombrepagina = "usuarios-cp";
include 'views/header.php';

?>

<div class="middle-cp">
    <div class="tabla-parking">
        <h2>Lista Usuarios</h2>
        <div class="contenedor-tabla">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Identificacion</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Tipo Usuario</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    include_once "model/conexion.php";
                    $sentenciaUsuarios = $bd->query("select * from usuarios");
                    $Usuarios = $sentenciaUsuarios->fetchAll(PDO::FETCH_OBJ);

                    foreach ($Usuarios as $datoUsuarios) {
                    ?>

                        <tr>
                            <td scope="row"><?php echo $datoUsuarios->identificacion; ?></td>
                            <td><?php echo $datoUsuarios->nombre; ?></td>
                            <td><?php echo $datoUsuarios->correo; ?></td>
                            <td><?php echo $datoUsuarios->contrasena; ?></td>
                            <td><?php echo $datoUsuarios->telefono; ?></td>
                            <td><?php echo $datoUsuarios->tipo_usuario; ?></td>
                            <td><a class="text-success" href="editarusuario.php?codigo=<?php echo $datoUsuarios->identificacion; ?>">Editar</a></td>

                            <td>
                                <a onclick="return confirm('Estas seguro de eliminar?');" href="controller/usuarios/eliminar-usuario.php?codigo=<?php echo $datoUsuarios->identificacion; ?>">Borrar</a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>

                </tbody>
            </table>

        </div>
    </div>
</div>


<div class="formulario-crear">
    <h2>Nuevo Parqueadero</h2>
    <form class="p-4" method="POST" action="controller/usuarios/registrar-usuario.php">

        <label>Identificación: </label>
        <input type="text" placeholder="123.456.789" id="numero-pisos" name="txtIdentificacion" required>

        <label>Nombre: </label>
        <input type="text" placeholder="Nombre del Usuario" name="txtNombre" required>

        <label>Correo: </label>
        <input type="text" placeholder="user@mail.com" name="txtCorreo" required>

        <label>Contraseña: </label>
        <input type="text" placeholder="*********" name="txtContrasena" required>

        <label>Telefono: </label>
        <input type="text" placeholder="601 456 7890" name="txtTelefono" required>

        <label>Tipo Usuario: </label>
        <input type="text" placeholder="operario o usuario" name="txtTipoUsuario" required>

        <input type="hidden" name="oculto" value="1">

        <input type="submit" class="btn-primary" value="Registrar">

    </form>
</div>

<div class="modal">
<a class="regresar" href="usuarios.php"><img src="public/img/x.svg" alt="cerrar"></a>
    <div class="contenedor-form-pisos">
        <h2>Editar Usuario con Id número <span style="color: #da8f03;"><?php echo $usuario->identificacion; ?></span></h2>
        <form method="POST" action="controller/usuarios/editar-usuario.php">

            <label>Nombre: </label>
            <input type="text" name="txtNombre" required value="<?php echo $usuario->nombre; ?>">


            <label>Correo: </label>
            <input type="text" name="txtCorreo" required value="<?php echo $usuario->correo; ?>">


            <label>Contraseña: </label>
            <input type="text" name="txtPass" required value="<?php echo $usuario->contrasena; ?>">

            <label>Telefono: </label>
            <input type="text" name="txtTelefono" required value="<?php echo $usuario->telefono; ?>">

            <label>Tipo usuario: </label>
            <input type="text" name="txtCargo" required value="<?php echo $usuario->tipo_usuario; ?>">

            <input type="hidden" name="codigo" value="<?php echo $usuario->identificacion; ?>">
            <input type="submit" class="btn-primary" value="Editar">

        </form>

    </div>
</div>

<?php include 'views/footer.php' ?>