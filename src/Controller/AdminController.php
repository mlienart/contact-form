<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * AdminController
 */
class AdminController extends Controller {

    /**
     * 
     * @param Request $oRequest
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contact(Request $oRequest) {

        // Display contact page
        return $this->render('admin/contact.html.twig', array(
        ));
    }

}
