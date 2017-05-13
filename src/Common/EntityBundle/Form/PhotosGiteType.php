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

class PhotosGiteType extends AbstractType
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
            ->add('photos', CroppableGalleryType::class, array(
                'uploadConfig' => array(
                    'uploadUrl' => $myEntity->getUploadRootDir().'/'.strval($user->getId()),       // required - see explanation below (you can also put just a dir path)
                    'webDir' => $myEntity->getUploadDir().'/'.strval($user->getId()),              // required - see explanation below (you can also put just a dir path)
                    'fileExt' => '*.jpg;*.png;*.jpeg',    //optional
                    'showLibrary' => true,                      //optional
                    'generateFilename' => true          //optional
                ),
                'cropConfig' => array(
                    'minWidth' => 770,
                    'minHeight' => 400,
                    'aspectRatio' => true,              //optional
                    'cropRoute' => 'comur_api_crop',    //optional
                    'forceResize' => false,             //optional
                    'thumbs' => array(                  //optional
                        array(
                            'maxWidth' => 770,
                            'maxHeight' => 400,
                            'useAsFieldImage' => true  //optional
                        )
                    )
                )
            ))

            ->add('reviews', HiddenType::class)
            ->add('owner', HiddenType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commonPhotosGiteType';
    }


}
