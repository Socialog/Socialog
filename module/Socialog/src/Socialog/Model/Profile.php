<?php

namespace Socialog\Model;

/**
 * Profile model
 */
class Profile extends AbstractModel
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $photoUrl;

    /**
     * @var string
     */
    protected $tagline;

    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->fromArray($options);
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * @param string $photoUrl
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;
    }

    /**
     * @return string
     */
    public function getTagline()
    {
        return $this->tagline;
    }

    /**
     * @param string $tagline
     */
    public function setTagline($tagline)
    {
        $this->tagline = $tagline;
    }

    public function fromArray(array $data)
    {
        foreach ($data as $key => $value) {
            switch(strtolower($key)) {
                case 'name':
                    $this->setName($value);
                    break;
                case 'photourl':
                    $this->setPhotoUrl($value);
                    break;
                case 'tagline':
                    $this->setTagline($value);
                    break;
            }
        }
    }

    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'photourl' => $this->getTagline(),
            'tagline' => $this->getPhotoUrl(),
        );
    }

}
