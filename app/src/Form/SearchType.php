<?php

namespace App\Form;

use App\Entity\Tags;
use App\Model\SearchData;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('q', TextType::class, [
                'attr' => [
                    'placeholder' => "Chercher par intitulé de poste, compétence entreprise ou localisation"
                ],
            ])
            ->add('tags', EntityType::class, [
                'class' => Tags::class,
                'expanded' => true,
                'multiple' => true,
                'required' => false,
                'label_format' => 'form.tags.%category%'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
}
