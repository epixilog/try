<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;

class RegistrationFormType extends AbstractType{
    
    public function BuildForm(FormBuilderInterface $builder, array $option){
        //parent::buildForm($builder, $options);
        $builder->add('firstName')
                ->add('lastName');
    }
    
    public function getParent(){
        return BaseRegistrationFormType::class;
    }
}