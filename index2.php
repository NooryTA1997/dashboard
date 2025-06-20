<!--<meta http-equiv='refresh' content='30;URL=index.php' />-->
<?php include"main/hh.php"; ?>


		<!-- *************
			************ Header section start *************
		************* -->

<?php include"main/m_bar.php"; ?>
		
		<!-- Header end -->

		<!-- *************
			************ Header section end *************
		************* -->

<?php include"main/m_menu.php"; ?>
		
			<!-- Navigation end -->


			<!-- *************
				************ Main container start *************
			************* -->
			<div class="main-container">

<!-- Page header start -->
				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active">Hospital Dashboard </li>
					</ol>
					<div class="contact">
                    
						
						<div class="details"  style="border-right:solid 1px #e05b5b">
							<div class="info">ติดต่อผู้อำนวยการ&nbsp;&nbsp; </div>
							<div class="contact-number">089 870 9474</div>
						</div>
                    
						<div class="details">
							<div class="info"> &nbsp;&nbsp;ด่วนฉุกเฉิน</div>
							<div class="contact-number">1669</div>
						</div>
                       
                    
					</div>
					

				</div> 
                
                
				<!-- Page header end -->




				<!-- Content wrapper start -->
				<div class="content-wrapper">


<?php
 
		include"connect.php";								
/*		$sql1 = "SELECT *
    FROM follow  ";
		$query1 = mysqli_query($con,$sql1);
		while ($data1=mysqli_fetch_array($query1)){
			//foreach($query1 as $data1) {
		echo 	$ptm_opd_hn = $data1['id'];
			$ptm_opd_vn = $data1['ptm_opd_vn'];
			$pt_opd_today = $data1['pt_opd_today'];
      }*/
	$wheredate='';
 	
	if($_GET['date']){  
	
	
	
	
	$sql1 = "SELECT COUNT(DISTINCT hn) AS ptm_opd_hn,COUNT(DISTINCT vn) AS ptm_opd_vn
    ,COUNT(DISTINCT IF(vstdate =  '".$_GET['date']."',vn,NULL)) AS pt_opd_today
    FROM ovst
    WHERE vstdate BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d')";
		$query1 = mysqli_query($con,$sql1);
		while ($data1=mysqli_fetch_array($query1)){
			//foreach($query1 as $data1) {
			$ptm_opd_hn = $data1['ptm_opd_hn'];
			$ptm_opd_vn = $data1['ptm_opd_vn'];
			$pt_opd_today = $data1['pt_opd_today'];
      }
	  
	  $sql2 = "SELECT COUNT(DISTINCT hn) AS ptm_phy_hn,COUNT(DISTINCT vn) AS ptm_phy_vn
    ,COUNT(DISTINCT IF(vstdate = '".$_GET['date']."',vn,NULL)) AS pt_phy_today
    FROM physic_main
    WHERE vstdate BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d') ";
		$query2 = mysqli_query($con,$sql2);
 		foreach($query2 as $data2) {
			$ptm_phy_hn = $data2['ptm_phy_hn'];
			$ptm_phy_vn = $data2['ptm_phy_vn'];
			$pt_phy_today = $data2['pt_phy_today'];
    }
	
			$sql6 = "SELECT COUNT(DISTINCT hn) AS ptm_ipd_hn,COUNT(DISTINCT an) AS ptm_ipd_an
    ,COUNT(DISTINCT IF(regdate = '".$_GET['date']."',an,NULL)) AS pt_ipd_today
    FROM ipt
    WHERE regdate BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d')";
		$query6 = mysqli_query($con,$sql6);
		while ($data6=mysqli_fetch_array($query6)){
      $ptm_ipd_hn = $data6['ptm_ipd_hn'];
      $ptm_ipd_an = $data6['ptm_ipd_an'];
      $pt_ipd_today = $data6['pt_ipd_today'];
    }
      
	  
	  	$sql7 = "SELECT COUNT(DISTINCT hn) AS ptm_dent_hn,COUNT(DISTINCT vn) AS ptm_dent_vn
    ,COUNT(DISTINCT IF(vstdate = '".$_GET['date']."',vn,NULL)) AS pt_dent_today
    FROM dtmain
    WHERE vstdate BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d') ";
	$query1 = mysqli_query($con,$sql7);
		while ($data7=mysqli_fetch_array($query1)){
      $ptm_dent_hn = $data7['ptm_dent_hn'];
      $ptm_dent_vn = $data7['ptm_dent_vn'];
      $pt_dent_today = $data7['pt_dent_today'];
      }

		$sql8 = "SELECT COUNT(DISTINCT hn) AS ptm_ttm_hn,COUNT(*) AS ptm_ttm_vn
    ,COUNT(DISTINCT IF(service_date = '".$_GET['date']."',vn,NULL)) AS pt_ttm_today
    FROM health_med_service
    WHERE service_date BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d')
    #AND in_hospcode_service = 'Y' ";
	$query1 = mysqli_query($con,$sql8);
		while ($data8=mysqli_fetch_array($query1)){
      $ptm_ttm_hn = $data8['ptm_ttm_hn'];
      $ptm_ttm_vn = $data8['ptm_ttm_vn'];
      $pt_ttm_today = $data8['pt_ttm_today'];
      }
      
		$sql3 = "SELECT COUNT(DISTINCT o.hn) AS ptm_er_hn,COUNT(DISTINCT o.vn) AS ptm_er_vn
    ,COUNT(DISTINCT IF(er.vstdate = '".$_GET['date']."',o.vn,NULL)) AS pt_er_today
        FROM er_regist er 
        LEFT OUTER JOIN ovst o ON o.vn = er.vn
        LEFT OUTER JOIN er_pt_type et ON et.er_pt_type = er.er_pt_type 
        WHERE er.vstdate BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d')
        AND er.er_pt_type IN (SELECT er_pt_type FROM er_pt_type ) ";
		$query1 = mysqli_query($con,$sql3);
		while ($data3=mysqli_fetch_array($query1)){
			$ptm_er_hn = $data3['ptm_er_hn'];
			$ptm_er_vn = $data3['ptm_er_vn'];
			$pt_er_today = $data3['pt_er_today'];
    }
    
		$sql4 = "SELECT COUNT(DISTINCT hn) AS ptm_or_hn
    ,COUNT(hn) AS ptm_or_vn
    ,COUNT(IF(patient_department = 'OPD',vn,NULL)) AS ptm_or_opd
    ,COUNT(IF(patient_department = 'IPD',an,NULL)) AS ptm_or_ipd
    ,COUNT(IF(operation_date = '".$_GET['date']."',hn,NULL)) AS pt_or_today
    FROM operation_list
    WHERE operation_date BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d') ";
	$query1 = mysqli_query($con,$sql4);
		while ($data4=mysqli_fetch_array($query1)){
			$ptm_or_hn = $data4['ptm_or_hn'];
			$ptm_or_vn = $data4['ptm_or_vn'];
			$ptm_or_opd = $data4['ptm_or_opd'];
			$ptm_or_ipd = $data4['ptm_or_ipd'];
			$pt_or_today = $data4['pt_or_today'];
    }
    
		$sql5 = "SELECT COUNT(DISTINCT hn) AS ptm_xray_hn,COUNT(vn) AS ptm_xray_vn
    ,COUNT(IF(examined_date = '".$_GET['date']."',vn,NULL)) AS pt_xray_today
    FROM xray_report
    WHERE examined_date BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d') ";
	$query1 = mysqli_query($con,$sql5);
		while ($data5=mysqli_fetch_array($query1)){
 			$ptm_xray_hn = $data5['ptm_xray_hn'];
			$ptm_xray_vn = $data5['ptm_xray_vn'];
			$pt_xray_today = $data5['pt_xray_today'];
		}


		$s = "SELECT count(p.vn) as cc from ptdepart p
left outer join vn_stat v on v.vn = p.vn
where v.vstdate = curdate() and p.depcode IN (010) and outtime is not null";
$res = mysqli_query($con, $s);
$row = mysqli_fetch_array($res);



$s_sc = "select count(DISTINCT ov.hn) as ptm_preg_hn ,count(ov.vn) as ptm_preg_vn
,COUNT(IF(ov.vstdate = '".$_GET['date']."',ov.vn,NULL)) AS pt_preg_today
from vn_stat ov, ovst ovst, patient pt 
where  ov.vn=ovst.vn and pt.hn=ov.hn 
and ov.vstdate   BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d') 
 and ov.age_y>= 0 
 and ov.age_y<= 200 
 and ovst.main_dep='036'
";
$q_scchn = mysqli_query($con, $s_sc);
while ($r_scchn = mysqli_fetch_array($q_scchn)){


   $ptm_preg_hn = $r_scchn['ptm_preg_hn'];
   $ptm_preg_vn = $r_scchn['ptm_preg_vn'];
   $pt_preg_today = $r_scchn['pt_preg_today'];

}
		
		
		

	
	}else{
		
		////////////////////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////
		  
	
		  $sql1 = "SELECT COUNT(DISTINCT hn) AS ptm_opd_hn,COUNT(DISTINCT vn) AS ptm_opd_vn
    ,COUNT(DISTINCT IF(vstdate = DATE_FORMAT(NOW(),'%Y-%m-%d'),vn,NULL)) AS pt_opd_today
    FROM ovst
    WHERE vstdate BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d')";
		$query1 = mysqli_query($con,$sql1);
		while ($data1=mysqli_fetch_array($query1)){
			//foreach($query1 as $data1) {
			$ptm_opd_hn = $data1['ptm_opd_hn'];
			$ptm_opd_vn = $data1['ptm_opd_vn'];
			$pt_opd_today = $data1['pt_opd_today'];
      }
	  
	  $sql2 = "SELECT COUNT(DISTINCT hn) AS ptm_phy_hn,COUNT(DISTINCT vn) AS ptm_phy_vn
    ,COUNT(DISTINCT IF(vstdate = DATE_FORMAT(NOW(),'%Y-%m-%d'),vn,NULL)) AS pt_phy_today
    FROM physic_main
    WHERE vstdate BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d') ";
		$query2 = mysqli_query($con,$sql2);
 		foreach($query2 as $data2) {
			$ptm_phy_hn = $data2['ptm_phy_hn'];
			$ptm_phy_vn = $data2['ptm_phy_vn'];
			$pt_phy_today = $data2['pt_phy_today'];
    }
	
			$sql6 = "SELECT COUNT(DISTINCT hn) AS ptm_ipd_hn,COUNT(DISTINCT an) AS ptm_ipd_an
    ,COUNT(DISTINCT IF(regdate = DATE_FORMAT(NOW(),'%Y-%m-%d'),an,NULL)) AS pt_ipd_today
    FROM ipt
    WHERE regdate BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d')";
		$query6 = mysqli_query($con,$sql6);
		while ($data6=mysqli_fetch_array($query6)){
      $ptm_ipd_hn = $data6['ptm_ipd_hn'];
      $ptm_ipd_an = $data6['ptm_ipd_an'];
      $pt_ipd_today = $data6['pt_ipd_today'];
    }
      
	  
	  	$sql7 = "SELECT COUNT(DISTINCT hn) AS ptm_dent_hn,COUNT(DISTINCT vn) AS ptm_dent_vn
    ,COUNT(DISTINCT IF(vstdate = DATE_FORMAT(NOW(),'%Y-%m-%d'),vn,NULL)) AS pt_dent_today
    FROM dtmain
    WHERE vstdate BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d') ";
	$query1 = mysqli_query($con,$sql7);
		while ($data7=mysqli_fetch_array($query1)){
      $ptm_dent_hn = $data7['ptm_dent_hn'];
      $ptm_dent_vn = $data7['ptm_dent_vn'];
      $pt_dent_today = $data7['pt_dent_today'];
      }

		$sql8 = "SELECT COUNT(DISTINCT hn) AS ptm_ttm_hn,COUNT(*) AS ptm_ttm_vn
    ,COUNT(DISTINCT IF(service_date = DATE_FORMAT(NOW(),'%Y-%m-%d'),vn,NULL)) AS pt_ttm_today
    FROM health_med_service
    WHERE service_date BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d')
    #AND in_hospcode_service = 'Y' ";
	$query1 = mysqli_query($con,$sql8);
		while ($data8=mysqli_fetch_array($query1)){
      $ptm_ttm_hn = $data8['ptm_ttm_hn'];
      $ptm_ttm_vn = $data8['ptm_ttm_vn'];
      $pt_ttm_today = $data8['pt_ttm_today'];
      }
      
		$sql3 = "SELECT COUNT(DISTINCT o.hn) AS ptm_er_hn,COUNT(DISTINCT o.vn) AS ptm_er_vn
    ,COUNT(DISTINCT IF(er.vstdate = DATE_FORMAT(NOW(),'%Y-%m-%d'),o.vn,NULL)) AS pt_er_today
        FROM er_regist er 
        LEFT OUTER JOIN ovst o ON o.vn = er.vn
        LEFT OUTER JOIN er_pt_type et ON et.er_pt_type = er.er_pt_type 
        WHERE er.vstdate BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d')
        AND er.er_pt_type IN (SELECT er_pt_type FROM er_pt_type ) ";
		$query1 = mysqli_query($con,$sql3);
		while ($data3=mysqli_fetch_array($query1)){
			$ptm_er_hn = $data3['ptm_er_hn'];
			$ptm_er_vn = $data3['ptm_er_vn'];
			$pt_er_today = $data3['pt_er_today'];
    }
    
		$sql4 = "SELECT COUNT(DISTINCT hn) AS ptm_or_hn
    ,COUNT(hn) AS ptm_or_vn
    ,COUNT(IF(patient_department = 'OPD',vn,NULL)) AS ptm_or_opd
    ,COUNT(IF(patient_department = 'IPD',an,NULL)) AS ptm_or_ipd
    ,COUNT(IF(operation_date = DATE_FORMAT(NOW(),'%Y-%m-%d'),hn,NULL)) AS pt_or_today
    FROM operation_list
    WHERE operation_date BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d') ";
	$query1 = mysqli_query($con,$sql4);
		while ($data4=mysqli_fetch_array($query1)){
			$ptm_or_hn = $data4['ptm_or_hn'];
			$ptm_or_vn = $data4['ptm_or_vn'];
			$ptm_or_opd = $data4['ptm_or_opd'];
			$ptm_or_ipd = $data4['ptm_or_ipd'];
			$pt_or_today = $data4['pt_or_today'];
    }
    
		$sql5 = "SELECT COUNT(DISTINCT hn) AS ptm_xray_hn,COUNT(vn) AS ptm_xray_vn
    ,COUNT(IF(examined_date = DATE_FORMAT(NOW(),'%Y-%m-%d'),vn,NULL)) AS pt_xray_today
    FROM xray_report
    WHERE examined_date BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d') ";
	$query1 = mysqli_query($con,$sql5);
		while ($data5=mysqli_fetch_array($query1)){
 			$ptm_xray_hn = $data5['ptm_xray_hn'];
			$ptm_xray_vn = $data5['ptm_xray_vn'];
			$pt_xray_today = $data5['pt_xray_today'];
		}


		$s = "SELECT count(p.vn) as cc from ptdepart p
left outer join vn_stat v on v.vn = p.vn
where v.vstdate = curdate() and p.depcode IN (010) and outtime is not null";
$res = mysqli_query($con, $s);
$row = mysqli_fetch_array($res);






    
		$sql5 = "SELECT COUNT(DISTINCT hn) AS ptm_xray_hn,COUNT(vn) AS ptm_xray_vn
    ,COUNT(IF(examined_date = DATE_FORMAT(NOW(),'%Y-%m-%d'),vn,NULL)) AS pt_xray_today
    FROM xray_report
    WHERE examined_date BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d') ";
	$query1 = mysqli_query($con,$sql5);
		while ($data5=mysqli_fetch_array($query1)){
 			$ptm_xray_hn = $data5['ptm_xray_hn'];
			$ptm_xray_vn = $data5['ptm_xray_vn'];
			$pt_xray_today = $data5['pt_xray_today'];
		}


 
$s_sc = "select count(DISTINCT ov.hn) as ptm_preg_hn ,count(ov.vn) as ptm_preg_vn
,COUNT(IF(ov.vstdate = DATE_FORMAT(NOW(),'%Y-%m-%d'),ov.vn,NULL)) AS pt_preg_today
from vn_stat ov, ovst ovst, patient pt 
where  ov.vn=ovst.vn and pt.hn=ov.hn 
and ov.vstdate   BETWEEN DATE_FORMAT(NOW(),'%Y-%m-01') AND DATE_FORMAT(NOW(),'%Y-%m-%d') 
 and ov.age_y>= 0 
 and ov.age_y<= 200 
 and ovst.main_dep='036'
";
$q_scchn = mysqli_query($con, $s_sc);
while ($r_scchn = mysqli_fetch_array($q_scchn)){


   $ptm_preg_hn = $r_scchn['ptm_preg_hn'];
   $ptm_preg_vn = $r_scchn['ptm_preg_vn'];
   $pt_preg_today = $r_scchn['pt_preg_today'];

}

 
 		
$s_sc = "SELECT count(q.vn) cc from ovst_queue_server q inner join ovst o on o.vn = q.vn where q.date_visit = CURRENT_DATE() and o.cur_dep IN (010)  and q.status = '1'
AND q.stationno IS NULL";
$q_sc = mysqli_query($con, $s_sc);
$r_sc = mysqli_fetch_array($q_sc);
//echo $r_sc['cc'];

/*$s_sc = "select count(ov.hn) as chn 
from vn_stat ov, ovst ovst, patient pt 
where  ov.vn=ovst.vn and pt.hn=ov.hn and ov.vstdate = '".date('Y-m-d')."'
 and ov.age_y>= 0 
 and ov.age_y<= 200 
 and ovst.main_dep='036'
";
$q_scchn = mysqli_query($con, $s_sc);
$r_scchn = mysqli_fetch_array($q_scchn);*/


$sc_time_s = "select SEC_TO_TIME(floor(sum(TIME_TO_SEC(TIMEDIFF(time_start,time_visit_opd)))/count(*))) total 
from ovst_queue_server_time t 
INNER JOIN ovst_queue_server o on t.vn = o.vn
where o.date_visit = CURDATE()
and t.dep IN (010) ";
$sc_time_q = mysqli_query($con, $sc_time_s);
$sc_time_r = mysqli_fetch_array($sc_time_q);
$sc_wait = strtotime($sc_time_r['total']);
$sc_minutes = intval(date("i", $sc_wait));
//echo $sc_minutes;



 }

//echo $row['cc'];
?>
 
	<!-- Row start -->
     

					<div class="row gutters">
                    
                    
                    
                    	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
							 <div class="card bg-success">
								 
                                 
                                
                                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15865.254661685898!2d101.808916!3d6.2223072!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3c5a86f30a289b4c!2z4LmC4Lij4LiH4Lie4Lii4Liy4Lia4Liy4Lil4LmA4LiI4Liy4Liw4LmE4Lit4Lij4LmJ4Lit4LiH!5e0!3m2!1sth!2sth!4v1665471200825!5m2!1sth!2sth"  height="150"  style="border:0; width:100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
                                 
                                 <div class="card-body">
								 
                                 
  <table style="width:100%; color:#FFF" border="0">
                                  <tr>
                                    <td style="width:70%"><div id="opd_today"></div>
                                    	<?php /*?><h4 style="font-size:42px"><?php echo number_format($pt_opd_today,0);?></h4>
                                    	<p> ผู้รับบริการวันนี้</p>
                                        <p> (เดือนนี้ <?php echo number_format($ptm_opd_hn,0);?> คน / <?php echo number_format($ptm_opd_vn,0);?> ครั้ง)</p><?php */?>
                                    </td>
                                    <td align="right"> <img src="img/c11.png" width="100" ></td>
                                  </tr>
                                </table>

                                  
							 
							</div></div>
						</div>
                        
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="card bg-info">
								 
								<div class="card-body">
                               
                                 <table style="width:100%; color:#FFF" border="0">
                                  <tr>
                                    <td style="width:35%" align="center"><div id="q"></div>
                                    	<?php /*?><h4 style="font-size:42px"><i class="fa fa-user"></i><?php echo number_format($r_sc['cc'],0);?></h4>
                                    	<p> ผู้ป่วยรอรับบริการ</p><?php */?>
                                      <!--  <p> (เดือนนี้ 0 คน / 0 ครั้ง)</p>-->
                                    </td>
                                    <td style="width:35%"  align="center"><div id="vn"></div>
                                    	<?php /*?><h4 style="font-size:42px"> <?php echo number_format($row['cc'],0);?></h4>
                                    	<p> ผู้ป่วยรับบริการแล้ว</p><?php */?>
                                       <!-- <p> (เดือนนี้ 0 คน / 0 ครั้ง)</p>-->
                                    </td>
                                    <td rowspan="2" align="right"> <img src="img/c4.png" width="100" > </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" align="center"  >
                                    <div id="ovst_q"></div>
                                    	
                                      
                                    </td>
                                   </tr>
                                </table> 

								 
				        </div>
							</div>
                            
                           
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                         <div class="card " style="background-color:#e8416d">
                         <div class="card-body">
								<!--<div class="card-header">
									<div class="card-title"></div>
								</div>-->
                                   <table style="width:100%; color:#FFF" border="0">
                                  <tr>
                                    <td style="width:70%"><div id="ipd"></div>
                                    	<?php /*?><h4 style="font-size:42px"><?php echo number_format($pt_ipd_today,0);?></h4>
                                    	<p> Admit วันนี้</p>
                                        <p> (เดือนนี้ <?php echo number_format($ptm_ipd_hn,0);?> คน / <?php echo number_format($ptm_ipd_an,0);?> ครั้ง)</p><?php */?>
                                    </td>
                                    <td align="right"> <img src="img/c2.png" width="100" ></td>
                                  </tr>
                                </table>

                                  
                             <!--     
								<div class="card-body">Admit วันนี้
								 <br> <br> <br> <br> <br> <br> <br>  

								</div>-->
							</div></div>
							
						</div>
					
					</div>
					<!-- Row end -->
                    
					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-12">
							<div class="hospital-tiles red ">
								<img src="img/h1.png" alt="Appointments"/>
                                <p>อุบัติเหตุและฉุกเฉิน วันนี้</p><div id="er"></div><br>

								 <p align="center" style="font-size:18px"><img src="tel.png" style="height:18px"  /> 095-438-7667</p>
								<?php /*?><h2><?php echo number_format($pt_er_today,0);?></h2>(เดือนนี้ <?php echo number_format($ptm_er_hn,0);?> คน / <?php echo number_format($ptm_er_vn,0);?> ครั้ง)<?php */?>
							</div>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-12">
							<div class="hospital-tiles primary">
								<img src="img/h2.png" alt="Patients" />
                                <p>ทันตกรรม วันนี้</p><div id="dent"></div>
								
								<?php /*?><h2><?php echo number_format($pt_dent_today,0);?></h2>(เดือนนี้ <?php echo number_format($ptm_dent_hn,0);?> คน / <?php echo number_format($ptm_dent_vn,0);?>  ครั้ง)<?php */?>
							</div>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-12">
							<div class="hospital-tiles green">
								<img src="img/h4.png" alt="Patients" />
								<p>แพทย์แผนไทย วันนี้</p><div id="ttm"></div>
								<?php /*?><h2><?php echo number_format($pt_ttm_today,0);?></h2>(เดือนนี้ <?php echo number_format($ptm_ttm_hn,0);?> คน / <?php echo number_format($ptm_ttm_vn,0);?> ครั้ง)<?php */?>
							</div>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-12">
							<div class="hospital-tiles yellow">
                            	<img src="img/h8.png" alt="Operations" />
								
								<p>กายภาพบำบัด วันนี้</p>
                                <div id="phy"></div>
								<?php /*?><h2><?php echo number_format($pt_phy_today,0);?></h2>(เดือนนี้ <?php echo number_format($ptm_phy_hn,0);?> คน / <?php echo number_format($ptm_phy_vn,0);?> ครั้ง)<?php */?>
							</div>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-12">
							<div class="hospital-tiles secondary">
								 <img src="img/h6.png" alt="Doctors" />
								<p>X-RAY วันนี้</p><div id="xray"></div>
								<?php /*?><h2><?php echo number_format($pt_xray_today,0);?></h2>(เดือนนี้ <?php echo number_format($ptm_xray_hn,0);?> คน / <?php echo number_format($ptm_xray_vn,0);?> ครั้ง)<?php */?>
							</div>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-12">
							<div class="hospital-tiles blue">
								 
                               
                                <img src="img/h7.png" alt="Staff" /><!--<img src="img/hospital/staff.svg" alt="Staff" />-->
								<p>ฝากครรภ์ วันนี้</p><div id="preg"></div>
								<?php /*?><h2><?php  echo number_format($pt_preg_today,0);?></h2> (เดือนนี้ <?php echo number_format($ptm_preg_hn,0);?> คน / <?php echo number_format($ptm_preg_vn,0);?> ครั้ง)<?php */?>

							</div>
						</div>
					</div>
					<!-- Row end -->



<?php
	$sql = "SELECT COUNT(*) AS wtotal
    ,(SELECT SUM(bedcount) FROM ward WHERE ward_active = 'Y')-COUNT(*) AS wblank
    FROM ipt WHERE dchdate IS NULL ";
	$query6 = mysqli_query($con,$sql);
	while ($data=mysqli_fetch_array($query6)){
			
 			$ipt_wtotal = $data['wtotal'];
			$ipt_wblank = $data['wblank'];
			}

    $sql = "SELECT COUNT(IF(pttype IN (SELECT pttype FROM pttype WHERE pcode IN (SELECT `code` FROM pcode WHERE tph_pttype_group = 'UC')),an,NULL)) AS 'uc'
    ,COUNT(IF(pttype IN (SELECT pttype FROM pttype WHERE pcode IN ('A1','A2')),an,NULL)) AS 'mo'
    ,COUNT(IF(pttype NOT IN (
    SELECT pttype FROM pttype WHERE pcode IN (SELECT `code` FROM pcode WHERE tph_pttype_group = 'UC')
    UNION
    SELECT pttype FROM pttype WHERE pcode IN ('A1','A2')
    ),an,NULL)) AS 'ot'
    FROM ipt WHERE dchdate IS NULL";
	
	$query6 = mysqli_query($con,$sql);
	while ($data=mysqli_fetch_array($query6)){
		 
			$ipt_mo = $data['mo'];
			$ipt_uc = $data['uc'];
			$ipt_ot = $data['ot'];
			}

		$sql = "SELECT COUNT(*) AS admittoday FROM ipt WHERE regdate = DATE_FORMAT(NOW(),'%Y-%m-%d') ";
		$query6 = mysqli_query($con,$sql);
	while ($data=mysqli_fetch_array($query6)){
			$ipt_admittoday = $data['admittoday'];
			}

		$sql = "SELECT COUNT(*) AS dchtoday FROM ipt WHERE dchdate = DATE_FORMAT(NOW(),'%Y-%m-%d') ";
		$query6 = mysqli_query($con,$sql);
	while ($data=mysqli_fetch_array($query6)){
			$ipt_dchtoday = $data['dchtoday'];
			}

		$sql = "SELECT COUNT(*) AS movetoday FROM iptbedmove WHERE movedate = DATE_FORMAT(NOW(),'%Y-%m-%d') ";
		$query6 = mysqli_query($con,$sql);
	while ($data=mysqli_fetch_array($query6)){
			$ipt_movetoday = $data['movetoday'];
			}

 		$sql = "SELECT SUM(bedcount) AS bedcount FROM ward WHERE ward_active = 'Y' ";
		$query6 = mysqli_query($con,$sql);
	while ($data=mysqli_fetch_array($query6)){
			$ipt_bedcount = $data['bedcount'];
			}

if ($_POST['submitsend'] == null) {
	$myearb = date("Y")-1;
	$myeare = date("Y");
} else {
	$myearb = $_POST['year']-544;
	$myeare = $_POST['year']-543;
}

$nowdate = date("Y-m-d");
if ($nowdate > $myeare."-09-30") {
    $enddate = $myeare."-09-30";
} else {
    $enddate = date("Y-m-d");
}

		$sql = "SELECT (SUM(i.admdate)*100)/((SELECT SUM(bedcount) FROM ward WHERE ward_active = 'Y')*DATEDIFF('$enddate','$myearb-10-01')+1) AS admsum
			FROM an_stat i
			WHERE i.dchdate BETWEEN '$myearb-10-01' AND '$myeare-09-30' ";
		$query6 = mysqli_query($con,$sql);
	while ($data=mysqli_fetch_array($query6)){
			$ipt_admsum = $data['admsum'];
			}
?>
					<!-- Row start -->
					<div class="row gutters">
                    	<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="list-group" style="background-color:#FFF" >
                            <div class="events-container">
                         
                                         <div id="total"></div>   
                                        
								<?php /*?><div   class="list-group-item list-group-item-action    bg-info">
									   <div class="event-list">
											<div class="event-icon bg-info">
												<i class="icon-event_available"></i>
											</div>
											<div class="event-info">
												<div class="event-title" style="color:#FFF; font-size:24px">สถิติผู้ป่วยในวันนี้</div>
												<div class="event-date" style="color:#FFF; font-size:18px">จำนวนเตียงทั้งหมด <?php echo number_format($ipt_bedcount,0);?> เตียง</div>
											</div>
										</div>
                                        </div>
								</div>
                                
          

                                <div class="row  "  >
                                	<div class=" col-md-6 col-sm-6 col-12"  > 
                                        <div   class="list-group-item d-flex justify-content-between align-items-center" style="border-right: none">รับใหม่วันนี้  <span class="badge badge-danger badge-pill"><?php echo number_format($ipt_admittoday,0);?> เตียง</span></div>
                                        <div   class="list-group-item d-flex justify-content-between align-items-center" style="border-right: none">จำหน่ายวันนี้  <span class="badge badge-warning badge-pill"><?php echo number_format($ipt_dchtoday,0);?> เตียง</span></div>
                                        <div   class="list-group-item d-flex justify-content-between align-items-center" style="border-right: none">Admit อยู่  <span class="badge badge-secondary badge-pill"><?php echo number_format($ipt_wtotal,0);?> เตียง</span></div>
                                        <div   class="list-group-item d-flex justify-content-between align-items-center" style="border-right: none">เตียงว่าง  <span class="badge badge-success badge-pill"><?php echo number_format($ipt_wblank,0);?> เตียง</span></div>
                                	</div>
                                	<div class=" col-md-6 col-sm-6 col-12">
                                        <div   class="list-group-item d-flex justify-content-between align-items-center" style="border-left: none"> สิทธิ์ชำระเงินและเบิกได้  <span class="badge badge-dark badge-pill"><?php echo number_format($ipt_mo,0);?> เตียง</span></div>
                                        <div   class="list-group-item d-flex justify-content-between align-items-center" style="border-left: none">สิทธิ์ UC  <span class="badge badge-dark badge-pill"><?php echo number_format($ipt_uc,0);?> เตียง</span></div>
                                        <div   class="list-group-item d-flex justify-content-between align-items-center" style="border-left: none">สิทธิอื่นๆ  <span class="badge badge-dark badge-pill"><?php echo number_format($ipt_ot,0);?> เตียง</span></div>
                                        <div   class="list-group-item d-flex justify-content-between align-items-center" style="border-left: none">อัตราการครองเตียง  <span class="badge badge-danger badge-pill"><?php echo number_format($ipt_admsum,2);?> %</span></div>
                                	</div>
                                </div>
                                <?php */?>
                                
							</div>
						</div></div>
                        
                        
                   
<?php
include"../connect.php";	

$sql = "SELECT w.ward,w.name,w.bedcount,COUNT(*) AS admitnow
    FROM ipt i
    LEFT OUTER JOIN ward w ON w.ward = i.ward
        LEFT OUTER JOIN patient p ON p.hn = i.hn
    WHERE dchdate IS NULL   and  year(birthday)!=DATE_FORMAT(NOW(),'%Y') 
    GROUP BY w.ward
    ORDER BY w.ward ASC ";
	$query6 = mysqli_query($con,$sql);
	while ($data=mysqli_fetch_array($query6)){
		//echo $data['name'];
		 
      if ($data['admitnow']*100/$data['bedcount'] >= 100) {
        $bg_info_color = "danger";
      } else if ($data['admitnow']*100/$data['bedcount'] >= 75) {
        $bg_info_color = "warning";
      } else if ($data['admitnow']*100/$data['bedcount'] >= 50) {
        $bg_info_color = "info";
      } else {
        $bg_info_color = "success";
      }
      if ($data['bedcount']-$data['admitnow'] <= 0) {
        $bedblank = "เต็ม";
      } else {
        $bedblank1 = $data['bedcount']-$data['admitnow'];
        $bedblank = "ว่าง ".$bedblank1;
      } 
//echo $row['cc'];
?>
 <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
 
							<div id="ward<?php echo $data['ward']?>"></div>   
						 
						</div>
                        
                        <?php }?>
                

 

        
					</div>
					<!-- Row end -->

























<?php
/*
if ($_POST['submitsend'] == null) {
	if (date("m") > 9) {
		$myearb = date("Y");
		$myeare = date("Y")+1;
	} else {
		$myearb = date("Y")-1;
		$myeare = date("Y");
	}
} else {
	$myearb = $_POST['year']-544;
	$myeare = $_POST['year']-543;
}

$nowdate = date("Y-m-d");
$TH_Month = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$nMonth = date("n")-1;
if ($nowdate > $myeare."-09-30") {
    $enddate = $myeare."-09-30";
    $enddate2 = "30 ก.ย.";
} else {
    $enddate = date("Y-m-d");
    $enddate2 = date('j ').$TH_Month[$nMonth];
}

if ($_GET['y'] || NULL) {
    $tab_active3 = "active ";
} else {
    $tab_active1 = "active ";
    $tab_active2 = "";
    $tab_active9 = "";
}



 $amonth = array(); //ตัวแปรแกน y
 $ptvisit = array(); //ตัวแปรแกน y
 $ptopd = array(); //ตัวแปรแกน y
 $ptipd = array(); //ตัวแปรแกน y
 
		$sql = "SELECT vn,vstdate,vsttime
					FROM ovst
					WHERE vstdate = DATE_FORMAT(NOW(),'%Y-%m-%d') 
					AND vn = (SELECT MAX(vn) FROM ovst WHERE vstdate = DATE_FORMAT(NOW(),'%Y-%m-%d')
					AND vsttime <= TIME_FORMAT(NOW(),'%H:%i:%s'))";
		$query6 = mysqli_query($con,$sql);
		while($data=mysqli_fetch_array($query6)) {
			$opd_vn = $data['vn'];
			$opd_vstdate = $data['vstdate'];
			$opd_vsttime = $data['vsttime'];
			}
		
		$sql = "SELECT an,regdate,regtime
					FROM ipt
					WHERE regdate = DATE_FORMAT(NOW(),'%Y-%m-%d') 
					AND an = (SELECT MAX(an) FROM ipt WHERE regdate = DATE_FORMAT(NOW(),'%Y-%m-%d'))";
		$query6 = mysqli_query($con,$sql);
		while($data=mysqli_fetch_array($query6)) {
			$ipd_an = $data['an'];
			$ipd_regdate = $data['regdate'];
			$ipd_regtime = $data['regtime'];
			}
		
		$sql = "SELECT t.AMONTH,SUM(t.visitopd)-SUM(t.visitipd) AS opd,SUM(t.visitipd) AS ipd,t.AY,t.AM FROM (
					SELECT DATE_FORMAT(vstdate,'%Y-%m') AS AMONTH,COUNT(*) AS visitopd,'' AS visitipd
					,DATE_FORMAT(vstdate,'%Y')+543 AS AY,DATE_FORMAT(vstdate,'%m') AS AM
					FROM vn_stat 
					WHERE vstdate BETWEEN '$myearb-10-01' AND '$myeare-09-30'
					GROUP BY DATE_FORMAT(vstdate,'%Y-%m')
					UNION
					SELECT DATE_FORMAT(regdate,'%Y-%m') AS AMONTH,'' AS visitopd,COUNT(*) AS visitipd
					,DATE_FORMAT(regdate,'%Y')+543 AS AY,DATE_FORMAT(regdate,'%m') AS AM
					FROM an_stat 
					WHERE regdate BETWEEN '$myearb-10-01' AND '$myeare-09-30'
					GROUP BY DATE_FORMAT(regdate,'%Y-%m')
					) AS t
					GROUP BY t.AMONTH ";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			 
		 array_push($amonth,$row[AMONTH]);
//		 array_push($ptvisit,$row[visit]);
		 array_push($ptopd,$row[opd]);
		 array_push($ptipd,$row[ipd]);
		}
		if(empty($ptopd[0])){$ptopd0 = 0;}else{$ptopd0 = $ptopd[0];}
		if(empty($ptopd[1])){$ptopd1 = 0;}else{$ptopd1 = $ptopd[1];}
		if(empty($ptopd[2])){$ptopd2 = 0;}else{$ptopd2 = $ptopd[2];}
		if(empty($ptopd[3])){$ptopd3 = 0;}else{$ptopd3 = $ptopd[3];}
		if(empty($ptopd[4])){$ptopd4 = 0;}else{$ptopd4 = $ptopd[4];}
		if(empty($ptopd[5])){$ptopd5 = 0;}else{$ptopd5 = $ptopd[5];}
		if(empty($ptopd[6])){$ptopd6 = 0;}else{$ptopd6 = $ptopd[6];}
		if(empty($ptopd[7])){$ptopd7 = 0;}else{$ptopd7 = $ptopd[7];}
		if(empty($ptopd[8])){$ptopd8 = 0;}else{$ptopd8 = $ptopd[8];}
		if(empty($ptopd[9])){$ptopd9 = 0;}else{$ptopd9 = $ptopd[9];}
		if(empty($ptopd[10])){$ptopd10 = 0;}else{$ptopd10 = $ptopd[10];}
		if(empty($ptopd[11])){$ptopd11 = 0;}else{$ptopd11 = $ptopd[11];}

		if(empty($ptipd[0])){$ptipd0 = 0;}else{$ptipd0 = $ptipd[0];}
		if(empty($ptipd[1])){$ptipd1 = 0;}else{$ptipd1 = $ptipd[1];}
		if(empty($ptipd[2])){$ptipd2 = 0;}else{$ptipd2 = $ptipd[2];}
		if(empty($ptipd[3])){$ptipd3 = 0;}else{$ptipd3 = $ptipd[3];}
		if(empty($ptipd[4])){$ptipd4 = 0;}else{$ptipd4 = $ptipd[4];}
		if(empty($ptipd[5])){$ptipd5 = 0;}else{$ptipd5 = $ptipd[5];}
		if(empty($ptipd[6])){$ptipd6 = 0;}else{$ptipd6 = $ptipd[6];}
		if(empty($ptipd[7])){$ptipd7 = 0;}else{$ptipd7 = $ptipd[7];}
		if(empty($ptipd[8])){$ptipd8 = 0;}else{$ptipd8 = $ptipd[8];}
		if(empty($ptipd[9])){$ptipd9 = 0;}else{$ptipd9 = $ptipd[9];}
		if(empty($ptipd[10])){$ptipd10 = 0;}else{$ptipd10 = $ptipd[10];}
		if(empty($ptipd[11])){$ptipd11 = 0;}else{$ptipd11 = $ptipd[11];}

// ผู้ป่วยนอก
        $countopd10 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitopd
            FROM vn_stat v
            LEFT OUTER JOIN spclty s ON s.spclty = v.spclty
            WHERE v.vstdate BETWEEN '$myearb-10-01' AND '$myearb-10-31'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countopd10,$row[visitopd]);
        }
        
        $countopd11 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitopd
            FROM vn_stat v
            LEFT OUTER JOIN spclty s ON s.spclty = v.spclty
            WHERE v.vstdate BETWEEN '$myearb-11-01' AND '$myearb-11-30'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countopd11,$row[visitopd]);
        }
        
        $countopd12 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitopd
            FROM vn_stat v
            LEFT OUTER JOIN spclty s ON s.spclty = v.spclty
            WHERE v.vstdate BETWEEN '$myearb-12-01' AND '$myearb-12-31'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countopd12,$row[visitopd]);
        }
        
        $countopd01 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitopd
            FROM vn_stat v
            LEFT OUTER JOIN spclty s ON s.spclty = v.spclty
            WHERE v.vstdate BETWEEN '$myeare-01-01' AND '$myeare-01-31'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countopd01,$row[visitopd]);
        }
        
        $countopd02 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitopd
            FROM vn_stat v
            LEFT OUTER JOIN spclty s ON s.spclty = v.spclty
            WHERE v.vstdate BETWEEN '$myeare-02-01' AND '$myeare-02-29'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countopd02,$row[visitopd]);
        }
        
        $countopd03 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitopd
            FROM vn_stat v
            LEFT OUTER JOIN spclty s ON s.spclty = v.spclty
            WHERE v.vstdate BETWEEN '$myeare-03-01' AND '$myeare-03-31'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countopd03,$row[visitopd]);
        }
        
        $countopd04 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitopd
            FROM vn_stat v
            LEFT OUTER JOIN spclty s ON s.spclty = v.spclty
            WHERE v.vstdate BETWEEN '$myeare-04-01' AND '$myeare-04-30'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countopd04,$row[visitopd]);
        }
        
        $countopd05 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitopd
            FROM vn_stat v
            LEFT OUTER JOIN spclty s ON s.spclty = v.spclty
            WHERE v.vstdate BETWEEN '$myeare-05-01' AND '$myeare-05-31'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countopd05,$row[visitopd]);
        }
        
        $countopd06 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitopd
            FROM vn_stat v
            LEFT OUTER JOIN spclty s ON s.spclty = v.spclty
            WHERE v.vstdate BETWEEN '$myeare-06-01' AND '$myeare-06-30'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countopd06,$row[visitopd]);
        }
        
        $countopd07 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitopd
            FROM vn_stat v
            LEFT OUTER JOIN spclty s ON s.spclty = v.spclty
            WHERE v.vstdate BETWEEN '$myeare-07-01' AND '$myeare-07-31'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countopd07,$row[visitopd]);
        }
        
        $countopd08 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitopd
            FROM vn_stat v
            LEFT OUTER JOIN spclty s ON s.spclty = v.spclty
            WHERE v.vstdate BETWEEN '$myeare-08-01' AND '$myeare-08-31'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countopd08,$row[visitopd]);
        }
        
        $countopd09 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitopd
            FROM vn_stat v
            LEFT OUTER JOIN spclty s ON s.spclty = v.spclty
            WHERE v.vstdate BETWEEN '$myeare-09-01' AND '$myeare-09-30'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countopd09,$row[visitopd]);
        }

// ผู้ป่วยใน
        $countipd10 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitipd
            FROM an_stat a
            LEFT OUTER JOIN spclty s ON s.spclty = a.spclty
            WHERE a.regdate BETWEEN '$myearb-10-01' AND '$myearb-10-31'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countipd10,$row[visitipd]);
        }
        
        $countipd11 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitipd
            FROM an_stat a
            LEFT OUTER JOIN spclty s ON s.spclty = a.spclty
            WHERE a.regdate BETWEEN '$myearb-11-01' AND '$myearb-11-30'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countipd11,$row[visitipd]);
        }
        
        $countipd12 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitipd
            FROM an_stat a
            LEFT OUTER JOIN spclty s ON s.spclty = a.spclty
            WHERE a.regdate BETWEEN '$myearb-12-01' AND '$myearb-12-31'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countipd12,$row[visitipd]);
        }
        
        $countipd01 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitipd
            FROM an_stat a
            LEFT OUTER JOIN spclty s ON s.spclty = a.spclty
            WHERE a.regdate BETWEEN '$myeare-01-01' AND '$myeare-01-31'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countipd01,$row[visitipd]);
        }
        
        $countipd02 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitipd
            FROM an_stat a
            LEFT OUTER JOIN spclty s ON s.spclty = a.spclty
            WHERE a.regdate BETWEEN '$myeare-02-01' AND '$myeare-02-29'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countipd02,$row[visitipd]);
        }
        
        $countipd03 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitipd
            FROM an_stat a
            LEFT OUTER JOIN spclty s ON s.spclty = a.spclty
            WHERE a.regdate BETWEEN '$myeare-03-01' AND '$myeare-03-31'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countipd03,$row[visitipd]);
        }
        
        $countipd04 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitipd
            FROM an_stat a
            LEFT OUTER JOIN spclty s ON s.spclty = a.spclty
            WHERE a.regdate BETWEEN '$myeare-04-01' AND '$myeare-04-30'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countipd04,$row[visitipd]);
        }
        
        $countipd05 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitipd
            FROM an_stat a
            LEFT OUTER JOIN spclty s ON s.spclty = a.spclty
            WHERE a.regdate BETWEEN '$myeare-05-01' AND '$myeare-05-31'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countipd05,$row[visitipd]);
        }
        
        $countipd06 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitipd
            FROM an_stat a
            LEFT OUTER JOIN spclty s ON s.spclty = a.spclty
            WHERE a.regdate BETWEEN '$myeare-06-01' AND '$myeare-06-30'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countipd06,$row[visitipd]);
        }
        
        $countipd07 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitipd
            FROM an_stat a
            LEFT OUTER JOIN spclty s ON s.spclty = a.spclty
            WHERE a.regdate BETWEEN '$myeare-07-01' AND '$myeare-07-31'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countipd07,$row[visitipd]);
        }
        
        $countipd08 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitipd
            FROM an_stat a
            LEFT OUTER JOIN spclty s ON s.spclty = a.spclty
            WHERE a.regdate BETWEEN '$myeare-08-01' AND '$myeare-08-31'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countipd08,$row[visitipd]);
        }
        
        $countipd09 = array(); //ตัวแปรแกน y
		$sql = "SELECT s.nhso_code,COUNT(*) AS visitipd
            FROM an_stat a
            LEFT OUTER JOIN spclty s ON s.spclty = a.spclty
            WHERE a.regdate BETWEEN '$myeare-09-01' AND '$myeare-09-30'
            GROUP BY s.nhso_code ORDER BY s.nhso_code ASC";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			array_push($countipd09,$row[visitipd]);
        }        

// กราฟ
		$totalpie = array(); //ตัวแปรแกน y
		$delinamepie = array(); //ตัวแปรแกน y
		$sql = "SELECT pt.nhso_code,pt.hipdata_code,h.inscl_name,COUNT(DISTINCT vn) AS vn_count
        FROM ovst v
        LEFT OUTER JOIN pttype pt ON pt.pttype = v.pttype
		LEFT OUTER JOIN nhso_inscl_code h ON h.inscl_code = pt.hipdata_code
        WHERE v.vstdate BETWEEN '$myearb-10-01' AND '$myeare-09-30' AND an IS NULL
        GROUP BY pt.hipdata_code
        ORDER BY COUNT(DISTINCT vn) DESC ";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			 array_push($totalpie,$row[vn_count]);
			 array_push($delinamepie,$row[inscl_name]);
		}

		$itotalpie = array(); //ตัวแปรแกน y
		$idelinamepie = array(); //ตัวแปรแกน y
		$sql = "SELECT pt.nhso_code,pt.hipdata_code,h.inscl_name,COUNT(DISTINCT vn) AS vn_count
        FROM ovst v
        LEFT OUTER JOIN pttype pt ON pt.pttype = v.pttype
		LEFT OUTER JOIN nhso_inscl_code h ON h.inscl_code = pt.hipdata_code
        WHERE v.vstdate BETWEEN '$myearb-10-01' AND '$myeare-09-30' AND an IS NOT NULL
        GROUP BY pt.hipdata_code
        ORDER BY COUNT(DISTINCT vn) DESC ";
		$query6 = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($query6)) {
			 array_push($itotalpie,$row[vn_count]);
			 array_push($idelinamepie,$row[inscl_name]);
		}

	 */

?>



<script src="highcharts/code/highcharts.js"></script>
<script src="highcharts/code/modules/data.js"></script>
<script src="highcharts/code/modules/drilldown.js"></script>
<script src="highcharts/code/modules/exporting.js"></script>
<script src="highcharts/code/modules/export-data.js"></script>
<script src="highcharts/code/modules/accessibility.js"></script>



					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="card">
								<!--<div class="card-header">
									<div class="card-title">Patientsdfsd</div>
								</div>-->
								<div class="card-body">
                                
               
                                
                                
                                 
                                    
          

<div id="container2" style="min-width: 310px; height: 500px; margin: 0 auto"></div>



                                    
                                    
                                    
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="card">
								<!--<div class="card-header">
									<div class="card-title">Treatment Type</div>
								</div>-->
								<div class="card-body">
									
                                    
                                    
                                    
                                    
                                 <div id="container5" style="min-width: 310px; height: 500px; margin: 0 auto"></div>
                                    
                                    
                                    
                                    
                                    
                                    
								</div>
							</div>
						</div>
					</div>
					<!-- Row end -->
















<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'แสดงจำนวนผู้รับบริการ ปีงบประมาณ <?= $myeare+543; ?>'
    },
    subtitle: {
        text: '<?= $hospitalname;?>'
    },
    xAxis: {
        categories: ['ตุลาคม', 'พฤศจิกายน','ธํนวาคม','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฏาคม','สิงหาคม','กันยายน']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'จำนวน(ราย)'
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
            }
        }
    },
    legend: {
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: 25,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>ผู้รับบริการรวม : {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true,
                color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
            }
        }
    },
    series: [{
        name: 'ผู้ป่วยใน',
		color: '#ff0000',
        // data: [<?= implode(',', $ptipd) ?>]
		data: [<?= $ptipd0;?>, <?= $ptipd1;?>, <?= $ptipd2;?>, <?= $ptipd3;?>, <?= $ptipd4;?>, <?= $ptipd5;?>, <?= $ptipd6;?>, <?= $ptipd7;?>, <?= $ptipd8;?>, <?= $ptipd9;?>, <?= $ptipd10;?>, <?= $ptipd11;?>]
    }, {
        name: 'ผู้ป่วยนอก',
		color: '#3399cc',
        // data: [<?= implode(',', $ptopd) ?>]
		data: [<?= $ptopd0;?>, <?= $ptopd1;?>, <?= $ptopd2;?>, <?= $ptopd3;?>, <?= $ptopd4;?>, <?= $ptopd5;?>, <?= $ptopd6;?>, <?= $ptopd7;?>, <?= $ptopd8;?>, <?= $ptopd9;?>, <?= $ptopd10;?>, <?= $ptopd11;?>]
    }]
});
</script>

<script type="text/javascript">
// Create the chart
Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'จำนวนผู้ป่วยนอกจำแนกตามแผนก ปีงบประมาณ <?= $myeare+543; ?>'
    },
    subtitle: {
        text: '<?= $hospitalname;?>'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'จำนวนผู้ป่วยนอก(ราย)'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.0f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f} ราย</b><br/>'
    },

    "series": [
        {
            "name": "จำนวนผู้ป่วยนอก",
            "colorByPoint": true,
            "data": [
                {
                    "name": "ตุลาคม",
                    "y": <?= $ptopd0; ?>,
                    "drilldown": "ตุลาคม",
                    "color": "#ff5608" 
                },
                {
                    "name": "พฤศจิกายน",
                    "y": <?= $ptopd1; ?>,
                    "drilldown": "พฤศจิกายน",
                    "color": "#01a8f7" 
                },
                {
                    "name": "ธันวาคม",
                    "y": <?= $ptopd2; ?>,
                    "drilldown": "ธันวาคม",
                    "color": "#6733b9" 
                },
                {
                    "name": "มกราคม",
                    "y": <?= $ptopd3; ?>,
                    "drilldown": "มกราคม",
                    "color": "#ec1562" 
                },
                {
                    "name": "กุมภาพันธ์",
                    "y": <?= $ptopd4; ?>,
                    "drilldown": "กุมภาพันธ์",
                    "color": "#fec200" 
                },
                {
                    "name": "มีนาคม",
                    "y": <?= $ptopd5; ?>,
                    "drilldown": "มีนาคม",
                    "color": "#f6412c" 
                },
                {
                    "name": "เมษายน",
                    "y": <?= $ptopd6; ?>,
                    "drilldown": "เมษายน",
                    "color": "#374047" 
                },
                {
                    "name": "พฤษภาคม",
                    "y": <?= $ptopd7; ?>,
                    "drilldown": "พฤษภาคม",
                    "color": "#47b04b" 
                },
                {
                    "name": "มิถุนายน",
                    "y": <?= $ptopd8; ?>,
                    "drilldown": "มิถุนายน",
                    "color": "#607d8d" 
                },
                {
                    "name": "กรกฎาคม",
                    "y": <?= $ptopd9; ?>,
                    "drilldown": "กรกฎาคม",
                    "color": "#f4617d" 
                },
                {
                    "name": "สิงหาคม",
                    "y": <?= $ptopd10; ?>,
                    "drilldown": "สิงหาคม",
                    "color": "#8b81d3" 
                },
                {
                    "name": "กันยายน",
                    "y": <?= $ptopd11; ?>,
                    "drilldown": "กันยายน",
                    "color": "#e45827" 
                }
            ]
        }
    ],
    "drilldown": {
        "series": [
            {
                "name": "ตุลาคม",
                "id": "ตุลาคม",
                "data": [
                    ['ไม่ทราบ',<?= $countopd10[0]; ?>],
                    ['อายุรกรรม',<?= $countopd10[1]; ?>],
                    ['ศัลยกรรม',<?= $countopd10[2]; ?>],
                    ['สูติกรรม',<?= $countopd10[3]; ?>],
                    ['นรีเวชกรรม',<?= $countopd10[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countopd10[5]; ?>],
                    ['หูคอจมูก',<?= $countopd10[6]; ?>],
                    ['จักษุ',<?= $countopd10[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countopd10[8]; ?>],
                    ['จิตเวช',<?= $countopd10[9]; ?>],
                    ['รังสีวิทยา',<?= $countopd10[10]; ?>],
                    ['ทันตกรรม',<?= $countopd10[11]; ?>],
                    ['อื่นๆ',<?= $countopd10[12]; ?>]
                ]
            },
            {
                "name": "พฤศจิกายน",
                "id": "พฤศจิกายน",
                "data": [
                    ['ไม่ทราบ',<?= $countopd11[0]; ?>],
                    ['อายุรกรรม',<?= $countopd11[1]; ?>],
                    ['ศัลยกรรม',<?= $countopd11[2]; ?>],
                    ['สูติกรรม',<?= $countopd11[3]; ?>],
                    ['นรีเวชกรรม',<?= $countopd11[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countopd11[5]; ?>],
                    ['หูคอจมูก',<?= $countopd11[6]; ?>],
                    ['จักษุ',<?= $countopd11[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countopd11[8]; ?>],
                    ['จิตเวช',<?= $countopd11[9]; ?>],
                    ['รังสีวิทยา',<?= $countopd11[10]; ?>],
                    ['ทันตกรรม',<?= $countopd11[11]; ?>],
                    ['อื่นๆ',<?= $countopd11[12]; ?>]
                ]
            },
            {
                "name": "ธันวาคม",
                "id": "ธันวาคม",
                "data": [
                    ['ไม่ทราบ',<?= $countopd12[0]; ?>],
                    ['อายุรกรรม',<?= $countopd12[1]; ?>],
                    ['ศัลยกรรม',<?= $countopd12[2]; ?>],
                    ['สูติกรรม',<?= $countopd12[3]; ?>],
                    ['นรีเวชกรรม',<?= $countopd12[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countopd12[5]; ?>],
                    ['หูคอจมูก',<?= $countopd12[6]; ?>],
                    ['จักษุ',<?= $countopd12[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countopd12[8]; ?>],
                    ['จิตเวช',<?= $countopd12[9]; ?>],
                    ['รังสีวิทยา',<?= $countopd12[10]; ?>],
                    ['ทันตกรรม',<?= $countopd12[11]; ?>],
                    ['อื่นๆ',<?= $countopd12[12]; ?>]
                ]
            },
            {
                "name": "มกราคม",
                "id": "มกราคม",
                "data": [
                    ['ไม่ทราบ',<?= $countopd01[0]; ?>],
                    ['อายุรกรรม',<?= $countopd01[1]; ?>],
                    ['ศัลยกรรม',<?= $countopd01[2]; ?>],
                    ['สูติกรรม',<?= $countopd01[3]; ?>],
                    ['นรีเวชกรรม',<?= $countopd01[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countopd01[5]; ?>],
                    ['หูคอจมูก',<?= $countopd01[6]; ?>],
                    ['จักษุ',<?= $countopd01[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countopd01[8]; ?>],
                    ['จิตเวช',<?= $countopd01[9]; ?>],
                    ['รังสีวิทยา',<?= $countopd01[10]; ?>],
                    ['ทันตกรรม',<?= $countopd01[11]; ?>],
                    ['อื่นๆ',<?= $countopd01[12]; ?>]
                ]
            },
            {
                "name": "กุมภาพันธ์",
                "id": "กุมภาพันธ์",
                "data": [
                    ['ไม่ทราบ',<?= $countopd02[0]; ?>],
                    ['อายุรกรรม',<?= $countopd02[1]; ?>],
                    ['ศัลยกรรม',<?= $countopd02[2]; ?>],
                    ['สูติกรรม',<?= $countopd02[3]; ?>],
                    ['นรีเวชกรรม',<?= $countopd02[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countopd02[5]; ?>],
                    ['หูคอจมูก',<?= $countopd02[6]; ?>],
                    ['จักษุ',<?= $countopd02[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countopd02[8]; ?>],
                    ['จิตเวช',<?= $countopd02[9]; ?>],
                    ['รังสีวิทยา',<?= $countopd02[10]; ?>],
                    ['ทันตกรรม',<?= $countopd02[11]; ?>],
                    ['อื่นๆ',<?= $countopd02[12]; ?>]
                ]
            },
            {
                "name": "มีนาคม",
                "id": "มีนาคม",
                "data": [
                    ['ไม่ทราบ',<?= $countopd03[0]; ?>],
                    ['อายุรกรรม',<?= $countopd03[1]; ?>],
                    ['ศัลยกรรม',<?= $countopd03[2]; ?>],
                    ['สูติกรรม',<?= $countopd03[3]; ?>],
                    ['นรีเวชกรรม',<?= $countopd03[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countopd03[5]; ?>],
                    ['หูคอจมูก',<?= $countopd03[6]; ?>],
                    ['จักษุ',<?= $countopd03[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countopd03[8]; ?>],
                    ['จิตเวช',<?= $countopd03[9]; ?>],
                    ['รังสีวิทยา',<?= $countopd03[10]; ?>],
                    ['ทันตกรรม',<?= $countopd03[11]; ?>],
                    ['อื่นๆ',<?= $countopd03[12]; ?>]
                ]
            },
            {
                "name": "เมษายน",
                "id": "เมษายน",
                "data": [
                    ['ไม่ทราบ',<?= $countopd04[0]; ?>],
                    ['อายุรกรรม',<?= $countopd04[1]; ?>],
                    ['ศัลยกรรม',<?= $countopd04[2]; ?>],
                    ['สูติกรรม',<?= $countopd04[3]; ?>],
                    ['นรีเวชกรรม',<?= $countopd04[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countopd04[5]; ?>],
                    ['หูคอจมูก',<?= $countopd04[6]; ?>],
                    ['จักษุ',<?= $countopd04[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countopd04[8]; ?>],
                    ['จิตเวช',<?= $countopd04[9]; ?>],
                    ['รังสีวิทยา',<?= $countopd04[10]; ?>],
                    ['ทันตกรรม',<?= $countopd04[11]; ?>],
                    ['อื่นๆ',<?= $countopd04[12]; ?>]
                ]
            },
            {
                "name": "พฤษภาคม",
                "id": "พฤษภาคม",
                "data": [
                    ['ไม่ทราบ',<?= $countopd05[0]; ?>],
                    ['อายุรกรรม',<?= $countopd05[1]; ?>],
                    ['ศัลยกรรม',<?= $countopd05[2]; ?>],
                    ['สูติกรรม',<?= $countopd05[3]; ?>],
                    ['นรีเวชกรรม',<?= $countopd05[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countopd05[5]; ?>],
                    ['หูคอจมูก',<?= $countopd05[6]; ?>],
                    ['จักษุ',<?= $countopd05[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countopd05[8]; ?>],
                    ['จิตเวช',<?= $countopd05[9]; ?>],
                    ['รังสีวิทยา',<?= $countopd05[10]; ?>],
                    ['ทันตกรรม',<?= $countopd05[11]; ?>],
                    ['อื่นๆ',<?= $countopd05[12]; ?>]
                ]
            },
            {
                "name": "มิถุนายน",
                "id": "มิถุนายน",
                "data": [
                    ['ไม่ทราบ',<?= $countopd06[0]; ?>],
                    ['อายุรกรรม',<?= $countopd06[1]; ?>],
                    ['ศัลยกรรม',<?= $countopd06[2]; ?>],
                    ['สูติกรรม',<?= $countopd06[3]; ?>],
                    ['นรีเวชกรรม',<?= $countopd06[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countopd06[5]; ?>],
                    ['หูคอจมูก',<?= $countopd06[6]; ?>],
                    ['จักษุ',<?= $countopd06[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countopd06[8]; ?>],
                    ['จิตเวช',<?= $countopd06[9]; ?>],
                    ['รังสีวิทยา',<?= $countopd06[10]; ?>],
                    ['ทันตกรรม',<?= $countopd06[11]; ?>],
                    ['อื่นๆ',<?= $countopd06[12]; ?>]
                ]
            },
            {
                "name": "กรกฎาคม",
                "id": "กรกฎาคม",
                "data": [
                    ['ไม่ทราบ',<?= $countopd07[0]; ?>],
                    ['อายุรกรรม',<?= $countopd07[1]; ?>],
                    ['ศัลยกรรม',<?= $countopd07[2]; ?>],
                    ['สูติกรรม',<?= $countopd07[3]; ?>],
                    ['นรีเวชกรรม',<?= $countopd07[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countopd07[5]; ?>],
                    ['หูคอจมูก',<?= $countopd07[6]; ?>],
                    ['จักษุ',<?= $countopd07[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countopd07[8]; ?>],
                    ['จิตเวช',<?= $countopd07[9]; ?>],
                    ['รังสีวิทยา',<?= $countopd07[10]; ?>],
                    ['ทันตกรรม',<?= $countopd07[11]; ?>],
                    ['อื่นๆ',<?= $countopd07[12]; ?>]
                ]
            },
            {
                "name": "สิงหาคม",
                "id": "สิงหาคม",
                "data": [
                    ['ไม่ทราบ',<?= $countopd08[0]; ?>],
                    ['อายุรกรรม',<?= $countopd08[1]; ?>],
                    ['ศัลยกรรม',<?= $countopd08[2]; ?>],
                    ['สูติกรรม',<?= $countopd08[3]; ?>],
                    ['นรีเวชกรรม',<?= $countopd08[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countopd08[5]; ?>],
                    ['หูคอจมูก',<?= $countopd08[6]; ?>],
                    ['จักษุ',<?= $countopd08[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countopd08[8]; ?>],
                    ['จิตเวช',<?= $countopd08[9]; ?>],
                    ['รังสีวิทยา',<?= $countopd08[10]; ?>],
                    ['ทันตกรรม',<?= $countopd08[11]; ?>],
                    ['อื่นๆ',<?= $countopd08[12]; ?>]
                ]
            },
            {
                "name": "กันยายน",
                "id": "กันยายน",
                "data": [
                    ['ไม่ทราบ',<?= $countopd09[0]; ?>],
                    ['อายุรกรรม',<?= $countopd09[1]; ?>],
                    ['ศัลยกรรม',<?= $countopd09[2]; ?>],
                    ['สูติกรรม',<?= $countopd09[3]; ?>],
                    ['นรีเวชกรรม',<?= $countopd09[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countopd09[5]; ?>],
                    ['หูคอจมูก',<?= $countopd09[6]; ?>],
                    ['จักษุ',<?= $countopd09[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countopd09[8]; ?>],
                    ['จิตเวช',<?= $countopd09[9]; ?>],
                    ['รังสีวิทยา',<?= $countopd09[10]; ?>],
                    ['ทันตกรรม',<?= $countopd09[11]; ?>],
                    ['อื่นๆ',<?= $countopd09[12]; ?>]
                ]
            }
        ]
    }
});
</script>

<script type="text/javascript">
// Create the chart
Highcharts.chart('container5', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'จำนวนผู้ป่วยในจำแนกตามแผนก ปีงบประมาณ <?= $myeare+543; ?>'
    },
    subtitle: {
        text: '<?= $hospitalname;?>'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'จำนวนผู้ป่วยใน(ราย)'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.0f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f} ราย</b><br/>'
    },

    "series": [
        {
            "name": "จำนวนผู้ป่วยนอก",
            "colorByPoint": true,
            "data": [
                {
                    "name": "ตุลาคม",
                    "y": <?= $ptipd0; ?>,
                    "drilldown": "ตุลาคม"
                },
                {
                    "name": "พฤศจิกายน",
                    "y": <?= $ptipd1; ?>,
                    "drilldown": "พฤศจิกายน"
                },
                {
                    "name": "ธันวาคม",
                    "y": <?= $ptipd2; ?>,
                    "drilldown": "ธันวาคม"
                },
                {
                    "name": "มกราคม",
                    "y": <?= $ptipd3; ?>,
                    "drilldown": "มกราคม"
                },
                {
                    "name": "กุมภาพันธ์",
                    "y": <?= $ptipd4; ?>,
                    "drilldown": "กุมภาพันธ์"
                },
                {
                    "name": "มีนาคม",
                    "y": <?= $ptipd5; ?>,
                    "drilldown": "มีนาคม"
                },
                {
                    "name": "เมษายน",
                    "y": <?= $ptipd6; ?>,
                    "drilldown": "เมษายน"
                },
                {
                    "name": "พฤษภาคม",
                    "y": <?= $ptipd7; ?>,
                    "drilldown": "พฤษภาคม"
                },
                {
                    "name": "มิถุนายน",
                    "y": <?= $ptipd8; ?>,
                    "drilldown": "มิถุนายน"
                },
                {
                    "name": "กรกฎาคม",
                    "y": <?= $ptipd9; ?>,
                    "drilldown": "กรกฎาคม"
                },
                {
                    "name": "สิงหาคม",
                    "y": <?= $ptipd10; ?>,
                    "drilldown": "สิงหาคม"
                },
                {
                    "name": "กันยายน",
                    "y": <?= $ptipd11; ?>,
                    "drilldown": "กันยายน"
                }
            ]
        }
    ],
    "drilldown": {
        "series": [
            {
                "name": "ตุลาคม",
                "id": "ตุลาคม",
                "data": [
                    ['ไม่ทราบ',<?= $countipd10[0]; ?>],
                    ['อายุรกรรม',<?= $countipd10[1]; ?>],
                    ['ศัลยกรรม',<?= $countipd10[2]; ?>],
                    ['สูติกรรม',<?= $countipd10[3]; ?>],
                    ['นรีเวชกรรม',<?= $countipd10[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countipd10[5]; ?>],
                    ['หูคอจมูก',<?= $countipd10[6]; ?>],
                    ['จักษุ',<?= $countipd10[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countipd10[8]; ?>],
                    ['จิตเวช',<?= $countipd10[9]; ?>],
                    ['รังสีวิทยา',<?= $countipd10[10]; ?>],
                    ['ทันตกรรม',<?= $countipd10[11]; ?>],
                    ['อื่นๆ',<?= $countipd10[12]; ?>]
                ]
            },
            {
                "name": "พฤศจิกายน",
                "id": "พฤศจิกายน",
                "data": [
                    ['ไม่ทราบ',<?= $countipd11[0]; ?>],
                    ['อายุรกรรม',<?= $countipd11[1]; ?>],
                    ['ศัลยกรรม',<?= $countipd11[2]; ?>],
                    ['สูติกรรม',<?= $countipd11[3]; ?>],
                    ['นรีเวชกรรม',<?= $countipd11[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countipd11[5]; ?>],
                    ['หูคอจมูก',<?= $countipd11[6]; ?>],
                    ['จักษุ',<?= $countipd11[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countipd11[8]; ?>],
                    ['จิตเวช',<?= $countipd11[9]; ?>],
                    ['รังสีวิทยา',<?= $countipd11[10]; ?>],
                    ['ทันตกรรม',<?= $countipd11[11]; ?>],
                    ['อื่นๆ',<?= $countipd11[12]; ?>]
                ]
            },
            {
                "name": "ธันวาคม",
                "id": "ธันวาคม",
                "data": [
                    ['ไม่ทราบ',<?= $countipd12[0]; ?>],
                    ['อายุรกรรม',<?= $countipd12[1]; ?>],
                    ['ศัลยกรรม',<?= $countipd12[2]; ?>],
                    ['สูติกรรม',<?= $countipd12[3]; ?>],
                    ['นรีเวชกรรม',<?= $countipd12[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countipd12[5]; ?>],
                    ['หูคอจมูก',<?= $countipd12[6]; ?>],
                    ['จักษุ',<?= $countipd12[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countipd12[8]; ?>],
                    ['จิตเวช',<?= $countipd12[9]; ?>],
                    ['รังสีวิทยา',<?= $countipd12[10]; ?>],
                    ['ทันตกรรม',<?= $countipd12[11]; ?>],
                    ['อื่นๆ',<?= $countipd12[12]; ?>]
                ]
            },
            {
                "name": "มกราคม",
                "id": "มกราคม",
                "data": [
                    ['ไม่ทราบ',<?= $countipd01[0]; ?>],
                    ['อายุรกรรม',<?= $countipd01[1]; ?>],
                    ['ศัลยกรรม',<?= $countipd01[2]; ?>],
                    ['สูติกรรม',<?= $countipd01[3]; ?>],
                    ['นรีเวชกรรม',<?= $countipd01[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countipd01[5]; ?>],
                    ['หูคอจมูก',<?= $countipd01[6]; ?>],
                    ['จักษุ',<?= $countipd01[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countipd01[8]; ?>],
                    ['จิตเวช',<?= $countipd01[9]; ?>],
                    ['รังสีวิทยา',<?= $countipd01[10]; ?>],
                    ['ทันตกรรม',<?= $countipd01[11]; ?>],
                    ['อื่นๆ',<?= $countipd01[12]; ?>]
                ]
            },
            {
                "name": "กุมภาพันธ์",
                "id": "กุมภาพันธ์",
                "data": [
                    ['ไม่ทราบ',<?= $countipd02[0]; ?>],
                    ['อายุรกรรม',<?= $countipd02[1]; ?>],
                    ['ศัลยกรรม',<?= $countipd02[2]; ?>],
                    ['สูติกรรม',<?= $countipd02[3]; ?>],
                    ['นรีเวชกรรม',<?= $countipd02[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countipd02[5]; ?>],
                    ['หูคอจมูก',<?= $countipd02[6]; ?>],
                    ['จักษุ',<?= $countipd02[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countipd02[8]; ?>],
                    ['จิตเวช',<?= $countipd02[9]; ?>],
                    ['รังสีวิทยา',<?= $countipd02[10]; ?>],
                    ['ทันตกรรม',<?= $countipd02[11]; ?>],
                    ['อื่นๆ',<?= $countipd02[12]; ?>]
                ]
            },
            {
                "name": "มีนาคม",
                "id": "มีนาคม",
                "data": [
                    ['ไม่ทราบ',<?= $countipd03[0]; ?>],
                    ['อายุรกรรม',<?= $countipd03[1]; ?>],
                    ['ศัลยกรรม',<?= $countipd03[2]; ?>],
                    ['สูติกรรม',<?= $countipd03[3]; ?>],
                    ['นรีเวชกรรม',<?= $countipd03[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countipd03[5]; ?>],
                    ['หูคอจมูก',<?= $countipd03[6]; ?>],
                    ['จักษุ',<?= $countipd03[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countipd03[8]; ?>],
                    ['จิตเวช',<?= $countipd03[9]; ?>],
                    ['รังสีวิทยา',<?= $countipd03[10]; ?>],
                    ['ทันตกรรม',<?= $countipd03[11]; ?>],
                    ['อื่นๆ',<?= $countipd03[12]; ?>]
                ]
            },
            {
                "name": "เมษายน",
                "id": "เมษายน",
                "data": [
                    ['ไม่ทราบ',<?= $countipd04[0]; ?>],
                    ['อายุรกรรม',<?= $countipd04[1]; ?>],
                    ['ศัลยกรรม',<?= $countipd04[2]; ?>],
                    ['สูติกรรม',<?= $countipd04[3]; ?>],
                    ['นรีเวชกรรม',<?= $countipd04[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countipd04[5]; ?>],
                    ['หูคอจมูก',<?= $countipd04[6]; ?>],
                    ['จักษุ',<?= $countipd04[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countipd04[8]; ?>],
                    ['จิตเวช',<?= $countipd04[9]; ?>],
                    ['รังสีวิทยา',<?= $countipd04[10]; ?>],
                    ['ทันตกรรม',<?= $countipd04[11]; ?>],
                    ['อื่นๆ',<?= $countipd04[12]; ?>]
                ]
            },
            {
                "name": "พฤษภาคม",
                "id": "พฤษภาคม",
                "data": [
                    ['ไม่ทราบ',<?= $countipd05[0]; ?>],
                    ['อายุรกรรม',<?= $countipd05[1]; ?>],
                    ['ศัลยกรรม',<?= $countipd05[2]; ?>],
                    ['สูติกรรม',<?= $countipd05[3]; ?>],
                    ['นรีเวชกรรม',<?= $countipd05[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countipd05[5]; ?>],
                    ['หูคอจมูก',<?= $countipd05[6]; ?>],
                    ['จักษุ',<?= $countipd05[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countipd05[8]; ?>],
                    ['จิตเวช',<?= $countipd05[9]; ?>],
                    ['รังสีวิทยา',<?= $countipd05[10]; ?>],
                    ['ทันตกรรม',<?= $countipd05[11]; ?>],
                    ['อื่นๆ',<?= $countipd05[12]; ?>]
                ]
            },
            {
                "name": "มิถุนายน",
                "id": "มิถุนายน",
                "data": [
                    ['ไม่ทราบ',<?= $countipd06[0]; ?>],
                    ['อายุรกรรม',<?= $countipd06[1]; ?>],
                    ['ศัลยกรรม',<?= $countipd06[2]; ?>],
                    ['สูติกรรม',<?= $countipd06[3]; ?>],
                    ['นรีเวชกรรม',<?= $countipd06[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countipd06[5]; ?>],
                    ['หูคอจมูก',<?= $countipd06[6]; ?>],
                    ['จักษุ',<?= $countipd06[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countipd06[8]; ?>],
                    ['จิตเวช',<?= $countipd06[9]; ?>],
                    ['รังสีวิทยา',<?= $countipd06[10]; ?>],
                    ['ทันตกรรม',<?= $countipd06[11]; ?>],
                    ['อื่นๆ',<?= $countipd06[12]; ?>]
                ]
            },
            {
                "name": "กรกฎาคม",
                "id": "กรกฎาคม",
                "data": [
                    ['ไม่ทราบ',<?= $countipd07[0]; ?>],
                    ['อายุรกรรม',<?= $countipd07[1]; ?>],
                    ['ศัลยกรรม',<?= $countipd07[2]; ?>],
                    ['สูติกรรม',<?= $countipd07[3]; ?>],
                    ['นรีเวชกรรม',<?= $countipd07[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countipd07[5]; ?>],
                    ['หูคอจมูก',<?= $countipd07[6]; ?>],
                    ['จักษุ',<?= $countipd07[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countipd07[8]; ?>],
                    ['จิตเวช',<?= $countipd07[9]; ?>],
                    ['รังสีวิทยา',<?= $countipd07[10]; ?>],
                    ['ทันตกรรม',<?= $countipd07[11]; ?>],
                    ['อื่นๆ',<?= $countipd07[12]; ?>]
                ]
            },
            {
                "name": "สิงหาคม",
                "id": "สิงหาคม",
                "data": [
                    ['ไม่ทราบ',<?= $countipd08[0]; ?>],
                    ['อายุรกรรม',<?= $countipd08[1]; ?>],
                    ['ศัลยกรรม',<?= $countipd08[2]; ?>],
                    ['สูติกรรม',<?= $countipd08[3]; ?>],
                    ['นรีเวชกรรม',<?= $countipd08[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countipd08[5]; ?>],
                    ['หูคอจมูก',<?= $countipd08[6]; ?>],
                    ['จักษุ',<?= $countipd08[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countipd08[8]; ?>],
                    ['จิตเวช',<?= $countipd08[9]; ?>],
                    ['รังสีวิทยา',<?= $countipd08[10]; ?>],
                    ['ทันตกรรม',<?= $countipd08[11]; ?>],
                    ['อื่นๆ',<?= $countipd08[12]; ?>]
                ]
            },
            {
                "name": "กันยายน",
                "id": "กันยายน",
                "data": [
                    ['ไม่ทราบ',<?= $countipd09[0]; ?>],
                    ['อายุรกรรม',<?= $countipd09[1]; ?>],
                    ['ศัลยกรรม',<?= $countipd09[2]; ?>],
                    ['สูติกรรม',<?= $countipd09[3]; ?>],
                    ['นรีเวชกรรม',<?= $countipd09[4]; ?>],
                    ['กุมารเวชกรรม',<?= $countipd09[5]; ?>],
                    ['หูคอจมูก',<?= $countipd09[6]; ?>],
                    ['จักษุ',<?= $countipd09[7]; ?>],
                    ['ศัลยกรรมกระดูก',<?= $countipd09[8]; ?>],
                    ['จิตเวช',<?= $countipd09[9]; ?>],
                    ['รังสีวิทยา',<?= $countipd09[10]; ?>],
                    ['ทันตกรรม',<?= $countipd09[11]; ?>],
                    ['อื่นๆ',<?= $countipd09[12]; ?>]
                ]
            }
        ]
    }
});
</script>











					 
					<!-- Row end -->
    <div class="row">
    
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                   <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4668.681710379877!2d101.8067273151901!3d6.222307195495773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31b4097abc41b2d5%3A0x3c5a86f30a289b4c!2z4LmC4Lij4LiH4Lie4Lii4Liy4Lia4Liy4Lil4LmA4LiI4Liy4Liw4LmE4Lit4Lij4LmJ4Lit4LiH!5e1!3m2!1sth!2sth!4v1656474934426!5m2!1sth!2sth"
    width="100%" height="230">
</iframe>
 
                    </div> </div>
    </div>
					 
					<!-- Row end -->

				</div>
				<!-- Content wrapper end -->


			</div>
			<!-- *************
				************ Main container end *************
			************* -->

			<footer class="main-footer">© โรงพยาบาลเจาะไอร้อง จังหวัดนราธิวาส 2565</footer>

		</div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                 
                $("#datetime").load("data/date.php");
                $("#opd_today").load("data/test.php");

                $("#ovst_q").load("data/ovst_q.php");

                $("#q").load("data/q.php");
                $("#vn").load("data/vn.php");
				$("#q").load("data/q.php");
				$("#ipd").load("data/ipd.php");
				
				$("#er").load("data/er.php");
				$("#dent").load("data/dent.php");
				$("#phy").load("data/phy.php");
				$("#ttm").load("data/ttm.php");
				$("#xray").load("data/xray.php");
				$("#preg").load("data/preg.php");
				
				$("#ward").load("data/ward.php");
				$("#total").load("data/total.php");
				$("#ward04").load("data/ward04_test.php");
				$("#ward07").load("data/wardd07.php");
 
            });
        </script>
         <script type="text/javascript">
		  
            setInterval(function () {
        $.get( "data/time.php", function( data ) {
            $( "#time" ).html( data );
			
			  $("#datetime").load("data/date.php");
                $("#opd_today").load("data/test.php");
                $("#q").load("data/q.php");
				 $("#ovst_q").load("data/ovst_q.php");
				 
                $("#vn").load("data/vn.php");
				$("#q").load("data/q.php");
				$("#ipd").load("data/ipd.php");
				
				$("#er").load("data/er.php");
				$("#dent").load("data/dent.php");
				$("#phy").load("data/phy.php");
				$("#ttm").load("data/ttm.php");
				$("#xray").load("data/xray.php");
				$("#preg").load("data/preg.php");
				
				$("#ward").load("data/ward.php");
				$("#total").load("data/total.php");
				$("#ward04").load("data/ward04_test.php");
				$("#ward07").load("data/wardd07.php");
				
        });        
    }, 1000);
		  
        </script>
        
		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/moment.js"></script>


		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Apex Charts -->
		<script src="vendor/apex/apexcharts.min.js"></script>
		<script src="vendor/apex/examples/mixed/hospital-line-column-graph.js"></script>
		<script src="vendor/apex/examples/mixed/hospital-line-area-graph.js"></script>
		<script src="vendor/apex/examples/bar/hospital-patients-by-age.js"></script>

		<!-- Rating JS -->
		<script src="vendor/rating/raty.js"></script>	
		<script src="vendor/rating/raty-custom.js"></script>		

		<!-- Main Js Required -->
		<script src="js/main.js"></script>

	</body>
 
</html>