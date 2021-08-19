<?php
use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require 'vendor/autoload.php';

// Organizando para o teste (Arrange - Given)
$leilao = new Leilao('Fiat 2020 0 KM');
$maria = new Usuario('Maria');
$joao = new Usuario('João');
$leilao->recebeLance(new Lance($maria, 2000));
$leilao->recebeLance(new Lance($joao, 2500));

// Executa o código a ser testado (Act - When)
$leiloeiro = new Avaliador();
$leiloeiro->avalia($leilao);
$maiorValor = $leiloeiro->getMaiorValor();

// Realiza o teste (Assert - Then)
if ($maiorValor == 2500) {
    echo 'TESTE OK';
} else {
    echo 'FALHA NO TESTE';
}