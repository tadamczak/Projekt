$(function() {
    
    $.get('dashboard/xhrGetListings', function(o) {
        
        for (var i = 0; i < o.length; i++)
        {
            $('#listInserts').append('<div><div>' + o[i].text + '</div><div class="dashboard_info"><hr />~Posted by ' + o[i].user + '<br /><a class="del" rel="'+o[i].id+'" href="#"> Delete</a></div></div><br /><br />');
        }
        
        $(document).on("click", ".del", function() {

            var id = $(this).attr('rel');
            delItem = $(this);

            $.post("dashboard/xhrDeleteListing", {"id": id}, function (o) {
                delItem.parent().parent().remove();
            });
         });﻿﻿﻿
        
    }, 'json');
    
    
    
    $('#randomInsert').submit(function() {
        var url = $(this).attr('action');
        var data = $(this).serialize();
        
        $.post(url, data, function(o) {
            $('#listInserts').append('<div><div>' + o.text + '</div><div class="dashboard_info"><hr />~Posted by ' + o.user + '<br /><a class="del" rel="'+ o.id +'" href="#"> Delete</a></div></div><br /><br />');        
        }, 'json');
        
        
        return false;
    });

});