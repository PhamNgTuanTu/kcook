<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title></title>
</head>
<body>

	<table>
		<thead>
			<tr>
				<th>
					<img style="max-width: 100%; height: auto" src="{{$data['url'].'/assets/images/banner.png'}}"/>
				</th>
			</tr>
			<tr>
				<th>
					<h3><strong style="opacity: 0.8;">Cảm ơn bạn đã ghé thăm gian hàng chúng tôi!</strong></h3>
				</th>
			</tr>
		</thead>
		<tbody style="border: 1px solid #e6e6e6;">
			<tr>
				<td style="text-align: center;">
					<img width="82" height="82" src="{{$data['url'].'assets/images/bill.png'}}">
				</td>
			</tr>
			<tr>
				<td style="text-align: center;
				    padding: 35px;
				   ">
				   		<a 
						href="{{$data['url'].'/khach-hang/vang-lai/'.$data['hoa_don_id']}}" 
						style="background-color: #1877f2;
					    color: #fff;
					    padding: 10px;
					    text-decoration: none;
					    font-weight: 600;"
					>Chi tiết đơn hàng</a>
				</td> 
			</tr>
		</tbody>
	
	</table>
</body>
</html>
