<?php

namespace Partage\PartageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

/**
 *Add group input to form
 */
class RegistrationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('groupe', ChoiceType::class, array(
            'choices'  => array(
                'Particulier' => '0',
                'Association' => '1',
            ),
            'required'    => true,
            'attr'=> [
                'class'=> 'form-control'
            ]
        ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}
