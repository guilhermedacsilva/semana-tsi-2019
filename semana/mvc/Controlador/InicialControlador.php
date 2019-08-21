<?php
namespace Controlador;

class InicialControlador extends Controlador
{
    public function index()
    {
        $this->visao('inicial/index.php');
    }
}
