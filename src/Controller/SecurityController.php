<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    /**
     * @Route("/", name="login")
     * @IsGranted("IS_AUTHENTICATED_ANONYMOUSLY")
     */
    public function login(AuthenticationUtils $utils)
    {

        $error = $utils->getLastAuthenticationError();
        $lastUsername = $utils->getLastUsername();





        return $this->render('security/login.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername,
        ]);
    }

}
