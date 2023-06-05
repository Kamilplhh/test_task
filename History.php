<?php
require_once("Currencies.php");

class History extends Currencies
{
    function GetHistory()
    {
        $stmt = $this->pdo->query("SELECT * FROM history ORDER BY id DESC LIMIT 10");

        while ($row = $stmt->fetch()) {
            echo $row['date'] . "<br />\n";
            echo $row['currency_in'] . "-" . $row['currency_out'] . "<br />\n";
        }
    }

    // function Converter()
    // {
    //     $sqlInsert = "INSERT INTO currencies (name, currency_code, exchange_rate, date) VALUES (:name, :code, :rate, :date)";
    //     $insert = $this->pdo->prepare($sqlInsert);
    //     $insert->execute(array(":name" => $name, ":code" => $code, ":rate" => $rate, ":date" => $date));  
    // }
}
