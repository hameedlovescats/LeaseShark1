@extends('admin.propertyoption')

@section('selection')

<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('admin.property.store') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group m-2">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
                                        <small id="nameHelp" class="form-text text-muted">Name of the land</small>
                                    </div>
                                    <div class="form-group m-2">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control" name="price" id="price" aria-describedby="priceHelp">
                                        <small id="priceHelp" class="form-text text-muted">Listed Price Of the Property</small>
                                    </div>
                                    <div class="form-group m-2">
                                        <label for="listedFor">Listed For</label>
                                        <select name="listedFor">
                                            <option value="Sell">Sell</option>
                                            <option value="Lease">Lease</option>
                                        </select>
                                        <small id="listedForHelp" class="form-text text-muted">Listed For</small>
                                    </div>
                                    <div class="form-group m-2">
                                        <label for="location">Location</label>
                                        <input type="text" class="form-control" name="location" id="location" aria-describedby="locationHelp">
                                        <small id="locationHelp" class="form-text text-muted">Where is the property located</small>
                                    </div>
                                    <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-6">

                                    <a type="submit" class="btn btn-primary">Submit</a>
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
