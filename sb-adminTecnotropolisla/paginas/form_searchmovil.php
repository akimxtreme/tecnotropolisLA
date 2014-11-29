<?php
session_start();
require_once("../conf/conexion.php");

//echo $_GET['valor'];

switch ($_GET['valor']) {

    case 1:
        $titulo = ' <li><a href="#">Especificaciones</a></li><li class="active">Buscar</li>';
        break;

    case 2:
        $titulo = ' <li><a href="#">Imágenes</a></li><li class="active">Buscar</li>';
        break;

    default :
        $titulo = ' <li class="active">Buscar</li>';
        break;
}
?>

<ol class="breadcrumb">
  <li><a href="#">Equipos</a></li>
  <?=$titulo?>
</ol>

<div class="panel panel-default">

    <div class="panel-heading" style="text-transform: none;"> <i class="glyphicon glyphicon-ok-circle"></i>&nbsp; Seleccione un Equipo</div>

    <div class="panel-body">

        <div id="main">

            <div id="demo">
                <table class="tablesorter table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="filter-select filter-exact" data-placeholder="Seleccione">Marca</th>
                            <th>Modelo</th>
                            <th class="filter-select filter-exact" data-placeholder="Seleccione">Tipo</th>
                            <th class="filter-select filter-exact" data-placeholder="Seleccione">Gama</th>

                    </thead>
                    <tfoot>

                        <tr>
                            <th colspan="7" class="ts-pager form-horizontal">
                                <button type="button" class="btn first"><i class="icon-step-backward glyphicon glyphicon-step-backward"></i></button>
                                <button type="button" class="btn prev"><i class="icon-arrow-left glyphicon glyphicon-backward"></i></button>
                                <span class="pagedisplay"></span> <!-- this can be any element, including an input -->
                                <button type="button" class="btn next"><i class="glyphicon glyphicon-forward"></i></button>
                                <button type="button" class="btn last"><i class="icon-step-forward glyphicon glyphicon-step-forward"></i></button>
                                <select class="pagesize input-mini" title="Selecione cantidad de registros por página">
                                    <option selected="selected" value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                </select>
                                <select class="pagenum input-mini" title="Selecione el número de página"></select>
                            </th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        $consulta = "SELECT lng_idmodelo,str_modelo as modelo,marcas.lng_idmarca,marcas.str_marca as marca,lng_idtipo_equipo,maestro.str_descripcion as tipo,lng_idgama,maestro2.str_descripcion as gama 
                                        FROM tbl_modelos modelos
                                        join cat_marcas marcas on marcas.lng_idmarca = modelos.lng_idmarca
                                        join cat_datos_maestros maestro on maestro.lng_iddato_maestro = modelos.lng_idtipo_equipo
                                        join cat_datos_maestros maestro2 on maestro2.lng_iddato_maestro = modelos.lng_idgama where modelos.bol_eliminado = false";
                        $sql = mysql_query("$consulta");
                        while ($row = mysql_fetch_array($sql)) {
                            ?>
                            <tr>
                                <td><?= $row['marca'] ?></td>
                                <td><?= $row['modelo'] ?></td>
                                <td><?= $row['tipo'] ?></td>
                                <td><?= $row['gama'] ?></td>
                                <td>

                                    <?php
                                    switch ($_GET['valor']) {
                                        case 1:
                                            ?>

                                            <button class="btn btn-sm btn-hover btn-primary" value="" onclick="url2('form_addespecificaciones.php?id=' +<?= $row['lng_idmodelo'] ?>)">
                                                <i class="fa fa-fw fa-list-ol" data-toggle="tooltip" data-placement="bottom" title="Agregar"></i>
                                            </button>

                                            <?php
                                            break;

                                        case 2:
                                            ?>
                                            <button class="btn btn-sm btn-hover btn-primary" value="" onclick="url2('form_addimagenes.php?id=' +<?= $row['lng_idmodelo'] ?>)">
                                                <i class="fa fa-fw fa-file-image-o" data-toggle="tooltip" data-placement="bottom" title="Agregar"></i>
                                            </button>
                                    
                                            <?php
                                            break;

                                        default :
                                            ?>
                                            <button class="btn btn-sm btn-hover btn-primary" data-toggle="tooltip" data-placement="bottom" title="Consultar" value="" onclick="url2('form_querymovil.php?id=' +<?= $row['lng_idmodelo'] ?>)">
                                                <i class="glyphicon glyphicon-search"></i>
                                            </button>&nbsp;
                                            
                                            <button class="btn btn-sm btn-hover btn-success" data-toggle="tooltip" data-placement="bottom" title="Especificaciones" value="" onclick="url2('form_addespecificaciones.php?id=' +<?= $row['lng_idmodelo'] ?>)">
                                                <i class="fa fa-fw fa-list-ol"></i>
                                            </button>&nbsp;
                                            
                                            <button class="btn btn-sm btn-hover btn-warning" data-toggle="tooltip" data-placement="bottom" title="Editar" value="" onclick="url2('form_editmovil.php?id=' +<?= $row['lng_idmodelo'] ?>)" >
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </button>&nbsp;

                                            <button class="btn btn-sm btn-hover btn-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar" value="" onclick="url2('form_deletemovil.php?id=' +<?= $row['lng_idmodelo'] ?>)">
                                                <i class="glyphicon glyphicon-remove"></i>
                                            </button>

                                            <?php
                                            break;
                                    }
                                    ?>

                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>