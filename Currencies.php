<?php 
class Currencies
{
    public $api_url = "http://api.nbp.pl/api/exchangerates/tables/a/";
    protected $pdo;

    function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=testcurrency", "root", "");
    }

    function getApi()
    {
        $table = json_decode(file_get_contents($this->api_url), true);

        foreach($table as $tab){
            $objects = ($tab['rates']);
            foreach ($objects as $object){
                $name = ($object['currency']);
                $code = ($object['code']);
                $rate = round(($object['mid']),2);
                $date = date("Y-m-d");
                
                $check = $this->pdo->prepare("SELECT * FROM currencies WHERE currency_code=:code");
                $check->execute(array(":code" => $code));
                
                if ($check->rowCount() > 0) {
                    $sqlUpdate = "UPDATE currencies SET exchange_rate=:rate, date=:date WHERE currency_code=:code";
                    $update = $this->pdo->prepare($sqlUpdate);
                    $update->execute(array(":rate" => $rate, ":date" => $date, ":code" => $code));
                }
                else {
                    $sqlInsert = "INSERT INTO currencies (name, currency_code, exchange_rate, date) VALUES (:name, :code, :rate, :date)";
                    $insert = $this->pdo->prepare($sqlInsert);
                    $insert->execute(array(":name" => $name, ":code" => $code, ":rate" => $rate, ":date" => $date));
                }      
            }          
        }
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

