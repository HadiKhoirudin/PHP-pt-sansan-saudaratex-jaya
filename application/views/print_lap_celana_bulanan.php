<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'db_pengendalian_kualitas';

/** koneksi ke database */
$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// check koneksi
if ($db->connect_error) {
	die('Oops!! Terjadi error : ' . $db->connect_error);
}
$tgl = substr($tanggal_awal, 5, 2);
$sql_a= "
SELECT SUM(tbl_deffect_celana.openseam_at_waistban) AS total_a
FROM tbl_sewing_qc
INNER JOIN tbl_deffect_celana ON tbl_deffect_celana.kodegarment = tbl_sewing_qc.kodegarment
WHERE month(tbl_sewing_qc.tanggal)='$tanggal_awal'";
$query_a = $db->query($sql_a);
while ($row_a = $query_a->fetch_assoc())
{
$ini_a = $row_a['total_a'];
}
$sql_b= "
SELECT SUM(tbl_deffect_celana.runup_at_waistban) AS total_b
FROM tbl_sewing_qc
INNER JOIN tbl_deffect_celana ON tbl_deffect_celana.kodegarment = tbl_sewing_qc.kodegarment
WHERE month(tbl_sewing_qc.tanggal)='$tgl'";
$query_b = $db->query($sql_b);
while ($row_b = $query_b->fetch_assoc())
{
$ini_b = $row_b['total_b'];
}
$sql_c= "
SELECT SUM(tbl_deffect_celana.openseam_at_inseam) AS total_c
FROM tbl_sewing_qc
INNER JOIN tbl_deffect_celana ON tbl_deffect_celana.kodegarment = tbl_sewing_qc.kodegarment
WHERE month(tbl_sewing_qc.tanggal)='$tgl'";
$query_c = $db->query($sql_c);
while ($row_c = $query_c->fetch_assoc())
{
$ini_c = $row_c['total_c'];
}
$sql_d= "
SELECT SUM(tbl_deffect_celana.skip_at_inseam) AS total_d
FROM tbl_sewing_qc
INNER JOIN tbl_deffect_celana ON tbl_deffect_celana.kodegarment = tbl_sewing_qc.kodegarment
WHERE month(tbl_sewing_qc.tanggal)='$tgl'";
$query_d = $db->query($sql_d);
while ($row_d = $query_d->fetch_assoc())
{
$ini_d = $row_d['total_d'];
}
$sql_e= "
SELECT SUM(tbl_deffect_celana.runup_at_bottomhem) AS total_e
FROM tbl_sewing_qc
INNER JOIN tbl_deffect_celana ON tbl_deffect_celana.kodegarment = tbl_sewing_qc.kodegarment
WHERE month(tbl_sewing_qc.tanggal)='$tgl'";
$query_e = $db->query($sql_e);
while ($row_e = $query_e->fetch_assoc())
{
$ini_e = $row_e['total_e'];
}
$sql_f= "
SELECT SUM(tbl_deffect_celana.totaldeffect) AS total_f
FROM tbl_sewing_qc
INNER JOIN tbl_deffect_celana ON tbl_deffect_celana.kodegarment = tbl_sewing_qc.kodegarment
WHERE month(tbl_sewing_qc.tanggal)='$tgl'";
$query_f = $db->query($sql_f);
while ($row_f = $query_f->fetch_assoc())
{
$ini_f = $row_f['total_f'];
}
$sql_g= "
SELECT SUM(tbl_deffect_celana.totalbagus) AS total_g
FROM tbl_sewing_qc
INNER JOIN tbl_deffect_celana ON tbl_deffect_celana.kodegarment = tbl_sewing_qc.kodegarment
WHERE month(tbl_sewing_qc.tanggal)='$tgl'";
$query_g = $db->query($sql_g);
while ($row_g = $query_g->fetch_assoc())
{
$ini_g = $row_g['total_g'];
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
<?php echo Assets::css('bootstrap.min.css');?>

<style>
html, body {
  font-size: 62.5%;
  height: 100%;
  overflow: hidden;
}
@media (max-width: 768px) {
  html, body {
    font-size: 50%;
  }
}
</style>
<title> Print Data</title></head>
<body>
    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class=""><p style="text-align:right; font-size: 10px; font-weight:bold;">[ <?php echo $this->home_model->tanggal_indo(date('Y-m-d'), true);?> ]</p>
<div class="header">
<p style="text-align:center; font-size: 12px; font-weight:bold;"><?php echo assets::img('logo.jpg')?></p>
</div>
<p style="font-size: 12px; font-weight:bold; text-align:center;" >Laporan Data Total Celana Bulanan<br>PT. Sansan Saudaratex Jaya<hr></p>
<table width="1000px" border="1">
  <tbody>
    <tr>
      <td style="font-size: 10px; border: 1px dotted black;" colspan="13"> Tanggal : <?php echo substr($this->home_model->tanggal_indo($tanggal_awal),2);?></td>
    </tr>
    <tr>
      <td style="font-size: 10px; border: 1px dotted black;"><center>&nbsp;Kode Garmen&nbsp;</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>&nbsp;No Line&nbsp;</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>&nbsp;Nama Spv&nbsp;</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>&nbsp;Nama QC&nbsp;</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>&nbsp;Buyer&nbsp;</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>&nbsp;Style&nbsp;</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>&nbsp;Open seam at Waistban&nbsp;</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>&nbsp;Run Up at Waistban&nbsp;</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>Open seam at Inseam</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>&nbsp;Skip at Inseam&nbsp;</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>Run at Bottom Hem</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>&nbsp;Total Deffect&nbsp;</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>&nbsp;Total Bagus&nbsp;</center></td>
    </tr>

									<?php
									$sql= "
SELECT
tbl_sewing_qc.kodegarment,
tbl_sewing_qc.tanggal,
tbl_sewing_qc.noline,
tbl_sewing_qc.namaspv,
tbl_sewing_qc.namaqc,
tbl_garment.kodegarment,
tbl_garment.nama_garment,
tbl_garment.style,
tbl_garment.buyer,
tbl_deffect_celana.kodegarment,
tbl_deffect_celana.openseam_at_waistban,
tbl_deffect_celana.runup_at_waistban,
tbl_deffect_celana.openseam_at_inseam,
tbl_deffect_celana.skip_at_inseam,
tbl_deffect_celana.runup_at_bottomhem,
tbl_deffect_celana.totaldeffect,
tbl_deffect_celana.totalbagus,
tbl_deffect_celana.persentasi
FROM
tbl_sewing_qc
INNER JOIN tbl_garment ON tbl_garment.kodegarment = tbl_sewing_qc.kodegarment
INNER JOIN tbl_deffect_celana ON tbl_deffect_celana.kodegarment = tbl_sewing_qc.kodegarment
WHERE month(tanggal)='$tgl' ORDER BY tanggal ASC";
									$query = $db->query($sql);
									while ($row = $query->fetch_assoc())
										
									{   $no++;
echo '
<tr>
      <td style="font-size: 10px; border: 1px dotted black;"><center>'.$row[kodegarment].'</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>'.$row[noline].'</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>'.$row[namaspv].'</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>'.$row[namaqc].'</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>'.$row[buyer].'</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>'.$row[style].'</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>'.$row[openseam_at_waistban].'</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>'.$row[runup_at_waistban].'</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>'.$row[openseam_at_inseam].'</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>'.$row[skip_at_inseam].'</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>'.$row[runup_at_bottomhem].'</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>'.$row[totaldeffect].'</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center>'.$row[totalbagus].'</center></td>
</tr>
';

									}
                                    ?>

    <tr>
      <td colspan="6" style="font-size: 10px; border: 1px dotted black;"><center>Total :</center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center><?php echo $ini_a;?></center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center><?php echo $ini_b;?></center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center><?php echo $ini_c;?></center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center><?php echo $ini_d;?></center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center><?php echo $ini_e;?></center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center><?php echo $ini_f;?></center></td>
      <td style="font-size: 10px; border: 1px dotted black;"><center><?php echo $ini_g;?></center></td>
    </tr>
  </tbody>
</table>
    <hr><td colspan="2"><center><b>Mengetahui :</b></center></td>
        <table align="right" style="width:10%; height:10%;">
            <tr >
               <td colspan="25" >
			   TTD. <?php echo $this->session->userdata('id_jenis_user');?>
			   <br />
			   <br />
			   <br />
			   <br />
			   <br />
			   <br />
			   (&nbsp;<?php echo $this->session->userdata('nama_login');?>&nbsp;)
			   <center><b></b></center></td>
            </tr>
        </table>

                        </div>
                    </div>
                </div>
            </div>
</body>
</html>