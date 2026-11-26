@extends('layouts.admin')

@section('title', 'Edit product — SÉLOR Admin')
@section('heading', 'Edit product')
@section('description', 'Update product details, availability, and imagery.')

@section('content')
    @include('admin.products._form', [
        'product' => $product,
        'categories' => $categories,
        'action' => route('admin.products.update', $product),
        'method' => 'PUT',
        'submitLabel' => 'Save changes',
    ])
@endsection
