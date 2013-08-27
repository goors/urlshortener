<?php
namespace Api\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ApiController extends AbstractActionController
{
    public function indexAction()
    {
        
    }

    public function makeShortUrlAction()
    {
        
        if($this->getRequest()->isPost()){
            
            
            
            sleep(1);
            $params = $this->params()->fromPost();

            if(!filter_var($params['url'], FILTER_VALIDATE_URL)){
                $response = $this->getResponse();
                $response->setStatusCode(206);
                $response->setContent(\Zend\Json\Json::encode(array("short_url"=>0)));
            }
            else{

                $objectManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');

                
                
                $check_for_url = $objectManager->getRepository("\Application\Entity\Link")->findOneBy(array("long_link"=>$params['url']));
                
                if(count($check_for_url)){
                    $hash = $check_for_url->getShort_url();
                }
                else{
                
                    
                    if($params['human'] == 1){
                        //$hash = "human";
                        
                        //implement human
                        $hash = \Api\Human\Human::getKeyword($params['url']);
                        
                        
                        
                        
                        $link = new \Application\Entity\Link;
                        $link->setCreated(new \DateTime(date('Y-m-d H:i:s')));
                        $link->setLong_link($params['url']);
                        $link->setShort_url($hash);
                        $link->setClicks(0);

                        $objectManager->persist($link);
                        $objectManager->flush();


                        
                    }
                    else{
                        $link = new \Application\Entity\Link;
                        $link->setCreated(new \DateTime(date('Y-m-d H:i:s')));
                        $link->setLong_link($params['url']);
                        $link->setShort_url('short');
                        $link->setClicks(0);

                        $objectManager->persist($link);
                        $objectManager->flush();


                        $id = $link->getId();




                        $hash = \Api\Keyword\Keyword::hash($id, 6);

                        $link = $objectManager->getRepository("\Application\Entity\Link")->find($id);
                        $link->setShort_url(str_replace("000000", "", $hash));
                        $objectManager->persist($link);
                        $objectManager->flush();
                    }
                }
                $response = $this->getResponse();
                $response->setStatusCode(200);
                $response->setContent(\Zend\Json\Json::encode(array("short_url"=>  str_replace("000000", "", $hash))));
            }
            return $response;
            
        }
        
        
        
        
        
    }

    public function getNumberOfClicksAction()
    {
        $objectManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        $params = $this->params()->fromPost();
        
        $link = $objectManager->getRepository("\Application\Entity\Link")->findOneBy(array("short_url"=>$params['short_url']));
        $response = $this->getResponse();
                
        $response->setStatusCode(200);
        
        $response->setContent(\Zend\Json\Json::encode(array("no_of_clicks"=>  $link->getClicks(), "short_url"=>$params['short_url'])));
        
        return $response;
        
        
    }

    public function getLinkStatsAction()
    {
        $objectManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        
        $params = $this->params()->fromPost();
        
        $link = $objectManager->getRepository("\Application\Entity\Link")->findOneBy(array("short_url"=>$params['short_url']));
        
        
        
        $id = $link->getId();
        
        
        
        $stats = $objectManager->getRepository("\Application\Entity\Click")->findBy(array("link_id"=> $objectManager->getReference("\Application\Entity\Link", $id)));
        
        
        $response = $this->getResponse();
                
        $response->setStatusCode(200);
        
        foreach($stats as $stat){
           $content .= \Zend\Json\Json::encode(array("host"=>  $stat->getHost(), "ip"=>$stat->getHost(), "date"=>$stat->getDate_clicked()->format("Y-m-d H:i:s"), "short_url"=>$params['short_url']));
        }
        
        
        $response->setContent($content);
        
        
        return $response;
        
        
    }
}