<?php
$nota = 5.3;

$media = arredondaMedia($nota);

function arredondaMedia($nota) {

    $tipo = gettype($nota);
    
    if($tipo != 'integer' && $tipo != 'double') {
        return null;
    }

    $result = explode('.', $nota);

    if(count($result)==1) {
        return $nota;
    }

    if (count($result) == 2) {
        $valor = $result[0];
        $decimal = $result[1];

        if ($decimal <= 2) {
            $nota = round($nota);
        }

        if ($decimal > 2 and $decimal <= 4) {
            $nota = $valor + .5;
        }

        if ($decimal > 5 and $decimal <= 7) {
            $nota = $valor + .5;
        }

        if ($decimal > 7) {
            $nota = ceil($valor+1);
        }
    }

    return $nota;
}