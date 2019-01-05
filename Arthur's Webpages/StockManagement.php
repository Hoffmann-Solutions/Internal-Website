<!DOCTYPE html>
<html lang="en">
<?php
$con = mysqli_connect("localhost", "root", "", "stock") or die(mysql_error());
if(isset($_POST["vProduct"])){
  $vProduct = $_POST["vProduct"];
  $vProductNo = $_POST["vProduct_No"];
  $vSerialNo = $_POST["vSerial_No"];
  $vAssemblyNo = $_POST["vAssembly_No"];
  $vBatchNo = $_POST["vBatch_No"];
  $vType = $_POST["vType"];
  $vProductionDate = $_POST["vProduction_Date"];
}
?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class = "Jumbotron Jumbotron-fluid bg-inverse text-white py-4">
      <div class = "container">
        <h1 class = "display-3 text-center">Stock Management</h1>
      </div>
    </div>
    <div class = "container-fluid">
      <div class = "col-sm-12">
        <form method = "post" action = "<?php echo $_SERVER["PHP_SELF"];?>">
          <table  align = "center" class = 'table table-inverse'>
            <thead>
              <tr>
                <th class = "text-center">Product</th>
                <th class = "text-center">Product No</th>
                <th class = "text-center">Serial No</th>
                <th class = "text-center">Assembly No</th>
                <th class = "text-center">Batch No</th>
                <th class = "text-center">Type</th>
                <th class = "text-center">Production Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class = "text-center"><input type = "text" name = "vProduct" size = "10"/></td>
                <td class = "text-center"><input type = "text" name = "vProduct_No" size = "10"/></td>
                <td class = "text-center"><input type = "text" name = "vSerial_No" size = "10"/></td>
                <td class = "text-center"><input type = "text" name = "vAssembly_No" size = "10"/></td>
                <td class = "text-center"><input type = "text" name = "vBatch_No" size = "10"/></td>
                <td class = "text-center"><input type = "text" name = "vType" size = "10"/></td>
                <td class = "text-center"><input type = "text" name = "vProduction_Date" size = "10"/></td>
              </tr>
            </tbody>
          </table>
          <button type = "button" name = "dbInput"class = "btn btn-outline-primary">Input</button>
        </form>
    </div>
  </div>
  <?php
  if (isset($_POST["dbInput"])){
    $vProduct = $_POST["vProduct"];
    $vProductNo = $_POST["vProduct_No"];
    $vSerialNo = $_POST["vSerial_No"];
    $vAssemblyNo = $_POST["vAssembly_No"];
    $vBatchNo = $_POST["vBatch_No"];
    $vType = $_POST["vType"];
    $vProductionDate = $_POST["vProduction_Date"];
    $query = mysqli_query($con ,"INSERT INTO `stock` (`Product`, `Product No`, `Serial No`, `Assembly No`, `Batch No`, `Type`, `Production Date`) VALUES ('$vProduct',' $vProductNo', '$vSerialNo',' $vAssemblyNo', '$vBatchNo',' $vType',' $vProductionDate')");
  }
  ?>
    </body>
  </html>
