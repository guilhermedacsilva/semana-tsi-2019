<?php
namespace Teste\Unitario;

use \Teste\Teste;
use \Modelo\RelatorioVenda;
use \Framework\DW3BancoDeDados;

class TesteRelatorioVenda extends Teste
{
    public function testeBuscarRegistros()
    {
        $registros = RelatorioVenda::buscarRegistros();
        $this->verificar(count($registros) == 23);
    }
    
    public function testeBuscarRegistrosQnt5()
    {
    	$filtro = [
    		'quantidadeMin' => 5
    	];
        $registros = RelatorioVenda::buscarRegistros($filtro);
        $this->verificar(count($registros) == 2);
    }
}
