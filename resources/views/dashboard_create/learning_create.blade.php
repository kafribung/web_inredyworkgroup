@extends('layouts.master')
@section('title', 'Create Pembelajaran | INR Workgroup')
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
                            <strong class="card-title">Tambah Data Pembelajaran</strong>
                        </div>
                        <div class="card-body">
                            <form action="/learning" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="img" class="control-label mb-1">Gambar</label>
                                    <input id="img" name="img" type="file"
                                        class="form-control @error('img') is-invalid @enderror" accept="image/*"
                                        autofocus>

                                    @if ($errors->has('img'))
                                    <p class="alert alert-danger">{{$errors->first('img')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="time" class="control-label mb-1">Waktu</label>
                                    <input id="time" name="time" type="datetime-local"
                                        class=" form-control @error('time') is-invalid @enderror" autocomplete="off"
                                        value="{{old('time')}}">

                                    @error('time')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="user_id" class="control-label mb-1">Pengajar</label>
                                    <select id="user_id" name="user_id"
                                        class="form-control @error('user_id') is-invalid @enderror" required>
                                        @foreach ($users as $user)
                                        <option {{ old('user_id') == $user->id ? 'selected' : '' }}
                                            value="{{$user->id}}">
                                            {{$user->name}}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('user_id')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="concentration_id" class="control-label mb-1">Konsentrasi</label>
                                    <select id="concentration_id" name="concentration_id"
                                        class="form-control @error('concentration_id') is-invalid @enderror" required>
                                        @foreach ($concentrations as $concentration)
                                        <option {{ old('concentration_id') == $concentration->id ? 'selected' : '' }}
                                            value="{{$concentration->id}}">
                                            {{$concentration->concentration}}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('concentration_id')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-md btn-info btn-block">Tambah
                                    Pembelajaran
                                </button>
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