@extends('layouts.master')
@section('title', 'Edit Jabatan |  INR Workgroup')
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
                            <strong class="card-title">Edit Data Jabatan</strong>
                        </div>
                        <div class="card-body">
                            <form action="/position/{{$position->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="position" class="control-label mb-1">Jabatan</label>
                                    <input id="position" name="position" type="text" class="form-control @error('position') is-invalid @enderror"  autofocus required autocomplete="off" value="{{old('position') ? old('position') : $position->position}}">

                                    @error('position')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

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

