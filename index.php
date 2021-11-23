<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
        <script src="https://kit.fontawesome.com/5a9306bf90.js" crossorigin="anonymous"></script>
        <title>Conecta 4 -Pau Motos & Sergio Muñoz</title>
    </head>
    <body>
        <!-- Scripts -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="assets/js/scripts.js"></script>

        <!-- Titulo del juego -->
        <div class="title">
            <h1 class="pt">Conecta 4</h1>
            <h1 class="st">Developed by Pau Motos & Sergio Muñoz</h1>
        </div>
        <div class="container">
        <?php

        // Esta funcion es la que se encarga de encender la session para poder jugar
        session_start();


        // Si existe jugador y existe columna crea el tablero
        if (!isset($_SESSION["tablero"]) || !isset($_REQUEST["columna"])) {
            $_SESSION["tablero"]=[
                [" "," "," "," "," "," "," "],
                [" "," "," "," "," "," "," "],
                [" "," "," "," "," "," "," "],
                [" "," "," "," "," "," "," "],
                [" "," "," "," "," "," "," "],
                [" "," "," "," "," "," "," "],
            
            ];
        };



        // Si existe jugador y existe columna crea la variable jugador.
        if (!isset($_SESSION["jugador"]) || !isset($_REQUEST["columna"])) {
            $_SESSION["jugador"] = 1;
        }




        /**
         *  Este if mira la request de la columna y lo guarda en la variable $columna
         *  ~ Llama a la funcion procesar movimiento para comprovar la columna
         *  ~ Si la columna es correcta la columna alterna entre los jugadores
         *  ~ Si la columna no es correctra retornara una alerta para advertir de ello 
         */
        if(isset($_REQUEST["columna"])) {
            $columna=$_REQUEST["columna"];
            if (processar_moviment($columna)) {
            $_SESSION["jugador"] == 1 ? $_SESSION["jugador"] = 2 : $_SESSION["jugador"] = 1;

            }else{
                echo "<script> columna_erronea()</script>";
            }
        }



        /**
         * 
         */
        pintar_tablero();
        if(no_hi_ha_guanyador()){
            ?>
            <br>

            
        <?php 
        }else {

            if ( $_SESSION["jugador"] == 2) {
                echo "<script> ganador1() </script>";
            } else {
                echo "<script> ganador2() </script>";
            }
            
            ?>
            <br>    
        <?php 
            
        }


        function processar_moviment($columna)
        {
            if (
                $columna == '1' ||
                $columna == '2' ||
                $columna == '3' ||
                $columna == '4' ||
                $columna == '5' ||
                $columna == '6' ||
                $columna == '7'
            ) {
                $num_col = intval($columna);
            
                if ($_SESSION["tablero"][0][$num_col - 1] != 0) {           
                    return false;
                }
                gravar_moviment($num_col);
                return true;
            } else {
                return false;
            }
        }

        function gravar_moviment($num_col)
        {
            $num_col--;
            for ($c = 5; $c >= 0; $c--) {
                if ($_SESSION["tablero"][$c][$num_col] == " ") {
                    if ($_SESSION["jugador"]==1) {
                        $_SESSION["tablero"][$c][$num_col] = "1";
                        
                        
                    }else if ($_SESSION["jugador"]==2) {
                        $_SESSION["tablero"][$c][$num_col] = "2";
                        
                    }
                
                    $c = -1;
                    return; 
                }
            }

        }

        function pintar_tablero()
        {

        echo "<pre>" ;
            for ($t = 0; $t < 6; $t++) {
                for ($tt = 0; $tt < 7; $tt++) {
                    if ($_SESSION["tablero"][$t][$tt] == 1) {
                        echo "🔵";
                    } else if (($_SESSION["tablero"][$t][$tt] == 2)) {
                        echo "🔴";
                    } else {
                        echo "⚪";
                    }
                    ; 
                }
                echo "<br>";
            }
        echo "</pre>";
        }

        function no_hi_ha_guanyador()
        {
        

            for ($t = 0; $t < 6; $t++) {
                $n_uns = 0;
                for ($tt = 0; $tt < 7; $tt++) {
                    if ($_SESSION["tablero"][$t][$tt] == "1") {
                        $n_uns++;
                        if ($n_uns == 4) {
                            return false;
                        }
                    } else {
                        $n_uns = 0;
                    }
                }
            }

            //Comprovar que no hi hagi 4 uns en una mateixa fila

            for ($t = 0; $t < 6; $t++) {
                $n_uns = 0;
                for ($tt = 0; $tt < 7; $tt++) {
                    if ($_SESSION["tablero"][$t][$tt] == "2" ) {
                        $n_uns++;
                        if ($n_uns == 4) {
                            return false;
                        }
                    } else {
                        $n_uns = 0;
                    }
                }
            }

            //Comprovar que no hi hagi 4 uns en una mateixa columna

            for ($t = 0; $t < 7; $t++) {
                $n_uns = 0;
                for ($tt = 0; $tt < 6; $tt++) {
                    if ($_SESSION["tablero"][$tt][$t] == "1") {
                        $n_uns++;
                        if ($n_uns == 4) {
                            return false;
                        }
                    } else {
                        $n_uns = 0;
                    }
                }
            }

            //Comprovar que no hi hagi 4 uns en una mateixa columna

            for ($t = 0; $t < 7; $t++) {
                $n_uns = 0;
                for ($tt = 0; $tt < 6; $tt++) {
                    if ($_SESSION["tablero"][$tt][$t] == "2") {
                        $n_uns++;
                        if ($n_uns == 4) {
                            return false;
                        }
                    } else {
                        $n_uns = 0;
                    }
                }
            }

        

            for ($t=-3; $t < 3 ; $t++) { 
                $n_uns = 0;
                for ($tt=0; $tt < 7; $tt++) {  
            
                    if (($t+$tt)>=0 && ($t+$tt)<6 && $tt>=0 && $tt<7) {
                        if($_SESSION["tablero"][$t+$tt][$tt]=="1"){
            
                            $n_uns++;
                            if ($n_uns >=4 ) return false;
                        }else
                            $n_uns=0;
                        
                    }    
                }
            }

            for($t=3;$t<9;$t++) { 
                $n_uns = 0;
                for($tt=0;$tt<7;$tt++) { 
                
                    if(($t-$tt)>=0 && ($t-$tt)<6 && $tt>=0 && $tt<7) {
                        if($_SESSION["tablero"][$t-$tt][$tt] == "1") {
                            $n_uns++;
                            if($n_uns >= 4) return false;
                        } else {
                            $n_uns = 0  ; 
                        }
                    }
                }
            }
            ////////////////////////////////
            for ($t=-3; $t < 3 ; $t++) {
                $n_uns = 0;
                for ($tt=0; $tt < 7; $tt++) { 
                
                    if (($t+$tt)>=0 && ($t+$tt)<6 && $tt>=0 && $tt<7) {
                        if($_SESSION["tablero"][$t+$tt][$tt]=="2"){
                            $n_uns++;
                            if ($n_uns >=4 ) return false;
                        }else
                            $n_uns=0;
                        
                    }    
                }
            }

            for($t=3;$t<9;$t++) { 
                $n_uns = 0;
                for($tt=0;$tt<7;$tt++) {
                    if(($t-$tt)>=0 && ($t-$tt)<6 && $tt>=0 && $tt<7) {
                        if($_SESSION["tablero"][$t-$tt][$tt] == "2") { 
                            $n_uns++;
                            if($n_uns >= 4) return false;
                        } else {
                            $n_uns = 0  ; 
                        }
                    }
                }
            }


            return true;
        }
        ?>

            <!-- Formulario de botones (Introducir y reiniciar) -->
            <form action=index.php method="GET">
                <input class="insert" type="text" size=2 min=1 max=7 name=columna placeholder="Introduce columna JUGADOR <?php echo $_SESSION["jugador"];?>" autofocus>
                <br><br>
                <input class="reload" style="cursor: pointer;" type="button" size=2 name=columna value="Reiniciar juego" onclick="location.href='index.php';">
            </form>

            <!-- Aqui tenemos el boton para saver como jugar. Llama a una funcion de SwetAlert2 donde te informa de las normas del juego. -->
            <i class="icon fas fa-info-circle" style="cursor: pointer;" onclick="info()"></i>
        </div>
    </body>
</html>