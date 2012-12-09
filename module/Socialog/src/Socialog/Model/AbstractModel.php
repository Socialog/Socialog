<?php

namespace Socialog\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/**
 * Standard Model
 */
abstract class AbstractModel implements InputFilterAwareInterface
{
    /**
     * @var InputFilterInterface
     */
    protected $inputFilter;

    /**
     * @var HydratorInterface
     */
    protected $hydrator;
    
    private $this;

    /**
     * Validate this model
     *
     * @return boolean
     */
    public function isValid()
    {
        $data = get_object_vars($this);
        $data['this'] = $this;

        $inputFilter = $this->getInputFilter();
        $inputFilter->setData($data);

        $isValid = $inputFilter->isValid();

        foreach($inputFilter->getValues() as $property => $value) {
            $this->{$property} = $value;
        }

        return $isValid;
    }

    /**
     * @return InputFilterInterface
     */
    public function getInputFilter()
    {
        if (!$this->inputFilter instanceof InputFilterInterface
            && is_array($this->inputFilter)) {

            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            foreach ($this->inputFilter as $name => $config) {
                $config['name'] = $name;
                $inputFilter->add($factory->createInput($config));
            }

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

    /**
     * @param InputFilterInterface $inputFilter
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        $this->inputFilter = $inputFilter;
    }

    /**
     * @return HydratorInterface
     */
    public function getHydrator()
    {
        if (null == $this->hydrator) {
            $this->hydrator = new \Zend\Stdlib\Hydrator\ClassMethods(false);
        }

        return $this->hydrator;
    }

    /**
     * @param HydratorInterface $hydrator
     */
    public function setHydrator($hydrator)
    {
        $this->hydrator = $hydrator;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->getHydrator()->extract($this);
    }

    /**
     * @param array $data
     */
    public function fromArray(array $data)
    {
        $this->getHydrator()->hydrate($data, $this);
    }
}
