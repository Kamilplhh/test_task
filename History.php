<?php
require_once("Currencies.php");

class History extends Currencies
{
    function GetHistory()
    {
        $stmt = $this->pdo->query("SELECT * FROM history ORDER BY id DESC LIMIT 10");

        while ($row = $stmt->fetch()) {
            echo "<br />". $row['date'] ."<br />";
            echo $row['value_in'] ." ". $row['currency_in']  ." - ". $row['value_out'] ." ". $row['currency_out'] ."<br />";
        }
    }

    function Converter()
    {
        $currency_in = $_POST['currency_in'];
        $currency_out = $_POST['currency_out'];
        $value_in = $_POST['value_in'];
        $value_out = $_POST['value_out'];
        $date = date("Y-m-d");

        $sqlInsert = "INSERT INTO history (currency_in, currency_out, date, value_in, value_out) VALUES (:currency_in, :currency_out, :date, :value_in, :value_out)";
        $insert = $this->pdo->prepare($sqlInsert);
        $insert->execute(array(":currency_in" => $currency_in, ":currency_out" => $currency_out, ":date" => $date, ":value_in" => $value_in, ":value_out" => $value_out));
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $History = new History();
    $History->Converter();
}
