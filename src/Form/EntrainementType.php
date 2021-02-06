<?php

namespace App\Form;

use App\Entity\Entrainement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\CallbackTransformer;

class EntrainementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDeb_E', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('dateFin_E', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('heurDeb_E', TimeType::class, [
                'input'  => 'datetime',
                'widget' => 'choice',
            ])
            ->add('heurFin_E', TimeType::class, [
                'input'  => 'datetime',
                'widget' => 'choice',
            ])
            ->add('type_E', ChoiceType::class, [
                'choices' => [
                    'BOXE' => [
                        'Boxe anglaise' => 'Boxe_anglaise',
                        'Boxe francaise' => 'Boxe_francaise',
                        'Boxe thai' => 'Boxe_thai',
                    ],
                    'kick boxing' => [
                        'kick-boxing' => 'kick_boxing',
                    ],
                ],
            ])
            ->add('typeEntrainement_E',ChoiceType::class, [
                'choices'  => [
                    'distance' => 'distance',
                    'presentiel' => 'presentiel.',
                  ],
            ])
            
        ;
            $builder->get('type_E')
            ->addModelTransformer(new CallbackTransformer(
            function ($array) {
                return count($array)? $array[0]: null;
            },
            function ($string) {
                return [$string];
            }
        ));
        $builder->get('typeEntrainement_E')
            ->addModelTransformer(new CallbackTransformer(
            function ($array) {
                return count($array)? $array[0]: null;
            },
            function ($string) {
                return [$string];
            }
        ));

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entrainement::class,
        ]);
    }
}
