@extends('admin.layout.admin')

@section('title','Category')

@push('css')

@endpush

@section('content')

    <div class="navbar">
        <a href="#" class="navbar-brand">Categories</a>

        <ul class="nav navbar-nav">
            @if(!empty($categories))
                @forelse($categories as $category)
                    <li>
                        <a href="{{route('category.show',$category->id)}}">{{$category->name}}</a>
                    </li>
                @empty
                    <li>No data</li>
                @endforelse
            @endif
        </ul>

        <a class="btn btn-primary pull-right navbar-right" data-toggle="modal" href="#category">Add Category</a>
        <div class="modal fade" id="category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add New</h4>
                    </div>
                    {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
                    <div class="modal-body">
                        <div class="form-group">
                            {{ Form::label('name', 'Title') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    {!! Form::close() !!}
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>

    {{--products--}}
    @if(isset($products))

        <h3>Products</h3>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Products</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                </tr>
            @empty
                <tr>
                    <td>no data</td>
                </tr>
            @endforelse

            </tbody>
        </table>
    @endif

@endsection

@push('js')

@endpush