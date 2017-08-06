<?php

namespace Common\EntityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

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
