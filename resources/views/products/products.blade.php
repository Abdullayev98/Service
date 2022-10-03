@extends('layouts.layout')
@section('content')
<body >
    <div class="container">
        <div class="row">
            <div class="com-md-2"></div>
            <div class="com-md-8">
                <h2 class="my-3 text-center">List of Products</h2>
                <a href="" type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#addModal">
                    Add product
                </a>
                <div class="table-data">
                    <table class="table table-bordered border border-5 border-primary">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">image</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>
                                <a href="#" class="btn btn-success ps-3"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#" class="btn btn-danger "><i class="fa-solid fa-trash"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    @include('products.productjs')
    @include('products.modal')
</body>
@endsection