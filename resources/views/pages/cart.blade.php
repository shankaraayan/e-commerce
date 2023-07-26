@extends('../Layout.Layout')

@section('content')
    <!--------------- Cart Page HTML Start ------------------------->
    <div class="ps-shopping">
        <div class="container">
            <ul class="ps-breadcrumb">
                <li class="ps-breadcrumb__item"><a href="{{route('homepage')}}">Home</a></li>
                <li class="ps-breadcrumb__item active" aria-current="page">Einkaufskorb</li>
            </ul>
            <div class="container" id="cart_data">
                @include('elements.cart_data')
            </div>
        </div>
    </div>
    <script>
        function update_to_cart(id) {
            var qty = $("#qty" + id).val();
            $.ajax({
                url: "update_cart_value",
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "quantity": qty
                },
                dataType: 'html',
                success: function(text) {
                    $('#cart_data').html(text);
                }
            })
        }

        function remove_to_cart(id) {
            var check = confirm("Are you sure you want to remove to cart ?");
            if (check == false) {
                return false;
            }
            $.ajax({
                url: "remove_to_cart",
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                },
                dataType: 'html',
                success: function(text) {
                    $('#cart_data').html(text);
                }
            })
        }

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        function QtyUpdate(id, type) {
            var qty = $("#qty" + id).val();
            qty = parseInt(qty);
            if (type == 1) {
                $("#qty" + id).val(qty + 1);
            } else {
                if (qty > 1)
                    $("#qty" + id).val(qty - 1);
            }
            update_to_cart(id);
        }
    </script>
    <!--------------- Cart Page HTML End ------------------------->
@endsection
