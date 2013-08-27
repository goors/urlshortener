<?php

namespace Api\Model;

use \Doctrine\ORM\EntityManager;
use \Application\Entity\Click as Click;

class Url    {
    
    protected $sm;
            
    function __construct(EntityManager $sm) {
        $this->sm = $sm;
    }
    
    
    public function getOrigUriByTrimPath($url){
        
        //$objectManager = $this->sm;
        
        $link = $this->sm->getRepository("\Application\Entity\Link")->findOneBy(array("short_url"=>$url));
        if(is_object($link)){
            $long_link = $link->getLong_link();
            $id = $link->getId();
            //echo $long_link;

            /*
             * update number of clicks
             */
            $link->setClicks($link->getClicks() + 1);
            $this->sm->persist($link);
            $this->sm->flush();



            /*
             * insert new click
             */

            $click = new Click;
            $click->setDate_clicked(new \DateTime(date('Y-m-d H:i:s')));
            //$click->setDate_clicked(new \DateTime(date("Y-m-d H:is")));
            $click->setHost(gethostbyaddr($_SERVER['REMOTE_ADDR']));
            $click->setIp($_SERVER['REMOTE_ADDR']);
            $click->setLink_id($this->sm->getReference("\Application\Entity\Link", $id));

            $this->sm->persist($click);
            $this->sm->flush();

            return $long_link;
        }
        else {
            throw new \Exception("error-controller-cannot-dispatch");
        }
    }
    
    
    
}

?>
