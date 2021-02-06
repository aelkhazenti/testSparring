<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\CallbackTransformer;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('roles', ChoiceType::class, [
                'choices'  => [
                  'User' => 'ROLE_USER',
                  'Entrainneur' => 'ROLE_ENTRAINNEUR',
                  'Admin' => 'ROLE_ADMIN',
                ],
            ])
            ->add('password')
            ->add('pseudo_U')
            ->add('hauteur_U')
            ->add('poids_U')
            ->add('age_U')
        ;
        $builder->get('roles')
    ->addModelTransformer(new CallbackTransformer(
        function ($rolesArray) {
             return count($rolesArray)? $rolesArray[0]: null;
        },
        function ($rolesString) {
             return [$rolesString];
        }
));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
