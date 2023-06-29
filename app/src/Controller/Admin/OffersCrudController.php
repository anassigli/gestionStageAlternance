<?php

namespace App\Controller\Admin;

use App\Entity\Offers;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OffersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Offers::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->setDisabled(),
            TextField::new('name')
            ->setDisabled(),
            TextField::new('description')
            ->setDisabled(),
            TextField::new('comment'),
            AssociationField::new('status')
            ->setDisabled(),
            AssociationField::new('candidacies')
            ->setDisabled(),
            AssociationField::new('enterprise')
            ->setDisabled(),
            TextField::new('city')
            ->setDisabled(),
            TextField::new('department')
            ->setDisabled(),
            AssociationField::new('tags')
            ->setDisabled(),
            DateTimeField::new('created_at')
                ->setDisabled(),
            DateTimeField::new('updated_at')
                ->setDisabled()
        ];
    }
}
