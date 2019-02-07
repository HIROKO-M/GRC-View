<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Gdata;


use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

class GdatasController extends Controller
{
    public function showImportCSV()
  {
 
     return view('gdatas.showImportCSV');
 
  }
 
 
 
  public function importCSV(Request $request) {
 
     //postで受け取ったcsvファイルデータ
    $file = $request->file('file');
 
    //Goodby CSVのconfig設定
    $config = new LexerConfig();
    $interpreter = new Interpreter();
    $lexer = new Lexer($config);
 
    //CharsetをUTF-8に変換
    $config->setToCharset("UTF-8");
    $config->setFromCharset("sjis-win");
 
    $rows = array();
 
    $interpreter->addObserver(function(array $row) use (&$rows) {
         $rows[] = $row;
    });
 
    // CSVデータをパース
    $lexer->parse($file, $interpreter);
 
    $data = array();
 

        // CSVのデータを配列化
        foreach ($rows as $key => $value) {
            
            $arr = array();
            
            foreach ($value as $k => $v) {
                
                switch ($k) {

             	    case 0:
                    $arr['grc_site_name'] = $v;
                    break;
     
                    case 1:
                    $arr['grc_site_url'] = $v;
                    break;
    
                 	case 2:
                	$arr['grc_keyword'] = $v;
                	break;
     
                 	case 3:
                	$arr['y_rank'] = $v;
                	break;
 
                 	case 4:
                	$arr['y_change'] = $v;
                	break;
 
                 	case 5:
                	$arr['y_count'] = $v;
                	break;
 
                 	case 6:
                	$arr['y_url'] = $v;
                	break;
 
                  	case 7:
                	$arr['check_date'] = $v;
                	break;
            	
                	default:
                	break;
                }
            }
 
            $data[] = $arr;

        }
    
 
    // DBに一括保存
    Gdata::insert($data);
    
    $request->session()->flash('message', '登録したでござる');
    return redirect('showImportCSV');
    
  }

}