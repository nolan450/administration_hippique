<?php

namespace App\Form;

use App\Entity\AttributsPhysiques;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AttributsPhysiquesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('resistance')
            ->add('endurance')
            ->add('detente')
            ->add('vitesse')
            ->add('id_cheval')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AttributsPhysiques::class,
        ]);
    }
}
