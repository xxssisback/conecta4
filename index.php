<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <title>Connect4 Game</title>
</head>
<body>
<div class="title">
    <h1 class="pt">CONNECT4</h1>
    <h1 class="st">GAME</h1>
    <div class="authors">
        <span class="authors">Desenvolupat i dissenyat per<br>
        <font>Pau Motos</font> & <font>Sergio Muñoz</font></span>
    </div>
</div>
<div class="container">
<?php

session_start();



if (!isset($_SESSION["taulell"]) || !isset($_REQUEST["columna"])) {
    $_SESSION["taulell"]=[
        [" "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "],
        [" "," "," "," "," "," "," "],
      
    ];
};




if (!isset($_SESSION["jugador"]) || !isset($_REQUEST["columna"])) {
    $_SESSION["jugador"] = 1;
}



if(isset($_REQUEST["columna"])) {
    $columna=$_REQUEST["columna"];
    if (processar_moviment($columna)) {
       $_SESSION["jugador"] == 1 ? $_SESSION["jugador"] = 2 : $_SESSION["jugador"] = 1;

    }else{
        echo "Columna erronea";
    }
}

pintar_taulell();
if(no_hi_ha_guanyador()){
    ?>
    <br>
    <form action=index.php method="GET">
    <label>Introdueix una posició del 1 al 7</label>
    <input class="insert" type="text" size=2 min=1 max=7 name=columna placeholder="Moviment del jugador <?php echo $_SESSION["jugador"];?>" autofocus>
</form>
<?php 
}else {
    $_SESSION["jugador"] == 1 ? $_SESSION["jugador"] = 2 : $_SESSION["jugador"] = 1;

    echo "Felicitats jugador ". $_SESSION["jugador"];
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
       
        if ($_SESSION["taulell"][0][$num_col - 1] != 0) {
            echo "Columna plena";
           
            return false;
        }
        gravar_moviment($num_col);
        return true;
    } else {
        echo"Columna correcta";
        return false;
    }
}

function gravar_moviment($num_col)
{
    

    $num_col--;
    
    for ($c = 5; $c >= 0; $c--) {
        if ($_SESSION["taulell"][$c][$num_col] == " ") {
            if ($_SESSION["jugador"]==1) {
                $_SESSION["taulell"][$c][$num_col] = "1";
               
                
            }else if ($_SESSION["jugador"]==2) {
                $_SESSION["taulell"][$c][$num_col] = "2";
            }
          
            $c = -1;
            return; 
        }
    }

}

function pintar_taulell()
{

echo "<pre >" ;
    for ($t = 0; $t < 6; $t++) {
        for ($tt = 0; $tt < 7; $tt++) {
            echo "|" . $_SESSION["taulell"][$t][$tt]; 
        }
        echo "|<br>";
    }
echo "</pre>";
}

function no_hi_ha_guanyador()
{
  

    for ($t = 0; $t < 6; $t++) {
        $n_uns = 0;
        for ($tt = 0; $tt < 7; $tt++) {
            if ($_SESSION["taulell"][$t][$tt] == "1") {
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
            if ($_SESSION["taulell"][$t][$tt] == "2" ) {
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
            if ($_SESSION["taulell"][$tt][$t] == "1") {
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
            if ($_SESSION["taulell"][$tt][$t] == "2") {
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
                if($_SESSION["taulell"][$t+$tt][$tt]=="1"){
    
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
                if($_SESSION["taulell"][$t-$tt][$tt] == "1") {
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
                if($_SESSION["taulell"][$t+$tt][$tt]=="2"){
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
                if($_SESSION["taulell"][$t-$tt][$tt] == "2") { 
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
</div>

<!-- Scripts -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>