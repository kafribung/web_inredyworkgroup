@extends('layouts.master')
@section('title', 'Edit User-Anggota |  INR Workgroup')
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
                            <strong class="card-title">Edit User / Anggota</strong>
                        </div>
                        <div class="card-body">
                            <form action="/user/{{$user->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="img" class="control-label mb-1">Foto</label>
                                    <img src="{{url($user->img)}}" alt="Foto {{$user->name}}" title="Foto {{$user->name}}" width="100" height="100">
                                    <input id="img" name="img" type="file" accept="image/*" class="form-control @error('img') is-invalid @enderror" autofocus ">

                                    @error('img')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nir" class="control-label mb-1">NIR</label>
                                    <input id="nir" name="nir" type="number" class="form-control @error('nir') is-invalid @enderror"   autocomplete="off" value="{{old('nir') ? old('nir') : $user->nir}}">

                                    @error('nir')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Nama</label>
                                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"   autocomplete="off" value="{{old('name') ? old('name') : $user->name}}">

                                    @error('name')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email</label>
                                    <input id="email" name="email" email="email" class="form-control @error('email') is-invalid @enderror"   autocomplete="off" value="{{old('email') ? old('email') : $user->email}}">

                                    @if ($errors->has('email'))
                                        <p class="alert alert-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="date_birth" class="control-label mb-1">Tanggal Lahir</label>
                                    <input id="date_birth" name="date_birth" type="date" class="form-control @error('date_birth') is-invalid @enderror"   autocomplete="off" value="{{old('date_birth') ? old('date_birth') : $user->date_birth}}">

                                    @error('date_birth')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="address" class="control-label mb-1">Alamat</label>
                                    <textarea id="address" name="address"  class="form-control @error('address') is-invalid @enderror"   autocomplete="off" >{{old('address') ? old('address') : $user->address}}</textarea>

                                    @error('address')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="hp" class="control-label mb-1">HP</label>
                                    <input id="hp" name="hp" type="number" class="form-control @error('hp') is-invalid @enderror" autocomplete="off" value="{{old('hp') ? old('hp') : $user->hp}}">

                                    @error('hp')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label mb-1">Password</label>
                                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror"   autocomplete="off"">

                                    @error('password')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="job" class="control-label mb-1">Pekerjaan</label>
                                    <textarea id="job" name="job" class="form-control @error('job') is-invalid @enderror" autocomplete="off">{{old('job') ? old('job') : $user->job}}</textarea>

                                    @error('job')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="position" class="control-label mb-1">Jabatan</label>

                                        
                                    <select id="position" name="position" class="form-control @error('position') is-invalid @enderror">
                                        @foreach ($positions as $position)
                                            <option value="{{$position->id}}">{{$position->position}}</option>
                                        @endforeach
                                    </select>

                                    @error('position')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="concentration" class="control-label mb-1">Konsentrasi</label>
                                    <select id="concentration" name="concentration" class="form-control @error('concentration') is-invalid @enderror">
                                        @foreach ($concentrations as $concentration)
                                            <option value="{{$concentration->id}}">{{$concentration->concentration}}</option>
                                        @endforeach
                                    </select>

                                    @error('concentration')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-warning btn-block">Editkan</button>
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

