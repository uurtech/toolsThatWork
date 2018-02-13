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
    

    public function encode(){
        $this->info['tr']['title']="Encode (Şifreleme) Online ve Ücretsiz";
        $this->info['en']['title']="Online Encode Tool";
        $this->info['tr']['action']="Encode (Şifreleme)";
        $this->info['en']['action']="Encode Tool";
        $this->info['tr']['description']="Online ve ücretsiz encode (şifreleme) aracı.";
        $this->info['en']['description']="Online Encode Tool";
        $this->info['tr']['page']="Encode (Şifreleme)";
        $this->info['en']['page']="Encode Tool";
        
        

        return view("encode",['info' => $this->info[\App::getLocale()]]);
    }

    public function encodeType($type, Request $request){
        $encodedData = "";
        $raw = "";

        if($type === "md5Encode"){
            $this->info['tr']['title']="MD5 Encode (Şifreleme) Online ve Ücretsiz";
            $this->info['en']['title']="Online MD5 Encode Tool";
            $this->info['tr']['action']="MD5 Encode (Şifreleme)";
            $this->info['en']['action']="MD5 Encode Tool";
            $this->info['tr']['description']="Online ve ücretsiz MD5 encode (şifreleme) aracı.";
            $this->info['en']['description']="Online MD5 Encode Tool";
            $this->info['tr']['page']="MD5 Encode (Şifreleme)";
            $this->info['en']['page']="MD5 Encode Tool";
            $encodedData = ($request->encodeString != null) ? md5($request->encodeString) : "" ;
            $raw = ($request != null) ? $request->encodeString : "";
        }else if($type === "base64Encode"){
            $this->info['tr']['title']="Base64 Encode (Şifreleme) Online ve Ücretsiz";
            $this->info['en']['title']="Online Base64 Encode Tool";
            $this->info['tr']['action']="Base64 Encode (Şifreleme)";
            $this->info['en']['action']="base64 Encode Tool";
            $this->info['tr']['description']="Online ve ücretsiz Base64 encode (şifreleme) aracı.";
            $this->info['en']['description']="Online Base64 Encode Tool";
            $this->info['tr']['page']="Base64 Encode (Şifreleme)";
            $this->info['en']['page']="Base64 Encode Tool";

            $encodedData = ($request->encodeString != null) ? base64_encode($request->encodeString) : "" ;
            $raw = ($request != null) ? $request->encodeString : "";
        }else if($type === "urlEncode"){
            $this->info['tr']['title']="URL Encode (Şifreleme) Online ve Ücretsiz";
            $this->info['en']['title']="Online URL Encode Tool";
            $this->info['tr']['action']="URL Encode (Şifreleme)";
            $this->info['en']['action']="URL Encode Tool";
            $this->info['tr']['description']="Online ve ücretsiz URL encode (şifreleme) aracı.";
            $this->info['en']['description']="Online URL Encode Tool";
            $this->info['tr']['page']="URL Encode (Şifreleme)";
            $this->info['en']['page']="URL Encode Tool";

            $encodedData = ($request->encodeString != null) ? urlencode($request->encodeString) : "" ;
            $raw = ($request != null) ? $request->encodeString : "";
        }else if($type === "sha256Encode"){
            $this->info['tr']['title']="SHA-256 Encode (Şifreleme) Online ve Ücretsiz";
            $this->info['en']['title']="Online SHA-256 Encode Tool";
            $this->info['tr']['action']="SHA-256 Encode (Şifreleme)";
            $this->info['en']['action']="SHA-256 Encode Tool";
            $this->info['tr']['description']="Online ve ücretsiz SHA-256 encode (şifreleme) aracı.";
            $this->info['en']['description']="Online SHA-256 Encode Tool";
            $this->info['tr']['page']="SHA-256 Encode (Şifreleme)";
            $this->info['en']['page']="SHA-256 Encode Tool";

            $encodedData = ($request->encodeString != null) ? hash('sha256',$request->encodeString) : "" ;
            $raw = ($request != null) ? $request->encodeString : "";
        }else if($type === "sha1Encode"){
            $this->info['tr']['title']="SHA-1 Encode (Şifreleme) Online ve Ücretsiz";
            $this->info['en']['title']="Online SHA-1 Encode Tool";
            $this->info['tr']['action']="SHA-1 Encode (Şifreleme)";
            $this->info['en']['action']="SHA-1 Encode Tool";
            $this->info['tr']['description']="Online ve ücretsiz SHA-1 encode (şifreleme) aracı.";
            $this->info['en']['description']="Online SHA-1Encode Tool";
            $this->info['tr']['page']="SHA-1 Encode (Şifreleme)";
            $this->info['en']['page']="SHA-1Encode Tool";

            $encodedData = ($request->encodeString != null) ? sha1($request->encodeString) : "" ;
            $raw = ($request != null) ? $request->encodeString : "";
        }

        return view("encoders.encoder", ['info' => $this->info[\App::getLocale()],'data' => $encodedData,'raw' => $raw,'type' => $type]);
    }

    public function decode(){
        $this->info['tr']['title']="Encode (Şifreleme) Online ve Ücretsiz";
        $this->info['en']['title']="Online Encode Tool";
        $this->info['tr']['action']="Encode (Şifreleme)";
        $this->info['en']['action']="Encode Tool";
        $this->info['tr']['description']="Online ve ücretsiz encode (şifreleme) aracı.";
        $this->info['en']['description']="Online Encode Tool";
        $this->info['tr']['page']="Encode (Şifreleme)";
        $this->info['en']['page']="Encode Tool";
        
        
        return view("decode",['info' => $this->info[\App::getLocale()]]);
    }
}
