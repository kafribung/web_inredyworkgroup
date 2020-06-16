@extends('layouts.master')
@section('title', 'Create User-Anggota |  INR Workgroup')
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
                            <strong class="card-title">Tambah User / Anggota</strong>
                        </div>
                        <div class="card-body">
                            <form action="/user" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nir" class="control-label mb-1">NIR</label>
                                    <input id="nir" name="nir" type="number" class="form-control @error('nir') is-invalid @enderror" autofocus required autocomplete="off" value="{{old('nir')}}">

                                    @error('nir')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Nama</label>
                                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"  required autocomplete="off" value="{{old('name')}}">

                                    @error('name')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email</label>
                                    <input id="email" name="email" email="email" class="form-control @error('email') is-invalid @enderror"  required autocomplete="off" value="{{old('email')}}">

                                    @if ($errors->has('email'))
                                        <p class="alert alert-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="hp" class="control-label mb-1">HP</label>
                                    <input id="hp" name="hp" type="number" class="form-control @error('hp') is-invalid @enderror" autofocus required autocomplete="off" value="{{old('hp')}}">

                                    @error('hp')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label mb-1">Password</label>
                                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror"  required autocomplete="off" value="{{old('password')}}">

                                    @error('password')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="job" class="control-label mb-1">Pekerjaan</label>
                                    <input id="job" name="job" type="text" class="form-control @error('job') is-invalid @enderror"  required autocomplete="off" value="{{old('job')}}">

                                    @error('job')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="position" class="control-label mb-1">Jabatan</label>
                                    <select id="position" name="position" class="form-control @error('position') is-invalid @enderror">
                                        <option value="">Anggota</option>
                                    </select>

                                    @error('position')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="concentration" class="control-label mb-1">Konsentrasi</label>
                                    <select id="concentration" name="concentration" class="form-control @error('concentration') is-invalid @enderror">
                                        <option value="">Tets</option>
                                    </select>

                                    @error('concentration')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address" class="control-label mb-1">Alamat</label>
                                    <textarea id="address" name="address"  class="form-control @error('address') is-invalid @enderror"  required autocomplete="off" ></textarea>

                                    @error('address')
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

