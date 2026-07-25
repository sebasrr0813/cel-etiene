<?php if($codigo != "" && $mensaje == ""){ ?>

<div class="info-grid">

    <div class="info-box">

        <span>Código PQR</span>

        <strong>

            <?php echo $fila["codigo_pqr"]; ?>

        </strong>

    </div>

    <div class="info-box">

        <span>Estado</span>

        <strong class="status">

            <?php echo $fila["estado"]; ?>

        </strong>

    </div>

    <div class="info-box">

        <span>Tipo de solicitud</span>

        <strong>

            <?php echo $fila["tipo"]; ?>

        </strong>

    </div>

    <div class="info-box">

        <span>Fecha de registro</span>

        <strong>

            <?php echo $fila["fecha_registro"]; ?>

        </strong>

    </div>

</div>

<div class="info-box" style="margin-bottom:25px;">

    <span>Descripción</span>

    <strong>

        <?php echo nl2br($fila["descripcion"]); ?>

    </strong>

</div>

<div class="info-box">

    <span>Respuesta del administrador</span>

    <strong>

        <?php

      if(trim($fila["observacion_admin"])==""){
                ?>

                <div class="pending-box">

                    <div class="pending-icon">

                        ⌛

                    </div>

                    <div>

                        <strong>

                            Tu solicitud está siendo revisada.

                        </strong>

                        <p>

                            Nuestro equipo responderá lo antes posible.

                        </p>

                    </div>

                </div>

                <?php

                }else{

                    echo nl2br($fila["observacion_admin"]);

                }

        ?>

    </strong>

</div>

<?php if(!empty($fila["fecha_actualizacion"])){ ?>

<div class="info-box" style="margin-top:25px;">

    <span>Última actualización</span>

    <strong>

        <?php echo $fila["fecha_actualizacion"]; ?>

    </strong>

</div>

<?php } ?>

<br>

<button
class="back-btn"
onclick="window.location.href='menu.php'">

Volver al menú

</button>

<?php } ?>