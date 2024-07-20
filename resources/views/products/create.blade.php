@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <H2>CREATE STOCK ITEM</H2>

    <form action="/products" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Code </label>
            <input id="code" name="code" type="text" class="form-control" tabindex="1">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Description </label>
            <input id="description" name="description" type="text" class="form-control" tabindex="2">

        </div>

        <a href="/products" class="btn btn-secondary" tabindex="5"> Cancel </a>
        <button type="submit" class="btn btn-primary" tabindex="4"> Save </button>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

