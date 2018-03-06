<?php

namespace App\Form\Handler;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Contact;

/**
 * ContactHandler.
 *
 */
class ContactHandler {

    protected $request;
    protected $mailer;
    protected $contact;
    protected $contactEmail;

    /**
     * Initialize the handler with the form and the request
     * @param Request $oRequest
     * @param \Swift_Mailer $oMailer
     * @param Contact $oContact
     */
    public function __construct(Request $oRequest, \Swift_Mailer $oMailer, Contact $oContact, $sContactEmail) {
        $this->setRequest($oRequest);
        $this->setContact($oContact);
        $this->setMailer($oMailer);
        $this->setContactEmail($sContactEmail);
    }

    /**
     * Get request
     *
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * Set request
     *
     * @param \Symfony\Component\HttpFoundation\Request $oRequest
     * @return ContactHandler
     */
    public function setRequest(Request $oRequest) {
        $this->request = $oRequest;
        return $this;
    }

    /**
     * Get contact
     *
     * @return \App\Entity\Contact
     */
    public function getContact() {
        return $this->contact;
    }

    /**
     * Set contact
     *
     * @param \App\Entity\Contact $oContact
     * @return ContactHandler
     */
    public function setContact(Contact $oContact) {
        $this->contact = $oContact;
        return $this;
    }

    /**
     * Get contactEmail
     *
     * @return string
     */
    public function getContactEmail() {
        return $this->contactEmail;
    }

    /**
     * Set contactEmail
     *
     * @param string $sContactEmail
     * @return ContactHandler
     */
    public function setContactEmail($sContactEmail) {
        $this->contactEmail = $sContactEmail;
        return $this;
    }

    /**
     * Get mailer
     *
     * @return \Swift_Mailer
     */
    public function getMailer() {
        return $this->mailer;
    }

    /**
     * Set mailer
     *
     * @param \Swift_Mailer $oMailer
     * @return ContactHandler
     */
    public function setMailer(\Swift_Mailer $oMailer) {
        $this->mailer = $oMailer;
        return $this;
    }

    /**
     * Process form
     *
     * @return boolean
     */
    public function process() {

        // Check the method
        if ('POST' == $this->getRequest()->getMethod()) {
            $this->onSuccess($this->getContact());
            return true;
        }
        return false;
    }

    /**
     * Send mail on success
     * 
     * @param Contact $oContact
     * 
     */
    protected function onSuccess(Contact $oContact) {

        // Send mail
        $oMessage = (new \Swift_Message())
                ->setContentType('text/html')
                ->setSubject($oContact->getSubject())
                ->setFrom($oContact->getEmail())
                ->setTo($this->getContactEmail())
                ->setBody($oContact->getMessage());

        $this->getMailer()->send($oMessage);
    }

}
