@extends('layouts.admin')

@section('title', 'Add category — SÉLOR Admin')
@section('heading', 'Add category')
@section('description', 'Create a collection for your product catalogue.')

@section('content')
    @include('admin.categories._form', [
        'category' => null,
        'action' => route('admin.categories.store'),
        'method' => 'POST',
        'submitLabel' => 'Create category',
    ])
@endsection
