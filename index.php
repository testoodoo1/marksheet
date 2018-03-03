<!DOCTYPE html>
<html>
	<title>MarkSheet</title>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		</script>
		<style>
		table {
		    font-family: arial, sans-serif;
		    border-collapse: collapse;
		    width: 30%;
		}

		td, th {
		    border: 1px solid #dddddd;
		    text-align: left;
		    padding: 8px;
		}

		tr:nth-child(even) {
		    background-color: #dddddd;
		}
		</style>		
	</head>
	<body>

<form action="" id="marks" method="post">		
	<select id="student_id" name="student_id">
		<option value=" "> -- Select Name -- </option>
		<?php 
			$con1 = mysqli_connect('localhost','root','1projectK!','marksheet');
			$result = $con1->query("SELECT * FROM `Student Table`");
			while($row = $result->fetch_assoc()){
		?>
		<option value="<?php echo $row["Student ID"] ?>"> <?php echo $row["Name"] ?> </option>;
		<?php
			}
			mysqli_close($con1);
		?>
	</select>
	<br/><br/>
		<table>
		  <tr>
		    <th>Subject</th>
		    <th>Marks</th>
		    <th>Classes</th>
		  </tr>	  
			  <tr>
				  <?php
				  	$conn = mysqli_connect('localhost','root','1projectK!','marksheet');
				  	$result1 = $conn->query("SELECT * FROM `Subject Master`");
				  	while($row1 = $result1->fetch_assoc()) {
				  ?>
				  	<td><?php echo $row1["Subject"] ?></td>
				  	<td><input name="<?php echo $row1['Subject ID'] ?>" id="mark" maxlength="3" size="3"></td>
				  	<td>test</td>
			  </tr>
			  <?php  } mysqli_close($conn); ?>
		  	  <tr>
		  	    <td colspan="3">
		  	  	 <input type="submit" value="submit" id="markDetail">

		  	  	</td>
		  	  </tr>
		</table>	
</form>
		
	</body>
	<?php
		if(isset($_POST['student_id'])) 
		{
			$student_id = $_POST['student_id'];
			$con = mysqli_connect('localhost','root','1projectK!','marksheet');
			for($i =1; $i<6; $i++){
				$mark = $_POST['Sub'.$i];
				$sql = "INSERT INTO `Marks Table` (`Student ID` ,`Subject ID` ,`Marks`) VALUES ('$student_id', 'Sub$i', '$mark');";
				if (mysqli_query($con, $sql)) {
					echo "New records created successfully";
				} else {
					echo "Error: " . $query2 . "<br>" . $conn->error;
				}
			}	
			mysqli_close($con);		
		}
	?>

<script>
$(function() {
	$('#marks').submit(function() {
		alert('hi');
		data = $(this).serialize();
		$.ajax({
			type : "POST",
			url  : "index.php",
			data : data,
			dataType: 'text',
			success : function(data){

			}
		})
	});
})
</script>

</html>