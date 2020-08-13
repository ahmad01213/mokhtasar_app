@extends('layouts.admin')
@section('content')
    <div class="card card-primary col-7  text-right center" style="height: 730px ">
        <div class="card-header text-center">
             إضافة منتج من ريتال
        </div>
        <div class="card-body">
            <form action="{{route('mazads.store')}}" autocomplete="off" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group" >
                    <label for="exampleInputEmail1">إسم المزاد</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="اكتب إسم المنتج ">
                </div>
                <div class="form-group" >
                    <label for="exampleInputEmail1">الوصف</label>
                    <input type="text" name="desc" class="form-control" id="exampleInputEmail1" placeholder="اكتب وصف المنتج ">
                </div>
                <div class="form-group" >
                    <label for="exampleInputEmail1">اقل سعر</label>
                    <input type="text" name="minprice" class="form-control" id="exampleInputEmail1" placeholder="اكتب اقل سعر للمزاد">
                </div>
                <div class="form-group" >
                    <label for="exampleInputEmail1">تاريخ البدء</label>
                    <input type="date" name="starttime" class="form-control" id="exampleInputEmail1" placeholder="اختر تاريخ">
                </div>
                <div class="form-group" >
                    <label for="exampleInputEmail1">تاريخ الانتهاء</label>
                    <input type="date" name="endtime" class="form-control" id="exampleInputEmail1" placeholder="اختر تاريخ">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">اختر صورة </label>
                    <input type="file" name="image" placeholder="ااختر الايقونة">
                </div>
                <select class="form-control " name="published">
                    <option class="float-right">حالة المنتج</option>
                    <option value="1">مفعل</option>
                    <option value="0">غيرمفعل</option>
                </select>
                <button type="submit" class="btn btn-primary" style="margin-top: 40px">إضافة</button>
            </form>
    </div>
    </div>
@endsection
