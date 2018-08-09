<?php
/**
 * Created by PhpStorm.
 * User: coeus
 * Date: 8/9/18
 * Time: 1:02 PM
 */

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('username', TextType::class)
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class);
    }

   public function configureOptions(OptionsResolver $resolver)
   {
       parent::configureOptions($resolver);

       $resolver->setDefaults(
           array(
               'csrf_protection' => true,
               'data_class' => User::class,
           )
       );
   }
}