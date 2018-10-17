<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ClientesController extends FOSRestController
{
	/**
	 * @Route("/tienda/", name="clientes", methods={"POST"})
     */
    public function indexAction(): Response
    {
        return new JsonResponse([
            'hello' => 'This is a simple example of resource returned by your APIs'
        ]);
    }
}
