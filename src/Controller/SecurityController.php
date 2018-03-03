<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Form\LoginForm;

/**
 * 
 */
class SecurityController extends Controller {

    /**
     * 
     * @param Request $request
     * @param AuthenticationUtils $authUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request, AuthenticationUtils $authUtils) {
        // Get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // Last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        // Display form with prefilled username
        $form = $this->createForm(LoginForm::class, [
            '_username' => $lastUsername,
        ]);

        // Display login page
        return $this->render('security/login.html.twig', array(
                    'form' => $form->createView(),
                    'error' => $error,
        ));
    }

}
