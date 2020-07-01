@extends('layouts.master')
@section('title', 'Inventaris | INR Workgroup')
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
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="box-title text-center">Data Inventaris</h4>
                            <a href="/inventory/create" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></a>

                        </div>

                        <div class="table-stats">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
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
                                        $angkaAwal =  1
                                    @endphp
                                    @forelse ($inventories as $inventory)
                                    <tr>
                                        <td>{{$angkaAwal}}</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="#"><img class="rounded-circle" src="{{url($inventory->img)}}" alt="erorr"></a>
                                            </div>
                                        </td>
                                        <td>{{$inventory->title}}</td>
                                        <td>{{$inventory->total}}</td>
                                        <td>{{$inventory->owner}}</td>
                                        <td>{{$inventory->condition}}</td>
                                        <td>{{$inventory->category}}</td>
                                        <td>{!! Str::limit($inventory->description, 80)  !!}</td>
                            
                                        <td>
                                            <a href="/inventory/{{$inventory->slug}}/edit" class="btn btn-warning btn-sm "><i class="fa fa-edit"></i></a>
                            
                                            <form action="/inventory/{{$inventory->id}}" method="POST" class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')
                            
                                                <button type="submit" onclick="return confirm('Hapus Data {{$inventory->title}}?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $angkaAwal++
                                    @endphp
                                    @empty
                                        <td class="text-center">Data Inventaris Masih Kosong</td>
                                    @endforelse
                            
                                </tbody>
                            </table>
                           
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
