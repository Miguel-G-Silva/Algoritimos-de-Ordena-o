<?php
session_start(); // Inicia a sessão

function gerarNumerosAleatorios($quantidade, $min, $max)
{
    $numeros = [];
    for ($i = 0; $i < $quantidade; $i++) {
        $numeros[] = rand($min, $max);
    }
    return $numeros;
}

// Verifica se há um envio de formulário (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantidade = $_POST["quantidade"];
    $min = $_POST["min"];
    $max = $_POST["max"];

    $numerosAleatorios = gerarNumerosAleatorios($quantidade, $min, $max);

    // Salva os números gerados na sessão
    $_SESSION['numerosAleatorios'] = $numerosAleatorios;
} elseif (isset($_SESSION['numerosAleatorios'])) {
    // Caso os números já tenham sido gerados e armazenados na sessão, recupera os números
    $numerosAleatorios = $_SESSION['numerosAleatorios'];
} else {
    // Caso contrário, define uma variável vazia
    $numerosAleatorios = [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Números Aleatórios</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="card">
        <h3>Gerador de Números Aleatórios</h3>

        <form method="post" action="">
            <label for="quantidade">Quantidade de números aleatórios:</label>
            <input type="number" id="quantidade" name="quantidade" min="1" required>

            <label for="min">Valor mínimo:</label>
            <input type="number" id="min" name="min" required>

            <label for="max">Valor máximo:</label>
            <input type="number" id="max" name="max" required>

            <button type="submit">Gerar Números</button>
        </form>

        <?php echo "<div class='result'><strong>Números Aleatórios Gerados:</strong><br>" . implode(", ", $numerosAleatorios) . "</div>";
        echo "<h3>Ordenar os números através do:</h3>
            <div>
                <a href='BubbleSort.php'>BubbleSort</a>
                <a href='QuickSort.php'>QuickSort</a>
                <a href='MergeSort.php'>MergeSort</a>
            </div>";

        ?>
    </div>

</body>

</html>