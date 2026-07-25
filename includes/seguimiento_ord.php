<?php if($codigo != "" && $mensaje == ""){ ?>

<div class="info-grid">

    <div class="info-box">

        <span>

            Código compra

        </span>

        <strong>

            <?php echo $fila["codigo_compra"]; ?>

        </strong>

    </div>

    <div class="info-box">

        <span>

            Estado

        </span>

        <strong class="status">

            <?php echo $fila["estado"]; ?>

        </strong>

    </div>

    <div class="info-box">

        <span>

            Producto

        </span>

        <strong>

            <?php echo $fila["producto"]; ?>

        </strong>

    </div>

    <div class="info-box">

        <span>

            Cantidad

        </span>

        <strong>

            <?php echo $fila["cantidad"]; ?>

        </strong>

    </div>

    <div class="info-box">

        <span>

            Precio

        </span>

        <strong>

            <?php echo $fila["precio"]; ?>

        </strong>

    </div>

    <div class="info-box">

        <span>

            Método de pago

        </span>

        <strong>

            <?php echo $fila["metodo_pago"]; ?>

        </strong>

    </div>

    <div class="info-box">

        <span>

            Persona que recibe

        </span>

        <strong>

            <?php echo $fila["persona_recibe"]; ?>

        </strong>

    </div>

    <div class="info-box">

        <span>

            Teléfono

        </span>

        <strong>

            <?php echo $fila["telefono"]; ?>

        </strong>

    </div>

</div>

<div class="info-box" style="margin-bottom:25px;">

    <span>

        Dirección de entrega

    </span>

    <strong>

        <?php

        echo $fila["direccion"];

        if(!empty($fila["barrio"])){

            echo "<br>".$fila["barrio"];

        }

        ?>

    </strong>

</div>

<div class="info-grid">

    <div class="info-box">

        <span>

            Transportadora

        </span>

        <strong>

            <?php

            if(empty($fila["transportadora"])){

                echo "Pendiente de asignar";

            }else{

                echo $fila["transportadora"];

            }

            ?>

        </strong>

    </div>

    <div class="info-box">

        <span>

            Número de guía

        </span>

        <strong>

            <?php

            if(empty($fila["numero_guia"])){

                echo "Pendiente";

            }else{

                echo $fila["numero_guia"];

            }

            ?>

        </strong>

    </div>

    <div class="info-box">

        <span>

            Fecha de compra

        </span>

        <strong>

            <?php

            echo date(
                "d/m/Y H:i",
                strtotime($fila["fecha_compra"])
            );

            ?>

        </strong>

    </div>

    <div class="info-box">

        <span>

            Fecha estimada

        </span>

        <strong>

            <?php

            if(empty($fila["fecha_estimada"])){

                echo "Pendiente";

            }else{

                echo date(
                    "d/m/Y",
                    strtotime($fila["fecha_estimada"])
                );

            }

            ?>

        </strong>

    </div>

</div>

<div class="info-box" style="margin-top:25px;">

    <span>

        Observaciones

    </span>

    <strong>

        <?php

        if(empty($fila["observacion"])){

            echo "No hay observaciones.";

        }else{

            echo nl2br($fila["observacion"]);

        }

        ?>

    </strong>

</div>

<br>

<button
class="back-btn"
onclick="window.location.href='menu.php'">

Volver al menú

</button>

<?php } ?>