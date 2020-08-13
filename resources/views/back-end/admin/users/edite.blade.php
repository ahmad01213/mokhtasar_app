@extends('layouts.admin')
@section('content')
    <div class="card card-primary col-7  text-right center" style="height: 500px ">
        <div class="card-header text-center">
            إضافة عضو جديد
        </div>
        <div class="card-body">
            <form action="{{route('users.update',['user'=>$rows->id])}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group" >
                    <label for="exampleInputEmail1">الإسم</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$rows->name}}" placeholder="اسم العضو ">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">البريد الالكتروني</label>
                    <input type="email" name="email" class="form-control" id="exampleInputPassword1" value="{{$rows->email}}"  placeholder="البريد الالكتروني">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">رقم الهاتف</label>
                    <input type="number" name="phone" class="form-control" id="exampleInputEmail1" value="{{$rows->phone}}"  placeholder="رقم الهاتف">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">كلمة السر</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة السر">
                </div>
                <button type="submit" class="btn btn-primary">تحديث</button>
            </form>
    </div>
    </div>
@endsection
