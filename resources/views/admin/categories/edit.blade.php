@extends('layouts.admin')

@section('title', 'Edit category — SÉLOR Admin')
@section('heading', 'Edit category')
@section('description', 'Update the collection name and details.')

@section('content')
    @include('admin.categories._form', [
        'category' => $category,
        'action' => route('admin.categories.update', $category),
        'method' => 'PUT',
        'submitLabel' => 'Save changes',
    ])
@endsection
