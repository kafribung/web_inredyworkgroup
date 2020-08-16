@extends('layouts.master')
@section('title', 'Inventaris | INR Workgroup')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-12">
                <div class="page-header float-right">
                    <div class="form-inline p-2">
                        <form class="search-form" action="/inventory" method="GET">
                            <input class="form-control mr-sm-2" name="search" type="text"
                                placeholder="Creation Search  ..." aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">

        @if (session('msg'))
        <p class="alert alert-info">{{session('msg')}}</p>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="box-title text-center">Data Inventaris</h4>
                            <a href="/inventory/create" class="btn btn-primary btn-sm float-right"><i
                                    class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="table-stats">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Kode Barang</th>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                        <th>Sumbangsi</th>
                                        <th>Kondisi Barang</th>
                                        <th>Jenis Kategori</th>
                                        <th>Deskripri</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $angkaAwal = 1
                                    @endphp
                                    @forelse ($inventories as $inventory)
                                    <tr>
                                        <td>{{$angkaAwal++}}</td>
                                        <td>
                                            <img src="{{url($inventory->takeImg)}}" alt="erorr"
                                                title="Gambar {{ $inventory->title }}" width="100">
                                        </td>
                                        <td>{{$inventory->code}}</td>
                                        <td>{{$inventory->title}}</td>
                                        <td>{{$inventory->total}}</td>
                                        <td>{{$inventory->owner}}</td>
                                        <td>{{$inventory->condition}}</td>
                                        <td>{{$inventory->category}}</td>
                                        <td>{!! Str::limit($inventory->description, 10) !!}</td>
                                        <td>
                                            <a href="/inventory/{{$inventory->slug}}/edit"
                                                class="btn btn-warning btn-sm "><i class="fa fa-edit"></i>
                                            </a>
                                            <form action="/inventory/{{$inventory->id}}" method="POST"
                                                class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Hapus Data {{$inventory->title}}?')"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <td class="text-center">Data Inventaris Masih Kosong</td>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="float-right">
                                {{ $inventories->links() }}
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