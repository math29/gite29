<?php

namespace Common\EntityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class GiteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('owner')
            ->add('title')
            ->add('location')
            ->add('area')
            ->add('bedrooms')
            ->add('bathrooms')
            ->add('garages')
            ->add('features')
            ->add('yearBuilt')
            ->add('size')
            ->add('roomCount')
            ->add('viewType')
            ->add('garden')
            ->add('description')
            ->add('reviews')
            ->add('save', SubmitType::class);
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
