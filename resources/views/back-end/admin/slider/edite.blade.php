@extends('layouts.admin')
@section('content')
    <div class="card card-primary col-7  text-right center" style="height: 250px ">
        <div class="card-header text-center">
            اختر صورة
        </div>
        <div class="card-body">
            <form action="{{route('sliders.update',['slider'=>$rows->id])}}" autocomplete="off" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <input type="file" name="image" placeholder="ااختر الايقونة">
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 40px">حفظ</button>
            </form>
        </div>
    </div>
@endsection
