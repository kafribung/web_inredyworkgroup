@extends('layouts.master')
@section('title', 'Karya | INR Workgroup')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-12">
                <div class="page-header float-right">
                    <div class="form-inline p-2">
                        <form class="search-form" action="/creation" method="GET">
                            <input class="form-control mr-sm-2" name="search" type="text"
                                placeholder="Creation Search  ..." aria-label="Search">
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
                            <iframe class="align-self-center p-2" style="width:100%;" alt="creation"
                                src="{{$creation->video}}" frameborder="0"></iframe>
                        </div>
                        <div class="card-body">
                            {!! Str::limit($creation->description, 100) !!}
                        </div>
                        <div class="d-flex justify-content-around">
                            <small>{{ $creation->created_at->diffforhumans() }}</small>
                            <small>{{ $creation->user->name }}</small>
                        </div>
                        <hr>
                        <div class="card-text text-sm-center">
                            @if ($creation->status == 0 )
                            <a href="/creation/{{$creation->slug}}/active" class="btn btn-success btn-sm m-1"><i
                                    class="fa fa-power-off"></i>
                            </a>
                            @else
                            <a href="/creation/{{$creation->slug}}/panding" class="btn btn-secondary btn-sm m-1"><i
                                    class="fa fa-power-off"></i>
                            </a>
                            @endif
                            <a href="/creation/{{$creation->slug}}/edit" class="btn btn-warning btn-sm"><i
                                    class="fa fa-edit"></i>
                            </a>
                            <form action="/creation/{{$creation->id}}" method="POST" class="d-inline-flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus Data {{$creation->title}} ?')"
                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </section>
                </aside>
            </div>
            @endforeach
        </div>
        <div class="row float-right">
            {{ $creations->links() }}
        </div>
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
@endsection