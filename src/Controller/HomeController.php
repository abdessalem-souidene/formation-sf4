<?php

namespace App\Controller;

use App\Controller\Admin\AbstractController;
use Symfony\component\httpFoundation\Response;
use Symfony\component\Routing\Annotation\Route;


class HomeController extends AbstractController

{
    /**
     * @Route ("/", name="homme")
     * @return Response
     */
    public function index(PropertyRepository $repository): Response
    {
        dd("iii");
//        $properties = $repository->findLatest();
//        return $this->render('pages/home',
//           ['properties' =>$properties]);

    }



}