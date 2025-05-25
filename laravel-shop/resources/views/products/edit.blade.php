@extends('layouts.app')

@section('content')
<h2>Редактирование товара</h2>
@include('products.form', ['action' => route('products.update', $product->id), 'method' => 'PUT', 'product' => $product])
@endsection
