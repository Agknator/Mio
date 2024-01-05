<?php
    # Conexión a la base de datos #
    function conexion(){
        $pdo = new PDO('mysql:host=localhost;dbname=inventario', 'root', '');
        return $pdo;
    }

    # Verificar datos #
    function verificar_datos($filtro,$cadena){
        if (preg_match("/^.$filtro.$/",$cadena)){
            return false;
        }else{
            return true;
        }
    }

    # Limpiar cadenas de texto (Para evitar inyeccion sql) #
    function limpiar_cadena($cadena){
        $cadena=trim($cadena);
        $cadena=stripslashes($cadena);
        $cadena=str_ireplace("<script>", "", $cadena);
        $cadena=str_ireplace("</script>", "", $cadena);
        $cadena=str_ireplace("<script src>", "", $cadena);
        $cadena=str_ireplace("<script type>", "", $cadena);
        $cadena=str_ireplace("SELECT * FROM", "", $cadena);
        $cadena=str_ireplace("DELETE FROM", "", $cadena);
        $cadena=str_ireplace("INSERT INTO", "", $cadena);
        $cadena=str_ireplace("DROP TABLE", "", $cadena);
        $cadena=str_ireplace("DROP DATABASE", "", $cadena);
        $cadena=str_ireplace("TRUNCATE TABLE", "", $cadena);
        $cadena=str_ireplace("SHOW TABLES", "", $cadena);
        $cadena=str_ireplace("SHOW DATABASES", "", $cadena);
        $cadena=str_ireplace("<?php", "", $cadena);
        $cadena=str_ireplace("?>", "", $cadena);
        $cadena=str_ireplace("--", "", $cadena);
        $cadena=str_ireplace("^", "", $cadena);
        $cadena=str_ireplace("<", "", $cadena);
        $cadena=str_ireplace(">", "", $cadena);
        $cadena=str_ireplace("[", "", $cadena);
        $cadena=str_ireplace("]", "", $cadena);
        $cadena=str_ireplace("==", "", $cadena);
        $cadena=str_ireplace(";", "", $cadena);
        $cadena=str_ireplace(":", "", $cadena);
        $cadena=trim($cadena);
        $cadena=stripslashes($cadena);
        return $cadena;
    }

    # Funcion renombrar fotos #
    function renombrar_fotos($nombre){
        $nombre=str_ireplace(" ", "_",$nombre);
        $nombre=str_ireplace("/", "_",$nombre);
        $nombre=str_ireplace("#", "_",$nombre);
        $nombre=str_ireplace("-", "_",$nombre);
        $nombre=str_ireplace("$", "_",$nombre);
        $nombre=str_ireplace(".", "_",$nombre);
        $nombre=str_ireplace(",", "_",$nombre);
        $nombre=$nombre."_".rand(0,100);
        return $nombre; 
    }

    # Paginador de tablas #
    function paginador_tablas($pagina, $Npaginas, $url, $botones){
        $tabla='<nav class="pagination is-centered is-rounded"
        role="navigation" aria-label="pagination">';

        // pagina y boton anterior
        if($pagina<=1){
            $tabla.='<a href="#" class="pagination-previous is-disabled" disabled>Anterior</a>
             <ul class="pagination-list">';
        }else{
            $tabla.='<a href="'.$url.($pagina-1).'" class="pagination-previous">Anterior</a>
            <ul class="pagination-list">
                <li><a href="'.$url.'1" class="pagination-link">1</a></li>
                <li><span class="pagination-ellipsis">elipse:</a></li>
            ';
        }

        // Paginacion de los botones
        $ci=0;
        for($i=$pagina; $i<=$$Npaginas; $i++){
            // Los botones maximos
            if($ci>=$botones){
                break;
            }
            // botones de las paginas
            if($pagina==$i){
                $tabla.='<li><a href="'.$url.$i.'" class="pagination-link is-current">'.$i.'</a></li>';
            }else{
                $tabla.='<li><a href="'.$url.$i.'" class="pagination-link">'.$i.'</a></li>';
            }
            $ci++;
        }

        // Pagina y boton siguiente
        if($pagina==$Npaginas){
            $tabla.='
            </ul>
            <a href="#" class="pagination-next is-disabled" disabled>Siguiente</a>
            ';
        }else{
            $tabla.='
                <li><span class="pagination-ellipsis">elipse:</a></li>
                <li><a href="'.$url.$Npaginas.'" class="pagination-link">'.$Npaginas.'</a></li>
            </ul>
            <a href="'.$url.($pagina+1).'" class="pagination-next">Siguiente</a>
            ';
        }

        $tabla.='</nav>';
        return $tabla;
    }

?>