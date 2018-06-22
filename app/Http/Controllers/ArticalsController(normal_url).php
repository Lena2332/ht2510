<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Categorie;

class ArticalsController  extends SiteController
{
    protected $category = "";
    protected $slug = "";
    protected $slug1 = "";
    protected $slug2 = "";
    protected $slug3 = "";
    
    public function __construct(){
        
        parent::__construct();
        
        $this->template = env('THEME').'.articals';
    }
    
    public function showAllArticles($category){
       $this->category = $category;
       
       $leftMenu = $this->getLeftMenu();
       
       $ArticalsSectionArr = array('LeftMenu'=>$leftMenu, 'mainSection'=>$this->sections[$this->category]);
       $as = view(env('THEME').'.ArticalsSection')->with($ArticalsSectionArr)->render();
       $this->vars = array_add($this->vars, 'ArticalsSection', $as);
       
       $this->vars = array_add($this->vars, 'mainSection', $this->sections[$this->category]);
       
      //  dd($this->vars);
       return $this->renderOutput();
    }
    
    public function showArticle($category, $slug, $slug2 = null, $slug3 = null){
       $this->category = $category;
       $this->slug = $slug;
       $this->slug2 = $slug2;
       $this->slug3 = $slug3;
       $this->vars = array_add($this->vars, 'mainSection', $this->sections[$this->category]);
       
       $main_category = Categorie::whereRaw("slug ='".$slug."'  AND find_in_set('off',`option`) = 0")->get();
       
       $leftMenu = $this->getLeftMenu();
       
       $ArticalsSectionArr = array('LeftMenu'=>$leftMenu, 'mainSection'=>$this->sections[$this->category]);
       $as = view(env('THEME').'.ArticalsSection')->with($ArticalsSectionArr)->render();
       $this->vars = array_add($this->vars, 'ArticalsSection', $as);
       return $this->renderOutput();
    }
    
    protected function getLeftMenu(){
       $categories = Categorie::whereRaw("find_in_set('".$this->category."',`option`)")->orderBy('level', 'asc')->get();
       
       $leftMenu = \Menu::make('LeftMenu',function($menu) use ($categories){
          foreach($categories as $item){
               if($item->parent_category_id==0){
                   if($item->slug == $this->slug){
                       $menu->add($item->title, $this->category.'/'.$item->slug)->id($item->id)->active();
                   }else{
                       $menu->add($item->title, $this->category.'/'.$item->slug)->id($item->id);
                   }
               }else{
                   if($menu->find($item->parent_category_id)) {
                     $url =  $menu->find($item->parent_category_id)->url();
                     if($item->slug == $this->slug2 || $item->slug == $this->slug3 ){
                        $menu->find($item->parent_category_id)->add($item->title, $url.'/'.$item->slug)->id($item->id)->active();
                     }
                     else{
                        $menu->find($item->parent_category_id)->add($item->title, $url.'/'.$item->slug)->id($item->id);
                     }
                   }
               }
          }
       });
       
       return $leftMenu;
    }
}
