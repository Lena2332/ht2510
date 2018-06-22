<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Article;

class IndexController extends SiteController
{
    protected $title="";
  
    public function __construct(){
        
        parent::__construct();
        $this->template = env('THEME').'.index';
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
       /*
        $pages = Page::all(); //Возвращает все записи
        foreach($pages as $page){
           echo $page->title."<br>";
        }
        */
        /* $page = Page::where('id','>','3')->orderBy('title')->take(2)->get(); //Выберет 2 элемента сортированные по имени */
        /* $page = Page::find(1); //Ищет элемент таблицы используя id записи */
        /* $pages = Page::find([1,2,3]); //Ищет элементы таблицы используя id записи */
        /* $pages = Page::findOrFail(1); //Ищет элементы таблицы используя id записи или генерирует исключение*/
          
        
        //$page = Page::where('slug','=','home')->get(); //Возвращает 1 элемент с запросом
        $this->show('home');
        
        
        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $page = Page::where('slug','=','home')->get();
      $mainBlockVars = array('title'=>$page[0]->title, 'text'=>$page[0]->text,'image'=>$page[0]->image,'video'=>$page[0]->video);
      $mainBlock = view(env('THEME').'.mainBlock')->with($mainBlockVars)->render();
      $this->vars = array_add($this->vars, 'mainBlock', $mainBlock);  
     
      $this->vars = array_add($this->vars, 'title', $page[0]->title);
      parent::addMeta($page[0]->smm_title, $page[0]->smm_desc, "");
      
      foreach($this->sections as $k => $v){
         $this->getItems(['key'=>$k,'val'=>$v]);
      }
    
    }
    
    public function getItems($section= array()){
        
     //вывод последних публикаций из методологии
      $metod_last_items = Article::whereRaw("find_in_set('".$section['key']."',`option`)")->get();
      $metod_items_array = array();
      $metod_items_array['title'] = $section['val'];
      foreach($metod_last_items as $metod_last_item){
        $item_option = explode(',', $metod_last_item->option);
        $metod_items_array['items'][] = array(
            'title' => $metod_last_item->title,
            'slug' => $section['key']."/".$metod_last_item->slug,
            'annot' => $metod_last_item->annotation,
            'open' => (!in_array('close',$item_option)) ? true : false,
            'image'=> $section['key']."/".$metod_last_item->img,
            'video'=> (in_array('video',$item_option)) ? true : false,
            'date_add' => \Carbon\Carbon::parse($metod_last_item->updated_at)->format('d/m/Y')
             );
      }
      
      $lastItems = view(env('THEME').'.lastItems')->with($metod_items_array)->render();
      $this->vars = array_add($this->vars, 'lastItems'.ucfirst($section['key']), $lastItems);
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
