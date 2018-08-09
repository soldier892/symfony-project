<?php
/**
 * Created by PhpStorm.
 * User: coeus
 * Date: 8/9/18
 * Time: 1:03 PM
 */

namespace AppBundle\Form;

use AppBundle\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('email', EmailType::class)
            ->add('jobRole', ChoiceType::class, array(
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
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(
            array(
                'csrf_protection' => false,
                'data_class' => Employee::class,
            )
        );
    }
}