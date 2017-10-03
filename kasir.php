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
<script type="text/javascript">

$(document).ready(function(){
 $(document).on('keydown', '.kode', function() {
 
  var id = this.id;
  var splitid = id.split('_');
  var index = splitid[1];

  // Initialize jQuery UI autocomplete
  $( '#'+id ).autocomplete({
   source: function( request, response ) {
    $.ajax({
     url: "getDetails.php",
     type: 'post',
     dataType: "json",
     data: {
      search: request.term,request:1
     },
     success: function( data ) {
      response( data );
     }
    });
   },
   select: function (event, ui) {
    $(this).val(ui.item.label); // display the selected text
    var userid = ui.item.value; // selected value

    // AJAX
    $.ajax({
     url: 'getDetails.php',
     type: 'post',
     data: {userid:userid,request:2},
     dataType: 'json',
     success:function(response){
 
      var len = response.length;

      if(len > 0){
       var nama = response[0]['nama'];
       var harga = response[0]['harga'];


       // Set value to textboxes
       document.getElementById('nama_'+index).value = nama;
       document.getElementById('harga_'+index).value = harga;
 
      }
 
     }
    });

    return false;
   }
  });
 });
 
 // Add more
 $('#addmore').click(function(){

  // Get last id 
  // var lastname_id = $('.tr_input input[type=text]:nth-child(1)').last().attr('id');
  // var split_id = lastname_id.split('_');

  // New index
  var index = parseInt($('#nomer').val() )+ 1;

  // Create row with input elements
  var html = "<tr id='tr_input_"+index+"' class='tr_input'><td><input type='text' class='kode form-control' id='kode_"+index+"' placeholder='Masukan kode barang'></td><td><input type='text' class='nama form-control' id='nama_"+index+"' readonly></td><td><input type='text' class='harga form-control' id='harga_"+index+"' readonly></td><td><input type='text' onclick='total("+index+")' onchange='total("+index+")' class='jumlah form-control' id='jumlah_"+index+"' ></td><td><input type='text' class='total form-control' id='total_"+index+"' readonly></td><td><button type='button' onclick='hapus("+index+")' class='btn btn-danger'>hapus</button></td></tr>";

  // Append data
  $('tbody').append(html);
  $('#nomer').val(index);
 
 });

 // $('#hapus').click(function(){

 //  // Get last id 
 //  var lastname_id = $('.tr_input input[type=text]:nth-child(1)').last().attr('id');
 //  var split_id = lastname_id.split('_');

 //  // New index
 //  var index = Number(split_id[1]) - 1;


 //  $('#nomer'#.val(index);
 
 // });

   

});
function hapus(i){
  $('#tr_input_'+i).remove();
   $('#nomer').val( $('#nomer').val()-1);
   updateharga()
}

function total(i){
  $('#total_'+i).val(parseInt($('#harga_'+i).val())*parseInt($('#jumlah_'+i).val()));
  updateharga()
}

function updateharga(){
var sum=0.0;
$('.total').each(function(){
  sum+=parseFloat(this.value);
  $('#totalharga').val(sum);
});
}

function kembalianhargaa(){
$('#kembalianharga').val(parseInt($('#bayarharga').val())-parseInt($('#totalharga').val()));
}



</script>
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

  <script src="js/say-cheese.js"></script>

  <script src="js/qr/grid.js"></script>
  <script src="js/qr/version.js"></script>
  <script src="js/qr/detector.js"></script>
  <script src="js/qr/formatinf.js"></script>
  <script src="js/qr/errorlevel.js"></script>
  <script src="js/qr/bitmat.js"></script>
  <script src="js/qr/datablock.js"></script>
  <script src="js/qr/bmparser.js"></script>
  <script src="js/qr/datamask.js"></script>
  <script src="js/qr/rsdecoder.js"></script>
  <script src="js/qr/gf256poly.js"></script>
  <script src="js/qr/gf256.js"></script>
  <script src="js/qr/decoder.js"></script>
  <script src="js/qr/qrcode.js"></script>
  <script src="js/qr/findpat.js"></script>
  <script src="js/qr/alignpat.js"></script>
  <script src="js/qr/databr.js"></script>

  <script src="js/effects_saycheese.js"></script>
</body>
</html>