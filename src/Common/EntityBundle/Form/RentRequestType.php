<?php

namespace Common\EntityBundle\Form;

use Common\EntityBundle\Entity\RentRequest;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RentRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('startDate', DateType::class, array(
                // render as a single text box
                'widget' => 'single_text'
            ))
            ->add('endDate', DateType::class, array(
                // render as a single text box
                'widget' => 'single_text'
            ))
            ->add('comment', TextareaType::class)
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => RentRequest::class
        ));
    }
}