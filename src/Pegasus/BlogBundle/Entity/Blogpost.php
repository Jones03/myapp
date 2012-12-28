<?php

namespace Pegasus\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pegasus\BlogBundle\Entity\Blogpost
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pegasus\BlogBundle\Entity\BlogpostRepository")
 */
class Blogpost
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(name="createdAt", type="date")
     */
    private $createdAt;

    /**
     * @var string $comment
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;
    
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="blogposts",cascade={"persist"})
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Blogpost
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Blogpost
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * @ORM\PrePersist
     */
    public function setCreatedValue()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Blogpost
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set category
     *
     * @param Pegasus\BlogBundle\Entity\Category $category
     * @return Blogpost
     */
    public function setCategory(\Pegasus\BlogBundle\Entity\Category $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return Pegasus\BlogBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}