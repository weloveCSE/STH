<!DOCTYPE html>
<html>
<head>
	<title>Assignment</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  	<!-- <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
  	<script type="text/javascript" src="lib/jquery/jquery-2.2.4.min.js"></script>
  	<script type="text/javascript" src="lib/js/bootstrap.min.js"></script> -->
  	<style type="text/css">
  		th{
  			width: 25%;
  		}
      
  	</style>
  	<script type="text/javascript">
  		function callFuntion(){
        document.getElementById('year_th').style.display='';
       // document.getElementById('id_start').style.display='';
        //document.getElementById('id_end').style.display='';
        document.getElementById('select_year').style.display='';
		//alert(document.getElementById("branch").value);
      }
      function callFuntion2(){
		  //alert(document.getElementById("year").value);
      		document.getElementById('id_start').style.display='';
      		document.getElementById('id_end').style.display='';
      		document.getElementById('td_start').style.display='';
      		document.getElementById('td_end').style.display='';
      		document.getElementById('empty1').style.dis="none";
      		document.getElementById('empty2').style.dis="none";

      }
	  function validate(){
		  if((document.getElementById('start_id').value!="")&&document.getElementById("end_id").value!=""&&document.getElementById("branch").value!="11"&&document.getElementById("year").value!="11"){
			  document.getElementById('form').submit();
		  }
		  else{
		  alert("Check your details");
		  }
	  }
	  function setAll(){
		  
		  document.getElementById('select_year').style.display='';
		  document.getElementById('year_th').style.display='';//document.getElementById('year').value='';
		  document.getElementById('id_start').style.display='';
      		document.getElementById('id_end').style.display='';
			document.getElementById('td_start').style.display='';
      		document.getElementById('td_end').style.display='';
		  //alert('naveen');
	  }
  	</script>
</head>
<body>
<div class="container">
<div class="row">
	<div class="well">
		<h1>STH</h1>

	</div>
</div>
<div class="row">
	<div class="col-lg-12 well">
		<form name="form" id="form" action="index.php" method="post">
		<table class="table" id="table1">
			<thead>
			
			<tr id="heading" >
				<th id="branch_th">Choose your branch:</th>
				<th id="year_th"  style="display:none">Choose your year</th>
				<th id="id_start" style="display:none"> Enter start Roll Number</th>
				<th id="id_end" style="display:none">Enter end Roll number</th>
				<th id="empty1"></th>
				<th id="empty2"></th>
			</tr>
			</thead>
			<tbody>
				<tr id="tbody">
					<td class="col-lg-1">
						<select class="form-control " id="branch" name="branch" onchange="callFuntion()" >
							<option value="11">Choose your branch</option>
							<option value="CSE">CSE</option>
							<option value="ECE">ECE</option>
						</select>
					</td>
          <td id="select_year" style="display:none;">
            <select class="form-control " id="year" name="year" onchange="callFuntion2()">
              <option value="11">Choose your year</option>
              <option value="E1">E1</option>
              <option value="E2">E2</option>
              <option value="E3">E3</option>
              <option value="E4">E4</option>
            </select>
          </td>
          <td id="td_start" style="display:none">
          <input type="text" name="start_id" id="start_id" placeholder="Enter starting id" class="form-control">
          </td>
          <td id="td_end" style="display:none">
          <input type="text" name="end_id" id="end_id" placeholder="Enter Ending id" class="form-control">
          </td>
          <td>
          <input type="button" id="button" name="button" class="btn btn-success" onClick="validate()" value="Generate">
          </td>
				</tr>

			</tbody>
		</table>
		</form>
	</div>		
</div>

</div>
</body>
</html>
<?php
$link=mysqli_connect("localhost","root","") or die("Can't connect to database ".mysql_error());
mysqli_select_db($link,"naveene3");
echo "<div class='container'>";
if($_SERVER['REQUEST_METHOD']=='POST'){
	$year=$_POST['year'];
	$branch=$_POST['branch'];
	$sid=$_POST['start_id'];
	$eid=$_POST['end_id'];
	$var=array($branch,$year,$sid,$eid);
	$_GLOBALS['id']=$year;
//	echo $year.'<br>'.$branch.'<br>'.$sid.'<br>'.$eid.'<br>';
$query="SELECT * FROM student_details where branch='$branch' and year='$year' and sno  between '$sid' and '$eid'";
$result=mysqli_query($link,$query);
//die($result);
//die(mysql_error());
echo '<script type="text/javascript">',
     'setAll();',
			'</script>';
if(mysqli_num_rows($result)!=0){
	echo "<table class='table' ><thead><tr><th>sno</th><th>id</th><th>name</th><th>branch</th><th>year</th>";
	
$query="SELECT distinct(subject) FROM student_result";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
echo "<th>$row[0]</th>";}
echo "</tr></thead>";
//For student table;
/*$query="SELECT * FROM student_details where branch='$branch' and year='$year' and sno  between '$sid' and '$eid'";
$result=mysqli_query($link,$query);
//die($result);
//die(mysql_error());
if(mysqli_num_rows($result)!=0){
while($row=mysqli_fetch_array($result)){
	echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td>";
	$query1="select id ,max(case when subject='DBMS' then marks else 0 end) as DBMS,max(case when subject='JAVA' then marks else 0 end) as JAVA,max(case when subject='C' then marks else 0 end) as C,max(case when subject='PYTHON' then marks else 0 end) as PYTHON from student_result where id='$row[1]' group by(id)";
	$result2=mysqli_query($link,$query1);
	while($row2=mysqli_fetch_array($result2))
		echo "<td>$row2[1]</td><td>$row2[2]</td><td>$row2[3]</td><td>$row2[4]</td><tr>";
	
}*/
$query="select s.sno ,s.id,s.name,s.branch,s.year ,max(case when subject='C' then marks else 0 end) as C,max(case when subject='DBMS' then marks else 0 end) as DBMS,max(case when subject='JAVA' then marks else 0 end) as JAVA,max(case when subject='PYTHON' then marks else 0 end) as PYTHON from student_details s,student_result r where s.id=r.id and s.branch='$branch' and year='$year' and s.sno between '$sid' and '$eid' group by(r.id)";

$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
		echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td></tr>";
		
}
echo "</tr></thead></table>";	
}
}
echo "</div>";



?>