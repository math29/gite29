<?php

namespace Common\EntityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

use Ivory\GoogleMapBundle\Form\Type\PlaceAutocompleteType;
use Ivory\GoogleMap\Place\AutocompleteComponentType;

class AddressGiteType extends AbstractType
{

    /**
     * {@inheritdoc}

   '  */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('address', PlaceAutocompleteType::class, array(
            'label' => 'Adresse du gite'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commonAddressGiteType';
    }


}
