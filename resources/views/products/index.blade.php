@extends('adminlte::page')


@section('title', 'Products')

@section('content_header')
    <h1>Products</h1>
@stop

@section('content')


    <a href="products/create" class="btn btn-primary mb-4">CREATE</a>

    <table id="products" class="table table-striped mt-4 shadow-lg" style="width:100%" ">
        <thead class="bg-primary text-white">
            <th scope="col">ID</th>
            <th scope="col">Code</th>
            <th scope="col">Description</th>
            <th scrop="col">Actions</th>
            </thead>

        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id}}</td>
                <td>{{ $product->code}}</td>
                <td>{{ $product->description}}</td>
                <td>
                    <form action="{{route ('products.destroy', $product->id) }}" method="POST">
                    <a href="/products/{{$product->id}}/edit" class="btn btn-info"> Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#products').DataTable({
                "lengthMenu":[[10,20,50,-1], [10,20,50,"All"]]
            });
        } );
    </script>
@stop

