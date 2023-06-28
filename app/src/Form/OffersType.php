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
                // looks for choices from this entity
                'class' => Tags::class,
                /*'query_builder' => function (EntityRepository $er): QueryBuilder {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.tag', 'ASC');
                },*/
                // uses the Tags.tag property as the visible option string
                'choice_label' => 'tag',

                // used to render a select box, check boxes or radios
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
