@extends('layouts.master')
@section('title', 'Admin | INR Workgroup')
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
                            <h4 class="box-title text-center">Admin</h4>
                        </div>

                        <div class="table-stats">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $angkaAwal = 1
                                    @endphp
                                    @forelse ($admins as $admin)
                                    <tr>
                                        <td>{{$angkaAwal++}}</td>
                                        <td>
                                            <img class="rounded-circle" src="{{url($admin->takeImg)}}" alt="Error"
                                                title="Gambar {{ $admin->name }}">
                                        </td>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>
                                            {{$admin->status == 2 ? 'Active' : ($admin->status == 1 ? 'Panding' : 'Not Active')}}
                                        </td>
                                        <td>
                                            <a href="/admin/{{$admin->id}}/edit" class="btn btn-warning btn-sm m-1"><i
                                                    class="fa fa-edit"></i>
                                            </a>
                                            <form action="/admin/{{$admin->id}}" method="POST" class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Hapus Data {{$admin->name}}?')"
                                                    class="btn btn-danger btn-sm m-1"><i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <td class="text-center">Data Admin Masih Kosong</td>
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