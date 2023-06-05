<?php
require_once("Currencies.php");

class History extends Currencies
{
    function Testhistory()
    {
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $this->pdo->query("SELECT * FROM currencies");

        while ($row = $stmt->fetch()) {
            echo $row['name']."<br />\n";
        }
    }
}
