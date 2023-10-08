@extends('backend.master')

@section('header-resources')
<link href="{{asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset("plugins/select2/css/select2.min.css") }}">

@endsection

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"> Product Create </h3>
    </div>


    <div class="card-body">
        <div class="row">
            
            @if (!isset($productList))
            <form action="{{route('product.create.post')}}" method="post" enctype="multipart/form-data" class="w-100">
                @csrf
                <div class="col-6">
                    <label for="">Title</label>
                    <input type="text" class="form-control" value="{{old('title')}}" placeholder="Enter title" name="title" />
                </div>
                <div class="col-6">
                    <label for="">Image</label>
                    <input type="file" class="form-control" value="{{old('image')}}" placeholder="" name="image" />
                </div>
                <div class="col-6">
                    <label for="">Category</label>
                    <input type="text" class="form-control" value="{{old('category')}}" placeholder="Category" name="category" />
                </div>
                <div class="col-6">
                    <label for="">Status</label>
                    <select name="status" placeholder="status" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
                <br> <label style="text-align: center;" for="">Variation</label>
                <div id="variations_container">
                    <div class="variation">
                        <div class="row">
                            <div class="col-4">
                                <label for="variation_name_1">Name:</label>
                                <input type="text" class="form-control" id="variation_name_1" name="variation_name[]" >
                            </div>
                            <div class="col-4">

                                <label for="variation_size_1">Size:</label>
                                <input type="text" id="variation_size_1" class="form-control" name="variation_size[]" >
                            </div>
                            <div class="col-4">

                                <label for="variation_id_1">ID:</label>
                                <input type="text" id="variation_id_1" class="form-control" name="variation_id[]" >
                            </div>
                        </div>

                    </div>
                </div>
                <button type="button" style="margin-top: 10px;" id="add_variation" class="btn btn-success">Add Variation</button><br><br>

                <div class="d-flex mt-4">
                    <button type="submit" class="btn border-0 px-3" style="background-color:blueviolet;color:white; margin-left:5px; border-radius:9px;">Save</button>
                </div>
            </form>
            @else
            <form action="{{route('product.edit.post',$productList->id)}}" method="post" enctype="multipart/form-data" class="w-100">
                @csrf
                <div class="col-6">
                    <label for="">Title</label>
                    <input type="text" class="form-control" value="{{$productList->title}}" placeholder="Enter title" name="title" />
                </div>
                <div class="col-6">
                    <label for="">Image</label>
                    <input type="file" class="form-control" value="{{$productList->title}}" placeholder="" name="image" />
                </div>
                <div class="col-6">
                    <label for="">Category</label>
                    <input type="text" class="form-control" value="{{$productList->title}}" placeholder="Category" name="category" />
                </div>
                <div class="col-6">
                    <label for="">Status</label>
                    <select name="status" placeholder="status" value="{{$productList->title}}" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
                <br>
                <label style="text-align: center;" for="">Variation</label>
                @foreach($variations as $variation)

                <div id="variations_container">
                    <div class="variation">

                        <div class="row">
                            <div class="col-4">
                                <label for="variation_name_1">Name:</label>
                                <input type="text" class="form-control" id="variation_name_1" value="{{$variation->name}}" name="variation_name[]" required>
                            </div>
                            <div class="col-4">

                                <label for="variation_size_1">Size:</label>
                                <input type="text" id="variation_size_1" class="form-control" value="{{$variation->size}}" name="variation_size[]" required>
                            </div>
                            <div class="col-4">

                                <label for="variation_id_1">ID:</label>
                                <input type="text" id="variation_id_1" class="form-control" value="{{$variation->id_code}}" name="variation_id[]" required>
                            </div>
                        </div>

                    </div>
                </div>
                 @endforeach
                <button type="button" style="margin-top: 10px;" id="add_variation" class="btn btn-success">Add Variation</button><br><br>

                <div class="d-flex mt-4">
                    <button type="submit" class="btn border-0 px-3" style="background-color:blueviolet;color:white; margin-left:5px; border-radius:9px;">Save</button>
                </div>
            </form>
            @endif
        </div>
    </div>


    @section('script')

    <script type="text/javascript" src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script>
        $("#form_id").validate({
            errorPlacement: function() {
                return true;
            }
        });
        document.getElementById("add_variation").addEventListener("click", function() {
            var variationsContainer = document.getElementById("variations_container");
            var newVariation = document.createElement("div");
            newVariation.classList.add("variation");
            newVariation.innerHTML = `
            <div class="row">
            <div class="col-4">
                <label for="variation_name[]">Name:</label>
                <input type="text" class="form-control" name="variation_name[]" required>
                </div>
                <div class="col-4">
                <label for="variation_size">Size:</label>
                <input type="text" class="form-control" name="variation_size[]" required>
                </div>
                <div class="col-4">
                <label for="variation_id">ID:</label>
                <input type="text"class="form-control" name="variation_id[]" required>
                </div>
                </div>
            `;
            variationsContainer.appendChild(newVariation);
        });
    </script>
    @endsection
    @endsection