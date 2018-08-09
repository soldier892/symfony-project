<?php
/**
 * Created by PhpStorm.
 * User: coeus
 * Date: 8/9/18
 * Time: 1:03 PM
 */

namespace AppBundle\Form;

use AppBundle\Entity\PersonalInfo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfoForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('gender', ChoiceType::class, array(
                'choices'  => array(
                    'Male' => 'male',
                    'Female' => 'female',
                ),
                'required' => true
            ))
            ->add('dob', DateType::class)
            ->add('cnic', IntegerType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(
            array(
                'csrf_protection' => false,
                'data_class' => PersonalInfo::class,
            )
        );
    }
}