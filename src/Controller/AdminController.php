<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * 
 */
class AdminController extends Controller {

    /**
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contact(Request $request) {

        // Display contact page
        return $this->render('admin/contact.html.twig', array(
        ));
    }

}
