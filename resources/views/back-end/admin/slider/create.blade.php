@extends('layouts.admin')
@section('content')
    <div class="card card-primary col-7  text-right center" style="height: 250px ">
        <div class="card-header text-center">
             إضافة صورة
        </div>
        <div class="card-body">
            <form action="{{route('sliders.store')}}" autocomplete="off" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <input type="file" name="image" placeholder="ااختر الايقونة">
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 40px">إضافة</button>
            </form>
    </div>
    </div>
@endsection
