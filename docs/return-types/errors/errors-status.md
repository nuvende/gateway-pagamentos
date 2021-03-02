# Nuvende - API de Pagamentos

## Tabela de Status de Transação

| STATUS | DESCRIÇÃO |
| ----- | -------- |
| 5003 | Falha de comunicação com a instituição financeira |
| 10000 | Bandeira de cartão de crédito é inválida |
| 10001 | Número do cartão de crédito com comprimento inválido |
| 10002 | Formato da data inválida |
| 10003 | Campo de segurança CVV inválido |
| 10004 | Código de verificação CVV é obrigatório |
| 10006 | Campo de segurança com comprimento inválido |
| 53004 | Quantidade inválida de itens |
| 53005 | É necessário informar a moeda |
| 53006 | Valor inválido para especificação da moeda |
| 53007 | Referência inválida comprimento |
| 53008 | URL de notificação inválida |
| 53009 | URL de notificação com valor inválido |
| 53010 | O e-mail do remetente é obrigatório |
| 53011 | Email do remetente com comprimento inválido |
| 53012 | Email do remetente está com valor inválido |
| 53013 | O nome do remetente é obrigatório |
| 53014 | Nome do remetente está com comprimento inválido |
| 53015 | Nome do remetente está com valor inválido |
| 53017 | Foi detectado algum erro nos dados do seu CPF |
| 53018 | O código de área do remetente é obrigatório |
| 53019 | Há um conflito com o código de área informado, em relação a outros dados seus |
| 53020 | É necessário um telefone do remetente |
| 53021 | Valor inválido do telefone do remetente |
| 53022 | É necessário o código postal do endereço de entrega |
| 53023 | Código postal está com valor inválido |
| 53024 | O endereço de entrega é obrigatório |
| 53025 | Endereço de entrega rua comprimento inválido |
| 53026 | É necessário o número de endereço de entrega |
| 53027 | Número de endereço de remessa está com comprimento inválido |
| 53028 | No endereço de entrega há um comprimento inválido |
| 53029 | O endereço de entrega é obrigatório |
| 53030 | Endereço de entrega está com o distrito em comprimento inválido |
| 53031 | É obrigatório descrever a cidade no endereço de entrega |
| 53032 | O endereço de envio está com um comprimento inválido da cidade |
| 53033 | É necessário descrever o Estado, no endereço de remessa |
| 53034 | Endereço de envio está com valor inválido |
| 53035 | O endereço do remetente é obrigatório |
| 53036 | O endereço de envio está com o país em um comprimento inválido |
| 53037 | O token do cartão de crédito é necessário |
| 53038 | A quantidade da parcela é necessária |
| 53039 | Quantidade inválida no valor da parcela |
| 53040 | O valor da parcela é obrigatório |
| 53041 | Conteúdo inválido no valor da parcela |
| 53042 | O nome do titular do cartão de crédito é obrigatório |
| 53043 | Nome do titular do cartão de crédito está com o comprimento inválido |
| 53044 | O nome informado no formulário do cartão de Crédito precisa ser escrito exatamente da mesma forma que consta no seu cartão obedecendo inclusive, abreviaturas e grafia errada |
| 53045 | O CPF do titular do cartão de crédito é obrigatório |
| 53046 | O CPF do titular do cartão de crédito está com valor inválido |
| 53047 | A data de nascimento do titular do cartão de crédito é necessária |
| 53048 | TA data de nascimento do itular do cartão de crédito está com valor inválido |
| 53049 | O código de área do titular do cartão de crédito é obrigatório |
| 53050 | Código de área de suporte do cartão de crédito está com valor inválido |
| 53051 | O telefone do titular do cartão de crédito é obrigatório |
| 53052 | O número de Telefone do titular do cartão de crédito está com valor inválido |
| 53053 | É necessário o código postal do endereço de cobrança |
| 53054 | O código postal do endereço de cobrança está com valor inválido |
| 53055 | O endereço de cobrança é obrigatório |
| 53056 | A rua, no endereço de cobrança está com comprimento inválido |
| 53057 | É necessário o número no endereço de cobrança |
| 53058 | Número de endereço de cobrança está com comprimento inválido |
| 53059 | Endereço de cobrança complementar está com comprimento inválido |
| 53060 | O endereço de cobrança é obrigatório |
| 53061 | O endereço de cobrança está com tamanho inválido |
| 53062 | É necessário informar a cidade no endereço de cobrança |
| 53063 | O item Cidade, está com o comprimento inválido no endereço de cobrança |
| 53064 | O estado, no endereço de cobrança é obrigatório |
| 53065 | No endereço de cobrança, o estado está com algum valor inválido |
| 53066 | O endereço de cobrança do país é obrigatório |
| 53067 | No endereço de cobrança, o país está com um comprimento inválido |
| 53068 | O email do destinatário está com tamanho inválido |
| 53069 | Valor inválido do e-mail do destinatário |
| 53070 | A identificação do item é necessária |
| 53071 | O ID do item está inválido |
| 53072 | A descrição do item é necessária |
| 53073 | Descrição do item está com um comprimento inválido |
| 53074 | É necessária quantidade do item |
| 53075 | Quantidade do item está irregular |
| 53076 | Há um valor inválido na quantidade do item |
| 53077 | O valor do item é necessário |
| 53078 | O Padrão do valor do item está inválido |
| 53079 | Valor do item está irregular |
| 53081 | O remetente está relacionado ao receptor! Esse é um erro comum que só o lojista pode cometer ao testar como compras |
| 53084 | Receptor inválido! |
| 53085 | Método de pagamento indisponível |
| 53086 | A quantidade total do carrinho está inválida |
| 53087 | Dados inválidos do cartão de crédito |
| 53091 | O Hash do remetente está inválido |
| 53092 | A Bandeira do cartão de crédito não é aceita |
| 53095 | Tipo de transporte está com padrão inválido |
| 53096 | Padrão inválido no custo de transporte |
| 53097 | Custo de envio irregular |
| 53098 | O valor total do carrinho não pode ser negativo |
| 53099 | Montante extra inválido |
| 53101 | Valor inválido do modo de pagamento |
| 53102 | Valor inválido do método de pagamento |
| 53104 | O custo de envio foi fornecido, então o endereço de envio deve estar completo |
| 53105 | As informações do remetente foram fornecidas, portanto o e-mail também deve ser informado |
| 53106 | O titular do cartão de crédito está incompleto |
| 53109 | As informações do endereço de remessa foram fornecidas, portanto o e-mail do remetente também deve ser informado |
| 53110 | Banco EFT é obrigatório |
| 53111 | Banco EFT não é aceito |
| 53115 | Valor inválido da data de nascimento do remetente |
| 53117 | Valor inválido do cnpj do remetente |
| 53122 | O domínio do email do comprador está inválido |
| 53140 | Quantidade de parcelas fora do limite. O valor deve ser maior que zero |
| 53141 | Este remetente está bloqueado |
| 53142 | O cartão de crédito está com o token inválido |