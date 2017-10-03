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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
   <script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<?php
    include 'koneksi.php';
    include 'Regression.php';  
?>
  <div class="container">
  <div class="row">
  <br/>
    <div class="panel panel-default">
  <div class="panel-heading">Laporan</div>
  <div class="panel-body">
  <div class="col-md-12">
    <canvas id="diagram" width="100%"></canvas>
  </div>
<div class="col-md-6">

        <h4>Laporan Keuntungan</h4>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Keuntungan(Rp)</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $regression = new PolynomialRegression(2);
            $sql="SELECT * FROM laporan_pertahun";
            $query = mysqli_query($con, $sql);
            $tahun= [];
            $laba = [];
            while($data = mysqli_fetch_array($query)){
                $x = $data['tahun']-date('Y');
                $y = $data['laba'];
                $regression->addData($x, $y);
                ?>
                <tr>
                    <td><?= $data['tahun']?></td>
                    <td><?= number_format($data['laba'],2,',','.')?></td>
                </tr>
                <?php
                array_push($tahun,$data['tahun']);
                array_push($laba,$data['laba']);
                $tahunakhir = $data['tahun'];
            }
            
            ?>
            </tbody>
        </table>    
    </div>
<div class="col-md-6">
        <h4>Prediksi Keuntungan</h4>
        <table class="table table-bordered" >
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Keuntungan(Rp)</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $coefficients = $regression->getCoefficients();
                $tahunprediksi = 5;
                $laba2 = $laba;
                for($x = 1; $x<=$tahunprediksi; $x++){
                    $y = $regression->interpolate( $coefficients, $x);
                    array_push($tahun,$tahunakhir+$x);
                    array_push($laba2,$y);
                    ?>
                    <tr>
                        <td><?= $tahunakhir+$x ?></td>
                        <td><?= number_format($y,2,',','.') ?></td>
                    </tr>
                    <?php
                }        
            ?>
            </tbody>
        </table>    
</div>

</div>
</div>
</div>
</div>


<?php
$datatahun = "[".implode(",",$tahun)."]";
$datalaba = "[".implode(",",$laba)."]";
$datalaba2 = "[".implode(",",$laba2)."]";
?>
<script>
    var ctx = document.getElementById("diagram");
    var myChart = new Chart(ctx,{
        "type":"line",
        "data":{
            "labels":<?= $datatahun ?>,
            "datasets":[
                {
                    "label":"Keuntungan",
                    "data":<?= $datalaba ?>,
                    "fill":false,
                    "borderColor":"#5bc0de",
                    
                    "cubicInterpolationMode": "monotone"
                },
                {
                    "label":"Prediksi Keuntungan",
                    "data":<?= $datalaba2 ?>,
                    "fill":false,
                    "borderColor":"#5cb85c"
                }
            ]
        },
        "options":{}
    });
</script>


</body>
</html>