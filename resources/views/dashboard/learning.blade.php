@extends('layouts.master')
@section('title', 'Pembelajaran | INR Workgroup')
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
                            <h4 class="box-title text-center">Data Pembelajaran</h4>
                            <a href="/learning/create" class="btn btn-primary btn-sm float-right"><i
                                    class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="table-stats">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Waktu</th>
                                        <th>Pengajar</th>
                                        <th>Konsentrasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $angkaAwal = 1
                                    @endphp
                                    @forelse ($learnings as $learning)
                                    <tr>
                                        <td>{{$angkaAwal++}}</td>
                                        <td>
                                            <img src="{{url($learning->takeImg)}}" alt="erorr" title="Gambar"
                                                width="100">
                                        </td>
                                        <td>{{$learning->time}}</td>
                                        <td>{{$learning->user->name}}</td>
                                        <td><b>~{{$learning->concentration->concentration}}~</b></td>
                                        <td>
                                            <a href="/learning/{{$learning->created_at}}/edit"
                                                class="btn btn-warning btn-sm "><i class="fa fa-edit"></i>
                                            </a>
                                            <form action="/learning/{{$learning->id}}" method="POST"
                                                class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Hapus Data {{$learning->concentration->concentration}}?')"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <td class="text-center">Data Pembelajaran Masih Kosong</td>
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
@stop