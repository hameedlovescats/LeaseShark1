<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-6">
        <a href="{{ route('admin.user') }}">All Users</a>
    </x-button>

    <div id="details" class="mx-3">
        @yield('content')
    </div>

</x-app-layout>
