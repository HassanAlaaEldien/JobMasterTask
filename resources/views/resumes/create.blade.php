@extends('layout.app')

@section('content')
    <form action="{{ route('resumes.store') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            <label> Upload Resume </label>
            <input type="file" class="form-control" name="file">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
@endsection
