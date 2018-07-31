<?php
Class Laporan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    function index(){
		$graphLink = 'Laporan/graphPage?id=1&d1=1&d2=2&d3=3&d4=4&d5=5'; // create a new file, you can pass parameter to it also.
		$data['chart'] = $graphLink;
		$data['tanggal_awal'] = $this->input->post('tanggal_awal');
		$data['tanggal_akhir'] = $this->input->post('tanggal_akhir');
		$this->pdf->load_view('print_lap_celana_bulanan', $data);
		$this->pdf->setFooter('{PAGENO} / {nb}');
		$this->pdf->WriteHTML(utf8_encode($html));
		$this->pdf->WriteHTML($html,1);
		$this->pdf->AddPage('utf-8','A4-P');
		$this->pdf->Output('Laporan Celana Bulanan '.$this->home_model->tanggal_indo($this->input->post('tanggal_awal'), true).' - PT.SANSAN SAUDARATEX JAYA', 'I');
    }
	
function graphPage()
{
require_once(dirname(__FILE__) . './../third_party/mpdf60/jpgraph/jpgraph.php');
require_once(dirname(__FILE__) . './../third_party/mpdf60/jpgraph/jpgraph_pie.php');
require_once(dirname(__FILE__) . './../third_party/mpdf60/jpgraph/jpgraph_pie3d.php');

$id = $_GET['id'];
$d1 = $_GET['d1'];
$d2 = $_GET['d2'];
$d3 = $_GET['d3'];
$d4 = $_GET['d4'];
$d5 = $_GET['d5'];
$dt = $_GET['dt'];
// Some data
$data = array($d1,$d2,$d3,$d4,$d5);

// Create the Pie Graph. 
$graph = new PieGraph(300,200);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot

// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(1);
$graph->Stroke();
	}
}