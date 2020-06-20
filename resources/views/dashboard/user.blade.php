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
                <div class="card-body">
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
                                        <th>Foto</th>
                                        <th>NIR</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Tgl Lahir</th>
                                        <th>Alamat</th>
                                        <th>HP</th>
                                        <th>Job</th>
                                        <th>Jabatan</th>
                                        {{-- <th>Konsentrasi</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $angkaAwal =  1
                                    @endphp
                                    @forelse ($users as $user)
                                    <tr>
                                        <td>{{$angkaAwal}}</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="#"><img class="rounded-circle" src="{{url($user->img)}}" alt=""></a>
                                            </div>
                                        </td>
                                        <td>{{$user->nir}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->status == 2 ? 'Active' : ($user->status == 1 ? 'Panding' : 'Not Active')}}</td>
                                        <td>{{$user->date_birth}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->hp}}</td>
                                        <td>{{$user->job}}</td>
                                        <td>{{$user->position_id != null ? $user->position->position : '' }}</td>

                                        {{-- <td>{{$user->concentration->concentration}}</td> --}}
                            
                                        <td>
                                            @if ($user->status == 2 || $user->status == 1)
                                                <a href="/user/{{$user->nir}}/active" class="btn btn-success btn-sm {{$user->status == 2 ? 'd-none' : ''}}"><i class="fa fa-power-off"></i></a>
                                                <a href="/user/{{$user->nir}}/panding" class="btn btn-secondary btn-sm {{$user->status == 1 ? 'd-none' : ''}}"><i class="fa fa-power-off"></i></a>
                                            @endif

                                            <a href="/user/{{$user->id}}/edit" class="btn btn-warning btn-sm "><i class="fa fa-edit"></i></a>
                            
                                            <form action="/user/{{$user->id}}" method="POST" class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')
                            
                                                <button type="submit" onclick="return confirm('Hapus Data {{$user->nir}}?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $angkaAwal++
                                    @endphp
                                    @empty
                                        <td class="text-center">Data User Masih Kosong</td>
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
