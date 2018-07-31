<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('id_jenis_user') == !NULL)
		{
		}
		else
		{
			redirect('login');
		}
	}

	public function index()
	{
		$aksesnya = $this->session->userdata('id_jenis_user');
			switch($aksesnya)
			{
				case 'Admin': $data['disabled_input_data_celana']=' ';
							  $data['disabled_input_data_kemeja']=' ';
							  $data['disabled_input_data_pengguna']=' ';
							  
							  $data['disabled_cek_data_celana']=' ';
							  $data['disabled_cek_data_kemeja']=' ';
							  
							  $data['disabled_lap_celana_harian']=' ';
							  $data['disabled_lap_celana_bulanan']=' ';
							  $data['disabled_lap_tot_data_deff_celana_harian']=' ';
							  $data['disabled_lap_tot_data_deff_celana_bulanan']=' ';
							  $data['disabled_lap_kemeja_harian']=' ';
							  $data['disabled_lap_kemeja_bulanan']=' ';
							  $data['disabled_lap_tot_data_deff_kemeja_harian']=' ';
							  $data['disabled_lap_tot_data_deff_kemeja_bulanan']=' ';
							  $data['disabled_unggah_berkas']=' ';
				break;
				case 'QA System': $data['disabled_input_data_celana']='disabled';
							  $data['disabled_input_data_kemeja']='disabled';
							  $data['disabled_input_data_pengguna']='disabled';
							  
							  $data['disabled_cek_data_celana']=' ';
							  $data['disabled_cek_data_kemeja']=' ';
							  
							  $data['disabled_lap_celana_harian']=' ';
							  $data['disabled_lap_celana_bulanan']=' ';
							  $data['disabled_lap_tot_data_deff_celana_harian']=' ';
							  $data['disabled_lap_tot_data_deff_celana_bulanan']=' ';
							  $data['disabled_lap_kemeja_harian']=' ';
							  $data['disabled_lap_kemeja_bulanan']=' ';
							  $data['disabled_lap_tot_data_deff_kemeja_harian']=' ';
							  $data['disabled_lap_tot_data_deff_kemeja_bulanan']=' ';
							  $data['disabled_unggah_berkas']='disabled';
				break;
				case 'SPV. Line': $data['disabled_input_data_celana']='disabled';
							  $data['disabled_input_data_kemeja']='disabled';
							  $data['disabled_input_data_pengguna']='disabled';
							  
							  $data['disabled_cek_data_celana']=' ';
							  $data['disabled_cek_data_kemeja']=' ';
							  
							  $data['disabled_lap_celana_harian']=' ';
							  $data['disabled_lap_celana_bulanan']=' ';
							  $data['disabled_lap_tot_data_deff_celana_harian']=' ';
							  $data['disabled_lap_tot_data_deff_celana_bulanan']=' ';
							  $data['disabled_lap_kemeja_harian']=' ';
							  $data['disabled_lap_kemeja_bulanan']=' ';
							  $data['disabled_lap_tot_data_deff_kemeja_harian']=' ';
							  $data['disabled_lap_tot_data_deff_kemeja_bulanan']=' ';
							  $data['disabled_unggah_berkas']='disabled';
				break;
				case 'Kepala Bagian': $data['disabled_input_data_celana']='disabled';
							  $data['disabled_input_data_kemeja']='disabled';
							  $data['disabled_input_data_pengguna']='disabled';
							  
							  $data['disabled_cek_data_celana']=' ';
							  $data['disabled_cek_data_kemeja']=' ';
							  
							  $data['disabled_lap_celana_harian']=' ';
							  $data['disabled_lap_celana_bulanan']=' ';
							  $data['disabled_lap_tot_data_deff_celana_harian']=' ';
							  $data['disabled_lap_tot_data_deff_celana_bulanan']=' ';
							  $data['disabled_lap_kemeja_harian']=' ';
							  $data['disabled_lap_kemeja_bulanan']=' ';
							  $data['disabled_lap_tot_data_deff_kemeja_harian']=' ';
							  $data['disabled_lap_tot_data_deff_kemeja_bulanan']=' ';
							  $data['disabled_unggah_berkas']='disabled';
				break;
			}
			$data['nama'] = $this->session->userdata('nama_login');
			$data['hakases'] = $this->session->userdata('id_jenis_user');
			$this->render_page('home',$data);
	}
	

	
	
	
	
	
	
	
	
	
	
	#{ input_data_celana
	
	public function input_data_celana()
	{
			if(isset($_GET['grid']))
			echo $this->home_model->data_celana_getJson();
		else
			$this->render_page('input_data_celana');
	}

	public function create_input_data_celana()
	{
		if(!isset($_POST))	
			show_404();
		
		if($this->home_model->create_input_data_celana_tbl_sewing_qc())
						echo ' ';
		else
			echo json_encode(array('msg'=>'Gagal memasukkan data'));
		
		if($this->home_model->create_input_data_celana_tbl_garment())
						echo ' ';
		else
			echo json_encode(array('msg'=>'Gagal memasukkan data'));
		
		if($this->home_model->create_input_data_tbl_keterangan())
						echo ' ';
		else
			echo json_encode(array('msg'=>'Gagal memasukkan data'));
		
		if($this->home_model->create_input_data_celana_tbl_deffect_celana())
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Gagal memasukkan data'));
	}


	public function update_input_data_celana($id=null)
	{
		if(!isset($_POST))	
			show_404();
		
		if($this->home_model->update_input_data_celana_tbl_sewing_qc($id))
						echo ' ';
		else
			echo json_encode(array('msg'=>'Gagal mengubah data'));
		
		if($this->home_model->update_input_data_celana_tbl_garment($id))
						echo ' ';
		else
			echo json_encode(array('msg'=>'Gagal mengubah data'));
		
		if($this->home_model->update_input_data_tbl_keterangan($id))
						echo ' ';
		else
			echo json_encode(array('msg'=>'Gagal memasukkan data'));
		
		if($this->home_model->update_input_data_celana_tbl_deffect_celana($id))
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Gagal mengubah data'));
	}

	public function folow_input_data_celana($id=null)
	{
		if(!isset($_POST))	
			show_404();
		
		if($this->home_model->folow_input_data_celana($id))
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Gagal mengubah data'));
	}
	
	public function delete_input_data_celana()
	{
		if(!isset($_POST))	
			show_404();
		
		$id = intval(addslashes(substr($_POST['kodegarment'],2)));
		if($this->home_model->delete_input_data_celana($id))
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Gagal menghapus data'));
	}
	public function cek_data_celana()
	{
			if(isset($_GET['grid']))
			echo $this->home_model->cek_data_celana_getJson();
		else
			$this->render_page('cek_data_celana');
	}
	#input_data_celana}












	#{ input_data_kemeja
	public function input_data_kemeja()
	{
			if(isset($_GET['grid']))
			echo $this->home_model->data_kemeja_getJson();
		else
			$this->render_page('input_data_kemeja');
	}

	public function create_input_data_kemeja()
	{
		if(!isset($_POST))	
			show_404();
		
		if($this->home_model->create_input_data_kemeja_tbl_sewing_qc())
						echo ' ';
		else
			echo json_encode(array('msg'=>'Gagal memasukkan data'));
		
		if($this->home_model->create_input_data_kemeja_tbl_garment())
						echo ' ';
		else
			echo json_encode(array('msg'=>'Gagal memasukkan data'));
		
		if($this->home_model->create_input_data_tbl_keterangan())
						echo ' ';
		else
			echo json_encode(array('msg'=>'Gagal memasukkan data'));
		
		if($this->home_model->create_input_data_kemeja_tbl_deffect_kemeja())
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Gagal memasukkan data'));

	}


	public function update_input_data_kemeja($id=null)
	{
		if(!isset($_POST))	
			show_404();
		
		if($this->home_model->update_input_data_kemeja_tbl_sewing_qc($id))
						echo ' ';
		else
			echo json_encode(array('msg'=>'Gagal mengubah data'));
		
		if($this->home_model->update_input_data_kemeja_tbl_garment($id))
						echo ' ';
		else
			echo json_encode(array('msg'=>'Gagal mengubah data'));
		
		if($this->home_model->update_input_data_tbl_keterangan($id))
						echo ' ';
		else
			echo json_encode(array('msg'=>'Gagal memasukkan data'));
		
		if($this->home_model->update_input_data_kemeja_tbl_deffect_kemeja($id))
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Gagal mengubah data'));
	}

	public function folow_input_data_kemeja($id=null)
	{
		if(!isset($_POST))	
			show_404();
		
		if($this->home_model->folow_input_data_kemeja($id))
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Gagal mengubah data'));
	}
	
	public function delete_input_data_kemeja()
	{
		if(!isset($_POST))	
			show_404();
		
		$id = intval(addslashes(substr($_POST['kodegarment'],2)));
		if($this->home_model->delete_input_data_kemeja($id))
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Gagal menghapus data'));
	}

	public function cek_data_kemeja()
	{
			if(isset($_GET['grid']))
			echo $this->home_model->cek_data_kemeja_getJson();
		else
			$this->render_page('cek_data_kemeja');
	}
	#input_data_kemeja}
	












	#{ input_data_pengguna
	public function input_data_pengguna()
	{
			if(isset($_GET['grid']))
			echo $this->home_model->data_pengguna_getJson();
		else
			$this->render_page('input_data_pengguna');
	}

	public function create_input_data_pengguna()
	{
		if(!isset($_POST))	
			show_404();
		
		if($this->home_model->create_input_data_pengguna())
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Gagal memasukkan data'));
	}


	public function update_input_data_pengguna($id=null)
	{
		if(!isset($_POST))	
			show_404();
		
		if($this->home_model->update_input_data_pengguna($id))
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Gagal mengubah data'));
	}
	
	public function delete_input_data_pengguna()
	{
		if(!isset($_POST))	
			show_404();
		
		$id = intval(addslashes($_POST['id']));
		if($this->home_model->delete_input_data_pengguna($id))
			echo json_encode(array('success'=>true));
		else
			echo json_encode(array('msg'=>'Gagal menghapus data'));
	}
	
	#input_data_pengguna}
	












	public function lap_celana_harian()
	{
			$this->render_page('lap_celana_harian');
	}

	public function cetak_lap_celana_harian()
	{
        $data = array(
            'id' => '',
            'tanggal_awal' => $this->input->post('tanggal_awal')
             );
		// Lakukan pengerjaan PDF
		$this->pdf->AddPage('utf-8', 'A4-L');
		$this->pdf->load_view('print_lap_celana_harian', $data);
		$this->pdf->setFooter('{PAGENO} / {nb}');
		$this->pdf->WriteHTML(utf8_encode($html));
		$this->pdf->WriteHTML($html,1);
		$this->pdf->Output('Laporan Celana Harian '.$this->home_model->tanggal_indo($this->input->post('tanggal_awal'), true).' - PT. Sansan Saudaratex Jaya.pdf', 'I');
		
	}
	
	public function lap_celana_bulanan()
	{
			$this->render_page('lap_celana_bulanan');
	}
	
	public function cetak_lap_celana_bulanan()
	{
        $data = array(
            'id' => '',
            'tanggal_awal' => $this->input->post('tanggal_awal')
             );
		// Lakukan pengerjaan PDF
		$this->pdf->AddPage('utf-8', 'A4-L');
		$this->pdf->load_view('print_lap_celana_bulanan', $data);
		$this->pdf->setFooter('{PAGENO} / {nb}');
		$this->pdf->WriteHTML(utf8_encode($html));
		$this->pdf->WriteHTML($html,1);
		$this->pdf->Output('Laporan Celana Bulanan '.$this->home_model->tanggal_indo($this->input->post('tanggal_awal'), true).' - PT. Sansan Saudaratex Jaya.pdf', 'I');
		
	}
	
	
	public function lap_tot_data_deff_celana_harian()
	{
			$this->render_page('lap_tot_data_deff_celana_harian');
	}

	
	public function cetak_lap_tot_data_deff_celana_harian()
	{
        $data = array(
            'id' => '',
            'tanggal_awal' => $this->input->post('tanggal_awal'),
            'tanggal_akhir' => $this->input->post('tanggal_akhir')
             );
		// Lakukan pengerjaan PDF
		$this->pdf->AddPage('utf-8', 'A4-L');
		$this->pdf->load_view('print_lap_tot_data_deff_celana_harian', $data);
		$this->pdf->setFooter('{PAGENO} / {nb}');
		$this->pdf->WriteHTML(utf8_encode($html));
		$this->pdf->WriteHTML($html,1);
		$this->pdf->Output('Laporan Celana Bulanan '.$this->home_model->tanggal_indo($this->input->post('tanggal_awal'), true).' - PT. Sansan Saudaratex Jaya.pdf', 'I');
		
	}
	
	
	public function lap_tot_data_deff_celana_bulanan()
	{
			$this->render_page('lap_tot_data_deff_celana_bulanan');
	}

	
	public function cetak_lap_tot_data_deff_celana_bulanan()
	{
        $data = array(
            'id' => '',
            'tanggal_awal' => substr($this->input->post('tanggal_awal'), 5, 2)
             );
		// Lakukan pengerjaan PDF
		$this->pdf->AddPage('utf-8', 'A4-L');
		$this->pdf->load_view('print_lap_tot_data_deff_celana_bulanan', $data);
		$this->pdf->setFooter('{PAGENO} / {nb}');
		$this->pdf->WriteHTML(utf8_encode($html));
		$this->pdf->WriteHTML($html,1);
		$this->pdf->Output('Laporan Celana Bulanan '.$this->home_model->tanggal_indo($this->input->post('tanggal_awal'), true).' - PT. Sansan Saudaratex Jaya.pdf', 'I');
		
	}
	
	public function lap_kemeja_harian()
	{
			$this->render_page('lap_kemeja_harian');
	}

	public function cetak_lap_kemeja_harian()
	{
        $data = array(
            'id' => '',
            'tanggal_awal' => $this->input->post('tanggal_awal')
             );
		// Lakukan pengerjaan PDF
		$this->pdf->AddPage('utf-8', 'A4-L');
		$this->pdf->load_view('print_lap_kemeja_harian', $data);
		$this->pdf->setFooter('{PAGENO} / {nb}');
		$this->pdf->WriteHTML(utf8_encode($html));
		$this->pdf->WriteHTML($html,1);
		$this->pdf->Output('Laporan Kemeja Harian '.$this->home_model->tanggal_indo($this->input->post('tanggal_awal'), true).' - PT. Sansan Saudaratex Jaya.pdf', 'I');
	}

	public function lap_kemeja_bulanan()
	{
			$this->render_page('lap_kemeja_bulanan');
	}
	public function cetak_lap_kemeja_bulanan()
	{
        $data = array(
            'id' => '',
            'tanggal_awal' => $this->input->post('tanggal_awal')
             );
		// Lakukan pengerjaan PDF
		$this->pdf->AddPage('utf-8', 'A4-L');
		$this->pdf->load_view('print_lap_kemeja_bulanan', $data);
		$this->pdf->setFooter('{PAGENO} / {nb}');
		$this->pdf->WriteHTML(utf8_encode($html));
		$this->pdf->WriteHTML($html,1);
		$this->pdf->Output('Laporan Kemeja Bulanan '.$this->home_model->tanggal_indo($this->input->post('tanggal_awal'), true).' - PT. Sansan Saudaratex Jaya.pdf', 'I');
		
	}
	
	public function lap_tot_data_deff_kemeja_harian()
	{
			$this->render_page('lap_tot_data_deff_kemeja_harian');
	}

	public function cetak_lap_tot_data_deff_kemeja_harian()
	{
        $data = array(
            'id' => '',
            'tanggal_awal' => $this->input->post('tanggal_awal'),
            'tanggal_akhir' => $this->input->post('tanggal_akhir')
             );
		// Lakukan pengerjaan PDF
		$this->pdf->AddPage('utf-8', 'A4-L');
		$this->pdf->load_view('print_lap_tot_data_deff_kemeja_harian', $data);
		$this->pdf->setFooter('{PAGENO} / {nb}');
		$this->pdf->WriteHTML(utf8_encode($html));
		$this->pdf->WriteHTML($html,1);
		$this->pdf->Output('Laporan Kemeja Harian '.$this->home_model->tanggal_indo($this->input->post('tanggal_awal'), true).' - PT. Sansan Saudaratex Jaya.pdf', 'I');
		
	}
	
	public function lap_tot_data_deff_kemeja_bulanan()
	{
			$this->render_page('lap_tot_data_deff_kemeja_bulanan');
	}

	public function cetak_lap_tot_data_deff_kemeja_bulanan()
	{
        $data = array(
            'id' => '',
            'tanggal_awal' => substr($this->input->post('tanggal_awal'), 5, 2)
             );
		// Lakukan pengerjaan PDF
		$this->pdf->AddPage('utf-8', 'A4-L');
		$this->pdf->load_view('print_lap_tot_data_deff_kemeja_bulanan', $data);
		$this->pdf->setFooter('{PAGENO} / {nb}');
		$this->pdf->WriteHTML(utf8_encode($html));
		$this->pdf->WriteHTML($html,1);
		$this->pdf->Output('Laporan Kemeja Harian '.$this->home_model->tanggal_indo($this->input->post('tanggal_awal'), true).' - PT. Sansan Saudaratex Jaya.pdf', 'I');
		
	}

	public function setThemeAction()
	{
		$sess_data['theme'] = $this->input->post('theme');
		$this->session->set_userdata($sess_data);
		echo 'ya';
	}

	public function unggah_berkas()
	{
		$this->render_page('upload', array('error' => ' ' ));
	}
 
	public function aksi_upload(){
		$config['upload_path'] 			= './berkas/';
        $config['allowed_types'] 		='*'; 
        $config['encrypt_name'] 		= FALSE;
        
        $this->load->library('upload',$config);
	    if($this->upload->do_upload("file")){
	        $data = array('upload_data' => $this->upload->data());

	        $image= $data['upload_data']['file_name']; 
	        
	        $result= $this->home_model->simpan_upload($image);
	        echo json_decode($result);
        }

     }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('./');
	}
	
}

/* End of file crud.php */
/* Location: ./application/controllers/crud.php */