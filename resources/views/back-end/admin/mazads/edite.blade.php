@extends('layouts.admin')
@section('content')
    <div class="card card-primary col-7  text-right center" style="height: 630px ">
        <div class="card-header text-center">
            إضافة قسم رئيسي
        </div>
        <div class="card-body">
            <form action="{{route('mazads.update',['mazad'=>$rows->id])}}" autocomplete="off" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf                <div class="form-group" >
                    <div class="form-group" >
                        <label for="exampleInputEmail1">إسم المزاد</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="اكتب إسم المزاد " value="{{$rows->name}}">
                    </div>
                    <div class="form-group" >
                        <label for="exampleInputEmail1">الوصف</label>
                        <input type="text" name="desc" class="form-control" id="exampleInputEmail1" placeholder="اكتب وصف المزاد " value="{{$rows->desc}}">
                    </div>
                    <div class="form-group" >
                        <label for="exampleInputEmail1">اقل سعر</label>
                        <input type="text" name="minprice" class="form-control" id="exampleInputEmail1" placeholder="اكتب اقل سعر للمزاد"  value="{{$rows->minprice}}">
                    </div>
                    <div class="form-group" >
                        <label for="exampleInputEmail1">تاريخ البدء</label>
                        <input type="date" name="starttime" class="form-control" id="exampleInputEmail1" placeholder="اختر تاريخ" value="{{$rows->starttime}}">
                    </div>
                    <div class="form-group" >
                        <label for="exampleInputEmail1">تاريخ الانتهاء</label>
                        <input type="date" name="endtime" class="form-control" id="exampleInputEmail1" placeholder="اختر تاريخ" value="{{$rows->endtime}}">
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
                    <button type="submit" class="btn btn-primary" style="margin-top: 40px">حفظ</button>
            </form>
        </div>
    </div>
@endsection
