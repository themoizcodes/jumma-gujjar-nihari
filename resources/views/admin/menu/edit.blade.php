@extends('admin.layout')

@section('title', 'Edit Food Item')

@section('content')

<h1 class="font-serif text-3xl text-cream mb-8">Edit Food Item</h1>

<form method="POST" action="{{ route('admin.menu.update', $menuItem) }}" enctype="multipart/form-data" class="card p-6 md:p-8 max-w-2xl reveal">
    @include('admin.menu._form')
</form>

@endsection
