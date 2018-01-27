<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends Controller
{

    public $info = array();
    public $locale ="";
    public function __construct(){
        $this->locale = \App::getLocale();
    }
    public function raffle(Request $request){
        $this->info['tr']['title']="Çekiliş Aracı Online ve Ücretsiz";
        $this->info['en']['title']="Online Raffle Tool";
        $this->info['tr']['action']="Çekiliş Aracı";
        $this->info['en']['action']="Online Raffle";
        $this->info['tr']['description']="Online ve ücretsiz çekiliş aracı, kazananı rahatlıkla belirleyin";
        $this->info['en']['description']="Raffle tool for free, find your winner only doing copy/paste";
        $this->info['tr']['page']="Çekiliş Aracı";
        $this->info['en']['page']="Raffle Tool";
        
        if(empty($request->winner)){
                     return view("raffle",['info' => $this->info[$this->locale]]);
        };

        $winnerCount = $request->winner;
        $datasArray = explode("\n",$request->data);
        $lineCount = count($datasArray);
        $temp = array();

        $selected = array();
        for($i = 0; $i < $winnerCount; $i++){
            
            $winnerSelect = rand(0,$lineCount-1);
           
            if(count($temp) > 0){
                foreach($temp as $t){
                    if($t === $winnerSelect){
                        $i--;
                        continue;
                    }
                }
            }
 
            array_push($temp,(int)$winnerSelect);
            array_push($selected,$datasArray[$winnerSelect]);
        }

        return view("raffle",['info' => $this->info[$this->locale], 'datas' => $selected]);

    }
    public function password(Request $request){
        $this->info['tr']['title']="Güçlü Şifre Online ve Ücretsiz";
        $this->info['en']['title']="Online Strong Password Generator Tool";
        $this->info['tr']['action']="Şifre Oluşturucu";
        $this->info['en']['action']="Password Generator";
        $this->info['tr']['description']="Online ve ücretsiz güçlü şifre oluşturma aracı.";
        $this->info['en']['description']="Online Strong Password Generate Tool";
        $this->info['tr']['page']="Şifre Oluşturucu";
        $this->info['en']['page']="Strong Password Generator Tool";

        
        if(empty($request->passwordLength)){
            return view("password",['info' => $this->info[\App::getLocale()]]);
        }

        $charLimit = $request->passwordLength;
        $symbols = "!'^+%&/()=?_-*\"\\\${[]}";
        $numbers = "1234567890";
        $lowerCase = "qwertyuopasdfghjklizxcvbnm";
        $upperCase = "QWERTYUIOPASDFGHJKLZXCVBNM";
        $generatedPassword = "";
        $passwordString = "";

        if($request->includeSymbols){
            $passwordString .= $symbols;
        }
        if($request->includeNumbers){
            $passwordString .= $numbers;
        }
        if($request->includeLowerCase){
            $passwordString .= $lowerCase;
        }
        if($request->includeUpperCase){
            $passwordString .= $upperCase;
        }
        $passwordString = str_split($passwordString);
        $charCount = count($passwordString) -1;
        
        for($i = 0 ; $i < $charLimit ; $i++){
            $generatedPassword .= $passwordString[rand(0,$charCount)];
        }
        
        return view("password",['info' => $this->info[\App::getLocale()],'generatedPassword' => $generatedPassword]);

    }
}
