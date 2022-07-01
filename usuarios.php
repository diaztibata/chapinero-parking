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
    <h2>Nuevo Usuario</h2>
    <form class="p-4" method="POST" action="controller/usuarios/registrar-usuario.php">

        <label>Identificación: </label>
        <input type="text" placeholder="123.456.789" id="numero-pisos" name="txtIdentificacion" required>

        <label>Nombre: </label>
        <input type="text" placeholder="Nombre del Usuario" name="txtNombre" required>

        <label>Correo: </label>
        <input type="text" placeholder="user@mail.com" name="txtCorreo" required>

        <label>Contraseña: </label>
        <input type="password" placeholder="*********" name="txtContrasena" required>

        <label>Telefono: </label>
        <input type="text" placeholder="601 456 7890" name="txtTelefono" required>

        <label>Tipo Usuario: </label>
        <input type="text" placeholder="operario o usuarios" name="txtTipoUsuario" required>

        <input type="hidden" name="oculto" value="1">

        <input type="submit" class="btn-primary" value="Registrar">

    </form>
</div>


<?php include 'views/footer.php' ?>