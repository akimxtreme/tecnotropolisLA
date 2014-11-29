<?php
session_start();
require_once("../conf/conexion.php");
//echo "-->".$_GET['id'];           
$consulta = "SELECT lng_idmodelo,str_modelo as modelo,blb_img_normal,marcas.lng_idmarca,marcas.str_marca as marca,lng_idtipo_equipo,maestro.str_descripcion as tipo,lng_idgama,maestro2.str_descripcion as gama 
                    FROM tbl_modelos modelos
                    join cat_marcas marcas on marcas.lng_idmarca = modelos.lng_idmarca
                    join cat_datos_maestros maestro on maestro.lng_iddato_maestro = modelos.lng_idtipo_equipo
                    join cat_datos_maestros maestro2 on maestro2.lng_iddato_maestro = modelos.lng_idgama where lng_idmodelo =" . $_GET['id'] . " and modelos.bol_eliminado = false";

$sql = mysql_query($consulta);

if ($row = mysql_fetch_array($sql)) {
    $tipo = $row['tipo'];
    $gama = $row['gama'];
    $marca = $row['marca'];
    $modelo = $row['modelo'];
}
?>
<ol class="breadcrumb">
  <li><a href="#">Equipos</a></li>
  <li><a href="#">Buscar</a></li>
  <li class="active">Consultar</li>
</ol>
<div class="panel panel-default">

    <div class="panel-heading" style="text-transform: none;"> <i class="fa fa-fw fa-tablet"></i>&nbsp; Consultar Equipo</div>
    <div class="panel-body">

        <ul class="nav nav-tabs" role="tablist" id="myTab">
            <li class="active"><a href="#home" role="tab" data-toggle="tab">Detalles</a></li>
            <li><a href="#messages" role="tab" data-toggle="tab">Galería</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade in active" id="home">

                <div class="well details col-sm-12">
                    <div class="col-sm-12">
                        <div class="col-xs-12 col-sm-8">
                            <h2 style="text-decoration:underline;"><?= $tipo ?></h2>

                            <p><strong>Gama: </strong><?= $gama ?> </p>
                            <p class="text-center skills"><strong>Especificaciones</strong></p>

                            <ul class="list-group">

                                <?php
                                $consulta = "SELECT mod_espe.lng_idespecificacion, cat_espe.str_especificacion as especificacion, mod_espe.str_valor as valor
                                            FROM tbl_modelos_especificaciones mod_espe
                                            join cat_especificaciones cat_espe on cat_espe.lng_idespecificacion = mod_espe.lng_idespecificacion
                                            WHERE lng_idmodelo = " . $_GET['id'];

                                $sql = mysql_query($consulta);


                                while ($row = mysql_fetch_array($sql)) {
                                    ?>
                                    <li class="list-group-item">
                                        <span class="badge"><?= $row['valor'] ?></span><?= $row['especificacion'] ?>
                                    </li>  
                                <?php }
                                ?>

                            </ul>

                        </div>
                        <div class="col-xs-12 col-sm-4 col-lg-1 text-center">                        
                            <figure>

                                <img src='./imagenes/imagenes.php?id=<?= $_GET['id'] ?>'>

                                <span style="font-size:75px; padding-top: 20px;"><?= $marca ?></span>                                 
                                <span class="avg"><?= $modelo ?></span>           
                            </figure>
                        </div>
                    </div>                
                </div>
            </div>
            <div class="tab-pane fade" id="messages">

                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src='./imagenes/galeria1.php?id=<?= $_GET['id'] ?>' class='img-thumbnail' style="width: 242px;">
                            <div class="caption text-center">
                                <h3>Galería 1</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src='./imagenes/galeria2.php?id=<?= $_GET['id'] ?>' class='img-thumbnail' style="width: 242px;">
                            <div class="caption text-center">
                                <h3>Galería 2</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src='./imagenes/galeria3.php?id=<?= $_GET['id'] ?>' class='img-thumbnail' style="width: 242px;">
                            <div class="caption text-center">
                                <h3>Galería 3</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="form-inline" role="form">

            <div class="form-group">
                <div class="col-sm-5">
                    <button type="button" onclick="url('form_searchmovil.php')" class="btn btn-success">Cerrar</button>
                </div>
            </div>

        </div> 

    </div>

</div>