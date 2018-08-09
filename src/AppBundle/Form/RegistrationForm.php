<?php
/**
 * Created by PhpStorm.
 * User: coeus
 * Date: 8/9/18
 * Time: 1:13 PM
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('user',UserForm::class)

        ->add('employee',EmployeeForm::class)
        ->add('info',InfoForm::class)
            ->add('save', SubmitType::class, array('label' =>'Register User','attr' => array(
                'class' => 'btn btn-info')))
            ->getForm();
    }
}