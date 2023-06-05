<?php

require_once "History.php";
require_once "Currencies.php";

$Currencies = new Currencies();
$History = new History();

echo $Currencies->Test();
echo $History->Testhistory();
