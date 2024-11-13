<?php
session_start();

if (isset($_SESSION['numerosAleatorios'])) {
    $numerosAleatorios = $_SESSION['numerosAleatorios'];

    function bubbleSort($array)
    {
        $n = count($array);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    // Troca os elementos adjacentes se estiverem na ordem errada
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
        return $array;
    }

    $startTime = microtime(true);

    // Executa o algoritmo BubbleSort
    $numerosOrdenados = bubbleSort($numerosAleatorios);

    $endTime = microtime(true);

    $executionTime = $endTime - $startTime;
}
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

        <h3>Números Ordenados pelo BubbleSort:</h3>
        <p><?php echo implode(", ", $numerosOrdenados); ?></p>

        <h3>Tempo de Execução do BubbleSort:</h3>
        <p><?php echo number_format($executionTime, 6); ?> segundos</p>

        <a href="index.php">Voltar</a>
    </div>
</body>

</html>