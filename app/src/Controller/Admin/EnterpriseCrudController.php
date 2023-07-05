<?php

namespace App\Controller\Admin;

use App\Entity\Enterprise;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EnterpriseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Enterprise::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            EmailField::new('email'),
            TextField::new('status')
                ->hideOnForm(),
            AssociationField::new('status')
                ->setCrudController(StatusCrudController::getEntityFqcn())
                ->onlyOnForms(),
        ];
    }

}
