# arredonda_media_notas

## Função para arredondamento de frações que pode ser usado para cálculo de médias por exemplo.

### Regras

- $decimal <= 2 Ex: 4.1 ou 4.2 resultado 4
- $decimal > 2 e <= 4 Ex: 4.3 ou 4.4 resultado 4.5
- $decimal > 5 e <= 7 Ex: 4.6 ou 4.7 resultado 4.5
- $decimal > 7  acrescenta meio décimo Ex: 4.8 ou 4.9 = 5

### Exemplo de código


```
<?php

arredondaMedia(4.1) // saida 4
arredondaMedia(4.2) // saida 4
arredondaMedia(4.3) // saida 4.5
arredondaMedia(4.4) // saida 4.5
arredondaMedia(4.5) // saida 4.5
arredondaMedia(4.6) // saida 4.5
arredondaMedia(4.7) // saida 4.5
arredondaMedia(4.8) // saida 5
arredondaMedia(4.9) // saida 5


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
```