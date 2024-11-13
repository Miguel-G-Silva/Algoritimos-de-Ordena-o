<?php

session_start();

// Verifica se a variável de sessão com os números aleatórios já existe
if (isset($_SESSION['numerosAleatorios'])) {
    $numerosAleatorios = $_SESSION['numerosAleatorios'];

    function quickSort($array)
    {
        if (count($array) < 2) {
            return $array;
        }
        $tamanho = count($array);
        $meioIndice = floor($tamanho / 2);
        // Escolhendo o pivô
        $pivo = $array[$meioIndice];
        $menor = [];
        $maior = [];

        // Particionando o array 
        for ($i = 0; $i < count($array); $i++) {
            if ($i != $meioIndice) {
                if ($array[$i] <= $pivo) {
                    $menor[] = $array[$i];
                } else {
                    $maior[] = $array[$i];
                }
            }
        }
        // Chamada recursiva 
        return array_merge(quickSort($menor), [$pivo], quickSort($maior));
    }
}

$startTime = microtime(true);

// Executa o algoritmo QuickSort
$sortedArray = quickSort($numerosAleatorios);

$endTime = microtime(true);

$executionTime = $endTime - $startTime;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>QuickSort</title>
</head>

<body>
    <div class="container">
        <h3>Números Aleatórios Gerados:</h3>
        <p><?php echo implode(", ", $numerosAleatorios); ?></p>

        <h3>Números Ordenados pelo QuickSort:</h3>
        <p><?php echo implode(", ", $sortedArray); ?></p>

        <h3>Tempo de Execução do QuickSort:</h3>
        <p><?php echo number_format($executionTime, 6); ?> segundos</p>
        <a href="index.php">Voltar</a>
    </div>
</body>

</html>