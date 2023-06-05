<script src="Converter.js"></script>
<?php

require_once "History.php";
require_once "Currencies.php";

$Currencies = new Currencies();
$History = new History();

$Currencies->getApi();

echo '<table>
    <tr>
        <th>Name</th>
        <th>Currency Code</th>
        <th>Exchange_rate</th>
        <th>Date</th>
    </tr>';

echo $Currencies->GetCurrencies();
echo '</table>';

echo '<select id="currencyIN">';
echo $Currencies->GetSelectorValues();
echo '</select>';

echo '<select id="currencyOUT">';
echo $Currencies->GetSelectorValues();
echo '</select>';

echo '<input type="number" id="number" required></input>';

echo '<button type="button" onclick=calculate()>Calculate</button>';

echo $History->GetHistory();
