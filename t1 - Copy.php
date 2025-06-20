<!DOCTYPE html>
<html lang="en">
<head>
<title>ตัวชี้วัด</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="images/icons/favicon.ico" /> 
<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/tb/Table_Responsive_v2/vendor/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/tb/Table_Responsive_v2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/tb/Table_Responsive_v2/vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/tb/Table_Responsive_v2/vendor/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/tb/Table_Responsive_v2/vendor/perfect-scrollbar/perfect-scrollbar.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/tb/Table_Responsive_v2/css/util.css">
<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/tb/Table_Responsive_v2/css/main.css">

<meta name="robots" content="noindex, follow">
<script nonce="d8d741dc-e6ed-4178-8626-8dcbea841ec8">(function(w,d){!function(bv,bw,bx,by){bv[bx]=bv[bx]||{};bv[bx].executed=[];bv.zaraz={deferred:[],listeners:[]};bv.zaraz.q=[];bv.zaraz._f=function(bz){return function(){var bA=Array.prototype.slice.call(arguments);bv.zaraz.q.push({m:bz,a:bA})}};for(const bB of["track","set","debug"])bv.zaraz[bB]=bv.zaraz._f(bB);bv.zaraz.init=()=>{var bC=bw.getElementsByTagName(by)[0],bD=bw.createElement(by),bE=bw.getElementsByTagName("title")[0];bE&&(bv[bx].t=bw.getElementsByTagName("title")[0].text);bv[bx].x=Math.random();bv[bx].w=bv.screen.width;bv[bx].h=bv.screen.height;bv[bx].j=bv.innerHeight;bv[bx].e=bv.innerWidth;bv[bx].l=bv.location.href;bv[bx].r=bw.referrer;bv[bx].k=bv.screen.colorDepth;bv[bx].n=bw.characterSet;bv[bx].o=(new Date).getTimezoneOffset();if(bv.dataLayer)for(const bI of Object.entries(Object.entries(dataLayer).reduce(((bJ,bK)=>({...bJ[1],...bK[1]})))))zaraz.set(bI[0],bI[1],{scope:"page"});bv[bx].q=[];for(;bv.zaraz.q.length;){const bL=bv.zaraz.q.shift();bv[bx].q.push(bL)}bD.defer=!0;for(const bM of[localStorage,sessionStorage])Object.keys(bM||{}).filter((bO=>bO.startsWith("_zaraz_"))).forEach((bN=>{try{bv[bx]["z_"+bN.slice(7)]=JSON.parse(bM.getItem(bN))}catch{bv[bx]["z_"+bN.slice(7)]=bM.getItem(bN)}}));bD.referrerPolicy="origin";bD.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bv[bx])));bC.parentNode.insertBefore(bD,bC)};["complete","interactive"].includes(bw.readyState)?zaraz.init():bv.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body>
 
 
<?php
 include"connect.php";
 
 if($_GET['s']==""){ $_GET['s']="COPD";}
 ?>
 
 


 
<div class="limiter">
<div class="container-table100">
 


 
 

  <table  border="0" style="width:95%">
 
  <tr>
   <td>
ค้นหา 
 </td>
    <td> 
   <select name="s"    class="form-control"  OnChange="window.location='?s='+this.value;"  >
	   <option value="">เลือกโรค</option>
       
	   <option value="HT"  <?php if($_GET['s']=="HT"){ echo 'selected';}?>>HT</option>
	   <option value="DM"  <?php if($_GET['s']=="DM"){ echo 'selected';}?>>DM</option>
	   <option value="Asthma"  <?php if($_GET['s']=="Asthma"){ echo 'selected';}?>>Asthma</option>
	   <option value="COPD"  <?php if($_GET['s']=="COPD"){ echo 'selected';}?>>COPD</option>
	   <option value="CKD"  <?php if($_GET['s']=="CKD"){ echo 'selected';}?>>CKD</option>
	   <option value="Pneumonia"  <?php if($_GET['s']=="Pneumonia"){ echo 'selected';}?>>Pneumonia</option>
	   <option value="Sepsis"  <?php if($_GET['s']=="Sepsis"){ echo 'selected';}?>>Sepsis</option>
	   <option value="Severe Sepsis"  <?php if($_GET['s']=="Severe Sepsis"){ echo 'selected';}?>>Severe Sepsis</option>
	   <option value="Septic Shock"  <?php if($_GET['s']=="Septic Shock"){ echo 'selected';}?>>Septic Shock</option>
 </select>
 </td>
  <td style="width:70%">
  
 </td>
  </tr>
 
</table>

 


<?php 
$and='';
if($_GET['s']=="HT"){
	$and="  and ( (ov.pdx = 'i10') 
 or (ov.dx0 = 'i10') 
 or (ov.dx1 = 'i10') 
 or (ov.dx2 = 'i10') 
 or (ov.dx3 = 'i10') 
 or (ov.dx4 = 'i10') 
 or (ov.dx5 = 'i10') 
 or (ov.pdx = 'i11') 
 or (ov.dx0 = 'i11') 
 or (ov.dx1 = 'i11') 
 or (ov.dx2 = 'i11') 
 or (ov.dx3 = 'i11') 
 or (ov.dx4 = 'i11') 
 or (ov.dx5 = 'i11') 
 or (ov.pdx = 'i12') 
 or (ov.dx0 = 'i12') 
 or (ov.dx1 = 'i12') 
 or (ov.dx2 = 'i12') 
 or (ov.dx3 = 'i12') 
 or (ov.dx4 = 'i12') 
 or (ov.dx5 = 'i12') 
 or (ov.pdx = 'i13') 
 or (ov.dx0 = 'i13') 
 or (ov.dx1 = 'i13') 
 or (ov.dx2 = 'i13') 
 or (ov.dx3 = 'i13') 
 or (ov.dx4 = 'i13') 
 or (ov.dx5 = 'i13') 
 or (ov.pdx = 'i14') 
 or (ov.dx0 = 'i14') 
 or (ov.dx1 = 'i14') 
 or (ov.dx2 = 'i14') 
 or (ov.dx3 = 'i14') 
 or (ov.dx4 = 'i14') 
 or (ov.dx5 = 'i14') 
 or (ov.pdx = 'i15') 
 or (ov.dx0 = 'i15') 
 or (ov.dx1 = 'i15') 
 or (ov.dx2 = 'i15') 
 or (ov.dx3 = 'i15') 
 or (ov.dx4 = 'i15') 
 or (ov.dx5 = 'i15') 
)  ";



$and="  and ( (a.pdx = 'i10') 
 or (a.dx0 = 'i10') 
 or (a.dx1 = 'i10') 
 or (a.dx2 = 'i10') 
 or (a.dx3 = 'i10') 
 or (a.dx4 = 'i10') 
 or (a.dx5 = 'i10') 
 or (a.pdx = 'i11') 
 or (a.dx0 = 'i11') 
 or (a.dx1 = 'i11') 
 or (a.dx2 = 'i11') 
 or (a.dx3 = 'i11') 
 or (a.dx4 = 'i11') 
 or (a.dx5 = 'i11') 
 or (a.pdx = 'i12') 
 or (a.dx0 = 'i12') 
 or (a.dx1 = 'i12') 
 or (a.dx2 = 'i12') 
 or (a.dx3 = 'i12') 
 or (a.dx4 = 'i12') 
 or (a.dx5 = 'i12') 
 or (a.pdx = 'i13') 
 or (a.dx0 = 'i13') 
 or (a.dx1 = 'i13') 
 or (a.dx2 = 'i13') 
 or (a.dx3 = 'i13') 
 or (a.dx4 = 'i13') 
 or (a.dx5 = 'i13') 
 or (a.pdx = 'i14') 
 or (a.dx0 = 'i14') 
 or (a.dx1 = 'i14') 
 or (a.dx2 = 'i14') 
 or (a.dx3 = 'i14') 
 or (a.dx4 = 'i14') 
 or (a.dx5 = 'i14') 
 or (a.pdx = 'i15') 
 or (a.dx0 = 'i15') 
 or (a.dx1 = 'i15') 
 or (a.dx2 = 'i15') 
 or (a.dx3 = 'i15') 
 or (a.dx4 = 'i15') 
 or (a.dx5 = 'i15') 
)  ";

}else if($_GET['s']=="DM"){
	
	$and="  and ( (ov.pdx = 'e10') 
 or (ov.dx0 = 'e10') 
 or (ov.dx1 = 'e10') 
 or (ov.dx2 = 'e10') 
 or (ov.dx3 = 'e10') 
 or (ov.dx4 = 'e10') 
 or (ov.dx5 = 'e10') 
 or (ov.pdx = 'e11') 
 or (ov.dx0 = 'e11') 
 or (ov.dx1 = 'e11') 
 or (ov.dx2 = 'e11') 
 or (ov.dx3 = 'e11') 
 or (ov.dx4 = 'e11') 
 or (ov.dx5 = 'e11') 
 or (ov.pdx = 'e12') 
 or (ov.dx0 = 'e12') 
 or (ov.dx1 = 'e12') 
 or (ov.dx2 = 'e12') 
 or (ov.dx3 = 'e12') 
 or (ov.dx4 = 'e12') 
 or (ov.dx5 = 'e12') 
 or (ov.pdx = 'e13') 
 or (ov.dx0 = 'e13') 
 or (ov.dx1 = 'e13') 
 or (ov.dx2 = 'e13') 
 or (ov.dx3 = 'e13') 
 or (ov.dx4 = 'e13') 
 or (ov.dx5 = 'e13') 
 or (ov.pdx = 'e14') 
 or (ov.dx0 = 'e14') 
 or (ov.dx1 = 'e14') 
 or (ov.dx2 = 'e14') 
 or (ov.dx3 = 'e14') 
 or (ov.dx4 = 'e14') 
 or (ov.dx5 = 'e14') 
 
)  ";


	
}else if($_GET['s']=="Asthma"){
	$and="  and ( (ov.pdx = 'j45') 
 or (ov.dx0 = 'j45') 
 or (ov.dx1 = 'j45') 
 or (ov.dx2 = 'j45') 
 or (ov.dx3 = 'j45') 
 or (ov.dx4 = 'j45') 
 or (ov.dx5 = 'j45') 
 or (ov.pdx = 'j46') 
 or (ov.dx0 = 'j46') 
 or (ov.dx1 = 'j46') 
 or (ov.dx2 = 'j46') 
 or (ov.dx3 = 'j46') 
 or (ov.dx4 = 'j46') 
 or (ov.dx5 = 'j46') 

 
)  ";


$and="  and ( (a.pdx = 'j45') 
 or (a.dx0 = 'j45') 
 or (a.dx1 = 'j45') 
 or (a.dx2 = 'j45') 
 or (a.dx3 = 'j45') 
 or (a.dx4 = 'j45') 
 or (a.dx5 = 'j45') 
 or (a.pdx = 'j46') 
 or (a.dx0 = 'j46') 
 or (a.dx1 = 'j46') 
 or (a.dx2 = 'j46') 
 or (a.dx3 = 'j46') 
 or (a.dx4 = 'j46') 
 or (a.dx5 = 'j46') 

 
)  ";

}else if($_GET['s']=="COPD"){
		$and=" and ( (ov.pdx = 'J440') 
 or (ov.dx0 = 'J440') 
 or (ov.dx1 = 'J440') 
 or (ov.dx2 = 'J440') 
 or (ov.dx3 = 'J440') 
 or (ov.dx4 = 'J440') 
 or (ov.dx5 = 'J440') 
 or (ov.pdx = 'J441') 
 or (ov.dx0 = 'J441') 
 or (ov.dx1 = 'J441') 
 or (ov.dx2 = 'J441') 
 or (ov.dx3 = 'J441') 
 or (ov.dx4 = 'J441') 
 or (ov.dx5 = 'J441') 
 or (ov.pdx = 'J442') 
 or (ov.dx0 = 'J442') 
 or (ov.dx1 = 'J442') 
 or (ov.dx2 = 'J442') 
 or (ov.dx3 = 'J442') 
 or (ov.dx4 = 'J442') 
 or (ov.dx5 = 'J442') 
 or (ov.pdx = 'J443') 
 or (ov.dx0 = 'J443') 
 or (ov.dx1 = 'J443') 
 or (ov.dx2 = 'J443') 
 or (ov.dx3 = 'J443') 
 or (ov.dx4 = 'J443') 
 or (ov.dx5 = 'J443') 
 or (ov.pdx = 'J444') 
 or (ov.dx0 = 'J444') 
 or (ov.dx1 = 'J444') 
 or (ov.dx2 = 'J444') 
 or (ov.dx3 = 'J444') 
 or (ov.dx4 = 'J444') 
 or (ov.dx5 = 'J444') 
 or (ov.pdx = 'J445') 
 or (ov.dx0 = 'J445') 
 or (ov.dx1 = 'J445') 
 or (ov.dx2 = 'J445') 
 or (ov.dx3 = 'J445') 
 or (ov.dx4 = 'J445') 
 or (ov.dx5 = 'J445') 
 or (ov.pdx = 'J446') 
 or (ov.dx0 = 'J446') 
 or (ov.dx1 = 'J446') 
 or (ov.dx2 = 'J446') 
 or (ov.dx3 = 'J446') 
 or (ov.dx4 = 'J446') 
 or (ov.dx5 = 'J446') 
 or (ov.pdx = 'J447') 
 or (ov.dx0 = 'J447') 
 or (ov.dx1 = 'J447') 
 or (ov.dx2 = 'J447') 
 or (ov.dx3 = 'J447') 
 or (ov.dx4 = 'J447') 
 or (ov.dx5 = 'J447') 
 or (ov.pdx = 'J448') 
 or (ov.dx0 = 'J448') 
 or (ov.dx1 = 'J448') 
 or (ov.dx2 = 'J448') 
 or (ov.dx3 = 'J448') 
 or (ov.dx4 = 'J448') 
 or (ov.dx5 = 'J448') 
 or (ov.pdx = 'J449') 
 or (ov.dx0 = 'J449') 
 or (ov.dx1 = 'J449') 
 or (ov.dx2 = 'J449') 
 or (ov.dx3 = 'J449') 
 or (ov.dx4 = 'J449') 
 or (ov.dx5 = 'J449') 
)  ";


$and1=" and ( (a.pdx = 'J440') 
 or (a.dx0 = 'J440') 
 or (a.dx1 = 'J440') 
 or (a.dx2 = 'J440') 
 or (a.dx3 = 'J440') 
 or (a.dx4 = 'J440') 
 or (a.dx5 = 'J440') 
 or (a.pdx = 'J441') 
 or (a.dx0 = 'J441') 
 or (a.dx1 = 'J441') 
 or (a.dx2 = 'J441') 
 or (a.dx3 = 'J441') 
 or (a.dx4 = 'J441') 
 or (a.dx5 = 'J441') 
 or (a.pdx = 'J442') 
 or (a.dx0 = 'J442') 
 or (a.dx1 = 'J442') 
 or (a.dx2 = 'J442') 
 or (a.dx3 = 'J442') 
 or (a.dx4 = 'J442') 
 or (a.dx5 = 'J442') 
 or (a.pdx = 'J443') 
 or (a.dx0 = 'J443') 
 or (a.dx1 = 'J443') 
 or (a.dx2 = 'J443') 
 or (a.dx3 = 'J443') 
 or (a.dx4 = 'J443') 
 or (a.dx5 = 'J443') 
 or (a.pdx = 'J444') 
 or (a.dx0 = 'J444') 
 or (a.dx1 = 'J444') 
 or (a.dx2 = 'J444') 
 or (a.dx3 = 'J444') 
 or (a.dx4 = 'J444') 
 or (a.dx5 = 'J444') 
 or (a.pdx = 'J445') 
 or (a.dx0 = 'J445') 
 or (a.dx1 = 'J445') 
 or (a.dx2 = 'J445') 
 or (a.dx3 = 'J445') 
 or (a.dx4 = 'J445') 
 or (a.dx5 = 'J445') 
 or (a.pdx = 'J446') 
 or (a.dx0 = 'J446') 
 or (a.dx1 = 'J446') 
 or (a.dx2 = 'J446') 
 or (a.dx3 = 'J446') 
 or (a.dx4 = 'J446') 
 or (a.dx5 = 'J446') 
 or (a.pdx = 'J447') 
 or (a.dx0 = 'J447') 
 or (a.dx1 = 'J447') 
 or (a.dx2 = 'J447') 
 or (a.dx3 = 'J447') 
 or (a.dx4 = 'J447') 
 or (a.dx5 = 'J447') 
 or (a.pdx = 'J448') 
 or (a.dx0 = 'J448') 
 or (a.dx1 = 'J448') 
 or (a.dx2 = 'J448') 
 or (a.dx3 = 'J448') 
 or (a.dx4 = 'J448') 
 or (a.dx5 = 'J448') 
 or (a.pdx = 'J449') 
 or (a.dx0 = 'J449') 
 or (a.dx1 = 'J449') 
 or (a.dx2 = 'J449') 
 or (a.dx3 = 'J449') 
 or (a.dx4 = 'J449') 
 or (a.dx5 = 'J449') 
)  ";
}else if($_GET['s']=="CKD"){
}else if($_GET['s']=="Pneumoma"){
}else if($_GET['s']=="Sepsis"){
}else if($_GET['s']=="Severe Sepsis"){
}else if($_GET['s']=="Septic Shock"){
	
}
 
  ?>  
	
      
<table id="dom-table1" class="table table-striped table-bordered nowrap">
<thead>
 <tr>
<th  style="text-align:center">รายการ</th>
<th  style="text-align:center">ต.ค</th>
<th  style="text-align:center">พ.ย</th>
<th  style="text-align:center">ธ.ค</th>
<th  style="text-align:center">ม.ค</th>
<th  style="text-align:center">ก.พ</th>
<th  style="text-align:center">มี.ค</th>
<th  style="text-align:center">เม.ย</th>
<th  style="text-align:center">พ.ค</th>
<th  style="text-align:center">มิ.ย</th>
<th  style="text-align:center">ก.ค</th>
<th  style="text-align:center">ส.ค</th>
<th  style="text-align:center">ก.ย </th>
<th  style="text-align:center">รวม </th>
 
 </tr>
</thead>
<tbody>

 <?php  $i=1; 
 
 $d10_12=array(); $d10_07=array("0"); $d10_non=array("0"); $d10_krung=array("0"); $d10_refer=array("0");
 
 
 ////เดือน 9 ที่แล้ว
 
 
    $sql = "select count( DISTINCT   (ov.hn) )as sum

from an_stat ov, ipt ovst
where ov.an=ovst.an 
and ov.dchdate between  '2022-09-01' and  '2022-09-30' 
 and ov.age_y>= 0 
 and ov.age_y<= 200  and ov.ward = '12' ";
$query6 = mysqli_query($con,$sql);
$data09_12=mysqli_fetch_array($query6);

//สามัญ
$sql = "select count( DISTINCT   (ov.hn) )as sum
from an_stat ov, ipt ovst
where ov.an=ovst.an 
and ov.dchdate between   '2022-09-01' and  '2022-09-30'
 and ov.age_y>= 0 
 and ov.age_y<= 200  and ov.ward = '07' ";
$query6 = mysqli_query($con,$sql);
$data09_07=mysqli_fetch_array($query6);
 
 array_push($d10_12,$data09_12[sum]+$data09_07[sum]);
 
for($i==1;$i<=12;$i++){

if($i>=10){ $y=date('Y')-1;}else{ $y=date('Y');}
 
 $d=date("t", strtotime($y."-".$i."-01"));
	
	  $d1=$y.'-'.$i.'-01';   
	  $d2=$y.'-'.$i.'-'.$d; 


///จน ผู้ป่วย
 //หลังคลอด
   $sql = "select count( DISTINCT   (ov.hn) )as sum

from an_stat ov, ipt ovst
where ov.an=ovst.an 
and ov.dchdate between  '".$d1."' and  '".$d2."' 
 and ov.age_y>= 0 
 and ov.age_y<= 200  and ov.ward = '12' ";
$query6 = mysqli_query($con,$sql);
$data10_12=mysqli_fetch_array($query6);

//สามัญ
$sql = "select count( DISTINCT   (ov.hn) )as sum
from an_stat ov, ipt ovst
where ov.an=ovst.an 
and ov.dchdate between   '".$d1."' and  '".$d2."' 
 and ov.age_y>= 0 
 and ov.age_y<= 200  and ov.ward = '07' ";
$query6 = mysqli_query($con,$sql);
$data10_07=mysqli_fetch_array($query6);



////ซ้ำโรคเดิม
$sql = "  select count(a.an) as sum
	from an_stat a
  left outer join an_stat b on a.hn=b.hn and a.pdx=b.pdx and a.an>b.an
  left outer join patient p on a.hn=p.hn
  left outer join icd101 i on i.code=a.pdx
  left outer join ipt ip on ip.an=a.an
  left outer join ward w on w.ward=a.ward
  where (a.dchdate between  '".$d1."' and  '".$d2."'   ) and a.lastvisit <= '28'
  and ((to_days(a.regdate))-(to_days(b.dchdate)))<='28'
  and a.pdx is not null and a.pdx<>'' and a.pdx not like 'Z%' and a.old_diagnosis='Y' 
  order by a.an ";
$query6 = mysqli_query($con,$sql);
$data4_all=mysqli_fetch_array($query6); 
  
  
  
/////////วันนอน
 //หลังคลอด
$sql = " SELECT  sum(an_stat.admdate) as sum
FROM ovst,an_stat
WHERE ovst.an= an_stat.an
and  an_stat.dchdate BETWEEN '".$d1."' and  '".$d2."'  and an_stat.ward = '12' ";
$query6 = mysqli_query($con,$sql);
$data10_12_non=mysqli_fetch_array($query6);

//สามัญ
$sql = " SELECT  sum(an_stat.admdate) as sum
FROM ovst,an_stat
WHERE ovst.an= an_stat.an
and  an_stat.dchdate BETWEEN '".$d1."' and  '".$d2."'  and an_stat.ward = '07' ";
$query6 = mysqli_query($con,$sql);
$data10_07_non=mysqli_fetch_array($query6);



//จน ครั้ง
 //หลังคลอด
$sql = "select count(ov.hn) as chn 
from an_stat ov, ipt ovst
where ov.an=ovst.an and ov.dchdate between '".$d1."' and  '".$d2."'
 and ov.age_y>= 0 
 and ov.age_y<= 200  and  ov.ward = '12' ";
$query6 = mysqli_query($con,$sql);
$data10_12_krung=mysqli_fetch_array($query6);

//สามัญ
$sql = "select count(ov.hn) as chn 
from an_stat ov, ipt ovst
where ov.an=ovst.an and ov.dchdate between '".$d1."' and  '".$d2."'
 and ov.age_y>= 0 
 and ov.age_y<= 200  and  ov.ward = '07' ";
$query6 = mysqli_query($con,$sql);
$data10_07_krung=mysqli_fetch_array($query6);

///รีเฟอ
 $sql = "select  count(ov.hn) as c  
from an_stat ov ,patient pt ,ipt ovst ,referout re 
where ov.an=ovst.an  and ov.hn=pt.hn  and ov.an=re.vn 
 and ov.age_y>= 0 
 and ov.age_y<= 200 and ov.dchdate between '".$d1."' and  '".$d2."'
  ";
$query6 = mysqli_query($con,$sql);
$data10_refer=mysqli_fetch_array($query6);
 

array_push($d10_12,$data10_12[sum]+$data10_07[sum]);

 array_push($d10_07,$data4_all[sum]);
 
  array_push($d10_non,$data10_07_non[sum]+$data10_12_non[sum]);
 
  array_push($d10_krung,$data10_07_krung[chn]+$data10_12_krung[chn]);
  
  array_push($d10_refer,$data10_refer[c]);

}?>

 <tr>
<td><strong>Re-admit(ภาพรวม) <?php echo $d10_12[0]?></strong></td>
<?php  $i=10; $sum1=0; $sum2=0; $total=0;
for($i==10;$i<=12;$i++){

 $sum1=$sum1+$d10_07[$i];
 $sum2=$sum2+$d10_12[$i];
?>
<td align="center">   <?php echo  number_format(($d10_07[$i]*100)/$d10_12[$i],2);?> </td>
<?php }?>
<?php  $i=1; 
for($i==1;$i<=9;$i++){
	
	 $sum1=$sum1+$d10_07[$i];
 $sum2=$sum2+$d10_12[$i];
 
	?>
<td align="center">   <?php echo  number_format(($d10_07[$i]*100)/$d10_12[$i],2);?> </td>
<?php }?>
<td align="center">   <?php  echo  number_format(($sum1*100)/$sum2,2);?> </td>

 </tr>
 <tr>
 
 
 
 
<td>- จำนวนผู้ป่วยที่นอนโรงพยาบาลทั้งหมด</td>
<?php  $i=10;  $summ=0;
for($i==10;$i<=12;$i++){
	
	 
$summ=$summ+$d10_12[$i];
 
?>
<td align="center"> <?php      echo  $d10_12[$i]?> </td>
<?php }?>
<?php  $i=1; 
for($i==1;$i<=9;$i++){
	$summ=$summ+$d10_12[$i];	 
?>
<td align="center"> <?php  echo $d10_12[$i]?> </td>
<?php }?>
<td align="center"> <?php  echo $summ?> </td>
</tr>




 <tr>
<td>- จำนวนวันนอน</td>
<?php  $i=10;  $summ=0;
for($i==10;$i<=12;$i++){
	
	 
$summ=$summ+$d10_non[$i];
 
?>
<td align="center"> <?php      echo  $d10_non[$i]?> </td>
<?php }?>
<?php  $i=1; 
for($i==1;$i<=9;$i++){
	$summ=$summ+$d10_non[$i];	 
?>
<td align="center"> <?php  echo $d10_non[$i]?> </td>
<?php }?>
<td align="center"> <?php  echo $summ?> </td>
</tr>
 <tr>
 



 <tr>
<td>- จำนวนครั้ง</td>
<?php  $i=10;  $summ=0;
for($i==10;$i<=12;$i++){
	
	 
$summ=$summ+$d10_krung[$i];
 
?>
<td align="center"> <?php      echo  $d10_krung[$i]?> </td>
<?php }?>
<?php  $i=1; 
for($i==1;$i<=9;$i++){
	$summ=$summ+$d10_krung[$i];	 
?>
<td align="center"> <?php  echo $d10_krung[$i]?> </td>
<?php }?>
<td align="center"> <?php  echo $summ?> </td>
</tr>
 <tr>



 <tr>
<td>- จำนวน Refer</td>
<?php  $i=10;  $summ=0;
for($i==10;$i<=12;$i++){
	
	 
$summ=$summ+$d10_refer[$i];
 
?>
<td align="center"> <?php      echo  $d10_refer[$i]?> </td>
<?php }?>
<?php  $i=1; 
for($i==1;$i<=9;$i++){
	$summ=$summ+$d10_refer[$i];	 
?>
<td align="center"> <?php  echo $d10_refer[$i]?> </td>
<?php }?>
<td align="center"> <?php  echo $summ?> </td>
</tr>
 <tr>
 


 <tr>
 <td>- จำนวนผู้ป่วยที่มารับบริการแลัวกลับมารักษาซ้ำภายใน 28 วัน ด้วยโรคเดิม</td>

<?php  $i=10;  $summ=0;
for($i==10;$i<=12;$i++){
	 
 $summ=$summ+$d10_07[$i];
?>
<td align="center"> <?php echo  $d10_07[$i]?> </td>
<?php }?>
<?php  $i=1; 
for($i==1;$i<=9;$i++){
	 $summ=$summ+$d10_07[$i];
	  ?>
<td align="center"> <?php echo  $d10_07[$i]?> </td>
<?php }?>
<td align="center"> <?php  echo $summ?> </td>
</tr>
 


 










<?php  $i=1; 
 
 $d11_12=array("0"); $d11_07=array("0");
 
for($i==1;$i<=12;$i++){

if($i>=10){ $y=date('Y')-1;}else{ $y=date('Y');}
 
 $d=date("t", strtotime($y."-".$i."-01"));
	
	  $d1=$y.'-'.$i.'-01';   
	  $d2=$y.'-'.$i.'-'.$d; 

   $sql = "select count( DISTINCT   (ov.hn) )as sum
from an_stat ov, ipt ovst
where ov.an=ovst.an 
and ov.dchdate between  '".$d1."' and  '".$d2."' 
 and ov.age_y>= 0 
 and ov.age_y<= 200  and ov.ward = '12' $and";
$query6 = mysqli_query($con,$sql);
$data10_12=mysqli_fetch_array($query6);

$sql = "select count( DISTINCT   (ov.hn) )as sum
from an_stat ov, ipt ovst
where ov.an=ovst.an 
and ov.dchdate between   '".$d1."' and  '".$d2."' 
 and ov.age_y>= 0 
 and ov.age_y<= 200  and ov.ward = '07' $and";
$query6 = mysqli_query($con,$sql);
$data10_07=mysqli_fetch_array($query6);


 
  
  
  $sql = "  select count(a.an) as sum
	from an_stat a
  left outer join an_stat b on a.hn=b.hn and a.pdx=b.pdx and a.an>b.an
  left outer join patient p on a.hn=p.hn
  left outer join icd101 i on i.code=a.pdx
  left outer join ipt ip on ip.an=a.an
  left outer join ward w on w.ward=a.ward
  where (a.dchdate between  '".$d1."' and  '".$d2."'   ) and a.lastvisit <= '28'
  and ((to_days(a.regdate))-(to_days(b.dchdate)))<='28'
  and a.pdx is not null and a.pdx<>'' and a.pdx not like 'Z%' and a.old_diagnosis='Y'  $and1
  order by a.an ";
$query6 = mysqli_query($con,$sql);
$data4_all=mysqli_fetch_array($query6);

array_push($d11_12,$data10_12[sum]+$data10_07[sum]);

 array_push($d11_07,$data4_all[sum]);
 
}?>

<tr>
<td><strong>Re-admit(<?php echo $_GET['s']?>)</strong></td>
<?php  $i=10;  $sum1=0; $sum2=0; $total=0;
for($i==10;$i<=12;$i++){

  $sum1=$sum1+$d11_07[$i];
 $sum2=$sum2+$d11_12[$i];
?>
<td align="center">   <?php echo  number_format(($d11_07[$i]*100)/$d11_12[$i],2);?> </td>
<?php }?>
<?php  $i=1; 
for($i==1;$i<=9;$i++){
	 $sum1=$sum1+$d11_07[$i];
 $sum2=$sum2+$d11_12[$i];
	?>
<td align="center">   <?php echo  number_format(($d11_07[$i]*100)/$d11_12[$i],2);?> </td>
<?php }?>
<td align="center">   <?php  echo  number_format(($sum1*100)/$sum2,2);?> </td>
  </tr>
 
 
 
 
 
 
 
  <tr>
<td>- จำนวนผู้ป่วยที่นอนโรงพยาบาลทั้งหมด</td>
<?php  $i=10;  $summ=0;
for($i==10;$i<=12;$i++){
	
	   $summ=$summ+$d11_12[$i];
 
?>
<td align="center"> <?php echo  $d11_12[$i]?> </td>
<?php }?>
<?php  $i=1; 
for($i==1;$i<=9;$i++){
	  $summ=$summ+$d11_12[$i];
?>
<td align="center"> <?php echo $d11_12[$i]?> </td>
<?php }?>
<td align="center"> <?php  echo $summ?> </td>
</tr>


 <tr>
<td>- จำนวนผู้ป่วยที่มารับบริการแลัวกลับมารักษาซ้ำภายใน 28 วัน ด้วยโรคเดิม</td>
<?php  $i=10;  $summ=0;
for($i==10;$i<=12;$i++){
	 
   $summ=$summ+$d11_07[$i];

 
?>
<td align="center"> <?php echo $d11_07[$i]?> </td>
<?php }?>
<?php  $i=1; 
for($i==1;$i<=9;$i++){
	  $summ=$summ+$d11_07[$i];
?>
<td align="center"> <?php echo $d11_07[$i]?> </td>
<?php }?> 
<td align="center"> <?php  echo $summ?> </td>
</tr>




























<?php  $i=1; 
 
 $d12_12=array("0"); $d12_07=array("0");
 
for($i==1;$i<=12;$i++){

if($i>=10){ $y=date('Y')-1;}else{ $y=date('Y');}
 
 $d=date("t", strtotime($y."-".$i."-01"));
	
	  $d1=$y.'-'.$i.'-01';   
	  $d2=$y.'-'.$i.'-'.$d; 

  $sql = "select count( DISTINCT   (ov.hn) )as sum
from vn_stat ov, ovst ovst, patient pt 
where  ov.vn=ovst.vn and pt.hn=ov.hn and ov.vstdate between '".$d1."' and  '".$d2."' 
 and ov.age_y>= 0 
 and ov.age_y<= 200 
  and ovst.main_dep='010' ";
$query6 = mysqli_query($con,$sql);
$data5_opd_all=mysqli_fetch_array($query6); 

 $sql = "select count( DISTINCT   (ov.hn) )as sum
from vn_stat ov, ovst ovst, patient pt 
where  ov.vn=ovst.vn and pt.hn=ov.hn and ov.vstdate between '".$d1."' and  '".$d2."' 
 and ov.age_y>= 0 
 and ov.age_y<= 200 
  and ovst.main_dep='011' ";
$query6 = mysqli_query($con,$sql);
$data5_er_all=mysqli_fetch_array($query6); 
 
  
  
  $sql = "  select count(a.an) as sum
	from an_stat a
  left outer join an_stat b on a.hn=b.hn and a.pdx=b.pdx and a.an>b.an
  left outer join patient p on a.hn=p.hn
  left outer join icd101 i on i.code=a.pdx
  left outer join ipt ip on ip.an=a.an
  left outer join ward w on w.ward=a.ward
  where (a.dchdate between  '".$d1."' and  '".$d2."'   ) and a.lastvisit <= '28'
  and ((to_days(a.regdate))-(to_days(b.dchdate)))<='28'
  and a.pdx is not null and a.pdx<>'' and a.pdx not like 'Z%' and a.old_diagnosis='Y'  $and1
  order by a.an ";
$query6 = mysqli_query($con,$sql);
$data4_all=mysqli_fetch_array($query6);




////////////////////


 $sql = "select count( DISTINCT   (ov.hn) )as sum
from vn_stat ov, ovst ovst, patient pt 
where  ov.vn=ovst.vn and pt.hn=ov.hn and ov.vstdate between '".$d1."' and  '".$d2."'
 and ov.age_y>= 0 
 and ov.age_y<= 200 
  and ovst.main_dep='010'
 and ov.lastvisit_hour >= 48
 and ov.old_diagnosis = 'Y'";
$query6 = mysqli_query($con,$sql);
$data5_opd=mysqli_fetch_array($query6); 

 $sql = "select count( DISTINCT   (ov.hn) )as sum
from vn_stat ov, ovst ovst, patient pt 
where  ov.vn=ovst.vn and pt.hn=ov.hn and ov.vstdate between '".$d1."' and  '".$d2."'
 and ov.age_y>= 0 
 and ov.age_y<= 200 
  and ovst.main_dep='011'
 and ov.lastvisit_hour >= 48
 and ov.old_diagnosis = 'Y'";
$query6 = mysqli_query($con,$sql);
$data5_er=mysqli_fetch_array($query6); 



array_push($d12_12,$data5_opd_all[sum]+$data5_er_all[sum]);

 array_push($d12_07,$data5_opd[sum]+$data5_er[sum]);
 
}?>

<tr>
<td><strong>Re-visit(ภาพรวม)</strong></td>
<?php  $i=10;   $sum1=0; $sum2=0; $total=0;
for($i==10;$i<=12;$i++){

   $sum1=$sum1+$d12_07[$i];
 $sum2=$sum2+$d12_12[$i];
?>
<td align="center">   <?php echo  number_format(($d12_07[$i]*100)/$d12_12[$i],2);?> </td>
<?php }?>
<?php  $i=1; 
for($i==1;$i<=9;$i++){
	  $sum1=$sum1+$d12_07[$i];
 $sum2=$sum2+$d12_12[$i];
	?>
<td align="center">   <?php echo  number_format(($d12_07[$i]*100)/$d12_12[$i],2);?> </td>
<?php }?>
<td align="center">   <?php  echo  number_format(($sum1*100)/$sum2,2);?> </td>
  </tr>


 <tr>
<td>- จำนวนผู้ป่วยที่นอนโรงพยาบาลทั้งหมด</td>
<?php  $i=10;  $summ=0;
for($i==10;$i<=12;$i++){
	
	   $summ=$summ+$d12_12[$i];

 
?>
<td align="center"> <?php echo  $d12_12[$i]?> </td>
<?php }?>
<?php  $i=1; 
for($i==1;$i<=9;$i++){
	   $summ=$summ+$d12_12[$i];
?>
<td align="center"> <?php echo $d12_12[$i]?> </td>
<?php }?>
<td align="center"> <?php  echo $summ?> </td>

</tr>










 <tr>
<td>- จำนวนผู้ป่วยที่มารับบริการแลัวกลับมารักษาซ้ำภายใน 48 ชม. ด้วยโรคเดิม</td>
<?php  $i=10;  $summ=0;
for($i==10;$i<=12;$i++){
	  $summ=$summ+$d12_07[$i];
	   

 
?>
<td align="center"> <?php echo $d12_07[$i]?> </td>
<?php }?>
<?php  $i=1; 
for($i==1;$i<=9;$i++){
	 
  $summ=$summ+$d12_07[$i];
 
?>
<td align="center"> <?php echo $d12_07[$i]?> </td>
<?php }?>
<td align="center"> <?php  echo $summ?> </td>

</tr>













<?php  $i=1; 
 
 $d13_12=array("0"); $d13_07=array("0");
 
for($i==1;$i<=12;$i++){

if($i>=10){ $y=date('Y')-1;}else{ $y=date('Y');}
 
 $d=date("t", strtotime($y."-".$i."-01"));
	
	  $d1=$y.'-'.$i.'-01';   
	  $d2=$y.'-'.$i.'-'.$d; 

  $sql = "select count( DISTINCT   (ov.hn) )as sum
from vn_stat ov, ovst ovst, patient pt 
where  ov.vn=ovst.vn and pt.hn=ov.hn and ov.vstdate between '".$d1."' and  '".$d2."' 
 and ov.age_y>= 0 
 and ov.age_y<= 200 
  and ovst.main_dep='010' $and ";
$query6 = mysqli_query($con,$sql);
$data5_opd_all=mysqli_fetch_array($query6); 

 $sql = "select count( DISTINCT   (ov.hn) )as sum
from vn_stat ov, ovst ovst, patient pt 
where  ov.vn=ovst.vn and pt.hn=ov.hn and ov.vstdate between '".$d1."' and  '".$d2."' 
 and ov.age_y>= 0 
 and ov.age_y<= 200 
  and ovst.main_dep='011' $and ";
$query6 = mysqli_query($con,$sql);
$data5_er_all=mysqli_fetch_array($query6); 
 
   



////////////////////


 $sql = "select count( DISTINCT   (ov.hn) )as sum
from vn_stat ov, ovst ovst, patient pt 
where  ov.vn=ovst.vn and pt.hn=ov.hn and ov.vstdate between '".$d1."' and  '".$d2."'
 and ov.age_y>= 0 
 and ov.age_y<= 200 
  and ovst.main_dep='010'
 and ov.lastvisit_hour >= 48
 and ov.old_diagnosis = 'Y' $and ";
$query6 = mysqli_query($con,$sql);
$data5_opd=mysqli_fetch_array($query6); 

 $sql = "select count( DISTINCT   (ov.hn) )as sum
from vn_stat ov, ovst ovst, patient pt 
where  ov.vn=ovst.vn and pt.hn=ov.hn and ov.vstdate between '".$d1."' and  '".$d2."'
 and ov.age_y>= 0 
 and ov.age_y<= 200 
  and ovst.main_dep='011'
 and ov.lastvisit_hour >= 48
 and ov.old_diagnosis = 'Y' $and ";
$query6 = mysqli_query($con,$sql);
$data5_er=mysqli_fetch_array($query6); 



array_push($d13_12,$data5_opd_all[sum]+$data5_er_all[sum]);

 array_push($d13_07,$data5_opd[sum]+$data5_er[sum]);
 
}?>



<tr>
<td><strong>Re-visit(<?php echo $_GET['s']?>)</strong></td>
<?php  $i=10;  $sum1=0; $sum2=0; $total=0;
for($i==10;$i<=12;$i++){

 
   $sum1=$sum1+$d13_07[$i];
 $sum2=$sum2+$d13_12[$i];
?>
<td align="center">   <?php echo  number_format(($d13_07[$i]*100)/$d13_12[$i],2);?> </td>
<?php }?>
<?php  $i=1; 
for($i==1;$i<=9;$i++){
	
   $sum1=$sum1+$d13_07[$i];
 $sum2=$sum2+$d13_12[$i];
	?>
<td align="center">   <?php echo  number_format(($d13_07[$i]*100)/$d13_12[$i],2);?> </td>
<?php }?>
<td align="center">   <?php  echo  number_format(($sum1*100)/$sum2,2);?> </td>
</tr>
 
 

<tr>
<td>- จำนวนผู้ป่วยที่นอนโรงพยาบาลทั้งหมด</td>
<?php  $i=10;  $summ=0;
for($i==10;$i<=12;$i++){
	
	   $summ=$summ+$d13_12[$i];  
 
?>
<td align="center"> <?php echo  $d13_12[$i]?> </td>
<?php }?>
<?php  $i=1;  $summ=0;
for($i==1;$i<=9;$i++){
	    $summ=$summ+$d13_12[$i]; 
?>
<td align="center"> <?php echo  $d13_12[$i]?> </td>
<?php }?>
<td align="center"> <?php  echo $summ?> </td>
</tr>
 
 

<tr>
<td>- จำนวนผู้ป่วยที่มารับบริการแลัวกลับมารักษาซ้ำภายใน 48 ชม. ด้วยโรคเดิม</td>
<?php  $i=10;  $summ=0;
for($i==10;$i<=12;$i++){
	
	  
  $summ=$summ+$d13_07[$i];
 
?>
<td align="center"> <?php echo $d13_07[$i]?> </td>
<?php }?>
<?php  $i=1;  $summ=0;
for($i==1;$i<=9;$i++){
	   $summ=$summ+$d13_07[$i];
 
?>
<td align="center"> <?php echo $d13_07[$i]?> </td>
<?php }?>
<td align="center"> <?php  echo $summ?> </td>
</tr>
 
 
</tfoot>
</table>
 <p><a href="t.php">กลับหน้าก่อนหน้า</a></p>
  
 
</div>
</div>
</div>
</div>
<script src="https://colorlib.com/etc/tb/Table_Responsive_v2/vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="https://colorlib.com/etc/tb/Table_Responsive_v2/vendor/bootstrap/js/popper.js"></script>
<script src="https://colorlib.com/etc/tb/Table_Responsive_v2/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="https://colorlib.com/etc/tb/Table_Responsive_v2/vendor/select2/select2.min.js"></script>

<script src="https://colorlib.com/etc/tb/Table_Responsive_v2/js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vb26e4fa9e5134444860be286fd8771851679335129114" integrity="sha512-M3hN/6cva/SjwrOtyXeUa5IuCT0sedyfT+jK/OV+s+D0RnzrTfwjwJHhd+wYfMm9HJSrZ1IKksOdddLuN6KOzw==" data-cf-beacon='{"rayId":"7b3af7937d8749c0","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.3.0","si":100}' crossorigin="anonymous"></script>
</body>
</html>
