@extends('layouts.admin')
@section('content')
    <div class=" col-7  text-right center" style="height: 500px ">
        <div class="card-header text-center">
           إضافة شركة
        </div>
        <div >
            <form action="{{route('parteners.store')}}" autocomplete="off" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group" >
                    <label for="exampleInputEmail1">الإسم</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="اسم العضو ">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">البريد الالكتروني</label>
                    <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="البريد الالكتروني">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">رقم الهاتف</label>
                    <input type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="رقم الهاتف">
                </div>
                <div class="form-group" >
                    <label for="exampleInputEmail1">عن الشركة</label>
                    <textarea type="text"  name="abouttext" style="height: 200px;text-align: right; " class="form-control" id="exampleInputEmail1"  placeholder="اكتب هنا "></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">رقم التواصل عبر الواتس اب</label>
                    <input type="number" name="whats" class="form-control" id="exampleInputPassword1"  placeholder="اكتب الرقم">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">الحالة</label>
                    <select class="form-control" name="status">
                        <option value="active">نشط</option>
                        <option value="not active">عير نشط</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="file" name="image" placeholder="ااختر الايقونة">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">كلمة السر</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة السر">
                </div>
                <button type="submit" class="btn btn-primary">إضافة</button>
            </form>
    </div>
    </div>
@endsection
