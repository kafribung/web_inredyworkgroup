@extends('layouts.master')
@section('title', 'User-Anggota |  INR Workgroup')
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
                            <h4 class="box-title text-center">User / Anggota</h4>
                            <a href="/user/create" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="table-stats">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIR</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Alamat</th>
                                        <th>HP</th>
                                        <th>Job</th>
                                        <th>Jabatan</th>
                                        <th>Konsentrasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $angkaAwal =  1
                                    @endphp
                                    @foreach ($users as $user)
                                        
                                    <tr>
                                        <td>{{$angkaAwal}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->status == 1 ? 'active' : 'panding'}}</td>
                                        <td>{{($user->role == 0) ? 'Anggota' : (($user->role == 1) ? 'Admin' : 'Bendahara')}}</td>
                                        <td>
                                            <a href="/user/{{$user->id}}/edit" class="btn btn-warning btn-sm {{$user->status != 1 ? 'disabled' : ''}}"><i class="fa fa-edit"></i></a>

                                            <form action="/user/{{$user->id}}" method="POST" class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" onclick="return confirm('Hapus Data {{$user->email}}?')" class="btn btn-danger btn-sm" {{$user->status != 1 ? 'disabled' : ''}}><i class="fa fa-trash"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                    @php
                                        $angkaAwal++
                                    @endphp
                                    @endforeach

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
