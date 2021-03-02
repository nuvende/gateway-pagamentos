# Nuvende - API de Pagamentos

## Tabela de Status de Transação

| STATUS | VALOR | DESCRIÇÃO|
| ----- | ----- | -------- |
| 1 | Aguardando pagamento | O comprador iniciou a transação, mas até o momento o Nuvende não recebeu nenhuma informação sobre o pagamento. |
| 2 | Em análise | O comprador optou por pagar com um cartão de crédito e o Nuvende está analisando o risco da transação. |
| 3 | Paga | A transação foi paga pelo comprador e o Nuvende já recebeu uma confirmação da instituição financeira responsável pelo processamento. |
| 4 | Disponível | A transação foi paga e chegou ao final de seu prazo de liberação sem ter sido retornada e sem que haja nenhuma disputa aberta. | 
| 5 | Em disputa | O comprador, dentro do prazo de liberação da transação, abriu uma disputa. |
| 6 | Devolvida | O valor da transação foi devolvido para o comprador. |
| 7 | Cancelada | A transação foi cancelada sem ter sido finalizada. |