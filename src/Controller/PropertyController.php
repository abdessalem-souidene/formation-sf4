<?php
 namespace App\controller;

 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Annotation\Route;
 class PropertyController extends AbstractController
 {
     /**
      * @Route("/biens" , name="property.index")
      * @return Response
      */

     public function  index ():Response
     {
        return new Response('les biens');
     }

 }
