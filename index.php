<style>
    table {
        float: left;
    }
    .history {
        float: left;
        margin-left: 10%;
    }
    .input {
        clear: both;
        display: flex;
        justify-content: center;
    }
</style>

<script src="Converter.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
echo $Currencies->GetCurrencies() .'</table>';

echo '<div class="history">';
echo $History->GetHistory().'</div>';

echo '<div class="input">IN<select id="currencyIN">';
echo $Currencies->GetSelectorValues();
echo '</select><input type="number" id="number" required></input>';

echo 'OUT<select id="currencyOUT">';
echo $Currencies->GetSelectorValues();
echo '</select>';

echo '<button type="button" onclick=calculate()>Calculate</button></div>';