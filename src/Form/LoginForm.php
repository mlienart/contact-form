<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use App\Entity\User;

class LoginForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('_username', TextType::class, array(
                    'constraints' => array(
                        new NotBlank(array('message' => 'form.name.required')),
                        new Length(array('min' => 2, 'minMessage' => 'Contenu trop court')),
                    )
                ))
                ->add('_password', PasswordType::class)
        ;
    }

//    public function getBlockPrefix() {
//        return "";
//    }
//$this->addOption('username_parameter', '_username');
//        $this->addOption('password_parameter', '_password');
//        $this->addOption('csrf_parameter', '_csrf_token');
//        $this->addOption('csrf_token_id', 'authenticate');
//        $this->addOption('post_only', true);
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            //'data_class' => null,
            // enable/disable CSRF protection for this form
            'csrf_protection' => true,
            // the name of the hidden HTML field that stores the token
            'csrf_field_name' => '_token',
            // an arbitrary string used to generate the value of the token
            // using a different string for each form improves its security
            'csrf_token_id' => 'authenticate',
        ));
    }

}
