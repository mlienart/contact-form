<?php

namespace App\Controller;

use App\Entity\Contact;
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
    public function questions(Request $oRequest, int $iPage = 1) {

        if ($iPage < 1) {
            throw new NotFoundHttpException('Page "' . $iPage . '" inexistante.');
        }
        $iNbPerPage = $this->getParameter('nb_contacts');
        $aContacts = $this->getDoctrine()
                ->getManager()
                ->getRepository(\App\Entity\Contact::class)
                ->getAllContactsPaginator($iPage, $iNbPerPage);

        $iNbPages = ceil(count($aContacts) / $iNbPerPage);

        return $this->render('admin/questions.html.twig', array(
                    'contacts' => $aContacts,
                    'nbPages' => $iNbPages,
                    'page' => $iPage
        ));

        // Display questions list page
        return $this->render('admin/questions.html.twig', array());
    }

    /**
     * 
     * @param Request $oRequest
     * @throws NotFoundHttpException
     */
    public function treatQuestion(Request $oRequest) {


        $iContactId = (int) $oRequest->get('id');

        // Retrieve contact by id $id
        $oContact = $this->getDoctrine()->getManager()->getRepository(Contact::class)->find($iContactId);

        $aMessages = array();
        $bSuccess = true;
        $sUpdatedAt = '';

        if (null === $oContact) {
            $aMessages[] = "Le contact d'id " . $iContactId . " n'existe pas.";
            $bSuccess = false;
        } else {
            $isDone = $oRequest->get('done') === 'true' ? true : false;
            $oContact->setDone($isDone);

            // Update done field in contact entity 
            $oEntityManager = $this->getDoctrine()->getManager();
            $oEntityManager->persist($oContact);
            $oEntityManager->flush();
            $aMessages[] = 'Le contact ' . $oContact->getUsername() . ' - ' . $oContact->getEmail() . ' a été mis à jour.';
            $sUpdatedAt = $oContact->getUpdatedAt()->format('d/m/Y');
        }
        return $this->json(array('messages' => $aMessages, 'success' => $bSuccess, 'updatedAt' => $sUpdatedAt));
    }

}
