<?php

namespace App\Form;

use App\Entity\Joueur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JoueurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudonyme')
            ->add('email')
            ->add('mot_de_passe')
            ->add('prenom')
            ->add('nom')
            ->add('sexe')
            ->add('date_de_naissance')
            ->add('telephone')
            ->add('adresse_postale')
            ->add('avatar')
            ->add('desciption')
            ->add('site_web')
            ->add('adresse_ip')
            ->add('date_inciption')
            ->add('derniere_connexion')
            ->add('cheval')
            ->add('compteBancaire')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Joueur::class,
        ]);
    }
}
