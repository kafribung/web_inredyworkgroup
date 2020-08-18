@extends('layouts.master')
@section('title', 'Foto Kegiatan | INR Workgroup')
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
                            <h4 class="box-title text-center">Foto Kegiatan {{ $activity->title }}</h4>
                            <a href="/activity/{{ $activity->slug }}/create/img"
                                class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="table-stats">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Relasi Kegiatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $angkaAwal = 1
                                    @endphp
                                    @forelse ($activity->activity_imgs()->latest()->get() as $img)
                                    <tr>
                                        <td>{{$angkaAwal++}}</td>
                                        <td>
                                            <img src="{{$img->takeImg}}" alt="Error"
                                                title="Foto {{ $img->activity->title }}" width="100">
                                        </td>
                                        <td>{{$img->activity->title}}</td>
                                        <td>
                                            <a href="/activity/{{$img->id}}/edit/img"
                                                class="btn btn-warning btn-sm m-1"><i class="fa fa-edit"></i>
                                            </a>
                                            <form action="/activity/{{ $img->id }}/img" method="POST"
                                                class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Hapus Data Foto {{$activity->title}}?')"
                                                    class="btn btn-danger btn-sm m-1"><i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <td class="text-center">Data Foto Kegiatan Masih Kosong</td>
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