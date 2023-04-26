<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div class="b1">
        <h1>Internetwy sklep z eko-warzywami</h1>
    </div>

    <div class="b2">
    <ol>
        <li>warzywa</li>
        <li>owoce</li>
        <li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
    </ol>

    </div>

    <div class="bg">

    <?php
    
    $con = new mysqli("127.0.0.1","root","","dane2");
    $sql = "SELECT nazwa,ilosc,opis,cena,zdjecie FROM `produkty` WHERE Rodzaje_id=1 OR  rodzaje_id=2";
    $res = $con->query($sql);
    $rows = $res->fetch_all((MYSQLI_ASSOC));
    for ($i=0;$i<count($rows);$i++){
        echo "<div class='blok'><img src=".$rows[$i]["zdjecie"].">";
        echo "<h5>".$rows[$i]["nazwa"]."</h5>";
        echo "<p>opis: ".$rows[$i]["opis"]."</p>";
        echo "<p>na stanie: ".$rows[$i]["ilosc"]."</p>";
        echo "<h2>".$rows[$i]["cena"]."zł</h2>";
        echo "</div>";
        
    }
    $con -> close();

    ?>

    </div>

    <div class="s1">
        <form method="post">
        Nazwa<input name="nazwaowocu">
        Cena<input name="cenaowocu">
        <button>Dodaj produkt</button>
        </form>
        <p>Stronę wykonał 00000000000</p>

        <?php
        
        $con = new mysqli("127.0.0.1","root","","dane2");
        if(isset($_POST["nazwaowocu"]) && isset($_POST["cenaowocu"])){
        $sql = "INSERT INTO `produkty` (`id`, `Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES (NULL, '1', '4', '".$_POST["nazwaowocu"]."', '1', NULL, '".$_POST["cenaowocu"]."', 'owoce.jpg');
        ";
        $res = $con->query($sql);
        }
        
        
        ?>

    </div>
</body>
</html>