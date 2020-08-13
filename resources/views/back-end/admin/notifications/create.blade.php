@extends('layouts.admin')
@section('content')
@if(session()->has('message'))
        <div  class="alert alert-success"  style="text-align: right; margin: 50px 50px 50px 50px;">
            {{ session()->get('message') }}
        </div>
        @endif
    <div class="card card-primary col-7  text-right center" style="height: 350px ">
        <div class="card-header text-center">
           إشعار إلي كل المستخدمبن
        </div>
        <div class="card-body">
        <form action="{{ route('notifications.store') }}" id="form1" method="post" name="form">
                {{ csrf_field() }}

                  <div class="form-group" >
                    <label for="exampleInputEmail1">عنوان الرسالة</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="عنوان الرسالة ">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">نص الرسالة</label>
                    <textarea  name="message" class="form-control" id="exampleInputPassword1" style="text-align: right;" placeholder="نص الرسالة"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">إرسال</button>

            </form>
    </div>
    </div>
@endsection
