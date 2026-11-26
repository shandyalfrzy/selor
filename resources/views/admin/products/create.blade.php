@extends('layouts.admin')

@section('title', 'Add product — SÉLOR Admin')
@section('heading', 'Add new product')
@section('description', 'Add a piece to the SÉLOR catalogue.')

@section('content')
    @include('admin.products._form', [
        'product' => null,
        'categories' => $categories,
        'action' => route('admin.products.store'),
        'method' => 'POST',
        'submitLabel' => 'Create product',
    ])
@endsection
