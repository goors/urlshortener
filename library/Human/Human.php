<?php


/**
 * returns tf-idf value form text
 *
 * @author Nikola Derikonjic
 */
namespace Api\Human;

class Human {
    
    public static function getKeyword($url){
        
        
        exec("/usr/bin/lynx -accept_all_cookies -dump ".$url." > ".__DIR__."/../../data/logs/human");
        
        $handle = fopen(__DIR__."/../../data/logs/human", "r");
        $text = fread($handle, filesize(__DIR__."/../../data/logs/human"));
        
        
        $text = explode(" ",$text);
            
        
        foreach ($text as $key => $word ) {
        
            if (strlen($word) >=5 && strlen($word)<8) {
            
                $words[] = $word;
                
                
            }
        }
            
        $count = array_count_values($words);

        array_multisort($count,SORT_DESC);
        
        $reci = array();
        
        foreach ($count as $key => $value) {
        
            if(!empty($key)){
            
                array_push($reci, array($key=>$value/count($text)));
                    
               }
               
       }
       
       foreach (max($reci) as $key=>$val){
            
            return strtolower($key);
       }
    }
}

?>
