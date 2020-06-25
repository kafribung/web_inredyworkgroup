@extends('layouts.master')
@section('title', 'Bendahara | INR Workgroup')
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
                            <h4 class="box-title text-center">Bendahara</h4>
                            <a href="/treasurer/create" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></a>
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
                                        $angkaAwal =  1
                                    @endphp
                                    @forelse ($treasurers as $treasurer)
                                    <tr>
                                        <td>{{$angkaAwal}}</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="#"><img class="rounded-circle" src="{{url($treasurer->img)}}" alt=""></a>
                                            </div>
                                        </td>
                                        <td>{{$treasurer->name}}</td>
                                        <td>{{$treasurer->email}}</td>
                                        <td>{{$treasurer->status == 2 ? 'Active' : ($treasurer->status == 1 ? 'Panding' : 'Not Active')}}</td>
                            
                                        <td>
                                            <a href="/treasurer/{{$treasurer->id}}/edit" class="btn btn-warning btn-sm "><i class="fa fa-edit"></i></a>
                            
                                            <form action="/treasurer/{{$treasurer->id}}" method="POST" class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')
                            
                                                <button type="submit" onclick="return confirm('Hapus Data {{$treasurer->name}}?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $angkaAwal++
                                    @endphp
                                    @empty
                                        <td class="text-center">Data Bendahara Masih Kosong</td>
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
