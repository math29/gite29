<?php

namespace Common\EntityBundle\Form;

use Craue\FormFlowBundle\Form\FormFlow;

class CreateGiteFlow extends FormFlow {

    protected function loadStepsConfig() {
        return array(
            array(
                'label' => 'Pour commencer',
                'form_type' => 'Common\EntityBundle\Form\KindGiteType',
            ),
            array(
                'label' => 'Details',
                'form_type' => 'Common\EntityBundle\Form\DetailsGiteType'
            ),
            array(
                'label' => 'Adresse',
                'form_type' => 'Common\EntityBundle\Form\AddressGiteType'
            ),
            array(
                'label' => 'Fonctionalités',
                'form_type' => 'Common\EntityBundle\Form\FeaturesGiteType'
            ),
            array(
                'label' => 'Photos',
                'form_type' => 'Common\EntityBundle\Form\PhotosGiteType'
            ),
            array(
                'label' => 'Description',
                'form_type' => 'Common\EntityBundle\Form\DescriptionGiteType'
            ),
            array(
                'label' => 'Liens autre plateformes',
                'form_type' => 'Common\EntityBundle\Form\SocialMediaGiteType'
            ),
            array(
                'label' => 'confirmation',
            ),
        );
    }

}