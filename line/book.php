<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>预订{$info['title']}-{$GLOBALS['cfg_webname']}</title>
    {include "pub/varname"}
    {Common::css('lines.css,base.css,extend.css,stcalendar.css')}
    {Common::js('jquery.min.js,base.js,common.js,SuperSlide.min.js,jquery.validate.js,jquery.validate.addcheck.js')}

</head>
<body>

{request "pub/header"}

<div class="big">
    <div class="wm-1200">

        <div class="st-guide">
            <a href="{$cmsurl}">{$GLOBALS['cfg_indexname']}</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;{$channelname}
        </div>
        <!--面包屑-->
        <div class="st-main-page">
            <div class="order-content">
                {if empty($userInfo['mid'])}
                <div class="order-hint-msg-box">
                    <p class="hint-txt">温馨提示：<a href="{$cmsurl}member/login" id="fast_login">登录</a>可享受预定送积分、积分抵现！</p>
                </div>
                <!-- 未登录提示 -->
                {/if}
                <form id="orderfrm" method="post" action="{$cmsurl}line/create">
                    <div class="con-order-box">
                        <div class="product-msg">
                            <h3 class="pm-tit"><strong class="ico01">预定信息</strong></h3>
                            <dl class="pm-list">
                                <dt>产品编号：</dt>
                                <dd>{$info['series']}</dd>
                            </dl>
                            <dl class="pm-list">
                                <dt>产品名称：</dt>
                                <dd>{$info['title']}</dd>
                            </dl>
                            <dl class="pm-list">
                                <dt>产品类型：</dt>
                                <dd>{$suitInfo['title']}</dd>
                            </dl>
                            <dl class="pm-list">
                                <dt>出发日期：</dt>
                                <dd><input type="text" class="linkman-text" name="usedate" id="inputdate" readonly
                                           value="{$info['usedate']}"></dd>
                            </dl>
                            <div class="table-msg">
                                <table width="100%" border="0" class="people_info">
                                    <tr>
                                        <th width="20%" height="40" scope="col"><span class="l-con">日期</span></th>
                                        <th width="20%" scope="col">类型</th>
                                        <th width="20%" scope="col">单价</th>
                                        <th width="20%" scope="col">购买数量</th>
                                        <th width="20%" scope="col">金额</th>
                                    </tr>
                                    {if Common::check_instr($suitInfo['propgroup'],2)}
                                    <tr>
                                        <td height="40"><span class="l-con usedate">{$info['usedate']}</span></td>
                                        <td>成人</td>
                                        <td><i class="currency_sy">{Currency_Tool::symbol()}</i><span
                                                class="txt_adultprice">{$suitPrice['adultprice']}</span></td>
                                        <td>
                                            <div class="control-box">
                                                <span class="add-btn sub is_order_number">-</span>
                                                <input type="text" id="adult_num" name="adult_num" class="number-text"
                                                       readonly value="1"/>
                                                <span class="sub-btn add">+</span>
                                            </div>
                                        </td>
                                        <td><span class="price adult_total_price"><i class="currency_sy">{Currency_Tool::symbol()}</i>{$suitPrice['adultprice']}
                                        </td>
                                    </tr>
                                    {/if}
                                    {if Common::check_instr($suitInfo['propgroup'],1)}
                                    <tr>
                                        <td height="40"><span class="l-con usedate">{$info['usedate']}</span></td>
                                        <td>小孩</td>
                                        <td><i class="currency_sy">{Currency_Tool::symbol()}</i><span
                                                class="txt_childprice">{$suitPrice['childprice']}</span></td>
                                        <td>
                                            <div class="control-box">
                                                <span class="add-btn sub is_order_number">-</span>
                                                <input type="text" id="child_num" name="child_num" class="number-text"
                                                       readonly value="1"/>
                                                <span class="sub-btn add">+</span>
                                            </div>
                                        </td>
                                        <td><span class="price child_total_price"><i class="currency_sy">{Currency_Tool::symbol()}</i>{$suitPrice['childprice']}</span>
                                        </td>
                                    </tr>
                                    {/if}
                                    {if Common::check_instr($suitInfo['propgroup'],3)}
                                    <tr>
                                        <td height="40"><span class="l-con usedate">{$info['usedate']}</span></td>
                                        <td>老人</td>
                                        <td><i class="currency_sy">{Currency_Tool::symbol()}</i><span
                                                class="txt_oldprice">{$suitPrice['oldprice']}</span></td>
                                        <td>
                                            <div class="control-box">
                                                <span class="add-btn is_order_number">-</span>
                                                <input type="text" id="old_num" name="old_num" class="number-text"
                                                       readonly value="1"/>
                                                <span class="sub-btn">+</span>
                                            </div>
                                        </td>
                                        <td><span class="price old_total_price"><i class="currency_sy">{Currency_Tool::symbol()}</i>{$suitPrice['oldprice']}</span>
                                        </td>
                                    </tr>
                                    {/if}
                                </table>
                            </div>
                        </div>
                        <!--预定信息-->
                        <div class="product-msg">
                            <h3 class="pm-tit"><strong class="ico02">联系人信息</strong></h3>
                            <dl class="pm-list">
                                <dt><span class="st-star-ico">*</span>联系人：</dt>
                                <dd><input type="text" class="linkman-text" name="linkman"
                                           value="{$userInfo['truename']}"/><span class="st-ts-text hide"></span></dd>
                            </dl>
                            <dl class="pm-list">
                                <dt><span class="st-star-ico">*</span>手机号码：</dt>
                                <dd><input type="text" class="linkman-text" name="linktel"
                                           value="{$userInfo['mobile']}"/><span class="st-ts-text hide"></span></dd>
                            </dl>
                            <dl class="pm-list">
                                <dt>电子邮箱：</dt>
                                <dd><input type="text" class="linkman-text" name="linkemail"/></dd>
                            </dl>
                            <dl class="pm-list">
                                <dt>订单留言：</dt>
                                <dd><textarea class="order-remarks" name="remark" cols="" rows=""></textarea></dd>
                            </dl>
                        </div>
                        <!--联系人信息-->

                        {if $GLOBALS['cfg_write_tourer']==1}
                        <div class="product-msg">
                            <h3 class="pm-tit"><strong class="ico03">游客信息</strong></h3>
                            {st:member action="linkman" memberid="$userInfo['mid']" return="tourerlist"}
                            {if !empty($userInfo) && !empty($tourerlist[0]['linkman'])}

                            <div class="select-linkman">
                                <div class="bt">选择常用旅客：</div>
                                <div class="son">
                                    {loop $tourerlist $row}
                                    <span data-linkman="{$row['linkman']}" data-cardtype="{$row['cardtype']}"
                                          data-idcard="{$row['idcard']}"><i></i>{$row['linkman']}</span>
                                    {/loop}
                                    {/st}
                                </div>
                                {if count($tourerlist)>5}
                                <div class="more">更多&gt;</div>
                                {/if}
                            </div>
                            <script>
                                $(function () {
                                    $('.select-linkman .more').click(function () {
                                        if ($('.select-linkman .son').attr('style') == '') {
                                            $('.select-linkman .son').attr("style", "height:auto");
                                            $(this).text('隐藏');
                                        } else {
                                            $('.select-linkman .son').attr("style", "");
                                            $(this).text('更多');
                                        }

                                    })

                                    //选择游客
                                    $('.select-linkman .son span').click(function () {
                                        var t_linkman = $(this).attr('data-linkman');
                                        var t_cardtype = $(this).attr('data-cardtype');
                                        var t_idcard = $(this).attr('data-idcard');
                                        //已选中数量

                                        var adult_num = Number($("#adult_num").val());
                                        var child_num = Number($("#child_num").val());
                                        var old_num = Number($("#old_num").val());
                                        adult_num = isNaN(adult_num) ? 0 : adult_num;
                                        child_num = isNaN(child_num) ? 0 : child_num;
                                        old_num = isNaN(old_num) ? 0 : old_num;
                                        //总人数
                                        var total_num = adult_num + child_num + old_num;


                                        $(this).find('i').toggleClass('on');
                                        var has_choose = $('.select-linkman .son span i.on').length;
                                        //如果选中数量大于总人数,则取消选中.
                                        if (has_choose > total_num) {

                                            $(this).find('i').removeClass('on');

                                            return;
                                        }

                                        //如果是选中事件
                                        if ($(this).find('i').attr('class') == 'on') {


                                            $("#tourer_list tr").each(function (i, obj) {
                                                if ($(obj).find('.t_name').first().val() == '') {
                                                    $(obj).find('.t_name').first().val(t_linkman);
                                                    $(obj).find('.t_cardtype').first().val(t_cardtype);
                                                    $(obj).find('.t_cardno').first().val(t_idcard);
                                                    return false;
                                                }

                                            })

                                        }
                                        else {

                                            $("#tourer_list tr").each(function (i, obj) {
                                                if ($(obj).find('.t_name').first().val() == t_linkman
                                                    && $(obj).find('.t_cardno').first().val() == t_idcard
                                                    && $(obj).find('.t_cardtype').first().val() == t_cardtype
                                                ) {
                                                    $(obj).find('.t_name').first().val('');
                                                    $(obj).find('.t_cardno').first().val('');
                                                    $(obj).find('.t_cardtype').first().val('请选择');
                                                }


                                            })

                                        }

                                    })
                                })
                            </script>
                            {/if}
                            <div class="visitor-msg">
                                <table width="100%" border="0" id="tourer_list">

                                </table>
                            </div>
                        </div>
                        <!--游客信息-->
                        {/if}

                        <div class="product-msg" id="roombalance_con" {if empty($suitPrice['roombalance'])}style="display:none"{/if}>
                        <h3 class="pm-tit"><strong class="ico04">全程单房差</strong></h3>

                        <div class="table-msg">
                            <table width="100%" border="0">
                                <tr>
                                    <th width="20%" height="40" scope="col"><span class="l-con">单房差</span></th>
                                    <th width="20%" scope="col">购买数量</th>
                                    <th width="20%" scope="col">付款方式</th>
                                    <th width="20%" scope="col">金额</th>
                                </tr>
                                <tr>
                                    <td height="40"><span class="l-con" id="roombalance_day">{$info['usedate']}</span>
                                    </td>
                                    <td>
                                        <div class="control-box">
                                            <span class="add-btn">-</span>
                                            <input type="text" class="number-text" id="roombalance_num"
                                                   name="roombalance_num" readonly value="0"/>
                                            <span class="sub-btn">+</span>
                                        </div>
                                    </td>
                                    <td>
                                        <select class="fk-style" name="roombalance_paytype" id="roombalance_paytype">
                                            <option value="1">预付</option>
                                            <option value="2">到店付</option>
                                        </select>
                                    </td>
                                    <td><span class="price roombalance_total_price"><i class="currency_sy">{Currency_Tool::symbol()}</i>{$suitPrice['roombalance']}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!--全程单房差-->


                    {if !empty($insuranceInfo)}
                    <div class="product-msg">
                        <h3 class="pm-tit"><strong class="ico05">保险方案</strong></h3>

                        <div class="table-msg">
                            <table width="100%" border="1">
                                <tr>
                                    <th width="50%" height="40">保险名称</th>
                                    <th width="25%">保险期限</th>
                                    <th width="25%">单价</th>
                                </tr>
                                {loop $insuranceInfo $ins}
                                <tr>
                                    <td height="40" class="ins_title"><span class="bx-tit"><i
                                                data-title="{$ins['productname']}" data-price="{$ins['ourprice']}"
                                                data-productcode="{$ins['productcode']}"></i>{$ins['productname']}</span>
                                    </td>
                                    <td>{$ins['day']}</td>
                                    <td><span class="price"><i class="currency_sy">{Currency_Tool::symbol()}</i>{$ins['ourprice']}</span>
                                    </td>
                                </tr>
                                <tr style="display: none">
                                    <td colspan="3">
                                        <div class="bx-con-show">
                                            {$ins['description']}
                                        </div>
                                    </td>
                                </tr>
                                {/loop}

                            </table>

                        </div>
                    </div>
                    <!--保险方案-->
                    {/if}
                    <!--发票信息-->
                    {include "pub/bill"}

                    <div class="product-msg">
                        <h3 class="pm-tit"><strong class="ico08">积分优惠</strong></h3>

                        <div class="jf">
                            {if $suitInfo['jifentprice']}
                            <span><em>积分抵现</em><b><i class="currency_sy">{Currency_Tool::symbol()}</i>{$suitInfo['jifentprice']}</b></span>
                            {/if}
                            {if $suitInfo['jifenbook']}
                            <span><em>预订送分</em><b>{$suitInfo['jifenbook']}</b></span>
                            {/if}
                            {if $suitInfo['jifencomment']}
                            <span><em>评论送分</em><b>{$suitInfo['jifencomment']}</b></span>
                            {/if}
                        </div>
                        <dl class="pm-list">
                            <dt>订单总额：</dt>
                            <dd>
                                <span class="zj totalprice"></span>
                                {if $suitInfo['jifenbook']}
                                <span class="hq">获得积分：{$suitInfo['jifenbook']}分</span>
                                {/if}
                            </dd>
                        </dl>
                        <!--用户为登陆状态,此套餐积分抵现金额不为0,-->
                        {if !empty($userInfo) && !empty($suitInfo['jifentprice']) && $userInfo['jifen']>$needjifen}
                        <dl class="pm-list">
                            <dt>我当前的积分：</dt>
                            <dd>
                                <div class="all-jf">{$userInfo['jifen']}</div>
                                <div class="use-jf">
                                    <span><i></i>使用{$needjifen}积分抵现</span>
                                    <em>- <i class="currency_sy">{Currency_Tool::symbol()}</i>{$suitInfo['jifentprice']}</em>

                                </div>
                            </dd>
                        </dl>
                        {/if}
                    </div>
                    <!--积分优惠-->
                    <div class="order-js-box">
                        <div class="total">订单结算总额：<span class="totalprice"></span></div>
                        <div class="yz">
                            <input type="button" class="tj-btn" value="提交订单"/>
                            <input type="text" name="checkcode" id="checkcode" class="ma-text"/>
                            <span class="pic"><img src="{$cmsurl}captcha"
                                                   onClick="this.src=this.src+'?math='+ Math.random()" width="80"
                                                   height="32"/></span>
                            <span class="bt">验证码：</span>

                        </div>
                    </div>
                    <!--提交订单-->
            </div>
            <!--订单内容-->
            <!--隐藏域-->
            <input type="hidden" name="suitid" id="suitid" value="{$suitInfo['id']}"/>
            <input type="hidden" name="lineid" id="lineid" value="{$info['id']}"/>
            <!--<input type="hidden" name="usedate" value="{$info['usedate']}"/>-->
            <input type="hidden" name="webid" value="{$info['webid']}"/>
            <input type="hidden" name="frmcode" value="{$frmcode}"><!--安全校验码-->
            <input type="hidden" name="usejifen" id="usejifen" value="0"/><!--是否使用积分-->
            <input type="hidden" name="insurance_code" id="insurance_code" value=""/><!--保险代码-->
            <input type="hidden" id="roombalance_price" value="{$suitPrice['roombalance']}"><!--单房差价格-->
            <input type="hidden" id="ins_total_price" value="0"/> <!--保险总价-->
            <input type="hidden" id="jifentprice" value="{$suitInfo['jifentprice']}"><!--积分抵现金额-->
            <input type="hidden" id="oldprice" value="{$suitPrice['oldprice']}"><!--老人价格-->
            <input type="hidden" id="childprice" value="{$suitPrice['childprice']}"><!--小孩价格-->
            <input type="hidden" id="adultprice" value="{$suitPrice['adultprice']}"><!--成人价格-->
            <input type="hidden" id="total_price" value=""/>
            </form>
        </div>
        <div class="st-sidebox">
            <div class="side-order-box">
                <div class="order-total-tit">结算信息</div>
                <div class="show-con">
                    <ul class="ul-cp">
                        <li><a class="pic" href="javascript:;"><img src="{$info['litpic']}" alt="{$info['title']}"/></a>
                        </li>
                        <li><a class="txt" href="javascript:;">{$info['title']}({$suitInfo['title']})</a></li>
                    </ul>
                    <ul class="ul-list">
                        <li>购买时间：{php echo date('Y-m-d');}</li>
                        <li>出行日期：<span class="usedate">{$info['usedate']}</span></li>
                        {if Common::check_instr($suitInfo['propgroup'],2)}
                        <li>成人：<span id="people_adult_num"></span>位 &times; <i class="currency_sy">{Currency_Tool::symbol()}</i><span
                                class="txt_adultprice">{$suitPrice['adultprice']}</span></li>
                        {/if}
                        {if Common::check_instr($suitInfo['propgroup'],1)}
                        <li>儿童：<span id="people_child_num"></span>位 &times; <i class="currency_sy">{Currency_Tool::symbol()}</i><span
                                class="txt_childprice">{$suitPrice['childprice']}</span></li>
                        {/if}
                        {if Common::check_instr($suitInfo['propgroup'],3)}
                        <li>老人：<span id="people_old_num"></span>位 &times; <i class="currency_sy">{Currency_Tool::symbol()}</i><span
                                class="txt_oldprice"> {$suitPrice['oldprice']}</span></
                        </li>
                        {/if}
                        <li>价格：<span id="people_price"><i class="currency_sy">{Currency_Tool::symbol()}</i>5000</span>
                        </li>
                    </ul>

                    <ul class="ul-list" id="roombalance_right_con" {if empty($suitPrice['roombalance'])}style="display:none"{/if}>
                    <li>单房差</li>
                    <li>数量：<span id="room_number"></span>间</li>
                    <li>付款方式：<span id="room_paytype">预付</span></li>
                    <li>价格：<span id="room_price"><i class="currency_sy">{Currency_Tool::symbol()}</i>500</span></li>
                    </ul>

                    {if !empty($insuranceInfo)}
                    <ul class="ul-list" id="ins_list">

                    </ul>

                    {/if}
                    <div class="total-price">订单总额：<span class="totalprice"><i class="currency_sy">{Currency_Tool::symbol()}</i>9995.00</span>
                    </div>
                </div>
            </div>
        </div>
        <!--订单结算信息-->
    </div>

</div>
</div>


{request "pub/footer"}
{Common::js('layer/layer.js',0)}
<div id="calendar"></div>
<script>
    $(function () {
        $('.tj-btn').click(function () {
            $("#orderfrm").submit();


        })
        //表单验证

        $("#orderfrm").validate({

            submitHandler: function(form) {
                var flag = check_storage();
                if(!flag){
                    layer.open({
                        content: '{__("error_no_storage")}',
                        btn: ['{__("OK")}']
                    });
                    return false;

                }else{
                    form.submit();
                }
            },
            errorClass: 'st-ts-text',
            errorElement: 'span',
            rules: {

                linkman: {
                    required: true

                },
                linktel: {
                    required: true,
                    isPhone: true

                },
                checkcode: {
                    required: true,
                    remote: {
                        url: SITEURL + 'line/ajax_check_code',
                        type: 'post'
                    }
                }

            },
            messages: {
                linkman: {
                    required: "请填写联系人信息"
                },
                linktel: {
                    required: "请填写联系方式"
                },
                checkcode: {
                    required: "",
                    remote: ""
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).attr('style', 'border:1px solid red');
            },
            unhighlight: function (element, errorClass) {
                $(element).attr('style', '');
            },
            errorPlacement: function (error, element) {
                if (!element.is('#checkcode')) {
                    $(element).parent().append(error)
                }
                else {
                    layer.tips('验证码错误', '#checkcode', {
                        tips: 3
                    });
                }

            }


        });

        get_total_price();
        add_tourer();

        //数量减少
        $(".control-box").find('.add-btn').click(function () {

            var obj = $(this).parent().find('.number-text');
            var cur = Number(obj.val());

            if (cur > 0) {
                cur = cur - 1;
                obj.val(cur);
                var total = get_total_num();
                if (total <= 0) {
                    obj.val(cur + 1);
                }else{
                    if($(this).hasClass('is_order_number')){
                        remove_tourer();
                    }
                }
            }

            get_total_price();
        })
        //数量添加
        $(".control-box").find('.sub-btn').click(function () {

            var obj = $(this).parent().find('.number-text');
            var cur = Number(obj.val());
            cur++;
            obj.val(cur);
            add_tourer();
            get_total_price();
        })
        //单房差预付方式
        $("#roombalance_paytype").change(function () {
            $("#room_paytype").html($(this).find("option:selected").text());
            get_total_price();
        })
        //保险选择
        $(".ins_title").click(function () {

            $(this).find('.bx-tit').find('i').toggleClass('on');
            $(this).parents('tr').first().next().toggle();

            var adult_num = Number($("#adult_num").val());
            var child_num = Number($("#child_num").val());
            var old_num = Number($("#old_num").val());
            adult_num = isNaN(adult_num) ? 0 : adult_num;
            child_num = isNaN(child_num) ? 0 : child_num;
            old_num = isNaN(old_num) ? 0 : old_num;
            var total_num = adult_num + child_num + old_num;
            var ins_total_price = 0;
            var html = ' <li>保险费用</li>';
            var arr = new Array();
            $(".ins_title").find('.bx-tit i.on').each(function (i, obj) {
                var ins_title = $(this).attr('data-title');
                var ins_price = $(this).attr('data-price');
                var ins_productcode = $(this).attr('data-productcode');
                var total = total_num * ins_price;
                ins_total_price += total;
                arr.push(ins_productcode);
                html += '<li>' + ins_title + '</li>';
                html += '<li>' + total_num + '份 &times; <i class="currency_sy">' + CURRENCY_SYMBOL + '</i>' + ins_price + '</li>';

            });
            $("#ins_total_price").val(ins_total_price);
            $('#ins_list').html(html);
            var ins_productcode = arr.join(',');
            $("#insurance_code").val(ins_productcode);
            get_total_price();


        })

        //使用积分抵现
        $('.use-jf span i').click(function () {

            var totalprice = Number($("#total_price").val());
            if ($('.use-jf span i').attr('class') != 'on') {
                var jifentprice = Number($("#jifentprice").val());
                if (jifentprice > totalprice) {
                    layer.alert('{__("can_not_tprice")}', {
                        icon: 5
                    })
                    return false;
                }
            }

            $(this).toggleClass('on');
            get_total_price();
        })

        //出发日期选择
        $("#inputdate").click(function () {
            var suitid = $("#suitid").val();
            var date = $(this).val().split('-');
            get_calendar(suitid, this, date[0], date[1]);

        });
        $('body').delegate('.prevmonth,.nextmonth', 'click', function () {

            var year = $(this).attr('data-year');
            var month = $(this).attr('data-month');
            var suitid = $(this).attr('data-suitid');
            var contain = $(this).attr('data-contain');

            get_calendar(suitid, $("#" + contain)[0], year, month);

        });

    })

    /*获取总价格*/
    function get_total_price() {
        var adult_num = Number($("#adult_num").val());
        var child_num = Number($("#child_num").val());
        var old_num = Number($("#old_num").val());
        adult_num = isNaN(adult_num) ? 0 : adult_num;
        child_num = isNaN(child_num) ? 0 : child_num;
        old_num = isNaN(old_num) ? 0 : old_num;

        var adult_price = $("#adultprice").val();
        var child_price = $("#childprice").val();
        var old_price = $("#oldprice").val();

        //按人群价格
        var adult_total_price = ST.Math.mul(adult_num, adult_price);// adult_num * adult_price;
        var child_total_price = ST.Math.mul(child_num, child_price);
        var old_total_price = ST.Math.mul(old_num, old_price);

        $(".adult_total_price").html('<i class="currency_sy">' + CURRENCY_SYMBOL + '</i>' + adult_total_price);
        $(".child_total_price").html('<i class="currency_sy">' + CURRENCY_SYMBOL + '</i>' + child_total_price);
        $(".old_total_price").html('<i class="currency_sy">' + CURRENCY_SYMBOL + '</i>' + old_total_price);


        //右侧人群价格统计信息
        var people_price = ST.Math.add(adult_total_price, child_total_price);
        people_price = ST.Math.add(people_price, old_total_price);
        $("#people_adult_num").html(adult_num);
        $("#people_child_num").html(child_num);
        $("#people_old_num").html(old_num);
        $("#people_price").html('<i class="currency_sy">' + CURRENCY_SYMBOL + '</i> ' + people_price);

        //单房差统计
        var room = $("#roombalance_num").val();
        var room_num = room == undefined ? 0 : Number(room);
        var room_price = $("#roombalance_price").val();
        var room_total_price = ST.Math.mul(room_num, room_price);
        var room_paytype = $("#roombalance_paytype").val();
        $('.roombalance_total_price').html('<i class="currency_sy">' + CURRENCY_SYMBOL + '</i> ' + room_total_price);
        //右侧单房差信息
        $("#room_number").html(room_num);
        $("#room_price").html('<i class="currency_sy">' + CURRENCY_SYMBOL + '</i>' + room_total_price);

        //右侧保险总价
        var ins_total_price = parseFloat($("#ins_total_price").val());

        var jifentprice = 0;

        //是否使用积分
        if ($('.use-jf span i').attr('class') == 'on') {
            jifentprice = $("#jifentprice").val();
            $("#usejifen").val(1);
        } else {
            $("#usejifen").val(0);
        }

        //计算总价

        var total_price =room_paytype>1?people_price:ST.Math.add(people_price, room_total_price);
        total_price = ST.Math.add(total_price, ins_total_price);
        $("#total_price").val(total_price);
        //减去积分抵现价格
        total_price = total_price - jifentprice;
        $('.totalprice').html('<i class="currency_sy">' + CURRENCY_SYMBOL + '</i>' + total_price);


    }
    /*生成tourer html*/
    function add_tourer() {

        var adult_num = parseInt($("#adult_num").val());
        var child_num = parseInt($("#child_num").val());
        var old_num = parseInt($("#old_num").val());

        adult_num = isNaN(adult_num) ? 0 : adult_num;
        child_num = isNaN(child_num) ? 0 : child_num;
        old_num = isNaN(old_num) ? 0 : old_num;
        var total_num = adult_num + child_num + old_num;
        var html = '';
        var hasnum = $("#tourer_list").find('tr').length;

        for (var i = hasnum; i < total_num; i++) {

            html += ' <tr>';
            html += '<td width="40%" height="60"><span class="st-star-ico fl">*</span><span class="child"><em>姓名：</em><input type="text" name="t_name[' + i + ']"';
            html += ' class="lm-text t_name" /></span></dd></td>';
            html += '<td width="60%">';
            html += '<span class="st-star-ico fl">*</span>';
            html += '<span class="child">';
            html += '<em>证件号：</em>';
            html += '<select class="t_cardtype" name="t_cardtype[' + i + ']">';
            html += '<option value="0">请选择</option>';
            html += '<option value="护照">护照</option>';
            html += '<option value="身份证">身份证</option>';
            html += '<option value="台胞证">台胞证</option>';
            html += '<option value="港澳通行证">港澳通行证</option>';
            html += '<option value="军官证">军官证</option>';
            html += '<option value="出生日期">出生日期</option>';
            html += '</select>';
            html += '<input type="text" class="lm-text t_cardno" name="t_cardno[' + i + ']" />';
            html += '</span>';
            html += '</td>';
            html += '</tr>';
        }
        $("#tourer_list").append(html);
        if (hasnum == 0) {
            var tourname = "{$userInfo['truename']}";
            var tour_mobile = "{$userInfo['mobile']}";
            var tour_idcard = "{$userInfo['cardid']}";
            var obj = $("#tourer_list").find('tr').first();
            obj.find('.t_name').val(tourname);
            obj.find('.t_cardno').val(tour_idcard);
            obj.find('.t_cardtype').val('身份证');
        }
        //动态添加游客姓名
        $("input[name^='t_name']").each(
            function (i, obj) {
                //console.log(obj);
                //$(obj).rules("remove");
                $(obj).rules("add", {required: true, messages: {required: "请输入姓名"}});
            }
        )
        //证件类型
        $("input[name^='t_cardno']").each(
            function (i, obj) {
                $(obj).rules("remove");
                $(obj).rules("add", {required: true, messages: {required: "请输入证件号"}});
            }
        )

    }
    /*移除tourer*/
    function remove_tourer() {
        $("#tourer_list tr").last().remove();
    }

    function get_total_num() {
        var adult_num = Number($("#adult_num").val());
        var child_num = Number($("#child_num").val());
        var old_num = Number($("#old_num").val());
        adult_num = isNaN(adult_num) ? 0 : adult_num;
        child_num = isNaN(child_num) ? 0 : child_num;
        old_num = isNaN(old_num) ? 0 : old_num;
        return adult_num + child_num + old_num;
    }


    function get_calendar(suitid, obj, year, month) {
        //加载等待
        layer.open({
            type: 3,
            icon: 2

        });
        var containdiv = '';
        if (obj) {
            containdiv = $(obj).attr('id');
        }
        var url = SITEURL + 'line/dialog_calendar';
        var lineid = $('#lineid').val();

        $.post(url, {
            suitid: suitid,
            year: year,
            month: month,
            containdiv: containdiv,
            lineid: lineid
        }, function (data) {
            if (data) {
                $("#calendar").html(data);
                $("#calendar").data(suitid, data);
                show_calendar_box();

            }
        })
    }
    function show_calendar_box() {
        layer.closeAll();
        layer.open({
            type: 1,
            title: '',
            area: ['480px', '430px'],
            shadeClose: true,
            content: $('#calendar')
        });

    }
    //选择日期
    function choose_day(day, containdiv) {

        var suitid = $("#suitid").val();
        var url = SITEURL + 'line/ajax_price_day';
        $.getJSON(url, {'useday': day, 'suitid': suitid}, function (data) {
            $('#adultprice').val(data.adultprice);
            $('#childprice').val(data.childprice);
            $('#oldprice').val(data.oldprice);
            $('.usedate').text(day);

            $('.txt_adultprice').text(data.adultprice);
            $('.txt_childprice').text(data.childprice);
            $('.txt_oldprice').text(data.oldprice);

            $("#roombalance_price").val(data.roombalance);
            $("#roombalance_day").text(day);


            if (data.roombalance != 0 && data.roombalance != '') {
                $("#roombalance_con").show();
                $("#roombalance_right_con").show();

            }
            else {
                $("#roombalance_con").hide();
                $("#roombalance_right_con").hide();
            }


            get_total_price();
        });
        $('#' + containdiv).val(day);
        layer.closeAll();
    }

    //检测库存
    function check_storage() {
        var adult_num = Number($("#adult_num").val());
        var child_num = Number($("#child_num").val());
        var old_num = Number($("#old_num").val());
        adult_num = isNaN(adult_num) ? 0 : adult_num;
        child_num = isNaN(child_num) ? 0 : child_num;
        old_num = isNaN(old_num) ? 0 : old_num;

        var startdate = $("#inputdate").val();
        var dingnum = adult_num+child_num+old_num;
        var productid = $("#lineid").val();
        var suitid = $("#suitid").val();
        var flag = 1;
        $.ajax({
            type: 'POST',
            url: SITEURL + 'line/ajax_check_storage',
            data: {startdate: startdate,  dingnum: dingnum, productid: productid,suitid:suitid},
            async: false,
            dataType: 'json',
            success: function (data) {
                flag = data.status;
            }
        })
        return flag;

    }


</script>
{if empty($userInfo['mid'])}
{Common::js('jquery.md5.js')}
{include "member/login_fast"}
<script>
    $('#fast_login').click(function () {
        $('#is_login_order').removeClass('hide');
        return false;
    });
</script>
{/if}
</body>
</html>
