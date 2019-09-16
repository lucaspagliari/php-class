<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nice</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div style="align-itens: center; height: 40vh">
        <div style="margin-top: 40vh">
            <h2 class="title">Aluguel Concluído</h2>
            <br>
            <h3 class="title">Recibo Gerado</h3>
            <a href="index.php">
                <h4>go back</h4>
            </a>
        </div>   
    </div>
</body>
</html>

<?php
    function recibo($name, $price, $products, $payment) {
        
        $formatedItens = "";
        $total = 0;
        for ($i=0; $i < count($price); $i++) { 
            if ($price[$i] != 0) {
                $formatedItens .= "\t" . $products[$i] . " : " . "R$" . number_format($price[$i], 2, ',', '.') ."\r\n";
                $total = $total + $price[$i]; 
            }
        }
        $totalDesconto = ($payment == "boleto") ? $total * 0.90 : $total * 0.95;
        $desconto = $total - $totalDesconto;
        $file = fopen("recibo.txt","w");
        $text = "Nome: " . $name . "\r\n";
        $text .= formatedDateNow() . "\r\n";
        $text .= "Itens \r\n" . $formatedItens . "\r\n"; 
        $text .= "Total: R$" . number_format($totalDesconto, 2, ',', '.') . "\r\n";
        $text .= "Pagamento: " . $payment . "\tDesconto: R$" . number_format($desconto, 2, ',', '.') . "\r\n";
        $text .= "Validade: " . formatedDateNow(1);
        fwrite($file, $text);
        // echo $text;
    }

    function formatedDateNow($validade=0) {
        $formated = "";
        $day = date('d');
        $index = date('m');
        $year = date("Y");
        $validade = ($validade > 11) ? $validade - 11 : $validade;
        $months = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
        $formated = "Jundiaí, ". $day . " de " . $months[$index-1+$validade] . " de " . $year;
        return $formated;
    }

    $itens = array("Kit Ski", "Prancha Snowboard", "Capacete");
    date_default_timezone_set('America/Sao_Paulo');
    
    $username = (isset($_GET["username"])) ? $_GET["username"] : 0;
    $item1 = (isset($_GET["item1"])) ? intval($_GET["item1"]) : 0;
    $item2 = (isset($_GET["item2"])) ? intval($_GET["item2"]) : 0;
    $item3 = (isset($_GET["item3"])) ? intval($_GET["item3"]) : 0;
    $pay = (isset($_GET["pay"])) ? $_GET["pay"] : 0;
    $value = array($item1, $item2, $item3);

   recibo($username, $value, $itens, $pay);
?>