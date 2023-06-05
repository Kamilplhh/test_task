function calculate(){
    let currencyIN = document.getElementById('currencyIN');
    let currencyOUT = document.getElementById('currencyOUT');
    let number = document.getElementById('number');

    let inText = currencyIN.options[currencyIN.selectedIndex].text;
    let outText = currencyOUT.options[currencyOUT.selectedIndex].text;

    currencyIN = currencyIN.value;
    currencyOUT = currencyOUT.value;
    number = number.value;

    var handle = document.getElementById('response');

    if(number < 1){
        alert('Insert a number');
    }
    else {
        let result = ((number * currencyIN) / currencyOUT).toFixed(2);
        alert('Result is: '+ result);

        inText = inText + ' (' + currencyIN + ')';
        outText = outText + ' (' + currencyOUT + ')';

        $.ajax({
            type: 'POST',
            url: 'History.php?Converter',
            data: {
                currency_in: inText,
                currency_out: outText,
                value_in: number,
                value_out: result
            },
            success: function (data) {
                handle.innerHTML = 'Response:\n' + data;
            },
            error: function (jqXHR) {
                handle.innerText = 'Error: ' + jqXHR.status;
            }
        });
    }
}
    

