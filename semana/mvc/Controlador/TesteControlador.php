<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Usuario;
use \Modelo\Codigo;
use \PDO;
use \Framework\DW3BancoDeDados;

class TesteControlador extends Controlador
{
    public function index()
    {
    	$sql = 'SELECT * FROM usuarios_codigos ORDER BY data_criacao DESC';
        $comando = DW3BancoDeDados::query($sql);
        var_dump($comando);
    }
}
