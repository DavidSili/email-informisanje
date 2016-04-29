<?php
	date_default_timezone_set('Europe/Belgrade');

include 'config.php';
$imeuser='Mika Mikić';
$posaouser='komercijalista';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Web address book Apex Service | Send e-mail</title>
<script src="js/jquery-1.8.3.min.js" ></script>
<style type="text/css">
<!--
.button {
	height: 50px;
	width: 200px;
	border: thin solid #FF0000;
	background-color: #999999;
	font-family: "Times New Roman", Times, serif;
	font-size: 20px;
	font-weight: bold;
}
.style1 {
	font-family: "Times New Roman", Times, serif;
	font-size: 36px;
	font-weight: bold;
	font-style: italic;
}
-->
</style>
</head>

<body>
<div style="float:left;margin:130px 0 0 20px;font-family:arial"><h2>Send e-mail</h2></div><div align="center"><img src="images/apex logo.jpg" width="458" height="184" /><span class="style1">Web address book </span>
  <em>ver. 1.0.</em><a href="logout.php" style="float:right;margin-top:170px;font-family:arial">odjava</a><a href="index.php" style="float:right;margin:170px 20px 0 0;font-family:arial">Početna stranica</a>
  <hr />
</div>
<div style="position:absolute;top:220px;left:8px;right:8px;bottom:8px;font-family:arial">
    <div style="width:180px;height:100%;float:left;overflow:auto">
        <div style="float:left;width:168px;height:100%;padding:0 5px">
            <div>Ima viljuškare</div>
            <input type="hidden" name="ime" id="ime" value="<?php echo $imeuser;?>" />
            <input type="hidden" name="posao" id="posao" value="<?php echo $posaouser;?>" />
			<div><input type="radio" name="ima" value="da" id="ima_da" checked /> da | ne <input type="radio" name="ima" value="ne" id="ima_ne" /></div>
            <div>Distributer</div>
            <div><input type="radio" name="dist" value="da" id="dist_da" checked /> da | ne <input type="radio" name="dist" value="ne" id="dist_ne" /></div>
            <div>Grupe po:</div>
            <div>
                <select name="broj" id="broj">
                    <option>10</option>
                    <option selected="selected">20</option>
                    <option>30</option>
                    <option>50</option>
                    <option>100</option>
                    <option>200</option>
                    <option>500</option>
                    <option>1000</option>
                    <option value="999999999">svi zajedno</option>
                </select>
            </div>
			<div style="border-top:thin solid #000;margin-top:10px">Komercijalista:</div>
			<div>
				<select name="kom" id="kom" style="width:166px;margin-left:2px">
                    			<option value="0" selected="selected">bilo koji</option>
                   			<option value="x">nedodeljen</option>
<?php
$sql="SELECT imeiprezime FROM users WHERE posao='komercijalista'";
$result=mysql_query($sql);
while($row=mysql_fetch_assoc($result)) {
$imeiprezime=$row['imeiprezime'];
echo "<option>$imeiprezime</option>";
}
?>
				</select>
			</div>
			<div>Poslednji email:</div>
			<div>
				<select name="pem" id="pem">
                    <option value="0" selected="selected">nikada poslat</option>
					<option value="1">Pre više od 3 godine</option>
					<option value="2">Pre više od 2 godine</option>
					<option value="3">Pre više od godinu dana</option>
					<option value="4">Pre više od 6 meseci</option>
					<option value="5">Pre više od 3 meseca</option>
					<option value="6">Pre više od 2 meseca</option>
					<option value="7">Pre više od mesec dana</option>
					<option value="8">Bilo kad</option>
				</select>
			</div>
			<div style="border-top:thin solid #000;margin-top:10px">LED komercijalista:</div>
			<div>
				<select name="ledkom" id="ledkom" style="width:166px;margin-left:2px">
                    			<option value="0" selected="selected">bilo koji</option>
                   			<option value="x">nedodeljen</option>
<?php
$sql="SELECT imeiprezime FROM users WHERE posao='led'";
$result=mysql_query($sql);
while($row=mysql_fetch_assoc($result)) {
$imeiprezime=$row['imeiprezime'];
echo "<option>$imeiprezime</option>";
}
?>
				</select>
			</div>
			<div>Poslednji email:</div>
			<div>
				<select name="lpem" id="lpem">
                    <option value="0" selected="selected">nikada poslat</option>
					<option value="1">Pre više od 3 godine</option>
					<option value="2">Pre više od 2 godine</option>
					<option value="3">Pre više od godinu dana</option>
					<option value="4">Pre više od 6 meseci</option>
					<option value="5">Pre više od 3 meseca</option>
					<option value="6">Pre više od 2 meseca</option>
					<option value="7">Pre više od mesec dana</option>
					<option value="8">Bilo kad</option>
				</select>
			</div>
			<div style="border-top:thin solid #000;margin-top:10px">Serviser:</div>
			<div>
				<select name="serv" id="serv" style="width:166px;margin-left:2px">
                    			<option value="0" selected="selected">bilo koji</option>
								<option value="x">nedodeljen</option>
<?php
$sql="SELECT imeiprezime FROM users WHERE posao='serviser'";
$result=mysql_query($sql);
while($row=mysql_fetch_assoc($result)) {
$imeiprezime=$row['imeiprezime'];
echo "<option>$imeiprezime</option>";
}
?>
				</select>
			</div>
			<div>Poslednji email:</div>
			<div>
				<select name="spem" id="spem">
                    			<option value="0" selected="selected">nikada poslat</option>
					<option value="1">Pre više od 3 godine</option>
					<option value="2">Pre više od 2 godine</option>
					<option value="3">Pre više od godinu dana</option>
					<option value="4">Pre više od 6 meseci</option>
					<option value="5">Pre više od 3 meseca</option>
					<option value="6">Pre više od 2 meseca</option>
					<option value="7">Pre više od mesec dana</option>
					<option value="8">Bilo kad</option>
				</select>
			</div>
			<div>Poslednji servis:</div>
			<div>
				<select name="servis" id="servis">
                    			<option value="0" selected="selected">nikada servisiran</option>
					<option value="1">Pre više od 3 godine</option>
					<option value="2">Pre više od 2 godine</option>
					<option value="3">Pre više od godinu dana</option>
					<option value="4">Pre više od 6 meseci</option>
					<option value="5">Pre više od 3 meseca</option>
					<option value="6">Pre više od 2 meseca</option>
					<option value="7">Pre više od mesec dana</option>
					<option value="8">Bilo kad</option>
				</select>
			</div>
            <div style="text-align:center"><button type="button" onclick="pokazi()" style="margin:10px 0">Pokaži</button></div>
            <div>Ukupno: <div id="ukupno" style="float:right;margin-right:15px"></div></div>
        </div>
    </div>
    <div style="float:left;width:2px;height:100%;background:#aaa;margin-left:10px"></div>
    <div id="rezultat" style="position:absolute;top:0;right:0;bottom:0;left:200px">
    </div>
</div>
<script type="text/javascript">
	function pokazi()
	{
document.getElementById('rezultat').innerHTML="<img style=\"position:absolute;width:100px;height:100px;left:50%;top:50%;margin-left:-100px;margin-top:-100px;\" src=\"images/loading.gif\" />";
if(document.getElementById('ima_da').checked) {
  var ima="da";
}else if(document.getElementById('ima_ne').checked) {
  var ima="ne";
}
if(document.getElementById('dist_da').checked) {
  var dist="da";
}else if(document.getElementById('dist_ne').checked) {
  var dist="ne";
}

		$.getJSON('getemails.php', {xbroj:$('#broj').val(),xima: ima, xdist: dist, kom:$('#kom').val(), pem:$('#pem').val(), serv:$('#serv').val(), spem:$('#spem').val(), servis:$('#servis').val(), lpem:$('#lpem').val(), ledkom:$('#ledkom').val()}, function(data) {
		$('#rezultat').html(data.rezultat);
		$('#ukupno').html(data.ukupno);
		});
	}
	function SelectAll(id)
	{
	    document.getElementById(id).focus();
	    document.getElementById(id).select();
	}
	function pem(posebno)
	{
if(document.getElementById('ima_da').checked) {
  var ima="da";
}else if(document.getElementById('ima_ne').checked) {
  var ima="ne";
}
if(document.getElementById('dist_da').checked) {
  var dist="da";
}else if(document.getElementById('dist_ne').checked) {
  var dist="ne";
}

		$.getJSON('pem.php', {xbroj:$('#broj').val(), xima: ima,xdist: dist, kom:$('#kom').val(), pem:$('#pem').val(), serv:$('#serv').val(), spem:$('#spem').val(), servis:$('#servis').val(), lpem:$('#lpem').val(), ledkom:$('#ledkom').val(), xposebno:posebno, ime:$('#ime').val(), posao:$('#posao').val()}, function(data) {
		});
	pokazi();
	}
</script>
</body>
</html>