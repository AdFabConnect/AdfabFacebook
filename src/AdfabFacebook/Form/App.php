<?php

namespace AdfabFacebook\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use ZfcBase\Form\ProvidesEventsForm;
use Zend\I18n\Translator\Translator;

class App extends ProvidesEventsForm
{
    protected $userEditOptions;
    protected $userEntity;
    protected $serviceManager;

    public function __construct($name = null, Translator $translator)
    {
        parent::__construct($name);

        $this->add(array(
            'name' => 'id',
            'type' => 'Zend\Form\Element\Hidden',
            'attributes' => array(
                'value' => 0
            )
        ));

        $this->add(array(
            'name' => 'appId',
            'options' => array(
                'label' => $translator->translate('Facebook app_id', 'adfabfacebook'),
            ),
        ));

        $this->add(array(
            'name' => 'appSecret',
            'options' => array(
                'label' => $translator->translate('Facebook app_secret', 'adfabfacebook'),
            ),
        ));

        $submitElement = new Element\Button('submit');
        $submitElement
            ->setLabel('Edit')
            ->setAttributes(array(
                'type'  => 'submit',
            ));

        $this->add($submitElement, array(
            'priority' => -100,
        ));
    }
}
