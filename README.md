# Sistema bancário em Laravel

Desenvolver um sistema bancário, cadastrando usuário e gerando aleatoriamente um número de conta, username e nome. Neste cadastro, deve se ter um depósito inicial na conta, nome do cliente, senha. O usuário deverá entrar no sistema via login e senha. O Sistema DEVERÁ ARMAZENAR A DATA DE LOGIN E LOGOUT DE CADA USUÁRIO EM UMA TABELA para Auditoria. Seu login é seu username e a senha. Ao entrar no sistema, o usuário tem alguns menus como EXTRATO,  PAGAMENTOS E TRANSFERÊNCIAS.

No EXTRATO tem todo o detalhamento de compras via débito, transferências, boletos, e crédito (salário, ou transferência realizada). Deve ter um campo data para armazenar a data em que foram realizadas as transações. Cada transação deve ter uma descrição pequena (ex:  resgate poup. pag. boleto, pag pix. etc).

* Cada cliente tem um limite de R$ 1000,00

Se o usuário utilizar o limite, para cada uso, fazer o calculo do valor usado e acrescentar um valor de 1% de taxa. 

Deve-se avisar por usar o limite. 

Se o valor que o usuário for utilizar for maior que o limite, considerando taxas, não haverá saldo para quaisquer transações. de débito

!!!!!!Analisar toda e qualquer inconsistência (ex: comprar sem saldo, etc).!!!!!!!

No Menu de PAGAMENTOS , deve ter opções para escolher pagamento via pix, boletos, debito. (no nosso sistema não tem diferença entre eles, apenas irá aparecer no extrato se foi pago com boleto, pix, etc).
Cada vez que ocorre pagamento, o valor do saldo é diminuído com o valor a ser pago. Pix, o usuario deve cadastrar uma chave. Armazenar essa chave em algum lugar... para pensar. O pagamento de um valor somente será feita se houver uma chave cadastrada. Pode ser CPF, Celular ou e-mail. Valide a chave. E traga o nome do usuario da chave destino. 


Por último, o menu TRANSFERÊNCIA, o usuário irá transferir uma quantia para uma conta destino. ( deve-se saber o numero desta conta).
O valor deve ser diminuído do saldo atual e somada ao saldo da conta destino.

Cada Cliente tem login e senha.
