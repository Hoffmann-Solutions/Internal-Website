<!DOCTYPE html>
<html lang="en">
<?php
$con = mysqli_connect("localhost", "root", "", "sales") or die(mysql_error());
?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <div class = "Jumbotron Jumbotron-fluid bg-inverse text-white py-4">
      <div class = "container">
        <h1 class = "text-center display-3">Sales Management</h1>
      </div>
    </div>
    <div class = "container-fluid">
      <div class = "row">
        <div class = "col-sm-2">
          <form method = "post" action = "<?php echo $_SERVER["PHP_SELF"];?>">
            <table border = 1 class = "table table-inverse">
              <thead>
                <tr onmouseover=(this.style.cursor='pointer') onclick="if (link) window.location ='http://www.Google.com'">
                  <th class = "text-center" >Order No:</th>
                </tr>
              </thead>
            <tbody>
              <tr>
                <td><input name = "vOrderNo" type = 'text'/></td>
              </tr>
            </tbody>
          </table>
            <button type = "button" name = "Submitbtn"class = "btn btn-outline-primary">Submit</button>
            <button type = "button" name = "Refreshbtn"class = "btn btn-outline-success">Refresh</button>
          </form>
        </div>
        <div class = "col-sm-1">
        </div>

        <div class = "col-sm-6">
          <?php
          if (!isset ($_POST['Submitbtn']) || isset($_POST["Refreshtbtn"])){
            $query = mysqli_query($con ,"SELECT * FROM `sales` WHERE 1");
            if ($query->num_rows > 0) {

            // output data of each row
        		printf("
                  <input class = 'form-control' id = 'myInput' type = 'text' placeholder = 'Search...'>
                  <table class = 'table table-inverse'>
                  <thead>
        					 <tr>
                    <th>Customer</th>
        						<th>Product</th>
        						<th>Product No</th>
        						<th>Serial No</th>
        						<th>Assembly No</th>
        						<th>Batch No</th>
        						<th>Type</th>
        						<th>Production Date</th>
        						<th>Order No</th>
        					</tr>
                  </thead>
                  <tbody id = 'myTable'>
        				");
        		while($row = $query->fetch_assoc()) {
                ?>
                <tr>
                    <td> <?php echo $row['Customer']; ?></td>
                    <td> <?php echo $row["Product"]; ?></td>
            				<td onmouseover = (this.style.cursor='pointer') onclick = "ProFunc(this)"><?php echo $row["Product No"]; ?></td>
            				<td onmouseover = (this.style.cursor='pointer') onclick = "SerFunc(this)"> <?php echo $row["Serial No"]; ?></td>
            				<td> <?php echo $row["Assembly No"]; ?></td>
            				<td> <?php echo $row["Batch No"]; ?> </td>
            				<td> <?php echo $row["Type"]; ?> </td>
            				<td> <?php echo $row["Production Date"]; ?> </td>
            				<td> <?php echo $row["Order No"]; ?> </td>
            			</tr>
                  <?php
        	  }
        	printf("</tbody>
                  </table>");
        }else{
            echo "0 results";
          }
          }
        	if (isset($_POST['Submitbtn'])){
        		$vOrderNo = $_POST['vOrderNo'];
            $query = mysqli_query($con ,"SELECT * FROM `sales` WHERE `Order No` = $vOrderNo");

        		if ($query->num_rows > 0) {

            // output data of each row
        		printf("
                  <input class = 'form-control' id = 'myInput' type = 'text' placeholder = 'Search...'>
                  <table class = 'table table-inverse'>
                  <thead>
        					 <tr>
                    <th>Customer</th>
        						<th>Product</th>
        						<th>Product No</th>
        						<th>Serial No</th>
        						<th>Assembly No</th>
        						<th>Batch No</th>
        						<th>Type</th>
        						<th>Production Date</th>
        						<th>Order No</th>
        					</tr>
                  </thead>
                  <tbody id = 'myTable'>
        				");
        		while($row = $query->fetch_assoc()) {
                ?>
                <tr>
                    <td> <?php echo $row['Customer']; ?></td>
                    <td> <?php echo $row["Product"]; ?></td>
            				<td onmouseover = (this.style.cursor='pointer') onclick = "ProFunc(this)"><?php echo $row["Product No"]; ?></td>
            				<td onmouseover = (this.style.cursor='pointer') onclick = "SerFunc(this)"> <?php echo $row["Serial No"]; ?></td>
            				<td> <?php echo $row["Assembly No"]; ?></td>
            				<td> <?php echo $row["Batch No"]; ?> </td>
            				<td> <?php echo $row["Type"]; ?> </td>
            				<td> <?php echo $row["Production Date"]; ?> </td>
            				<td> <?php echo $row["Order No"]; ?> </td>
            			</tr>
                  <?php
        	  }
        	printf("</tbody>
                  </table>");
        }else{
            echo "0 results";
          }
      }
        	?>
        </div>
      </div>
    </div>
    <br>
    <script type="text/javascript">
      function SerFunc(val){
        var newSer = val.innerText ;
        window.location.href = "SerialNo/" + newSer + ".php" ;
      }
      function ProFunc(val){
        var newPro = val.innerText;
        window.location.href = "ProductNo/" + newPro + ".php";
        localStorage.setItem("storageName",newPro);
      }
    </script>
    <script>
      $(document).ready(function(){
          $("#myInput").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
          });
      </script>
    <div class = "container-fluid">
      <div class = "row">
      </div>
    </div>
  </body>
</html>
