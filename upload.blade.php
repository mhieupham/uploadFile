@extends('layout.layout')
@section('content')
    @if(\Session::has('success'))
        <div class="alert alert-success">{{\Session::get('success')}}</div>
        @endif
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
    <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group text-center">
            <table class="text-center">
                <tr>
                    <td><label>Upload File</label></td>
                    <td><input name="file" type="file" class="form-control"></td>
                    <td><input type="submit" class="btn btn-success" value="Upload"></td>
                </tr>
            </table>
        </div>
    </form>
    @if(\Session::has('path'))
    <img style="width: 100px;" src='http://localhost/new%20code/update_image/public/images/{{\Session::get('path')}}'>
    @endif
    @endsection
