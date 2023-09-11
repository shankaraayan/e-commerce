 <script>
        function add_to_cart(id) {
          $.ajax({
              type: 'post',
              url: '<?php echo e(url("/add-to-cart")); ?>',
              data: {
                  "_token": "<?php echo e(csrf_token()); ?>",
                  "id": id
              },
              success: function(response) {
                  response = JSON.parse(response);
                  if (response.status == true) {
                      $(".my_cart_count").text(response.data);
                      flasher.success(response.message)
                   
                  } else {
                    flasher.error(response.message);
                   
                  }
  
              }
          });
  
      }
  
      function add_to_wishlist(id) {
          $.ajax({
              type: 'post',
              url: '<?php echo e(url("/add_to_wishlist")); ?>',
              data: {
                  "_token": "<?php echo e(csrf_token()); ?>",
                  "id": id
              },
              success: function(response) {
                  response = JSON.parse(response);
                  if (response.status == true) {
                      $("#session_value_count").text(response.data);
                      flasher.success(response.message);
                    
                  } else {
                    flasher.warning("Etwas ist schief gelaufen");
                    
                  }
  
              }
          });
  
      }
  </script><?php /**PATH /home/customstegpearl/public_html/root/resources/views/elements/add_to_cart.blade.php ENDPATH**/ ?>