@extends('layouts.app')

@section('content')
<h2>Создание товара</h2>
@include('products.form', ['action' => route('products.store'), 'method' => 'POST', 'product' => null])
@endsection
