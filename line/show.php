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
    {Common::css('lines.css,base.css,extend.css,calendar.css')}
    {Common::js('jquery.min.js,base.js,common.js')}
</head>

<body>

	{request "pub/header"}

  <div class="big">
  	<div class="wm-1200">
    
    	<div class="st-guide">
      	<a href="{$cmsurl}">{$GLOBALS['cfg_indexname']}</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;<a href="/lines/">{$channelname}</a>&gt;&nbsp;&nbsp;
            {loop $predest $dest}
                <a href="/lines/{$dest['pinyin']}/">{$dest['kindname']}</a>&gt;&nbsp;
            {/loop}
      </div><!--面包屑-->
      
      <div class="st-main-page">
      	<div class="st-line-show">
        	<div class="lineshow-tw">
          	<div class="lw-title">
            	<a href="/line/print/id/{$info['id']}" class="print-btn">打印行程</a>
            	<h1>{$info['title']}
                    {loop $info['iconlist'] $icon}
                        <img src="{$icon['litpic']}" />
                    {/loop}
                </h1>
              <p>{$info['sellpoint']}</p>
            </div>
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
            	<div class="jg" id="min_price_tips">
              	    <span class="hide">优惠价：<i class="currency_sy">{Currency_Tool::symbol()}</i><b id="minprice">{$info['price']}</b>起</span>
                    <span class="hide">优惠价：<b>电询</b></span>
                {if $info['sellprice']}
                 <del>原价：<i class="currency_sy">{Currency_Tool::symbol()}</i>$info['sellprice']</del>
                {/if}
              </div>
              <div class="sl">
              	<span>销量：{$info['sellnum']}</span><s>|</s><span class="myd">满意度：{$info['score']}</span>
              </div>
              <dl class="tc">
                <dt>套餐类型：</dt>
                <dd class="type suitlist">
                  {st:line action="suit" productid="$info['id']"}
                    {loop $data $s}
                     <a href="javascript:;" data-suitid="{$s['id']}" data-minprice="{$s['minprice']}" data-jifentprice="{$s['jifentprice']}" data-jifenbook="{$s['jifenbook']}">{$s['title']}</a>
                    {/loop}
                  {/st}

                </dd>
                <dd class="select-bj">
                      <span>出发日期：</span>
                      <select class="bj-list date-list">

                      </select>
                  </dd>
                <dd class="yd-btn">
                  <a href="javascript:;" class="btn-yd gobook">立即预订</a>
                </dd>
              </dl>
              <ul class="msg-ul">
              	<li><em>线路编号：</em><p>{$info['series']}</p></li>
                <li><em>积分优惠：</em><p><span class="fan jifentprice"><i></i></span><span class="song jifenbook"><i></i></span></p></li>
                <li><em>往返交通：</em><p>{$info['transport']}</p></li>
                <li><em>提前报名：</em><p>{$info['linebefore']}天以上</p></li>
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
          <div class="lineshow-con">
          	<div class="tabnav-list">
            	<span class="on">在线预订</span>
                {st:detailcontent action="get_content" pc="1" typeid="$typeid" productinfo="$info" return="linecontent"}
                    {loop $linecontent $row}
            	        <span>{$row['chinesename']}</span>
                    {/loop}
                {/st}
            	<span>客户评价</span>
            	<span>我要咨询</span>
              <a class="yd-btn yd-btn-menu hide gobook btn-yd"  href="javascript:;">立即预订</a>
            </div><!--线路导航-->
            <div class="tabbox-list">
                <div class="tabcon-list" id="calendar">

                </div>
            {loop $linecontent $line}
                {if preg_match('/^\d+$/',$line['content']) && $line['columnname']=='jieshao'}
                    <div class="tabcon-list">
                    <div class="list-tit"><strong>{$line['chinesename']}</strong></div>
                    {if $info['isstyle']==2}
                        <div class="eachday">
                        {php $indexkey = 1;}
                        {loop Model_Line_Jieshao::detail($line['content'],$info['lineday']) $v}
                            <div class="day-con part" id="day_c_{$indexkey}">
                            <div class="day-num">{$v['day']}</div>
                        <div class="day-tit"><strong>第{Common::daxie($v['day'])}天</strong><p>{$v['title']}</p></div>
                        <table class="day-tb" width="100%" border="0" bgcolor="#f9f8f8">
                         {if $info['showrepast']==1}
                          <tr>
                            <th width="110" scope="row"><span class="yc">用餐情况：</span></th>
                            <td width="237">
                                {if $v['breakfirsthas']}
                                    {if !empty($v['breakfirst'])}
                                      早餐：{$v[breakfirst]}
                                    {else}
                                      早餐：含
                                    {/if}
                                {else}
                                    早餐：不含
                                {/if}
                            </td>
                            <td width="237">
                                {if $v['lunchhas']}
                                        {if !empty($v['lunch'])}
                                            午餐：{$v[lunch]}
                                        {else}
                                            午餐：含
                                        {/if}
                                {else}
                                    午餐：不含
                                {/if}
                            </td>
                            <td width="237">

                                {if $v['supperhas']}
                                    {if !empty($v['supper'])}
                                      晚餐：{$v['supper']}
                                    {else}
                                      晚餐:含
                                    {/if}
                                {else}
                                    晚餐:不含
                                {/if}
                            </td>
                          </tr>
                         {/if}

                          <tr>
                            <th width="110" scope="row"><span class="zs">住宿情况：</span></th>
                            <td colspan="3">{$v['hotel']}</td>
                          </tr>
                          <tr class="bor_0">
                            <th width="110" scope="row"><span class="gj">交通工具：</span></th>
                            <td colspan="3">
                                {loop explode(',',$v['transport']) $t}
                                   {$t}
                                {/loop}
                            </td>
                          </tr>
                        </table>
                        <div class="txt">
                            {$v['jieshao']}
                        </div>
                        <ul class="jd-lsit">
                           {st:line action="line_spot" day="$v['day']" productid="$v['lineid']" return="spotlist"}
                            {php $sindex=1;}
                            {loop $spotlist $spot}
                                <li {if $sindex%3==0}class="mr_0"{/if}>
                                <a class="pic" href="{$spot['url']}" target="_blank"><img src="{Common::img($spot['litpic'],240,162)}" alt="{$spot['title']}" /></a>
                                <a class="tit" href="{$spot['url']}" target="_blank">{$spot['title']}</a>
                                </li>
                                {php $sindex++;}
                            {/loop}

                        </ul>
                      </div>
                            {php $indexkey++;}
                        {/loop}
                            <div class="day-leftnav" id="day-leftNav">
                                <ul class="day-navlist">
                                   {php}
                                     for($index=1;$index<=$info['lineday'];$index++)
                                     {
                                        $str.= '<li><a href="#day_c_'.$index.'" class="">DAY'.$index.'</a></li>';
                                     }
                                     echo $str;
                                   {/php}
                                </ul>
                            </div>
                      <div class="end"></div>
                    </div>
                    {else}
                        <div class="list-txt">
                            {$info['jieshao']}
                        </div>
                    {/if}
                  </div>
                {elseif $line['columnname']=='linedoc'}
                <a name="download"></a>
                <div class="tabcon-list">
                    <div class="list-tit"><strong>{$line['chinesename']}</strong></div>
                    <div class="list-txt">
                        <ol class="attachment" id="attachment">
                            {loop $info['linedoc']['path'] $k $v}
                            <li><a href="/pub/download/?file={$v}&name={$info['linedoc']['name'][$k]}" title="{$info['linedoc']['name'][$k]} 下载" class="name">{$info['linedoc']['name'][$k]}</a></li>
                            {/loop}
                        </ol>
                    </div>
                </div>
                {else}
                    <div class="tabcon-list">
                        <div class="list-tit"><strong>{$line['chinesename']}</strong></div>
                        <div class="list-txt">
                          {if $line['columnname'] == 'payment' && empty($line['content'])}
                            {$GLOBALS['cfg_payment']}
                          {else}
                           {$line['content']}
                          {/if}
                        </div>
                    </div>
                {/if}
            {/loop}
            {include "pub/comment"}
            {include "pub/ask"}
            </div>
          </div>
        </div><!--详情主体-->
        <div class="st-sidebox">
           {st:right action="get" typeid="$typeid" data="$templetdata" pagename="show"}
        </div><!--边栏模块-->
      </div>
    
    </div>
  </div>
    {request "pub/footer"}
    {request "pub/flink"}
    {Common::js('floatmenu/floatmenu.js')}
    {Common::js('SuperSlide.min.js,template.js,date.js,calendar.js,scorll.img.js')}
    {Common::css('/res/js/floatmenu/floatmenu.css',0,0)}
    <!--隐藏域-->
    <input type="hidden" id="suitid" value=""/>
    <input type="hidden" id="lineid" value="{$info['id']}"/>

<script type="text/javascript">
$(document).ready(function(){


    var topHeight = $('.tabnav-list').offset().top;
    $(window).scroll(function(){
        if($(document).scrollTop() >= topHeight){
            $(".yd-btn-menu").show()
        }else{
            $(".yd-btn-menu").hide();
        }
    });

    //线路内容切换
    $.floatMenu({
        menuContain : '.tabnav-list',
        tabItem : 'span',
        chooseClass : 'on',
        contentContain : '.tabbox-list',
        itemClass : '.tabcon-list'});
    //套餐选择
    $('.suitlist').find('a').click(function(){
        var minprice=$(this).attr('data-minprice');
        if(parseInt(minprice)>0){
            $('#min_price_tips').find('span:eq(0)').removeClass('hide').siblings('span').addClass('hide');
            $('#minprice').text(minprice);
        }else{
            $('#min_price_tips').find('span:eq(1)').removeClass('hide').siblings('span').addClass('hide');
        }
        var suitid = $(this).attr('data-suitid');
        var jifentprice = $(this).attr('data-jifentprice');
        var jifenbook = $(this).attr('data-jifenbook');
        if(jifentprice){
            $('.jifentprice').html(jifentprice+'元<i></i>')
        }else{
            $('.jifentprice').hide();
        }
        if(jifenbook){
            $('.jifenbook').html(jifenbook+'分<i></i>')
        }else{
            $('.jifenbook').hide();
        }
        $("#suitid").val(suitid);
        $(this).addClass('on').siblings().removeClass('on');
        var lineid = $("#lineid").val();
        get_calendar(suitid,lineid);
        get_date_list(suitid,lineid);


    })
    //选中第一个
    $('.suitlist').find('a').first().trigger('click');

    //预订页面
    $('body').delegate('.gobook','click',function(){

        var usedate = $('.date-list').val();
        var suitid = $('#suitid').val();
        var lineid = $('#lineid').val();
        if(usedate == null){
            return false;
        }
        var url = "{$GLOBALS['cfg_basehost']}/lines/book/?usedate="+usedate+'&suitid='+suitid+"&lineid="+lineid;
        window.location.href = url;
    })

				

    


    //获取日历报价
    function get_calendar(suitid,lineid)
    {

        showCalendar('calendar',suitid,function(){$(".calendar:first").css("margin-right","15px")},lineid);
    }

    //获取日历下拉列表
    function get_date_list(suitid,lineid){
        $.ajax({
            type:'POST',
            url:SITEURL+'line/ajax_date_options',
            data:{suitid:suitid,lineid:lineid},
            dataType:'json',
            success:function(data){
                $('.date-list').empty();
                var html = '';
                if(data.list!=''){

                    $.each(data.list,function(i,row){

						var people = '';
                        if(row.adultprice>0){
                            people+='{Currency_Tool::symbol()}'+row.adultprice+'/成人 ';
                        }
                        if(row.childprice>0){
                            people+='{Currency_Tool::symbol()}'+row.childprice+'/儿童 ';
                        }
                        if(row.oldprice>0){
                            people+='{Currency_Tool::symbol()}'+row.oldprice+'/老人 ';
                        }


                        html+='<option value="'+row.useday+'">'+row.shortdate+'('+row.weekday+')'+people+'</option>';
                        $(".btn-yd").text('立即预订');
                        $(".btn-yd").attr('style','background:#ff8a00');
                        $(".btn-yd").addClass('gobook');

                    })
                }
                else{
                    html+='<option value="0">请选择日期</option>';
                    $(".btn-yd").text('不可预订');
                    $(".btn-yd").attr('style','background:#ccc');
                    $(".btn-yd").removeClass('gobook');

                }
                $('.date-list').append(html);

            }
        })
    }


	
});


//预订产品
  function setBeginTime(y,m,d,price,lineid,suitid)
  {
      if(!is_login_order()){
          return false;
      }
      var udate = y+'-'+m+'-'+d;
      var url = SITEURL+"lines/book/?usedate="+udate+"&lineid="+lineid+"&suitid="+suitid;
      window.location.href = url;
  }
</script>
    {include "member/login_order"}
</body>
</html>
<script>
  $(document).ready(function(){
    $(window).onload = pageScroll();
    $(window).bind('scroll', pageScroll);
    $(".day-navlist li").click(function (e) {
        //$(window).unbind("scroll");
        var index = $(this).index(),
            offset = $('.part').eq(index).offset().top,
            scrollTop = $(window).scrollTop();
        $(".day-navlist a").removeClass("cur");
        $(this).find("a").addClass("cur");
        $("html, body").animate({
            scrollTop: offset
        }, "slow", function () {
            $(window).bind('scroll', pageScroll);
        });
        e.preventDefault();
    })
    function pageScroll() {
        var scrollTop = $(window).scrollTop();
        var size = $(".day-navlist a").size();
        var listTop = $(".part").eq(0).offset().top;
        if (size != null) {
            for (var i = 0; i < size; i++) {
                var firstOffset = $(".part").eq(0).offset().top,
                    edge = $(".part").eq(size - 1).offset().top + $(".part").eq(size - 1).height(),
                    offset = $(".part").eq(i).offset().top;
                if (scrollTop < firstOffset || scrollTop > edge) {
                    $(".day-navlist a").removeClass("cur");
                    $("#day-leftNav").hide();
                } else if (scrollTop >= offset && scrollTop <= edge) {
                    $(".day-navlist a").removeClass("cur");
                    $(".day-navlist a").eq(i).addClass("cur");
                    $("#day-leftNav").show();
                }
            }
        }
    
    }
  })
</script>