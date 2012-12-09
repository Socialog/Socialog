<?php

namespace Socialog\Entity;

use Socialog\Model\AbstractModel;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pages")
 */
class Page extends AbstractModel implements EntityInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    protected $id;
    
    /**
     * @var string
     * @ORM\Column(name="content")
     */
    protected $content;

    /**
     * @var string
     * @ORM\Column(name="content_html")
     */
    protected $contentHtml;

    /**
     * Page Title
     *
     * @var string
     * @ORM\Column(name="title")
     */
    protected $title;

    /**
     * InputFilter Config
     */
    protected $inputFilter = array(
        'id' => array(
            'required' => false,
        ),
        'title' => array(
            'required' => true,
        ),
        'content' => array(
            'required' => true,
        ),
    );

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
    
    /**
     * @return string
     */
    public function getContentHtml()
    {
        return $this->contentHtml;
    }
    
    /**
     * @param string $contentHtml
     */
    public function setContentHtml($contentHtml)
    {
        $this->contentHtml = $contentHtml;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}
