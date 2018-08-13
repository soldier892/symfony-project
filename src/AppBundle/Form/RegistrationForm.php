<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Class RegistrationForm
 * @package AppBundle\Form
 */
class RegistrationForm extends AbstractType
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add($this->translator->trans('user'),UserForm::class)
        ->add($this->translator->trans('employee'),EmployeeForm::class)
        ->add($this->translator->trans('info'),InfoForm::class)
            ->add('save', SubmitType::class, ['label' => $this->translator->trans('Register User'),'attr' => [
                'class' => 'btn btn-info']])
            ->getForm();
    }
}