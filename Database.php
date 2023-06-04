<?php 
class Database
{
    protected $pdo;

    function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=testcurrency", "root", "");
    }

    function Test()
    {
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $this->pdo->query("SELECT * FROM test");

        while ($row = $stmt->fetch()) {
            echo $row['dsc']."<br />\n";
        }
    }

}

