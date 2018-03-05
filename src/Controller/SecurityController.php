<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Form\Type\LoginFormType;

/**
 * SecurityController
 */
class SecurityController extends Controller {

    /**
     * 
     * @param Request $oRequest
     * @param AuthenticationUtils $oAuthUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $oRequest, AuthenticationUtils $oAuthUtils) {

        // Get the login error if there is one
        $oError = $oAuthUtils->getLastAuthenticationError();

        // Last username entered by the user
        $sLastUsername = $oAuthUtils->getLastUsername();

        // Display form with prefilled username
        $oForm = $this->createForm(LoginFormType::class, [
            '_username' => $sLastUsername,
        ]);

        // Display login page
        return $this->render('security/login.html.twig', array(
                    'form' => $oForm->createView(),
                    'error' => $oError,
        ));
    }

}
