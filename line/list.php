<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>{if !empty($destinfo['seotitle'])}{$destinfo['seotitle']}{else}{$searchtitle}{/if}-{$GLOBALS['cfg_webname']}</title>
    {$destinfo['keyword']}
    {$destinfo['description']}
    {include "pub/varname"}
    {Common::css('lines.css,base.css,extend.css')}
    {Common::js('jquery.min.js,base.js,common.js,delayLoading.min.js')}
</head>

<body>

   {request "pub/header"}
  
  <div class="big">
  	<div class="wm-1200">
    
    	<div class="st-guide">
      	<a href="{$cmsurl}">{$GLOBALS['cfg_indexname']}</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;<a href="{$cmsurl}lines/">{$channelname}</a>
            {loop $predest $pre}
               &gt;&nbsp;&nbsp;<a href="{$cmsurl}lines/{$pre['pinyin']}/">{$pre['kindname']}</a>
            {/loop}
      </div><!--面包屑-->
      
      <div class="st-main-page">
      	<div class="st-linelist-box">
        	<div class="st-line-brief">
          	<div class="dest-tit">{if $destinfo['kindname']}{$destinfo['kindname']}{else}{$channelname}{/if}</div>
            {if $destinfo['jieshao']}
                <div class="brief-con">
                    {$destinfo['jieshao']}
                </div>
            {/if}
          </div><!--栏目介绍-->
          <div class="st-list-search">
          	<div class="been-tj" {if count($chooseitem)<1}style="display:none"{/if}>
            	<strong>已选条件：</strong>
              <p>
                {loop $chooseitem $item}
              	    <span class="chooseitem" data-url="{$item['url']}">{$item['itemname']}<i></i></span>
                {/loop}
                <a href="javascript:;" class="clearc">清空筛选条件 </a>
              </p>
            </div>
            <div class="line-search-tj">
              <dl class="type">
                <dt>目的地：</dt>
                <dd>
                	<p>
                       {st:dest action="query" typeid="$typeid" flag="nextsame" row="100" pid="$destid" return="destlist"}
                        {loop $destlist $dest}
                           <a {if $param['destpy']==$dest['pinyin']}class="on"{/if} href="{Model_Line::get_search_url($dest['pinyin'],'destpy',$param)}">{$dest['kindname']}</a>
                        {/loop}
                       {/st}
                  </p>
                   {if count($destlist)>10}
                   <em><b>收起</b><i class='up'></i></em>
                   {/if}
                </dd>
              </dl>
              <!--出发城市开始-->
                {if $GLOBALS['cfg_startcity_open']}
                  <dl class="type">
                    <dt>出发城市：</dt>
                    <dd>
                        <p>
                        {st:startplace action="city" row="100" return="startcitylist"}
                            {loop $startcitylist $city}
                              <a {if $param['startcityid']==$city['id']}class="on"{/if} href="{Model_Line::get_search_url($city['id'],'startcityid',$param)}">{$city['title']}</a>
                            {/loop}
                        {/st}
                      </p>
                        {if count($startcitylist)>10}
                           <em><b>收起</b><i class='up'></i></em>
                        {/if}
                    </dd>
                  </dl>
                {/if}
                <!--出发城市结束-->
                <!--属性组读取-->
              {st:attr action="query" flag="grouplist" typeid="$typeid" return="grouplist"}
                {loop $grouplist $group}
                  <dl class="type">
                    <dt>{$group['attrname']}：</dt>
                    <dd>
                        <p>
                         {st:attr action="query" flag="childitem" typeid="$typeid" groupid="$group['id']" return="attrlist"}
                            {loop $attrlist $attr}
                                <a href="{Model_Line::get_search_url($attr['id'],'attrid',$param)}" {if Common::check_in_attr($param['attrid'],$attr['id'])!==false}class="on"{/if}>{$attr['attrname']}</a>
                            {/loop}
                         {/st}
                      </p>
                    </dd>
                  </dl>
                {/loop}
              {/st}

              <dl class="type">
                <dt>出游天数：</dt>
                <dd>
                    <p>
                        {st:line action="day_list"}
                           {loop $data $r}
                            <a {if $param['dayid']==$r['word']}class="on"{/if} href="{Model_Line::get_search_url($r['word'],'dayid',$param)}">{$r['title']}</a>
                           {/loop}
                        {/st}
                    </p>
                </dd>
              </dl>
              <dl class="type">
                <dt>价格区间：</dt>
                <dd>
                    <p>

                        {st:line action="price_list"}
                            {loop $data $r}
                                <a {if $param['priceid']==$r['id']}class="on"{/if} href="{Model_Line::get_search_url($r['id'],'priceid',$param)}">{$r['title']}</a>
                            {/loop}
                        {/st}
                    </p>
                </dd>
              </dl>

            </div>
          </div><!--条件搜索-->
          <div class="st-linelist-con">
          	<div class="st-sort-menu">
            	<span class="sort-sum">
              	<a href="javascript:;">综合排序</a>
                <a href="javascript:;">价格
                    {if $param['sorttype']!=1 && $param['sorttype']!=2}
                        <i class="jg-default" data-url="{Model_Line::get_search_url(1,'sorttype',$param)}"></i>
                    {/if}
                    {if $param['sorttype']==1}
                        <i class="jg-up" data-url="{Model_Line::get_search_url(2,'sorttype',$param)}"></i>
                    {/if}
                    {if $param['sorttype']==2}
                        <i class="jg-down" data-url="{Model_Line::get_search_url(0,'sorttype',$param)}"></i></a>
                    {/if}
                <a href="javascript:;">销量
                    {if $param['sorttype']!=3}
                        <i class="xl-default" data-url="{Model_Line::get_search_url(3,'sorttype',$param)}"></i>
                    {/if}
                    {if $param['sorttype']==3}
                        <i class="xl-down" data-url="{Model_Line::get_search_url(0,'sorttype',$param)}"></i>
                    {/if}
                </a>
                <a href="javascript:;">推荐
                    {if $param['sorttype']!=4}
                        <i class="tj-default" data-url="{Model_Line::get_search_url(4,'sorttype',$param)}"></i>
                    {/if}
                    {if $param['sorttype']==4}
                        <i class="tj-down" data-url="{Model_Line::get_search_url(0,'sorttype',$param)}"></i>
                    {/if}
                </a>
              </span>
            	<span class="switch-show">
              	<a {if $param['displaytype']==0} class="on" {/if} href="{Model_Line::get_search_url(0,'displaytype',$param,$currentpage)}"><i class="lt"></i>列表模式</a>
                <a {if $param['displaytype']==1} class="on" {/if} href="{Model_Line::get_search_url(1,'displaytype',$param,$currentpage)}"><i class="pic"></i>图片模式</a>
              </span><!--切换模式-->
            </div>
           {if !empty($list)}
               {if $param['displaytype']==0}
                <div class="txt-line-list">
                    <ul>
                     {loop $list $line}

                    <li>
                        <div class="pic"><a href="{$line['url']}"><img src="{Product::get_lazy_img()}" st-src="{Common::img($line['litpic'],265,180)}" alt="{$line['title']}"/></a></div>
                      <div class="txt">
                        <p class="bt">
                          <a href="{$line['url']}" target="_blank">{$line['title']}
                              {loop $line['iconlist'] $icon}
                                <img src="{$icon['litpic']}" />
                              {/loop}
                          </a>
                        </p>
                        <p class="data">
                            <span>销量：{$line['sellnum']}</span><s>|</s>
                          <span>满意度：{$line['score']}</span><s>|</s>
                          <span>推荐：{$line['recommendnum']}</span>
                        </p>
                        <p class="ts">特色：{$line['sellpoint']}</p>
                        <p class="msg">
                            <span>
                                {if !empty($line['startcity'])}
                                 [{$line['startcity']}出发]
                                {/if}
                            </span>
                          <span>行程：{$line['lineday']} 天</span>
                          <span>出团日期：{$line['startdate']}</span>
                        </p>
                      </div>
                      <div class="booking">
                        <span class="yh">
                            {if !empty($line['price'])}
                            <i class="currency_sy">{Currency_Tool::symbol()}</i><b>{$line['price']}</b>起
                            {else}
                             电询
                            {/if}
                        </span>
                        <span class="yj">{if !empty($line['storeprice'])}原价：<del><i class="currency_sy">{Currency_Tool::symbol()}</i>{$line['storeprice']}</del>{/if}</span>
                        <a href="{$line['url']}" target="_blank">立即预订</a>
                      </div>
                    </li>
                 {/loop}
                  </ul>
                  <div class="main_mod_page clear">
                    {$pageinfo}
                  </div>
                </div><!--搜索列表-->
               {/if}
               {if $param['displaytype']==1}
               <div class="pic-line-list">
                    <ul>
                     {php}$k=1;{/php}
                     {loop $list $line}
                        <li {if $k%3==0}class="mr_0"{/if}>
                          <div class="pic">
                            <img class="fl" src="{Common::img($line['litpic'],285,194)}" alt="{$line['title']}"/>
                            <div class="buy"><a href="{$line['url']}" target="_blank">立即预订</a></div>
                          </div>
                          <div class="js">
                            <a class="tit" href="{$line['url']}" target="_blank">{$line['title']}</a>
                            <p class="attr">
                                {loop $line['iconlist'] $icon}
                                 <img src="{$icon['litpic']}" />
                                {/loop}
                            </p>
                            <p class="num">
                                {if !empty($line['storeprice'])}
                                    <del>原价：<i class="currency_sy">{Currency_Tool::symbol()}</i>{$line['storeprice']}</del>
                                {/if}
                                {if !empty($line['price'])}
                                    <span><b><i class="currency_sy">{Currency_Tool::symbol()}</i>{$line['price']}</b>起</span>
                                {else}
                                    <span><b>电询</b></span>
                                {/if}
                            </p>
                          </div>
                        </li>
                        {php}$k++{/php}
                     {/loop}

                  </ul>
                  <div class="main_mod_page clear">
                      {$pageinfo}
                  </div>
               </div>
               {/if}
           {else}
              <div class="no-content">
                  <p><i></i>抱歉，没有找到符合条件的产品！<a href="/lines/all">查看全部产品</a></p>
              </div>
           {/if}
          </div>
        </div><!--列表主体-->

        <div class="st-sidebox">
            {st:right action="get" typeid="$typeid" data="$templetdata" pagename="search"}
        </div><!--边栏模块-->
      </div>
    
    </div>
  </div>

   {request "pub/footer"}

   {request "pub/flink"}


   <script>
        $(function(){
            //线路搜索条件去掉最后一条边框
            $('.line-search-tj').find('dl').last().addClass('bor_0')
            $(".line-search-tj dl dd em").toggle(function(){
                $(this).prev().height('24px');
                $(this).children('b').text('展开');
                $(this).children('i').removeClass('up')
            },function(){
                $(this).prev().height('auto');
                $(this).children('b').text('收起');
                $(this).children('i').addClass('up')
            });

            //排序方式点击
            $('.sort-sum').find('a').click(function(){
                var url = $(this).find('i').attr('data-url');
                if(url==undefined){
                    url = location.href;
                }
                window.location.href = url;
            })
            //删除已选
            $(".chooseitem").find('i').click(function(){
                var url = $(this).parent().attr('data-url');
                window.location.href = url;
            })
            //清空筛选条件
            $('.clearc').click(function(){
                var url = SITEURL+'lines/all/';
                window.location.href = url;
            })
            //隐藏没有属性下级分类
            $(".type").each(function(i,obj){
                var len = $(obj).find('dd p a').length;
                if(len<1){
                    $(obj).hide();
                }
            })
        })

    </script>

</body>
</html>
