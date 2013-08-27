<?php
namespace Api;
use Zend\Http\Header\Location; 
use Zend\Http\Headers; 
use Zend\Http\PhpEnvironment\Response; 

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    
    public function onBootstrap (\Zend\Mvc\MvcEvent $e) {
        $Eventmanager = $e->GetApplication()->getEventManager ();
        $Eventmanager-> attach (\Zend\Mvc\MvcEvent :: EVENT_DISPATCH_ERROR, array ($this, 'onRouteCheckForRedirect'), 999);
        
        
        
        
        
    } 
 
 
 
 
    
   public function onRouteCheckForRedirect(\Zend\Mvc\MvcEvent $e) {
       
       $uri = $e->getRequest()->getRequestUri();
       $uri = ltrim($uri, '/');
       $sm = $e->getApplication()->getServiceManager();
       try {
           
           
           //$a = new \Api\Url\Url();
           
           $model = new \Api\Model\Url($sm->get('Doctrine\ORM\EntityManager'));
           $url = $model->getOrigUriByTrimPath($uri);
           
           
       }
       catch (\Exception $ex) {
           return;
       }
       $locationHeader = new Location();
           $locationHeader->setUri($url);

           $headers = new Headers();
           $headers->addHeader($locationHeader);
           $response = new Response();
           $response->setHeaders($headers);
           $response->setStatusCode(302);
           $e->setResponse($response);
           $e->stopPropagation();
       
   }
   
    
    
   
   
}