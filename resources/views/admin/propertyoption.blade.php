@extends('admin.dashboard')

@section('content')
    <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-6">
        <a href="{{ route('admin.property.create') }}">Add Property</a>
    </x-button>
    <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-6">
        <a href="{{ route('admin.property.show') }}">View All Property</a>
    </x-button>

    <div id="selection">
        @yield('selection')
    </div>
@endsection
