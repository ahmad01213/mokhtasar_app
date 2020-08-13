@extends('layouts.admin')
@section('content')
<div class="card-body align-content-center" style="justify-content: space-around">
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        @if(session()->has('message'))
        <div class="alert alert-success" style="text-align: right;">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-primary order-delete" style="margin-bottom: 10px;float: right" href="{{route('parteners.create')}}" id="2">
                    إضافة  +
                </a>
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row" align="center" bgcolor="#696969">
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                إجراءات
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                الحالة
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                صورة
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                الايميل
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                رقم الهاتف
                            </th>

                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                الإسم
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                id
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $row)
                        <tr role="row" class="odd" align="center">
                            <td align="center" tabindex="0" class="sorting_1" style="text-align: center;width: 200px;">
                                <div class="container" style=" display: flex;justify-content:center;">
                                <button class="btn btn-success " onClick = "div_show('{{$row->id}}')" style="margin-right: 10px; height: 30px;font-size: 12px; ">
                                            إشعار
                                        </button>
                                    <form action="{{ route('parteners.destroy' , ['partener' => $row->id]) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger order-delete" style="margin-right: 10px; height: 30px;font-size: 12px; ">
                                            حذف
                                        </button>
                                    </form>

                                    <a class="btn btn-primary order-delete" href="{{ route('parteners.edit', ['partener'=>$row->id]) }}" id="2" style="margin-right: 10px; height: 30px;font-size: 12px; ">
                                        تعديل
                                    </a>
                                </div>
                            </td>
                            <td tabindex="0" class="sorting_1">
                                @if( explode('&&&', $row->info)[2] == 'active')
                                    نشط
                                    @else
                                    غير نشط
                                    @endif

                            </td>
                            <td tabindex="0" class="sorting_1"><img src="{{explode('&&&', $row->info)[3]}}" style="height: 50px;width: 50px;border-radius: 25px"> </td>
                            <td tabindex="0" class="sorting_1">{{$row->email}}</td>
                            <td tabindex="0" class="sorting_1">{{$row->phone}}</td>
                            <td tabindex="0" class="sorting_1">{{$row->name}}</td>
                            <td tabindex="0" class="sorting_1">{{($row->id)+1}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@include('layouts.notifications');
@endsection
