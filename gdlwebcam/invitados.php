<?php include_once 'includes/templates/header.php';?>

    <?php
    try {
        require_once('includes/funciones/bdconexion.php');//Conexion a la BD
        $sql = "SELECT * FROM invitados "; //Es importante dejar un espacio entre la última letra y las comillas
        $resultado = $conn->query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    ?>
    <section class="invitados contenedor seccion">
        <h2>Invitados</h2>
        <ul class="lista-invitados clearfix">
    <?php while($invitados = $resultado -> fetch_assoc() ) { ?>
                <li>
                    <div class="invitado">
                        <a class="invitado-info" href="#invitado<?php echo $invitados['invitado_id']; ?>">
                        <img src="img/<?php echo $invitados['url_imagen'] ?>" alt="imagen invitado">
                        <p><?php echo $invitados['nombre_invitado'] . " " . $invitados ['apellido_invitado']?></p>
                        </a>
                    </div>
                </li>
            <div style="display:none;">
                <div class="invitado-info" id="invitado<?php echo $invitados['invitado_id']; ?>">
                    <h2><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?></h2>
                    <img src="img/<?php echo $invitados['url_imagen'] ?>" alt="imagen invitado">
                    <p><?php echo $invitados['descripcion'] ?></p>
                </div>

            </div>
           <?php } ?>
        </ul>
    </section><!--invitados-->
    <?php $conn->close();//cerramos la conexión a la BD ?>
    </section>
<?php include_once 'includes/templates/footer.php'; ?>
