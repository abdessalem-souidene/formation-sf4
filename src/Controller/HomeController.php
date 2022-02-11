<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\component\httpFoundation\Response;
use Symfony\component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController

{
    /**
     * @Route ("/", name="homme")
     * @return Response
     */


    public function index(PrpertyRepository $repository): Response
    {
        $properties = $repository->findLatest();
        return $this->render(view:'pages/home', [
            'properties' =>$properties
            ]);

    }





}