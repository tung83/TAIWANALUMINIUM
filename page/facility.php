<?php
class facility{
    private $db,$view,$lang,$title;
    function __construct($db,$lang='vi'){
        $this->db=$db;
        $this->db->reset();
        $this->lang=$lang;
        $db->where('id',13);
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
        	<li><a href="'.myWeb.$this->lang.'"><i class="fa fa-home"></i></a></li>
            <li><a href="'.myWeb.$this->lang.'/'.$this->view.'">'.$this->title.'</a></li>';
        if(isset($_GET['id'])){
            $this->db->where('id',intval($_GET['id']));
            $item=$this->db->getOne('facility','id,title,e_title');
            $title=($this->lang=='en')?$item['e_title']:$item['title'];
            $str.='
            <li><a href="#">'.$title.'</a></li>';
        }
        $str.='
        </ul>
        <h2 class="page-title">'.$this->title.'</h2>
        </div>';
        return $str;
    }
    function category($pId){
        $this->db->reset();
        $this->db->where('active',1)->orderBy('ind','ASC')->orderBy('id');
        $list=$this->db->get('facility_cate',null,'id,title');
        $str='
        <ul class="category">';
        foreach($list as $item){
            if($item['id']==$pId) $cls=' class="active"';else $cls='';
            $lnk=myWeb.$this->view.'/'.common::slug($item['title']).'-p'.$item['id'];
            $str.='
            <li><a'.$cls.' href="'.$lnk.'"><i class="fa fa-angle-double-right"></i> '.$item['title'].'</a></li>';
        }
        $str.='
        </ul>';
        return $str;
    }
    function ind_facility(){
        $list=$this->db->where('active',1)->orderBy('ind','ASC')->orderBy('id')->get('facility',4);
        $str.='
        <div class="row">
            <div class="col-xs-12 ind-facility-list">
                <h2 class="title">'.$this->title.'</h2>';
        $i=1;
        foreach($list as $item){
            if($i%2==1){
                $str.='
                <div class="row">';
            }
            $title=$this->lang=='vi'?$item['title']:$item['e_title'];
            $sum=$this->lang=='vi'?$item['sum']:$item['e_sum'];
            $lnk=myWeb.$this->lang.'/'.$this->view.'/'.common::slug($title).'-i'.$item['id'];
            $str.='
            <div class="ind-facility wow fadeIn animated col-xs-6">
            <a href="'.$lnk.'">
                <img src="'.webPath.$item['img'].'" class="img-responsive" alt="" title=""/>
                <p>
                    <h2>'.$title.'</h2>
                </p>
            </a>
            </div>';
            if($i%2==0){
                $str.='
                </div>';
            }
            $i++;
        }
        if($i%2!=1){
            $str.='
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
    function facility_item($item){
        $title=$this->lang=='vi'?$item['title']:$item['e_title'];
        $lnk=myWeb.$this->lang.'/'.$this->view.'/'.common::slug($title).'-i'.$item['id'];
        $str.='        
        <div class="clearfix col-xs-4 wow bounceIn animated facility-item">
            <a href="'.$lnk.'">
                <img src="'.webPath.$item['img'].'" alt="" title=""/>
                <h2>'.$title.'</h2>
            </a>
        </div>';
        return $str;
    }
    function check_pId(){
        if(isset($_GET['pId'])){
            $pId=intval($_GET['pId']);
        }elseif(isset($_GET['id'])){
            $item=$this->db->where('id',intval($_GET['id']))->getOne('facility','pId');
            $pId=$item['pId'];
        }else $pId=0;
        return $pId;
    }
    function facility_all(){
        $page=isset($_GET['page'])?intval($_GET['page']):1;
        $this->db->where('active',1);
        $this->db->orderBy('id');
        $this->db->pageLimit=limit;
        $list=$this->db->paginate('facility',$page);
        $count=$this->db->totalCount;
        
        $str.='
        <div class="container">';
        foreach($list as $item){
            $str.=$this->facility_item($item);
        }
        
        $pagenumber = $page;
        $totalrecords = $count;
        $pg=new Pagination(array('limit'=>limit,'count'=>$count,'page'=>$page,'type'=>0));
        $pg->set_url(
            array(
                'def'=>myWeb.$this->lang.'/'.$this->view,
                'url'=>myWeb.$this->lang.'/p[p]/'.$this->view
            )
        );
        $str.='<div class="text-center">'.$pg->process().'</div>';
        
        $str.='
        </div>';
        return $str;
    }
    function facility_cate(){
        $page=isset($_GET['page'])?intval($_GET['page']):1;
        $this->db->where('active',1);
        $this->db->orderBy('id');
        $this->db->pageLimit=limit;
        $list=$this->db->paginate('facility',$page);
        $count=$this->db->totalCount;
        
        $str.='
        <div class="container">';
        foreach($list as $item){
            $str.=$this->career_item($item);
        }
        
        $pagenumber = $page;
        $totalrecords = $count;
        $pg=new Pagination(array('limit'=>limit,'count'=>$count,'page'=>$page,'type'=>0));
        $pg->set_url(
            array(
                'def'=>myWeb.$this->lang.'/'.$this->view,
                'url'=>myWeb.$this->lang.'/p[p]/'.$this->view
            )
        );
        $str.='<div class="text-center">'.$pg->process().'</div>';
        
        $str.='
        </div>';
        return $str;
    }
    function facility_one(){
        $id=intval($_GET['id']);
        $item=$this->db->where('id',$id)->getOne('facility');
        $str='
        <div class="container">
            <div class="row article">
                <article class="article">
                    <h1 class="article">'.$item['title'].'</h1>
                    <p>'.$item['content'].'</p>
                </article>
            </div>
            <h2 class="page-title">'.other_article.'</h2>';
        $this->db->where('active',1)->where('id',$id,'<>');
        $this->db->orderBy('id');
        $list=$this->db->get('facility',limit);
        foreach($list as $item){
            $str.=$this->facility_item($item);
        }
        $str.='
        </div>';
        return $str;
    }
    
    function one_ind_facility($item){
        $title=$this->lang=='vi'?$item['title']:$item['e_title'];
        $lnk=myWeb.$this->view.'/'.common::slug($title).'-i'.$item['id'];
        $str='
        <div class="ind-facility">
            <a href="'.$lnk.'">
                <img src="'.webPath.$item['img'].'" alt="" title="'.$item['title'].'"/>
                <h2>'.$title.'</h2>
            </a>
        </div>';
        return $str;
    }

}
?>
