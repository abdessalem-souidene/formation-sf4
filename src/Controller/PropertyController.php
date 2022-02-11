<?php

namespace App\Controller;

use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\DocBlock\Tags\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * @var PropertyRepository
     */
    public function _construct(PropertyRepository $repository, ObjectManager $em)
    {
        $this->repository =$repository;
        $this->em = $em;
    }
    /**
     * @Route("/biens" , name="property.index")
     * @return Response
     */

    public function index(): Response
    {

        $property = $this->repository->findAllVisible();
        return $this->render('property\index.html.twig.html.twig', [
            'current_menu' => 'properties'
        ]);
    }

    /**
     * @Route ("/biens/{slug}-{id}",name="property.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Property $property
     * @return Response
     */

    public function show(Property $property, string $slug ): Response
    {
        if ($property->getSlug() !==$slug){
           return $this->redirectToRoute(route: 'property.show', [
                'id'=> $property->getId(),
                'slug'=>$property->getSlug()
                ], 301);


        }
        $property = $this->repository->find($id);
        return $this->render( 'property/show.html.twig',[
            'property' =>$property,
            'current_menu'=>'properties'
        ]);
    }

}
