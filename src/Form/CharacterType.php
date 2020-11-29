<?php

namespace App\Form;

use App\Entity\Character;
use App\Entity\Element;
use App\Entity\Race;
use App\Entity\Server;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class CharacterType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add(
            'name',
            TextType::class,
            [
                'attr' => ['placeholder' => 'Pseudo',
                           'class' => 'form-control'],
                'label' => false
            ]
        )
        ->add(
            'levelMax',
            ChoiceType::class, [
                'choices' => [
                    'Yes' => 1,
                    'No' => 0
                ]
            ]
        )
        ->add(
            'race',
            EntityType::class, [
                'label' => 'Classe',
                'class' => Race::class,
                'choice_label' => function (Race $race) {
                    return $race->getName();
                },
                'attr' => [
                    'class' => 'compact-select-list'
                ] 
                ])
        // ->add(
        //     'elements',
        //     EntityType::class, [
        //         'label' => 'Element',
        //         'class' => Element::class,
        //         'choice_label' => function (Element $element) {
        //             return $element->getName();
        //         },
        //         'attr' => [
        //             'class' => 'compact-select-list'
        //         ] 
        //         ])
        ->add(
            'server',
            EntityType::class, [
                'label' => 'Serveur',
                'class' => Server::class,
                'choice_label' => function (Server $server) {
                    return $server->getName();
                },
                'attr' => [
                    'class' => 'compact-select-list'
                ] 
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Character::class,
        ]);
    }
}
