<?php

namespace App\Form;

use App\Entity\Category;
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
                    'placeholder' => "Chercher par intitulé de poste, compétence entreprise ou localisation",
                ],
            ])
            ->add('tags', EntityType::class, [
                'label' => '',
                'label_attr' => [
                    'style' => 'margin-bottom: 0',
                ],
                'class' => Tags::class,
                'multiple' => true,
                'required' => false,
                'attr' => [
                    'class' => 'flex flex-col focus:outline-none pl-3 pr-3',
                    'style'=>'height : 90vh'
                ],
                'group_by' => function ($choice, $key, $value) {
                    /** @var Category $category */
                    $category = $choice->getCategory();
                    $label = '';

                    switch ($category->getCategory()) {
                        case 'Travail':
                            $label = 'Travail';
                            break;
                        case 'Langage':
                            $label = 'Langage';
                            break;
                        case "Taille de l'entreprise":
                            $label = "Taille de l'entreprise";
                            break;
                        case "Condition de travail":
                            $label = "Condition de travail";
                            break;
                        case "Taille d'offre":
                            $label = "Taille d'offre";
                            break;
                        case "Type d'offre":
                            $label = "Type d'offre";
                    }
                    return $label;
                },
            ]);
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
