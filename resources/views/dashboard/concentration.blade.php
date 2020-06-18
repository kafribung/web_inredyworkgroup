@extends('layouts.master')
@section('title', 'Konsentrasi |  INR Workgroup')
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
                            <h4 class="box-title text-center">Konsentrasi</h4>
                            <a href="/concentration/create" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="table-stats">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Konsentrasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $angkaAwal =  1
                                    @endphp
                                    @forelse ($concentrations as $concentration)
                                    
                                    <tr>
                                        <td>{{$angkaAwal}}</td>
                                        <td>{{$concentration->concentration}}</td>
                                        <td>
                                            <a href="/concentration/{{$concentration->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                            <form action="/concentration/{{$concentration->id}}" method="POST" class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" onclick="return confirm('Hapus Data {{$concentration->concentration}}?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <td>Data Konsentrasi Belum Ada</td>
                                    @php
                                        $angkaAwal++
                                    @endphp
                                        
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
