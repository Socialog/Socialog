<?php

namespace Socialog\Entity;

use Doctrine\ORM\Mapping as ORM;
use Socialog\Model\AbstractModel;
use Socialog\Model\ArticleInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="pages")
 */
class Page extends AbstractModel implements
    EntityInterface,
    ArticleInterface
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
     * @var string
     * @ORM\Column(name="title")
     */
    protected $title;

    /**
     * @var boolean
     * @ORM\Column(name="allow_comments", type="boolean")
     */
    protected $allowComments = true;

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
        'allow_comments' => array(
            'required' => false,
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

    /**
     * Set if comments are allowed for the current post
     * @param boolean $allowed
     */
    public function setAllowComments($allowed)
    {
        $this->allowComments = (boolean) $allowed;
    }

    /**
     * If commenting is allowed
     *
     * @return boolean
     */
    public function getAllowComments()
    {
        return $this->allowComments;
    }
}
