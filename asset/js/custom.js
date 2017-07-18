var MIN_LENGTH = 3;

jQuery(document).ready(function($){
    $('#ns_product_list_id_free').hide();

    $("#ns_s_free").keyup(function() {
      ns_search_controller_free();  

      
    });

    if($("#ns_s_widget_free").length){
        $("#ns_s_widget_free").keyup(function() {
          ns_search_controller_widget_free();  

        });
    }

  

function ns_search_controller_free(){
  var foobarid = $("#ns_s_free").val();
    if (foobarid.length >= MIN_LENGTH) {
      jQuery.post(
          ns_ajaxSearch_object_free.ajaxurl, 
          {
              'action': 'add_foobar',
              'data':   foobarid,              
          },     
          function(response, data){
              //alert('The server responded: ' + response);
              //console.log('data ' + data);
              //console.log('response ' + response);
                $('#ns_product_list_id_free').show();
                $('#ns_product_list_id_free').html(response);
                $('.ns-productsearch-boxclose-free').click(function(){
                $(this).parent().parent().slideUp('slow');
                return false;
              });

            
 
          }
      );
    }
    
}

function ns_search_controller_widget_free(){
  var foobarid = $("#ns_s_widget_free").val();
    if (foobarid.length >= MIN_LENGTH) {
      jQuery.post(
          ns_ajaxSearch_object_free.ajaxurl, 
          {
              'action': 'add_foobar',
              'data':   foobarid,              
          },     
          function(response, data){
              //alert('The server responded: ' + response);
              //console.log('data ' + data);
              //console.log('response ' + response);
                $('#ns_product_list_id_widget_free').show();
                $('#ns_product_list_id_widget_free').html(response);
                $('.ns-productsearch-boxclose-free').click(function(){
                $(this).parent().parent().slideUp('slow');
                  return false;
              });
 
          }
      );
    }


}

// set_item : this function will be executed when we select an item
function set_item_free(item) {
  // change input value
  $('#ns_s_free').val(item);
  // hide proposition list
  $('#ns_product_list_id_free').hide();
}



});

