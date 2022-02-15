<?php
namespace App\Controller;

use App\Controller\Admin\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @method render(string $string, array $array)
 */
class SecurityController extends AbstractController{

    /**
     * @Route ("/login", name="login")
     */
    public function login (AuthenticationUtils $authenticationUtils0){
        $error = $authenticationUtils0->getLastAuthenticationError();
        $lastUsername = $authenticationUtils0->getLastUsername();
        return $this->render('security/login.html.twig',[
            'last_username'=> $lastUsername,
            'error'=>$error
            ]);
    }
}