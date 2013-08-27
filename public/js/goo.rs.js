$(document).ready(function(){
                
    var defaultValue = $("#longurl").val();
    
    $("#longurl").on("click", function(){
    
        var actualValue = $(this).val();
        
        if (actualValue == defaultValue) {
        
            $(this).val('');
            
        }
        
    });
               
    
    $("#longurl").on("blur",function() {
               
    
        var actualValue = $(this).val();
        
        if (!actualValue) {
        
            $(this).val(defaultValue);
            
        }
        
    });
                
    
    $(".make-it-short").on("click", function(){
    
        $('<img src="/img/loading.gif" width="22" height="22" alt="Making link in progress" title="Making link in progress" valign="middle" style="vertical-align: middle; display: block; margin-top: -1px; float: left; margin-right: 10px;" />').prependTo($(".short-link"));
        
        $.post("/api/make-short-url", {url : $("#longurl").val(), human: $(".human").is(':checked') ? 1 : 0 }, function(response){
        
            var obj = jQuery.parseJSON(response);
            $(".short-link").find("img").remove();            
            if(obj.short_url == 0){
            
                
                
                $(".invalid").remove();
                
                $('<span style="float: right;" class="invalid">Url invalid.</span>').appendTo($(".short-link"));
                
            }
            
            else{
            
                
                $(".short-link span").text("http://goo.rs/"+obj.short_url);
                
            }
            
        });
        
    });
    
    
});