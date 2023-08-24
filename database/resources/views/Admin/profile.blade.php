@extends('Admin.layouts.master')

@section('content')

    <div class="container mt-5 mb-5">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                  
                                        @if($user->image)
                                        {{-- <img src="{{ asset('image/'. $user->image) }}" alt="Admin Image"> --}}
                                        <img src="{{ asset('assit-user/images/'. $user->image) }}" alt="Admin Image">

                                        @else
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                                        @endif
                                </div>
                                <br><br>
                                <h5 class="user-name">{{$user->name}}</h5>
                                <h6 class="user-email">{{$user->email}}</h6>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form action="{{ route('Adminprofile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 " >Personal Details ....</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Full Name :</label>
                                        <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter full name" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email :</label>
                                        <input type="email" class="form-control" id="eMail" name="email" placeholder="Enter email ID" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone :</label>
                                        <input type="text" class="form-control" id="phone" name="mobile" placeholder="Enter phone number" value="{{$user->mobile}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website">Password :</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter the correct password">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label"><i class="fa fa-image" aria-hidden="true"></i> Image :</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" value="{{$user->image}}">
                                        <label class="custom-file-label" for="image"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Choose File </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <a href="{{route('admin.index2')}}"><button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button></a>
                                        <button type="submit" id="submit" name="submit" class="btn btn-custom " style="background-color:#ffe468 ; color: #8cc641 "  >Update </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
