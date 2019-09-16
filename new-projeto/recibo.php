<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Recibo</title>
</head>
<body>
    
</body>
</html>
<?php

function dataFormatada($validade=0) {
    $formated = "";
    $day = date("d");
    $index = date("m");
    $year = date("Y");
    $validade = ($validade > 11) ? $validade - 11 : $validade;
    $months = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
    $retVal = ($validade==0) ? "Jundiaí," : "" ;
    $formated = "$retVal $day de " . $months[$index-1+$validade] . " de $year\r\n";
    return $formated;
}

function formatarTexto($itensName, $itensPrice, $username, $payment) {
    $itensListString = "\r\nItens:";
    $total = 0;

    for ($i=0; $i < 3; $i++) { 
        $price = "R$" . number_format($itensPrice[$i], 2, ',', '.');
        $itensListString .= ($itensPrice[$i] != 0) ? "\r\t $itensName[$i] => $price  \r\n" : "";
        $total = $total + $itensPrice[$i];
    }
    
    $desconto = ($payment == "debito") ? 0.9 : 0.95;
    $totalComDesconto = $total * $desconto;
    $desconto = $total - $totalComDesconto;
    
    $recibo = "";
    $recibo = "Nome: $username \r\n" . dataFormatada() . $itensListString;
    $recibo .= "\r\nTotal= R$".number_format($totalComDesconto, 2, ',', '.') ;
    $recibo .= "\tDesconto= R$".number_format($desconto, 2, ',', '.')."\r\n";
    $recibo .= "Validade até" . dataFormatada(1);
    return $recibo;
}   

function gerarRecibo($texto) {
    $file = fopen("recibo.txt","w");
    fwrite($file, $texto);
}

date_default_timezone_set("America/Sao_Paulo");
$item1 = (isset($_GET["item1"])) ? intval($_GET["item1"]) : 0;
$item2 = (isset($_GET["item2"])) ? intval($_GET["item2"]) : 0;
$item3 = (isset($_GET["item3"])) ? intval($_GET["item3"]) : 0;
$pay = (isset($_GET["pay"])) ? $_GET["pay"] : 0;
$username = (isset($_GET["username"])) ? $_GET["username"] : 0;

$itens = array("Kit Iniciante", "Ski Red Crown", "Ski Básico");
$itensPrice = array($item1, $item2, $item3);

$texto = formatarTexto($itens, $itensPrice, $username, $pay);
gerarRecibo($texto);

echo "<div style='height:100vh' id='logoContent'>
        <br><br><br>
        <h2 style='color: white;'>Recibo Gerado</h2>
        <textarea style='' cols='50' rows='13'>$texto</textarea> 
        <p>
            <a style='color: white;' href='index.html'>Voltar</a>
        </p>
    </div>"
?>


