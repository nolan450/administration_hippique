<?php

namespace App\Form;

use App\Entity\Cheval;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChevalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',
                TextType::class,
                [
                    'label' => 'Nom',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Nom du cheval',
                    ],
                ]
            )
            ->add('race',
                TextType::class,
                [
                    'label' => 'Race',
                    'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Test'
                    ]
                ])
            ->add('description',
                TextType::class,
                [
                    'label' => 'Description',
                    'attr' => [
                        'placeholder' => 'Description du cheval',
                    ],
                ]
            )
            ->add('id_propietaire')
            ->add('etats')
            ->add('attributsPhysiques')
            ->add('autres')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cheval::class,
        ]);
    }
}
