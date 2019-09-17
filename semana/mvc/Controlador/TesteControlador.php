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
    	$sql = 'SELECT * FROM usuarios_codigos ORDER BY data_criacao';
        $comando = DW3BancoDeDados::query($sql);
        echo '<pre>';
        $all = $comando->fetchAll();
        $pontos = 100;
        foreach ($all as $registro) {
            $registro['pontos2'] = $pontos;
            var_dump($registro);
            if ($pontos > 80) {
                $pontos--;
            }
        }
    }
}
