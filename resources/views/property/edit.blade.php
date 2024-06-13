@extends('admin.propertyoption')

@section('selection')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('admin.property.update', $properties->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Property Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $properties->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Price</label>
                                        <input type="text" class="form-control" id="email" name="price" value="{{ $properties->price }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Location</label>
                                        <input type="text" class="form-control" id="location" name="location" value="{{$properties->location}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Listed For</label>
                                        <select name="listedFor" id="role" class="form-control">
                                            <option value="Sell" {{ $properties->listedFor == 'Sell' ? 'selected' : '' }}>Sell</option>
                                            <option value="Lease" {{ $properties->listedFor == 'Lease' ? 'selected' : '' }}>Lease</option>
                                        </select>
                                    </div>
                                    <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-6">
                                    <a type="submit" class="btn btn-primary">Update</a>
                                    </x-button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
