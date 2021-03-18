Que o PDO é uma abstração para acesso a diversos bancos de dados
Que, para acessar cada um dos bancos, um driver específico é necessário
Que os drivers são habilitados através da instalação de extensões no PHP
Que SQLite é um gerenciador de banco de dados que não precisa de um servidor
A criar a nossa primeira conexão com um banco de dados.
https://www.php.net/manual/en/ref.pdo-sqlite.connection.php

Ao tentar buscar dados do banco de dados, você pode informar como quer que os métodos do PDO formatem esses dados pra você. Os principais fetch modes ou fetch styles são:

PDO::FETCH_ASSOC: Retorna cada linha como um array associativo, onde a chave é o nome da coluna, e o valor é o valor da coluna em si
PDO::FETCH_BOTH (esse é o padrão): Retorna cada linha como um array com as chaves sendo tanto o índice da coluna (começando do 0) quanto o nome da coluna, ou seja, os valores acabam ficando duplicados nesse formato
PDO::FETCH_CLASS: Cada linha do resultado é retornado como uma instância da classe especificada em outro parâmetro. A classe não pode ter parâmetros no construtor e cada coluna terá o seu valor atribuído a uma propriedade de mesmo nome no objeto criado
PDO::FETCH_INTO: Funciona de forma muito semelhante ao FETCH_CLASS, mas ao invés de criar o objeto para você, ele preenche um objeto já criado com os valores buscados
PDO::FETCH_NUM: Retorna cada linha como um array, onde a chave é o índice numérico da coluna, começando do 0, e o valor é o valor da coluna em si
Para ver os demais modos de busca e ler com mais detalhes os explicados aqui, você pode conferir a documentação oficial do PHP: https://www.php.net/manual/en/pdostatement.fetch#refsect1-pdostatement.fetch-parameters.


Nesta aula, aprendemos:

A executar queries sem precisar conferir os seus resultados, como queries de INSERT, utilizando o método exec
Que o método exec retorna apenas o número de linhas afetadas, e não o resultado de uma query em si
A buscar dados no banco, utilizando o método query
Os diversos métodos para recuperar dados utilizando o PDO:
fetch
fetchObject
fetchColumn
fetchAll
Os diferentes Fetch Modes do PHP, ou seja, as diferentes formas de trazer dados do banco para o PHP

O que é SQL Injection e como realizar esse ataque em nossa aplicação
Que adicionar parâmetros na string SQL é perigoso
A resolver esse problema, utilizando Prepared Statements
Que prepared statements podem inclusive ajudar na performance da aplicação
As diferenças entre bindValue e bindParam para vincular parâmetros aos prepared statements
Que podemos informar o tipo de dado que estamos passando através do PDO, utilizando o terceiro parâmetro de bindValue e bindParam
Trabalhar com numeros decimais https://floating-point-gui.de/languages/php/

Nesta aula, aprendemos:

As boas práticas e padrões de projeto com orientação a objetos
O padrão Entity e vimos que ele já está sendo aplicado em nosso projeto
O padrão Creation Method, que cria uma conexão, de forma que não precisemos repetir esse código pela aplicação
O padrão Repository, que permite extrair a lógica de persistência para uma classe específica
A abstrair a implementação de um repository, através de uma interface, para podermos trocar a implementação no futuro, caso seja necessário
O conceito de injeção de dependências e suas diversas vantagens no desenvolvimento

Nesta aula, aprendemos:

Que o PDO nos fornece uma API muito simples para gerenciar transações
Como iniciar e finalizar uma transação, com beginTransaction e commit
Que é possível "cancelar" uma transação, com o método rollBack

Nesta aula, aprendemos:

A importância de tratar erros em nossa aplicação
Que, por padrão, o PDO não emite nenhum tipo de erro
A recuperar as informações de erro através do método errorInfo
Como informar ao PDO para lançar exceções em casos de erro
Outros atributos para configurar a conexão com o banco utilizando PDO
https://wiki.php.net/rfc/pdo_default_errmode

Nesta aula, aprendemos:

A relacionar dados do banco de dados em nossa aplicação orientada a objetos
O padrão Aggregate, onde o acesso a objetos é controlado por outros objetos (acesso a Telefone controlado por Aluno)
O problema N + 1, que é um grande inimigo da performance
Como resolver o problema de N + 1 queries
Que há diferenças entre o mundo relacional (banco de dados) e o mundo orientado a objetos (aplicação)
Que ORMs podem nos ajudar no mapeamento entre esses dois mundos
Como é fácil migrar de sistema de banco de dados, utilizando PDO