<html>

<title>
    New order
</title>

<body>

<h1>تفاصيل الطلب رقم {{$data->id}} :</h1>

<div class="table-responsive">
    <!--begin::Table-->
    <table class="table align-middle gs-0 gy-4" id="users_table">
        <!--begin::Table head-->
        <thead>
        <tr class="fw-bolder text-muted bg-light">
            <th class="min-w-30px">م</th>
            <th class="min-w-125px">اسم المنتج</th>
            <th class="min-w-100px">الحجم</th>
            <th class="min-w-100px">العدد</th>
            <th class="min-w-100px">السعر</th>
            <th class="min-w-100px">الاجمالي</th>
            <th class="min-w-150px">الملاحظات</th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody>
        @foreach($data->OrderDetails as $key => $OrderDetails)

            <tr>
                <td>
                    <span class="fw-bold text-dark d-block fs-5">{{$key + 1 }}</span>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        {{$OrderDetails->title}}
                    </div>
                </td>

                <td>
                    <div class="d-flex align-items-center">
                        {{$OrderDetails->Shape->title}}
                    </div>
                </td>


                <td>
                    <div class="d-flex align-items-center">
                        {{$OrderDetails->count}}
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        {{$OrderDetails->price / $OrderDetails->count}}
                    </div>
                </td>


                <td>
                    <div class="d-flex align-items-center">

                        <?php
                        $total = $OrderDetails->price ;
                        echo $total;
                        ?>


                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        {{$OrderDetails->note}}
                    </div>
                </td>

            </tr>
        @endforeach
        </tbody>
        <tfoot>
        @if(isset($data->coupon))
            <tr style="color:red!important;">
                <th colspan="4"> </th>
                <th colspan="1">  كود الخصم  : {{$data->coupon->name}}</th>
                <th colspan="2" > {{$data->coupon_percent}} - </th>
            </tr>
        @endif

        <tr>
            <th colspan="4"> </th>
            <th colspan="1">الضرائب </th>
            <th colspan="2">{{$data->tax}}</th>
        </tr>
        <tr>
            <th colspan="4"> </th>
            <th colspan="1">خدمة توصيل </th>
            <th colspan="2">{{$data->delivery_fees}}</th>
        </tr>
        <tr>
            <th colspan="4"> </th>
            <th colspan="1">اجمالي الفاتورة </th>
            <th colspan="2">{{$data->total_price + $data->tax + $data->delivery_cost   }}</th>
        </tr>
        </tfoot>
        <!--end::Table body-->
    </table>
    <!--end::Table-->
</div>

</body>
</html>
