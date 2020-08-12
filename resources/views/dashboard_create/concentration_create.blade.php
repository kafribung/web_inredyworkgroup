@extends('layouts.master')
@section('title', 'Create Konsentrasi | INR Workgroup')
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
                            <strong class="card-title">Tambah Data Konsentrasi</strong>
                        </div>
                        <div class="card-body">
                            <form action="/concentration" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="concentration" class="control-label mb-1">Konsentrasi</label>
                                    <input id="concentration" name="concentration" type="text"
                                        class="form-control @error('concentration') is-invalid @enderror" autofocus
                                        required autocomplete="off" value="{{old('concentration')}}">

                                    @error('concentration')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-md btn-info btn-block">Tambahkan</button>
                            </form>
                        </div>
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