<?php

namespace Common\EntityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class DetailsGiteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('capacity', IntegerType::class, array('label' => 'Nombre de vacanciers pouvant etre accueillis', 'required' => false))
            ->add('beds', IntegerType::class, array('label' => 'Nombre de lits', 'required' => false))
            ->add('bedrooms', IntegerType::class, array('label' => 'Nombre de chambres', 'required' => false))
            ->add('bathrooms', IntegerType::class, array('label' => 'Nombre de salle de bain', 'required' => false))
            ->add('size', IntegerType::class, array('label' => 'Superficie du gite', 'required' => false));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commonDetailsGiteType';
    }


}
