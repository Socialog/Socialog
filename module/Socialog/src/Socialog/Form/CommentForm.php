<?php

namespace Socialog\Form;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class CommentForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('post');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-horizontal');

        $this->add(array(
            'name' => 'username',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Name',
            ),
        ));
        $this->add(array(
            'name' => 'comment',
            'attributes' => array(
                'type' => 'textarea',
                'class' => 'span9',
                'rows' => 5,
            ),
            'options' => array(
                'label' => 'Comment',
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Submit form',
                'id' => 'submitbtn',
                'class' => 'btn btn-primary',
            ),
        ));


        $this->setHydrator(new ClassMethods(false));
    }

}
