@extends('admin.layout.admin')

@section('title','Orders')

@push('css')

@endpush

@section('content')
    <h3>Orders</h3>
    @foreach($orders as $order)
        <h4>Orders by: {{$order->user->name}} </h4>
        <h5>Total price: {{$order->total}}</h5>

        <form action="{{route('toggle.deliver',$order->id)}}" method="post" class="pull-right">
            {{csrf_field()}}
            <label for="delivered">Delivered</label>
            <input type="checkbox" value="1" name="delivered" {{$order->delivered == 1 ? "checked":""}} />
            <input type="submit" value="Submit" class="btn btn-sm">
        </form>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->pivot->qty}}</td>
                    <td>{{$item->pivot->total}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
@endsection

@push('js')

@endpush