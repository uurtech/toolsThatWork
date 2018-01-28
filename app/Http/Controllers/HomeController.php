<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $info = array();
    public function index(){
        $this->info['tr']['title']="Online İşe Yarayan Araçlar";
        $this->info['en']['title']="Tools That Work";
        $this->info['tr']['action']="İşe Yarayan Araçlar";
        $this->info['en']['action']="Tools That work";
        $this->info['tr']['description']="Online ve ücretsiz kullanabileceğiniz araçlar.";
        $this->info['en']['description']="Online free tools that work for you";
        $this->info['tr']['page']="İşe Yarayan Araçlar";
        $this->info['en']['page']="Tools that work";
        return view("welcome",['info' => $this->info[\App::getLocale()]]);
    }

    public function About(){
        $this->info['tr']['title']="Online İşe Yarayan Araçlar - Hakkında";
        $this->info['en']['title']="Tools That Work - About ";
        $this->info['tr']['action']="İşe Yarayan Araçlar - Hakkında";
        $this->info['en']['action']="Tools That work - About";
        $this->info['tr']['description']="Online ve ücretsiz kullanabileceğiniz araçlar hakkında";
        $this->info['en']['description']="Online free tools that work for you - about";
        $this->info['tr']['page']="İşe Yarayan Araçlar - Hakkında";
        $this->info['en']['page']="Tools that work - About";    
        
        return view("about",['info' => $this->info[\App::getLocale()]]);
    
    }

    public function Service(){
        return "service";
    }

    public function Request(){
        $this->info['tr']['title']="Online İşe Yarayan Araçlar - İletişim";
        $this->info['en']['title']="Tools That Work - Request ";
        $this->info['tr']['action']="İşe Yarayan Araçlar - İletişim";
        $this->info['en']['action']="Tools That work - Request";
        $this->info['tr']['description']="Online ve ücretsiz kullanabileceğiniz araçlar iletişim";
        $this->info['en']['description']="Online free tools that work for you - request";
        $this->info['tr']['page']="İşe Yarayan Araçlar - iletişim";
        $this->info['en']['page']="Tools that work - request";    
        
        return view("request",['info' => $this->info[\App::getLocale()]]);
    }
}
