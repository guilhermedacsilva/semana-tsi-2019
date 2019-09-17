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
        $all = $comando->fetchAll();
        $pontos = 100;
        foreach ($all as $registro) {
            $registro['pontos2'] = $pontos;
            $usuario_id = $registro['usuario_id'];
            DW3BancoDeDados::exec("UPDATE usuarios_codigos SET pontos = $pontos WHERE usuario_id = $usuario_id");
            //var_dump($registro);
            if ($pontos > 80) {
                $pontos--;
            }
        }

        $sql = 'SELECT * FROM usuarios_codigos ORDER BY data_criacao';
        $comando = DW3BancoDeDados::query($sql);
        echo '<pre>';
        $all = $comando->fetchAll();
        var_dump($all);
    }
}
