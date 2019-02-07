<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Keyword;


use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

class KeywordsController extends Controller
{

    public function index()
    {
        $date = date('Y-m-d');

        $keywords = Keyword::whereDate('check_date', '=', $date)-> paginate(20);    // gdates からcheck_date順に20個ずつ取り出し
        
        return view('keywords.index', [
            'keywords' => $keywords,
        ]);
    }


    public function create()
    {
        $keyword = new Keyword;
        
        return view('keywords.create', [
            'keyword' => $keyword,
        ]);
    }


    public function store(Request $request)
    {
        $this-> validate($request, [            // ユーザが意図しない入力した場合の対処
            'keyword' => 'required|max:255',
            'site_name' => 'required|max:255',
            'site_url' => 'required|max:255',
        ]);
        
        $keyword = new Keyword;
        $keyword->keyword = $request->keyword;
        $keyword->site_name = $request->site_name;
        $keyword->site_url = $request->site_url;
        $keyword->save();
        
        return redirect('/');                   // store アクションはキーワードを新規作成したあと、 / へリダイレクトさせているので、View は不要
        
    }


    public function show($id)
    {
        $keyword = Keyword::find($id);
        
        return view('keywords.show', [
            'keyword' => $keyword,
        ]);
    }


    public function edit($id)
    {
        $keyword = Keyword::find($id);
        
        return view('keywords.edit', [
            'keyword' => $keyword,
        ]);
    }


    public function update(Request $request, $id)
    {
        $this-> validate($request, [            // ユーザが意図しない入力した場合の対処
            'keyword' => 'required|max:255',
            'site_name' => 'required|max:255',
            'site_url' => 'required|max:255',
        ]);
        
        $keyword = Keyword::find($id);
        $keyword->keyword = $request->keyword;
        $keyword->site_name = $request->site_name;
        $keyword->site_url = $request->site_url;
        $keyword->save();
        
        return redirect('/');                   // update アクションはキーワードを新規作成したあと、 / へリダイレクトさせているので、View は不要
        
    }


    public function destroy($id)
    {
        $keyword = Keyword::find($id);                                  // $id で検索
        $keyword->delete();
        
        return redirect('/');               // destroy アクションはメッセージを新規作成したあと、 / へリダイレクトさせているので、View は不要
                
    }
    
    
    public function showimportKeyword()
  {
 
     return view('gdatas.showimportKeyword');
 
  }
 

  public function importKeyword(Request $request) {
 
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
                    $arr['site_name'] = $v;
                    break;
     
                    case 1:
                    $arr['site_url'] = $v;
                    break;
    
                 	case 2:
                	$arr['keyword'] = $v;
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
    Keyword::insert($data);
    
    $request->session()->flash('message', '登録したよん');
    return redirect('showimportKeyword');
    
  }

    
}
