<?php

require_once "Currencies.php";

$database = new Currencies();

echo $database->getApi();
