<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Lojinha</title>
</head>
<body>
    <header>
        <a href="#">
            <h1 class="title">Ski Store</h1>
        </a>    
    </header>
    <br>
    <form action="gerar_recibo.php" onsubmit="return validateForm(this)">
        <table>
            <tr>
                <td>
                    <div class="title-box">
                        <h2 class="item-title">Kit Ski</h2>
                    </div>    
                    <img src="img/item-1.jpg" alt="equipamento" height="200">
                    <p>
                        <h3 class="item-price">R$1500,00</h3>
                        <input type="checkbox" name="item1" value="1500" onchange="selectedItens(this, 0)">
                    </p> 
                </td>
                <td>
                    <div class="title-box">
                        <h2 class="item-title">Prancha Snowboard</h2>
                    </div>    
                    <img src="img/item-2.jpg" alt="equipamento" height="200">
                    <p>
                        <h3 class="item-price">R$800,00</h3>
                        <input type="checkbox" name="item2" value="800" onchange="selectedItens(this, 1)">
                    </p>   
                </td>
                <td>
                    <div class="title-box">
                        <h2 class="item-title">Capacete</h2>
                    </div>    
                    <img src="img/item-3.jpg" alt="equipamento" height="200">
                    <p>
                        <h3 class="item-price">R$200,00</h3>
                        <input type="checkbox" name="item3" value="200" onchange="selectedItens(this, 2)">
                    </p>    
                </td>
            </tr>
            <tr>
                <td colspan=3>
                    <br>
                    <h2 class="title">Preencha os Campos Abaixo</h2>
                </td>
            </tr>
            <tr>
                <td colspan=3>
                    <br>
                    <label for="name">Seu Nome</label>
                    <input name="username" type="text" value="">
                    
                    <label for="pay">Boleto desconto 10% </label>
                    <input name="pay" type="radio" value="boleto">

                    <label for="pay">Crédito desconto 5%</label>
                    <input name="pay" type="radio" value="credito">
                </td>
            </tr>
        </table>
        <br>
        <button type="submit">Alugar!</button>
        <button type="reset">Clear</button>
    </form>
    <p id="log"></p>
    <script src="js/script.js"></script>
</body>
</html>