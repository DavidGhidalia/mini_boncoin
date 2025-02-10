<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\user;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;



class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('categorie', ChoiceType::class, [
                'label' => 'Catégorie',
                'choices' => [
                    'Jouets' => 'Jouets',
                    'Jeux vidéos' => 'Jeux vidéos',
                    'Peluches' => 'Peluches',
                ],
                'placeholder' => 'Choisissez une catégorie',  // Optionnel
            ])
            ->add('telephone', TextType::class, [
                'required' => false,
                'label' => 'Numéro de téléphone'
            ])
            ->add('ville')
            // ->add('date_publication', null, [
            //     'widget' => 'single_text',
            // ])
            // ->add('utilisateur', EntityType::class, [
            //     'class' => user::class,
            //     'choice_label' => 'id',
            // ])
            ->add('images', FileType::class, [
                'label' => 'Images (JPEG, PNG)',
                'multiple' => true,  // Permet de télécharger plusieurs fichiers
                'mapped' => false,   // Ne pas mapper directement à l'entité
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
