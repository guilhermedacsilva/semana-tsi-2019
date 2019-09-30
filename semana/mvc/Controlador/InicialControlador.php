<?php
namespace Controlador;

use \Modelo\Usuario;

class InicialControlador extends Controlador
{
    public function index()
    {
    	$ranking = Usuario::ranking();
    	//$melhores = array_column(array_slice($ranking, 0, 5), 'nome');
    	//sort($melhores);
    	//$demais = array_slice($ranking, 5);
        $this->visao('inicial/index.php', [
        	//'melhores' => $melhores,
        	//'demais' => $demais,
            'ranking' => $ranking
        ]);
    }
}
