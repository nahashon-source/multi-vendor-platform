@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-8">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
    Vendor Dashboard
    </h1>   
    <p>Welcome , {{auth()->user()->name}}!</p>

</div>

@endsection