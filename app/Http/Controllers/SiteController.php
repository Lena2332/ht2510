<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SiteController extends Controller
{
    protected $template;
    protected $meta_title = "";
    protected $meta_desc = "";
    protected $meta_image = "";
    public $sections = array("instruction"=>"Инструкции","metodology"=>"Методология");
    protected $vars = array();
    protected $leftBar = FALSE;
    
    public function __construct(){
        
    }
    
    protected function renderOutput(){
        
        $topmenu = $this->getMenu();
        $menu = view(env('THEME').'.menu')->with('topmenu',$topmenu)->render();
        $this->vars = array_add($this->vars,'menu',$menu);
        $this->vars = array_add($this->vars,'metaTitle', $this->meta_title);
        $this->vars = array_add($this->vars,'metaDesc', $this->meta_desc);
        $this->vars = array_add($this->vars,'metaImg', $this->meta_image);
        return view($this->template)->with($this->vars);
    }
    
    protected function getMenu(){
         $topmenu =  \Menu::make('TopMenu',function($menu){
              $menu->add('Главная');
              $menu->add('Конструктор персональных калькуляторов','#');
                $menu->get('konstruktorPersonalnykhKalkulyatorov')->add('Инструкция','instruction');
                $menu->get('konstruktorPersonalnykhKalkulyatorov')->add('Методология','metodology');
              $menu->add('Приобрести', 'buy');
              $menu->add('Контакты', 'contacts');
        
            });
       
          return $topmenu;
    }
    
    protected function addMeta($title="", $desc="", $img =""){
            $this->meta_title = $title;
            $this->meta_desc = $desc;
            $this->meta_image = $img;
    }
}
