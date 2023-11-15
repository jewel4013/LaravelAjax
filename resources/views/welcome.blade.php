<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="my-2 text-center">Laravel Ajax Practice</h1>
                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">Add a product</a>
                <input type="text" class="form-control my-2" id="search" name="search" placeholder="Search product">
                <div class="table-data">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key=>$product)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <a href=""
                                            class="btn btn-success btn-sm update_product_form"
                                            data-bs-toggle="modal"
                                            data-bs-target="#updateProductModal"
                                            data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}"
                                            data-price="{{ $product->price }}"
                                            >
                                            <i class="las la-edit"></i>
                                        </a>
                                        <a href=""
                                            class="btn btn-danger btn-sm delete_product"
                                            data-id="{{ $product->id }}"
                                            >
                                            <i class="las la-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $products->links() !!}

                        {{-- <span class="pro_link">
                            {!! $products->links() !!}
                        </span> --}}
                </div>
            </div>
        </div>
    </div>

    @include('productModel')
    @include('updateProductModel')
    @include('ajaxPart')

    {{-- {!! Toastr::message() !!} --}}
  </body>
</html>
