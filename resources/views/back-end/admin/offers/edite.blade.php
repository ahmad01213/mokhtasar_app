@extends('layouts.admin')
@section('content')
    <div class="card card-primary col-7  text-right center" style="height: 630px ">
        <div class="card-header text-center">
            إضافة قسم رئيسي
        </div>
        <div class="card-body">
            <form action="{{route('offers.update',['offer'=>$rows->id])}}" autocomplete="off" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf                <div class="form-group" >
                    <label for="exampleInputEmail1">إسم المنتج</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="اكتب إسم المنتج " value="{{$rows->name}}">
                </div>
                <div class="form-group" >
                    <label for="exampleInputEmail1">وصف المنتج</label>
                    <input type="text" name="desc" class="form-control" id="exampleInputEmail1" placeholder="اكتب وصف المنتج " value="{{$rows->desc}}">
                </div>
                <div class="form-group" >
                    <label for="exampleInputEmail1">السعر</label>
                    <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="اكتب سعر " value="{{$rows->price}}">
                </div>
                <!--<div class="form-group" >-->
                <!--    <label for="exampleInputEmail1">نسبة الخصم</label>-->
                <!--    <input type="text" name="discount" class="form-control" id="exampleInputEmail1" placeholder="اكتب إسم القسم " value="{{$rows->discount}}">-->
                <!--</div>-->
                <div class="form-group">
                    <label for="exampleInputPassword1">اختر صورة للمنتج</label>
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
