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
                          <label for="title">Title</label>
                          <input type="text" name="title" id="title" class="form-control">
                          <small id="title" class="text-muted">Your thread must have a concise and informative title.</small>
                        </div>
                        <div class="form-group">
                          <label for="body">Body</label>
                          <textarea class="form-control" name="body" id="body" rows="8" style="resize: none"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
