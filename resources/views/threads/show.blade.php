@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="#">
                        {{ $thread->creator->name }}
                    </a>
                    posted: {{ $thread->title }}
                </div>
                <div class="card-body">
                    {{ $thread->body }}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach ($thread->replies as $reply)
            @include ('threads.reply')
        @endforeach
    </div>

    @if (auth()->check())
        <div class="row justify-content-center mt-4">
            <div class="col-md-8 col-md-offset-2">
                <div class="card p-4 shadow">
                    <form action="{{ $thread->path() . '/replies' }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="body">Participate in the discussion: </label>
                            <input type="text" name="body" rows="5" class="form-control" placeholder="Have something to say?" aria-describedby="helpId">
                        </div>

                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center mt-4">
            <p>Please <a href="{{ route('login') }}">sign in</a> to participate in the discussion</p>
        </div>
    @endif
</div>
@endsection
