@extends('layouts.admin')
@section('content')
    <div class=" col-7  text-right center" style="height: 500px ">
        <div class="card-header text-center">
            إضافة عضو جديد
        </div>
        <div class="card-body">
            <form action="{{route('parteners.update',['partener'=>$rows->id])}}" method="POST" enctype="multipart/form-data">
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
                <div class="form-group" >
                    <label for="exampleInputEmail1">عن الشركة</label>
                    <textarea type="text"  name="abouttext" style="height: 200px;text-align: right; " class="form-control" id="exampleInputEmail1"  placeholder="اكتب هنا ">{{$rows->about}}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">رقم التواصل عبر الواتس اب</label>
                    <input type="number" name="whats" class="form-control" id="exampleInputPassword1" value="{{$rows['whats']}}"  placeholder="اكتب الرقم">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">الحالة</label>
                    <select class="form-control" name="status">
                        <option value="active">نشط</option>
                        <option value="not active">عير نشط</option>
                    </select>
                </div>
                <img src="{{$rows['image']}}" alt="" class="brand-image img-circle elevation-3" style="height: 100px;width: 100px;"
                >
                <div class="form-group">
                    <label for="exampleInputPassword1">اختر صورة </label>
                    <input type="file" name="image" placeholder="ااختر الايقونة">
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
