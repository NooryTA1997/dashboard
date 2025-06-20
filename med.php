<?php   	
   include"connect.php"; 
?>
<form action="med.php?ac=add" method="post">
   <input type="date" name="d1"  value="<?php echo $_POST['d1']?>"   >
   <input type="date" name="d2"   value="<?php echo $_POST['d2']?>"   >
<br>

  ชื่อยา
   <input type="text" name="y1"  value="<?php echo $_POST['y1']?>"   >
   <input type="text" name="y2"   value="<?php echo $_POST['y2']?>"   >
   <?php 
   echo '<br>------------------------------------<br />';
    $objQuery  = mysqli_query($con," select  * from drugitems where  name='".$_POST['y1']."' ");
//group by opitemrece.order_no
while ($drugitems=mysqli_fetch_array($objQuery)){
	echo $drugitems['icode'].'<br>';
}
echo '<br>------------------------------------<br />';
    $objQuery  = mysqli_query($con," select  * from drugitems where  name='".$_POST['y2']."' ");
//group by opitemrece.order_no
while ($drugitems=mysqli_fetch_array($objQuery)){
	echo $drugitems['icode'].'<br>';
}
   ?>
<br>------------------------------------<br />


   <input type="text" name="n1"  value="<?php echo $_POST['n1']?>"   >
   <input type="text" name="n2"   value="<?php echo $_POST['n2']?>"   >
   <button type="submit" class="btn btn-primary waves-effect waves-light ">ค้นหา</button>
 
 
</form>

<table id="dom-jqry" class="table table-striped table-bordered nowrap" style="width:100%" border="1">
<thead>
<tr>
<th>ลำดับที่</th>
<th>OrderNo</th>
<th>ยา</th>
<th>HN</th>
<th>AN</th>
<th>VN</th>
<th>ชื่อ</th>
<th>วันที่</th>
 </tr>
</thead>
<tbody>

<?php   	
   $i=1;
   if($_GET['ac']=='add'){
	   
	    $sql  = mysqli_query($con,"select  * from drugitems  where icode='".$_POST['n1']."'  ");
$med1=mysqli_fetch_array($sql);


 $sql  = mysqli_query($con,"select  * from drugitems  where icode='".$_POST['n2']."'  ");
$med2=mysqli_fetch_array($sql);
/* $objQuery  = mysqli_query($con," select  * from opitemrece ,patient 
 where  opitemrece.hn=patient.hn 
and  opitemrece.vstdate BETWEEN '".$_POST['d1']."' AND '".$_POST['d2']."' 
and opitemrece.sub_type ='1' 
and  opitemrece.icode='".$_POST['n1']."' 
 
");*/
echo " select  * from opitemrece,patient 
 where   opitemrece.hn=patient.hn 
and  opitemrece.vstdate BETWEEN '".$_POST['d1']."' AND '".$_POST['d2']."' 
 
and  opitemrece.icode='".$_POST['n1']."'  order by vstdate desc
 
 
";
 $objQuery  = mysqli_query($con," select  * from opitemrece,patient 
 where   opitemrece.hn=patient.hn 
and  opitemrece.vstdate BETWEEN '".$_POST['d1']."' AND '".$_POST['d2']."' 
 
and  opitemrece.icode='".$_POST['n1']."'  order by vstdate desc
 
");
//group by opitemrece.order_no
while ($opitemrece=mysqli_fetch_array($objQuery)){
 
/* echo " select  * from opitemrece 
 where 1
 and opitemrece.vstdate BETWEEN '".$_POST['d1']."' AND '".$_POST['d2']."' 
and  opitemrece.icode='".$_POST['n2']."' 
and opitemrece.vn = '".$opitemrece['vn']."'
  ";
*/  
  



  $sql  = mysqli_query($con," select  * from opitemrece 
 where 1
 and opitemrece.vstdate BETWEEN '".$_POST['d1']."' AND '".$_POST['d2']."' 
and  opitemrece.icode='".$_POST['n2']."' 
and opitemrece.vn = '".$opitemrece['vn']."' 
  ");
$r2=mysqli_num_rows($sql);
 	
	
/*echo " select  * from opitemrece,patient 
 where opitemrece.hn=patient.hn
and opitemrece.order_no='".$opitemrece['order_no']."'
and  opitemrece.icode='".$_POST['n1']."' 
and opitemrece.vstdate BETWEEN '".$_POST['d1']."' AND '".$_POST['d2']."'  
and opitemrece.order_no>100 ";
echo '<br>';*/

/* $sql  = mysqli_query($con," select  * from opitemrece,patient 
 where opitemrece.hn=patient.hn
and opitemrece.order_no='".$opitemrece['order_no']."'
and  opitemrece.icode='".$_POST['n1']."' 
and opitemrece.vstdate BETWEEN '".$_POST['d1']."' AND '".$_POST['d2']."'  
and opitemrece.order_no>100 ");
$r1=mysqli_num_rows($sql);


 $sql  = mysqli_query($con," select  * from opitemrece ,patient 
 where  opitemrece.hn=patient.hn

and  opitemrece.icode='".$_POST['n2']."' 
and opitemrece.vstdate BETWEEN '".$_POST['d1']."' AND '".$_POST['d2']."' 
  ");
$r2=mysqli_num_rows($sql);
 	*/
	 if($r2>0){
	//if($r1>0 and $r2>0){
	 
		
 



		?>
        
        
        <tr>
<td> <?php echo $i.' -- '.$r1.'**'.$r2;?> </td>
<td> <?php echo $opitemrece['order_no']?> </td>
<td> <?php echo $med1['name']?> /////// <?php echo $med2['name']?> </td>
<td> <?php echo $opitemrece['hn']?> </td>
<td> <?php echo $opitemrece['an']?> </td>
<td> <?php echo $opitemrece['vn']?> </td>
<td> <?php echo $opitemrece['pname']?><?php echo $opitemrece['fname']?> <?php echo $opitemrece['lname']?> </td>
<td> <?php echo $opitemrece['vstdate']?> </td>
</tr>
		<?php
		$i++;
		  }
		}

echo '<br>';echo '<br>';}
?>