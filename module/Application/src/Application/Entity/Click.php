<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Click {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;

    
    /**
     * Category from user
     * 
     * @ORM\ManyToOne(targetEntity="Link")
     * @ORM\JoinColumn(name="link_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * 
     * @var Link
     * @access protected
     */
    protected $link_id;
    
    
    /** @ORM\Column(type="string",nullable=false) */
    protected $host;
    
    /** @ORM\Column(type="string",nullable=false) */
    protected $ip;
    
    /** @ORM\Column(type="datetime",nullable=false) */
    protected $date_clicked;
    
    
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
     * Get link id
     *
     * @return entity Link 
     */
    public function getLink_id()
    {
        return $this->link_id;
    }
    /**
     * Get host
     *
     * @return string 
     */
    public function getHost()
    {
        return $this->host;
    }
    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }
    /**
     * Get created
     *
     * @return datetime object 
     */
    public function getDate_clicked()
    {
        return $this->date_clicked;
    }
    
    
    /**
     * Set id
     *
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    
        //return $this;
    }
    /**
     * Set Link id
     *
     * @param entity Link
     */
    public function setLink_id($link_id)
    {
        $this->link_id = $link_id;
    
    }
    /**
     * Set Host 
     *
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    
    }
    
    /**
     * Set Date clicked 
     *
     * @param datetime object $date_clicked
     */
    public function setDate_clicked($date_clicked)
    {
        $this->date_clicked = $date_clicked;
    
    }
    /**
     * Set IP 
     *
     * @param int ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    
    }

    
}