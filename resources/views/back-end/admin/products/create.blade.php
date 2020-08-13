@extends('layouts.admin')
@section('content')
    <div class=" col-7  text-right center" style="height: 540px ;width: auto">
        <div class="card-header text-center">
            إضافة منتج
        </div>
        <div class="card-body">
            <form action="{{route('products.store')}}" autocomplete="off" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">إسم المنتج</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                           placeholder="اكتب إسم المنتج ">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">وصف المنتج</label>
                    <input type="text" name="desc" class="form-control" id="exampleInputEmail1"
                           placeholder="اكتب وصف المنتج ">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">السعر</label>
                    <input type="text" name="price" class="form-control" id="exampleInputEmail1"
                           placeholder="اكتب سعر المنتج">
                </div>
                <div class="form-group">
                    <input type="file" name="image" placeholder="ااختر الايقونة">
                </div>
                <select class="form-control" name="category">
                    <option class="float-right" value="">اختر القسم</option>
                    <option value="خرسانة">خرسانة</option>
                    <option value="طوب">طوب</option>
                    <option value="بلوك">طوب</option>
                </select>
                <select class="form-control" name="published">
                    <option class="float-right">حالة المنتج</option>
                    <option value="1">مفعل</option>
                    <option value="0">غيرمفعل</option>
                </select>
                <div class="container" style="margin-top: 50px">
                    <div class="form-group">
                        <div class="card-header text-center">
                            الأحجام
                        </div>
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>


                            <div class="alert alert-success print-success-msg" style="display:none">
                                <ul></ul>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                            <button type="button" name="add" id="add" class="btn btn-success">إضافة</button>
                                        </td>
                                    </tr>
                                </table>
                                {{--                        <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />--}}
                            </div>


                    </div>
                </div>
                <div class="container" style="margin-top: 50px">
                    <div class="form-group">
                        <div class="card-header text-center">
                            التقطيع
                        </div>
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>


                        <div class="alert alert-success print-success-msg" style="display:none">
                            <ul></ul>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-bordered" id="cut_dynamic_field">
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <button type="button" name="add" id="add_cut" class="btn btn-success">إضافة</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 40px; width: 300px; margin: 30px">حفظ المنتج</button>
            </form>
        </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            var postURL = "<?php echo url('products/addmoresize'); ?>";
            var i = 1;

            $('#add').click(function () {
                i++;
                $('#dynamic_field').append('<tr id="row_size' + i + '" class="dynamic-added">' +
                    '<td><input type="text" name="size[]" placeholder="اكتب النوع" class="form-control name_list" /></td>' +
                    '<td><input type="text" name="price[]" placeholder="اكتب السعر" class="form-control name_list" /></td>' +
                    '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove_size">X</button></td></tr>');
            });
            $(document).on('click', '.btn_remove_size', function () {
                var button_id = $(this).attr("id");
                $('#row_size' + button_id + '').remove();
            });
        });

        $(document).ready(function () {
            var i = 1;

            $('#add_cut').click(function () {
                i++;
                $('#cut_dynamic_field').append('<tr id="row' + i + '" class="dynamic-added">' +
                    '<td><input type="text" name="cut[]" placeholder="اكتب التقطيع" class="form-control name_list" /></td>' +
                    '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            });
            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
        });
    </script>
@endsection
