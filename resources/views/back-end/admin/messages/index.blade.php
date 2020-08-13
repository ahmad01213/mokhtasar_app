@extends('layouts.admin')
@section('content')
    <div class="card-body align-content-center" style="justify-content: space-around">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-4"></div>
                <div class="col-sm-12 col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                           aria-describedby="example2_info">
                        <thead>
                        <tr role="row" align="center" bgcolor="#696969">
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                إجراءات
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                التاريخ
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                الردود
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                الرسالة
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                الايميل
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                               الهاتف
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                الاسم
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                id                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $row)
                            <tr role="row" class="odd" align="center">
                                <td align="center" tabindex="0" class="sorting_1" style="text-align: center;width: 200px;">
                                    <div class="container" style=" display: flex;justify-content:center;">

                                        <form action="{{ route('messages.destroy' , ['message' => $row->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit"  class="btn btn-danger order-delete" style="margin-right: 10px; height: 40px; border-radius: 15px" >
                                                حذف
                                            </button>
                                        </form>

                                        {{--                                        <a class="btn btn-danger order-delete" href="{{ route('users.destroy', ['user'=>$row->id]) }}" id="2" style="margin-right: 10px; height: 40px; border-radius: 15px">--}}
                                        {{--                                            حذف--}}
                                        {{--                                        </a>--}}
                                        <a class="btn btn-primary order-delete" href="#" id="2" style="height: 40px; border-radius: 15px">
                                            تعديل
                                        </a>
                                    </div>
                                </td>
                                <td tabindex="0" class="sorting_1">{{$row->created_at}}</td>
                                <td tabindex="0" class="sorting_1">{{$row->replay}}</td>
                                <td tabindex="0" class="sorting_1">{{$row->message}}</td>
                                <td tabindex="0" class="sorting_1">{{$row->user->email}}</td>
                                <td tabindex="0" class="sorting_1">{{$row->user->phone}}</td>
                                <td tabindex="0" class="sorting_1">{{$row->user->name}}</td>
                                <td tabindex="0" class="sorting_1">{{($row->id)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
