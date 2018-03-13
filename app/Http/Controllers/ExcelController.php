<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



class ExcelController extends Controller
{
    public function index(){
        return view("excel");
    }
    public function upload(Request $request){
        

        $dosya  = $request->file;
        $target = $_FILES["file"]["tmp_name"];
        $dosya  = time().pathinfo($target,PATHINFO_EXTENSION);
        $hedef  = "/uploads/" . $dosya;
      
        if(move_uploaded_file($_FILES['file']['name'], $hedef)){
            echo json_encode("true");
        }else{
            echo json_decode("false");
        }
      
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        
        // $reader->setReadDataOnly(TRUE);
        // $spreadsheet = $reader->load("test.xlsx");

        // $worksheet = $spreadsheet->getActiveSheet();

        // foreach ($worksheet->getRowIterator() as $row) {
            
        //     $cellIterator = $row->getCellIterator();
        //     $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
        //     foreach ($cellIterator as $cell) {

        //             $cell->getValue();
            
        //     }   
        // }
    }
}
