Que o PDO � uma abstra��o para acesso a diversos bancos de dados
Que, para acessar cada um dos bancos, um driver espec�fico � necess�rio
Que os drivers s�o habilitados atrav�s da instala��o de extens�es no PHP
Que SQLite � um gerenciador de banco de dados que n�o precisa de um servidor
A criar a nossa primeira conex�o com um banco de dados.
https://www.php.net/manual/en/ref.pdo-sqlite.connection.php

Ao tentar buscar dados do banco de dados, voc� pode informar como quer que os m�todos do PDO formatem esses dados pra voc�. Os principais fetch modes ou fetch styles s�o:

PDO::FETCH_ASSOC: Retorna cada linha como um array associativo, onde a chave � o nome da coluna, e o valor � o valor da coluna em si
PDO::FETCH_BOTH (esse � o padr�o): Retorna cada linha como um array com as chaves sendo tanto o �ndice da coluna (come�ando do 0) quanto o nome da coluna, ou seja, os valores acabam ficando duplicados nesse formato
PDO::FETCH_CLASS: Cada linha do resultado � retornado como uma inst�ncia da classe especificada em outro par�metro. A classe n�o pode ter par�metros no construtor e cada coluna ter� o seu valor atribu�do a uma propriedade de mesmo nome no objeto criado
PDO::FETCH_INTO: Funciona de forma muito semelhante ao FETCH_CLASS, mas ao inv�s de criar o objeto para voc�, ele preenche um objeto j� criado com os valores buscados
PDO::FETCH_NUM: Retorna cada linha como um array, onde a chave � o �ndice num�rico da coluna, come�ando do 0, e o valor � o valor da coluna em si
Para ver os demais modos de busca e ler com mais detalhes os explicados aqui, voc� pode conferir a documenta��o oficial do PHP: https://www.php.net/manual/en/pdostatement.fetch#refsect1-pdostatement.fetch-parameters.


Nesta aula, aprendemos:

A executar queries sem precisar conferir os seus resultados, como queries de INSERT, utilizando o m�todo exec
Que o m�todo exec retorna apenas o n�mero de linhas afetadas, e n�o o resultado de uma query em si
A buscar dados no banco, utilizando o m�todo query
Os diversos m�todos para recuperar dados utilizando o PDO:
fetch
fetchObject
fetchColumn
fetchAll
Os diferentes Fetch Modes do PHP, ou seja, as diferentes formas de trazer dados do banco para o PHP

O que � SQL Injection e como realizar esse ataque em nossa aplica��o
Que adicionar par�metros na string SQL � perigoso
A resolver esse problema, utilizando Prepared Statements
Que prepared statements podem inclusive ajudar na performance da aplica��o
As diferen�as entre bindValue e bindParam para vincular par�metros aos prepared statements
Que podemos informar o tipo de dado que estamos passando atrav�s do PDO, utilizando o terceiro par�metro de bindValue e bindParam
Trabalhar com numeros decimais https://floating-point-gui.de/languages/php/

Nesta aula, aprendemos:

As boas pr�ticas e padr�es de projeto com orienta��o a objetos
O padr�o Entity e vimos que ele j� est� sendo aplicado em nosso projeto
O padr�o Creation Method, que cria uma conex�o, de forma que n�o precisemos repetir esse c�digo pela aplica��o
O padr�o Repository, que permite extrair a l�gica de persist�ncia para uma classe espec�fica
A abstrair a implementa��o de um repository, atrav�s de uma interface, para podermos trocar a implementa��o no futuro, caso seja necess�rio
O conceito de inje��o de depend�ncias e suas diversas vantagens no desenvolvimento

Nesta aula, aprendemos:

Que o PDO nos fornece uma API muito simples para gerenciar transa��es
Como iniciar e finalizar uma transa��o, com beginTransaction e commit
Que � poss�vel "cancelar" uma transa��o, com o m�todo rollBack

Nesta aula, aprendemos:

A import�ncia de tratar erros em nossa aplica��o
Que, por padr�o, o PDO n�o emite nenhum tipo de erro
A recuperar as informa��es de erro atrav�s do m�todo errorInfo
Como informar ao PDO para lan�ar exce��es em casos de erro
Outros atributos para configurar a conex�o com o banco utilizando PDO
https://wiki.php.net/rfc/pdo_default_errmode

Nesta aula, aprendemos:

A relacionar dados do banco de dados em nossa aplica��o orientada a objetos
O padr�o Aggregate, onde o acesso a objetos � controlado por outros objetos (acesso a Telefone controlado por Aluno)
O problema N + 1, que � um grande inimigo da performance
Como resolver o problema de N + 1 queries
Que h� diferen�as entre o mundo relacional (banco de dados) e o mundo orientado a objetos (aplica��o)
Que ORMs podem nos ajudar no mapeamento entre esses dois mundos
Como � f�cil migrar de sistema de banco de dados, utilizando PDO