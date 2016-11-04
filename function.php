<?php
include_once 'front.php';
function lang_flag($lang){
    if ($lang == 'vi') {
        $flag = 'United_Kingdom.gif';
        $flag_lnk = common::language_change($_SERVER['REQUEST_URI'],'en');
    } else {
        $flag = 'Vietnam.gif';
        $flag_lnk = common::language_change($_SERVER['REQUEST_URI'],'vi');
    }
    return '
    <a href="' . $flag_lnk . '" class="pull-right">
        <img src="' . selfPath . $flag . '" style="height:30px" title="" alt=""/>
    </a>';
}
function menu($db,$lang,$view){
    $db->reset();
    $list=$db->where('active',1)->orderBy('ind','ASC')->orderBy('id')->get('menu');
    $str.='
    <ul class="menu">';
    foreach($list as $item){
        $title=$lang=='vi'?$item['title']:$item['e_title'];
        $db_view=$lang=='vi'?$item['view']:$item['e_view'];
        if($view==$db_view) $active=' class="active"';
        else $active='';
        $str.='
        <li'.$active.'><a href="'.myWeb.$lang.'/'.$db_view.'">'.$title.'</a></li>';
    }
    $str.='               
    </ul>'  ;
    return $str;
}
function foot_menu($db,$lang,$view){
    $db->reset();
    $list=$db->where('active',1)->orderBy('ind','ASC')->orderBy('id')->get('menu');
    $str.='
    <ul class="foot-menu">';
    foreach($list as $item){
        $title=$lang=='vi'?$item['title']:$item['e_title'];
        $db_view=$lang=='vi'?$item['view']:$item['e_view'];
        $str.='
        <li><a href="'.myWeb.$lang.'/'.$db_view.'">'.$title.'</a></li>';   
    }
    $str.='
    </ul>';
    return $str;
}
function home($db,$lang){
    //common::widget('layer_slider');
    //$layer_slider=new layer_slider($db);
    
    $str='
    <section id="ind-slider">
        <div class="container">
            '.wow_slider($db).'
        </div>
    </section>';
    
    common::page('product');
    $product=new product($db,$lang);
    $str.=$product->ind_product();
    
    $str.='
    <section id="index">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">';
    common::page('facility');
    $facility=new facility($db,$lang);
    $str.=$facility->ind_facility();
    $str.='
                </div>
                <div class="col-xs-6">';
    common::page('about');
    $about=new about($db,$lang);
    $str.=$about->ind_about();
    
    common::page('news');
    $news=new news($db,$lang);
    $str.=$news->ind_news();
    
    $str.='
                </div>
            </div>
        </div>
    </section>';
    
    
    /*$str.=partner($db);*/
    return $str;
}
function wow_slider($db){
    $db->reset();
    $list=$db->where('active',1)->orderBy('ind','ASC')->get('slider');
    $str.='
    <link rel="stylesheet" type="text/css" href="'.myWeb.'engine/style.css" />
	<!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>';
    $i=1;
    foreach($list as $item){
        $img='<img src="'.webPath.$item['img'].'" alt="" title=""/>';
        $lnk=$item['lnk']!=''?'<a href="'.$item['lnk'].'">'.$img.'</a>':$img;
        $str.='
        <li>'.$lnk.'</li>';
        $tmp.='
        <a href="#" title=""><span>'.$i.'</span></a>';
        $i++;
    }
    $str.='
	</ul></div>
	<div class="ws_bullets"><div>
		'.$tmp.'
	</div></div><div class="ws_script" style="position:absolute;left:-99%"></div>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="'.myWeb.'engine/wowslider.js"></script>
	<script type="text/javascript" src="'.myWeb.'engine/script.js"></script>
	<!-- End WOWSlider.com BODY section -->';
    return $str;
}
function slide($db){
    $db->reset();
    $list=$db->where('active',1)->orderBy('ind','ASC')->get('slider');
    $str.='
    <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
    <link rel="stylesheet" type="text/css" href="'.myWeb.'engine/style.css" />
	<div id="wowslider-container1">
	<div class="ws_images"><ul>';
    $i=1;
    $tmp='';
    foreach($list as $item){
        $img='<img src="'.webPath.$item['img'].'" alt="" title=""/>';
        if($item['lnk']!=''){
            $lnk='<a href="'.$item['lnk'].'">'.$img.'</a>';
        }else{
            $lnk=$img;
        }
        $str.='
        <li>'.$lnk.'</li>';
        $tmp.='
        <a href="#" title="images"><span>'.$img.$i.'</span></a>';
        $i++;
    }
    $str.='
	</ul></div>
	<div class="ws_bullets"><div>
		'.$tmp.'
	</div></div><div class="ws_script" style="position:absolute;left:-99%"></div>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="'.myWeb.'engine/wowslider.js"></script>
	<script type="text/javascript" src="'.myWeb.'engine/script.js"></script>
	<!-- End WOWSlider.com BODY section -->';
    return $str;
}
function contact($db,$lang){
    $str.='
    <section id="page">';
    common::page('contact');
    $contact=new contact($db,$lang);
    $str.=$contact->breadcrumb();
    $str.=$contact->contact();
    $str.='
    </section>';
    return $str;
}
function career($db,$lang){
    $str.='
    <section id="page">';
    common::page('career');
    $career=new career($db,$lang);
    $str.=$career->breadcrumb();
    if(isset($_GET['id'])){
        $str.=$career->career_one();    
    }else{
        $str.=$career->career_all();
    }    
    $str.='
    </section>';
    return $str;
}
function project($db,$lang){
    $str.='
    <section id="page">';
    common::page('project');
    $project=new project($db,$lang);
    $str.=$project->breadcrumb();
    if(isset($_GET['id'])){
        $str.=$project->project_one();    
    }else{
        $str.=$project->project_all();
    }    
    $str.='
    </section>';
    return $str;
}
function facility($db,$lang){
    $str.='
    <section id="page">';
    common::page('facility');
    $facility=new facility($db,$lang);
    $str.=$facility->breadcrumb();
    if(isset($_GET['id'])){
        $str.=$facility->facility_one();    
    }else{
        $str.=$facility->facility_all();
    }    
    $str.='
    </section>';
    return $str;
}
function about($db,$lang){
    $str.='
    <section id="page">';
    common::page('about');
    $about=new about($db,$lang);
    $str.=$about->breadcrumb();
    $str.=$about->about_one();
    $str.='
    </section>';
    return $str;    
}
function news($db,$lang){
    $str.='
    <section id="page">';
    common::page('news');
    $news=new news($db,$lang);
    $str.=$news->breadcrumb();
    
    $str.='
    </section>';
    return $str;
}
function manual($db){
    //common::widget('layer_slider');
    //$layer_slider=new layer_slider($db);
    
    $str='
    <section id="ind-slider">
        <div class="container">
            '.wow_slider($db).'
        </div>
    </section>';
    
    common::page('manual');
    $manual=new manual($db);
    //$str=$about->breadcrumb();
    $str.=$manual->manual_one();
    return $str;
}
function product($db,$lang){
    $str.='
    <section id="page">';  
    common::page('product');
    $pd=new product($db,$lang);
    $str.=$pd->breadcrumb();
    $str.='
    <div class="container">
    <div class="row">
        <div class="col-xs-3">
        '.$pd->category().'
        </div>
        <div class="col-xs-9">';
    if(isset($_GET['id'])){
        $id=intval($_GET['id']);
        $str.=$pd->product_one($id);
    }else{
        $str.=$pd->product_cate();
    }
    $str.='
        </div>
    </div>
    </div>';
    $str.='
    </section>';
    return $str;
}
function partner($db){
    $list=$db->where('active',1)->orderBy('ind','ASC')->orderBy('id')->get('partner');    
    $str.='
    <section id="partner">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Đại Diện Phân Phối</h2>
                <p class="lead">
                    Đại diện chính thức của công ty L&rsquo;avoine Việt Nam
                </p>
            </div>    
            <div class="partners col-md-12">
                <div class="your-class">';
    foreach($list as $item){
        $img=$item['img']==''?selfPath.'square-facebook.png':webPath.$item['img'];
        $str.='
        <div>
        <a href="'.$item['facebook'].'" target="_blank">
            <img src="'.$img.'" class="img-responsive center-block"/>
            <h2 class="text-center">'.$item['title'].'</h2>
        </a>
        </div>';
    }
    $str.='
                </div>
            </div>        
        </div><!--/.container-->
    </section><!--/#partner-->';
    $str.='   
    <script>
    $(".your-class").slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ],
      autoplay: true,
      autoplaySpeed: 2000,
    });
    </script>';
    return $str;
}
function social($db){
    $basic_config=$db->where('id',1)->getOne('basic_config','social_twitter','social_facebook','social_google_plus');
    $str.='
    <div class="social">
        <a href="'.$basic_config['social_twitter'].'"><i class="fa fa-twitter"></i></a>
        <a href="'.$basic_config['social_facebook'].'"><i class="fa fa-facebook"></i></a>
        <a href="'.$basic_config['social_google_plus'].'"><i class="fa fa-google-plus"></i></a>
    </div>';
    return $str;
}
function search($db,$lang){
    $hint=$_GET['hint'];
    $str.='
    <section id="page">';
    common::load('search','page');
    $obj = new search($db,$hint,$lang);
    $obj->add('product','Sản Phẩm','san-pham');
    $obj->add('facility','Thiết bị','thiet-bi');
    $obj->add('project','Dự Án','du-an');
    $obj->add('career','Tuyển Dụng','tuyen-dung');
    $str.=$obj->output();
    $str.='
    </section>';
    return $str;
}
?>
