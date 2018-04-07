@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">sdfsdf</div>
                <a href="{{route('create')}}">create</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($blog as $b)
                    @foreach($user as $u)
                    @if($u->id == $b->authorid)
                    <a href="{{ route('show',$b->id) }}">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$b->title}}</h5>
                                <p class="card-text">{{$b->content}}</p>
                                <a href="#" class="card-link">{{$u->name}} : </a>
                            </div>
                        </div>
                    </a>
                    @endif
                    @endforeach
                    @endforeach
                    {{ $blog->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
