<?php

$url = "https://apisandbox.pagamentos.nuvende.com.br/v2/sessions";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$resultado = curl_exec($curl);
curl_close($curl);
$session = json_decode($resultado)->id;
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
    <title>Checkout Transparente</title>
    <script type="text/javascript"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="text-center">
    <img src="https://www.nuvende.com.br/img/logo.svg" class="img-fluid" alt="Responsive image">
    <h1 class="text-center">CHECKOUT TRANSPARENTE DEMO - [SANDBOX]</h1>
    <hr>
</div>
<fieldset>
    <div class="row mx-md-n5">
        <div class="col px-md-5">
            <div class="p-3 border bg-light">
                <legend class="text-center">GERAR SENDERHASH</legend>
                <div>
                    <input class="form-control creditcard" type="text" id="senderHash" name="senderHash">
                    <button class="btn btn-info" id="generateSenderHash">Gerar</button>
                </div>
            </div>
        </div>
</fieldset>
<br>

<fieldset>
    <legend class="text-center">CHAMADAS PARA CARTÃO DE CRÉDITO</legend>


    <div class="row mx-md-n5">
        <div class="col px-md-5">
            <div class="p-3 border bg-light">
                <div class="row">
                    <div class="col-sm-4">
                        <div>
                            <label for="creditCardNumber"<b>Número do cartão:</b></label>
                            <input type="text" class="form-control" id="creditCardNumber" class="creditcard" name="creditCardNumber" value="4111111111111111">
                        </div>
                        <div>
                            <label for="creditCardBrand"<b>Bandeira:</b></label>
                            <input type="text" class="form-control" id="creditCardBrand" class="creditcard" name="creditCardBrand" disabled>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="creditCardExpMonth"<b>Validade Mês (mm):</b></label>
                        <input type="text" class="form-control" id="creditCardExpMonth" class="creditcard" name="creditCardExpMonth" value="01" size="2">
                        &nbsp;


                        <label for="creditCardExpYear"<b>Ano (yyyy):</b></label>
                        <input type="text" class="form-control" id="creditCardExpYear" class="creditcard" name="creditCardExpYear" value="2030" size="4">
                    </div>

                    <div class="col-sm-4">
                        <label for="creditCardCvv"<b>CVV:</b></label>
                        <input type="text" class="form-control" id="creditCardCvv" class="creditcard" value="123" name="creditCardCvv">

                        <label <b>Token:</b></label>
                        <input type="text" id="creditCardToken" class="form-control" name="creditCardToken" disabled>
                        <button class="btn btn-info" id="generateCreditCardToken">Gerar Token</button>


                    </div>
                </div>
            </div>
        </div>

</fieldset>
<br>

</body>
<!-- Incluíndo o arquivo JS do Nuvende e o JQuery-->
<script type="text/javascript" src="https://dgus6a8rjwnt8.cloudfront.net/nuvende-sandbox-payment.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Funcionalidade do JS -->
<script type="text/javascript">

    //Session ID
    NuvendeDirectPayment.setSessionId('<?php echo $session; ?>');
    console.log('<?php echo $session; ?>');

    //Get SenderHash
    $("#generateSenderHash").click(function () {
        NuvendeDirectPayment.onSenderHashReady(function (response) {
            if (response.status == 'error') {
                console.log(response.message);
                return false;
            }
            //Hash estará disponível nesta variável.
            $("#senderHash").val(response.senderHash);
        });
    })

    //Get CreditCard Brand and check if is Internationl
    $("#creditCardNumber").keyup(function () {
        if ($("#creditCardNumber").val().length >= 6) {
            NuvendeDirectPayment.getBrand({
                cardBin: $("#creditCardNumber").val().substring(0, 6),
                success: function (response) {
                    console.log(response);
                    $("#creditCardBrand").val(response['brand']['name']);
                    $("#creditCardCvv").attr('size', response['brand']['cvvSize']);
                },
                error: function (response) {
                    console.log(response);
                }
            })
        }
    })

    function printError(error) {
        $.each(error['errors'], (function (key, value) {
            console.log("Foi retornado o código " + key + " com a mensagem: " + value);
        }));
    }

    //Generates the creditCardToken
    $("#generateCreditCardToken").click(function () {
        var param = {
            cardNumber: $("#creditCardNumber").val(),
            cvv: $("#creditCardCvv").val(),
            expirationMonth: $("#creditCardExpMonth").val(),
            expirationYear: $("#creditCardExpYear").val(),
            success: function (response) {
                console.log(response);
                $("#creditCardToken").val(response['card']['token']);
            },
            error: function (response) {
                console.log(response);
                printError(response);
            }
        }

        //parâmetro opcional para qualquer chamada
        if ($("#creditCardBrand").val() != '') {
            param.brand = $("#creditCardBrand").val();
        }

        NuvendeDirectPayment.createCardToken(param);
    })

</script>
</html>
