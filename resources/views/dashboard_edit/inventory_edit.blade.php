@extends('layouts.master')
@section('title', 'Edit Inventaris | INR Workgroup')
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
                            <strong class="card-title">Edit Data Inventaris</strong>
                        </div>
                        <div class="card-body">
                            <form action="/inventory/{{$inventory->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Nama</label>
                                    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" autofocus  autocomplete="off" value="{{old('title') ? old('title') : $inventory->title}}">

                                    @error('title')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="img" class="control-label mb-1">Gambar</label>
                                    <img src="{{url($inventory->img)}}" alt="Error" title="Gambar Inventory" width="80" height="80">
                                    <input id="img" name="img" type="file" class="form-control @error('img') is-invalid @enderror"   accept="image/*">

                                    @if ($errors->has('img'))
                                        <p class="alert alert-danger">{{$errors->first('img')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="owner" class="control-label mb-1">Nama Penyumbang</label>
                                    <input id="owner" name="owner" type="text" class="form-control @error('owner') is-invalid @enderror" autofocus  autocomplete="off" value="{{old('owner') ? old('owner') : $inventory->owner}}">

                                    @error('owner')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="total" class="control-label mb-1">Jumlah</label>
                                    <input id="total" name="total" type="number" class="form-control @error('total') is-invalid @enderror" autofocus  autocomplete="off" value="{{old('total') ? old('total') : $inventory->total}}">

                                    @error('total')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category" class="control-label mb-1">Kategori</label>
                                    <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                        <option selected disabled>~Pilih Kategori~</option>
                                        <option {{$inventory->category == 'Rumah Tangga' ? 'selected' : ''}} value="Rumah Tangga">Rumah Tangga</option>
                                        <option {{$inventory->category == 'Logistik' ? 'selected' : ''}} value="Logistik">Logistik</option>
                                    </select>

                                    @error('category')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="condition" class="control-label mb-1">Kondisi</label>
                                    <select name="condition" id="condition" class="form-control @error('condition') is-invalid @enderror">
                                        <option selected disabled>~Pilih Kondisi~</option>
                                        <option {{$inventory->condition == 'Baik' ? 'selected' : ''}} value="Baik">Baik</option>
                                        <option {{$inventory->condition == 'Rusak' ? 'selected' : ''}} value="Rusak">Rusak</option>
                                    </select>

                                    @error('condition')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="description" class="control-label mb-1">Deskripsi</label>
                                    <textarea id="description" name="description" class="form-control ckeditor @error('description') is-invalid @enderror" >{{old('description') ? old('description') : $inventory->description}}</textarea>

                                    @error('description')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-warning btn-block">Edit Inventaris</button>
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

