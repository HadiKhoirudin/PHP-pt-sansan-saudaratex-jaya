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
<p style="font-size: 12px; font-weight:bold; text-align:center;" >Laporan Data Deffect Kemeja Harian<br>PT. Sansan Saudaratex Jaya<hr></p>
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
tbl_deffect_kemeja.kodegarment,
tbl_deffect_kemeja.unevent_at_collar,
tbl_deffect_kemeja.openseam_at_bottomhem,
tbl_deffect_kemeja.skip_at_sideseam,
tbl_deffect_kemeja.openseam_at_sideseam,
tbl_deffect_kemeja.hilo_at_cuff,
tbl_deffect_kemeja.totaldeffect,
tbl_deffect_kemeja.totalbagus,
tbl_deffect_kemeja.persentasi
FROM
tbl_sewing_qc
INNER JOIN tbl_garment ON tbl_garment.kodegarment = tbl_sewing_qc.kodegarment
INNER JOIN tbl_deffect_kemeja ON tbl_deffect_kemeja.kodegarment = tbl_sewing_qc.kodegarment
WHERE tbl_sewing_qc.tanggal='$tanggal_awal' ORDER BY tbl_sewing_qc.tanggal ASC";
									$query = $db->query($sql);
									while ($row = $query->fetch_assoc())
										
									{   $no++;
echo '
<table width="900px" style="font-size: 12px; border: 1px solid black;border-width: thin">
  <tbody>
    <tr>
      <td width="100px">Tanggal </td>
      <td width="1px">:</td>
      <td width="780px" colspan="7">'.$row[tanggal].'</td>
      <td width="100px" style="font-size: 12px; border: 1px solid black; text-align:center;">TTD. Spv</td>
    </tr>
    <tr>
      <td width="100px">Kode Garmen</td>
      <td width="1px">:</td>
      <td width="120px">C-'.$row[kodegarment].'</td>
      <td width="130px">Unevent at Collar</td>
      <td width="1px">:</td>
      <td width="180px">'.$row[unevent_at_collar].' pcs</td>
      <td width="180px" colspan="3">&nbsp;</td>
      <td width="100px" rowspan="5" style="font-size: 12px; border: 1px solid black; text-align:center;">'.$row[namaspv].'</td>
    </tr>
    <tr>
      <td width="100px">No Line</td>
      <td width="1px">:</td>
      <td width="120px">'.$row[noline].'</td>
      <td width="130px">Open Seam at Bottom Hem</td>
      <td width="1px">:</td>
      <td width="160px">'.$row[openseam_at_bottomhem].' pcs</td>
      <td width="80px">Total Deffect</td>
      <td width="1px">:</td>
      <td width="10px">'.$row[totaldeffect].' pcs</td>

    </tr>
    <tr>
      <td width="100px">Nama Qc</td>
      <td width="1px">:</td>
      <td>'.$row[namaqc].'</td>
      <td>Skip at Side Seam</td>
      <td>:</td>
      <td>'.$row[skip_at_sideseam].' pcs</td>
      <td width="10px">Total Bagus</td>
      <td>:</td>
      <td width="10px">'.$row[totalbagus].' pcs</td>

    </tr>
    <tr>
      <td width="100px">Buyer</td>
      <td>:</td>
      <td>'.$row[buyer].'</td>
      <td>Open Seam at Side Seam</td>
      <td>:</td>
      <td>'.$row[openseam_at_sideseam].' pcs</td>
      <td width="10px" style="color:#E81317;">Persentasi</td>
      <td style="color:#E81317;">:</td>
      <td width="10px" style="color:#E81317;">'.$row[persentasi].' %</td>

    </tr>
    <tr>
      <td width="100px">Style</td>
      <td>:</td>
      <td>'.$row[style].'</td>
      <td>Hi Lo at Cuff</td>
      <td>:</td>
      <td>'.$row[hilo_at_cuff].' pcs</td>
      <td colspan="3">&nbsp;</td>
    </tr>
  </tbody>
</table>
';

									}
                                    ?>
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