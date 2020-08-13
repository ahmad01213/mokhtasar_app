@extends('layouts.seller')
@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success" style="text-align: right; margin: 50px 50px 50px 50px;">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class=" col-7  text-right center" style="height: 900px ">
        <div class="card-header text-center">
            إعدادات
        </div>
        <div class="card-body">
            <form action="{{route('sellersettings.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">عن الشركة</label>
                    <textarea type="text" name="abouttext" style="height: 200px;text-align: right; "
                              class="form-control" id="exampleInputEmail1"
                              placeholder="اكتب هنا ">{{$row['about']}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">اسم الشركة</label>
                    <input type="text" name="name" class="form-control" id="exampleInputPassword1"
                           value="{{$row['name']}}" placeholder="اكتب الاسم">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">رقم التواصل عبر الواتس اب</label>
                    <input type="number" name="whats" class="form-control" id="exampleInputPassword1"
                           value="{{$row['whats']}}" placeholder="اكتب الرقم">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">رقم التواصل عبر الاتصال</label>
                    <input type="number" name="phone" class="form-control" id="exampleInputPassword1"
                           value="{{$row['phone']}}" placeholder="اكتب الرقم">
                </div>
                <img src="{{$row['image']}}" alt="" class="brand-image img-circle elevation-3" style="height: 100px;width: 100px;"
                >
                <div class="form-group">
                    <input type="file" name="image" placeholder="ااختر الايقونة">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">الحالة</label>
                    <select class="form-control" name="status">
                        <option value="active">نشط</option>
                        <option value="not active">غير نشط</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </form>
        </div>
    </div>
@endsection
