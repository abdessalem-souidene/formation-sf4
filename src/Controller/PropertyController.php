<?php

namespace App\Controller;

use App\Controller\Admin\AbstractController;
use App\Controller\Admin\Request;
use Doctrine\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use phpDocumentor\Reflection\DocBlock\Tags\Property;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @method render(string $string, string[] $array)
 * @method redirectToRoute(string $string, array $array, int $int)
 * @property ObjectManager $em
 * @property PropertyRepository $repository
 */
class PropertyController extends AbstractController
{
    /**
     *
     * @param PropertyRepository $repository
     * @param ObjectManager $em
     */
    public function _construct(PropertyRepository $repository, ObjectManager $em)
    {
        $this->repository =$repository;
        $this->em = $em;
    }

    /**
     * @Route("/biens" , name="property.index")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */

    public function index(PaginatorInterface $paginator, Request $request):Response
    {
        //Créer une entité qui va repésenter notre recherche
        //Crée un formualire
        //Gréer le traitement dans le controller

        $properties = $paginator->paginate(
            $this->repository->findAllVisibleQuery($serachData));
            $request->query->getIn(key:'page', default: 1);
        return $this->render('property\index.html.twig.html.twig', [
            'current_menu' => 'properties',
            'properties' =>$properties

        ]);
    }

    /**
     * @param Property $property
     * @param string $slug
     * @param $id
     * @return Response
     * @Route ("/biens/{slug}-{id}",name="property.show", requirements={"slug": "[a-z0-9\-]*"})
     */

    public function show(Property $property, string $slug, $id): Response
    {
        if ($property->getSlug() !==$slug){
           return $this->redirectToRoute( 'property.show', [
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
