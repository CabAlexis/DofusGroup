<?php

namespace App\Form;

use App\Entity\Dungeon;
use App\Entity\DungeonRequest;
use App\Entity\Server;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DungeonRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, Array $options)
    {
        $builder->add(
            'numberParticipates',
            RangeType::class, [
            'label' => 'Nombre de participants :',
            'attr' => [
                "data-provide" => "slider",
                "data-slider-ticks" => "[1, 2, 3, 4, 5, 6, 7]",
                "data-slider-ticks-labels" => '["1", "2", "3", "4", "5", "6", "7"]',
                "data-slider-min" => "1",
                "data-slider-max" => "7",
                "data-slider-step" => "1",
                "data-slider-value" => "2",
                "data-slider-tooltip" => "hide",
                "style" => "width:100%;"
            ]

        ]);
        $builder->add(
            'date',
            DateType::class, [
                'label' => 'Quel jour pour l\'aventure ?',
                'attr' => ['class' => 'datepicker'],
                'widget' => 'single_text'
            ]
        );
        $builder->add(
            'time',
            TimeType::class, [
                'label' => 'Quelle heure?'
            ]
        );
        $builder->add(
            'dungeon',
            EntityType::class, [
            'label' => 'Et pour quel donjon?',
            'class' => Dungeon::class,
            'choice_label' => function (Dungeon $dungeon) {
                return $dungeon->getName();
            },
            'attr' => [
                'class' => 'compact-select-list'
            ] 
            ]
        );
        // $builder->add(
        //     'server',
        //     EntityType::class, [
        //     'label' => 'Et pour quel serveur?',
        //     'class' => Server::class,
        //     'choice_label' => function (Server $server) {
        //         return $server->getName();
        //     },
        //     'attr' => [
        //         'class' => 'compact-select-list'
        //     ] 
        //     ]
        // );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DungeonRequest::class,
        ]);
    }
}
