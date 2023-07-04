<?php

namespace App\Form;

use App\Entity\Offers;
use App\Entity\Tags;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',null,[
                'label' => 'Nom'
            ])
            ->add('city',null,[
                'label' => 'Ville'
            ])
            ->add('department',null,[
                'label' => 'Departement'
            ])
            ->add('tags', EntityType::class, [
                'label' => 'Tags',
                // Entité que l'on veut ajouter au formulaire
                'class' => Tags::class,
                // La valeur que l'on veut ajouter
                'choice_label' => 'tag',
                // Affichage
                'multiple' => true,
                'expanded' => true,
                'attr'=>array(
                    "class" => "flex flex-col"
                )
            ])
            ->add('description', TextareaType::class, [
                'label' => "Description",
                'attr' => [
                    "style" => "height:200px; width:100%;",
                    "class" => "mt-2"
                ]
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offers::class,
        ]);
    }
}
