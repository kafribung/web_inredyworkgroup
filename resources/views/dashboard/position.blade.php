@extends('layouts.master')
@section('title', 'Jabatan | INR Workgroup')
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
                            <h4 class="box-title text-center">Jabatan</h4>
                            <a href="/position/create" class="btn btn-primary btn-sm float-right"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                        <div class="table-stats">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jabatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $angkaAwal = 1
                                    @endphp
                                    @forelse ($positions as $position)
                                    <tr>
                                        <td>{{$angkaAwal++}}</td>
                                        <td>{{$position->position}}</td>
                                        <td>
                                            <a href="/position/{{$position->id}}/edit" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-edit"></i>
                                            </a>

                                            <form action="/position/{{$position->id}}" method="POST"
                                                class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Hapus Data {{$position->position}}?')"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <td>Data Jabatan Belum Ada</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
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