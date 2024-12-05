<?php

namespace App\Form;

use App\Entity\Fournisseur;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('idProduit')
        ->add('nomProduit')
        ->add('prix')
        ->add('categorie')
        ->add('fournisseur', EntityType::class, [
            'class' => Fournisseur::class,
            'choice_label' => 'nom',
        ])
        ->add('image', FileType::class, [
            'label' => 'Image du produit (fichier image)',
    
            // Ce champ n'est pas mappé à l'entité (il sera géré manuellement)
            'mapped' => false,
    
            // Le champ n'est pas obligatoire
            'required' => false,
    
            // Contraintes pour vérifier les fichiers
            'constraints' => [
                new File([
                    'maxSize' => '2M',
                    'mimeTypes' => [
                        'image/jpeg',
                        'image/png',
                        'image/gif',
                    ],
                    'mimeTypesMessage' => 'Veuillez télécharger un fichier valide (JPEG, PNG ou GIF)',
                ])
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
