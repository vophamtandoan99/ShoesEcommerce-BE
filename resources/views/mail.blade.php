<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thư Tự Động</title>
</head>
<body>
  <div class="container">
    <h1 style="font-size: 18px; font-weight: bold;">Xin Chào {{$details["customer"]['name']}}! Cảm ơn bạn đã đặt hàng tại {{$name}}.</h1>
    <h1 style="font-size: 18px; font-weight: bold;">Thông tin đơn hàng #GY{{$details['bill']['id']}}BJK</h1>
    <body style="font-family: sans-serif;">
        <div style="display: block; margin: auto; max-width: 600px;" class="main">
          <div class="row col-md-6 col-md-offset-2 custyle">
          
          <div style="background-color: silver;"><h3>Đơn hàng đặt giao đến</h3>
            <div>
                <p>Người nhận: {{$details['customer']['name']}}</p>
                <p>Địa chỉ: {{$details['customer']['address']}}</p>
                <p>Điện thoại: {{$details['customer']['phone']}}</p>
                <p>Email: {{$details['customer']['email']}}</p>
            </div>
          </div>
          <div style="background-color: silver; margin-top: 2px;"><h3>Kiện hàng</h3>
            <table style="border: 2px;">
                <thead>
                <tr>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Size</th>
                <th scope="col">Màu</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng tiền</th>
                </tr>
                </thead>
                @foreach ($details['billDetail'] as $key => $productDetails)
                <tr>
                    <td style="colspan: 2px; align:center">{{$productDetails->name}}</td>
                    <td>{{$productDetails->size}}</td>
                    <td>{{$productDetails->color}}</td>
                    <td>{{$productDetails->price}}</td>
                    <td>{{$productDetails->amount}}</td>
                    <td>{{($productDetails->amount) * ($productDetails->price)}}</td>
                </tr>
                @endforeach
                
            </table>
          </div>
          <div style="background-color: silver; margin-top: 2px;">
                <p>Tổng tiền: {{$details['bill']['total']}}</p>
                <p>Ngày đặt: {{$details['bill']['dateorder']}}</p>
                <p>Hình thức thanh toán: {{$details['bill']['payment']}}</p>
                @if(!empty($details['bill']['note']))
                  <p>Ghi chú: {{$details['bill']['note']}}</p>
                @endif
                <p>Tình trạng: Đang chờ xử lý</p>
          </div>
        </div>
    </body>
  </div>
</body>

<!-- <style>
  .main { background-color: white; }
  a:hover { border-left-width: 1em; min-height: 2em; }
  .resize{
    width: 125px;
    height: 125px;
  }
  .custab{
    border: 1px solid #ccc;
    padding: 5px;
    margin: 5% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
  .custab:hover{
      box-shadow: 3px 3px 0px transparent;
      transition: 0.5s;
      }
</style> -->
</html>