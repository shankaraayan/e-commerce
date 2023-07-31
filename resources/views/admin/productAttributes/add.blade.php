@extends('admin.layout.header')

@section('content')

<style>
  .gaps-6 {
    gap: 6.5rem;
  }

  .text-danger {
    color: red;
  }
</style>
<div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
  <div class="page-content">
    <div class="transition-all duration-150 container-fluid" id="page_layout">
      <div id="content_layout">

        <!-- BEGIN: Breadcrumb -->
        <div class="mb-5">
          <ul class="m-0 p-0 list-none">
            <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
              <a href="{{route('admin')}}">
                <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                <iconify-icon icon="heroicons-outline:chevron-right"
                  class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
              </a>
            </li>
           <a href="{{route('admin')}}">
           <li class="inline-block relative text-sm text-primary-500 font-Inter ">
              Dashboard
              <iconify-icon icon="heroicons-outline:chevron-right"
                class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
            </li></a>
            <a href="{{route('admin.product.attribute.list')}}">
            <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
              Attributes
              <iconify-icon icon="heroicons-outline:chevron-right"
                class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
              </li>
              </a>
               <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
              Add Attribute</li>
          </ul>
        </div>
        <!-- END: BreadCrumb -->

        <div class="grid xl:grid-cols-1 grid-cols-1">
          <!-- Basic Inputs -->
          <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">Attribute List</h4>
                <button class="btn inline-flex justify-center bg-slate-800 text-white" data-bs-toggle="modal" data-bs-target="#vertically_center" type="button">
                    Add Attribute Type
                </button>

              </header>
            <div class="card-body flex flex-col p-6">

              <form action="{{route('admin.product.attribute.store')}}" method="post" >
                @csrf
                <div class="card-text h-full space-y-4">
                  <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                  <div class="input-area">
                    <label for="name" class="form-label">Attribute Name*</label>
                    <input id="name" name="attribute_name" type="text" class="form-control" placeholder="Attribute Name">
                    @if ($errors->has('attribute_name'))
                    <span class="text-danger">{{ $errors->first('attribute_name') }}</span>
                    @endif
                  </div>

                  <div class="input-area">
                    <label for="description" class="form-label">Select Attribute Type*</label>
                    <select id="select" name="attribute_type" class="form-control">
                      <option class="dark:bg-slate-700">Select</option>
                      @foreach($attributeTypes as $value)
                      <option value="{{$value->name}}" class="dark:bg-slate-700">{{$value->name}}</option>
                      @endforeach


                    </select>
                  </div>

                  </div>

                  <div class="input-area">
                    <label for="description" class="form-label">Attribute Description*</label>
                    <textarea id="description" name="attribute_description" rows="5" class="form-control"
                      placeholder="Type Here"></textarea>
                    @if ($errors->has('attribute_description'))
                    <span class="text-danger">{{ $errors->first('attribute_description') }}</span>
                    @endif
                  </div>

                  <div class="input-area mb-5">
                        <label for="description" class="form-label">Status</label>
                        <div class="flex items-center mr-2 sm:mr-4 mt-2 space-x-2">
                            <label class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                            <input onclick="this.checked ? this.value=1 : this.value=0" name="status"  type="checkbox"  class="sr-only peer">

                            <div class="w-14 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:z-10 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-500">

                            </div>
                            </label>

                        </div>
                  </div>

                  <div class="input-area">
                    <button class="btn inline-flex justify-center bg-slate-800 text-white"
                      style="float:right; margin-top:15px;">Submit</button>
                  </div>
                </div>

              </form>
            </div>
          </div>

          <!-- Formatter Support -->
          <div class="card xl:col-span-2 rounded-md bg-white dark:bg-slate-800 lg:h-full shadow-base">

          </div>
        </div>

      </div>
    </div>
  </div>
</div>


  {{-- model start --}}
  <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="vertically_center" tabindex="-1" aria-labelledby="vertically_center" aria-hidden="true">
    <div class="modal-dialog top-1/2 !-translate-y-1/2 relative w-auto pointer-events-none">
      <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
      rounded-md outline-none text-current">
        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-info-600">
            <h3 class="text-xl font-medium text-white dark:text-white capitalize">
              Add Or Update Attribute types
            </h3>
            <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                  dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
              <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                          11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <form id="attribute_type_form">
            @csrf
          <div class="p-6 space-y-4">
                <div class="input-area mb-4">
                    <label for="description" class="form-label">All Attibute Types</label>
                    <select  name="selected_attribute_type"  class="form-control selected_attribute_type">
                        <option class="dark:bg-slate-700">Choose attribute type</option>
                        @foreach($attributeTypes as $value)
                        <option value="{{$value->id}}" class="dark:bg-slate-700">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-area mb-4">
                    <label for="description" class="form-label">Create  or update attribute name *</label>
                    <input id="attribute_type_name" name="attribute_type_name" type="text" class="form-control" required placeholder="Attribute type name">
                </div>

          </div>
          <!-- Modal footer -->
          <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
            <button type="button"  data-bs-dismiss="modal"  class="btn inline-flex justify-center btn-danger rounded-[25px] rounded-full del-btn"  style="display: none">
                Delete
             </button>
            <button type="submit" id="createButton"  data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-info-600 create_btn">Create</button>
            <button type="submit" id="updateButton"  data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-green-500 create_btn" style="display:none">update</button>

          </div>
        </div>
      </div>
    </div>
  </div>
</form>
  {{-- model end --}}


<script>
    $(document).ready(function(){

        $(".selected_attribute_type").on('change',function(){
            var value = $(this).val();
            if(value == "Choose attribute type"){
                $("#createButton").css("display","block");
                $("#updateButton").css("display","none");
                $(".del-btn").css("display","none");
            }else{
                id = $(this).find(":selected").val();
                $("#attribute_type_name").val($(this).find(":selected").html());
                $("#createButton").css("display","none");
                $("#updateButton").css("display","block");
                $(".del-btn").css("display","block");

                $(".create_btn").html('Update');
            }
        });

        document.getElementById("updateButton").addEventListener("click", function(event) {
            event.preventDefault();
            const formData = new FormData(document.getElementById("attribute_type_form"));
            formData.append("id",id);
            $.ajax({
                url : '{{ route("admin.product.attribute.type.update") }}',
                type : 'POST',
                data : formData,
                processData : false,
                contentType : false,
                success : function(response){
                    window.location.reload();

                },
                error : function(error){
                    console.log(error);
                }
            });

        });

        $(".del-btn").on('click',function(){
            // delete type
            const con= confirm('Are you sure. you want to delete?');
            if(con){
                 $.ajax({
                url : '{{ route("admin.product.attribute.type.delete") }}',
                type : 'POST',
                data : {
                    "_token" : "{{ csrf_token() }}",
                    "id" : id
                },
                success : function(response){
                    window.location.reload();
                },
                error : function(error){
                    console.log(error);
                }
             });



            }

        });


        document.getElementById("createButton").addEventListener("click", function(event) {
          event.preventDefault();

            const formData = new FormData(document.getElementById("attribute_type_form"));
                // console.log("hellooo");
                    $.ajax({
                        url : '{{ route("admin.product.attribute.type.create") }}',
                        type : 'POST',
                        data : formData,
                        processData : false,
                        contentType : false,
                        success : function(response){
                            window.location.reload();
                        },
                        error : function(error){
                            console.log(error);
                        }
                    });

            });
    });

</script>

@endsection
