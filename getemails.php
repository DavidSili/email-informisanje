<?php

include 'config.php';

if(isset($_GET["xbroj"])) $broj=$_GET["xbroj"];
    else $broj="";
if(isset($_GET["xima"])) $ima=$_GET["xima"];
    else $ima="";
if(isset($_GET["xdist"])) $dist=$_GET["xdist"];
    else $dist="";
if(isset($_GET["kom"])) $kom=$_GET["kom"];
    else $kom="";
if(isset($_GET["pem"])) $pem=$_GET["pem"];
    else $pem="";
if(isset($_GET["serv"])) $serv=$_GET["serv"];
    else $serv="";
if(isset($_GET["spem"])) $spem=$_GET["spem"];
    else $spem="";
if(isset($_GET["servis"])) $servis=$_GET["servis"];
    else $servis="";
if(isset($_GET["lpem"])) $lpem=$_GET["lpem"];
    else $lpem="";
if(isset($_GET["ledkom"])) $ledkom=$_GET["ledkom"];
    else $ledkom="";

$passtekst="";
    $sql="SELECT email FROM abook WHERE `email` IS NOT NULL";
    if ($ima=="da") $sql.=' AND brojviljuskara IS NOT NULL AND brojviljuskara != "A"';
    if ($dist=="da") $sql.=' AND distributer="da"';
	if ($kom!="0" AND $kom!="x") $sql.=' AND komercijalista="'.$kom.'"';
		elseif ($kom=="x") $sql.=' AND komercijalista IS NULL';
	if ($serv!="0" AND $serv!="x") $sql.=' AND serviser="'.$serv.'"';
		elseif ($serv=="x") $sql.=' AND serviser IS NULL';
	if ($ledkom!="0" AND $ledkom!="x") $sql.=' AND ledkom="'.$ledkom.'"';
		elseif ($ledkom=="x") $sql.=' AND ledkom IS NULL';
		
$datum1= date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d"), date("Y")-3));
$datum2= date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d"), date("Y")-2));
$datum3= date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d"), date("Y")-1));
$datum4= date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")-6, date("Y")));
$datum5= date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")-3, date("Y")));
$datum6= date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));
$datum7= date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));

	if ($pem==0) $sql.=' AND pemdat IS NULL';
	if ($spem==0) $sql.=' AND spem IS NULL';
	if ($lpem==0) $sql.=' AND lmail IS NULL';
	if ($servis==0) $sql.=' AND posserv IS NULL';
	if ($pem==1) $sql.=" AND pemdat<'$datum1'";
	if ($pem==2) $sql.=" AND pemdat<'$datum2'";
	if ($pem==3) $sql.=" AND pemdat<'$datum3'";
	if ($pem==4) $sql.=" AND pemdat<'$datum4'";
	if ($pem==5) $sql.=" AND pemdat<'$datum5'";
	if ($pem==6) $sql.=" AND pemdat<'$datum6'";
	if ($pem==7) $sql.=" AND pemdat<'$datum7'";
	if ($spem==1) $sql.=" AND spem<'$datum1'";
	if ($spem==2) $sql.=" AND spem<'$datum2'";
	if ($spem==3) $sql.=" AND spem<'$datum3'";
	if ($spem==4) $sql.=" AND spem<'$datum4'";
	if ($spem==5) $sql.=" AND spem<'$datum5'";
	if ($spem==6) $sql.=" AND spem<'$datum6'";
	if ($spem==7) $sql.=" AND spem<'$datum7'";
	if ($lpem==1) $sql.=" AND lmail<'$datum1'";
	if ($lpem==2) $sql.=" AND lmail<'$datum2'";
	if ($lpem==3) $sql.=" AND lmail<'$datum3'";
	if ($lpem==4) $sql.=" AND lmail<'$datum4'";
	if ($lpem==5) $sql.=" AND lmail<'$datum5'";
	if ($lpem==6) $sql.=" AND lmail<'$datum6'";
	if ($lpem==7) $sql.=" AND lmail<'$datum7'";
	if ($servis==1) $sql.=" AND posserv<'$datum1'";
	if ($servis==2) $sql.=" AND posserv<'$datum2'";
	if ($servis==3) $sql.=" AND posserv<'$datum3'";
	if ($servis==4) $sql.=" AND posserv<'$datum4'";
	if ($servis==5) $sql.=" AND posserv<'$datum5'";
	if ($servis==6) $sql.=" AND posserv<'$datum6'";
	if ($servis==7) $sql.=" AND posserv<'$datum7'";
	
	$xsql=$sql;
    $result=mysqli_query($mysqli,$sql);
    $num=mysql_num_rows($result);
    $puta=ceil($num / $broj);
    for ($i = 1; $i <= $puta; $i++) {
     	if ($i==1) $result=mysqli_query($mysqli,$xsql.' LIMIT '.$broj);
    	elseif ($i>1) {
    	$od=($i-1)*$broj+1;
    	$result=mysqli_query($mysqli,$xsql.' LIMIT '.$od.', '.$broj);
    	}
   	$teksta="";
   	$tekstb="";
        while($row=$result->fetch_assoc()) {
            $teksta.=$row['email'].', ';
            $tekstb.=$row['email'].'&#10;';
        }
    	$passtekst.='<div style="width:100%;margin-bottom:25px;padding-bottom:
		10px;border-bottom:thin solid #000"><textarea id="txta'.$i.'" onclick="SelectAll(\'txta'.$i.'\')" style="width:48%;height:50px" rows="2" wrap="hard">'.$teksta;
	$passtekst=substr($passtekst, 0, -2);
   	
    	$passtekst.='</textarea><textarea id="txtb'.$i.'" onclick="SelectAll(\'txtb'.$i.'\')" style="width:48%;height:50px;float:right" rows="2" wrap="hard">'.$tekstb;
	$passtekst=substr($passtekst, 0, -5);
    	$passtekst.='</textarea><div style="text-align:center;margin-top:10px"><input type="button" id="poslato" value="Poslato" onclick="pem('.$i.')" style="width:200px" /></div></div>';
 	}

$row=array("rezultat" => $passtekst, "ukupno" => $num);
echo json_encode($row);
?>