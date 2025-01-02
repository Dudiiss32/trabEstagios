<?php

namespace Middleware;

class AuthMiddleware implements MiddlewareInterface
{
    public function handle($next)
    {
        if (!isset($_SESSION['usuario'])) {
            http_response_code(401);
            echo 'Você precisa estar logado para acessar esta página!';
            exit;
        }

        $next();
    }
}
