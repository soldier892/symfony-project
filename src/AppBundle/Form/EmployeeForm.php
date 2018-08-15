<?php

namespace AppBundle\Form;

use AppBundle\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Class EmployeeForm
 * @package AppBundle\Form
 */
class EmployeeForm extends AbstractType
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
            ->add($this->translator->trans('email'), EmailType::class)
            ->add($this->translator->trans('jobRole'), ChoiceType::class, [
                'choices'  => array(
                    'ASE' => 'ase',
                    'SE' => 'se',
                    'SSE' => 'sse',
                    'TE' => 'te',
                    'STE' => 'ste',
                    'GDE' => 'gde',
                    'SGDE' => 'sgde',
                    'CPM' => 'cpm',
                    'PM' => 'pm',
                    'HR' => 'hr',
                    'SHR' => 'shr',
                    'COO' => 'coo',
                    'CEO' => 'ceo',
                ),
                'multiple'  => true,
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(
            [
                'csrf_protection' => false,
                'data_class' => Employee::class,
            ]
        );
    }
}