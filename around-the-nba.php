<?php
     $part_page = "around-the-nba";
     include_once "./queries/aroundthenba-queries.php";
?>
<!DOCTYPE html> 
<html dir="ltr" lang="en-US">   
     <head>
          <title>NBA Philippines | Around The NBA</title>

          <link rel="stylesheet" type="text/css" href="/style.css">
          <link rel="stylesheet" type="text/css" href="/style-new.css">
          <!--[if IE]>
          <link rel="stylesheet" type="text/css" href="/ie_style.css">
          <![endif]-->
          <!--[if IE 7]>
          <link rel="stylesheet" type="text/css" href="/ie7_style.css">
          <![endif]-->
          <script type="text/javascript" src="/jquery-1.7.1.min.js"></script>
          <script type="text/javascript" src="/java.js"></script>
          <script type="text/javascript" src="/pagination/jquery.simplePagination.js"></script>
          <link rel="stylesheet" type='text/css' href="/pagination/simplePagination.css"> 
          <style>
               .column-title{                         
                    background: #0054AF;
                    padding:3px 8px;
                    color:#fff;
                    font-size: 20px;
                    font-weight: bold;                    
               }
               .column-body{
                    min-height: 100%;
                    position: relative;
               }
               .column-footer{
                    position: absolute;
                    bottom: 0;
                    height: 20px;
                    background: #0054AF;
                    width: 290px;
                    color:#fff;
                    text-align: right;
                    padding:3px 5px;

               }
               /*.gray b{padding-left:8px;}
               .moveleft, .moveright, .carousel-thumbs{display:block; float:left; margin:0 2px;background: #fff;}
               .moveleft, .moveright{width:20px; height:160px;}                        
               .carousel-thumbs{width:573px; height:160px;}*/
               div.nba-stories{width: 632px;}
               div.story-wrapper{
                    background: none repeat scroll 0 0 #fff;
                    border-left: 1px solid #F2F2F2;
                    border-right: 1px solid #F2F2F2;
                    border-top: 1px solid #F2F2F2;
                    height: 150px;
                    padding: 40px;
                    width: 550px;
               }
               div.paginator{
                    background: none repeat scroll 0 0 #f2f2f2;
                    border: 1px solid #F2F2F2;                                                  
                    padding: 10px;
                    width: 610px;
               }
               div.story-wrapper-header{
                    background: none repeat scroll 0 0 #D5D5D5;
                    border-left: 1px solid #F2F2F2;
                    border-right: 1px solid #F2F2F2;
                    border-top: 1px solid #F2F2F2;
                    border-bottom: 1px solid #fff;
                    height: 150px;
                    padding: 40px;
                    width: 550px;
               }
               div.story-wrapper-author{
                    background: none repeat scroll 0 0 #D5D5D5;
                    border-left: 1px solid #F2F2F2;
                    border-right: 1px solid #F2F2F2;
                    border-bottom: 1px solid #F2F2F2;
                    border-top: 1px solid #fff;
                    height: 150px;
                    padding: 40px;
                    width: 550px;    
               }
               div.story-wrapper-author p{ 
                    margin: 0;
                    padding: 5px;
               }
               div.story-wrapper-full{
                    padding: 20px;
                    width: 590px;                
                    border: 1px solid #F2F2F2;                 
               }
               div.story-wrapper-last{
                    border-bottom: 1px solid #F2F2F2;
               }
               span.col-1{margin-right: 30px;}
               span.col-2{width: 370px;}
               span.col-2, span.col-1{display: block; float:left;}
               h1.post-title{
                    color: #1B1E1F;
                    font-family: 'Helvetica Neue',Arial,sans-serif;
                    font-size: 26px;
                    font-weight: bold;
                    letter-spacing: 0;
                    line-height: 1em;
                    padding-bottom: 10px;
                    margin:0;
               }
               h1.post-title a{ color: #1B1E1F; }
               h1.post-title a:hover{ color: #0054AF; }
               div.post-excerpt{
                    font-size: 14px;                                                  
                    color:#616161;
                    margin-bottom: 10px;
               }
               div.post-meta span{                         
                    background: none repeat scroll 0 0 #F3F3F3;
                    color: #616161;                         
                    font-size: 14px;
                    font-style: italic;
                    padding: 1px 4px;
               }
               .author-image, .author-details{display: block; float:left; padding:5px;}
          </style>
     </head>

     <body>
     <?php if(isset($search_title)): ?>
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=131694290309870";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script> 
     <?php endif; ?>     
     <div id="wrapper">
          <?php include_once 'layouts/header.php'; ?>
          
          <div style="width: 940px; padding:10px 30px 0 30px; height: 90px; margin: 0 auto; text-align: center; background:#fff;">
          <?php
          echo $ads_list['nba_BlogsFull_top_leaderboard']['Content'];
          ?>          
          </div>

          <div id="main_content">
               <div style="height: 10px"></div>
               
               <?php if(!isset($search_title)): ?>
               <div class="container" style="font-size: 17px; width: 940px; margin: 0 auto; padding: 10px;">                   
                    <div class='nba-stories'>
                         <b style="padding:6px 15px; background:#002954; color:#fff;display:block;">AROUND THE NBA</b>
                         <div id='nba-story-box'>
                              <?php $last_key = end(array_keys($stories)); ?>
                              <?php foreach($stories as $k=>$v): ?>
                              <div class="story-wrapper<?php echo ($last_key == $k)?' story-wrapper-last':''; ?>">
                                   <span class='col-1'>
                                        <img src="/ftp-web/around-the-nba/<?php echo $v['image']; ?>" style='width:150px; height:150px;' />
                                   </span>
                                   <span class='col-2'>
                                        <h1 class='post-title'><a href="/around-the-nba/<?php echo urlencode(utf8_encode(trim($v['title']))); ?>"><?php echo $v['title']; ?></a></h1>
                                        <div class='post-excerpt'><?php echo $v['excerpt']; ?></div>
                                        <div class='post-meta'><span><?php echo $v['writer']; ?> On <?php echo date("M jS, Y",strtotime($v['date_created'])); ?></span></div>
                                   </span>
                              </div>                         
                              <?php endforeach; ?>
                         </div>     
                    </div>
                    <div class='paginator' id='paginator'></div>
                    <script>
                         $(function() {
                             $("#paginator").pagination({
                                 items: <?php echo $row_count; ?>,
                                 itemsOnPage: 2,
                                 displayedPages: 3,
                                 cssStyle: 'light-theme',

                                 hrefTextPrefix: '/around-the-nba/?page=',                                        

                                 currentPage: <?php echo isset($page)?$page:1; ?>,

                                 onPageClick:function(pageNumber){                                            
                                   /*document.getElementById("nba-story-box").innerHTML = "Retrieving data..."; 
                                   $.ajax({
                                        'url' : '/ajax-around-the-nba.php?action=pagechange',
                                        'cache' : false,
                                        'data' : {page : pageNumber}
                                   }).done(function(response){                                                                                   
                                        document.getElementById("nba-story-box").innerHTML = message;                                             
                                   });                                          
                                   return false;*/
                                 },
                                 onInit:function(){
                                 

                                 }
                             });
                         });
                    </script>                               
               </div>
               <?php else: ?>               
               <div class="container" style="font-size: 17px; width: 940px; margin: 0 auto; padding: 10px;">                   
                    <div class='nba-stories'>                         
                         <div class='story-wrapper-header'>
                              <span class='col-1'>
                                   <img src="/ftp-web/around-the-nba/<?php echo $full_story['image']; ?>" style='width:150px; height:150px;' />
                              </span>
                              <span class='col-2'>
                                   <h1 class='post-title'><?php echo $full_story['title']; ?></h1>                                   
                                   <div class='post-meta'><span><?php echo $full_story['writer']; ?> On <?php echo date("M jS, Y",strtotime($full_story['date_created'])); ?></span></div>
                                   <div class='fb-wrapper' style='margin-top:10px;'>
                                        <div class="fb-like" data-href="<?php echo $base; ?>around-the-nba/<?php echo urlencode(utf8_encode(trim($v['title']))); ?>" data-send="false" data-width="450" data-show-faces="false"></div>
                                   </div>
                              </span>
                         </div>
                         <div class='story-wrapper-full'>
                              <?php echo $full_story['content']; ?>
                         </div>
                         <div class='story-wrapper-author'>
                              <p>Writen By:</p>
                              <span class='author-image'><img src='/ftp-web/images/bloggers/<?php echo $full_story['Author']['photo']; ?>'/></span>
                              <span class='author-details'>
                                   <span><?php echo $full_story['Author']['fullname']; ?></span>                                   
                              </span> 
                         </div>
                         <div class='fb-wrapper' style='margin-top:10px'>
                              <div class="fb-comments" data-href="<?php echo $base; ?>around-the-nba/<?php echo urlencode(utf8_encode(trim($v['title']))); ?>" data-width="630" data-num-posts="10"></div>
                         </div>
                    </div>
               </div>     
               <?php endif; ?>               
               <div style="height: 20px">
                    <div style='background:#fff;'>    
                    <?php
                    $footer_ads = $ads_list['nba_BlogsFull_bottom_leaderboard']['Content'];
                    include_once 'layouts/links.php';
                    ?>  
                    <?php include_once 'layouts/footer.php'; ?>
                    </div>
               </div>
          </div>     
     </div>

</body>
</html>
