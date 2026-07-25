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
                <th>Estado</th>
                <th>Rol actual</th>
                <th>Cambiar rol</th>
                <th>Acciones</th>
            </tr>

        </thead>

        <tbody>

            <?php while($fila=mysqli_fetch_assoc($resultado)){ ?>

         <tr>

        <td><?php echo $fila["nombres"]; ?></td>

            <td><?php echo $fila["apellidos"]; ?></td>

            <td><?php echo $fila["correo"]; ?></td>

            <td><?php echo $fila["telefono"]; ?></td>

            <td>

            <?php

            if($fila["estado"]=="activo"){

                echo "<span class='estado estado-activo'>🟢 Activo</span>";

            }else{

                echo "<span class='estado estado-bloqueado'>🔴 Bloqueado</span>";

            }

            ?>

            </td>

            <td>

            <?php echo ucfirst($fila["rol"]); ?>

            </td>

    <td>

        <form action="cambiar_rol.php" method="POST">

            <input
                type="hidden"
                name="id_usuario"
                value="<?php echo $fila["id"]; ?>">

            <select name="rol">

                <option value="cliente"
                <?php if($fila["rol"]=="cliente") echo "selected"; ?>>
                    Cliente
                </option>

                <option value="administrador"
                <?php if($fila["rol"]=="administrador") echo "selected"; ?>>
                    Administrador
                </option>

            </select>

            <button type="submit">
                Guardar
            </button>

        </form>

    </td>

      <td>

        <?php

        if($fila["estado"]=="activo"){

        ?>

        <a href="bloquear_usuario.php?id=<?php echo $fila['id']; ?>"
        onclick="return confirm('¿Deseas bloquear este usuario?')">

        <button type="button"> Bloquear </button>

        </a>

        <?php

        }else{

        ?>

        <a href="activar_usuario.php?id=<?php echo $fila['id']; ?>"
        onclick="return confirm('¿Deseas activar este usuario?')">

        <button type="button">
            Activar
        </button>

        </a>

        <?php } ?>

        </td>

</tr>

            <?php } ?>

        </tbody>

    </table>

</main>

<?php

include("includes/footer.php");

?>