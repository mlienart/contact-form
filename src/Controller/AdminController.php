<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * AdminController
 */
class AdminController extends Controller {

    /**
     * 
     * @param Request $oRequest
     * @param int $iPage
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function contactsList(Request $oRequest, int $iPage = 1) {

        if ($iPage < 1) {
            throw new NotFoundHttpException('Page "' . $iPage . '" inexistante.');
        }
        $iNbPerPage = $this->getParameter('nb_contacts');
        $aContacts = $this->getDoctrine()
                ->getManager()
                ->getRepository(\App\Entity\Contact::class)
                ->getAllContactsPaginator($iPage, $iNbPerPage);

        $iNbPages = ceil(count($aContacts) / $iNbPerPage);

        return $this->render('admin/contacts-list.html.twig', array(
                    'contacts' => $aContacts,
                    'nbPages' => $iNbPages,
                    'page' => $iPage
        ));

        // Display contact page
        return $this->render('admin/contacts-list.html.twig', array(
        ));
    }

}
