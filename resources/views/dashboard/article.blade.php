@extends('layouts.master')
@section('title', 'Artikel | INR Workgroup')
@section('content')

 <!-- Content -->
<div class="content">
    
    <!-- Animated -->
    <div class="animated fadeIn">

        @if (session('msg'))
            <p class="alert alert-info">{{session('msg')}}</p>
        @endif

        <div class="row">
             @foreach ($articles as $article)
                <div class="col-md-3">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">{{$article->title}}</strong>
                            </div>
                            <div class="card-header alt bg-dark">
                                <img class="align-self-center mr-3" style="width:400px; height:200px;" alt="article" src="{{url($article->img)}}">
                            </div>
                            <div class="card-body">
                                {!! Str::limit($article->description, 100) !!}
                            </div>
                            <hr>

                            <div class="card-text text-sm-center">
                                <a href="/article/{{$article->slug}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                <form action="/article/{{$article->id}}" method="POST" class="d-inline-flex">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" onclick="return confirm('Hapus Data {{$article->title}} ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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

