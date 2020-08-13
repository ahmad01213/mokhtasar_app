@extends('layouts.admin')
@section('content')
<div class="row row1 margin: 0 auto;" style="text-align: center;">
    <div class="col-lg-2 col-4"sy>
        <!-- small box -->
        <div class="small-box bg-dark" >
            <div class="inner">
                <h3>{{$counts[3]}}</h3>
                <p>الشركات</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('parteners.index')}}" class="small-box-footer">المزيد <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
  <div class="col-lg-2 col-4">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$counts[0]}}</h3>
        <p>الطلبات</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="{{ route('orders.index')}}" class="small-box-footer">المزيد <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-2 col-4">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{$counts[1]}}</h3>

        <p>المنتجات</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="{{ route('products.index')}}" class="small-box-footer">المزيد <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-2 ccol-4">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{$counts[2]}}</h3>

        <p>الأعضاء</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="{{ route('users.index')}}" class="small-box-footer">المزيد <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <!-- ./col -->
</div>

<div class="card-body align-content-center" style="justify-content: space-around">
  <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
    <div class="row">
      <div class="col-sm-12 col-md-4"></div>
      <div class="col-sm-12 col-md-4"></div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
          <thead>
            <tr role="row" align="center" bgcolor="#696969">
              <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                تفاصيل
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

              <td tabindex="0" class="sorting_1"><a href="https://www.google.com/maps/search/?api=1&query={{$row->lat}},{{$row->lng}}">
                  الموقع</a></td>
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
