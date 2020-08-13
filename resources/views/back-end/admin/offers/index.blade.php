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
                    <a class="btn btn-success order-delete" style="margin-bottom: 10px;float: right" href="{{route('offers.create')}}" id="2">
                         إضافة منتج  +
                    </a>
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                           aria-describedby="example2_info">
                        <thead>
                        <tr role="row" align="center" bgcolor="#696969">
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                إجراء
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                الحالة
                            </th>
                            <!--<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"-->
                            <!--    aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">-->
                            <!--    خصم-->
                            <!--</th>-->
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                صورة
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                السعر
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                               الوصف
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                الاسم
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                id
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $row)
                                                
                                            <tr role="row" class="odd" align="center">
                                <td align="center" tabindex="0" class="sorting_1" style="text-align: center;width: 200px;">
                                    <div class="container" style=" display: flex;justify-content:center;">

                                        <form action="{{ route('offers.destroy' , ['offer' => $row->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit"  class="btn btn-danger order-delete" style="margin-right: 10px; height: 30px;font-size: 12px; " >
                                                حذف
                                            </button>
                                        </form>
                                    
                                        <a class="btn btn-primary order-delete" href="{{ route('offers.edit', ['offer'=>$row->id]) }}" id="2" style="margin-right: 10px; height: 30px;font-size: 12px; ">
                                            تعديل
                                        </a>
                                    </div>
                                </td>
                                <td tabindex="0" class="sorting_1">
                                     @if($row->published == "1")
                                        {{ "مفعل"}}
                                    @else
                                        {{ "غير مفعل"}}
                                    @endif</td>

                                <!--<td tabindex="0" class="sorting_1">{{$row->discount}}</td>-->
                                <td tabindex="0" class="sorting_1"><img src="{{$row->image}}" alt="Avatar" style="height: 50px;width: 50px;border-radius: 25px"> </td>
                                <td tabindex="0" class="sorting_1">{{$row->price}}</td>
                                <td tabindex="0" class="sorting_1">{{$row->desc}}</td>
                                <td tabindex="0" class="sorting_1">{{$row->name}}</td>
                                <td tabindex="0" class="sorting_1">{{($row->id)+1}}</td>
                            </tr>

                                   </td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
