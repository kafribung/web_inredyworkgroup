@extends('layouts.master')
@section('title', 'Edit Karya | INR Workgroup')
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
                            <strong class="card-title">Edit Data Karya</strong>
                        </div>
                        <div class="card-body">
                            <form action="/creation/{{$creation->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Judul</label>
                                    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" autofocus  autocomplete="off" value="{{old('title') ? old('title') : $creation->title}}">

                                    @error('title')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="video" class="control-label mb-1">Link Video</label>
                                    <input id="video" name="video" type="url" class="form-control @error('video') is-invalid @enderror" autocomplete="off" value="{{old('video') ? old('video') : $creation->video}}">

                                    @if ($errors->has('video'))
                                        <p class="alert alert-danger">{{$errors->first('video')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="team" class="control-label mb-1">Team</label>
                                    <input id="team" name="team" type="text" class="form-control @error('team') is-invalid @enderror" autocomplete="off" value="{{old('team') ? old('team') : $creation->team}}">

                                    @if ($errors->has('team'))
                                        <p class="alert alert-danger">{{$errors->first('team')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="concentration_id" class="control-label mb-1">Kategori Konsentrasi</label>

                                        
                                    <select id="concentration_id" name="concentration_id" class="form-control @error('concentration_id') is-invalid @enderror">
                                            <option value="" selected disabled>~ Pilih Konsentrasi ~</option>
                                        @foreach ($concentrations as $concentration)
                                            <option {{$creation->concentration->id == $concentration->id ? 'selected' : ''}} value="{{$concentration->id}}">{{$concentration->concentration}}</option>
                                        @endforeach
                                    </select>


                                    @if ($errors->has('concentration_id'))
                                        <p class="alert alert-danger">{{$errors->first('concentration_id')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label mb-1">Deskripsi</label>
                                    <textarea id="description" name="description" class="form-control ckeditor @error('description') is-invalid @enderror" >{{old('description') ? old('description') : $creation->description}}</textarea>

                                    @error('description')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-warning btn-block">Edit Karya</button>
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

