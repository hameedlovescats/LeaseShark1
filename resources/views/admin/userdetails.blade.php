@extends('admin.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                @foreach($users as $user)
                                    <div class="p-6">
                                        <p><strong>Name:</strong> {{ $user->name }}</p>
                                        <p><strong>Email:</strong> {{ $user->email }}</p>
                                        <p><strong>Created At:</strong> {{ $user->created_at }}</p>
                                        <p><strong>Role:</strong> {{ $user->type }}</p>
                                        <p><strong>Updated At:</strong> {{ $user->updated_at }}</p>
                                        <div class="flex">
                                            <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-6">
                                                <a href="{{ route('admin.user.edit', $user->id) }}">Edit</a>
                                            </x-button>

                                                <form action="{{route('admin.user.delete', [$user->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-6">
                                                    <a type="submit">Delete</a>
                                                    </x-button>
                                                </form>

                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
