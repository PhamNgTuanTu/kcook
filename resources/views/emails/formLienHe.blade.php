<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
  <div style="margin:50px auto;width:70%;padding:20px 0">
    <div style="border-bottom:1px solid #eee">
      <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Tin nhắn từ cửa hàng</a>
    </div>
    <p style="font-size:1.1em">Chào, chủ shop </p>
    <p>Bạn có một tin nhắn từ  email <strong>{{ $data["email"] }}</strong> với nội dung: </p>
    <p>{{ $data["noi_dung"] }}</p>
    <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;"></h2>
    <p style="font-size:1.1em">Thông tin khách hàng:</p>
    <p style="font-size:1.1em">Họ và tên: {{ $data["ho_ten"] }} - Số điện thoại: {{ $data["so_dien_thoai"] }}</p>
    <hr style="border:none;border-top:1px solid #eee" />
    <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
      <p>Trieudo Co.,Ltd.</p>
    </div>
  </div>
</div>
