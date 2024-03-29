<?php

    $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
    $tabla = "";

    if (isset($busqueda)&& $busqueda!=""){
        $consulta_datos="SELECT * FROM `usuario` WHERE ((usuario_id!='".$_SESSION['id']."
        ') AND (usuario_nombre LIKE '%$busqueda%' OR usuario_apellido LIKE '%$busqueda%' 
        OR usuario_usuario LIKE '%$busqueda%' OR usuario_email LIKE '%$busqueda%'))
        ORDER BY usuario_nombre ASC LIMIT $inicio,$registros";

        $consulta_total = "SELECT COUNT(usuario_id) FROM 
        `usuario` WHERE ((usuario_id!='".$_SESSION['id']."
        ') AND (usuario_nombre LIKE '%$busqueda%' OR usuario_apellido LIKE '%$busqueda%' 
        OR usuario_usuario LIKE '%$busqueda%' OR usuario_email LIKE '%$busqueda%'))";
    }else{
        $consulta_datos="SELECT * FROM `usuario` WHERE usuario_id!='".$_SESSION['id']."
        ' ORDER BY usuario_nombre ASC LIMIT $inicio,$registros";

        $consulta_total = "SELECT COUNT(usuario_id) FROM 
        `usuario` WHERE usuario_id!='".$_SESSION['id']."'";
    }
    $conexion = conexion();

    $datos=$conexion->query($consulta_datos);
    $datos=$datos->fetchAll();

    $total=$conexion->query($consulta_total);
    $total=(int) $total->fetchColumn();

    $Npaginas=ceil($total/$registros);

    $tabla.='
    <div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr class="has-text-centered">
                <th>#</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Usuario</th>
                <th>Email</th>
                <th colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
    ';
    if ($total>=1 && $pagina<=$Npaginas){
        $contador = $inicio+1;
        $pag_inicio = $inicio+1;
        foreach($datos as $filas){
            $tabla.='
            <tr class="has-text-centered">
                <td>'.$contador.'</td>
                <td>'.$filas['usuario_nombre'].'</td>
                <td>'.$filas['usuario_apellido'].'</td>
                <td>'.$filas['usuario_usuario'].'</td>
                <td>'.$filas['usuario_email'].'</td>
                <td>
                    <a href="index.php?vista=user_update&user_id_up='.$filas['usuario_id'].'
                    " class="button is-success is-rounded is-small">Actualizar</a>
                </td>
                <td>
                    <a href="'.$url.$pagina.'&user_id_del='.$filas['usuario_id'].'
                    " class="button is-danger is-rounded is-small">Eliminar</a>
                </td>
            </tr>
            ';
            $contador++;
        }
        $pag_final = $inicio + 2;
    }else{
        if($total>=1){
            $tabla.='<tr class="has-text-centered">
            <td colspan="7">
                <a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
                    Haga clic acá para recargar el listado
                </a>
            </td>
        </tr>';
        }else{
            $tabla.='
            <tr class="has-text-centered">
                <td colspan="7">
                    No hay registros en el sistema
                </td>
            </tr>';
        }
    }
    if($total>1 && $pagina<=$Npaginas){
        $tabla.='<p class="has-text-right">Mostrando usuarios <strong>'.$pag_inicio.'</strong> al 
        <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
    } else{
        $tabla.='<p class="has-text-right">Mostrando un<strong> total de '.$pag_inicio.
        '</strong> usuario'.($pag_inicio>1?'s':'').'</p>';
    }
    $tabla.='</tbody></table></div>';
    echo $tabla;
    $conexion=null;

    if($total>=1 && $pagina<=$Npaginas){
        echo paginador_tablas($pagina,$Npaginas,$url,6);
    }
?>