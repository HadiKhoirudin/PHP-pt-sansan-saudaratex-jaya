<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	

	
	
	
	
	
	
	
	
	
	
	#{input_data_celana

	public function create_input_data_celana_tbl_sewing_qc()
	{
		return $this->db->insert('tbl_sewing_qc',array(
				'kodegarment'=>$this->input->post('kodegarment',true),
				'noline'=>$this->input->post('noline',true),
				'tanggal'=>$this->input->post('tanggal',true),
				'namaspv'=>$this->input->post('namaspv',true),
				'namaqc'=>$this->input->post('namaqc',true)
			));
	}

	public function create_input_data_celana_tbl_garment()
	{
		$query = $this->db->query("SELECT tbl_sewing_qc.kodegarment FROM tbl_sewing_qc ORDER BY tbl_sewing_qc.kodegarment DESC limit 1");
		foreach ($query->result_array() as $row) {$autokodegarment = $row['kodegarment'];}
		return $this->db->insert('tbl_garment',array(
				'kodegarment'=>$autokodegarment,
				'nama_garment'=>'Celana',
				'buyer'=>$this->input->post('buyer',true),
				'style'=>$this->input->post('style',true)
			));
	}

	public function create_input_data_celana_tbl_deffect_celana()
	{
		$query = $this->db->query("SELECT tbl_sewing_qc.kodegarment FROM tbl_sewing_qc ORDER BY tbl_sewing_qc.kodegarment DESC limit 1");
		foreach ($query->result_array() as $row) {$autokodegarment = $row['kodegarment'];}
		return $this->db->insert('tbl_deffect_celana',array(
				'kodegarment'=>$autokodegarment,
				'openseam_at_waistban'=>$this->input->post('openseam_at_waistban',true),
				'runup_at_waistban'=>$this->input->post('runup_at_waistban',true),
				'openseam_at_inseam'=>$this->input->post('openseam_at_inseam',true),
				'skip_at_inseam'=>$this->input->post('skip_at_inseam',true),
				'runup_at_bottomhem'=>$this->input->post('runup_at_bottomhem',true),
				'totaldeffect'=>$this->input->post('totaldeffect',true),
				'totalbagus'=>$this->input->post('totalbagus',true),
				'persentasi'=>$this->input->post('persentasi',true)
			));
	}

	public function create_input_data_tbl_keterangan()
	{
		$query = $this->db->query("SELECT tbl_sewing_qc.kodegarment FROM tbl_sewing_qc ORDER BY tbl_sewing_qc.kodegarment DESC limit 1");
		foreach ($query->result_array() as $row) {$autokodegarment = $row['kodegarment'];}
		return $this->db->insert('tbl_keterangan',array(
				'kodegarment'=>$autokodegarment
			));
	}

	public function update_input_data_celana_tbl_sewing_qc($id)
	{
		$this->db->where('kodegarment', substr($id,2));
		$kodegarment = substr($this->input->post('kodegarment',true),2);
		return $this->db->update('tbl_sewing_qc',array(
				'noline'=>$this->input->post('noline',true),
				'tanggal'=>$this->input->post('tanggal',true),
				'namaspv'=>$this->input->post('namaspv',true),
				'namaqc'=>$this->input->post('namaqc',true)
			));
	}

	public function update_input_data_celana_tbl_garment($id)
	{
		$this->db->where('kodegarment', substr($id,2));
		$kodegarment = substr($this->input->post('kodegarment',true),2);
		return $this->db->update('tbl_garment',array(
				'nama_garment'=>'Celana',
				'buyer'=>$this->input->post('buyer',true),
				'style'=>$this->input->post('style',true)
			));
	}

	public function update_input_data_tbl_keterangan($id)
	{
		$this->db->where('kodegarment', substr($id,2));
		$kodegarment = substr($this->input->post('kodegarment',true),2);
		return $this->db->update('tbl_keterangan',array(
				'keterangan'=>$this->input->post('keterangan',true)
			));
	}

	public function update_input_data_celana_tbl_deffect_celana($id)
	{
		$this->db->where('kodegarment', substr($id,2));
		$kodegarment = substr($this->input->post('kodegarment',true),2);
		return $this->db->update('tbl_deffect_celana',array(
				'openseam_at_waistban'=>$this->input->post('openseam_at_waistban',true),
				'runup_at_waistban'=>$this->input->post('runup_at_waistban',true),
				'openseam_at_inseam'=>$this->input->post('openseam_at_inseam',true),
				'skip_at_inseam'=>$this->input->post('skip_at_inseam',true),
				'runup_at_bottomhem'=>$this->input->post('runup_at_bottomhem',true),
				'totaldeffect'=>$this->input->post('totaldeffect',true),
				'totalbagus'=>$this->input->post('totalbagus',true),
				'persentasi'=>$this->input->post('persentasi',true)
			));
	}

	public function folow_input_data_celana($id)
	{
		$kodenya =  substr($id,2,4);
		$this->db->where('kodegarment',$kodenya);
		$kodegarment = substr($this->input->post('kodegarment',true),2);
		$follow_up = substr($id, 6);
		if ($follow_up == '0')
		{
			$hasil = NULL;
		}
		else
		{
			$hasil = 1;
		}
		return $this->db->update('tbl_keterangan',array('follow_up'=>$hasil));
	}

	public function delete_input_data_celana($id)
	{
		return $this->db->delete('tbl_sewing_qc', array('kodegarment' => $id)); 
	}
	
	public function data_celana_getJson()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'tbl_sewing_qc.kodegarment';
		
		switch($sort)
		{
		case 'tbl_sewing_qc.kodegarment' : $sortiran ='tbl_sewing_qc.kodegarment'; break;
		case 'kodegarment' : $sortiran ='tbl_sewing_qc.kodegarment'; break;
		case 'noline' : $sortiran ='tbl_sewing_qc.noline'; break;
		case 'tanggal' : $sortiran ='tbl_sewing_qc.tanggal'; break;
		case 'namaspv' : $sortiran ='tbl_sewing_qc.namaspv'; break;
		case 'namaqc' : $sortiran ='tbl_sewing_qc.namaqc'; break;
		case 'style' : $sortiran ='tbl_garment.style'; break;
		case 'buyer' : $sortiran ='tbl_garment.buyer'; break;
		case 'openseam_at_waistban' : $sortiran ='tbl_deffect_celana.openseam_at_waistban'; break;
		case 'runup_at_waistban' : $sortiran ='tbl_deffect_celana.runup_at_waistban'; break;
		case 'openseam_at_inseam' : $sortiran ='tbl_deffect_celana.openseam_at_inseam'; break;
		case 'skip_at_inseam' : $sortiran ='tbl_deffect_celana.skip_at_inseam'; break;
		case 'runup_at_bottomhem' : $sortiran ='tbl_deffect_celana.runup_at_bottomhem'; break;
		case 'totaldeffect' : $sortiran ='tbl_deffect_celana.totaldeffect'; break;
		case 'totalbagus' : $sortiran ='tbl_deffect_celana.totalbagus'; break;
		case 'persentasi' : $sortiran ='tbl_deffect_celana.persentasi'; break;
		}
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'ASC';
		$offset = ($page-1) * $rows;
		
		$result = array();
		
$Query = '
SELECT
tbl_sewing_qc.kodegarment,
tbl_sewing_qc.noline,
tbl_sewing_qc.tanggal,
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
tbl_deffect_celana.persentasi,
tbl_keterangan.kodegarment,
tbl_keterangan.follow_up,
tbl_keterangan.keterangan
FROM
tbl_sewing_qc
INNER JOIN tbl_garment ON tbl_garment.kodegarment = tbl_sewing_qc.kodegarment
INNER JOIN tbl_deffect_celana ON tbl_deffect_celana.kodegarment = tbl_sewing_qc.kodegarment
INNER JOIN tbl_keterangan ON tbl_keterangan.kodegarment = tbl_sewing_qc.kodegarment
ORDER BY '.$sortiran.' '.$order.'
LIMIT '.$offset.','.$rows.'
';
		
		$result['total'] = $this->db->query($Query)->num_rows();
		$row = array();

		$criteria = $this->db->query($Query);
		
		$this->db->limit($rows,$offset);
		$this->db->order_by($sort,$order);
		
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'kodegarment'=>'C-'.$data['kodegarment'],
				'noline'=>$data['noline'],
				'tanggal'=>$data['tanggal'],
				'namaspv'=>$data['namaspv'],
				'namaqc'=>$data['namaqc'],
				'buyer'=>$data['buyer'],
				'style'=>$data['style'],
				'openseam_at_waistban'=>$data['openseam_at_waistban'],
				'runup_at_waistban'=>$data['runup_at_waistban'],
				'openseam_at_inseam'=>$data['openseam_at_inseam'],
				'skip_at_inseam'=>$data['skip_at_inseam'],
				'runup_at_bottomhem'=>$data['runup_at_bottomhem'],
				'totaldeffect'=>$data['totaldeffect'],
				'totalbagus'=>$data['totalbagus'],
				'persentasi'=>$data['persentasi']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}

	public function cek_data_celana_getJson()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'tbl_sewing_qc.kodegarment';

		switch($sort)
		{
		case 'tbl_sewing_qc.kodegarment' : $sortiran ='tbl_sewing_qc.kodegarment'; break;
		case 'kodegarment' : $sortiran ='tbl_sewing_qc.kodegarment'; break;
		case 'noline' : $sortiran ='tbl_sewing_qc.noline'; break;
		case 'tanggal' : $sortiran ='tbl_sewing_qc.tanggal'; break;
		case 'namaspv' : $sortiran ='tbl_sewing_qc.namaspv'; break;
		case 'namaqc' : $sortiran ='tbl_sewing_qc.namaqc'; break;
		case 'style' : $sortiran ='tbl_garment.style'; break;
		case 'buyer' : $sortiran ='tbl_garment.buyer'; break;
		case 'openseam_at_waistban' : $sortiran ='tbl_deffect_celana.openseam_at_waistban'; break;
		case 'runup_at_waistban' : $sortiran ='tbl_deffect_celana.runup_at_waistban'; break;
		case 'openseam_at_inseam' : $sortiran ='tbl_deffect_celana.openseam_at_inseam'; break;
		case 'skip_at_inseam' : $sortiran ='tbl_deffect_celana.skip_at_inseam'; break;
		case 'runup_at_bottomhem' : $sortiran ='tbl_deffect_celana.runup_at_bottomhem'; break;
		case 'totaldeffect' : $sortiran ='tbl_deffect_celana.totaldeffect'; break;
		case 'totalbagus' : $sortiran ='tbl_deffect_celana.totalbagus'; break;
		case 'persentasi' : $sortiran ='tbl_deffect_celana.persentasi'; break;
		}
		
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'ASC';
		$ckodeg = isset($_POST['ckodeg']) ? strval($_POST['ckodeg']) : '';
		$cline = isset($_POST['cline']) ? strval($_POST['cline']) : '';
		$cpersen = isset($_POST['cpersen']) ? strval($_POST['cpersen']) : '';
		
		$offset = ($page-1) * $rows;
		
		$result = array();
		
$Query = '
SELECT
tbl_sewing_qc.kodegarment,
tbl_sewing_qc.noline,
tbl_sewing_qc.tanggal,
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
tbl_deffect_celana.persentasi,
tbl_keterangan.kodegarment,
tbl_keterangan.follow_up,
tbl_keterangan.keterangan
FROM
tbl_sewing_qc
INNER JOIN tbl_garment ON tbl_garment.kodegarment = tbl_sewing_qc.kodegarment
INNER JOIN tbl_deffect_celana ON tbl_deffect_celana.kodegarment = tbl_sewing_qc.kodegarment
INNER JOIN tbl_keterangan ON tbl_keterangan.kodegarment = tbl_sewing_qc.kodegarment
WHERE tbl_sewing_qc.kodegarment like "'.$ckodeg.'%" and tbl_sewing_qc.noline like "'.$cline.'%" and tbl_deffect_celana.persentasi like "'.$cpersen.'%"
ORDER BY '.$sortiran.' '.$order.'
LIMIT '.$offset.','.$rows.'
';
		$result['total'] = $this->db->query($Query)->num_rows();
		$row = array();

		$criteria = $this->db->query($Query);
		
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'kodegarment'=>'C-'.$data['kodegarment'],
				'noline'=>$data['noline'],
				'tanggal'=>$data['tanggal'],
				'namaspv'=>$data['namaspv'],
				'namaqc'=>$data['namaqc'],
				'buyer'=>$data['buyer'],
				'style'=>$data['style'],
				'openseam_at_waistban'=>$data['openseam_at_waistban'],
				'runup_at_waistban'=>$data['runup_at_waistban'],
				'openseam_at_inseam'=>$data['openseam_at_inseam'],
				'skip_at_inseam'=>$data['skip_at_inseam'],
				'runup_at_bottomhem'=>$data['runup_at_bottomhem'],
				'totaldeffect'=>$data['totaldeffect'],
				'totalbagus'=>$data['totalbagus'],
				'persentasi'=>$data['persentasi'],
				'follow_up'=>$data['follow_up'],
				'keterangan'=>$data['keterangan']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	#input_data_celana}
		

	
	
	
	
	
	
	
	
	
	
	#{input_data_kemeja


	public function create_input_data_kemeja_tbl_sewing_qc()
	{
		return $this->db->insert('tbl_sewing_qc',array(
				'kodegarment'=>$this->input->post('kodegarment',true),
				'noline'=>$this->input->post('noline',true),
				'tanggal'=>$this->input->post('tanggal',true),
				'namaspv'=>$this->input->post('namaspv',true),
				'namaqc'=>$this->input->post('namaqc',true)
			));
	}

	public function create_input_data_kemeja_tbl_garment()
	{
		$query = $this->db->query("SELECT tbl_sewing_qc.kodegarment FROM tbl_sewing_qc ORDER BY tbl_sewing_qc.kodegarment DESC limit 1");
		foreach ($query->result_array() as $row) {$autokodegarment = $row['kodegarment'];}
		return $this->db->insert('tbl_garment',array(
				'kodegarment'=>$autokodegarment,
				'nama_garment'=>'Kemeja',
				'buyer'=>$this->input->post('buyer',true),
				'style'=>$this->input->post('style',true)
			));
	}

	public function create_input_data_kemeja_tbl_deffect_kemeja()
	{
		$query = $this->db->query("SELECT tbl_sewing_qc.kodegarment FROM tbl_sewing_qc ORDER BY tbl_sewing_qc.kodegarment DESC limit 1");
		foreach ($query->result_array() as $row) {$autokodegarment = $row['kodegarment'];}
		return $this->db->insert('tbl_deffect_kemeja',array(
				'kodegarment'=>$autokodegarment,
				'unevent_at_collar'=>$this->input->post('unevent_at_collar',true),
				'openseam_at_bottomhem'=>$this->input->post('openseam_at_bottomhem',true),
				'skip_at_sideseam'=>$this->input->post('skip_at_sideseam',true),
				'openseam_at_sideseam'=>$this->input->post('openseam_at_sideseam',true),
				'hilo_at_cuff'=>$this->input->post('hilo_at_cuff',true),
				'totaldeffect'=>$this->input->post('totaldeffect',true),
				'totalbagus'=>$this->input->post('totalbagus',true),
				'persentasi'=>$this->input->post('persentasi',true)
			));
	}
	
	public function update_input_data_kemeja_tbl_sewing_qc($id)
	{
		$this->db->where('kodegarment', substr($id,2));
		$kodegarment = substr($this->input->post('kodegarment',true),2);
		return $this->db->update('tbl_sewing_qc',array(
				'noline'=>$this->input->post('noline',true),
				'tanggal'=>$this->input->post('tanggal',true),
				'namaspv'=>$this->input->post('namaspv',true),
				'namaqc'=>$this->input->post('namaqc',true)
			));
	}

	public function update_input_data_kemeja_tbl_garment($id)
	{
		$this->db->where('kodegarment', substr($id,2));
		$kodegarment = substr($this->input->post('kodegarment',true),2);
		return $this->db->update('tbl_garment',array(
				'nama_garment'=>'Kemeja',
				'buyer'=>$this->input->post('buyer',true),
				'style'=>$this->input->post('style',true)
			));
	}

	public function update_input_data_kemeja_tbl_deffect_kemeja($id)
	{
		$this->db->where('kodegarment', substr($id,2));
		$kodegarment = substr($this->input->post('kodegarment',true),2);
		return $this->db->update('tbl_deffect_kemeja',array(
				'unevent_at_collar'=>$this->input->post('unevent_at_collar',true),
				'openseam_at_bottomhem'=>$this->input->post('openseam_at_bottomhem',true),
				'skip_at_sideseam'=>$this->input->post('skip_at_sideseam',true),
				'openseam_at_sideseam'=>$this->input->post('openseam_at_sideseam',true),
				'hilo_at_cuff'=>$this->input->post('hilo_at_cuff',true),
				'totaldeffect'=>$this->input->post('totaldeffect',true),
				'totalbagus'=>$this->input->post('totalbagus',true),
				'persentasi'=>$this->input->post('persentasi',true)
			));
	}

	public function folow_input_data_kemeja($id)
	{
		$kodenya =  substr($id,2,4);
		$this->db->where('kodegarment',$kodenya);
		$kodegarment = substr($this->input->post('kodegarment',true),2);
		$follow_up = substr($id, 6);
		if ($follow_up == '0')
		{
			$hasil = NULL;
		}
		else
		{
			$hasil = 1;
		}
		return $this->db->update('tbl_keterangan',array('follow_up'=>$hasil));
	}

	public function delete_input_data_kemeja($id)
	{
		return $this->db->delete('tbl_sewing_qc', array('kodegarment' => $id)); 
	}
	
	public function data_kemeja_getJson()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;

		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'tbl_sewing_qc.kodegarment';
		
		switch($sort)
		{
		case 'tbl_sewing_qc.kodegarment' : $sortiran ='tbl_sewing_qc.kodegarment'; break;
		case 'kodegarment' : $sortiran ='tbl_sewing_qc.kodegarment'; break;
		case 'noline' : $sortiran ='tbl_sewing_qc.noline'; break;
		case 'tanggal' : $sortiran ='tbl_sewing_qc.tanggal'; break;
		case 'namaspv' : $sortiran ='tbl_sewing_qc.namaspv'; break;
		case 'namaqc' : $sortiran ='tbl_sewing_qc.namaqc'; break;
		case 'style' : $sortiran ='tbl_garment.style'; break;
		case 'buyer' : $sortiran ='tbl_garment.buyer'; break;
		case 'unevent_at_collar' : $sortiran ='tbl_deffect_kemeja.unevent_at_collar'; break;
		case 'openseam_at_bottomhem' : $sortiran ='tbl_deffect_kemeja.openseam_at_bottomhem'; break;
		case 'skip_at_sideseam' : $sortiran ='tbl_deffect_kemeja.skip_at_sideseam'; break;
		case 'openseam_at_sideseam' : $sortiran ='tbl_deffect_kemeja.openseam_at_sideseam'; break;
		case 'hilo_at_cuff' : $sortiran ='tbl_deffect_kemeja.hilo_at_cuff'; break;
		case 'totaldeffect' : $sortiran ='tbl_deffect_kemeja.totaldeffect,'; break;
		case 'totalbagus' : $sortiran ='tbl_deffect_kemeja.totalbagus,'; break;
		case 'persentasi' : $sortiran ='tbl_deffect_kemeja.persentasi'; break;
		}
		
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$offset = ($page-1) * $rows;
		
		$result = array();

		
$Query = '
SELECT
tbl_sewing_qc.kodegarment,
tbl_sewing_qc.noline,
tbl_sewing_qc.tanggal,
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
tbl_deffect_kemeja.persentasi,
tbl_keterangan.kodegarment,
tbl_keterangan.follow_up,
tbl_keterangan.keterangan
FROM
tbl_sewing_qc
INNER JOIN tbl_garment ON tbl_garment.kodegarment = tbl_sewing_qc.kodegarment
INNER JOIN tbl_deffect_kemeja ON tbl_deffect_kemeja.kodegarment = tbl_sewing_qc.kodegarment
INNER JOIN tbl_keterangan ON tbl_keterangan.kodegarment = tbl_sewing_qc.kodegarment
ORDER BY '.$sortiran.' '.$order.'
LIMIT '.$offset.','.$rows.'
';

		$result['total'] = $this->db->query($Query)->num_rows();
		$row = array();

		$criteria = $this->db->query($Query);
		
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'kodegarment'=>'K-'.$data['kodegarment'],
				'noline'=>$data['noline'],
				'tanggal'=>$data['tanggal'],
				'namaspv'=>$data['namaspv'],
				'namaqc'=>$data['namaqc'],
				'buyer'=>$data['buyer'],
				'style'=>$data['style'],
				'unevent_at_collar'=>$data['unevent_at_collar'],
				'openseam_at_bottomhem'=>$data['openseam_at_bottomhem'],
				'skip_at_sideseam'=>$data['skip_at_sideseam'],
				'openseam_at_sideseam'=>$data['openseam_at_sideseam'],
				'hilo_at_cuff'=>$data['hilo_at_cuff'],
				'totaldeffect'=>$data['totaldeffect'],
				'totalbagus'=>$data['totalbagus'],
				'persentasi'=>$data['persentasi']
				
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}

	public function cek_data_kemeja_getJson()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;

		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'tbl_sewing_qc.kodegarment';
		
		switch($sort)
		{
		case 'tbl_sewing_qc.kodegarment' : $sortiran ='tbl_sewing_qc.kodegarment'; break;
		case 'kodegarment' : $sortiran ='tbl_sewing_qc.kodegarment'; break;
		case 'noline' : $sortiran ='tbl_sewing_qc.noline'; break;
		case 'tanggal' : $sortiran ='tbl_sewing_qc.tanggal'; break;
		case 'namaspv' : $sortiran ='tbl_sewing_qc.namaspv'; break;
		case 'namaqc' : $sortiran ='tbl_sewing_qc.namaqc'; break;
		case 'style' : $sortiran ='tbl_garment.style'; break;
		case 'buyer' : $sortiran ='tbl_garment.buyer'; break;
		case 'unevent_at_collar' : $sortiran ='tbl_deffect_kemeja.unevent_at_collar'; break;
		case 'openseam_at_bottomhem' : $sortiran ='tbl_deffect_kemeja.openseam_at_bottomhem'; break;
		case 'skip_at_sideseam' : $sortiran ='tbl_deffect_kemeja.skip_at_sideseam'; break;
		case 'openseam_at_sideseam' : $sortiran ='tbl_deffect_kemeja.openseam_at_sideseam'; break;
		case 'hilo_at_cuff' : $sortiran ='tbl_deffect_kemeja.hilo_at_cuff'; break;
		case 'totaldeffect' : $sortiran ='tbl_deffect_kemeja.totaldeffect,'; break;
		case 'totalbagus' : $sortiran ='tbl_deffect_kemeja.totalbagus,'; break;
		case 'persentasi' : $sortiran ='tbl_deffect_kemeja.persentasi'; break;
		}
		
		
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$ckodeg = isset($_POST['ckodeg']) ? strval($_POST['ckodeg']) : '';
		$cline = isset($_POST['cline']) ? strval($_POST['cline']) : '';
		$cpersen = isset($_POST['cpersen']) ? strval($_POST['cpersen']) : '';
		
		$offset = ($page-1) * $rows;
		
		$result = array();


$Query = '
SELECT
tbl_sewing_qc.kodegarment,
tbl_sewing_qc.noline,
tbl_sewing_qc.tanggal,
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
tbl_deffect_kemeja.persentasi,
tbl_keterangan.kodegarment,
tbl_keterangan.follow_up,
tbl_keterangan.keterangan
FROM
tbl_sewing_qc
INNER JOIN tbl_garment ON tbl_garment.kodegarment = tbl_sewing_qc.kodegarment
INNER JOIN tbl_deffect_kemeja ON tbl_deffect_kemeja.kodegarment = tbl_sewing_qc.kodegarment
INNER JOIN tbl_keterangan ON tbl_keterangan.kodegarment = tbl_sewing_qc.kodegarment
WHERE tbl_sewing_qc.kodegarment like "'.$ckodeg.'%" and tbl_sewing_qc.noline like "'.$cline.'%" and tbl_deffect_kemeja.persentasi like "'.$cpersen.'%"
ORDER BY '.$sortiran.' '.$order.'
LIMIT '.$offset.','.$rows.'
';

		$result['total'] = $this->db->query($Query)->num_rows();
		$row = array();

		$criteria = $this->db->query($Query);
		
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'kodegarment'=>'K-'.$data['kodegarment'],
				'noline'=>$data['noline'],
				'tanggal'=>$data['tanggal'],
				'namaspv'=>$data['namaspv'],
				'namaqc'=>$data['namaqc'],
				'buyer'=>$data['buyer'],
				'style'=>$data['style'],
				'unevent_at_collar'=>$data['unevent_at_collar'],
				'openseam_at_bottomhem'=>$data['openseam_at_bottomhem'],
				'skip_at_sideseam'=>$data['skip_at_sideseam'],
				'openseam_at_sideseam'=>$data['openseam_at_sideseam'],
				'hilo_at_cuff'=>$data['hilo_at_cuff'],
				'totaldeffect'=>$data['totaldeffect'],
				'totalbagus'=>$data['totalbagus'],
				'persentasi'=>$data['persentasi'],
				'follow_up'=>$data['follow_up'],
				'keterangan'=>$data['keterangan']
				
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	#input_data_kemeja}
	

	
	
	
	
	
	
	
	
	
	#{input_data_pengguna
	public function create_input_data_pengguna()
	{
		return $this->db->insert('tbl_hak_akses',array(
				'id'=>$this->input->post('id',true),
				'nama'=>$this->input->post('nama',true),
				'username'=>$this->input->post('username',true),
				'password'=>$this->input->post('password',true),
				'level'=>$this->input->post('hakakses',true)
			));
	}
	
	public function update_input_data_pengguna($id)
	{
		$this->db->where('id', $id);
		return $this->db->update('tbl_hak_akses',array(
				'id'=>$this->input->post('id',true),
				'nama'=>$this->input->post('nama',true),
				'username'=>$this->input->post('username',true),
				'password'=>$this->input->post('password',true),
				'level'=>$this->input->post('hakakses',true)
			));
	}
	
	public function delete_input_data_pengguna($id)
	{
		return $this->db->delete('tbl_hak_akses', array('id' => $id)); 
	}
	
	public function data_pengguna_getJson()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$offset = ($page-1) * $rows;
		
		$result = array();
		$result['total'] = $this->db->get('tbl_hak_akses')->num_rows();
		$row = array();
		
		$this->db->limit($rows,$offset);
		$this->db->order_by($sort,$order);
		$criteria = $this->db->get('tbl_hak_akses');
		
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'id'=>$data['id'],
				'nama'=>$data['nama'],
				'username'=>$data['username'],
				'password'=>$data['password'],
				'hakakses'=>$data['level']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	#input_data_pengguna}

	public function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}
	public function simpan_upload($image)
	{
		return $this->db->insert('tbl_berkas',array(
				'tgl_berkas'=>date('Y-m-d'),
				'dat_berkas'=>$image
			));
	}
}

/* End of file crud_model.php */
/* Location: ./application/controllers/crud_model.php */