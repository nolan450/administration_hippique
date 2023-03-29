<?php

namespace App\Form;

use App\Entity\TacheAutomatique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TacheAutomatiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id_tache_auto')
            ->add('nom_action')
            ->add('frequence_realisation')
            ->add('id_centre_equestre')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TacheAutomatique::class,
        ]);
    }
}
