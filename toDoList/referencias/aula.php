----------------PHP----------------             
--------TAGS
----[abrindo e fechando PHP]
<?php //uma forma de taggear ?>
<?php 
// ou assim, mas sem o . entre o ? e o > ===> <?=  ?.>
?>

----[Escape avançado usando condições]
<?php if ($expression == true): ?>
Isto irá aparecer se a expressão for verdadeira.
<?php else: ?>
Senão isso que aparecerá.
<?php endif; ?>

----[Introdução às expressões]
<?php
//Null, Bool, Int, Float, String, Array, Object, Callable, Resource
    $a_bool = true; //um valor boleano
    $a_str = "foo"; //ou '
    $a_str = 'foo'; //um texto
    $an_int = "24"; // um inteiro

// Se essa variável conter um inteiro, aumento o número por quatro
    if (is_int($an_int)) {
        $an_int += 4;
    }
    var_dump($an_int);

// Se $a_bool for um texto, imprima
    if (is_string($a_bool)) {
        echo "String: $a_bool";
    }

//Variáveis pré-definidas
//Superglobais: Variáveis nativas que estão sempre disponíveis em todos escopos
    $GLOBALS; // Referencia todas variáveis disponíveis no escopo global
    $_SERVER; // Informação do servidor e ambiente de execução
    $_GET; // Variáveis HTTP GET
    $_POST; // HTTP POST variables
    $_FILES; // Variáveis de Upload de Arquivos HTTP
    $_REQUEST; // Variáveis de requisição HTTP
    $_SESSION; // Variáveis de sessão
    $_ENV; // Variáveis de ambiente
    $_COOKIE; // Cookies HTTP
$php_errormsg; // A mensagem de erro anterior
$http_response_header; // Cabeçalhos de resposta HTTP
$argc; // O número de argumentos passados para o script
$argv; // Array de argumentos passados para o script