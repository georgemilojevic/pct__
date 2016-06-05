<script type="text/javascript" src="//code.jquery.com/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search_keyword").keyup(function() 
{ 
    var search_keyword_value = $(this).val();
    var dataString = 'search_keyword='+ search_keyword_value;
    if(search_keyword_value!='')
    {
        $.ajax({
            type: "POST",
            url: "index.php",
            data: dataString,
            cache: false,
            success: function(html)
                {
                    $("#result").html(html).show();
                }
        });
    }
    return false;    
});
 
$("#result").live("click",function(e){
    var $clicked = $(e.target);
    var $name = $clicked.find('.country_name').html();	
    var decoded = $("<div/>").html($name).text();
    $('#search_keyword_id').val(decoded);
});
 
$(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search_keyword")){
        $("#result").fadeOut(); 
    }
});
 
$('#search_keyword_id').click(function(){
    $("#result").fadeIn();
});
});
</script>