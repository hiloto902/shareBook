@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <!-- ヒストリーバックボタン -->
                <div class="my-3 ml-3" style="padding-bottom:20px">
                    <button type="button" class="btn btn-dark" onclick="history.back()">戻る</button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
                    <h1><small>Book Edit</small></h1>
                </div>

                <form action="{{ route('books.update', ['book'=>$book->id])}}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">title</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" name="title" value="{{$book->title}}">
                            <!--<span class="text-danger"></span> -->
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="col-md-3 control-label">SNS name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="sns_name" name="sns_name" value="{{$book->sns_name}}">
                        </div>
                    </div>

                    <div class="col-md-offset-3 text-center">
                        <button class="btn btn-primary">serve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
