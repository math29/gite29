<?php

namespace Common\EntityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType,
    Symfony\Component\Form\Extension\Core\Type\TextType,
    Symfony\Component\Form\Extension\Core\Type\TextareaType,
    Symfony\Component\Form\Extension\Core\Type\ChoiceType,
    Symfony\Component\Form\Extension\Core\Type\IntegerType,
    Symfony\Component\Form\Extension\Core\Type\CollectionType,
    Symfony\Component\Form\Extension\Core\Type\DateType;

class GiteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('label' => 'Titre de la location'))
            ->add('owner')
            ->add('address', TextType::class, array('label' => 'Adresse du gite'))
            ->add('bedrooms', IntegerType::class, array('label' => 'Nombre de chambres'))
            ->add('bathrooms', IntegerType::class, array('label' => 'Nombre de salle de bain'))
            ->add('garages', IntegerType::class, array('label' => 'Places de parking'))
            ->add('features', CollectionType::class, array('label' => 'equipements'))
            ->add('size', IntegerType::class, array('label' => 'Superficie en mètres carrés'))
            ->add('roomCount', IntegerType::class, array('label' => 'Nombre de chambres'))
            ->add('viewType', ChoiceType::class, array(
                'label' => 'Type de vue',
                'choices'  => array(
                    'Montagne' => 'MONTAINS',
                    'Mer' => 'SEA',
                    'Campagne' => 'CAMPAIGN',
                ))
            )
            ->add('garden', ChoiceType::class, array(
                'label' => 'Jardin',
                'choices'  => array(
                    'Maybe' => null,
                    'Yes' => true,
                    'No' => false,
                ))
            )
            ->add('description', TextareaType::class, array(
                'label' => 'La description du gite'
            ))
            ->add('reviews')
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
