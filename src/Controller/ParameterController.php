<?php

namespace App\Controller;

use App\Service\ParameterFilterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ParameterController extends AbstractController
{
    #[Route('/parameter', name: 'app_parameter_list')]
    public function list(Request $request, ParameterFilterService $filterService): JsonResponse
    {
        return new JsonResponse(
            $filterService->filter($request->query->all())
        );
    }
}
