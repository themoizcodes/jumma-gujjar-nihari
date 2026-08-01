@extends('admin.layout')

@section('title', 'Add Food Item')

@section('content')

<h1 class="font-serif text-3xl text-cream mb-8">Add Food Item</h1>

<form method="POST" action="{{ route('admin.menu.store') }}" enctype="multipart/form-data" class="card p-6 md:p-8 max-w-2xl reveal">
    @php($menuItem = new \App\Models\MenuItem())
    @include('admin.menu._form')
</form>

@endsection
