<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Police Emergency Service System</title>
</head>

<body bgcolor="#DFDFDF">
<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
<script>
function jarrellpess()
	{
		var x=document.forms["frmLogCall"]
		["callerName"].value;
		if (x==null || x=="")
			{
				alert("Caller Name is required.");
				return false;
			}
	}
</script>
<?php require_once 'nav.php';
	?>
	<?php require_once 'db.php';
	
	$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
	if($conn->connect_error) {
		die("Connection failed: ". $conn->connect_error);
	}
$sql = "SELECT * FROM incidenttype";

$result = $conn-> query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result-> fetch_assoc()) {
			$incidentType[$row['incidentTypeId']] = $row['incidentTypeDesc'];
		}
	}
$conn->close();
	?> 
	<fieldset>
		<br>
	<center><legend><strong>Log Call</strong></legend></center>
		<br>
		<form name="frmLogCall" method="post" action="dispatch.php" onSubmit="return jarrellpess();">
		<table width="45%" border="2" align="center" cellpadding="5" cellspacing="5">
		<tr>
		<td width="20%" align="center">Name of Caller:</td>
			<td width="50%"><input type="text" name="callerName" id="callername" pattern="[A -z]+" required </td>
			</tr>
			<tr>
				<td width="20%" align="center">Contact Number:</td>
				<td width="50%"><input type ="text" name="contactNo" id="contactNo" pattern="[0-9]+" minlength="8" maxlength="8" required></td>
					</tr>
			<tr>
			<td width="50%" align="center">Location:</td>
				<td width="50%"><input type="text" name="location" id="location" required> </td>
			</tr>
			<tr>
			<td width="50%" align="center">Incident Type:</td>
				<td width="50%"><select name="incidentType" id="incidentType">
					<?php foreach($incidentType as $key=> $value) {?>
					<option value="<?php echo $key ?> " ><?php echo $value?> </option> <?php } ?>
					</select>
					</td>
			</tr>
			<tr>
			<td width="50%" align="center">Description:</td>
			<td width="50%"><textarea name="incidentDesc" id="incidentDesc" cols="45" rows="5" maxlength="100" required></textarea></td>
			</tr>
			<tr>
				<table width="40%" border="0" align="center" cellpadding="5" cellspacing="5">
					<td align="center">
					<input type="reset" name="cancelProcess" id="cancelProcess" value="Reset"
					</td>
					<td align="center">
					<input type='submit' name="btnProcessCall" id="btnProcessCall" value="Process Call"A
					</td>
				</table>
			</tr>
			</table>
		</form>
	</fieldset>
</body>
</html>