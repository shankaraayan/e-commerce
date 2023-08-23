 <script>

     

        function add_to_cart(id) {
          $.ajax({
              type: 'post',
              url: '{{ url("/add-to-cart") }}',
              data: {
                  "_token": "{{ csrf_token() }}",
                  "id": id
              },
              success: function(response) {
                  response = JSON.parse(response);
                  if (response.status == true) {
                      $(".my_cart_count").text(response.data);
                      flasher.success(response.message);
                  } else {
                    flasher.success(response.message);
                  }
  
              }
          });
  
      }
  
      function add_to_wishlist(id) {
          $.ajax({
              type: 'post',
              url: '{{ url("/add_to_wishlist") }}',
              data: {
                  "_token": "{{ csrf_token() }}",
                  "id": id
              },
              success: function(response) {
                  response = JSON.parse(response);
                  if (response.status == true) {
                      $("#session_value_count").text(response.data);
                      flasher.success(response.message);
                  } else {
                    flasher.warning("Something went wrong");
                  }
  
              }
          });
  
      }
  </script>