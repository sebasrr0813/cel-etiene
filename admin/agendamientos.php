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
$estado = "";

$sql = "SELECT * FROM agendamientos WHERE 1=1";

if(isset($_GET['codigo']) && $_GET['codigo'] != ""){

    $codigo = trim($_GET['codigo']);

    $sql .= " AND codigo_soporte LIKE '%CEL-$codigo%'";

}

if(isset($_GET['estado']) && $_GET['estado'] != ""){

    $estado = $_GET['estado'];

    $sql .= " AND estado='$estado'";

}

$sql .= " ORDER BY id DESC";

$resultado = mysqli_query($conexion, $sql);

?>

<main class="content">

    <h2>Agendamientos</h2>

    <form method="GET" class="busqueda">

    <div>

        <label>Código de soporte</label>

        <div class="codigo-box">

            <span>CEL-</span>

            <input
                type="text"
                name="codigo"
                value="<?php echo $codigo; ?>"
                placeholder="Ej: 1DDA6507"
            >

        </div>

    </div>

    <div>

        <label>Estado</label>

        <select name="estado">

            <option value="">Todos</option>

            <option value="Pendiente" <?php if($estado=="Pendiente") echo "selected"; ?>>
                Pendiente
            </option>

            <option value="Diagnóstico" <?php if($estado=="Diagnóstico") echo "selected"; ?>>
                Diagnóstico
            </option>

            <option value="En reparación" <?php if($estado=="En reparación") echo "selected"; ?>>
                En reparación
            </option>

            <option value="Listo" <?php if($estado=="Listo") echo "selected"; ?>>
                Listo
            </option>

        </select>

    </div>

    <button type="submit">

        Buscar

    </button>

</form>

    <p>
        Administra los servicios registrados.
    </p>

    <table class="tabla-agendamientos">

        <thead>

            <tr>

                <th>Código</th>

                <th>Cliente</th>

                <th>Servicio</th>

                <th>Fecha</th>

                <th>Estado</th>

                <th>Técnico</th>

                <th>Acción</th>

            </tr>

        </thead>

        <tbody>

            <?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

            <tr>

                <td><?php echo $fila['codigo_soporte']; ?></td>

                <td><?php echo $fila['nombre_cliente']; ?></td>

                <td><?php echo $fila['servicios']; ?></td>

                <td><?php echo $fila['fecha_visita']; ?></td>

                <td>

                    <span class="estado <?php echo strtolower(str_replace(' ', '-', $fila['estado'])); ?>">

                        <?php echo $fila['estado']; ?>

                    </span>

                </td>

                <td><?php echo $fila['tecnico']; ?></td>

                <td>

                    <a
                        class="btn-editar"
                        href="editar_agendamiento.php?id=<?php echo $fila['id']; ?>"
                    >
                        Editar
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