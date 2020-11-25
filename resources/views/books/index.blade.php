@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="my-3 ml-3" style="padding-bottom:20px">
                <button type="button" class="btn btn-dark" onclick="history.back()">戻る</button>
            </div>

        </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Book</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 @auth
                    <form method="POST" action="{{ route('books.store') }}">
                        @csrf
                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('SNS name') }}</label>

                                <div class="col-md-6">
                                    <input id="sns_name" type="text" class="form-control @error('sns_name') is-invalid @enderror" name="sns_name" value="{{ old('sns_name') }}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>

                                <div class="col-md-6">
                                    <textarea id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment">
                                    {{ old('comment') }}
                                    </textarea>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                        </div>
                    </form> 
                    @endauth  

                </div>
                
                <div class="card">
                    <div class="card-header">Book Shelf</div>
                    <table id='list-table' class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>title</th>
                            <th>SNS name</th>
                            <th>comment</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td>{{$book->title}}</td>
                                <td>{{$book->sns_name}}</td>
                                <td>{{$book->comment}}</td>
                                <td>
                                    <div style="display:inline-flex">
                                        <a href="{{route('books.edit',['book'=>$book->title])}}" class="btn btn-primary btn-sm">編集</a>
                                        <form action="{{route('books.destroy',['book'=>$book->title])}}" method="POST">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <input type="submit" value="削除" class="btn btn-danger btn-sm btn-dell"
                                                onclick="return confirm('本当に削除しますか？');">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
