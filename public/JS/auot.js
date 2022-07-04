$(document).ready(function() {
    $( "#nis" ).autocomplete({

        source: function(request, response) {
            $.ajax({
            url: siteUrl + '/' +"auto-search",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.name;
               });

               response(resp);
            }
        });
    },
    minLength: 2
 });
});
