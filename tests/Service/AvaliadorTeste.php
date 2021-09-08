<?php

namespace Alura\Leilao\Tests\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;
use PHPUNIT\Framework\TestCase;

class AvaliadorTest extends TestCase
{
    public function testUm()
    {
        $leilao = new Leilao('Fiat 2020 0 KM');
        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $leilao->recebeLance(new Lance($maria, 2000));
        $leilao->recebeLance(new Lance($joao, 2500));

        // Act - When
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);
        $maiorValor = $leiloeiro->getMaiorValor();

        // Assert - Then
        $valorEsperado = 2500;
        $this->assetEquals(2500, $maiorValor);
    }
}