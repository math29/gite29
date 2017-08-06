<?php

namespace Common\EntityBundle\Form;

use Ivory\GoogleMapBundle\Form\Type\PlaceAutocompleteType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

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
