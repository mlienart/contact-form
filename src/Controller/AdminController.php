<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller {

    public function contact(Request $request) {

        // Check if the user is logged in
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        if ($this->getUser()) {
            return $this->render('admin/contact.html.twig', array(
            ));
        }
        // Redirect on login page if user is unlogged
        return null;
    }

}
