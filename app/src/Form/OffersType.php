<?php

namespace App\Form;

use App\Entity\Offers;
use App\Entity\Tags;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('city')
            ->add('department')
            ->add('tags', EntityType::class, [
                // Entité que l'on veut ajouter au formulaire
                'class' => Tags::class,

                // La valeur que l'on veut ajouter
                'choice_label' => 'tag',

                // Affichage
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('description');

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offers::class,
        ]);
    }
}
