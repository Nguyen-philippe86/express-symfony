<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            TextField::new('name', 'Nom'),
            SlugField::new('slug')->setTargetFieldName('name')->hideOnIndex(),
            TextEditorField::new('description', 'Description'),
            TextEditorField::new('moreInformation', 'Plus d\'informations')->hideOnIndex(),
            MoneyField::new('price', 'Prix')->setCurrency('EUR'),
            IntegerField::new('quantity', 'Quantité'),
            TextField::new('tags', 'Tags'),
            BooleanField::new('isBestSeller', 'Best seller'),
            BooleanField::new('isNewArrival', 'Nouveautés'),
            BooleanField::new('isFeatured', 'Est présenté'),
            BooleanField::new('isSpecialOffer', 'Offre spécial'),
            AssociationField::new('category', 'Catégorie'),
            ImageField::new('image', 'Image')
                ->setBasePath('uploads/products/')
                ->setUploadDir('public/uploads/products')
                ->setUploadedFileNamePattern('[randomhash],[extension]')
                ->setRequired(false),
        ];
    }
}
