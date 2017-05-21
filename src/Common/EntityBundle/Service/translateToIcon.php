<?php

namespace Common\EntityBundle\Service;

class translateToIcon
{
    private $icons = array (
        'Produits de base (Serviettes, draps, savon et papier toilette)' => 'BASE_PRODUCTS',
        'WIFI' => 'fa-wifi',
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
    );

    public function indexAction()
    {
        return $this->render('CommonEntityBundle:Default:index.html.twig');
    }
}
