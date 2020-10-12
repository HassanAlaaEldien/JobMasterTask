@extends('layout.app')

@section('content')
    <form action="{{ route('resumes.index') }}">
        <div class="row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="search_query" placeholder="Search ..."
                       value="{{ request()->search_query }}">
            </div>
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
    @if(!empty($resumes))
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">File</th>
            </tr>
            </thead>
            <tbody>
            @foreach($resumes as $resume)
                <tr>
                    <th scope="row">{{ $resume->id }}</th>
                    <td>
                        <a href="storage/{{ $resume->file }}" target="_blank">
                            Download
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
