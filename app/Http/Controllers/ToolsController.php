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
        $this->info['tr']['title']="Decode (Çözümleme) Online ve Ücretsiz";
        $this->info['en']['title']="Online Decode Tool";
        $this->info['tr']['action']="Decode (Çözümleme)";
        $this->info['en']['action']="Decode Tool";
        $this->info['tr']['description']="Online ve ücretsiz decode (çözümleme) aracı.";
        $this->info['en']['description']="Online Decode Tool";
        $this->info['tr']['page']="Decode (Çözümleme)";
        $this->info['en']['page']="Decode Tool";



        return view("decode",['info' => $this->info[\App::getLocale()]]);
    }

    public function decodeType($type, Request $request){
        $decodedData = "";
        $raw = "";
       if($type === "base64Decode"){
            $this->info['tr']['title']="Base64 Decode (Çözümleme) Online ve Ücretsiz";
            $this->info['en']['title']="Online Base64 Decode Tool";
            $this->info['tr']['action']="Base64 Decode (Çözümleme)";
            $this->info['en']['action']="base64 Decode Tool";
            $this->info['tr']['description']="Online ve ücretsiz Base64 decode (çözümleme) aracı.";
            $this->info['en']['description']="Online Base64 Decode Tool";
            $this->info['tr']['page']="Base64 Decode (Çözümleme)";
            $this->info['en']['page']="Base64 Decode Tool";

            $decodedData = ($request->decodeString != null) ? base64_decode($request->decodeString) : "" ;
            $raw = ($request != null) ? $request->decodeString : "";
        }else if($type === "urlDecode"){
            $this->info['tr']['title']="URL Decode (Çözümleme) Online ve Ücretsiz";
            $this->info['en']['title']="Online URL Decode Tool";
            $this->info['tr']['action']="URL Decode (Çözümleme)";
            $this->info['en']['action']="URL Decode Tool";
            $this->info['tr']['description']="Online ve ücretsiz URL decode (çözümleme) aracı.";
            $this->info['en']['description']="Online URL Encode Tool";
            $this->info['tr']['page']="URL Decode (Çözümleme)";
            $this->info['en']['page']="URL Decode Tool";

            $decodedData = ($request->decodeString != null) ? urlDecode($request->decodeString) : "" ;
            $raw = ($request != null) ? $request->decodeString : "";
        }else if($type === "sha256Decode"){
            $this->info['tr']['title']="SHA-256 Decode (Çözümleme) Online ve Ücretsiz";
            $this->info['en']['title']="Online SHA-256 Decode Tool";
            $this->info['tr']['action']="SHA-256 Decode (Çözümleme)";
            $this->info['en']['action']="SHA-256 Decode Tool";
            $this->info['tr']['description']="Online ve ücretsiz SHA-256 decode (çözümleme) aracı.";
            $this->info['en']['description']="Online SHA-256 Decode Tool";
            $this->info['tr']['page']="SHA-256 Decode (Şifreleme)";
            $this->info['en']['page']="SHA-256 Decode Tool";

            $decodedData = ($request->decodeString != null) ? hash('sha256',$request->decodeString) : "" ;
            $raw = ($request != null) ? $request->decodeString : "";
        }else if($type === "sha1Decode"){
            $this->info['tr']['title']="SHA-1 Decode (Çözümleme) Online ve Ücretsiz";
            $this->info['en']['title']="Online SHA-1 Encode Tool";
            $this->info['tr']['action']="SHA-1 Decode (Çözümleme)";
            $this->info['en']['action']="SHA-1 Decode Tool";
            $this->info['tr']['description']="Online ve ücretsiz SHA-1 decode (çözümleme) aracı.";
            $this->info['en']['description']="Online SHA-1Encode Tool";
            $this->info['tr']['page']="SHA-1 Decode (Çözümleme)";
            $this->info['en']['page']="SHA-Decode Tool";

            $decodedData = ($request->decodeString != null) ? sha1($request->decodeString) : "" ;
            $raw = ($request != null) ? $request->decodeString : "";
        }
        return view("decoders.decoder", ['info' => $this->info[\App::getLocale()],'data' => $decodedData,'raw' => $raw,'type' => $type]);

    }

    public function stringOneLiner(){
        $this->info['tr']['title']="Yazıyı tek satır yapma aracı";
        $this->info['en']['title']="Online String one liner";
        $this->info['tr']['action']="Tek Satır Yap";
        $this->info['en']['action']="String One Liner";
        $this->info['tr']['description']="Online ücretsiz yazıyı tek satır yapma aracı.";
        $this->info['en']['description']="Online free tool to make your string one line";
        $this->info['tr']['page']="Tek Satır Yap";
        $this->info['en']['page']="String One Liner";

        return view("string",['info' => $this->info[$this->locale]]);
    }

    public function mxEntryCheck(Request $request){
        
        $this->info['tr']['title']="MX Entry Kontrolü";
        $this->info['en']['title']="Check MX Entries";
        $this->info['tr']['action']="Mx Kayıtları";
        $this->info['en']['action']="MX Entry";
        $this->info['tr']['description']="Online ücretsiz mx entry kayıtları";
        $this->info['en']['description']="Online free tool to check mx entries";
        $this->info['tr']['page']="MX Kayıtları";
        $this->info['en']['page']="MX Entry";


        $mx = "";
        if(isset($request->domain)){
            $mx = shell_exec("dig mx ".$request->domain);
            $mx = str_replace(";;",";;<br/><br/>",$mx);
            $mx = str_replace("AUTHORITY SECTION:","<strong>AUTHORITY SECTION:",$mx);
            $mx = str_replace("Query time:","</strong>Query time:",$mx);
        }
        return view("mx",['info' => $this->info[$this->locale],'mx' => $mx]);
    }
}
