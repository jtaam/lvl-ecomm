@extends('admin.layout.admin')

@section('title','Product')

@push('css')

@endpush

@section('content')
    <h3>Products</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Size</th>
                <th>Price($)</th>
            </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->size}}</td>
                <td>{{$product->price}}</td>
            </tr>
        @empty
            <h3>No products</h3>
        @endforelse

        </tbody>

    </table>

@endsection

@push('js')

@endpush