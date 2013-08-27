<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    
    
    
    public function indexAction()
    {
        
        //die($this->params()->fromRoute());
         //$Uri = $e-> getRequest () -> getRequestUri ();
         //echo $this->getRespons
        //return new ViewModel(array("res"=>"sasasa"));
        //$this->_view = new ViewModel();

        // in your initialize values method
        //$this->_view->setVariable("hello", "cao sta ima");
        
        /*$view = new ViewModel();
        
        //$view->
        
        
        $objectManager = $this
        ->getServiceLocator()
        ->get('Doctrine\ORM\EntityManager');

    $user = new \Application\Entity\User();
    $user->setFullName('Marco Pivetta');

    $objectManager->persist($user);
    $objectManager->flush();

    //die(var_dump($user->getId())); // yes, I'm lazy
        
        
        
        
        
        $view->setVariable("user", $user->getUser());
        return $view;
        
        
        
        */
        
        
        
       //var_dump($this->getRequest());
        
    }
    
    
    public function humanReadableAction(){
        
    }
}
