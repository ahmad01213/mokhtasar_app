@extends('layouts.admin')
@section('content')

    @if(session()->has('message'))
        <div  class="alert alert-success"  style="text-align: right; margin: 50px 50px 50px 50px;">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class=" col-7  text-right center" style="height: 900px ">
        <div class="card-header text-center">
            إعدادات
        </div>
        <div class="card-body">
            <form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group" >
                    <label for="exampleInputEmail1">من نحن</label>
                    <textarea type="text"  name="abouttext" style="height: 200px;text-align: right; " class="form-control" id="exampleInputEmail1"  placeholder="اكتب هنا ">{{$about[0]->text}}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">رقم التواصل عبر الواتس اب</label>
                    <input type="number" name="whats" class="form-control" id="exampleInputPassword1" value="{{$whats[0]->text}}"  placeholder="اكتب الرقم">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">رقم التواصل عبر الاتصال</label>
                    <input type="number" name="phone" class="form-control" id="exampleInputPassword1" value="{{$phone[0]->text}}"  placeholder="اكتب الرقم">
                </div>

                <div class="container" style="margin-top: 50px">
                    <div class="form-group">
                        <div class="card-header text-center">
                            فترات التوصيل
                        </div>
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <div class="alert alert-success print-success-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <div class="table-responsive">
                            <table class="table"  style="border-collapse: collapse; border: none;" id="dynamic_field">
                                <tr>

                                    <td>
                                        <button type="button" name="add" id="add" class="btn btn-success">إضافة</button>
                                    </td>
                                </tr>
                                @foreach($periods as $period)
                                    <tr id="{{'row_size'.$loop->index}}" class="dynamic-added">
                                        <td><input type="text" name="periods[]" placeholder="اكتب اسم الفترة" class="form-control name_list" value="{{$period->name}}"/></td>
                                        <td><button type="button" name="remove" id="{{$loop->index}}" class="btn btn-danger btn_remove_size">X</button></td></tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            var i =1000;
            $('#add').click(function () {
                i++;
                $('#dynamic_field').append('<tr id="row_size' + i + '" class="dynamic-added">' +
                    '<td><input type="text" name="periods[]" placeholder="اكتب اسم الفترة" class="form-control name_list" /></td>' +
                    '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove_size">X</button></td></tr>');
            });
            $(document).on('click', '.btn_remove_size', function () {
                var button_id = $(this).attr("id");
                console.log(button_id);
                $('#row_size' + button_id + '').remove();
            });
        });
    </script>
@endsection
