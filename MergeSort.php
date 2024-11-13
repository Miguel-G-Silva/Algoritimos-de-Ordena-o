<?php
session_start();

if (isset($_SESSION['numerosAleatorios'])) {
    $numerosAleatorios = $_SESSION['numerosAleatorios'];
    function mergeSort($array)
    {
        if (count($array) <= 1) {
            return $array;
        }
        // Dividindo o array no meio 
        $meio = count($array) / 2;
        $esquerda = array_slice($array, 0, $meio);
        $direita = array_slice($array, $meio);
        // Chamada recursiva e mesclando 
        return merge(
            mergeSort($esquerda),
            mergeSort($direita)
        );
    }
    function merge($esquerda, $direita)
    {
        $result = [];
        $i = $j = 0;
        while (
            $i < count($esquerda) && $j <
            count($direita)
        ) {
            if ($esquerda[$i] <= $direita[$j]) {
                $result[] = $esquerda[$i];
                $i++;
            } else {
                $result[] = $direita[$j];
                $j++;
            }
        }
        // Adiciona os elementos restantes 
        while ($i < count($esquerda)) {
            $result[] = $esquerda[$i];
            $i++;
        }
        while ($j < count($direita)) {
            $result[] = $direita[$j];
            $j++;
        }
        return $result;

    }
}
$startTime = microtime(true);
// Exemplo de uso 
$sortedArray = mergeSort($numerosAleatorios);// Marcar o tempo de fim
$endTime = microtime(true);

// Calcula o tempo de execução
$executionTime = $endTime - $startTime;


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>BubbleSort</title>
</head>

<body>
    <div class="container">
        <h3>Números Aleatórios Gerados:</h3>
        <p><?php echo implode(", ", $numerosAleatorios); ?></p>

        <h3>Números Ordenados pelo MergeSort:</h3>
        <p><?php echo implode(", ", $sortedArray); ?></p>

        <h3>Tempo de Execução do MergeSort:</h3>
        <p><?php echo number_format($executionTime, 6); ?> segundos</p>
        <a href="index.php">Voltar</a>
    </div>
</body>

</html>