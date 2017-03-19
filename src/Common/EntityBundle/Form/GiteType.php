<?php

namespace Common\EntityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType,
    Symfony\Component\Form\Extension\Core\Type\TextType,
    Symfony\Component\Form\Extension\Core\Type\TextareaType,
    Symfony\Component\Form\Extension\Core\Type\ChoiceType,
    Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Comur\ImageBundle\Form\Type\CroppableGalleryType;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class GiteType extends AbstractType
{
    private $securityContext;

    public function __construct(TokenStorage $securityContext)
    {
        $this->securityContext = $securityContext;
    }

    /**
     * {@inheritdoc}

   '  */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $this->securityContext->getToken()->getUser();
        $myEntity = $builder->getForm()->getData();
        $builder
            ->add('address', TextType::class, array('label' => 'Adresse du gite'))

            ->add('kind', ChoiceType::class, array(
                'label' => 'Genre d\'habitation',
                'choices'  => array(
                    'Maison' => 'HOUSE',
                    'Appartement' => 'FLAT',
                    'Bungalow' => 'BUNGALOW'
                )
            ))

            ->add('capacity', IntegerType::class, array('label' => 'Nombre de vacanciers pouvant etre accueillis'))
            ->add('beds', IntegerType::class, array('label' => 'Nombre de lits'))
            ->add('bathrooms', IntegerType::class, array('label' => 'Nombre de salle de bain'))
            ->add('size', IntegerType::class, array('label' => 'Superficie du gite'))

            ->add('features', ChoiceType::class, array(
                'label' => 'Equipements',
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
            ))

            ->add('title', TextType::class, array('label' => 'Titre de l\'annonce'))
            ->add('description', TextareaType::class, array(
                'label' => 'La description du gite'
            ))

            ->add('photos', CroppableGalleryType::class, array(
                'uploadConfig' => array(
                    'uploadUrl' => $myEntity->getUploadRootDir().'/'.strval($user->getId()),       // required - see explanation below (you can also put just a dir path)
                    'webDir' => $myEntity->getUploadDir().'/'.strval($user->getId()),              // required - see explanation below (you can also put just a dir path)
                    'fileExt' => '*.jpg;*.png;*.jpeg',    //optional
                    'showLibrary' => true,                      //optional
                    'generateFilename' => true          //optional
                ),
                'cropConfig' => array(
                    'minWidth' => 588,
                    'minHeight' => 300,
                    'aspectRatio' => true,              //optional
                    'cropRoute' => 'comur_api_crop',    //optional
                    'forceResize' => false,             //optional
                    'thumbs' => array(                  //optional
                        array(
                            'maxWidth' => 180,
                            'maxHeight' => 400,
                            'useAsFieldImage' => true  //optional
                        )
                    )
                )
            ))

            ->add('reviews')
            ->add('owner', HiddenType::class)
            ->add('submit', SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Common\EntityBundle\Entity\Gite'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'common_entitybundle_gite';
    }


}
