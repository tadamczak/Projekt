$(function() {
    $( "#datepicker" ).datepicker({dateFormat:"dd/mm/yy"}).datepicker("setDate",new Date());
    
    $('#add_post').submit (function() {
        if($.trim($('#news_title').val()) == ''){
            alert('You must enter title!');
            return false;
        }
        
        if($.trim($('#news_content').val()) == ''){
            alert('You must enter content!');
            return false;
        }
        
        if($.trim($('#datepicker').val()) == ''){
            alert('You must enter time!');
            return false;
        }
        
    });
    
    
 });
