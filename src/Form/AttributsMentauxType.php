<?php

namespace App\Form;

use App\Entity\AttributsMentaux;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AttributsMentauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sociabilite')
            ->add('intelligence')
            ->add('temperament')
            ->add('id_cheval')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AttributsMentaux::class,
        ]);
    }
}
