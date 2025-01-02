<?php

namespace Middleware;

class NivelMiddleware implements MiddlewareInterface
{
    private $requiredNivel;

    public function __construct($requiredNivel)
    {
        $this->requiredNivel = $requiredNivel;
    }

    public function handle($next)
    {
        if (!isset($_SESSION['usuario']) || !is_object($_SESSION['usuario']) || !method_exists($_SESSION['usuario'], 'getNivel')) {
            http_response_code(403);
            echo 'Você não tem permissão para acessar esta página!';
            exit;
        }

        if ($_SESSION['usuario']->getNivel() > $this->requiredNivel) {
            http_response_code(403);
            echo 'Você não tem permissão para acessar esta página!';
            exit;
        }
        
        $next();
    }
}
