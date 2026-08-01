<?php

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != "administrador") {
    header("Location: ../inicio.php");
    exit();
}

include("../db_conexion.php");

include("includes/header.php");
include("includes/sidebar.php");

?>

<main class="content">

<h2>👨‍🔧 Agregar técnico</h2>

<p>Registra un nuevo técnico para asignarlo a los servicios.</p>

<form action="guardar_tecnico.php" method="POST" enctype="multipart/form-data">

<div class="card">

<h3>Información personal</h3>

<label>Nombre</label>

<input
type="text"
name="nombre"
required>

<br><br>

<label>Apellido</label>

<input
type="text"
name="apellido"
required>

<br><br>

<label>Cédula</label>

<input
type="text"
name="cedula">

<br><br>

<label>Teléfono</label>

<input
type="text"
name="telefono">

<br><br>

<label>Correo</label>

<input
type="email"
name="correo">

</div>

<br>

<div class="card">

<h3>Información profesional</h3>

<label>Cargo</label>

<input
type="text"
name="cargo"
placeholder="Ej: Técnico Senior">

<br><br>

<label>Especialidad</label>

<input
type="text"
name="especialidad"
placeholder="Apple, Samsung, Microsoldadura...">

<br><br>

<label>Experiencia</label>

<input
type="text"
name="experiencia"
placeholder="Ej: 8 años">

<br><br>

<label>Descripción</label>

<textarea
name="descripcion"
rows="5"></textarea>

</div>

<br>

<div class="card">

<h3>Fotografía</h3>

<input
type="file"
name="foto"
accept=".jpg,.jpeg,.png,.webp">

</div>

<br>

<div class="card">

<h3>Estado</h3>

<select name="estado">

<option value="Disponible">Disponible</option>

<option value="En servicio">En servicio</option>

<option value="Vacaciones">Vacaciones</option>

<option value="Inactivo">Inactivo</option>

</select>

</div>

<br>

<button type="submit">

💾 Guardar técnico

</button>

<a href="tecnicos.php">

<button type="button">

Cancelar

</button>

</a>

</form>

</main>

<?php include("includes/footer.php"); ?>