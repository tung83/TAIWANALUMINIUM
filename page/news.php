<?php
class news{
    private $db,$view,$lang,$title;
    function __construct($db,$lang='vi'){
        $this->db=$db;
        $this->db->reset();
        $this->lang=$lang;
        $db->where('id',8);
        $item=$db->getOne('menu');
        if($lang=='en'){
            $this->view=$item['e_view'];
            $this->title=$item['e_title'];
        }else{
            $this->view=$item['view'];
            $this->title=$item['title'];
        }
    }
    function breadcrumb(){
        $this->db->reset();
        $str.='
        <div class="container">
        <ul class="breadcrumb clearfix">
        	<li><a href="'.myWeb.'"><i class="fa fa-home"></i></a></li>
            <li><a href="'.myWeb.$this->view.'">'.$this->title.'</a></li>';
        if(isset($_GET['id'])){
            $this->db->where('id',intval($_GET['id']));
            
            $item=$this->db->getOne('news','id,title,e_title,pId');
            $title=($this->lang=='en')?$item['e_title']:$item['title'];
            $cate=$this->db->where('id',$item['pId'])->getOne('news_cate','id,title,e_title');
            $cate_title=($this->lang=='en')?$cate['e_title']:$cate['title'];
            $str.='
            <li><a href="'.myWeb.$this->view.'/'.common::slug($cate_title).'-p'.$cate['id'].'">'.$cate_title.'</a></li>
            <li><a href="#">'.$title.'</a></li>';
        }elseif(isset($_GET['pId'])){
            $cate=$this->db->where('id',intval($_GET['pId']))->getOne('news_cate','id,title,e_title');
            $cate_title=($this->lang=='en')?$cate['e_title']:$cate['title'];
            $str.='
            <li><a href="#">'.$cate_title.'</a></li>';
        }
        $str.='
        </div>
        </ul>';
        return $str;
    }
    function ind_news(){
        $this->db->reset();
        $list=$this->db->where('active',1)->orderBy('id')->get('news',3);
        $str='
        <div class="row">
            <div class="col-xs-12">
            <h2 class="title">'.$this->title.'</h2>';
        foreach($list as $item){
            $title=($this->lang=='en')?$item['e_title']:$item['title'];
            $lnk=myWeb.$this->lang.'/'.$this->view.'/'.common::slug($title).'-i'.$item['id'];
            $img=webPath.$item['img'];
            if($img=='') $img='holder.js/126x100';
            $str.='
            <div class="row ind-news">
                <a href="'.$lnk.'">
                    <div class="col-xs-4">
                        <img src="'.$img.'" alt="'.$title.'" class="img-responsive"/>
                    </div>
                    <div class="col-xs-8">
                        <h2>'.common::str_cut($title,30).'</h2>
                    </div>
                </a>
            </div>';   
        }
        $str.='
            <p class="text-right more">
                <a href="'.myWeb.$this->lang.'/'.$this->view.'">'.all.'</a>
            </p>
            </div>
        </div>';
        return $str;
    }
    function news_item($item){
        $title=($this->lang=='en')?$item['e_title']:$item['title'];
        $sum=($this->lang=='en')?$item['e_sum']:$item['sum'];
        $lnk=myWeb.$this->view.'/'.common::slug($title).'-i'.$item['id'];
        $str.='
        <a href="'.$lnk.'" class="about-item clearfix">
            <img src="'.webPath.$item['img'].'" class="img-responsive" alt="" title=""/>
            <div>
                <h2>'.$title.'</h2>
                <span>'.nl2br(common::str_cut($sum,620)).'</span>
            </div>
        </a>';
        return $str;
    }
    function news_cate($pId){
        $page=isset($_GET['page'])?intval($_GET['page']):1;
        $this->db->reset();
        $this->db->where('active',1);
        if($pId!=0) $this->db->where('pId',$pId);
        $this->db->orderBy('id');
        $this->db->pageLimit=limit;
        $list=$this->db->paginate('news',$page);
        $count=$this->db->totalCount;
        if($count>0){
            foreach($list as $item){
                $str.=$this->news_item($item);
            }
        }        
        
        $pg=new Pagination(array('limit'=>limit,'count'=>$count,'page'=>$page,'type'=>0));        
        if($pId==0){
            $pg->set_url(array('def'=>myWeb.$this->view,'url'=>myWeb.'[p]/'.$this->view));
        }else{
            $cate=$this->db->where('id',$pId)->getOne('news_cate','id,title,e_title');    
            $cate_title=($this->lang=='en')?$cate['e_title']:$cate['title'];   
            $pg->defaultUrl = myWeb.$this->view.'/'.common::slug($cate_title).'-p'.$cate['id'];
            $pg->paginationUrl = myWeb.$this->view.'/[p]/'.common::slug($cate_title).'-p'.$cate['id'];
        }
        $str.= '<div class="pagination-centered">'.$pg->process().'</div>';
        return $str;
    }
    function news_one(){
        $id=1;
        $item=$this->db->where('id',$id)->getOne('news');
        $title=($this->lang=='en')?$item['e_title']:$item['title'];
        $str='
        <article class="article">
            <h1 class="article">'.$title.'</h1>
            <p>'.$item['content'].'</p>
        </article>';
        return $str;
    }
    
    function one_ind_news($id){
        $this->db->reset();
        $this->db->where('id',$id);
        $item=$this->db->getOne('news','id,img,title,e_title,sum,e_sum');
        $title=($this->lang=='en')?$item['e_title']:$item['title'];
        $sum=($this->lang=='en')?$item['e_sum']:$item['sum'];
        $lnk=myWeb.$this->view.'/'.common::slug($title).'-i'.$item['id'];
        $str='
        <div class="ind_news">
            <a href="'.$lnk.'">
                <img src="'.webPath.$item['img'].'" alt="" title="'.$title.'"/>
                <h2>'.$title.'</h2>
                <span>'.common::str_cut($sum,120).'</span>
            </a>
        </div>';
        return $str;
    }
    function product_image_first($db,$pId){
        $db->where('active',1)->where('pId',$pId);
        $item=$db->getOne('product_image','img');
        return $item['img'];
    }

}
?>
