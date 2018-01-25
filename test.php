<?php


echo '<head>
<title>Avero</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>
';
echo "<body>";
echo "
	<div class = \"container\" align = \"center\" style=\"background-color:powderblue;\">
		<h1>The Greasy Spoon</br>
			<small>Powered by Avero POS</small></br>
			<small>Submission by Deepak</small>
		</h1>
<a href = \"http://127.0.0.1/index.html\" ><img src = \"images/restaurant.gif\"></a>
	</div>
	<div class = \"container\" align = \"center\" style=\"background-color:skyblue;\">";

function post_check($tableid){
	switch($tableid){
	default:
	case 1: $tableid = "2644ece3-83dd-4deb-ae02-54f4df083e16";
		break;
	case 2: $tableid = "c482731d-19a4-4d1f-90ab-e4dc4ac7d28d";
		break;
	case 3: $tableid = "51f719e1-830e-40bb-9c1a-493ccc13cbc0";
		break;
	case 4: $tableid = "56fe84ff-0655-4972-b2b0-b097e0a26ca1";
		break;
	case 5: $tableid = "f5a3d871-1548-4be5-9f5a-e9a6e2011187";
		break;
	case 6: $tableid = "cb336b2a-a16f-4734-8e62-f165d5a2ac03";
		break;
	case 7: $tableid = "5d6e6290-a0bb-4aa9-ba3d-9071e5a65a93";
		break;
	case 8: $tableid = "b0672e44-b959-4f09-ad7e-6f53a386d815";
		break;
	case 9: $tableid = "4cf15df2-c1bf-435f-8e8b-ad6aba48937c";
		break;
	case 10: $tableid = "31ccc746-4ade-43ea-add1-3dba513feb85";
		break;
	}	


	$curl = curl_init();
	
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://check-api.herokuapp.com/checks",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST", 
	  CURLOPT_POSTFIELDS => "{\"tableId\": \"$tableid\"}\n",
	  CURLOPT_HTTPHEADER => array(
	    "authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjNjM2UzNmFiLWUyMTAtNDg4YS1hMDY3LTExZDQ4NGNiMzZmMyIsIm5hbWUiOiJqdW5pb3IgIzEyIn0.5FHmBnILzxmV86rf6lVqoXzfubqnl0V535HTxKVNhEM",
	  ),
	));

	$response = curl_exec($curl);
	$json = json_decode($response,true);
	$err = curl_error($curl);
	curl_close($curl);
	if (strcmp($json['StatusCode'] , "400") == 0) {
	echo "<h2>Oops! This table is already taken. Try another one. </br>Click on the image above to explore options. </h2>";
	}else{
	  echo "<h2>Check successfully opened. </br>Click on the image above to explore more options. </h2>";
	}	
}

//post_check($_POST['tableid']);
//echo "</br>";

function get_checks(){
	$fooditems = array(
	"348e706c-ab3b-4a6e-a391-8de96ac7e0a3" => "PULL-APART BREAD",
	"92d26789-a296-4910-b7a9-b08e68d9e44d" => "GREEN SALAD",
	"abae32ec-05e5-4072-ba54-3a46764a5eff" => "MORTGAGE LIFTER BEANS",
	"242b1e7c-c233-4324-8b8c-cbf43723395b" => "TOMATO TOAST",
	"35b6c0b0-afdc-4df6-a690-30fbcd4a2a04" => "MORGANE’S BEEF CHILI",
	"3aa7eef8-a37a-4a05-83c5-22e99e531781" => "CHICKEN CAESAR",
	"7fde8abf-0589-4446-9905-9185b4c2b598" => "THREE SISTERS SALAD",
	"cf09ccf2-ece2-4771-81c5-deff1fe08d79" => "MARINATED STEAK BOWL",
	"a34074ea-2949-40f9-94fe-d3404607861b" => "OUR BURGER",
	"4b48707c-619b-42b1-8b8a-3da51feacf95" => "HAM & CHEESE PRESS",
	"6b6e59e3-0861-48b1-85c0-778df1126e19" => "PATTY MELT",
	"f58948c7-9feb-44ea-b0cc-9013406b9a51" => "COOKIES & MILK",
	);
	$foodprice = array(
	"348e706c-ab3b-4a6e-a391-8de96ac7e0a3" => "4.5",
	"92d26789-a296-4910-b7a9-b08e68d9e44d" => "8",
	"abae32ec-05e5-4072-ba54-3a46764a5eff" => "6",
	"242b1e7c-c233-4324-8b8c-cbf43723395b" => "5.5",
	"35b6c0b0-afdc-4df6-a690-30fbcd4a2a04" => "6",
	"3aa7eef8-a37a-4a05-83c5-22e99e531781" => "13",
	"7fde8abf-0589-4446-9905-9185b4c2b598" => "13",
	"cf09ccf2-ece2-4771-81c5-deff1fe08d79" => "15",
	"a34074ea-2949-40f9-94fe-d3404607861b" => "14",
	"4b48707c-619b-42b1-8b8a-3da51feacf95" => "12.5",
	"6b6e59e3-0861-48b1-85c0-778df1126e19" => "12.5",
	"f58948c7-9feb-44ea-b0cc-9013406b9a51" => "5",
	);
	$tablelist = array(
	"2644ece3-83dd-4deb-ae02-54f4df083e16" => "1",
	"c482731d-19a4-4d1f-90ab-e4dc4ac7d28d" => "2",
	"51f719e1-830e-40bb-9c1a-493ccc13cbc0" => "3",
	"56fe84ff-0655-4972-b2b0-b097e0a26ca1" => "4",
	"f5a3d871-1548-4be5-9f5a-e9a6e2011187" => "5",
	"cb336b2a-a16f-4734-8e62-f165d5a2ac03" => "6",
	"5d6e6290-a0bb-4aa9-ba3d-9071e5a65a93" => "7",
	"b0672e44-b959-4f09-ad7e-6f53a386d815" => "8",
	"4cf15df2-c1bf-435f-8e8b-ad6aba48937c" => "9",
	"31ccc746-4ade-43ea-add1-3dba513feb85" => "10",
	);

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://check-api.herokuapp.com/checks",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_POSTFIELDS => "",
	  CURLOPT_HTTPHEADER => array(
	    "authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjNjM2UzNmFiLWUyMTAtNDg4YS1hMDY3LTExZDQ4NGNiMzZmMyIsIm5hbWUiOiJqdW5pb3IgIzEyIn0.5FHmBnILzxmV86rf6lVqoXzfubqnl0V535HTxKVNhEM",
	    "cache-control: no-cache",
	  ),
	));

	$response = curl_exec($curl);
	$json = json_decode($response,true);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  $max = count($json);
		echo "<h1>Manage open checks</h1></br>";
		if($max == "0")
			echo "<h3>No open checks right now. </h3></br>";
		for($i = 0 ; $i < $max ; $i++){
	 	if(!$json[$i]['closed'])   //display only open checks
		{



			echo "
			<div class=\"container\">
				<button  type=\"button\" class=\"btn btn-primary btn-block\" data-toggle=\"collapse\" data-target=\"#demo".$i."\">"."<p>Table number:</p>".$tablelist[$json[$i]['tableId']]."<p>Check number:</p>".$json[$i]['id']."
				</button>  
				<div id=\"demo".$i."\" class=\"collapse\">";
  


			//echo($tablelist[$json[$i]['tableId']]);
			//get the details of the check
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://check-api.herokuapp.com/checks/".$json[$i]['id'],
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_POSTFIELDS => "",
			  CURLOPT_HTTPHEADER => array(
			    "authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjNjM2UzNmFiLWUyMTAtNDg4YS1hMDY3LTExZDQ4NGNiMzZmMyIsIm5hbWUiOiJqdW5pb3IgIzEyIn0.5FHmBnILzxmV86rf6lVqoXzfubqnl0V535HTxKVNhEM",
			    "cache-control: no-cache",
			  ),
			));

			$response = curl_exec($curl);
			$checkdetail = json_decode($response,true);
			$err = curl_error($curl);

			curl_close($curl);
			$totalitems = count($checkdetail['orderedItems']);
			if($totalitems == 0)
				echo "<h4>No items ordered yet!</h4>";	
			else{
				echo "<table class=\"table table-hover\">
					      <thead>
					      <tr>
						<th>Item</th>
						<th>Price</th>
						<th>Status</th>
					      </tr>
				    	      </thead>
				   	      <tbody>";
				for($j = 0; $j < $totalitems ; $j++){
					echo "<tr><td>".$fooditems[$checkdetail['orderedItems'][$j]['itemId']]."</td>";  //use the hash to get the food name corresponding to the id
					echo "<td>".$foodprice[$checkdetail['orderedItems'][$j]['itemId']]."</td>";  //use the hash to get the food name corresponding to the id
					if(($checkdetail['orderedItems'][$j]['voided']))
					echo "<td>Voided</td>";
					else{
					echo "<td>Not voided\n";
					echo "<form action=\"test.php\" method=\"post\">
						<input type = \"hidden\" name=\"orderedItemId\" value=".$checkdetail['orderedItems'][$j]['id']." >
						<input type = \"hidden\" name=\"checkId\" value=".$checkdetail['orderedItems'][$j]['checkId']." >
						<button class =\"btn btn-danger\" type = \"submit\" name =\"step\" value = 3>Void this item</button> </form>";
					echo "</td></tr>";
					}
				}
				echo "		</tbody>
					</table>";
			}
			//add menu item
			echo "		<p>
					<button type=\"button\" class=\"btn btn-primary \" data-toggle=\"modal\" data-target=\"#ModalLoginForm$i\">
			  		 Add a new menu item
					</button>
					<div id=\"ModalLoginForm$i\" class=\"modal fade\">
					    <div class=\"modal-dialog\" role=\"document\">
						<div class=\"modal-content\">
						    <div class=\"modal-header\">
							<h1 class=\"modal-title\">Choose an item to add from menu</h1>
						    </div>
						    <div class=\"modal-body\">
							<form role=\"form\" method=\"POST\" action=\"test.php\">
							    <div class=\"form-group\">
								<div>
								<input type = \"hidden\" name=\"checkId\" value=".$json[$i]['id']." >	
									<table class=\"table table-hover\">
									      <thead>
									      <tr>
										<th>Image</th>
										<th>Product Name</th>
									      </tr>
								    	      </thead>
								   	      <tbody>
										 <tr>
											<td> <img height=\"50\" width=\"50\" src=\"images/salad.jpg\" alt=\"GREEN SALAD\"> </td>
											<td><input type=\"radio\" name=\"itemnumber\" value=\"92d26789-a296-4910-b7a9-b08e68d9e44d\" /><h5>GREEN SALAD</h5></td>
										</tr>
										<tr>
											<td> <img height=\"50\" width=\"50\" src=\"images/bread.jpg\" alt=\"PULL-APART BREAD\">	</td>
											<td><input type=\"radio\" name=\"itemnumber\" value=\"348e706c-ab3b-4a6e-a391-8de96ac7e0a3\" /><h5>PULL-APART BREAD</h5></td>
									 	</tr>
										<tr>
											<td> <img height=\"50\" width=\"50\" src=\"images/beans.jpg\" alt=\"MORTGAGE LIFTER BEANS\">	</td>
											<td><input type=\"radio\" name=\"itemnumber\" value=\"abae32ec-05e5-4072-ba54-3a46764a5eff\" /><h5>MORTGAGE LIFTER BEANS</h5></td>
									 	</tr>
										<tr>
											<td> <img height=\"50\" width=\"50\" src=\"images/toast.jpg\" alt=\"TOMATO TOAST\">	</td>
											<td><input type=\"radio\" name=\"itemnumber\" value=\"242b1e7c-c233-4324-8b8c-cbf43723395b\" /><h5>TOMATO TOAST</h5></td>
									 	</tr>
										<tr>
											<td> <img height=\"50\" width=\"50\" src=\"images/beefchilli.jpg\" alt=\"MORGANE’S BEEF CHILI\">	</td>
											<td><input type=\"radio\" name=\"itemnumber\" value=\"35b6c0b0-afdc-4df6-a690-30fbcd4a2a04\" /><h5>MORGANE’S BEEF CHILI</h5></td>
									 	</tr>
										<tr>
											<td> <img height=\"50\" width=\"50\" src=\"images/ceasar.jpeg\" alt=\"CHICKEN CAESAR\">	</td>
											<td><input type=\"radio\" name=\"itemnumber\" value=\"3aa7eef8-a37a-4a05-83c5-22e99e531781\" /><h5>CHICKEN CAESAR</h5></td>
									 	</tr>
										<tr>
											<td> <img height=\"50\" width=\"50\" src=\"images/3sissalad.jpg\" alt=\"THREE SISTERS SALAD\">	</td>
											<td><input type=\"radio\" name=\"itemnumber\" value=\"7fde8abf-0589-4446-9905-9185b4c2b598\" /><h5>THREE SISTERS SALAD</h5></td>
									 	</tr>
										<tr>
											<td> <img height=\"50\" width=\"50\" src=\"images/marinated.jpg\" alt=\"MARINATED STEAK BOWL\">	</td>
											<td><input type=\"radio\" name=\"itemnumber\" value=\"cf09ccf2-ece2-4771-81c5-deff1fe08d79\" /><h5>MARINATED STEAK BOWL</h5></td>
									 	</tr>
										<tr>
											<td> <img height=\"50\" width=\"50\" src=\"images/burger.jpg\" alt=\"OUR BURGER\">	</td>
											<td><input type=\"radio\" name=\"itemnumber\" value=\"a34074ea-2949-40f9-94fe-d3404607861b\" /><h5>OUR BURGER</h5></td>
									 	</tr>
										<tr>
											<td> <img height=\"50\" width=\"50\" src=\"images/ham.jpg\" alt=\"HAM & CHEESE PRESS\">	</td>
											<td><input type=\"radio\" name=\"itemnumber\" value=\"4b48707c-619b-42b1-8b8a-3da51feacf95\" /><h5>HAM & CHEESE PRESS</h5></td>
									 	</tr>
										<tr>
											<td> <img height=\"50\" width=\"50\" src=\"images/patty.jpeg\" alt=\"PATTY MELT\">	</td>
											<td><input type=\"radio\" name=\"itemnumber\" value=\"6b6e59e3-0861-48b1-85c0-778df1126e19\" /><h5>PATTY MELT</h5></td>
									 	</tr>
										<tr>
											<td> <img height=\"50\" width=\"50\" src=\"images/cookiemilk.jpg\" alt=\"COOKIES & MILK\">	</td>
											<td><input type=\"radio\" name=\"itemnumber\" value=\"f58948c7-9feb-44ea-b0cc-9013406b9a51\" /><h5>COOKIES & MILK</h5></td>
									 	</tr>
									      </tbody>
									</table>		
								    <button type=\"submit\" name = \"step\" value = 4 class=\"btn btn-success\">Submit request</button>
								</div>
					   		    </div>
							</form>
	        				    </div>
	 					 </div>
					    </div>
					</div>
					";
			// close the check
			echo "		<form action=\"test.php\" method=\"post\">
						<input type = \"hidden\" name=\"checkId\" value=".$json[$i]['id']." >
						<button class=\"btn btn-danger\"type = \"submit\" name =\"step\" value = 5>Close this check
						</button> 
					</form>";
			echo "		</br></p>";
			echo "    </div>   
				  </br>  
				</div>";  //end div for collapse and body inside collapse

				
		}
	 
	}//end if case for open check
  

	}  //end successfull curl request
} //end of method
function close_check(){
	$checkId = $_POST['checkId'];
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://check-api.herokuapp.com/checks/".$checkId."/close",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "PUT",
	  CURLOPT_POSTFIELDS =>  "{\"orderedItemId\": \"$orderedItemId\"}\n",
	  CURLOPT_HTTPHEADER => array(
	    "authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjNjM2UzNmFiLWUyMTAtNDg4YS1hMDY3LTExZDQ4NGNiMzZmMyIsIm5hbWUiOiJqdW5pb3IgIzEyIn0.5FHmBnILzxmV86rf6lVqoXzfubqnl0V535HTxKVNhEM",
	    "cache-control: no-cache",
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	get_checks();

}

function void_item(){
	$orderedItemId = $_POST['orderedItemId'];
	$checkId = $_POST['checkId'];
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://check-api.herokuapp.com/checks/".$checkId."/voidItem",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "PUT",
	  CURLOPT_POSTFIELDS =>  "{\"orderedItemId\": \"$orderedItemId\"}\n",
	  CURLOPT_HTTPHEADER => array(
	    "authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjNjM2UzNmFiLWUyMTAtNDg4YS1hMDY3LTExZDQ4NGNiMzZmMyIsIm5hbWUiOiJqdW5pb3IgIzEyIn0.5FHmBnILzxmV86rf6lVqoXzfubqnl0V535HTxKVNhEM",
	    "cache-control: no-cache",
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	get_checks();

}
function add_item(){
	$checkId = $_POST['checkId'];
	$ItemId = $_POST['itemnumber'];
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://check-api.herokuapp.com/checks/".$checkId."/addItem",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "PUT",
	  CURLOPT_POSTFIELDS =>  "{\"itemId\": \"$ItemId\"}\n",
	  CURLOPT_HTTPHEADER => array(
	    "authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjNjM2UzNmFiLWUyMTAtNDg4YS1hMDY3LTExZDQ4NGNiMzZmMyIsIm5hbWUiOiJqdW5pb3IgIzEyIn0.5FHmBnILzxmV86rf6lVqoXzfubqnl0V535HTxKVNhEM",
	    "cache-control: no-cache",
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	get_checks();

}
function view_tables(){
	$url = 'https://check-api.herokuapp.com/tables';
	$data = array('tableId' => '2644ece3-83dd-4deb-ae02-54f4df083e16');

	$options = array(
	    'http' => array(
		'header'  => "Authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjNjM2UzNmFiLWUyMTAtNDg4YS1hMDY3LTExZDQ4NGNiMzZmMyIsIm5hbWUiOiJqdW5pb3IgIzEyIn0.5FHmBnILzxmV86rf6lVqoXzfubqnl0V535HTxKVNhEM\r\n",
		'method'  => 'GET',
		'content' => http_build_query($data),
	    ),
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	print_r(($result));
}
function view_closedchecks(){
	$fooditems = array(
	"348e706c-ab3b-4a6e-a391-8de96ac7e0a3" => "PULL-APART BREAD",
	"92d26789-a296-4910-b7a9-b08e68d9e44d" => "GREEN SALAD",
	"abae32ec-05e5-4072-ba54-3a46764a5eff" => "MORTGAGE LIFTER BEANS",
	"242b1e7c-c233-4324-8b8c-cbf43723395b" => "TOMATO TOAST",
	"35b6c0b0-afdc-4df6-a690-30fbcd4a2a04" => "MORGANE’S BEEF CHILI",
	"3aa7eef8-a37a-4a05-83c5-22e99e531781" => "CHICKEN CAESAR",
	"7fde8abf-0589-4446-9905-9185b4c2b598" => "THREE SISTERS SALAD",
	"cf09ccf2-ece2-4771-81c5-deff1fe08d79" => "MARINATED STEAK BOWL",
	"a34074ea-2949-40f9-94fe-d3404607861b" => "OUR BURGER",
	"4b48707c-619b-42b1-8b8a-3da51feacf95" => "HAM & CHEESE PRESS",
	"6b6e59e3-0861-48b1-85c0-778df1126e19" => "PATTY MELT",
	"f58948c7-9feb-44ea-b0cc-9013406b9a51" => "COOKIES & MILK",
	);
	$foodprice = array(
	"348e706c-ab3b-4a6e-a391-8de96ac7e0a3" => "4.5",
	"92d26789-a296-4910-b7a9-b08e68d9e44d" => "8",
	"abae32ec-05e5-4072-ba54-3a46764a5eff" => "6",
	"242b1e7c-c233-4324-8b8c-cbf43723395b" => "5.5",
	"35b6c0b0-afdc-4df6-a690-30fbcd4a2a04" => "6",
	"3aa7eef8-a37a-4a05-83c5-22e99e531781" => "13",
	"7fde8abf-0589-4446-9905-9185b4c2b598" => "13",
	"cf09ccf2-ece2-4771-81c5-deff1fe08d79" => "15",
	"a34074ea-2949-40f9-94fe-d3404607861b" => "14",
	"4b48707c-619b-42b1-8b8a-3da51feacf95" => "12.5",
	"6b6e59e3-0861-48b1-85c0-778df1126e19" => "12.5",
	"f58948c7-9feb-44ea-b0cc-9013406b9a51" => "5",
	);
	$tablelist = array(
	"2644ece3-83dd-4deb-ae02-54f4df083e16" => "1",
	"c482731d-19a4-4d1f-90ab-e4dc4ac7d28d" => "2",
	"51f719e1-830e-40bb-9c1a-493ccc13cbc0" => "3",
	"56fe84ff-0655-4972-b2b0-b097e0a26ca1" => "4",
	"f5a3d871-1548-4be5-9f5a-e9a6e2011187" => "5",
	"cb336b2a-a16f-4734-8e62-f165d5a2ac03" => "6",
	"5d6e6290-a0bb-4aa9-ba3d-9071e5a65a93" => "7",
	"b0672e44-b959-4f09-ad7e-6f53a386d815" => "8",
	"4cf15df2-c1bf-435f-8e8b-ad6aba48937c" => "9",
	"31ccc746-4ade-43ea-add1-3dba513feb85" => "10",
	);

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://check-api.herokuapp.com/checks",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_POSTFIELDS => "",
	  CURLOPT_HTTPHEADER => array(
	    "authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjNjM2UzNmFiLWUyMTAtNDg4YS1hMDY3LTExZDQ4NGNiMzZmMyIsIm5hbWUiOiJqdW5pb3IgIzEyIn0.5FHmBnILzxmV86rf6lVqoXzfubqnl0V535HTxKVNhEM",
	    "cache-control: no-cache",
	  ),
	));

	$response = curl_exec($curl);
	$json = json_decode($response,true);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  $max = count($json);
		echo "<h1>View closed checks</h1></br>";
		if($max == "0")
			echo "<h3>No closed checks right now. </h3></br>";
		for($i = 0 ; $i < $max ; $i++){
	 	if($json[$i]['closed']){

			echo "
			<div class=\"container\">
				<button type=\"button\" class=\"btn btn-primary btn-block\" data-toggle=\"collapse\" data-target=\"#demo".$i."\">"."<p>Table number:</p>".$tablelist[$json[$i]['tableId']]."<p>Check number:</p>".$json[$i]['id']."
				</button>  
				<div id=\"demo".$i."\" class=\"collapse\">";
  			//get the details of the check
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://check-api.herokuapp.com/checks/".$json[$i]['id'],
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_POSTFIELDS => "",
			  CURLOPT_HTTPHEADER => array(
			    "authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjNjM2UzNmFiLWUyMTAtNDg4YS1hMDY3LTExZDQ4NGNiMzZmMyIsIm5hbWUiOiJqdW5pb3IgIzEyIn0.5FHmBnILzxmV86rf6lVqoXzfubqnl0V535HTxKVNhEM",
			    "cache-control: no-cache",
			  ),
			));

			$response = curl_exec($curl);
			$checkdetail = json_decode($response,true);
			$err = curl_error($curl);

			curl_close($curl);
			$totalitems = count($checkdetail['orderedItems']);
			echo "<table class=\"table table-hover\">
					      <thead>
					      <tr>
						<th>Item</th>
						<th>Price</th>
					      </tr>
				    	      </thead>
				   	      <tbody>";

			if($totalitems == 0)
				echo "<tr> <td colspan= 3 >No items ordered!</td></tr>";
			else{	
				
				for($j = 0; $j < $totalitems ; $j++){
					echo "<tr><td>";
					echo $fooditems[$checkdetail['orderedItems'][$j]['itemId']]."</td>";  //use the hash to get the food name corresponding to the id
					echo "<td>".$foodprice[$checkdetail['orderedItems'][$j]['itemId']]."</td>";  //use the hash to get the food name corresponding to the id
					echo "</tr>";
					}
				
			}
				echo "<tr><td>Tax</td><td>".$json[$i]['tax']."</td></tr>";
				echo "<tr><td>Tip</td><td>".$json[$i]['tip']."</td></tr>";
				echo "</tbody></table>";
			
			

			echo "    </div>   
				  </br>  
				</div>";  //end div for collapse and body inside collapse


		}
		}
	}

}

switch($_REQUEST['step']){
	case 1:  view_closedchecks(); //view closed checks
	break;
	case 2: get_checks(); //manage open checks
	break;
	case 3: void_item();
	break;
	case 4: add_item();
	break;
	case 5: close_check();
	break;
	case 6: post_check($_GET['tablenumber']);
	break;
}
  echo "</body></html>";
?>


