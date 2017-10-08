<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kasir</title>
   <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link href='css/jquery-ui.min.css' type='text/css' rel='stylesheet' >
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
   <script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
  <div class="container">
  <div class="row">
  <br/>
    <div class="panel panel-default">
  <div class="panel-heading">Program Toko</div>
  <div class="panel-body">

    <div class="col-md-10">
    <form action="" method="post">
    <input type="hidden" name="nomer" value=1 id="nomer">
<table class="table table bordered">
  <thead>
   <tr>
    <th>Kode barang</th>
    <th>Nama barang</th>
    <th>Harga</th>
    <th>Jumlah</th>
    <th>Total</th>
   </tr>
  </thead>
  <tbody>
   <tr class='tr_input'>
   
    <td><input type='text' class='kode form-control' id='kode_1' placeholder='Masukan kode barang'></td>
    <td><input type='text' class='nama form-control' id='nama_1' readonly></td>
    <td><input type='text' class='harga form-control' id='harga_1' readonly></td>
    <td><input type='text' class='jumlah form-control' onclick="total(1)" onchange="total(1)" id='jumlah_1' ></td>
    <td><input type='text' class='total form-control' id='total_1' readonly></td>
     <td></td>
   </tr>
  </tbody>
  <tfoot>
  <tr><td colspan="3">Total Harga</td><td colspan="2"><input type='text' class='form-control' id='totalharga' placeholder="total" readonly></td><td></td></tr>
  <tr><td colspan="3">Bayar </td><td colspan="2"><input type='text' class='form-control' id='bayarharga' placeholder="bayar" onclick="kembalianhargaa()" onchange="kembalianhargaa()"></td><td></td></tr>
    <tr><td colspan="3">Kembalian</td><td colspan="2"><input type='text' class='form-control' id='kembalianharga' placeholder="Kembalian" readonly></td><td></td></tr>
  </tfoot>

</table>
</form>
 <br>
 <input type='button' class="btn btn-default" value='tambah lagi' id='addmore'>
 <input type='button' class="btn btn-success" value='Kirim' id='kirim'>
 </div>


<div class="col-md-2">
  <div id="example" class="thumbnail embed-responsive embed-responsive-4by3"></div>
        <div class="boxWrapper auto">
          <div id="hiddenImg"></div>
          <div id="qrContent" class="alert alert-info" role="alert">
            <p>hanya QRcode, Barcode masih belum bisa</p>
          </div>
        </div>

        <form>
          <div class="form-group">
            <label for="videoSource">Select Camera</label>
            <select id="videoSource"><option selected>Default Camera</option></select>
          </div>
          <div class="form-group">
            <a class="btn btn-primary" onclick="go()">Aktifkan Kamera QR</a>
          </div>
        </form>
</div>
</div>

</div>
</div>
</div>

</body>
</html>
