<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'username',
            TextType::class,
            [
                'attr' => ['placeholder' => 'Pseudo Dofus',
                           'class' => 'form-control'],
                'label' => false
            ]
        );
        $builder->add(
            'email',
            EmailType::class,
            [
                'attr' => ['placeholder' => 'Email',
                           'class' => 'form-control'],
                'label' => false
            ]  
        );
        $builder->add(
            'firstname',
            TextType::class,
            [
                'attr' => ['placeholder' => 'Prénom',
                           'class' => 'form-control'],
                'label' => false
            ]
        );
        $builder->add(
            'lastname',
            TextType::class,
            [
                'attr' => ['placeholder' => 'Nom',
                           'class' => 'form-control'],
                'label' => false
            ]
        );
        $builder->add(
            'ankamaAccount',
            TextType::class,
            [
                'attr' => ['placeholder' => 'Nom de compte Ankama',
                           'class' => 'form-control'],
                'label' => false
            ]
        );
        $builder->add(
            'password',
            RepeatedType::class,
            [
            'type' => PasswordType::class,
            'invalid_message' => 'Les mots de passes doivent etre identiques.',
            'options' => ['attr' => ['class' => 'password-field']],
            'first_options'  => ['attr' => ['placeholder' => 'Mot de passe',
                                            'class' => 'form-control'],
                                'label' => false],
            'second_options' => ['attr' => ['placeholder' => 'Répetez le mot de passe',
                                            'class' => 'form-control'],
                                'label' => false],
            ]
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
