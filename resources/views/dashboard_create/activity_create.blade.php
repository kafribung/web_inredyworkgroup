@extends('layouts.master')
@section('title', 'Create Kegiatan | INR Workgroup')
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
                            <strong class="card-title">Tambah Data Kegiatan</strong>
                        </div>
                        <div class="card-body">
                            <form action="/activity" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Nama</label>
                                    <input id="title" name="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" autofocus
                                        autocomplete="off" value="{{old('title')}}">

                                    @error('title')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="location" class="control-label mb-1">Lokasi</label>
                                    <input id="location" name="location" type="text"
                                        class="form-control @error('location') is-invalid @enderror" autofocus
                                        autocomplete="off" value="{{old('location')}}">

                                    @error('location')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="date" class="control-label mb-1">Tangggal Kegiatan</label>
                                    <input id="date" name="date" type="datetime-local"
                                        class="form-control @error('date') is-invalid @enderror" autofocus
                                        autocomplete="off" value="{{old('date')}}">

                                    @error('date')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status" class="control-label mb-1">Status</label>
                                    <select name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option selected disabled>~Pilih Kategori~</option>
                                        <option {{ old('status') == 'Comingsoon' ? 'selected' : '' }}
                                            value="Comingsoon">Comingsoon
                                        </option>
                                        <option {{ old('status') == 'Success' ? 'selected' : '' }} value="Success">
                                            Success
                                        </option>
                                        <option {{ old('status') == 'Fail' ? 'selected' : '' }} value="Fail">
                                            Fail
                                        </option>
                                    </select>

                                    @error('status')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label mb-1">Deskripsi</label>
                                    <textarea id="description" name="description"
                                        class="form-control ckeditor @error('description') is-invalid @enderror">{{old('description')}}</textarea>

                                    @error('description')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-md btn-info btn-block">Tambah
                                    Kegiatan
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
@push('after_script')
<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '.ckeditor' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
</script>
@endpush
@endsection