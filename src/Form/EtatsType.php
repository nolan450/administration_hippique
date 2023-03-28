<?php

namespace App\Form;

use App\Entity\Etats;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtatsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sante')
            ->add('moral')
            ->add('stress')
            ->add('fatigue')
            ->add('faim')
            ->add('proprete')
            ->add('id_cheval', null, [
                'label' => 'Cheval',
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etats::class,
        ]);
    }
}
