<?php

namespace Common\EntityBundle\Form;

use Craue\FormFlowBundle\Form\FormFlow;
use Craue\FormFlowBundle\Form\FormFlowInterface;

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
                'label' => 'confirmation',
            ),
        );
    }

}