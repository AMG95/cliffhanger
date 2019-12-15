<?php

    class Log{

        function __construct($aplicacion, $mensaje){
            
            $fecha = date("dmY");
            $hora  = date("H:i:s") . "h";

            switch($aplicacion){
                case "default":
                case "admin":
                    $ruta = $GLOBALS["rutaLogsAdmin"];
                    break;
                case "public":
                    $ruta = $GLOBALS["rutaLogsPublic"];
                    break;
            }
            
            $fichero = fopen($ruta . date("dmY") . ".txt", "a+");
            fwrite($fichero, $hora . " || " . $mensaje . "\n");
            fclose($fichero);

        }

    }

?>