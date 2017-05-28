<?php

namespace Common\EntityBundle\Service;

class TranslateToIcon
{
    private $icons = array (
        'BASE_PRODUCTS' => array('produits de base', 'soap-icon'),
        'WIFI' => array('Wifi', 'icon-xs icon-primary fa-wifi'),
        'SHAMPOO' => array('Shampoing', 'soap2-icon'),
        'WARDROBE' => array('Penderie/Commode', 'wardrobe-icon'),
        'TV' => array('Télévision', 'icon-xs icon-primary fa-television'),
        'HEATING' => array('Chauffage', 'heater-icon'),
        'AC' => array('Climatisation', 'ac-icon'),
        'BREAKFAST' => array('Petit déjeuner, café, thé', 'toaster-icon'),
        'DESK' => array('Bureau/Espace de travail', 'work-station-icon'),
        'FIREPLACE' => array('Cheminée', 'fireplace-icon'),
        'IRON' => array('Fer à repasser', 'iron-icon'),
        'HAIR_DRYER' => array('Sèche-cheveux', 'dryer-icon'),
        'PETS' => array('Animaux de compagnie', 'icon-xs icon-primary fa-paw'),
        'WACH_MACHINE' => array('Lave-linge', 'washing-machine-icon'),
        'DRY_MACHINE' => array('Sèche-linge', 'washing-machine-icon'),
        'SMOKE_CHECKER' => array('Détecteur de fumée', 'smoke-detector-icon'),
        'CARBONE_CHECKER' => array('Détecteur de CO', 'smoke-detector-icon'),
        'FIRST_HELP_KIT' => array('Kit de premiers secours', 'first-help-icon'),
        'SECURITY_LIST' => array('Fiche de sécurité', 'icon-xs icon-primary fa-file-text'),
        'EXTINGUISHER' => array('Extincteur', 'icon-xs icon-primary fa-fire-extinguisher'),
        'ROOM_LOCK' => array('Chambre avec verrou', 'icon-xs icon-primary fa-lock'),
        'KITCHEN' => array('Cuisine séparée', 'kitchen-icon'),
        'PARKING' => array('Parking', 'parking-icon'),
        'GARAGE' => array('Garage', 'garage-icon'),
        'ELEVATOR' => array('Ascenseur', 'elevator-icon'),
        'SWIMMING_POOL' => array('Piscine', 'swimming-pool-icon'),
        'JACUZZI' => array('Jacuzzi', 'jacuzzi-icon'),
        'GARDEN' => array('Jardin', 'garden-icon'),
        'PRIVATE_ENTER' => array('Entrée privée', 'wooden-fence-icon')
    );

    public function translate($needle)
    {
        return $this->icons[$needle];
    }
}
