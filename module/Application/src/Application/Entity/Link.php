<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class Link {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $long_link;
    
    /** @ORM\Column(type="string") */
    protected $short_url;
    
    /** @ORM\Column(type="integer") */
    protected $clicks;
    
    /** @ORM\Column(type="datetime",nullable=false) */
    protected $created;
    
    
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
     * Get long_link
     *
     * @return string 
     */
    public function getLong_link()
    {
        return $this->long_link;
    }
    /**
     * Get short_url
     *
     * @return string 
     */
    public function getShort_url()
    {
        return $this->short_url;
    }
    /**
     * Get clicks
     *
     * @return integer 
     */
    public function getClicks()
    {
        return $this->clicks;
    }
    /**
     * Get created
     *
     * @return datetime object 
     */
    public function getCreated()
    {
        return $this->created;
    }
    
    
    /**
     * Set Long link
     *
     * @param string $long_link
     */
    public function setLong_link($long_link)
    {
        $this->long_link = $long_link;
    
        //return $this;
    }
    /**
     * Set Short link
     *
     * @param string $short_link
     */
    public function setShort_url($short_link)
    {
        $this->short_url = $short_link;
    
        //return $this;
    }
    /**
     * Set Clicks 
     *
     * @param string $clicks
     */
    public function setClicks($clicks)
    {
        $this->clicks = $clicks;
    
        //return $this;
    }
    
    /**
     * Set Created 
     *
     * @param string $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        //return $this;
    }

    
}