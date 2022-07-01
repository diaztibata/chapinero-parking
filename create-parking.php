<?php 

error_reporting(0);
session_start();
include_once 'model/conexion.php';


if ( ($_SESSION["tipo"] !== "administrador") ) {
    echo "<script>window.location.href='index.php';</script>";
    exit;
}

$nombrepagina = "crear-cp";

include 'views/header.php'; 

?>
    
    <div class="middle-cp">
        <div class="tabla-parking">
            <h2>Lista Parqueaderos</h2>
            <div class="contenedor-tabla">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Pisos</th>
                            <th scope="col">Mostrar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $sentenciaParqueadero = $bd->query("select * from parqueadero");
                        $Parqueadero = $sentenciaParqueadero->fetchAll(PDO::FETCH_OBJ);

                        foreach ($Parqueadero as $datoParqueadero) {
                        ?>

                            <tr>
                                    <td>
                                        <p><?php echo $datoParqueadero->codigo_parqueadero; ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $datoParqueadero->codigo_usuario; ?></p>
                                    </td>
                                    <td>
                                        <?php echo $datoParqueadero->nombre_parqueadero; ?>
                                    </td>
                                    <td>
                                        <?php echo $datoParqueadero->telefono; ?>
                                    </td>
                                    <td>
                                        <?php echo $datoParqueadero->direccion; ?>
                                    </td>
                                    <td>
                                        <?php echo $datoParqueadero->pisos; ?>
                                    </td>
                                    <td>
                                        <a href="info-parking.php?codigoParqueadero=<?php echo $datoParqueadero->codigo_parqueadero ?>" >ver</a>
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
        <form class="p-4" method="POST" action="controller/create-parking/registrar-parqueadero.php">

            <label>Codigo Parqueadero: </label>
            <input type="text" placeholder="260522NP" id="numero-pisos" name="txtCodParqueadero" required>

            <label>Identificación Usuario: </label>
            <input type="text" placeholder="123.456.789" name="txtCodUsuario" required>

            <label>Nombre Parqueadero: </label>
            <input type="text" placeholder="Nuevo Parqueadero" name="txtNombreParqueadero" required>

            <label>Telefono: </label>
            <input type="text" name="txtTelefono" placeholder="601 543 2198" required>

            <label>Direccion: </label>
            <input type="text" name="txtDireccion" placeholder="Cra 53 #7-53" required>

            <label>Pisos: </label>
            <input type="number" id="numero-pisos" placeholder="1" name="txtPisos" required>

            <input type="hidden" name="oculto" value="1">

            <input type="submit" class="btn-primary" value="Registrar">

        </form>
    </div>

        
<?php include 'views/footer.php' ?>