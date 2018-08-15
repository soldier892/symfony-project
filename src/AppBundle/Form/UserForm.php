<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Class UserForm
 * @package AppBundle\Form
 */
class UserForm extends AbstractType
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

        $builder->add($this->translator->trans('username'), TextType::class)
            ->add($this->translator->trans('email'), EmailType::class)
            ->add($this->translator->trans('password'), PasswordType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
   public function configureOptions(OptionsResolver $resolver)
   {
       parent::configureOptions($resolver);

       $resolver->setDefaults(
           [
               'csrf_protection' => true,
               'data_class' => User::class,
           ]
       );
   }
}