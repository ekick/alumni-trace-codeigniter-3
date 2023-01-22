<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->user = $this->session->userdata('user');
		if (empty($this->user)) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"><i class="fas fa-exclamation-triangle"> Anda harus login terlebih dahulu!</i></div>');
			redirect('login');
		} elseif ($this->user['role_id'] != 1) {
			redirect('home');
		} 

        $this->load->model('M_admin');
        $this->record = $this->M_admin->ambildata();

        $this->load->library('Pdf');
        $this->load->library('excel');
	}

    private $record;
    private $user;
    
    private function content($name)
	{
        $data['dataopr'] = null;
        $data['jurusan'] = null;
        $data['kegiatan'] = null;
        $data['user'] = $this->user;
        switch ($name) {
            case 'dashboard':
                $data['jurusan'] = [
                    'AKL' => $this->M_admin->ambiljurusan('1'),
                    'OTKP' => $this->M_admin->ambiljurusan('2'),
                    'BDP' => $this->M_admin->ambiljurusan('3'),
                    'TKJ' => $this->M_admin->ambiljurusan('4'),
                    'RPL' => $this->M_admin->ambiljurusan('5'),
                    'MM' => $this->M_admin->ambiljurusan('6'),
                    'APL' => $this->M_admin->ambiljurusan('7'),
                    'UPW' => $this->M_admin->ambiljurusan('8'),
                    'PSPR' => $this->M_admin->ambiljurusan('9'),
                    'PSPT' => $this->M_admin->ambiljurusan('10')
                ];
                $data['kegiatan'] = [
                    'Bekerja' => $this->M_admin->data_kegiatan('1'),
                    'Kuliah' => $this->M_admin->data_kegiatan('2'),
                    'Wirausaha' => $this->M_admin->data_kegiatan('3'),
                    'Option' => $this->M_admin->data_kegiatan('4')
                ];
                $data['jumlah'] = $this->M_admin->jumlah();
                break;
            case 'tables':
                $data['dataopr'] =  $this->record;
                break;
            default:
                break;
        }
        
		$data['title'] = 'Halaman '.ucfirst($name);
		$data['content_page'] = "admin/v_".$name;
		echo Modules::run('template/loadTemplate', $data);
	}
	
	public function index()
	{
        $this->content('dashboard');
	}

    public function tables()
    {
        $this->content('tables');
    }

    public function dashboard()
    {
        $this->content('dashboard');
    }

    public function html_to_excel()
    {
        $data['dataopr'] =  $this->record;
        $this->load->view('Admin/html_to_excel',$data);
    }

    function pdf()
    {
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('L', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'DAFTAR ALUMNI', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(5, 6, 'No', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Nis', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Alamat', 1, 0, 'C');
        $pdf->Cell(30, 6, 'No HP', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Jenis Kelamin', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Angkatan', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Jurusan', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Kegiatan', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $alumni = $this->M_admin->dataalumni();
        $no = 0;
        foreach ($alumni as $data) {
            $no++;
            $pdf->Cell(5, 6, $no, 1, 0, 'C');
            $pdf->Cell(20, 6, $data->nis, 1, 0);
            $pdf->Cell(50, 6, $data->nama, 1, 0);
            $pdf->Cell(50, 6, $data->alamat, 1, 0);
            $pdf->Cell(30, 6, $data->no_hp, 1, 0);
            $pdf->Cell(40, 6, $data->j_kelamin, 1, 0);
            $pdf->Cell(20, 6, $data->tahun_angkatan, 1, 0);
            $pdf->Cell(20, 6, $data->nama_jurusan, 1, 0);
            $pdf->Cell(20, 6, $data->nama_kegiatan, 1, 1);
        }
        $pdf->Output();
    }

    public function import_excel(){
        try {
            //code...
        
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();	
				for($row=2; $row<=$highestRow; $row++)
				{
					$nis = $worksheet->getCellByColumnAndRow(1, $row)->getCalculatedValue();
					$nama = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$no_hp = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$j_kelamin = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$angkatan = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$jurusan = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$temp_data[] = array(
						'nis'	    => $nis,
						'nama'   => $nama,
						'no_hp'	=> $no_hp,
						'j_kelamin'	=> $j_kelamin,
						'tahun_angkatan'	=> $angkatan,
						'id_jurusan'	=> $jurusan
					); 	
				}
			}
			
			$insert = $this->M_admin->insert($temp_data);
			if($insert){
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan Database');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Masukkan File!!');
				redirect($_SERVER['HTTP_REFERER']);
		}
    } catch (\Throwable $th) {
        $this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Masukkan File!!');
        redirect($_SERVER['HTTP_REFERER']);
    }

	}
}
