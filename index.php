<?php

    // Get SessionId
    $url = "https://apisandbox.pagamentos.nuvende.com.br/v2/sessions";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);
    $sessionId = json_decode($result, false)->id;

?>

<!DOCTYPE html>
<html lang="pt-Br">
    <head>
        <title>Checkout Transparente</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="https://www.nuvende.com.br/favicon-32x32.png" sizes="32x32">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script type="text/javascript"></script>
    </head>

    <body>
        <div class="text-center">
            <img src="https://www.nuvende.com.br/img/logo.svg" class="img-fluid py-4" alt="Responsive image">
        </div>

        <div class="container">
            <div class="text-center">
                <h2 class="text-center">
                    Checkout Transparente - SANDBOX
                </h2>
                <hr class="mb-2">
            </div>

            <fieldset>
                <legend class="text-center">
                    Gerar SenderHash
                </legend>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="border rounded bg-light">
                        <div class="form-row p-4 m-0">
                            <label class="col-md-12" for="senderHash"><b>Sender Hash</b></label>
                            <input class="form-control col-lg-10 col-md-10 col-sm-10 pl-3" type="text" id="senderHash" name="senderHash" placeholder="senderHash">
                            <div class="col-md-2 px-2">
                                <button class="btn btn-success col-md-12" id="generateSenderHash">Gerar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mb-2">
            </fieldset>

            <fieldset>
                <legend class="text-center">
                    Chamadas para Pagamentos com o Cartão de Crédito
                </legend>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="border rounded bg-light">
                        <div class="p-4 mb-0">

                            <div class="form-row pb-3">
                                <div class="col-md-3">
                                    <label for="creditCardNumber">
                                        <b>Número do cartão:</b>
                                    </label>
                                    <input type="text" class="form-control col-md-12 pl-3" id="creditCardNumber" name="creditCardNumber" placeholder="creditCardNumber" value="5328053732015410">
                                </div>

                                <div class="col-md-3">
                                    <label for="creditCardCvv">
                                        <b>CVV:</b>
                                    </label>
                                    <input type="text" class="form-control col-md-12 pl-3" id="creditCardCvv" placeholder="creditCardCvv" value="148" name="creditCardCvv">
                                </div>

                                <div class="col-md-3">
                                    <label for="creditCardExpMonth">
                                        <b>Validade Mês (mm):</b>
                                    </label>
                                    <input type="text" class="form-control col-md-12 pl-3" id="creditCardExpMonth" name="creditCardExpMonth" placeholder="creditCardHolderBirthDate - Month" value="05" size="2">
                                </div>

                                <div class="col-md-3">
                                    <label for="creditCardExpYear">
                                        <b>Ano (yyyy):</b>
                                    </label>
                                    <input type="text" class="form-control col-md-12 pl-3" id="creditCardExpYear" name="creditCardExpYear" placeholder="creditCardHolderBirthDate - Year" value="2022" size="4">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="creditCardBrand">
                                        <b>Bandeira:</b>
                                    </label>
                                    <input type="text" class="form-control col-md-12 pl-3" id="creditCardBrand" name="creditCardBrand" placeholder="creditCardBrand" disabled>
                                </div>

                                <div class="col-md-6">
                                    <label for="creditCardToken">
                                        <b>Token:</b>
                                    </label>
                                    <div class="form-row pl-1">
                                        <input type="text" class="form-control col-md-10 pl-3" id="creditCardToken" name="creditCardToken" placeholder="creditCardToken" disabled>
                                        <div class="col-md-2 px-2">
                                            <button class="btn btn-success col-md-12" id="generateCreditCardToken">Gerar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </fieldset>
        </div>

    </body>

    <!-- Incluíndo o arquivo JS do Nuvende e o JQuery-->
    <script type="text/javascript" src="/public/js/nuvende-sandbox-payment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Funcionalidade do JS -->
    <script type="text/javascript">

        // Set SessionId
        NuvendeDirectPayment.setSessionId('<?php echo $sessionId; ?>');
        console.log('<?php echo $sessionId; ?>');

        //Get SenderHash
        $("#generateSenderHash").on('click', function () {
            NuvendeDirectPayment.onSenderHashReady(function (response) {
                if (response.status == 'error') {
                    console.log(response.message);
                    return false;
                }
                //Hash estará disponível nesta variável.
                $("#senderHash").val(response.senderHash);
            });
        })

        //Get CreditCard Brand and check if is Internation
        $("#creditCardNumber").on('keyup', function () {
            $("#creditCardBrand").val('');

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
        $("#generateCreditCardToken").on('click', function () {
            let param = {
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
