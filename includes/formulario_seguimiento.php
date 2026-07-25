<div class="section-tag">

    SEGUIMIENTO

</div>

<h2>

    Consulta el estado de tu solicitud

</h2>

<p class="subtitle">

    Ingresa el código de seguimiento para consultar el estado.

</p>

<form method="POST">

    <div class="search-group">

        <select
            name="tipo_codigo"
            class="codigo-select"
        >

            <option value="CEL" <?= ($tipo=="CEL") ? "selected" : ""; ?>>

                CEL - Soporte

            </option>

            <option value="PQR" <?= ($tipo=="PQR") ? "selected" : ""; ?>>

                PQR - Quejas

            </option>

            <option value="ORD" <?= ($tipo=="ORD") ? "selected" : ""; ?>>

                ORD - Compras

            </option>

        </select>

        <input
            type="text"
            name="codigo"
            placeholder="Ingrese el código"
            value="<?= isset($numero) ? $numero : ""; ?>"
            required
        >

    </div>

    <button
        type="submit"
        name="buscar"
        class="search-btn"
    >

        Buscar seguimiento

    </button>

</form>

<?php if($mensaje!=""){ ?>

<div class="error-box">

    <?= $mensaje; ?>

</div>

<?php } ?>