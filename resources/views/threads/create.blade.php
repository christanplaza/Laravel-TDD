@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Thread</div>
                <div class="card-body">
                    <form method="POST" action="/threads">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="channel_id">Choose a Channel: </label>
                            <select name="channel_id" id="channel_id" class="form-control">
                                <option disabled selected>Choose one...</option>
                                @foreach ($channels as $channel)
                                    <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }} required>
                                        {{ $channel->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                          <small id="title" class="text-muted">Your thread must have a concise and informative title.</small>
                        </div>
                        <div class="form-group">
                          <label for="body">Body</label>
                          <textarea class="form-control" name="body" id="body" rows="8" style="resize: none" required>{{ old('body') }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>
                        @if (count($errors))
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
