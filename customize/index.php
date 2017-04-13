<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta charset="utf-8">
    <title>{$seoinfo['seotitle']}-{$GLOBALS['cfg_webname']}</title>
    {if $seoinfo['keyword']}
    <meta name="keywords" content="{$seoinfo['keyword']}" />
    {/if}
    {if $seoinfo['description']}
    <meta name="description" content="{$seoinfo['description']}" />
    {/if}
    {include "pub/varname"}
    {Common::css('custom.css,base.css,extend.css')}
    {Common::js('jquery.min.js,base.js,common.js')}
</head>

<body>

   {request "pub/header"}
  
  <div class="dz-banner-box"></div><!-- banner -->
  
  <div class="big">
  	<div class="wm-1200">
    
    	<div class="custom-super">
      	<ul>
        	<li class="sm">
          	<strong>私密</strong>
            <span>家庭成员、亲密好友<br>独立成团、随时出发</span>
          </li>
        	<li class="sx">
          	<strong>省心</strong>
            <span>交通、酒店、导游<br>全程服务设计安排</span>
          </li>
        	<li class="zs">
          	<strong>专属</strong>
            <span>“一对一”路线订制<br>打造独一无二专属旅行</span>
          </li>
        	<li class="ld">
          	<strong>灵动</strong>
            <span>告别每日既定式行程<br>路线景点随心安排</span>
          </li>
        </ul>
      </div>
    
    </div>
  </div><!-- 个性化 -->
  
  <div class="big custom-content">
  	<div class="wm-1200">
    	
      <div class="custom-bt">
      	<h3><strong>我们能为您做的更多！</strong>Because of you!</h3>
        <p>为更好的了解您的旅行计划，为您提供完美的订制服务，请完善以下资料。</p>
      </div>
      <form id="cusfrm" method="post" action="{$cmsurl}customize/ajax_save">
      <div class="custom-block">
      	<h3>step1&nbsp;&nbsp;您的旅行计划</h3>
        <div class="block-content">
        	<ul>
          	<li class="half-li">
            	<em class="item">目的地：</em>
              <div class="con"><input type="text" class="custom-default-text w270 noblank" name="dest" /></div>
            </li>
          	<li class="half-li">
            	<em class="item">出发时长：</em>
              <div class="con"><input type="text" class="custom-default-text w270 noblank"   name="days" /></div>
            </li>
          	<li class="half-li">
            	<em class="item">出发时间：</em>
              <div class="con"><input type="text" class="custom-default-text w270 noblank starttime" name="starttime" /></div>
            </li>
          	<li class="half-li">
            	<em class="item">成人数：</em>
              <div class="con"><input type="text" class="custom-default-text w270 noblank" name="adultnum" /></div>
            </li>
          	<li class="half-li">
            	<em class="item">出发地点：</em>
              <div class="con"><input type="text" class="custom-default-text w270 noblank" name="startplace" /></div>
            </li>
          	<li class="half-li">
            	<em class="item">儿童数：</em>
              <div class="con"><input type="text" class="custom-default-text w270"  name="childnum"/></div>
            </li>
          	<li class="full-li">
            	<em class="item">交通方式：</em>
              <div class="con">
                  <input type="hidden" name="planerank" value="飞机"/>
              	<a class="custom-child-item cc-active" href="javascript:void(0)">飞机</a>
              	<a class="custom-child-item" href="javascript:void(0)">火车</a>
              	<a class="custom-child-item" href="javascript:void(0)">汽车</a>
              	<a class="custom-child-item" href="javascript:void(0)">自驾</a>
              	<a class="custom-child-item" href="javascript:void(0)">无</a>
              </div>
            </li>
          	<li class="full-li">
            	<em class="item">酒店星级：</em>
              <div class="con">
                  <input type="hidden" name="hotelrank" value="三星级"/>
              	<a class="custom-child-item cc-active" href="javascript:void(0)">三星级</a>
              	<a class="custom-child-item" href="javascript:void(0)">四星级</a>
              	<a class="custom-child-item" href="javascript:void(0)">五星级</a>
              	<a class="custom-child-item" href="javascript:void(0)">五星级以上</a>
              	<a class="custom-child-item" href="javascript:void(0)">快捷经济型</a>
              	<a class="custom-child-item" href="javascript:void(0)">其他</a>
              </div>
            </li>
          	<li class="full-li">
            	<em class="item">需要房型：</em>
              <div class="con">
                  <input type="hidden" name="room" value="单人"/>
              	<a class="custom-child-item cc-active" href="javascript:void(0)">单人</a>
              	<a class="custom-child-item" href="javascript:void(0)">双人大床房</a>
              	<a class="custom-child-item" href="javascript:void(0)">双人分床房</a>
              	<a class="custom-child-item" href="javascript:void(0)">套间</a>
              	<a class="custom-child-item" href="javascript:void(0)">海景房</a>
              	<a class="custom-child-item" href="javascript:void(0)">其他</a>
              </div>
            </li>
          	<li class="full-li">
            	<em class="item">用餐形式：</em>
              <div class="con">
                  <input type="hidden" name="food" value="自理"/>
              	<a class="custom-child-item cc-active" href="javascript:void(0)">自理</a>
              	<a class="custom-child-item" href="javascript:void(0)">部分自理</a>
              	<a class="custom-child-item" href="javascript:void(0)">全面用餐</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
      
      <div class="custom-block">
      	<h3>step2&nbsp;&nbsp;您的联系方式</h3>
        <div class="block-content">
        	<ul>
          	<li class="half-li">
            	<em class="item">您的称呼：</em>
              <div class="con"><input type="text" class="custom-default-text w270 noblank" name="contactname" /></div>
            </li>
          	<li class="half-li">
            	<em class="item">您的性别：</em>
              <div class="con">
                  <input type="hidden" name="sex" value="先生"/>
              	<a class="custom-child-item cc-active" href="javascript:void(0)">先生</a>
              	<a class="custom-child-item" href="javascript:void(0)">女士</a>
              </div>
            </li>
          	<li class="half-li">
            	<em class="item">联系电话：</em>
              <div class="con"><input type="text" class="custom-default-text w270 noblank" name="phone" /></div>
            </li>
          	<li class="half-li">
            	<em class="item">电子邮箱：</em>
              <div class="con"><input type="text" class="custom-default-text w270" name="email" /></div>
            </li>
          	<li class="full-li">
            	<em class="item">所在地点：</em>
              <div class="con"><input type="text" class="custom-default-text w790 noblank" name="address" /></div>
            </li>
          	<li class="full-li">
            	<em class="item">合适的联系时间：</em>
              <div class="con">
                <input type="hidden" name="contacttime" value="9:00-12:00"/>
              	<a class="custom-child-item cc-active" href="javascript:void(0)">9：00-12：00</a>
              	<a class="custom-child-item" href="javascript:void(0)">14：00-18：00</a>
              	<a class="custom-child-item" href="javascript:void(0)">19：00-22：00</a>
              </div>
            </li>
          	<li class="full-li">
            	<em class="item">其他备注：</em>
              <div class="con">
              	<textarea cols="" rows="" class="remarks-textarea w790" name="content"></textarea>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <input type="hidden" name="frmcode" value="{$frmcode}"/>
      <div class="custom-submit-block"><a href="javascript:;" class="custom-submit-btn" onClick="checkForm()">提交定制</a></div>
      </form>
      
    </div>
  </div>
   <script src="/tools/js/DatePicker/WdatePicker.js"></script>
   {Common::js('layer/layer.js',0)}
   <script>
       $("li .con a").click(function(e) {
           $(this).siblings("input:hidden").val($(this).text());
           $(this).siblings("a").removeClass("cc-active");
           $(this).addClass("cc-active");
       });
       //日历选择
       $(".starttime").click(function(){
           WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd',minDate:'%y-%M-%d'})
       })

       $(".custom-submit-btn").click(function(){
           $("#cusfm").submit();
       })

       function checkForm()
       {

           var isvalidate=true;
           $(".noblank").each(function(index, element) {
               var val=$(element).val();
               val=$.trim(val);
               if(!val)
               {
                   var offset=$(element).offset();
                   $(window).scrollTop(offset.top-100);
                   $(element).css("border","1px solid red");
                   isvalidate=false;
                   return false;
               }
               else
               {
                   $(element).css("border","1px solid #dcdcdc");
               }
           });
           if(isvalidate){

               $("#cusfm").submit();
               $.ajax({
                   type:'POST',
                   url:SITEURL+'customize/ajax_save',
                   data:$("#cusfrm").serialize(),
                   dataType:'json',
                   success:function(data){
                       if(data.status){
                           layer.alert("提交成功", {
                               icon: 1,
                               skin: 'layer-ext-moon',
                               yes:function()
                               {
                                   window.location.reload();
                               }
                           })

                       }else{
                           layer.alert("提交失败", {
                               icon: 2,
                               skin: 'layer-ext-moon'
                           })
                       }
                   }
               })
           }
               //$("#cusfm").submit();
       }



   </script>
   {request "pub/footer"}


</body>
</html>
