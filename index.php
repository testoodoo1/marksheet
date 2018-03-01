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
	<select id="student_name" name="student_name">
		<option value=" "> -- Select Name -- </option>
		<?php 
			$conn = new mysqli('localhost','root','1projectK!','marksheet');
			$result = $conn->query("SELECT Name FROM `Student Table`");
			while($row = $result->fetch_assoc()){
		?>
		<option value="<?php echo $row["Name"] ?>"> <?php echo $row["Name"] ?> </option>;
		<?php
			}
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
			    <td>Maths</td>
			    <td><input name="maths_mark" id="mark" maxlength="3" size="3"></td>
			    <td>Germany</td>
			  </tr>
			  <tr>
			    <td>Science</td>
			    <td><input name="science_mark" id="mark" maxlength="3" size="3"></td>
			    <td>Mexico</td>
			  </tr>
			  <tr>
			    <td>Social</td>
			    <td><input name="social_mark" id="mark" maxlength="3" size="3"></td>
			    <td>Austria</td>
			  </tr>
			  <tr>
			    <td>English</td>
			    <td><input name="english_mark" id="mark" maxlength="3" size="3"></td>
			    <td>UK</td>
			  </tr>
			  <tr>
			    <td>Malayalam</td>
			    <td><input name="malayalam_mark" id="mark" maxlength="3" size="3"></td>
			    <td>Canada</td>
		  	  </tr>
		  	  <tr>
		  	    <td colspan="3">
		  	  	 <input type="submit" value="submit" id="markDetail">
		  	  	 <input type="submit" value="Proceed To Marksheet" id="marksheet">
		  	  	</td>
		  	  </tr>
</form>
		</table>	
	</body>

</html>