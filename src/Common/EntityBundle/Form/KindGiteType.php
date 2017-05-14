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

class KindGiteType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('kind', ChoiceType::class, array(
            'label' => 'Genre d\'habitation',
            'required' => false,
            'choices'  => array(
                'Maison' => 'HOUSE',
                'Appartement' => 'FLAT',
                'Bungalow' => 'BUNGALOW'
            )
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commonKindGiteType';
    }


}
