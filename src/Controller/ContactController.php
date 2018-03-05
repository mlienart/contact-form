<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\Type\ContactFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;

class ContactController extends Controller {

    /**
     * @Route("/contact")
     */
    public function getForm(Request $oRequest) {

        $oContact = new Contact();

        // Create contact form
        $oContactForm = $this->createForm(ContactFormType::class, $oContact);

        // Initially, the message shown to the visitor is empty
        $sMessage = '';

        $oContactForm->handleRequest($oRequest);


        // Submit and validate contact form
        if ($oContactForm->isSubmitted() && $oContactForm->isValid()) {
            // Check captcha
            $bIsValidCaptcha = $this->captchaverify($oRequest->get('g-recaptcha-response'));
            if (!$bIsValidCaptcha) {
                $sMessage = 'Echec lors de la vérification du CAPTCHA';
            } else {
                // Captcha validation passed
                // Set message contact in 
                $oEntityManager = $this->getDoctrine()->getManager();
                $oEntityManager->persist($oContact);
                $oEntityManager->flush();

                // Send mail
                $oMessage = (new \Swift_Message())
                        ->setContentType('text/html')
                        ->setSubject($oContact->getSubject())
                        ->setFrom($oContact->getEmail())
                        ->setTo('magalilienart@gmail.com')
                        ->setBody($oContact->getMessage());

                $this->mailer->send($oMessage);
                $sMessage = 'Message envoyé';
            }
        }

        return $this->render('contact/contact.html.twig', array(
                    'form' => $oContactForm->createView(),
                    'message' => $sMessage
        ));
    }

    /**
     * Get success response from recaptcha and return it to controller
     * @param string $sRecaptcha
     * @return boolean
     * @throws Exception
     */
    protected function captchaverify($sRecaptcha) {

        $aPostData = http_build_query(
                array(
                    'secret' => $this->getParameter('captcha_secret_api'),
                    'response' => $sRecaptcha
                )
        );
        $aOptions = array('http' =>
            array(
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => $aPostData
            )
        );
        $oContext = stream_context_create($aOptions);
        $sResponse = file_get_contents($this->getParameter('captcha_verify_api'), false, $oContext);
        $oResult = json_decode($sResponse);

        return $oResult->success;
    }

}
