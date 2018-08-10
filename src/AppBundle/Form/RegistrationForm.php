<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class RegistrationForm
 * @package AppBundle\Form
 */
class RegistrationForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('user',UserForm::class)

        ->add('employee',EmployeeForm::class)
        ->add('info',InfoForm::class)
            ->add('save', SubmitType::class, ['label' =>'Register User','attr' => [
                'class' => 'btn btn-info']])
            ->getForm();
    }
}