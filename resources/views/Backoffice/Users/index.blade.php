@extends('layouts.app')

@section('content')
@section('list','users')
@section('action','list')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <h6 class="card-title col-sm-9">List of users</h6>
                <form action="" class="col-sm-3 ml-auto">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="" id="" placeholder="Search ...">
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <button class="btn btn-dark mb-3">new user <i class="fas fa-user-plus"></i></button>
            <table class="table table-striped">
                <tr class="table-thead">
                    <td>Name</td>
                    <td>Email</td>
                    <td>Created at</td>
                    <td></td>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <a href="{{route('user.show',['user'=>$user->id])}}" class="btn btn-secondary"><i class="fas fa-user"></i></a> |
                        <a href="{{route('user.edit',['id'=>$user->id])}}" class="btn btn-info"><i class="fas fa-user-edit"></i></a> | 
                        <a href="{{route('user.delete',['id'=>$user->id])}}" class="btn btn-danger"><i class="fas fa-user-times"></i></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection