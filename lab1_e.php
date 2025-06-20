<?php   	
   include"connect.php"; 
   if($_GET['y']){$_GET['y']=$_GET['y'];}else{$_GET['y']=date('Y');}
   
   $f=$_GET['y']+543;
   header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="data'."lab ผู้ป้วยนอก ปี".$f.'.xls"  ');#ชื่อไฟล์
   
   
?>

<h3 align="center">แบบทบทวนเวชระเบียนผู้ป่วยเลปโตสไปโรสิส (ผู้ป่วยใน) ปี <?php echo $_GET['y']+543?></h3>
 

<table id="dom-jqry" class="table table-striped table-bordered nowrap" style="width:100%" border="1">
<thead>
<tr>
<th>ลำดับที่</th>
<th>HN</th>
<th>vn</th>
<th>ชื่อ-นามสกุล</th>
<th>อายุ</th>
<th>เพศ</th>
<th>เชื้อชาติ</th>
<th>ที่อยู่</th>
<th>อาชีพ</th>
<th>วันที่มารพ</th>
<th>วันที่จำหน่าย</th>
<th>วินิจฉัย(แรก)</th>
<th>วินิจฉัย(สุดท้าย)</th>
<th>ไข้</th>
<th>Lepto</th>
 </tr>
</thead>
<tbody>

<?php   	
   $i=1;
   //if($_GET['ac']=='add'){
	   
$sql  = mysqli_query($con,"select pt.hn as HN,ov.vn as vn,Concat(pt.pname, pt.fname, ' ', pt.lname) as 'ชื่อ-นามสกุล',
Concat(ov.age_y, 'ปี ' , ov.age_m,' เดือน') as 'อายุ',  sex.name  as 'เพศ',  nationality.name  as 'เชื้อชาติ'
,  pt.informaddr  as 'ที่อยู่' ,  occupation.name  as 'อาชีพ'
   ,ov.regdate as 'วันที่มารพ.',ov.dchdate as 'วันที่จำหน่าย',   ov.pdx as 'วินิจฉัย',  Concat(opdscreen.cc,   ',', opdscreen.hpi)   as 'ไข้'
from an_stat ov ,patient pt ,ipt ovst ,sex sex,occupation occupation,opdscreen opdscreen,nationality nationality
where ov.an=ovst.an 
and pt.sex = sex.code
and pt.occupation = occupation.occupation 
and ov.vn = opdscreen.vn and pt.nationality = nationality.nationality
and year(ov.dchdate)=".$_GET['y']."
and ov.hn=pt.hn 
 and ov.age_y>= 0 
 and ov.age_y<= 200  
 and ( (ov.pdx = 'A01') 
 or (ov.dx0 = 'A01') 
 or (ov.dx1 = 'A01') 
 or (ov.dx2 = 'A01') 
 or (ov.dx3 = 'A01') 
 or (ov.dx4 = 'A01') 
 or (ov.dx5 = 'A01') 
 or (ov.pdx = 'A24') 
 or (ov.dx0 = 'A24') 
 or (ov.dx1 = 'A24') 
 or (ov.dx2 = 'A24') 
 or (ov.dx3 = 'A24') 
 or (ov.dx4 = 'A24') 
 or (ov.dx5 = 'A24') 
 or (ov.pdx = 'A75') 
 or (ov.dx0 = 'A75') 
 or (ov.dx1 = 'A75') 
 or (ov.dx2 = 'A75') 
 or (ov.dx3 = 'A75') 
 or (ov.dx4 = 'A75') 
 or (ov.dx5 = 'A75') 
 or (ov.pdx = 'A753') 
 or (ov.dx0 = 'A753') 
 or (ov.dx1 = 'A753') 
 or (ov.dx2 = 'A753') 
 or (ov.dx3 = 'A753') 
 or (ov.dx4 = 'A753') 
 or (ov.dx5 = 'A753') 
 or (ov.pdx = 'B50') 
 or (ov.dx0 = 'B50') 
 or (ov.dx1 = 'B50') 
 or (ov.dx2 = 'B50') 
 or (ov.dx3 = 'B50') 
 or (ov.dx4 = 'B50') 
 or (ov.dx5 = 'B50') 
 or (ov.pdx = 'B51') 
 or (ov.dx0 = 'B51') 
 or (ov.dx1 = 'B51') 
 or (ov.dx2 = 'B51') 
 or (ov.dx3 = 'B51') 
 or (ov.dx4 = 'B51') 
 or (ov.dx5 = 'B51') 
 or (ov.pdx = 'B52') 
 or (ov.dx0 = 'B52') 
 or (ov.dx1 = 'B52') 
 or (ov.dx2 = 'B52') 
 or (ov.dx3 = 'B52') 
 or (ov.dx4 = 'B52') 
 or (ov.dx5 = 'B52') 
 or (ov.pdx = 'B53') 
 or (ov.dx0 = 'B53') 
 or (ov.dx1 = 'B53') 
 or (ov.dx2 = 'B53') 
 or (ov.dx3 = 'B53') 
 or (ov.dx4 = 'B53') 
 or (ov.dx5 = 'B53') 
 or (ov.pdx = 'B54') 
 or (ov.dx0 = 'B54') 
 or (ov.dx1 = 'B54') 
 or (ov.dx2 = 'B54') 
 or (ov.dx3 = 'B54') 
 or (ov.dx4 = 'B54') 
 or (ov.dx5 = 'B54') 
 or (ov.pdx = 'R509') 
 or (ov.dx0 = 'R509') 
 or (ov.dx1 = 'R509') 
 or (ov.dx2 = 'R509') 
 or (ov.dx3 = 'R509') 
 or (ov.dx4 = 'R509') 
 or (ov.dx5 = 'R509') 
)
 ");
 
 while ($opitemrece=mysqli_fetch_array($sql)){
 
  
		
 
	
 $datee1=explode('-',$opitemrece['วันที่มารพ.']);
$datee2=explode('-',$opitemrece['วันที่จำหน่าย']);

 $objQueryqx  = mysqli_query($con," SELECT  * 
FROM vn_stat WHERE vn ='".$opitemrece['vn']."'  ");
 $vnn=mysqli_fetch_array($objQueryqx);

		?>
        
        
        <tr>
<td> <?php echo $i;?> </td>
<td> <?php echo $opitemrece['HN']?> </td>
<td> <?php echo $opitemrece['vn']?> </td>
<td> <?php echo $opitemrece['ชื่อ-นามสกุล']?> </td>
<td> <?php echo $opitemrece['อายุ']?> </td>
<td> <?php echo $opitemrece['เพศ']?> </td>
<td> <?php echo $opitemrece['เชื้อชาติ']?> </td>
<td> <?php echo $opitemrece['ที่อยู่']?> </td><td> <?php echo $opitemrece['อาชีพ']?> </td>
<td> <?php echo $datee1[2].'/'.$datee1[1].'/'?><?php echo $datee1[0]+543?> </td>
<td> <?php echo $datee2[2].'/'.$datee2[1].'/'?><?php echo $datee2[0]+543?> </td>
<td> <?php echo $vnn['pdx']?> </td>
<td> <?php echo $opitemrece['วินิจฉัย']?> </td>
<td> <?php echo $opitemrece['ไข้']?> </td>
<td> <?php 
 $objQueryq  = mysqli_query($con," SELECT     lab_items.lab_items_name as namee,  lab_order.lab_order_result as res
FROM lab_head , lab_order   ,lab_items
WHERE lab_head.lab_order_number = lab_order.lab_order_number
and lab_order.lab_items_code = lab_items.lab_items_code
and   lab_head.vn='".$opitemrece['vn']."'  ");
 while ($lab_head=mysqli_fetch_array($objQueryq)){
	
	if($lab_head['namee']){
		echo '- '.$lab_head['namee'].'<span style="color:#F00">('.$lab_head['res'].')</span><br>';
	}
}?> </td>
</tr>
		<?php
		$i++;
		  }
		 
//echo '<br>';echo '<br>';}
?>