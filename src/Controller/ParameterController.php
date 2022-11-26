<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParameterController
{
    #[Route('/parameter', name: 'app_parameter_list')]
    public function number(): Response
    {
        $number = random_int(0, 10);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}
