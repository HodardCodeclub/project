<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
	<tr>
		 <td>first</td><td><input type="number" id="txt1" onkeyup="sum();" ></td>
	</tr>
	<tr>
		<td>second</td><td><input type="number" id="txt2" onkeyup="sum();"></td>
	</tr>
	<tr>
		<td>answer</td><td><input type="number" id="txt3" onkeyup="sum();" ></td>
	</tr>
</table>
</body>
</html>

<script>
	
	function sum() {
      var txtFirstNumberValue = document.getElementById('txt1').value;
      var txtSecondNumberValue = document.getElementById('txt2').value;
      var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txt3').value = result;
      }
}
</script>