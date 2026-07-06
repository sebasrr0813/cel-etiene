<?php

session_start();

if(
    !isset($_SESSION['usuario']) ||
    $_SESSION['rol'] != "administrador"
){
    header("Location: ../inicio.php");
    exit();
}

include("../db_conexion.php");

include("includes/header.php");
include("includes/sidebar.php");

$sql = "SELECT * FROM usuarios
        WHERE rol='cliente'
        ORDER BY nombres ASC";

$resultado = mysqli_query($conexion,$sql);

?>

<main class="content">

    <h2>Clientes registrados</h2>

    <table class="tabla-agendamientos">

        <thead>

            <tr>

                <th>Nombre</th>

                <th>Apellidos</th>

                <th>Correo</th>

                <th>Teléfono</th>

            </tr>

        </thead>

        <tbody>

            <?php while($fila=mysqli_fetch_assoc($resultado)){ ?>

            <tr>

                <td><?php echo $fila["nombres"]; ?></td>

                <td><?php echo $fila["apellidos"]; ?></td>

                <td><?php echo $fila["correo"]; ?></td>

                <td><?php echo $fila["telefono"]; ?></td>

            </tr>

            <?php } ?>

        </tbody>

    </table>

</main>

<?php

include("includes/footer.php");

?>