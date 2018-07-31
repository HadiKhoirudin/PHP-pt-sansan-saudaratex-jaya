<?php // content="text/plain; charset=utf-8"
require_once ('./../../third_party/mpdf60/jpgraph/jpgraph.php');
require_once ('./../../third_party/mpdf60/jpgraph/jpgraph_pie.php');
require_once ('./../../third_party/mpdf60/jpgraph/jpgraph_pie3d.php');

// Some data
$data = array(40,60,21,33);

// Create the Pie Graph. 
$graph = new PieGraph(350,250);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("A Simple 3D Pie Plot");

// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(1);
$graph->Stroke();

?>