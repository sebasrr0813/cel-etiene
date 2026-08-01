         <?php if($codigo != "" && $mensaje == ""){ ?>

                    <div class="info-grid">

                        <div class="info-box">

                            <span>

                                Código soporte

                            </span>

                            <strong>

                                <?php echo $codigo; ?>

                            </strong>



                        </div>

                        <div class="info-box">

                            <span>

                                Equipo

                            </span>

                            <strong>

                                <?php echo $servicios; ?>

                            </strong>

                        </div>

                       
                        <div class="info-box">

                            <span>

                                Estado actual

                            </span>

                            <strong class="status">

                                <?php echo $estado; ?>

                            </strong>

                        </div>

                        <div class="info-box">

                            <span>

                                Descripción

                            </span>

                            <strong>

                                <?php echo $descripcion; ?>

                            </strong>

                        </div>

                    </div>

                <?php if(!empty($fila["tecnico_nombre"])){ ?>

                  <div class="tecnico-card">

    <div class="tecnico-header">

        <h3>

            Técnico asignado

        </h3>

        <span class="estado-tecnico">

            <?php echo htmlspecialchars($fila["estado_tecnico"]); ?>

        </span>

    </div>

    <div class="tecnico-contenido">

        <div class="tecnico-foto">

            <?php if(!empty($fila["foto"])){ ?>

                <img
                src="uploads/tecnicos/<?php echo htmlspecialchars($fila["foto"]); ?>"
                alt="Técnico">

            <?php }else{ ?>

                <img
                src="img/user.png"
                alt="Técnico">

            <?php } ?>

        </div>

        <div class="tecnico-info">

            <h3>

                <?php

                echo htmlspecialchars(

                    $fila["tecnico_nombre"]." ".$fila["apellido"]

                );

                ?>

            </h3>

            <p>

                <strong>Cargo:</strong>

                <?php echo htmlspecialchars($fila["cargo"]); ?>

            </p>

            <p>

                <strong>Especialidad:</strong>

                <?php

                echo !empty($fila["especialidad"])

                ? htmlspecialchars($fila["especialidad"])

                : "Sin especialidad";

                ?>

            </p>

            <p>

                <strong>Experiencia:</strong>

                <?php echo htmlspecialchars($fila["experiencia"]); ?>

            </p>

            <p>

                <?php echo htmlspecialchars($fila["descripcion"]); ?>

            </p>

        </div>

    </div>

</div>

                        <?php } ?>

                        <!-- PROGRESS -->

                    

                    <!-- PROGRESS -->

                    <div class="progress-section">

                        <div class="progress-header">

                            <span>

                                Progreso reparación

                            </span>

                            <strong>

                                <?php echo $progreso; ?>%

                            </strong>

                        </div>

                        <div class="progress-bar">

                            <div
                                class="progress-fill"
                                style="width: <?php echo $progreso; ?>%;"
                            ></div>

                        </div>

                    </div>

                    <!-- STEPS -->

                    <div class="repair-steps">

                        <div class="step <?php echo $paso1; ?>">

                            <div class="circle"></div>

                            <div class="step-text">

                                Recepción del equipo

                            </div>

                        </div>

                        <div class="step-line <?php echo $linea1; ?>"></div>

                        <div class="step <?php echo $paso2; ?>">

                            <div class="circle"></div>

                            <div class="step-text">

                                Diagnóstico técnico

                            </div>

                        </div>

                        <div class="step-line <?php echo $linea2; ?>"></div>

                        <div class="step <?php echo $paso3; ?>">

                            <div class="circle"></div>

                            <div class="step-text">

                                Reparación en proceso

                            </div>

                        </div>

                        <div class="step-line <?php echo $linea3; ?>"></div>

                        <div class="step">

                            <div class="circle"></div>

                            <div class="step-text">

                                Pruebas finales

                            </div>

                        </div>

                        <div class="step-line <?php echo $linea4; ?>"></div>

                        <div class="step <?php echo $paso5; ?>">

                            <div class="circle"></div>

                            <div class="step-text">

                                Equipo listo

                            </div>

                        </div>

                    </div>

                    <!-- BUTTON -->

                    <button
                        class="back-btn"
                        onclick="window.location.href='menu.php'"
                    >

                        Volver al menú

                    </button>

                    <?php } ?>
