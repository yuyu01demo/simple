<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>{$seoinfo['seotitle']}-{$GLOBALS['cfg_webname']}</title>
    {if $seoinfo['keyword']}
    <meta name="keywords" content="{$seoinfo['keyword']}" />
    {/if}
    {if $seoinfo['description']}
    <meta name="description" content="{$seoinfo['description']}" />
    {/if}
    {include "pub/varname"}
    {Common::css('car.css,base.css,extend.css,stcalendar.css')}
    {Common::js('jquery.min.js,base.js,common.js')}
</head>
<body>
{request "pub/header"}
  <div class="big">
  	<div class="wm-1200">
    	<div class="st-guide">
            <a href="{$cmsurl}">{$GLOBALS['cfg_indexname']}</a>&gt;<a href="/cars/">{$channelname}</a>&gt;
            {loop $predest $dest}
             <a href="/cars/{$dest['pinyin']}/">{$dest['kindname']}{$channelname}</a>&gt;
            {/loop}
            {$info['title']}
      </div><!--面包屑-->
    
      <div class="st-main-page">
      	<div class="st-car-show">
        	<div class="carshow-tw">
            <div class="focus-slide">
              <div class="imgnav" id="imgnav"> 
                <div id="img">
                    {loop $info['piclist'] $pic}
                    <img src="{Common::img($pic[0],460,312)}"/>
                    {/loop}

                  <div id="front" title="上一张"><a href="javaScript:void(0)" class="pngFix"></a></div>
                  <div id="next" title="下一张"><a href="javaScript:void(0)" class="pngFix"></a></div>
                </div>
                <div id="cbtn">
                  <i class="picSildeLeft"><img src="{$GLOBALS['cfg_public_url']}images/picSlideLeft.gif"/></i>
                  <i class="picSildeRight"><img src="{$GLOBALS['cfg_public_url']}images/picSlideRight.gif"/></i>
                  <div id="cSlideUl">
                    <ul>
                        {loop $info['piclist'] $pic}
                           <li><img src="{Common::img($pic[0],90,61)}"/></li>
                        {/loop}
                    </ul>
                  </div>
                </div> 
              </div>
            </div>
            <div class="cp-show-msg">
            	<div class="hs-title">
              	<h1>{$info['title']}
                    {loop $info['iconlist'] $icon}
                    <img src="{$icon['litpic']}" />
                    {/loop}
                </h1>
              </div>
              <div class="price">
                  {if !empty($info['price'])}
                    <span><i class="currency_sy">{Currency_Tool::symbol()}</i><b>{$info['price']}</b>起</span>
                  {else}
                    <span>电询</span>
                  {/if}
              </div>
              <div class="sl">
              	<span>销量：{$info['sellnum']}</span><s>|</s><span class="myd">满意度：{if $info['satisfyscore']}{$info['satisfyscore']}%{/if}</span><s>|</s><span>推荐：{$info['recommendnum']}</span>
              </div>
              <div class="sell-point"><span>推荐理由</span>{$info['sellpoint']}</div>
              <ul class="msg-ul">
              	<li><em>产品编号：</em><p>{$info['series']}</p></li>
                <li><em>汽车车型：</em><p>{$info['carkindname']}</p></li>
                <li><em>乘客座位：</em><p>{$info['seatnum']}</p></li>
                <li><em>咨询电话：</em><p>{$info['phone']}</p></li>
                <li class="mb_0"><em>付款方式：</em>
                    <p>
                        {php $paymethod = Product::get_paytype_list();}
                        {loop $paymethod $method}
                        <img src="{$GLOBALS['cfg_public_url']}images/{$method['ico']}" />
                        {/loop}
                    </p>
                </li>
              </ul>	
            </div>
          </div>
          <div class="carshow-con">
          	<div class="tabnav-list">
            	<span class="on">套餐</span>
                {st:detailcontent action="get_content" pc="1" typeid="$typeid" productinfo="$info" return="carcontent"}
                    {loop $carcontent $row}
                    <span>{$row['chinesename']}</span>
                    {/loop}
                {/st}
                <span>客户评价</span>
                <span>我要咨询</span>
            </div><!--酒店导航-->
            <div class="tabbox-list">
            	
                <div class="tabcon-list">

                    <div class="car-typetable">
                        <table width="100%" border="0">

                           {st:car action="suit_type" row="8" productid="$info['id']" return="typelist"}
                            {loop $typelist $type}

                                <tr>
                                    <th width="240" height="40" scope="col"><span class="pl20">{$type['title']}</span></th>
                                    <th width="70" align="center" scope="col">用车日期</th>
                                    <th width="70" scope="col">单位</th>
                                    <th width="70" align="center" scope="col">优惠价</th>
                                    <th width="80" scope="col">支付方式</th>
                                    <th width="250" scope="col">&nbsp;</th>
                                    <th scope="col" width="83">&nbsp;</th>
                                </tr>
                                {st:car action="suit" row="10" productid="$info['id']" suittypeid="$type['id']" return="suitlist"}
                                    {loop $suitlist $suit}
                                        <tr>
                                            <td height="40"><strong class="type-tit">{$suit['title']}</strong></td>
                                            <td align="center"><span class="date" data-suitid="{$suit['id']}" data-productid="{$info['id']}">选择日期</span></td>
                                            <td align="center">{$suit['unit']}</td>
                                            <td align="center"><span class="price">{if !empty($suit['price'])}<i class="currency_sy">{Currency_Tool::symbol()}</i>{$suit['price']}起{else}电询{/if}</span></td>
                                            <td>
                                                {if $suit['paytype']==1}
                                                    <span class="fk-way">全款支付</span>

                                                {elseif $suit['paytype']==2}
                                                    <span class="fk-way">定金支付</span>
                                                {elseif $suit['paytype']==3}
                                                    <span class="fk-way">二次确认</span>
                                                {/if}
                                            </td>
                                            <td>
                                                {if $suit['jifenbook']}
                                                    <span class="s-jf">{$suit['jifenbook']}分<i></i></span>
                                                {/if}
                                                {if $suit['jifencomment']}
                                                    <span class="p-jf">{$suit['jifencomment']}分<i></i></span>
                                                {/if}
                                                {if $suit['jifentprice']}
                                                    <span class="d-jf">{$suit['jifentprice']}元<i></i></span>
                                                {/if}
                                            </td>
                                            <td><a class="booking-btn is_login_order" href="javascript:;">预订</a></td>
                                        </tr>
                                        <tr style="display: none">
                                            <td colspan="7">
                                                <div class="cartype-nr">
                                                    {$suit['content']}
                                                </div>
                                            </td>
                                        </tr>
                                    {/loop}
                            {/loop}

                        </table>
                    </div>




              </div>
                {loop $carcontent $hotel}
                <div class="tabcon-list">
                    <div class="list-tit"><strong>{$hotel['chinesename']}</strong></div>
                    <div class="list-txt">
                        {$hotel['content']}
                    </div>
                </div>
                {/loop}

                {include "pub/comment"}
                {include "pub/ask"}
              
            </div>
          </div>
        </div>
        <div class="st-sidebox">
            {st:right action="get" typeid="$typeid" data="$templetdata" pagename="show"}
        </div><!--边栏模块-->
      </div>
    
    </div>
  </div>
  <div id="calendar"></div>
  <input type="hidden" id="productid" value="{$info['id']}"/>
  <input type="hidden" id="suitid" value=""/>

{request "pub/footer"}
{request "pub/flink"}
{Common::js('floatmenu/floatmenu.js')}
{Common::css('/res/js/floatmenu/floatmenu.css',0,0)}
{Common::js('SuperSlide.min.js,template.js')}
<script src="/res/js/scorll.img.js"></script>
{Common::js('layer/layer.js')}
<script type="text/javascript">
$(document).ready(function(){
    //内容切换
    $.floatMenu({
        menuContain : '.tabnav-list',
        tabItem : 'span',
        chooseClass : 'on',
        contentContain : '.tabbox-list',
        itemClass : '.tabcon-list'
    });
    //套餐点击
    $(".type-tit").click(function(){
        $(this).parents('tr').first().next().toggle();
    })

    $(".type-tit").first().trigger('click');

    //套餐日历价格显示
    $('.date').click(function(){
        if(!is_login_order()){
            return false;
        }
        var suitid = $(this).attr('data-suitid');
        var productid =$(this).attr('data-productid');
        $("#productid").val(productid);
        $("#suitid").val(suitid);
        get_calendar(suitid);
    })
    //上一月

    $('body').delegate('.prevmonth,.nextmonth','click',function(){

        var year = $(this).attr('data-year');
        var month = $(this).attr('data-month');
        var suitid = $(this).attr('data-suitid');

        get_calendar(suitid,year,month);

    })

    //预订
    $(".booking-btn").click(function(){
        if(!is_login_order()){
            return false;
        }
        $(this).parents('tr').first().find('.date').trigger('click');
    })
});

 function choose_day(day){
     var productid = $("#productid").val();
     var suitid = $("#suitid").val();
     var url = "{$GLOBALS['cfg_basehost']}"+'/cars/book/?productid='+productid+'&suitid='+suitid+'&usedate='+day;

     window.location.href = url;

 }

 function show_calendar_box(){
     layer.closeAll();
     layer.open({
         type: 1,
         title:'',
         area: ['480px', '430px'],
         shadeClose: true,
         content: $('#calendar')
     });

 }

 function get_calendar(suitid,year,month){

     //加载等待
     layer.open({
         type: 3,
         icon: 2

     });

     var url = SITEURL+'car/dialog_calendar';
     if($("#calendar").data(suitid)!=undefined && year==undefined){
         $("#calendar").html($("#calendar").data(suitid));
         show_calendar_box();
     }else{
         $.post(url,{suitid:suitid,year:year,month:month},function(data){
             if(data){
                 $("#calendar").html(data);
                 $("#calendar").data(suitid,data);
                 show_calendar_box();

             }
         })
     }



 }
</script>
{include "member/login_order"}
</body>
</html>