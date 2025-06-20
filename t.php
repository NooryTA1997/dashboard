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
  if(!$_GET['d1']){ $_GET['d1']=date('Y-m-01');} 
  if(!$_GET['d2']){ $_GET['d2']=date('Y-m-30');}
 
  ?>
  
<?php
 include"connect.php";

$s=0; $t=0;
$sql = "select   sum(admdate) as sum 
from an_stat ov ,patient pt ,ipt ovst 
where ov.an=ovst.an and ov.dchdate between '".$_GET[d1]."' and  '".$_GET[d2]."' and ov.hn=pt.hn 
 and ov.age_y>= 0 
 and ov.age_y<= 200    ";
$query6 = mysqli_query($con,$sql);
$data1_all=mysqli_fetch_array($query6);

$sql = "select   sum(admdate) as sum 
from an_stat ov ,patient pt ,ipt ovst 
where ov.an=ovst.an and ov.dchdate between '".$_GET[d1]."' and  '".$_GET[d2]."' and ov.hn=pt.hn 
 and ov.age_y>= 0 
 and ov.age_y<= 200  and ov.ward = '04' ";
$query6 = mysqli_query($con,$sql);
$data1_04=mysqli_fetch_array($query6);

$sql = "select   sum(admdate) as sum 
from an_stat ov ,patient pt ,ipt ovst 
where ov.an=ovst.an and ov.dchdate between '".$_GET[d1]."' and  '".$_GET[d2]."' and ov.hn=pt.hn 
 and ov.age_y>= 0 
 and ov.age_y<= 200  and ov.ward = '12' ";
$query6 = mysqli_query($con,$sql);
$data1_12=mysqli_fetch_array($query6);


$sql = "select   sum(admdate) as sum 
from an_stat ov ,patient pt ,ipt ovst 
where ov.an=ovst.an and ov.dchdate between  '".$_GET[d1]."' and  '".$_GET[d2]."'  and ov.hn=pt.hn 
 and ov.age_y>= 0 
 and ov.age_y<= 200  and ov.ward = '07' ";
$query6 = mysqli_query($con,$sql);
$data1_07=mysqli_fetch_array($query6);


$sql = "select count( DISTINCT   (ov.hn) )as sum
from an_stat ov, ipt ovst
where ov.an=ovst.an 
and ov.dchdate between  '".$_GET[d1]."' and  '".$_GET[d2]."' 
 and ov.age_y>= 0 
 and ov.age_y<= 200  ";
$query6 = mysqli_query($con,$sql);
$data2_all=mysqli_fetch_array($query6);

$sql = "select count( DISTINCT   (ov.hn) )as sum
from an_stat ov, ipt ovst
where ov.an=ovst.an 
and ov.dchdate between  '".$_GET[d1]."' and  '".$_GET[d2]."' 
 and ov.age_y>= 0 
 and ov.age_y<= 200  and ov.ward = '04' ";
$query6 = mysqli_query($con,$sql);
$data2_04=mysqli_fetch_array($query6);

$sql = "select count( DISTINCT   (ov.hn) )as sum
from an_stat ov, ipt ovst
where ov.an=ovst.an 
and ov.dchdate between  '".$_GET[d1]."' and  '".$_GET[d2]."' 
 and ov.age_y>= 0 
 and ov.age_y<= 200  and ov.ward = '12' ";
$query6 = mysqli_query($con,$sql);
$data2_12=mysqli_fetch_array($query6);

$sql = "select count( DISTINCT   (ov.hn) )as sum
from an_stat ov, ipt ovst
where ov.an=ovst.an 
and ov.dchdate between  '".$_GET[d1]."' and  '".$_GET[d2]."' 
 and ov.age_y>= 0 
 and ov.age_y<= 200  and ov.ward = '07' ";
$query6 = mysqli_query($con,$sql);
$data2_07=mysqli_fetch_array($query6);
	

//$sql = "SELECT (SUM(i.admdate)*100)/((SELECT SUM(bedcount)  
//FROM ward WHERE ward_active = 'Y')*DATEDIFF('$enddate','$myearb-10-01')+1) AS admsum
//FROM an_stat i
//WHERE i.dchdate BETWEEN '$myearb-10-01' AND '$myeare-09-30' ";

			
//$sql = "SELECT (SUM(i.admdate)*100)/((SELECT SUM(bedcount) 
//FROM ward WHERE ward_active = 'Y')*DATEDIFF('".$_GET[d1]."','".$_GET[d2]."')+1) AS admsum
	//		FROM an_stat i
	//		WHERE i.dchdate BETWEEN '".$_GET[d1]."' and  '".$_GET[d2]."'  ";
	//	$query6 = mysqli_query($con,$sql);
	//while ($data=mysqli_fetch_array($query6)){
			//echo $ipt_admsum = $data['admsum'];
	//		}
			//echo '///';
			//echo $ipd=(($data1_04[sum]+$data1_12[sum])*100)/(44*30);
			//$ipt_admsum=100-(($ipt_wblank*100)/38);	
 function DateDiff($strDate1,$strDate2)
	 {
				return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
	 }
	$num_date=DateDiff($_GET[d1],$_GET[d2])+1;

	?>
 
 


 
<div class="limiter">
<div class="container-table100">
<div class="wrap-table100">



<form action="med.php?ac=add" method="post">
 

  <table  border="0">
 
  <tr>
   <td>
ตั้งแต่วันที่
 </td>
    <td>
	<input name="d1" value="<?php echo $_GET['d1']?>" type="date" 
  OnChange="window.location='?d2=<?php echo $_GET['d2']?>&d1='+this.value;"  style="padding:5px; font-size:18px; border-radius:5px"/>
 
 </td>
  <td>
&nbsp;
 </td>
 <td>
ถึงวันที่
 </td>
 
    <td>
	 <input name="d2" value="<?php echo $_GET['d2']?>" type="date" 
  OnChange="window.location='?d1=<?php echo $_GET['d1']?>&d2='+this.value;" style="padding:5px; font-size:18px; border-radius:5px" />
 
 </td>
  </tr>
 
</table>

 


  
  
    <br>

  
 
 
</form>



<?php 
$lr_before=$data1_04[sum];
$lr_past=$data1_12[sum];

$saman=$data1_07[sum];
$lr_all=$data1_12[sum]+$saman;
?>
<div class="table">
<div class="row header">
<div class="cell">
รายการ
</div>
<div class="cell">
จำนวน
</div>
 
</div>
<div class="row">
<div class="cell" data-title="รายการ">
<strong>จำนวนวันนอน</strong>
</div>
<div class="cell" data-title="จำนวน">
<?php echo number_format($lr_all,0) ?> วัน
</div>
 
</div>


<div class="row">
<div class="cell" data-title="รายการ">
&nbsp;&nbsp;- จำนวนวันนอนที่ผู้ป่วยมารับบริการตึกหลังคลอด
</div>
<div class="cell" data-title="จำนวน">
<?php echo number_format($lr_past,0);//$data1_04[sum]?> วัน
</div> 
</div>


<div class="row">
<div class="cell" data-title="รายการ">
&nbsp;&nbsp;- จำนวนวันนอนที่ผู้ป่วยมารับบริการที่หอผู้ป่วย
</div>
<div class="cell" data-title="จำนวน">
<?php echo number_format($saman,0)?> วัน
</div> 
</div>


 
<?php 
$lr_before1=$data2_04[sum];
$lr_past1=$data2_12[sum];

$saman1=$data2_07[sum];
$lr_all1=$data2_12[sum]+$saman1;
?>
  

<div class="row">
<div class="cell" data-title="รายการ">
<strong>จำนวนผู้ป่วยที่นอนรักษาในโรงพยาบาล</strong>
</div>
<div class="cell" data-title="จำนวน">
<?php echo number_format($lr_all1,0); //echo $data2_all[sum] ?> คน
</div> 
</div>



<div class="row">
<div class="cell" data-title="รายการ">
&nbsp;&nbsp;- จำนวนวันนอนที่ผู้ป่วยมารับบริการตึกหลังคลอด
</div>
<div class="cell" data-title="จำนวน">
<?php echo number_format($lr_past1,0)?> คน
</div> 
</div>


<div class="row">
<div class="cell" data-title="รายการ">
&nbsp;&nbsp;- จำนวนวันนอนที่ผู้ป่วยมารับบริการที่หอผู้ป่วย
</div>
<div class="cell" data-title="จำนวน">
<?php echo number_format($saman1,0)?> คน
</div> 
</div>



<div class="row">
<div class="cell" data-title="รายการ">
<strong>อัตราครองเตียง(ภาพรวม)</strong>
</div>
<div class="cell" data-title="จำนวน">
 <?php echo   number_format($ipd=(($lr_all)*100)/(44*$num_date),2); //echo  ' '.$lr_past?> %
</div> 
</div>


<div class="row">
<div class="cell" data-title="รายการ">
&nbsp;&nbsp;- จำนวนวันนอนที่ผู้ป่วยมารับบริการตึกหลังคลอด 
</div>
 <div class="cell" data-title="จำนวน">
<?php echo number_format($ipd=(($lr_past)*100)/(5*$num_date),2); // echo $num_date;?> %
</div> 
</div>


<div class="row">
<div class="cell" data-title="รายการ">
&nbsp;&nbsp;- จำนวนวันนอนที่ผู้ป่วยมารับบริการที่หอผู้ป่วย
</div>
<div class="cell" data-title="จำนวน">
<?php echo   number_format($ipd=(($saman)*100)/(38*$num_date),2);?> %
</div> 
</div>


<?php
  
  //$sql = "select count(a.an) as c
  //from an_stat a
  // left outer join an_stat b on a.hn=b.hn and a.pdx=b.pdx and a.an>b.an
  // left outer join patient p on a.hn=p.hn
  // left outer join icd101 i on i.code=a.pdx
  // left outer join ipt ip on ip.an=a.an
  // left outer join ward w on w.ward=a.ward
  // where (a.dchdate between '".$_GET[d1]."' and  '".$_GET[d2]."'  ) and a.lastvisit <= '28'
 // and ((to_days(a.regdate))-(to_days(b.dchdate)))<='28'
 // and a.pdx is not null and a.pdx<>'' and a.pdx not like 'Z%'
//  order by a.an  ";


$sql = "  select count(a.an) as c
	from an_stat a
  left outer join an_stat b on a.hn=b.hn and a.pdx=b.pdx and a.an>b.an
  left outer join patient p on a.hn=p.hn
  left outer join icd101 i on i.code=a.pdx
  left outer join ipt ip on ip.an=a.an
  left outer join ward w on w.ward=a.ward
  where (a.dchdate between '".$_GET[d1]."' and  '".$_GET[d2]."'  ) and a.lastvisit <= '28'
  and ((to_days(a.regdate))-(to_days(b.dchdate)))<='28'
  and a.pdx is not null and a.pdx<>'' and a.pdx not like 'Z%' and a.old_diagnosis='Y' 
  order by a.an ";
$query6 = mysqli_query($con,$sql);
$data4_all=mysqli_fetch_array($query6); 
  
  
  
  $aa=$data2_04[sum]+$data2_12[sum]+$data2_07[sum];
  ?>
    
 


<div class="row">
<div class="cell" data-title="รายการ">
<strong>อัตรา  Re-Admid</strong>
</div>
<div class="cell" data-title="จำนวน">
&nbsp;<?php echo number_format(($data4_all[c]*100)/$lr_all1,2)?> %
</div> 
</div>

<div class="row">
<div class="cell" data-title="รายการ">
&nbsp;&nbsp;- จำนวนผู้ป่วยที่นอนโรงพยาบาลทั้งหมด
</div>
<div class="cell" data-title="จำนวน">
<?php echo number_format($lr_all1,0); //echo $data2_all[sum] ?> คน
</div> 
</div>

<div class="row">
<div class="cell" data-title="รายการ">
&nbsp;&nbsp;- จำนวนผู้ป่วยที่มารับบริการแลัวกลับมารักษาซ้ำภายใน 28 วัน ด้วยโรคเดิม
</div>
<div class="cell" data-title="จำนวน">
&nbsp;<?php echo number_format($data4_all[c],0)?> คน
</div> 
</div>

  <?php
  
 $sql = "select count( DISTINCT   (ov.hn) )as sum
from vn_stat ov, ovst ovst, patient pt 
where  ov.vn=ovst.vn and pt.hn=ov.hn and ov.vstdate between '".$_GET[d1]."' and  '".$_GET[d2]."'
 and ov.age_y>= 0 
 and ov.age_y<= 200 
  and ovst.main_dep='010' ";
$query6 = mysqli_query($con,$sql);
$data5_opd_all=mysqli_fetch_array($query6); 

  
 $sql = "select count( DISTINCT   (ov.hn) )as sum
from vn_stat ov, ovst ovst, patient pt 
where  ov.vn=ovst.vn and pt.hn=ov.hn and ov.vstdate between '".$_GET[d1]."' and  '".$_GET[d2]."'
 and ov.age_y>= 0 
 and ov.age_y<= 200 
  and ovst.main_dep='010'
 and ov.lastvisit_hour >= 48
 and ov.old_diagnosis = 'Y'";
$query6 = mysqli_query($con,$sql);
$data5_opd=mysqli_fetch_array($query6); 

  
 $sql = "select count( DISTINCT   (ov.hn) )as sum
from vn_stat ov, ovst ovst, patient pt 
where  ov.vn=ovst.vn and pt.hn=ov.hn and ov.vstdate between '".$_GET[d1]."' and  '".$_GET[d2]."'
 and ov.age_y>= 0 
 and ov.age_y<= 200 
  and ovst.main_dep='011' ";
$query6 = mysqli_query($con,$sql);
$data5_er_all=mysqli_fetch_array($query6); 
  
 $sql = "select count( DISTINCT   (ov.hn) )as sum
from vn_stat ov, ovst ovst, patient pt 
where  ov.vn=ovst.vn and pt.hn=ov.hn and ov.vstdate between '".$_GET[d1]."' and  '".$_GET[d2]."'
 and ov.age_y>= 0 
 and ov.age_y<= 200 
  and ovst.main_dep='011'
 and ov.lastvisit_hour >= 48
 and ov.old_diagnosis = 'Y'";
$query6 = mysqli_query($con,$sql);
$data5_er=mysqli_fetch_array($query6); 
  
  $bb=$data5_opd_all[sum]+$data5_er_all[sum];
  $bb_j=$data5_opd[sum]+$data5_er[sum];
  ?>  
	
	  

<div class="row">
<div class="cell" data-title="รายการ">
<strong>อัตรา  Re-Visit</strong>
</div>
<div class="cell" data-title="จำนวน">
&nbsp;<?php echo number_format(($bb_j*100)/$bb,2)?> %
</div> 
</div>

<div class="row">
<div class="cell" data-title="รายการ">
&nbsp;&nbsp;- จำนวนผู้ป่วยที่มาโรงพยาบาลทั้งหมด
</div>
<div class="cell" data-title="จำนวน">
<?php echo number_format($bb,0); //echo $data2_all[sum] ?> คน
</div> 
</div>

<div class="row">
<div class="cell" data-title="รายการ">
&nbsp;&nbsp;- จำนวนผู้ป่วยที่มารับบริการแลัวกลับมารักษาซ้ำภายใน 48 ชม. ด้วยโรคเดิม
</div>
<div class="cell" data-title="จำนวน">
<?php echo number_format($bb_j,0); //echo $data2_all[sum] ?> คน
</div> 
</div>

 
</div> <p><a href="t1.php">เฉพาะโรค</a></p>
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
