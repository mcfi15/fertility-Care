@extends('layouts.admin')

@section('title', 'All Products')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
        <h3 class="fw-bold mb-3">Products</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
            <a href="{{ url('admin/dashboard') }}">
                <i class="icon-home"></i>
            </a>
            </li>
            <li class="separator">
            <i class="icon-arrow-right"></i>
            </li>

            
            
            <li class="nav-item">
            <a href="#">Products</a>
            </li>
        </ul>
        </div>
        <div class="row">

        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">Products</h4>
                <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-round ms-auto">
                    <i class="fa fa-plus"></i>
                    Add New
                </a>
                </div>
            </div>
            <div class="card-body">
                @include('layouts.alert.msg')
                <div class="table-responsive">
                <table id="" class="display table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Product ID</th>
                        <th>Category</th>
                        <th>Featured Image</th>
                        <th>Price (&#x52;)</th>
                        <th>Status</th>
                        <th style="width: 10%">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>

                    @forelse ($products as $product)    
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td><img src="{{ asset("$product->image") }}" alt="" width="50" height="50"></td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->status == '1' ? 'Hidden':'Visible'}}</td>
                        <td>
                        <div class="form-button-action">
                            <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                            <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ url('admin/products/'.$product->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-link btn-danger" data-original-title="Remove">
                            <i class="fa fa-times"></i>
                            </a>
                        </div>
                        </td>
                    </tr>
                    @empty

                    <tr>
                        <td colspan="5">No Product Details Found</td>
                    </tr>
                        
                    @endforelse
                    
                    
                    </tbody>
                </table>
                </div>
                {{ $products->links() }}
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection