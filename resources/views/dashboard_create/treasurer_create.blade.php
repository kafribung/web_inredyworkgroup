@extends('layouts.master')
@section('title', 'Create Bendahara | INR Workgroup')
@section('content')

<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">

        @if (session('msg'))
            <p class="alert alert-info">{{session('msg')}}</p>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card-body ">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tambah Data Bendahara</strong>
                        </div>
                        <div class="card-body">
                            <form action="/treasurer" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="img" class="control-label mb-1">Foto</label>
                                    <input id="img" name="img" type="file" accept="image/*" class="form-control @error('img') is-invalid @enderror" autofocus ">

                                    @error('img')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Nama</label>
                                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"   autocomplete="off" value="{{old('name')}}">

                                    @error('name')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email</label>
                                    <input id="email" name="email" email="email" class="form-control @error('email') is-invalid @enderror"   autocomplete="off" value="{{old('email')}}">

                                    @if ($errors->has('email'))
                                        <p class="alert alert-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label mb-1">Password</label>
                                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror"   autocomplete="off" value="{{old('password')}}">

                                    @error('password')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-info btn-block">Tambahkan</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /#add-category -->
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
    
@endsection

