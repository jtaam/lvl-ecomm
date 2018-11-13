@extends('layouts.main')

@section('title','Cart')

@push('css')

@endpush

@section('content')
    <div class="container">
        <div class="row">
            <h3>Cart Items</h3>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td>{{$cartItem->name}}</td>
                        <td>{{$cartItem->price}}</td>
                        <td width="50px">
                            {!! Form::open(['route' => ['cart.update',$cartItem->rowId], 'method' => 'PUT']) !!}
                                <input name="quantity" type="text" value="{{$cartItem->qty}}">
                                <input type="submit" class="btn btn-sm btn-success" value="Ok">
                            {!! Form::close() !!}
                        </td>
                        <td>{{$cartItem->options->has('size')? $cartItem->options->size:''}}</td>
                        <td>
                            <form action="{{route('cart.destroy',$cartItem->rowId)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="submit" class="button" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td></td>
                    <td>
                        Tax: ${{Cart::tax()}} <br/>
                        SubTotal: ${{Cart::subtotal()}} <br/>
                        Grand Total: ${{Cart::total()}}
                    </td>
                    <td>{{Cart::count()}}</td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>

            <a href="#" class="button">Checkout</a>
        </div>
    </div>
@endsection

@push('js')

@endpush