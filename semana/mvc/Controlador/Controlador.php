<?php
namespace Controlador;

use \Framework\DW3Controlador;
use \Framework\DW3Sessao;
use \Modelo\Usuario;

abstract class Controlador extends DW3Controlador
{
    use ControladorVisao;
    
    protected $usuario;

	protected function verificarLogado()
    {
    	$usuario = $this->getUsuario();
        if ($usuario == null) {
        	$this->redirecionar(URL_RAIZ . 'login');
        }
    }

    protected function getUsuario()
    {
        if ($this->usuario == null) {
        	$id = DW3Sessao::get('usuario');
            if ($id != null) {
                $this->usuario = Usuario::buscarPorId($id);
            }
        }
        return $this->usuario;
    }
}
