<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

/**
 * ContactFormType
 */
class ContactFormType extends AbstractType {

    /**
     * 
     * @param FormBuilderInterface $oBuilder
     * @param array $oOptions
     */
    public function buildForm(FormBuilderInterface $oBuilder, array $oOptions) {
        $oBuilder
                ->add('username', TextType::class)
                ->add('email', EmailType::class)
                ->add('subject', TextType::class)
                ->add('message', TextareaType::class)
        ;
    }

}
