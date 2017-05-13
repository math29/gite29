<?php

namespace Common\EntityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class FeaturesGiteType extends AbstractType
{
    /**
     * {@inheritdoc}

    '  */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('features', ChoiceType::class, array(
                'label' => 'Equipements',
                'required' => false,
                'multiple' => true,
                'choices'  => array(
                    'BASE_PRODUCTS' => 'Produits de base (Serviettes, draps, savon et papier toilette)',
                    'WIFI' => 'Wi-Fi',
                    'Shampoo' => 'Shampoing',
                    'WARDROBE' => 'Penderie/Commode',
                    'TV' => 'Télévision',
                    'HEATING' => 'Chauffage',
                    'AC' => 'Climatisation',
                    'BREAKFAST' => 'Petit déjeuner, café, thé',
                    'DESK' => 'Bureau/Espace de travail',
                    'FIREPLACE' => 'Cheminée',
                    'IRON' => 'Fer à repasser',
                    'HAIR_DRYER' => 'Sèche-cheveux',
                    'PETS' => 'Animaux domestiques sur place',
                    'PRIVATE_ENTER' => 'Entrée privée'
                )
            ))
            ->add('safety_features', ChoiceType::class, array(
                'label' => 'Sécurité',
                'required' => false,
                'multiple' => true,
                'choices'  => array(
                    'SMOKE_CHECKER' => 'Détecteur de fumée',
                    'CARBONE_CHECKER' => 'Détecteur de monoxyde de carbone',
                    'FIRST_HELP_KIT' => 'Kit de premiers secours',
                    'SECURITY_LIST' => 'Fiche de sécurité',
                    'EXTINGUISHER' => 'Extincteur',
                    'ROOM_LOCK' => 'Porte de la chambre avec verrou'
                )
            ))
            ->add('spaces', ChoiceType::class, array(
                'label' => 'Espaces de vie',
                'required' => false,
                'multiple' => true,
                'choices'  => array(
                    'KITCHEN' => 'Cuisine',
                    'WACH_MACHINE' => 'Lave-linge',
                    'DRY_MACHINE' => 'Sèche-linge',
                    'PARKING' => 'Parking',
                    'GARAGE' => 'Garage',
                    'ELEVATOR' => 'Ascenseur',
                    'SWIMMING_POOL' => 'Piscine',
                    'JACUZZI' => 'Jacuzzi',
                    'GARDEN' => 'Jardin'
                )
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'CommonFeaturesGiteType';
    }


}
