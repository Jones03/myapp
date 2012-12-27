<?php

namespace Pegasus\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pegasus\BlogBundle\Entity\Category
 *
 * @ORM\Table(name="Blog_categories")
 * @ORM\Entity
 */
class Category
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
     * @ORM\OneToMany(targetEntity="Blogpost", mappedBy="category")
     */
    private  $blogposts;
    
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
     * @return Category
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
     * Constructor
     */
    public function __construct()
    {
        $this->blogposts = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add blogposts
     *
     * @param Pegasus\BlogBundle\Entity\Blogpost $blogposts
     * @return Category
     */
    public function addBlogpost(\Pegasus\BlogBundle\Entity\Blogpost $blogposts)
    {
        $this->blogposts[] = $blogposts;
    
        return $this;
    }

    /**
     * Remove blogposts
     *
     * @param Pegasus\BlogBundle\Entity\Blogpost $blogposts
     */
    public function removeBlogpost(\Pegasus\BlogBundle\Entity\Blogpost $blogposts)
    {
        $this->blogposts->removeElement($blogposts);
    }

    /**
     * Get blogposts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getBlogposts()
    {
        return $this->blogposts;
    }
}