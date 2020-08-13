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
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row" align="center" bgcolor="#696969">
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                إجراءات
                            </th>
                            <!--<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"-->
                            <!--    aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">-->
                            <!--    حالة الطلب-->
                            <!--</th>-->
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                التاريخ
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                الموقع
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                السعر الكلي
                            </th>


                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                هاتف
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                اسم
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
                                    <button class="btn btn-success " onClick="div_show('{{$row->user->id}}')" style="margin-right: 10px; height: 30px;font-size: 12px; ">
                                        إشعار
                                    </button>
                                    <a class="btn btn-primary order-delete" href="{{ route('orders.edit', ['order'=>$row->id]) }}" id="2" style="margin-right: 10px; height: 30px;font-size: 12px; ">
                                        المنتجات
                                    </a>
                                </div>

                            </td>



                            <!--<td tabindex="0" class="sorting_1"> @if($row->accepted == 1)-->
                            <!--        {{ "موكد"}}-->
                            <!--    @else-->
                            <!--        {{ "غير موكد"}}-->
                            <!--    @endif</td>-->
                            <td tabindex="0" class="sorting_1">{{$row->created_at}}</td>
                            <td align="center" tabindex="0" class="sorting_1" style="text-align: center;width: 100px;">
                                <div class="container" style=" display: flex;justify-content:center;">
                                    <a href="https://www.google.com/maps/search/?api=1&query={{$row->lat}},{{$row->lng}}" style="margin-right: 10px; height: 30px;font-size: 12px; width: 90 px;">
                                        الموقع
</a>
                                </div>
                            </td>


                            <td tabindex="0" class="sorting_1">{{$row->total_cost}}</td>

                            <td tabindex="0" class="sorting_1">{{($row->user->phone)}}</td>
                            <td tabindex="0" class="sorting_1">{{$row->user->name}}</td>
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
<script>
</script>