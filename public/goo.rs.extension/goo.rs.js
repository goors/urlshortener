//process url
        function shortenUrl(url){
            $("#short-message").text('Shortening ...');
            if($.cookie("make_human_url") == '1'){
                var human = 1;
            }
            else{
                var human = 0;
            }
            $.post('http://goo.rs/api/make-short-url', {url: url, human: human},function(response){
                var obj = jQuery.parseJSON(response);
                $("#short-message").text('Your short url is: ');
                $("#short_url").val("http://goo.rs/"+obj.short_url).select();
                if($.client.os == 'Mac'){
                    $("#copy_message_chrome").text($("#mac_copy").val()).show();
                }
                else if($.client.os == 'Windows'){
                    $("#copy_message_chrome").text($("#windows_copy").val()).show();
                }
                else{
                    $("#copy_message_chrome").text($("#other_copy").val()).show();
                }
                $("<br /><a href='http://goo.rs/"+obj.short_url+"' target='_blank' class='open_url'>Open url.</a>").appendTo($("#short-url-action"));
            });
        }
        
        
        $(document).ready(function(){
            chrome.tabs.getSelected(null, function(tab) {
                var url = tab.url;
                console.log(url);
                
                
                
                
                
                shortenUrl(url);
            });
        });