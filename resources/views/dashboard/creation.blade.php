@extends('layouts.master')
@section('title', 'Karya | INR Workgroup')
@section('content')

 <!-- Content -->
<div class="content">
    
    <!-- Animated -->
    <div class="animated fadeIn">

        @if (session('msg'))
            <p class="alert alert-info">{{session('msg')}}</p>
        @endif

        <div class="row">
             @foreach ($creations as $creation)
                <div class="col-md-3">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                    <h6 class="badge  badge-success">
                                        {{$creation->concentration->concentration}}</h6>
                                <h4 class="card-title mb-3">{{$creation->title}}</h4>
                            </div>
                            <div class="card-header alt bg-dark">
                                <iframe class="align-self-center p-2" style="width:240px; height:200px;" alt="creation" src="{{$creation->video}}" frameborder="0"></iframe>
                            </div>
                            <div class="card-body">
                                {!! Str::limit($creation->description, 100) !!}
                            </div>
                            <hr>

                            <div class="card-text text-sm-center">
                                <a href="/creation/{{$creation->slug}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                <form action="/creation/{{$creation->id}}" method="POST" class="d-inline-flex">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" onclick="return confirm('Hapus Data {{$creation->title}} ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>

                        </section>
                    </aside>
                </div>
             @endforeach
        </div>
        
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->   
@endsection

