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
                    'Produits de base (Serviettes, draps, savon et papier toilette)' => 'BASE_PRODUCTS',
                    'Wi-Fi' => 'WIFI',
                    'Shampoing' => 'SHAMPOO',
                    'Penderie/Commode' => 'WARDROBE',
                    'Télévision' => 'TV',
                    'Chauffage' => 'HEATING',
                    'Climatisation' => 'AC',
                    'Petit déjeuner, café, thé' => 'BREAKFAST',
                    'Bureau/Espace de travail' => 'DESK',
                    'Cheminée' => 'FIREPLACE',
                    'Fer à repasser' => 'IRON',
                    'Sèche-cheveux' => 'HAIR_DRYER',
                    'Animaux domestiques sur place' => 'PETS',
                    'Lave-linge' => 'WACH_MACHINE',
                    'Sèche-linge' => 'DRY_MACHINE',
                )
            ))
            ->add('safety_features', ChoiceType::class, array(
                'label' => 'Sécurité',
                'required' => false,
                'multiple' => true,
                'choices'  => array(
                    'Détecteur de fumée' => 'SMOKE_CHECKER',
                    'Détecteur de monoxyde de carbone' => 'CARBONE_CHECKER',
                    'Kit de premiers secours' => 'FIRST_HELP_KIT',
                    'Fiche de sécurité' => 'SECURITY_LIST',
                    'Extincteur' => 'EXTINGUISHER',
                    'Porte de la chambre avec verrou' => 'ROOM_LOCK'
                )
            ))
            ->add('spaces', ChoiceType::class, array(
                'label' => 'Espaces de vie',
                'required' => false,
                'multiple' => true,
                'choices'  => array(
                    'Cuisine séparée' => 'KITCHEN',
                    'Parking' => 'PARKING',
                    'Garage' => 'GARAGE',
                    'Ascenseur' => 'ELEVATOR',
                    'Piscine' => 'SWIMMING_POOL',
                    'Jacuzzi' => 'JACUZZI',
                    'Jardin' => 'GARDEN',
                    'Entrée privée' => 'PRIVATE_ENTER'
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
