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
                      flasher.success(response.message)
                    //   iziToast.success({
                    //     icon : 'fa fa-check-circle-o',
                    //     message: response.message,
                    //     position: 'topRight',
                    // });
                   
                  } else {
                    flasher.error(response.message);
                    // iziToast.error({
                    //     icon : 'fa fa-exclamation-circle',
                    //     position: 'topRight',
                    //     message: response.message,
                    //  });
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
                    //   iziToast.success({
                    //     icon : 'fa fa-check-circle-o',
                    //     message: response.message,
                    //     position: 'topRight',
                    // });
                  } else {
                    flasher.warning("Something went wrong");
                    // iziToast.error({
                    //     icon : 'fa fa-exclamation-circle',
                    //     position: 'topRight',
                    //     message: 'Something went wrong',
                    //  });
                  }
  
              }
          });
  
      }
  </script>