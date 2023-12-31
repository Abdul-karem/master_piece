@extends('Admin.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-pencil" aria-hidden="true"></i> Edit service </h3>
            <form action="{{ route('offices.update', $office->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label"><i class="fa fa-font" aria-hidden="true"></i> Name :</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $office->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label"><i class="fa fa-money" aria-hidden="true"></i> Price :</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $office->price }}" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label"><i class="fa fa-map-marker" aria-hidden="true"></i> Location :</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ $office->location }}" required>
                </div>
                <div class="mb-3">
                    <label for="details" class="form-label"><i class="fa fa-info" aria-hidden="true"></i> Details :</label>
                    <textarea class="form-control" id="details" name="details" required>{{ $office->details }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label"><i class="fa fa-image" aria-hidden="true"></i> Image :</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-custom"  style=" background-color:#ffe468  ; color:#8cc641 " ><i class="fa fa-check" aria-hidden="true"></i> Update</button>
            </form>
        </div>
    </div>
</div>
@endsection