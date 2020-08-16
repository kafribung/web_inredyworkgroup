@extends('layouts.master')
@section('title', 'Kegiatan | INR Workgroup')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-12">
                <div class="page-header float-right">
                    <div class="form-inline p-2">
                        <form class="search-form" action="/activity" method="GET">
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
                            <h4 class="box-title text-center">Data Kegiatan</h4>
                            <a href="/activity/create" class="btn btn-primary btn-sm float-right"><i
                                    class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="table-stats">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Lokasi</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Deskripri</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $angkaAwal = 1
                                    @endphp
                                    @forelse ($activities as $activity)
                                    <tr>
                                        <td>{{$angkaAwal++}}</td>
                                        <td>{{$activity->title}}</td>
                                        <td>{{$activity->location}}</td>
                                        <td>{{$activity->date}}</td>
                                        <td><b><i>{{$activity->status}}</i></b></td>
                                        <td>{!! Str::limit($activity->description, 10) !!}</td>
                                        <td>
                                            <a href="/activity/{{$activity->slug}}/edit"
                                                class="btn btn-dark btn-sm m-1"><i class="fa fa-image"></i>
                                            </a>
                                            <a href="/activity/{{$activity->slug}}/edit"
                                                class="btn btn-warning btn-sm m-1"><i class="fa fa-edit"></i>
                                            </a>
                                            <form action="/activity/{{$activity->id}}" method="POST"
                                                class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Hapus Data {{$activity->title}}?')"
                                                    class="btn btn-danger btn-sm m-1"><i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <td class="text-center">Data Kegiatan Masih Kosong</td>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="float-right">
                                {{ $activities->links() }}
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