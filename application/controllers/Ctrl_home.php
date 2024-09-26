<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Ctrl_home extends CI_Controller {
    public function __construct() {
            parent::__construct();
      $this->load->helper('url');
      $this->load->model("model_home");
      $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
      $this->load->library(array('session','pagination','form_validation'));
    } 
  
  public function index()
  {
    if(!empty($this->session->userdata('username'))){
      $this->load->view('home');
    }else{
      redirect('login');
    }
  	
  }
public function dashboard()
	{
	$this->load->view('home');	
	}
public function grafikal()
	{
	$this->load->view('grafikal');	
	}
public function datasiswa()
	{
	$this->load->view('datasiswa');	
	}	
public function tentang()
	{
	$this->load->view('tentang');	
	}
	
  public function cari(){
    $cari = $this->input->post('cari');
    $data['table'] = $this->model_home->limit_cari($cari);
    $this->load->view('table',$data); 
  }

  public function isi_table()
  {
      $data['table'] = $this->model_home->limit();
      $this->load->view('table',$data);
   
    
  }

  public function dataedit(){
   $id= $this->input->post('id');
   $data['table'] = $this->model_home->dataedit($id);
	 $this->load->view('edit',$data);  

  }

   public function hapus(){
    $id= $this->input->post('id');
    $this->model_home->hapus($id);

  }

  public function update(){
    $id= $this->input->post('id');
    $update = array(
                'nama' => $this->input->post('nama'),
                'kelas' => $this->input->post('kelas')
              );

  $this->model_home->edit($id,$update);

  }

  public function tambah(){
    $data = array(
                'nama' => $this->input->post('nama'),
                'kelas' => $this->input->post('kelas')
              );

  $this->model_home->add($data);

  }


  public function cetak_pdf(){
    $CI =& get_instance();
        
    $CI->load->library('pdf');
                
    $CI->pdf->AddPage('P','A4');
        
    $date = date('d-m-Y');        
    
    $CI->pdf->SetFont('Arial','B',10);       
    $CI->pdf->Cell(150,5,'Laporan',0,0,'L');
    $CI->pdf->SetFont('Arial','',10);  
    $CI->pdf->Cell(40,5,'Tgl : '.$date,0,0,'R');
    $CI->pdf->Ln(10);


    $CI->pdf->SetFont('Arial','B',9);
    $CI->pdf->Cell(20,6,'No',1,0,'C');
    $CI->pdf->Cell(110,6,'Nama',1,0,'C');
    $CI->pdf->Cell(60,6,'Kelas',1,0,'C');
    $CI->pdf->Ln();

    $no=1;
    foreach ($this->model_home->limit()->result() as $key) {
      $CI->pdf->SetFont('Arial','',8);
      $CI->pdf->Cell(20,6,$no,1,0,'C');
      $CI->pdf->Cell(110,6,$key->nama,1,0,'L');
      $CI->pdf->Cell(60,6,$key->kelas,1,0,'C');
      $CI->pdf->Ln();
    $no++;
    }

    $CI->pdf->Output('Laporan'.'.pdf','D');
  }

  public function cetak_excel(){
      
        $ambildata = $this->model_home->limit();

         
        if(count($ambildata)>0){
            $objPHPExcel = new PHPExcel();
          
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
            $objget->setTitle('Laporan'); //sheet title
             
            $objget->getStyle("A5:C5")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '92d050')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );
 
            //table header
            $cols = array("A","B","C");
             
            $val = array("No","Nama","Kelas");
             
            for ($a=0;$a<3; $a++) 
            {
                $objset->setCellValue($cols[$a].'5', $val[$a]);
                 
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Kontak
             
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
            }
             
            $baris  = 6; $no=1;
            foreach ($ambildata->result() as $frow){
                 
                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A".$baris, $frow->nama); //membaca data nama
                $objset->setCellValue("B".$baris, $frow->kelas); //membaca data alamat
                $objset->setCellValue("C".$baris, $frow->id); //membaca data kontak
                 
                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                 
                $baris++; $no++;
            }
      
            $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Laporan');
            $objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);        
            $objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setSize(18);  
            $objPHPExcel->getActiveSheet()->setCellValue('A4', 'TANGGAL :'."".date("Y-m-d"));
            $objPHPExcel->getActiveSheet()->getStyle('A4')->getFont()->setBold(true);        
            $objPHPExcel->getActiveSheet()->getStyle('A4')->getFont()->setSize(13);
             
            $objPHPExcel->getActiveSheet()->setTitle('Data Export');
 
            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Laporan_excel.xls");
               
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache
 
            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5'); 
            ob_end_clean();
            ob_start();               
            $objWriter->save('php://output');
        }else{
            redirect('Excel');
        }
    }

}