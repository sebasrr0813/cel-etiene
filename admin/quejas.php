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

$codigo = "";

$sql = "SELECT * FROM quejas WHERE 1=1";

if(isset($_GET["codigo"]) && $_GET["codigo"] != ""){

    $codigo = trim($_GET["codigo"]);

    $sql .= " AND codigo_pqr LIKE '%PQR-$codigo%'";

}

$sql .= " ORDER BY fecha_registro DESC";

$resultado = mysqli_query($conexion,$sql);

$sql = "SELECT *
        FROM quejas
        ORDER BY fecha_registro DESC";

$resultado = mysqli_query($conexion,$sql);

?>

<main class="content">

<h2>Quejas y PQR</h2>

<form method="GET" class="busqueda">

    <div>

        <label>Código PQR</label>

        <div class="codigo-box">

            <span>PQR-</span>

            <input
                type="text"
                name="codigo"
                value="<?php echo $codigo; ?>"
                placeholder="Ej: 1BD344AE"
            >

        </div>

    </div>

    <button type="submit">

        Buscar

    </button>

</form>

<table class="tabla-agendamientos">

    <thead>

        <tr>
            <th>Código PQR</th>
            <th>Cliente</th>
            <th>Tipo</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Acción</th>
        </tr>

    </thead>

    <tbody>

        <?php while($fila=mysqli_fetch_assoc($resultado)){ ?>

        <tr>

            <td><?php echo $fila["codigo_pqr"]; ?></td>

            <td><?php echo $fila["nombre"]; ?></td>

           <td><?php echo $fila["tipo"]; ?></td>

            <td>

            <?php

            switch($fila["estado"]){

                case "Recibida":
                    echo "<span class='estado pendiente'>🟡 Recibida</span>";
                break;

                case "En revisión":
                    echo "<span class='estado diagnóstico'>🔵 En revisión</span>";
                break;

                case "En proceso":
                    echo "<span class='estado en-reparación'>🟠 En proceso</span>";
                break;

                case "Resuelta":
                    echo "<span class='estado listo'>🟢 Resuelta</span>";
                break;

                case "Cerrada":
                    echo "<span class='estado bloqueado'>⚫ Cerrada</span>";
                break;

            }

            ?>

            </td>

            <td>

            <?php echo $fila["fecha_registro"]; ?>

            </td>

            

            <td>

                <a
                class="btn-editar"
                href="ver_queja.php?id=<?php echo $fila["id"]; ?>">

                    Ver

                </a>

            </td>

        </tr>

        <?php } ?>

    </tbody>

</table>

</main>

<?php

include("includes/footer.php");

?>