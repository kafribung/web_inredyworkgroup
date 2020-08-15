@extends('layouts.master')
@section('title', 'Artikel | INR Workgroup')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-12">
                <div class="page-header float-right">
                    <div class="form-inline p-2">
                        <form class="search-form" action="/article" method="GET">
                            <input class="form-control mr-sm-2" name="search" type="text"
                                placeholder="Article Search  ..." aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">

        @if (session('msg'))
        <p class="alert alert-info">{{session('msg')}}</p>
        @endif

        <div class="row">
            @forelse ($articles as $article)
            <div class="col-md-3">
                <aside class="profile-nav alt">
                    <section class="card">
                        <div class="card-header">
                            <small class="badge badge-info">Artikel</small>
                            <strong class="card-title mb-3">{{$article->title}}</strong>
                        </div>
                        <div class="card-header alt bg-dark">
                            <img class="align-self-center mr-3" style="width:400px; height:200px;" alt="article"
                                src="{{url($article->takeImg)}}" title="Gambar {{ $article->title }}">
                        </div>
                        <div class="card-body">
                            {!! Str::limit($article->description, 100) !!}
                        </div>
                        <hr>
                        <div class="d-flex justify-content-around">
                            <small>{{ $article->created_at->diffforhumans() }}</small>
                            <small>{{ $article->user->name }}</small>
                        </div>
                        <hr>
                        <div class="card-text text-sm-center">
                            @if ($article->status == 0 )
                            <a href="/article/{{$article->slug}}/active" class="btn btn-success btn-sm m-1"><i
                                    class="fa fa-power-off"></i>
                            </a>
                            @else
                            <a href="/article/{{$article->slug}}/panding" class="btn btn-secondary btn-sm m-1"><i
                                    class="fa fa-power-off"></i>
                            </a>
                            @endif
                            <a href="/article/{{$article->slug}}/edit" class="btn btn-warning btn-sm"><i
                                    class="fa fa-edit"></i>
                            </a>
                            <form action="/article/{{$article->id}}" method="POST" class="d-inline-flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus Data {{$article->title}} ?')"
                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </section>
                </aside>
            </div>
            @empty
            <div class="col-md-3">
                <h6>Artikel Tidak Ditemukan</h6>
            </div>
            @endforelse
        </div>
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
@endsection