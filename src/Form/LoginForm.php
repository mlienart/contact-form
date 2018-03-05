<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * LoginForm
 */
class LoginForm extends AbstractType {

    /**
     * 
     * @param FormBuilderInterface $oBuilder
     * @param array $aOptions
     */
    public function buildForm(FormBuilderInterface $oBuilder, array $aOptions) {
        $oBuilder
                ->add('_username', TextType::class)
                ->add('_password', PasswordType::class)
        ;
    }

    /**
     * 
     * @param OptionsResolver $oResolver
     */
    public function configureOptions(OptionsResolver $oResolver) {
        $oResolver->setDefaults(array(
            'csrf_token_id' => 'authenticate',
        ));
    }

}
