/*##20130301##*/
pageConfig.product.urlskuid=pageConfig.product.skuid;
$("#product-intro .clearfix").attr("clstag","");
var locPageHost = pageConfig.FN_getDomain();
var iplocjsversion = "1.0";
/* ͼƬ���� */
var scrollVisible_noitem = pageConfig.wideVersion&&pageConfig.compatible ? 5 : 4,
    scrollVisible_itemover = pageConfig.wideVersion&&pageConfig.compatible ? 6 : 4;
(function(a){a.fn.imgScroll=function(b){return this.each(function(){var e=a.extend({evtType:"click",visible:1,showControl:true,showNavItem:false,navItemEvtType:"click",navItemCurrent:"current",showStatus:false,direction:"x",next:".next",prev:".prev",disableClass:"disabled",speed:300,loop:false,step:1,ie6DisableClass:"disableIE6"},b);var l=a(this),q=l.find("ul"),p=q.find("li"),h=e.width||p.outerWidth(),d=e.height||p.outerHeight(),u=p.length,c=e.visible,j=e.step,i=parseInt((u-c)/j),v=0,m=l.css("position")=="absolute"?"absolute":"relative",x=p.css("float")!=="none",t=a('<div class="scroll-nav-wrap"></div>'),f=e.direction=="x"?"left":"top",k=e.direction=="x",r=typeof e.prev=="string"?a(e.prev):e.prev,s=typeof e.next=="string"?a(e.next):e.next,w=a.browser.isIE6?e.ie6DisableClass:"";e.loop=false;function o(){if(!x){p.css("float","left")}q.css({position:"absolute",left:0,top:0});l.css({position:m,width:e.direction=="x"?c*h:p.outerWidth(),height:e.direction=="x"?d:c*d,overflow:"hidden"});r.addClass(e.disableClass+w);if(e.loop){}else{if((u-c)%j!==0&&u>c){var A=j-(u-c)%j;q.append(p.slice(0,A).clone());u=q.find("li").length;i=parseInt((u-c)/j)}}if(k){q.css("width",u*h)}else{q.css("height",u*d)}if(!e.showControl&&u<=c){s.hide();r.hide()}else{s.show();r.show()}if(u<=c){s.addClass(e.disableClass);r.addClass(e.disableClass)}else{r.addClass(e.disableClass);s.removeClass(e.disableClass)}if(e.showNavItem){for(var y=0;y<=i;y++){var z=y==0?e.navItemCurrent:"";t.append('<em class="'+z+'">'+(y+1)+"</em>")}l.after(t);t.find("em").bind(e.navItemEvtType,function(){var B=parseInt(this.innerHTML);g((B-1)*j)})}if(e.showStatus){l.after('<span class="scroll-status">'+1+"/"+(i+1)+"</span>")}}function g(y){if(q.is(":animated")){return false}if(y<0){r.addClass(e.disableClass+w);return false}if(y+c>u){s.addClass(e.disableClass);return false}v=y;q.animate(e.direction=="x"?{left:-((y)*h)}:{top:-((v)*d)},e.speed,function(){if(y>0){r.removeClass(e.disableClass+w)}else{r.addClass(e.disableClass+w)}if(y+c<u){s.removeClass(e.disableClass)}else{s.addClass(e.disableClass)}n(y)})}function n(y){t.find("em").removeClass(e.navItemCurrent).eq(y/j).addClass(e.navItemCurrent);if(e.showStatus){a(".scroll-status").html(((y/j)+1)+"/"+(i+1))}}o();if(u>c){s.click(function(){g(v+j)});r.click(function(){g(v-j)})}})}}(jQuery));
// ������ּ۸�
var getPriceNum = function(skus, $wrap, perfix, callback) {
    skus = typeof skus === 'string' ? [skus]: skus;
    $wrap = $wrap || $('body');
    perfix = perfix || 'J-p-';
    $.ajax({
        url: 'http://p.3.cn/prices/mgets?skuIds=J_' + skus.join(',J_') + '&type=1',
        dataType: 'jsonp',
        success: function (r) {
            if (!r && !r.length) {
                return false;
            }
            for (var i = 0; i < r.length; i++) {
                var sku = r[i].id.replace('J_', '');
                var price = parseFloat(r[i].p, 10);

                if (price > 0) {
                    $wrap.find('.'+ perfix + sku).html('��' + r[i].p + '');
                } else {
                    $wrap.find('.'+ perfix + sku).html('���ޱ���');
                }

                if ( typeof callback === 'function' ) {
                    callback(sku, price, r);
                }
            }
        }
    });
};
/* ---------- ��㹫�� ---------- */
function log (type1, type2, arg1, arg2, arg3, arg4, arg5, arg6, arg7, arg8, arg9, arg10) {
    var data = '';
    for (i = 2; i < arguments.length; i++) {
        data = data + arguments[i] + '|||';
    }
    var pin = decodeURIComponent(escape(getCookie("pin")));
    var loguri = "http://csc.jd.com/log.ashx?type1=$type1$&type2=$type2$&data=$data$&pin=$pin$&referrer=$referrer$&jinfo=$jinfo$&callback=?";
    var url = loguri.replace(/\$type1\$/, escape(type1));
    url = url.replace(/\$type2\$/, escape(type2));
    url = url.replace(/\$data\$/, escape(data));
    url = url.replace(/\$pin\$/, escape(pin));
    url = url.replace(/\$referrer\$/, escape(document.referrer));
    url = url.replace(/\$jinfo\$/, escape(''));
    $.getJSON(url, function() {});
    var traceurl = ("https:" == document.location.protocol ? "https://mercuryssl" : "http://mercury") + ".jd.com/log.gif"
                    + "?t=other.000000"
                    + "&m=UA-J2011-1"
                    + "&v=" + encodeURIComponent('t1='+type1+'$t2='+type2+'$p0='+data)
                    + "&ref=" + encodeURIComponent(document.referrer)
                    + "&rm=" + (new Date).getTime();
    var d = new Image(1, 1);
    d.src = traceurl;       
}
/**
 * �°�-�����ͳ��-ҳ��pv����ʾ����
 * wpid ����Ʒ�������࣬û��Ϊ�մ�''
 * psku ����Ʒsku��û��Ϊ�մ�''�����������жϴ���ƷΪpop���Ƿ�pop
 * markId �Ƽ�λ��ǣ����ű�Ҫ
 * op s:��ʾ��p:pv
 */
function clsPVAndShowLog(wpid, psku, markId, op) {
    var key = wpid + "." + markId + "." + skutype(psku) + "." + op;
    log('d', 'o', key);
}
function clsClickLog(wpid, psku, rsku, markId, num, reCookieName) {
    var key = wpid + "." + markId + "." + skutype(psku);
    appendCookie(reCookieName, rsku, key);
    log('d', 'o', key + ".c");
}
function appendCookie(reCookieName, sku, key) {
    var reWidsCookies = eval('(' + getCookie(reCookieName) + ')');
    if (reWidsCookies == null || reWidsCookies == '') {
        reWidsCookies = new Object();
    }
    if (reWidsCookies[key] == null) {
        reWidsCookies[key] = '';
    }
    var pos = reWidsCookies[key].indexOf(sku);
    if (pos < 0) {
        reWidsCookies[key] = reWidsCookies[key] + "," + sku;
    }
    setCookie(reCookieName, $.toJSON(reWidsCookies), 15);
}
function skutype(sku) {
    if (sku) {
        var len = sku.toString().length;
        return len==10 ? 1 : 0;
    }
    return 0;
}
function setCookie(name, value, date) {
    var Days = date;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
    document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString() + ";path=/;domain=."+locPageHost;
}
function getCookie(name) {
    var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
    if (arr != null) return unescape(arr[2]);
    return null;
}
function reClick(type2, pwid, sku, num) {
    name = "reWids" + type2;
    reWids = getCookie(name);
    if (reWids != null) {
        reWids = reWids.toString();
        var pos = reWids.indexOf(sku);
        if (pos < 0) {
            reWids = reWids + "," + sku;
        }
    }
    else {
        reWids = sku;
    }
    setCookie(name, reWids, 15);

    sku = sku.split("#");
    log(3, type2, sku[0]);
    //log('RC', 'CK', type2, pwid, sku[0], num);
}

function readPinCookie(name) {
    //��ȡcookies����
    var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
    if (arr != null) return arr[2];
    return '';
}

/**
 * �����ͳ�ƣ��������磺clsLog("3425&special","","174620#988",4,"reWidsBookSpecial")
 * @param type2 ��������
 * @param pwid  ��ǰ��Ʒwid��û��Ϊ�մ�''
 * @param sku   �Ƽ���Ʒwid
 * @param num   λ�ã���0��ʼ
 * @param reCookieName   cookieName
 */
function clsLog(type2, pwid, sku, num, reCookieName) {
    var reWidsClubCookies = eval('(' + getCookie(reCookieName) + ')');
    if (reWidsClubCookies == null || reWidsClubCookies == '') {
        reWidsClubCookies = new Object();
    }
    if (reWidsClubCookies[type2] == null) {
        reWidsClubCookies[type2] = '';
    }
    var pos = reWidsClubCookies[type2].indexOf(sku);
    if (pos < 0) {
        reWidsClubCookies[type2] = reWidsClubCookies[type2] + "," + sku;
    }
    setCookie(reCookieName, $.toJSON(reWidsClubCookies), 15);
    sku = sku.split("#");
    log(3, type2, sku[0]);
    //log('RC', 'CK', type2, pwid, sku[0], num);
}
function mark(b,a){ log(1,a,b);}
/* ---------- ��㹫�� end ---------- */
var noItemOver = {
    // �޻����¹�ҳ���Ƽ��б�
    init: function( type ) {

        this.type = type || 1;  //3cΪ1���հ�Ϊ2


        this.outOfStockTPL = ''
            +'<div class="w">'
            +'    <div id="out-of-stock" class="m m2 hide">'
            +'        <div class="mt">'
            +'            <h2>����������Ʒ</h2>'
            +'        </div>'
            +'        <div class="mc">'
            +'            <div id="noitem-related-list">'
            +'                <div class="noitem-related-list">'
            +'                    <a href="javascript:;" class="spec-control disabled" id="noitem-forward"></a>'
            +'                    <a href="javascript:;" class="spec-control" id="noitem-backward"></a>'
            +'                    <div id="noitem-list">'
            +'                            <div class="iloading">���ڼ����У����Ժ�...</div>'
            +'                    </div>'
            +'                </div>'
            +'            </div>'
            +'        </div>'
            +'    </div>'
            +'</div>';

        var isNoItem = $('#product-intro').hasClass('product-intro-noitem'),
            isOver = $('#product-intro').hasClass('product-intro-itemover');

        if ( !isNoItem && !isOver ) {

            $('#out-of-stock,#noitem-related-list,#itemover-related-list,#itemover1-related-list').remove();
            return false;
        }
        if ( isNoItem ) {
            this.noItem();
        }
        //if ( isOver ) {
            //this.itemOver();
        //}

    },
    noItem: function( isItemOver ) {
        var imgStr = isItemOver ? '<img height="100" width="100" src="${pageConfig.FN_GetImageDomain(list.skuId)}n4/${list.imgUrl}">' : '<img height="130" width="130" src="${pageConfig.FN_GetImageDomain(list.skuId)}n3/${list.imgUrl}">';
        // �޻��Ƽ��б�[�Ϸ���]
        var noItem_TPL_OLD = '{for list in html}'
            +'<li class="fore fore${list_index}" data-push="${}">'
            +'  <div class="p-img">'
            +'      <a target="_blank" href="${list.skuId}.html">'+imgStr+'</a>'
            +'  </div>'
            +'  <div class="p-name">'
            +'      <a target="_blank" title="${list.name}" href="${list.skuId}.html">${list.Name}</a>'
            +'  </div>'
            +'  <div class="p-price">'
            +'      <strong class="J-p-${list.skuId}"></strong>'
            +'  </div>'
            +'</li>'
            +'{/for}';
        var url = 'http://d.360buy.com/nostockrecomm/get?productId=' + pageConfig.product.skuid,
            _this = this,
            isItemOver = isItemOver || false;


        log( pageConfig.product.cat[0] + "&SORecPage", 'Show');

        $.ajax({
            url: url,
            dataType: 'jsonp',
            data: {
                productId: pageConfig.product.skuid
            },
            success: function( data ) {


                if ( data && (typeof data.html !== 'undefined') && data.html !== null && data.html.length > 0 ) {

                    if ( isItemOver ) {
                        if ( $('#noitem-related-list').length < 1 ) {
                            $('#choose').after('<div id="noitem-related-list"><p>����������Ʒ</p><div class="noitem-related-list"><div class="iloading">���ڼ����У����Ժ�...</div></div>');
                        } else {
                            $('#itemover-related-list').show();
                        }
                    } else {
                        if ( $('#out-of-stock').length < 1 ) {
                            $('#product-intro').parent().after(_this.outOfStockTPL);
                        } else {
                            $('#out-of-stock').show();
                        }
                    }


                    $('#noitem-related-list .noitem-related-list').html( '<a href="javascript:;" class="spec-control disabled" id="noitem-forward"></a><a href="javascript:;" class="spec-control" id="noitem-backward"></a><div id="noitem-list"><ul>' + noItem_TPL_OLD.process( data ) + '</ul></div>' );
                    $('#noitem-related-list').attr('loaded', 'true');


                    //ͼƬ�������޻�ҳ�桿
                    $('#noitem-list').imgScroll({
                        visible: scrollVisible_itemover,
                        showControl: true,
                        speed: 200,
                        step: scrollVisible_itemover,
                        loop: false,
                        prev: '#noitem-forward',
                        next: '#noitem-backward',
                        disableClass: 'disabled'
                    });

                } else if ( !data || data.html == null || data.html.length < 1 ) {
                    _this.noItemNoData(isItemOver);
                }
            }
        });
    },
    itemOver: function() {
        // ����� - �����3c
        var listBrosweBroswe_TPL = '<li onclick="reClick(1, '+pageConfig.product.skuid+',\'${wid}#${wmeprice}\', [#]);">'
            +'  <div class="p-img">'
            +'      <a target="_blank" title="${name}" href="${wid}.html"><img height="100" width="100" alt="${name}" src="${pageConfig.FN_GetImageDomain(wid)}n4/${imgurl}"></a>'
            +'  </div>'
            +'  <div class="p-name">'
            +'      <a target="_blank" title="${name}" href="${wid}.html">${name}</a>'
            +'  </div>'
            +'  <div class="p-price">'
            +'      <strong class="J-p-${wid}"></strong>'
            +'  </div>'
            +'</li>';

        var urlRelated = 'http://simigoods.jd.com/SoldOutRecJsonData.aspx?ip='+ getCookie("ipLocation") +'&wids='+ pageConfig.product.skuid;
        var urlBroswerBuy = 'http://simigoods.jd.com/ThreeCCombineBuying/ThreeCBroswerBroswerJsonData.aspx?ip=' + getCookie('ipLocation') + '&wids=' + pageConfig.product.skuid;
        var _this = this;

        _this.noItem( true );

        //�¹�ҳ���˻�����
        $.ajax({
            url: urlBroswerBuy,
            dataType: 'jsonp',
            success: function(data) {
                var resHTML = [];
                pageConfig.product.listBrosweBroswe = [];

                //log('RemovedArk', 'Show');
                log('R1','Show');

                if ( data == null ) {
                    return false;
                }
                for ( var i = 0; i < data.length; i++ ) {
                    resHTML.push( listBrosweBroswe_TPL.process(data[i]).replace('[#]', i) );
                    pageConfig.product.listBrosweBroswe.push(data[i].wid);
                }
                $('#itemover1-related-list').show();
                $('#itemover1-related-list .itemover1-related-list').html( '<a href="javascript:;" class="spec-control disabled" id="itemover1-forward"></a><a href="javascript:;" class="spec-control disabled" id="itemover1-backward"></a><div id="itemover1-list"><ul>' + resHTML.join('') + '</ul></div>' );

                getPriceNum(pageConfig.product.listBrosweBroswe, $('#itemover1-related-list'));

                //ͼƬ�������¹�ҳ��-���˻����ˡ�
                $('#itemover1-list').imgScroll({
                    visible: scrollVisible_itemover,
                    showControl: false,
                    speed: 200,
                    step: scrollVisible_itemover,
                    loop: false,
                    prev: '#itemover1-forward',
                    next: '#itemover1-backward',
                    disableClass: 'disabled',
                    width: 130,
                    height:165
                });
            }
        });
    },
    noItemNoData: function( isItemOver ) {
        var _this = this;
        var outStock = $('#out-of-stock .mc');
        var rid = pageConfig.product.type == 1 ? 103000 : 102000;

        if(!outStock.length) {
            $('#product-intro').parent().after(_this.outOfStockTPL);
        }
        if (!isItemOver) {
            setTimeout(function() {

                if (typeof Grecommend === 'undefined') return;

				var rec_103000 = new Grecommend(G.sku, rid, readCookie('ipLoc-djd'), $('#out-of-stock #noitem-list'), 20);
				log(pageConfig.product.cat[0] + "&SORec", 'Show');
            }, 500);
        }
        
        return;

        var imgStr = isItemOver ? '<img height="100" width="100" src="${pageConfig.FN_GetImageDomain(list.wid)}n4/${list.imgurl}">' : '<img height="130" width="130" src="${pageConfig.FN_GetImageDomain(list.wid)}n3/${list.imgurl}">';
        // �޻��Ƽ��б�[�·���]
        var noItem_TPL = '{for list in MySoldOut}'
            +'<li data-push="${pageConfig.product.noItemData.push(list.wid)}" class="fore fore${list_index}" onclick="reClick2(\''+pageConfig.product.cat[0]+'&SORec\','+pageConfig.product.skuid+', \'${list.wid}#${list.wmeprice}\', ${list_index})">'
            +'  <div class="p-img">'
            +'      <a target="_blank" href="${list.wid}.html">'+imgStr+'</a>'
            +'  </div>'
            +'  <div class="p-name">'
            +'      <a target="_blank" title="${list.name}" href="${list.wid}.html">${list.name}</a>'
            +'  </div>'
            +'  <div class="p-price">'
            +'      <strong class="J-p-${list.wid}"></strong>'
            +'  </div>'
            +'</li>'
            +'{/for}';

        // û���Ƽ�����ʱ���������ݽӿ�
        var url = 'http://simigoods.jd.com/SoldOutRecJsonData.aspx?ip='+ getCookie("ipLocation") +'&wids='+ pageConfig.product.skuid,
            _this = this;

        $.ajax({
            url: url,
            dataType: 'jsonp',
            success: function(data) {
                pageConfig.product.noItemData = [];

                if ( data.MySoldOut !== null && data !== null ) {

                    if ( isItemOver ) {
                        if ( $('#noitem-related-list').length < 1 ) {
                            $('#choose').after('<div id="noitem-related-list"><p>����������Ʒ</p><div class="noitem-related-list"><div class="iloading">���ڼ����У����Ժ�...</div></div>');
                        }
                    } else {
                        if ( $('#out-of-stock').length < 1 ) {
                            $('#product-intro').parent().after(_this.outOfStockTPL);
                        } else {
                            $('#out-of-stock').show();
                        }
                    }

                    log(pageConfig.product.cat[0] + "&SORec", 'Show');


                    $('#noitem-related-list').attr('iplocation', getCookie("ipLocation"));

                    if ( isItemOver ) {
                        $('#itemover-related-list').show().find('.itemover-related-list').html('<a href="javascript:;" class="spec-control disabled" id="itemover-forward"></a><a href="javascript:;" class="spec-control disabled" id="itemover-backward"></a><div id="itemover-list"><ul>' + noItem_TPL.process(data) + '</ul></div>');

                        getPriceNum(pageConfig.product.noItemData, $('#itemover-related-list'));

                        //ͼƬ�������¹�ҳ��-����������Ʒ��
                        $('#itemover-list').imgScroll({
                            visible: scrollVisible_itemover,
                            showControl: true,
                            speed: 200,
                            step: scrollVisible_itemover,
                            loop: false,
                            prev: '#itemover-forward',
                            next: '#itemover-backward',
                            disableClass: 'disabled',
                            width: 130,
                            height:165
                        });


                    } else {
                        $('#noitem-related-list .noitem-related-list').html( '<a href="javascript:;" class="spec-control disabled" id="noitem-forward"></a><a href="javascript:;" class="spec-control" id="noitem-backward"></a><div id="noitem-list"><ul>' + noItem_TPL.process(data) + '</ul></div>' );


                        getPriceNum(pageConfig.product.noItemData, $('#noitem-related-list .noitem-related-list'));

                        //ͼƬ�������޻�ҳ�桿
                        $('#noitem-list').imgScroll({
                            visible: scrollVisible_noitem,
                            showControl: true,
                            speed: 200,
                            step: scrollVisible_noitem,
                            loop: false,
                            prev: '#noitem-forward',
                            next: '#noitem-backward',
                            disableClass: 'disabled'
                        });
                    }
                }

            }
        });
    }

};


var iplocation = {"����": { id: "1", root: 0, djd: 1,c:72 },"�Ϻ�": { id: "2", root: 1, djd: 1,c:78 },"���": { id: "3", root: 0, djd: 1,c:51035 },"����": { id: "4", root: 3, djd: 1,c:113 },"�ӱ�": { id: "5", root: 0, djd: 1,c:142 },"ɽ��": { id: "6", root: 0, djd: 1,c:303 },"����": { id: "7", root: 0, djd: 1,c:412 },"����": { id: "8", root: 0, djd: 1,c:560 },"����": { id: "9", root: 0, djd: 1,c:639 },"������": { id: "10", root: 0, djd: 1,c:698 },"���ɹ�": { id: "11", root: 0, djd: 0,c:799 },"����": { id: "12", root: 1, djd: 1,c:904 },"ɽ��": { id: "13", root: 0, djd: 1,c:1000 },"����": { id: "14", root: 1, djd: 1,c:1116 },"�㽭": { id: "15", root: 1, djd: 1,c:1158 },"����": { id: "16", root: 2, djd: 1,c:1303 },"����": { id: "17", root: 0, djd: 1,c:1381 },"����": { id: "18", root: 2, djd: 1,c:1482 },"�㶫": { id: "19", root: 2, djd: 1,c:1601 },"����": { id: "20", root: 2, djd: 1,c:1715 },"����": { id: "21", root: 2, djd: 1,c:1827 },"�Ĵ�": { id: "22", root: 3, djd: 1,c:1930 },"����": { id: "23", root: 2, djd: 1,c:2121 },"����": { id: "24", root: 3, djd: 1,c:2144 },"����": { id: "25", root: 3, djd: 1,c:2235 },"����": { id: "26", root: 3, djd: 0,c:2951 },"����": { id: "27", root: 3, djd: 1,c:2376 },"����": { id: "28", root: 3, djd: 1,c:2487 },"�ຣ": { id: "29", root: 3, djd: 0,c:2580 },"����": { id: "30", root: 3, djd: 1,c:2628 },"�½�": { id: "31", root: 3, djd: 0,c:2652 },"̨��": { id: "32", root: 2, djd: 0,c:2768 },"���": { id: "42", root: 2, djd: 0,c:2754 },"����": { id: "43", root: 2, djd: 0,c:2770 },"���㵺": { id: "84", root: 2, djd: 0,c:84 }};
var provinceCityJson = {"1":[{"id":72,"name":"������"},{"id":2800,"name":"������"},{"id":2801,"name":"������"},{"id":2802,"name":"������"},{"id":2803,"name":"������"},{"id":2804,"name":"������"},{"id":2805,"name":"��̨��"},{"id":2806,"name":"ʯ��ɽ��"},{"id":2807,"name":"��ͷ��"},{"id":2808,"name":"��ɽ��"},{"id":2809,"name":"ͨ����"},{"id":2810,"name":"������"},{"id":2812,"name":"˳����"},{"id":2814,"name":"������"},{"id":2816,"name":"������"},{"id":2901,"name":"��ƽ��"},{"id":2953,"name":"ƽ����"},{"id":3065,"name":"������"}],"2":[{"id":2811,"name":"¬����"},{"id":2813,"name":"�����"},{"id":2815,"name":"������"},{"id":2817,"name":"������"},{"id":2820,"name":"բ����"},{"id":2822,"name":"�����"},{"id":2823,"name":"������"},{"id":2824,"name":"��ɽ��"},{"id":2825,"name":"������"},{"id":2826,"name":"�ζ���"},{"id":2830,"name":"�ֶ�����"},{"id":2833,"name":"������"},{"id":2834,"name":"�ɽ���"},{"id":2835,"name":"��ɽ��"},{"id":2836,"name":"�ϻ���"},{"id":2837,"name":"������"},{"id":2841,"name":"������"},{"id":2919,"name":"������"},{"id":78,"name":"������"}],"3":[{"id":51035,"name":"������"},{"id":51036,"name":"��ƽ��"},{"id":51037,"name":"�ӱ���"},{"id":51038,"name":"�Ӷ���"},{"id":51039,"name":"������"},{"id":51040,"name":"������"},{"id":51041,"name":"����"},{"id":51042,"name":"������"},{"id":51043,"name":"�Ͽ���"},{"id":51044,"name":"������"},{"id":51045,"name":"������"},{"id":51046,"name":"������"},{"id":51047,"name":"������"},{"id":51048,"name":"������"},{"id":51049,"name":"�����"},{"id":51050,"name":"������"},{"id":51051,"name":"������"},{"id":51052,"name":"������"}],"4":[{"id":113,"name":"������"},{"id":114,"name":"������"},{"id":115,"name":"��ƽ��"},{"id":119,"name":"�ϴ���"},{"id":123,"name":"������"},{"id":126,"name":"������"},{"id":128,"name":"ǭ����"},{"id":129,"name":"��¡��"},{"id":130,"name":"�ᶼ��"},{"id":131,"name":"�����"},{"id":132,"name":"����"},{"id":133,"name":"������"},{"id":134,"name":"����"},{"id":135,"name":"��Ϫ��"},{"id":136,"name":"��ɽ��"},{"id":137,"name":"ʯ����"},{"id":138,"name":"��ˮ��"},{"id":139,"name":"�潭��"},{"id":140,"name":"������"},{"id":141,"name":"��ɽ��"},{"id":48131,"name":"�ɽ��"},{"id":48132,"name":"�ٲ���"},{"id":48133,"name":"ͭ����"},{"id":48201,"name":"�ϴ���"},{"id":48202,"name":"������"},{"id":48203,"name":"������"},{"id":48204,"name":"������"},{"id":48205,"name":"�山��"},{"id":48206,"name":"������"},{"id":48207,"name":"������"},{"id":50950,"name":"������"},{"id":50951,"name":"�ϰ���"},{"id":50952,"name":"��������"},{"id":50953,"name":"ɳƺ����"},{"id":50954,"name":"��ɿ���"},{"id":50995,"name":"�뽭��"},{"id":51026,"name":"������"},{"id":51027,"name":"������"},{"id":51028,"name":"��������"},{"id":4164,"name":"�ǿ���"}],"5":[{"id":142,"name":"ʯ��ׯ��"},{"id":148,"name":"������"},{"id":164,"name":"��̨��"},{"id":199,"name":"������"},{"id":224,"name":"�żҿ���"},{"id":239,"name":"�е���"},{"id":248,"name":"�ػʵ���"},{"id":258,"name":"��ɽ��"},{"id":264,"name":"������"},{"id":274,"name":"�ȷ���"},{"id":275,"name":"��ˮ��"}],"6":[{"id":303,"name":"̫ԭ��"},{"id":309,"name":"��ͬ��"},{"id":318,"name":"��Ȫ��"},{"id":325,"name":"������"},{"id":330,"name":"˷����"},{"id":336,"name":"������"},{"id":350,"name":"������"},{"id":368,"name":"������"},{"id":379,"name":"�ٷ���"},{"id":398,"name":"�˳���"},{"id":3074,"name":"������"}],"7":[{"id":412,"name":"֣����"},{"id":420,"name":"������"},{"id":427,"name":"������"},{"id":438,"name":"ƽ��ɽ��"},{"id":446,"name":"������"},{"id":454,"name":"�ױ���"},{"id":458,"name":"������"},{"id":468,"name":"������"},{"id":475,"name":"�����"},{"id":482,"name":"�����"},{"id":489,"name":"�����"},{"id":495,"name":"����Ͽ��"},{"id":502,"name":"������"},{"id":517,"name":"������"},{"id":527,"name":"�ܿ���"},{"id":538,"name":"פ�����"},{"id":549,"name":"������"},{"id":2780,"name":"��Դ��"}],"8":[{"id":560,"name":"������"},{"id":573,"name":"������"},{"id":579,"name":"��ɽ��"},{"id":584,"name":"��˳��"},{"id":589,"name":"��Ϫ��"},{"id":593,"name":"������"},{"id":598,"name":"������"},{"id":604,"name":"��«����"},{"id":609,"name":"Ӫ����"},{"id":613,"name":"�̽���"},{"id":617,"name":"������"},{"id":621,"name":"������"},{"id":632,"name":"������"},{"id":6858,"name":"������"}],"9":[{"id":639,"name":"������"},{"id":644,"name":"������"},{"id":651,"name":"��ƽ��"},{"id":2992,"name":"��Դ��"},{"id":657,"name":"ͨ����"},{"id":664,"name":"��ɽ��"},{"id":674,"name":"��ԭ��"},{"id":681,"name":"�׳���"},{"id":687,"name":"�ӱ���"}],"10":[{"id":727,"name":"�׸���"},{"id":731,"name":"˫Ѽɽ��"},{"id":737,"name":"������"},{"id":742,"name":"������"},{"id":753,"name":"������"},{"id":757,"name":"ĵ������"},{"id":765,"name":"��ľ˹��"},{"id":773,"name":"��̨����"},{"id":776,"name":"�ں���"},{"id":782,"name":"�绯��"},{"id":793,"name":"���˰������"},{"id":698,"name":"��������"},{"id":712,"name":"���������"}],"11":[{"id":799,"name":"���ͺ�����"},{"id":805,"name":"��ͷ��"},{"id":810,"name":"�ں���"},{"id":812,"name":"�����"},{"id":823,"name":"�����첼��"},{"id":835,"name":"���ֹ�����"},{"id":848,"name":"���ױ�����"},{"id":870,"name":"������˹��"},{"id":880,"name":"�����׶���"},{"id":891,"name":"��������"},{"id":895,"name":"�˰���"},{"id":902,"name":"ͨ����"}],"12":[{"id":904,"name":"�Ͼ���"},{"id":911,"name":"������"},{"id":919,"name":"���Ƹ���"},{"id":925,"name":"������"},{"id":933,"name":"��Ǩ��"},{"id":939,"name":"�γ���"},{"id":951,"name":"������"},{"id":959,"name":"̩����"},{"id":965,"name":"��ͨ��"},{"id":972,"name":"����"},{"id":978,"name":"������"},{"id":984,"name":"������"},{"id":988,"name":"������"}],"13":[{"id":2900,"name":"������"},{"id":1000,"name":"������"},{"id":1007,"name":"�ൺ��"},{"id":1016,"name":"�Ͳ���"},{"id":1022,"name":"��ׯ��"},{"id":1025,"name":"��Ӫ��"},{"id":1032,"name":"Ϋ����"},{"id":1042,"name":"��̨��"},{"id":1053,"name":"������"},{"id":1058,"name":"������"},{"id":1060,"name":"������"},{"id":1072,"name":"������"},{"id":1081,"name":"�ĳ���"},{"id":1090,"name":"������"},{"id":1099,"name":"������"},{"id":1108,"name":"������"},{"id":1112,"name":"̩����"}],"14":[{"id":1151,"name":"��ɽ��"},{"id":1159,"name":"������"},{"id":1167,"name":"������"},{"id":1174,"name":"������"},{"id":1180,"name":"������"},{"id":1201,"name":"������"},{"id":1206,"name":"������"},{"id":2971,"name":"������"},{"id":1114,"name":"ͭ����"},{"id":1116,"name":"�Ϸ���"},{"id":1121,"name":"������"},{"id":1124,"name":"������"},{"id":1127,"name":"�ߺ���"},{"id":1132,"name":"������"},{"id":1137,"name":"��ɽ��"},{"id":1140,"name":"������"}],"15":[{"id":1158,"name":"������"},{"id":1273,"name":"������"},{"id":1280,"name":"��ˮ��"},{"id":1290,"name":"̨����"},{"id":1298,"name":"��ɽ��"},{"id":1213,"name":"������"},{"id":1233,"name":"������"},{"id":1243,"name":"������"},{"id":1250,"name":"������"},{"id":1255,"name":"������"},{"id":1262,"name":"����"}],"16":[{"id":1303,"name":"������"},{"id":1315,"name":"������"},{"id":1317,"name":"������"},{"id":1329,"name":"������"},{"id":1332,"name":"Ȫ����"},{"id":1341,"name":"������"},{"id":1352,"name":"��ƽ��"},{"id":1362,"name":"������"},{"id":1370,"name":"������"}],"17":[{"id":1432,"name":"Т����"},{"id":1441,"name":"�Ƹ���"},{"id":1458,"name":"������"},{"id":1466,"name":"��ʩ��"},{"id":1475,"name":"������"},{"id":1477,"name":"������"},{"id":1479,"name":"������"},{"id":3154,"name":"��ũ������"},{"id":1381,"name":"�人��"},{"id":1387,"name":"��ʯ��"},{"id":1396,"name":"������"},{"id":1405,"name":"ʮ����"},{"id":1413,"name":"������"},{"id":1421,"name":"�˲���"},{"id":2922,"name":"Ǳ����"},{"id":2980,"name":"������"},{"id":2983,"name":"������"}],"18":[{"id":1482,"name":"��ɳ��"},{"id":1488,"name":"������"},{"id":1495,"name":"��̶��"},{"id":1499,"name":"��ɽ��"},{"id":1501,"name":"������"},{"id":1511,"name":"������"},{"id":1522,"name":"������"},{"id":1530,"name":"������"},{"id":1540,"name":"�żҽ���"},{"id":1544,"name":"������"},{"id":1555,"name":"������"},{"id":1560,"name":"������"},{"id":1574,"name":"������"},{"id":1586,"name":"¦����"},{"id":1592,"name":"������"}],"19":[{"id":1601,"name":"������"},{"id":1607,"name":"������"},{"id":1609,"name":"�麣��"},{"id":1611,"name":"��ͷ��"},{"id":1617,"name":"�ع���"},{"id":1627,"name":"��Դ��"},{"id":1634,"name":"÷����"},{"id":1709,"name":"������"},{"id":1643,"name":"������"},{"id":1650,"name":"��β��"},{"id":1655,"name":"��ݸ��"},{"id":1657,"name":"��ɽ��"},{"id":1659,"name":"������"},{"id":1666,"name":"��ɽ��"},{"id":1672,"name":"������"},{"id":1677,"name":"տ����"},{"id":1684,"name":"ï����"},{"id":1690,"name":"������"},{"id":1698,"name":"�Ƹ���"},{"id":1704,"name":"��Զ��"},{"id":1705,"name":"������"}],"20":[{"id":3168,"name":"������"},{"id":1715,"name":"������"},{"id":1720,"name":"������"},{"id":1726,"name":"������"},{"id":1740,"name":"������"},{"id":1746,"name":"������"},{"id":1749,"name":"���Ǹ���"},{"id":1753,"name":"������"},{"id":1757,"name":"�����"},{"id":1761,"name":"������"},{"id":1792,"name":"������"},{"id":1806,"name":"��ɫ��"},{"id":1818,"name":"�ӳ���"},{"id":3044,"name":"������"}],"21":[{"id":1827,"name":"�ϲ���"},{"id":1832,"name":"��������"},{"id":1836,"name":"Ƽ����"},{"id":1842,"name":"������"},{"id":1845,"name":"�Ž���"},{"id":1857,"name":"ӥ̶��"},{"id":1861,"name":"������"},{"id":1874,"name":"�˴���"},{"id":1885,"name":"������"},{"id":1898,"name":"������"},{"id":1911,"name":"������"}],"22":[{"id":2103,"name":"��ɽ��"},{"id":1930,"name":"�ɶ���"},{"id":1946,"name":"�Թ���"},{"id":1950,"name":"��֦����"},{"id":1954,"name":"������"},{"id":1960,"name":"������"},{"id":1962,"name":"������"},{"id":1977,"name":"��Ԫ��"},{"id":1983,"name":"������"},{"id":1988,"name":"�ڽ���"},{"id":1993,"name":"��ɽ��"},{"id":2005,"name":"�˱���"},{"id":2016,"name":"�㰲��"},{"id":2022,"name":"�ϳ���"},{"id":2033,"name":"������"},{"id":2042,"name":"������"},{"id":2047,"name":"�Ű���"},{"id":2058,"name":"üɽ��"},{"id":2065,"name":"������"},{"id":2070,"name":"������"},{"id":2084,"name":"������"}],"23":[{"id":3690,"name":"������"},{"id":3698,"name":"�Ĳ���"},{"id":3699,"name":"��ָɽ��"},{"id":3701,"name":"�ٸ���"},{"id":3702,"name":"������"},{"id":3703,"name":"������"},{"id":3704,"name":"�Ͳ���"},{"id":3705,"name":"������"},{"id":3706,"name":"��ɳ��"},{"id":3707,"name":"������"},{"id":3708,"name":"��ˮ��"},{"id":3709,"name":"��ͤ��"},{"id":3710,"name":"�ֶ���"},{"id":3711,"name":"��ɳ��"},{"id":2121,"name":"������"},{"id":3115,"name":"����"},{"id":3137,"name":"������"},{"id":3173,"name":"������"},{"id":3034,"name":"������"}],"24":[{"id":2144,"name":"������"},{"id":2150,"name":"����ˮ��"},{"id":2155,"name":"������"},{"id":2169,"name":"ͭ����"},{"id":2180,"name":"�Ͻ���"},{"id":2189,"name":"��˳��"},{"id":2196,"name":"ǭ������"},{"id":2205,"name":"ǭ������"},{"id":2222,"name":"ǭ����"}],"25":[{"id":4108,"name":"������"},{"id":2235,"name":"������"},{"id":2247,"name":"������"},{"id":2258,"name":"��Ϫ��"},{"id":2270,"name":"��ͨ��"},{"id":2281,"name":"�ն���"},{"id":2291,"name":"�ٲ���"},{"id":2298,"name":"��ɽ��"},{"id":2304,"name":"������"},{"id":2309,"name":"��ɽ��"},{"id":2318,"name":"�����"},{"id":2332,"name":"��˫������"},{"id":2336,"name":"������"},{"id":2347,"name":"������"},{"id":2360,"name":"�º���"},{"id":2366,"name":"ŭ����"}],"26":[{"id":3970,"name":"�������"},{"id":3971,"name":"��֥����"},{"id":2951,"name":"������"},{"id":3107,"name":"��������"},{"id":3129,"name":"ɽ�ϵ���"},{"id":3138,"name":"��������"},{"id":3144,"name":"�տ������"}],"27":[{"id":2428,"name":"�Ӱ���"},{"id":2442,"name":"������"},{"id":2454,"name":"������"},{"id":2468,"name":"������"},{"id":2476,"name":"������"},{"id":2376,"name":"������"},{"id":2386,"name":"ͭ����"},{"id":2390,"name":"������"},{"id":2402,"name":"������"},{"id":2416,"name":"μ����"}],"28":[{"id":2525,"name":"������"},{"id":2534,"name":"¤����"},{"id":2544,"name":"������"},{"id":2549,"name":"��Ҵ��"},{"id":2556,"name":"��Ȫ��"},{"id":2564,"name":"������"},{"id":2573,"name":"������"},{"id":3080,"name":"������"},{"id":2487,"name":"������"},{"id":2492,"name":"�����"},{"id":2495,"name":"������"},{"id":2501,"name":"��ˮ��"},{"id":2509,"name":"��������"},{"id":2518,"name":"ƽ����"}],"29":[{"id":2580,"name":"������"},{"id":2585,"name":"��������"},{"id":2592,"name":"������"},{"id":2597,"name":"������"},{"id":2603,"name":"������"},{"id":2605,"name":"������"},{"id":2612,"name":"������"},{"id":2620,"name":"������"}],"30":[{"id":2628,"name":"������"},{"id":2632,"name":"ʯ��ɽ��"},{"id":2637,"name":"������"},{"id":2644,"name":"��ԭ��"},{"id":3071,"name":"������"}],"31":[{"id":4110,"name":"�������"},{"id":4163,"name":"���������ɹ������ݰ���ɽ�ڿڰ�"},{"id":15945,"name":"��������"},{"id":15946,"name":"ͼľ�����"},{"id":2652,"name":"��³ľ����"},{"id":2654,"name":"����������"},{"id":2656,"name":"ʯ������"},{"id":2658,"name":"��³������"},{"id":2662,"name":"���ܵ���"},{"id":2666,"name":"�������"},{"id":2675,"name":"�����յ���"},{"id":2686,"name":"��ʲ����"},{"id":2699,"name":"����������"},{"id":2704,"name":"����������"},{"id":2714,"name":"������"},{"id":2723,"name":"����������"},{"id":2727,"name":"������"},{"id":2736,"name":"���ǵ���"},{"id":2744,"name":"����̩����"}],"32":[{"id":2768,"name":"̨����"}],"42":[{"id":2754,"name":"����ر�������"}],"43":[{"id":2770,"name":"������"}],"84":[{"id":1310,"name":"���㵺"}]};
var cName = "ipLocation";
var currentLocation = "����";
var stockServiceDomain = "http://st.3.cn",rmsurl="http://rms.shop.jd.com",dcashurl="http://yfei.shop.jd.com/json/pop/fare.action";
//try{if(location.href.indexOf("localtest=true")>0){stockServiceDomain = "http://webstock.jd.com";rmsurl="http://rms.shop.360buy.net";dcashurl="http://yfei.shop.jd.net/json/pop/fare.action";}}catch(e){}
//cookie operate
function getCookie(name) {var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));if (arr != null) return unescape(arr[2]);return null;}
function setNewCookie(name,value,expires,path,domain,secure){if(!path){path="/"}if(!domain){domain="jd.com"}if(!secure){secure=false}var today=new Date();today.setTime(today.getTime());if(expires){expires=expires*1000*60*60*24}var expires_date=new Date(today.getTime()+(expires));document.cookie=name+'='+escape(value)+((expires)?';expires='+expires_date.toGMTString():'')+((path)?';path='+path:'')+((domain)?';domain='+domain:'')+((secure)?';secure':'')};function deleteCookie(name,path,domain){if(getCookie(name))document.cookie=name+'='+((path)?';path='+path:'')+((domain)?';domain='+domain:'')+';expires=Thu, 01-Jan-1970 00:00:01 GMT'};
if(warestatus!=1&&warestatus!=2){
    $("#product-intro").attr("class","product-intro-itemover");
    $('#out-of-stock,#noitem-related-list').remove();
}
$.pbuyurl="";
$.haveShow=0;$._ptload=false;$._ptloadcon="";$.easybuy_button=$("#choose-btn-easybuy");$.divide_button=$("#choose-btn-divide");$.notice_button=$("#choose-btn-notice");$.append_button=$("#choose-btn-append .btn-append");
$.getShopUrl=function(r){if(pageConfig.product.isFlashPurchase)return "#none";if(r.url)return r.url;return "http://mall.jd.com/index-"+r.id+".html";};
var openCheck = pageConfig.product.cat[2]==798||pageConfig.product.cat[2]==878||pageConfig.product.cat[2]==880;
var iconDesc = null;
var useNewEasybuy = true,useEasyBuy=true;
function checkApecialAttr(attr){
	if(pageConfig.product.specialAttrs&&pageConfig.product.specialAttrs.length>0){
		for(var i=0,j=pageConfig.product.specialAttrs.length;i<j;i++){
			if(attr==pageConfig.product.specialAttrs[i]){
				return true;
			}
		}
	}
	return false;
}
function changeTenToTwo(Num){
	var flag=true;
	var result = "";
	while(flag){
		result = Num%2+result;
		Num = parseInt(Num/2);
		if (Num == 0){
			flag = false;
		}
	}
	return result;
}
function checkIsWeChatStock(){
	if(pageConfig.product.specialAttrs&&pageConfig.product.specialAttrs.length>0){
		var array,tmp;
		for(var i=0,j=pageConfig.product.specialAttrs.length;i<j;i++){
			if(pageConfig.product.specialAttrs[i]=="isWeChatStock-0"||pageConfig.product.specialAttrs[i]=="isWeChatStock-n"){
				return false;
			}
			if(pageConfig.product.specialAttrs[i].indexOf("isWeChatStock")>-1){
				array = pageConfig.product.specialAttrs[i].split("-");
				if(array.length == 2 && new Number(array[1])>0){
					tmp = changeTenToTwo(parseInt(array[1]))+"";
					if (tmp.length<4){
						return true;
					}
					tmp = tmp.substr(tmp.length-4,1);
					if (tmp == "0"){
						return true;
					}
					else{
						return false;
					}
				}
			}
		}
	}
	return false;
}
var zkHtml = null;pageConfig.product.isFlashPurchase=checkApecialAttr("isFlashPurchase");pageConfig.product.isPOPFlashPurchase=pageConfig.product.SG=="1";pageConfig.product.isLOC2=checkApecialAttr("isLOC-2");pageConfig.product.isLOC=checkApecialAttr("isLOC")||pageConfig.product.isLOC2;pageConfig.product.isLSP=checkApecialAttr("isLSP");pageConfig.product.isClosePCShow=checkIsWeChatStock();pageConfig.product.isXnzt=checkApecialAttr("isXnzt");
//loc
var locSkuEndDate = null;
function getLocSkuDateCallBack(r){
	if(r&&r.expiryEndDate){
		var d = new Date(r.expiryEndDate);
		var y = d.getFullYear();
		var m = d.getMonth()+1;m = (m<10?"0":"")+m;
		var dd = d.getDate();dd = (dd<10?"0":"")+dd;
		var h = d.getHours();h = (h<10?"0":"")+h;
        var mi  = d.getMinutes();mi = (mi<10?"0":"")+mi;
        var s = d.getSeconds();s = (s<10?"0":"")+s;
		locSkuEndDate = "��Ч���� "+y+"-"+m+"-"+dd;
		if($("#loc_enddate").length>0){$("#loc_enddate").html(locSkuEndDate);}
	}
}
function getLocSkuDate(){
	$.getJSONP(rmsurl+"/json/locWare/getLocWareBySkuId.action?callback=getLocSkuDateCallBack&skuId="+pageConfig.product.skuid+"&t="+new Date().getTime());
}
if(pageConfig.product.isLOC){getLocSkuDate();}
//FlashPurchase
var Countdown = {
    init: function(seconds, callback) {
        this.seconds = seconds;
        this.timer = null;

        this.callback = callback || function() {};

        this.loopCount();
    },
    loopCount: function() {
        var _this = this;
        this.timer = setInterval(function() {

            var res = _this.formatSeconds(_this.seconds);

            if (res.d === 0 && res.h === 0 && res.m === 0 && res.s === 0) {
                clearInterval(_this.timer);
            } else {
                _this.seconds--;
            }
            _this.callback(res);
        }, 1000);
    },
    formatSeconds: function(seconds) {
        var days = Math.floor(seconds / 86400);
        var hours = Math.floor((seconds % 86400) / 3600);
        var minutes = Math.floor(((seconds % 86400) % 3600) / 60);
        var seconds = ((seconds % 86400) % 3600) % 60;
        return {
            d: days,
            h: hours,
            m: minutes,
            s: seconds
        };
    }
};
function flashPurchase (seconds) {
    var countDownEl = $("#red-countdown");
	if(seconds > 0){
		Countdown.init(seconds, function(res) {
			if(res.d>0||res.h>0||res.m>0||res.s>0){countDownEl.html('��ʣ��'+res.d + '��' + res.h + 'ʱ' + res.m + '��' + res.s + '�룩');}else{countDownEl.html('���ѽ�����');}
		});
	}
	else if(seconds <= 0){
		countDownEl.html('���ѽ�����');
	}
}
function flashPurchaseChange(){
	$("#summary-price .dt").html("�� �� �ۣ�");
	$('<em id="red-discount" class="hl_red_bg"><span id="red-zhekou"></span><span id="red-countdown"></span></em>').insertAfter("#jd-price");
	$("#notice-downp").remove();
	if($('#summary-countdown').length==0){
		$.ajax({
			url: 'http://rms.shop.360buy.com/json/upDown/queryWareTaskUpDownTimeBySkuId.action?skuId=' + pageConfig.product.skuid,
			dataType: 'jsonp',
			success: function(r) {
				if (r&&r.downTime&&r.nowTime){var seconds = Math.floor( (parseInt(r.downTime, 10) - parseInt(r.nowTime, 10))/1000 );flashPurchase(seconds);}			
			}
		})
	}
}
function flashPurchaseChange1(){
	$('<em id="red-discount" class="hl_red_bg" style="display:none;margin-left:5px;"><span id="red-countdown"></span></em>').insertAfter("#jd-price");
	$("#notice-downp").remove();
	if($('#summary-countdown').length==0){
		$.ajax({
			url: 'http://red.jd.com/item/remainTime.html?skuid=' + pageConfig.product.skuid,
			dataType: 'jsonp',
			success: function(r) {
				if(r){
					r=r.split(',');var json={},tmp=null;
					for(var i=0,j=r.length;i<j;i++){tmp=r[i].split(":");if(tmp.length==2){json[tmp[0]]=tmp[1]}}
					if(json.startedFlag+""=="1"&&new Number(json.remainTime)>0){$("#red-discount").show();var seconds = Math.floor(json.remainTime/1000 );flashPurchase(seconds);}
				}			
			}
		})
	}
}
if(pageConfig.product.isFlashPurchase){flashPurchaseChange();}
else if(pageConfig.product.isPOPFlashPurchase){flashPurchaseChange1();}
//\\FlashPurchase
$.getDeliver = function(p){
    var r=p.D;
    iconDesc = "";
    if (p.ir&&p.ir.length>0){
        iconDesc += '';
        for (var i=0,j=p.ir.length;i<j;i++){
            if (p.ir[i].resultCode==1){
				if(!p.ir[i].helpLink){p.ir[i].helpLink="#"}
                iconDesc += '<a href="'+p.ir[i].helpLink+'" '+(p.ir[i].helpLink=='#'?'':'target="_blank"')+' class="'+p.ir[i].iconCode+'" title="'+p.ir[i].iconTip+'">\u3000</a>';
            }
        }
    }
    dCashDescInfo.loadStockCnt ++;
    /*if(!r||r.type==0){
        var noDCash = aboutSelfDeliveCash(1);
        if(noDCash){
            iconDesc += noDCash;
        }
    }*/
    if (iconDesc){
        iconDesc = '<span id="promise-ico">֧�֣�'+iconDesc+'</span>';
    }
    if(pageConfig.product.skuid<1000000000){
        $("#summary-service").html("");
        if (p.PopType==999||p.Ext.indexOf("factoryShip")!=-1){
            $("<div class='dt'>��\u3000\u3000��</div><div class='dd'>�ɳ��һ�Ӧ���ṩ�����͡�"+iconDesc+"</div>").appendTo("#summary-service");
        }else{
            var upenCheckStr = "";
            if (p.code==1&&openCheck&&!iconDesc&&!checkApecialAttr("YuShou")){
                upenCheckStr = "��֧�ֻ�������������";
            }
            $("<div class='dt'>��\u3000\u3000��</div><div class='dd'>�� ���� �������ṩ�ۺ����"+upenCheckStr+"��"+iconDesc+"</div>").appendTo("#summary-service");
        }
    }
    if (pageConfig.product.skuid>1000000000){   
        if (r){
            showVenderServiceInfo(r);
        }
    }
};
function getDeliveCash(r){
	if(r&&r.dtype==undefined){
		for(var i=0,j=r.length;i<j;i++){
			if (r[i].freihtType==1){
				r = r[i];break;
			}
		}
	}
    if(r){
        if(r.dtype == 0&&new Number(r.dcash)>0){
            $("#store-prompt span").html("���˷ѣ�"+r.dcash+"Ԫ <a href='http://help.jd.com/help/question-892.html#help2215' class='free_delivery_policy' title='�˽����ͷ���ȡ��׼'></a>");
        }
        else if(r.dtype == 1&&new Number(r.dcash)>0&&new Number(r.ordermin)>0){
            $("#store-prompt span").html("�����̵��ʶ�������"+r.ordermin+"Ԫ�����˷ѣ�"+r.dcash+"Ԫ <a href='http://help.jd.com/help/question-892.html#help2215' class='free_delivery_policy'></a>");
        }
        if(typeof $.fn.Jtips !== 'undefined'){
             $('.free_delivery_policy').Jtips({
                width:150,
                autoClose: true,
                oLeft: -8,
                position:'bottom',
                content:'<a href="http://help.jd.com/help/question-892.html#help2215" target="_blank">�˽����ͷ���ȡ��׼</a>',
                event: 'mouseover',
                close: true
            });
        }
    }
}
var changeDescShopUrl=true;
var requestDeliveCash = false; 
function getPOPDeliveCash(){
    if (requestDeliveCash){
        try{
			if(dcashurl){
				$.getJSONP(dcashurl+"?venderId="+pageConfig.product.venderId+"&skuId="+pageConfig.product.skuid+"&provinceId="+currentAreaInfo.currentProvinceId+"&cityId="+currentAreaInfo.currentCityId+"&buyNum="+$("#buy-num").val()+"&vType="+(pageConfig.product.isLSP?2:1)+"&callback=getDeliveCash");
			}
			else{
				$.getJSONP("http://fare.shop.jd.com/json/pop/fare.action?venderId="+pageConfig.product.venderId+"&skuId="+pageConfig.product.skuid+"&provinceId="+currentAreaInfo.currentProvinceId+"&cityId="+currentAreaInfo.currentCityId+"&buyNum="+$("#buy-num").val()+"&callback=getDeliveCash");
			}
        }catch(e){}
    }
}
function showVenderServiceInfo(r){
    requestDeliveCash = false;
    if (r){
        if(!r.deliver)r.deliver=r.vender;
        currentVenderInfoJson = r;
        var unshowtypes = "0,1,2,4,5";
        if (unshowtypes.indexOf(r.type) != -1){
                if($("#summary-service").length==0){$("<li id='summary-service'></li>").insertAfter("#summary-stock");}
                $("#summary-service").html("");
                var key=r.id+"_"+r.type;
                var dfinfo=(r.vid.length!=7&&r.df&&r.df!="null")?("�� "+r.df+" "):"����";
                var shinfo=r.po=="false"?"�����ṩ�ۺ����":"���ṩ�ۺ����"; //sop & sopl
				if(pageConfig.product.isFlashPurchase){
					if(r.type==0){
						requestDeliveCash = true;
						getPOPDeliveCash();
					}
					$("<div class='dt'>��\u3000\u3000��</div><div class='dd'>�� ���� ���𷢻���<a href='#none'>"+r.vender+"</a> ����ۺ����"+iconDesc+"</div>").appendTo("#summary-service");
				}
				else{
					if(r.type==0){
						if(pageConfig.product.isLOC){
							$("<div class='dt'>��\u3000\u3000��</div><div class='dd'><span id='promise-ico'><a class='"+(pageConfig.product.isLOC2?"pico-onlineserver":"shouhoudaojia")+"' href='#none'></a></span>��<a href='"+$.getShopUrl(r)+"' target='_blank' clstag='shangpin|keycount|product|bbtn' class='hl_red'>"+r.vender+"</a>�ṩ������ۺ�"
							+"<span id='loc_enddate'>"+(locSkuEndDate?("��"+locSkuEndDate):"��")+"</span>"+"</div>").appendTo("#summary-service");
						}
						else{
							requestDeliveCash = true;
							getPOPDeliveCash();
							$("<div class='dt'>��\u3000\u3000��</div><div class='dd'>��<a href='"+$.getShopUrl(r)+"' target='_blank' clstag='shangpin|keycount|product|bbtn' class='hl_red'>"+r.vender+"</a>"+dfinfo+"������"
							+shinfo+iconDesc+"</div>").appendTo("#summary-service");
						}
					}
					else if(r.type==1){
						$("<div class='dt'>��\u3000\u3000��</div><div class='dd'>�� ���� �������ṩ�ۺ����"+iconDesc+"</div>").appendTo("#summary-service");
					}
					else if(r.type==2){
						$("<div class='dt'>��\u3000\u3000��</div><div class='dd'>��<a href='"+$.getShopUrl(r)+"' "+(pageConfig.product.isFlashPurchase?"":"target='_blank'")+" clstag='shangpin|keycount|product|bbtn' class='hl_red'>"+r.vender+"</a>"+dfinfo+"�����������ṩ�ۺ����"+iconDesc+"</div>").appendTo("#summary-service");
					}
					else if(r.type==5){
						$("<div class='dt'>��\u3000\u3000��</div><div class='dd'>��<a href='"+$.getShopUrl(r)+"' "+(pageConfig.product.isFlashPurchase?"":"target='_blank'")+" clstag='shangpin|keycount|product|bbtn' class='hl_red'>"+r.vender+"</a>"+dfinfo+"������"+shinfo+iconDesc+"</div>").appendTo("#summary-service");
					}
				}
                if(pageConfig.product.yfinfo&&pageConfig.product.yfinfo.service){
                    $("<div class='dt'>\u3000\u3000</div><div class='dd'>"+pageConfig.product.yfinfo.service+"</div>").appendTo("#summary-service");
                }
                if(r.type!=4){
                    if($("#product-intro .itemover-title button").length==0&&$("#product-intro .itemover-title h3").length>0)$("<button type='button' clstag='shangpin|keycount|product|bbtn'>�������ҵ���</button>").appendTo("#product-intro .itemover-title h3");
                    $("#product-intro .itemover-title button").unbind("click").click(function(){window.location=$.getShopUrl(r);});
                }   
                if (changeDescShopUrl){
                    var shoplinkhtml="<a href='"+$.getShopUrl(r)+"' target='_blank'>"+r.vender+"</a>";
                    var descShopLinkDom=$("#product-detail-1 .detail-list li").eq(2);
                    if (descShopLinkDom.html().indexOf("���̣�")>-1&&(descShopLinkDom.find("a").html()!=r.vender||descShopLinkDom.find("a").attr("href")!=$.getShopUrl(r))){
                        descShopLinkDom.html("���̣�"+shoplinkhtml);
                    }
                }
        }
    }
}
var areaSurportDelive = true;
function getStockDescWords(state,isPurchase,skuid,skukey,arrivalDate,isNotice,ext,provinceId,rn,pr){
    if (state == -1){
        areaSurportDelive = false;
        pageConfig.product.havestock = false;
        $('body').addClass('no-stock');
        return "<strong>�õ����ݲ�֧������</strong>";
    }
    var text = "";
    var yfInfo = "";
    areaSurportDelive = true;
    dCashDescInfo.dCash = false;
    if (skuid<1000000000){
        if((provinceId==26||provinceId==31)&&(state!=0&&state!=34)&&ext&&ext.indexOf("PianYuanYunFei")>-1){
            yfInfo = "��<span title='��ʯ���������û����ø��˷�' style='cursor:pointer'>�����˷ѣ���10.00</span>";
            dCashDescInfo.dCash = true;
        }
    }
	var promiseresult = null;
	if (pr&&pr.resultCode==1&&pr.promiseResult){
		promiseresult = pr.promiseResult;
	}
    if (state == 33){
        pageConfig.product.havestock = true;
        if (rn&&rn>0){
            text = "<strong>�л�</strong>����ʣ"+rn+"��"+(promiseresult?("��"+promiseresult):"")+"<span></span>";  
        }
        else{
            text = "<strong>�л�</strong>"+(promiseresult?("��"+promiseresult):(pageConfig.product.isLOC||(ext&&ext.indexOf("YuShou")>-1)?"":"���µ�����������"))+"<span></span>";      
        }
    }
    else if (state == 34 || state == 0){
        pageConfig.product.havestock = false;
        $('body').addClass('no-stock');
        text = "<strong>�޻�</strong>������Ʒ��ʱ����"+(isNotice?"��<a href='#none' id='notify-stock' target='_blank'>����֪ͨ</a>":"");
        if (skuid&&skuid.length == 8 && !isPurchase){
            text = "<strong>�޻�</strong>������Ʒ�������ۣ���ӭѡ��������Ʒ";
        }
    }
    else if (state == 39 || state == 40){
        pageConfig.product.havestock = true;
        text = "<strong>�л�</strong>��"+((promiseresult&&state == 40)?promiseresult:"�µ���2-6�췢��")+"<span></span>";
    }
    else if (state == 36){
        pageConfig.product.havestock = true;
        $('body').removeClass('no-stock');
        text = "<strong>Ԥ��</strong>��"+(arrivalDate?"Ԥ��"+arrivalDate+"�պ��л������ڿ��µ�":"��Ʒ�����󷢻������ڿ��µ�")+"<span></span>";
    }
    text += yfInfo;
    return text;
}
//NO Stock
var reCookieName = "reWidsSORec";
function reClick2(type2, pwid, sku, num) {
    var reWidsClubCookies = eval('(' + getCookie(reCookieName) + ')');
    if (reWidsClubCookies == null || reWidsClubCookies == '') reWidsClubCookies = new Object();
    if (reWidsClubCookies[type2] == null) reWidsClubCookies[type2] = '';
    var pos = reWidsClubCookies[type2].indexOf(sku);
    if (pos < 0) reWidsClubCookies[type2] = reWidsClubCookies[type2] + "," + sku;
    if(!!JSON&&JSON.stringify)setNewCookie(reCookieName, JSON.stringify(reWidsClubCookies), 2, "/", locPageHost, false);
    sku = sku.split("#");
    if (window.log){log(3, type2, sku[0]);log('RC', 'CK', type2, pwid, sku[0], num);}
}
//Notify
function getBuyUrl(skuId){
    var count = $("#buy-num").val();
    if(!count)count=1;
	if(pageConfig.product.isLOC){
		return "http://cart.jd.com/cart/dynamic/gateForSubFlow.action?wids="+skuId+"&nums="+count+"&subType=22";
	}
    if(eleSkuIdKey) return "http://gate.jd.com/InitCart.aspx?pid="+skuId+"&pcount="+count+"&ptype=1";
    if($.pbuyurl)return $.pbuyurl;
    if($.append_button.attr("href")!="#none")return $.append_button.attr("href");
    if (pageConfig.product.cat[2] == 4833) return "http://chongzhi.jd.com/order/order_place.action?skuId=" + skuId + "";
    if (pageConfig.product.cat[2] == 4835 || pageConfig.product.cat[2] == 4836) return "http://card.jd.com/order/order_place.action?skuId=" + skuId + "";
    return "http://gate.jd.com/InitCart.aspx?pid="+skuId+"&pcount="+count+"&ptype=1";
}
function chooseType() {
    var shoppingselect = $('#choose-type .item'),
        amount = $('#choose-amount'),
        buyLink = $('#choose-btn-append .btn-append'),
        selectItem = $('#choose-type .selected').eq(0); 
    if ( !selectItem.attr('data') ) {
        return false;
    }       
    if ( shoppingselect.length > 0 ) {
        amount.hide();
    }
    shoppingselect.bind('click', function (i) {
        if ( $('#choose-btn-append').hasClass('disabled') ) {
            return false;
        }
        var data = $(this).attr('data').split('|'),
            link = buyLink.attr( 'href' );
        var newlink = data[1].replace(/wid=\d{6,}/, 'wid=' + pageConfig.product.skuid );        
        shoppingselect.removeClass('selected');
        $(this).addClass('selected');
        $('#choose .result').html(data[0]);
        amount.addClass(data[2]);
        buyLink.attr('href', newlink);
    });
    if ( selectItem.length > 0 ) {
        var data = selectItem.attr('data').split('|'),
            newlink = data[1].replace(/wid=\d{6,}/, 'wid=' + pageConfig.product.skuid );
        buyLink.attr('href', newlink);
    }
    if ( shoppingselect.length == 1 && selectItem.length < 1 ) {
        shoppingselect.addClass('selected');
        buyLink.attr( 'href', shoppingselect.attr('data').split('|')[1].replace(/wid=\d{6,}/, 'wid=' + pageConfig.product.skuid ) );
    }
}
var choose_btn_gift = null;
function setGiftTips (isGift, areaText) {
	if(checkApecialAttr("isSupportCard")){
		var tipsEl = $('#summary-tips .dd');
		var giftTipsEl = $('#gift-tips');
		var giftTipsHtml = (areaText || '��������') + '֧����Ʒ��װ' + '<a href="http://cart.gift.jd.com/cart/addGiftToCart.action?pid='+pageConfig.product.skuid+'&pcount=1&ptype=1" target="_blank">&nbsp;&nbsp;���� <s class="s-arrow">&gt;&gt;</s></a>';
		if (isGift) {
			if (giftTipsEl.length > 0) {
				giftTipsEl.html(giftTipsHtml);
			} else {
				tipsEl.html('<div id="gift-tips" class="hl_red">'+ giftTipsHtml +'</div>'); 
			}

			tipsEl.parent().show();
		} else {
			giftTipsEl.remove();
		}
	}
}
function SetNotifyByNoneStock(stockstatus,ext) {
    if (!choose_btn_gift||choose_btn_gift.length==0){
        choose_btn_gift = $("#choose-btn-gift .btn-gift");
    }
	pageConfig.product.YuShou=false;
	if(pageConfig.product.isLOC){
		$.append_button.addClass(" btn-append-buynow").html("��������<b></b>");
		$(".nav-minicart-btn").addClass(" nav-minicart-buynow").find("a").html("��������");
	}//
    if (stockstatus!=34&&stockstatus!=0&&warestatus==1&&pageConfig.product.skuid!=938747&&pageConfig.product.skuid!=938749){
        if(pageConfig&&pageConfig.product)pageConfig.product.isStock=true;
        $("#choose-btn-append,#choose-btn-gift").removeClass("disabled");
        if(choose_btn_gift.attr("href")=="#none"&&choose_btn_gift.attr("href1"))choose_btn_gift.attr("href",choose_btn_gift.attr("href1"));
        if($("#choose-btn-subsidy .btn-subsidies").length>0){$("#choose-btn-append").addClass("choose-btn-append-lite");}
        $("#product-intro").attr("class","");
        $('#out-of-stock,#noitem-related-list').remove();
        if($("#choose-noresult").length>0){$("#choose-noresult").remove();}
        $.easybuy_button.show();
        $.divide_button.show();
        if(pageConfig.product.skuid<1000000000){$.notice_button.hide()}
        if($.append_button.length>0){
            if( $('#choose-type .item').length>0){      
                chooseType();
                $.append_button.attr("onclick","").attr("title","").unbind("click").click(function() {  mark(pageConfig.product.skuid, 2) }); //���ﳵ 
				if(pageConfig.product.isLOC){
					$("#choose-btn-append .btn-append,.nav-minicart-btn").attr("href","#none");
				}
            }
            else{
				if(pageConfig.product.isLOC){
					$("#choose-btn-append .btn-append,.nav-minicart-btn").attr("href","#none").attr("title","");
				}
				else{
					$.append_button.attr("href",getBuyUrl(pageConfig.product.skuid)).attr("onclick","").attr("title","").unbind("click").click(function() { /*BuyUrl(pageConfig.product.skuid);*/ mark(pageConfig.product.skuid, 2) }); //���ﳵ
				}
            }
        }
        if($(".nav-minicart-btn").length>0)$(".nav-minicart-btn").show(); //mini���ﳵ
        $("#choose-btn-subsidy").show();
        if ((ext&&ext.indexOf("YuShou")>-1)||checkApecialAttr("isKO")){
			pageConfig.product.YuShou=true;
            if(!window.Qiang){
                $.ajax({url:"http://misc.360buyimg.com/product/js/2012/qiang.js?t=20140527",dataType:'script',cache:true});
            }
            else{
                if ( Qiang&&Qiang.init ) {
                        Qiang.init(G.sku, G.key);
                    }
            }
            //if($("#choose-type .selected").attr("data-id")=="100")
            if(pageConfig.product.cat[2] !== 655 || $("#choose-type .selected").attr("data-id")=="100") {
                $.append_button.hide();
                $.easybuy_button.hide();
                $.divide_button.hide();
            }
        }
		else if(ext&&ext.indexOf("is3GRealName")>-1){
			var newUrl = "http://eve.jd.com/redirect.action?wid="+pageConfig.product.skuid+"&btype=16&pid="+currentAreaInfo.currentProvinceId+"&cid="+currentAreaInfo.currentCityId;
            $.append_button.attr("href",newUrl).attr("onclick","").attr("title","").unbind("click").click(function() { mark(pageConfig.product.skuid, 2) }); //���ﳵ
		}
		if(pageConfig.product.isLOC){
			$.append_button.addClass(" btn-append-buynow").html("��������<b></b>");
			$(".nav-minicart-btn").addClass(" nav-minicart-buynow").find("a").html("��������");
			$("#choose-btn-append .btn-append,.nav-minicart-btn").click(function(){
				$.extend(jdModelCallCenter.settings, {
					clstag1: 0,
					clstag2: 0,
					id: pageConfig.product.skuid,
					fn: function () {
						$.login({
							modal: true,
							complete: function (result) {
								if (result != null && result.IsAuthenticated != null && result.IsAuthenticated) {								
									window.location=getBuyUrl(pageConfig.product.skuid);
								}
							}
						})
					}
				});
				jdModelCallCenter.settings.fn();
			});
		}//
		if(pageConfig.product.isClosePCShow){
			$("#choose-btn-append,#choose-btn-gift").addClass("disabled").removeClass('choose-btn-append-lite');
			if($.append_button.length>0){$.append_button.attr("href","#none").attr("onclick","").attr("title","").unbind("click"); }//���ﳵ
		}
        if(window.noItemOver)noItemOver.init();
        return;
    }
    if(pageConfig&&pageConfig.product)pageConfig.product.isStock=false;
    $("#choose-btn-append,#choose-btn-gift").addClass("disabled").removeClass('choose-btn-append-lite');
    if(choose_btn_gift.attr("href"))choose_btn_gift.attr("href1",choose_btn_gift.attr("href")).attr("href","#none");
    $("#product-intro").attr("class","product-intro-noitem");
    if($("#choose-noresult").length==0&&areaSurportDelive&&pageConfig.product.skuid!=938747&&pageConfig.product.skuid!=938749){$("<li id='choose-noresult'><div class='dd'><strong>��ѡ��������Ʒ��ʱ�޻����ǳ���Ǹ��</strong></div></li>").insertAfter("#choose-result");}
    else if(!areaSurportDelive){$("#choose-noresult").remove();}
    $.easybuy_button.hide();
    $.divide_button.hide();
    if($.append_button.length>0){$.append_button.show();if($.append_button.attr("href")!="#none"){$.pbuyurl=$.append_button.attr("href")}$.append_button.attr("href","#none").attr("onclick","").attr("title","��Ʒ���޻�").unbind("click"); }//���ﳵ
    if($(".nav-minicart-btn").length>0)$(".nav-minicart-btn").hide(); //mini���ﳵ
    $("#choose-btn-subsidy").hide();
    if($.notice_button.length==0&&pageConfig.product.skuid<1000000000&&areaSurportDelive&&pageConfig.product.skuid!=938747&&pageConfig.product.skuid!=938749){
        $("<div id='choose-btn-notice' class='btn'><a id='notify-btn' class='btn-notice' href='http://notify.home.jd.com/email.action?type=2&id=" + pageConfig.product.skuid + "&key=" + pageConfig.product.skuidkey + "' target='_blank'>����֪ͨ<b></b></a></div>").insertAfter("#choose-btn-append");
        $.notice_button=$("#choose-btn-notice");
    }
    if(pageConfig.product.isNotice){$.notice_button.show()}else{$.notice_button.hide()}
    if ((ext&&ext.indexOf("YuShou")>-1)||checkApecialAttr("isKO")){
		pageConfig.product.YuShou=true;
        if(!window.Qiang){
            $.ajax({url:"http://misc.360buyimg.com/product/js/2012/qiang.js?t=20140527",dataType:'script',cache:true}); 
        }
        else{
            if ( Qiang&&Qiang.init ) {
                    Qiang.clear();
                    Qiang.init(G.sku, G.key);
                }
        } 
        //if($("#choose-type .selected").attr("data-id")=="100")
        if(pageConfig.product.cat[2] !== 655 || $("#choose-type .selected").attr("data-id")=="100") {
            $.append_button.hide();
            $.easybuy_button.hide();
            $.divide_button.hide();
        }
    }
    if(window.noItemOver)noItemOver.init(pageConfig.product.type);
};
//stock callback
var currentVenderInfoJson = null;
function cleanKuohao(str){
    if(str&&str.indexOf("(")>0){
        str = str.substring(0,str.indexOf("("));
    }
    if(str&&str.indexOf("��")>0){
        str = str.substring(0,str.indexOf("��"));
    }
    return str;
}
pageConfig.product.giftTipsPros={"1":"����","3":"���","5":"�ӱ�","6":"ɽ��","13":"ɽ��","19":"�㶫","16":"����","20":"����","22":"�Ĵ�","4":"����","24":"����","25":"����","26":"����","23":"����","7":"����","17":"����","18":"����","21":"����","8":"����","10":"������","9":"����","11":"���ɹ�","27":"����","28":"����","29":"�ຣ","30":"����","31":"�½�","12":"����","15":"�㽭","14":"����","2":"�Ϻ�"};
pageConfig.product.isNotice = pageConfig.product.cat[2]!=12360 && pageConfig.product.skuid<1000000000;
function setOldForNew(proId,cityId){
	var area = {"1":"����","2":"�Ϻ�","1601":"����"};
	var summary_tips=$("#summary-tips");
	if (pageConfig.product.cat[2]==655&&(area[proId+""]||area[cityId+""])){
		if ($("#oldfornew-tips").length==0){
			summary_tips.find(".dd").append("<div id=\"oldfornew-tips\" class=\"hl_red\">�Ծɻ��£���ߵֿ�3000Ԫ<a target=\"_blank\" href=\"http://huishou.jd.com\" clstag=\"shangpin|keycount|product|huishou\">&nbsp;&nbsp;����<s class=\"s-arrow\">>></s></a></div>");
		}else{
			$("#oldfornew-tips").show();
		}
		summary_tips.show();
	}
	else{
		$("#oldfornew-tips").hide();
	}
}
function getProvinceStockCallback(result) {
    var setSer = false;
    if (currentPageLoad.notSet&&currentPageLoad.isLoad){
        setSer = false;
    }
    else if (!currentPageLoad.isLoad){
        setSer = true;
		setCommonCookies(currentAreaInfo.currentProvinceId,currentLocation,currentAreaInfo.currentCityId,currentAreaInfo.currentAreaId,currentAreaInfo.currentTownId,setSer);
    }
    if ( typeof Refresh !== 'undefined' ) {Refresh.init()} 
    //�任sku��Ҫ�仯���ʼ������Ϣ
    if (pageConfig.product.isChangeSku){
		if(pageConfig.product.skuid<=0)pageConfig.product.isNotice=false;
        refreshPageInfos();
    }
    if (currentPageLoad.isLoad){
        currentPageLoad.isLoad=false;
    }
    pageConfig.product.havestock = true;
    $('body').removeClass('no-stock');
    var stockdesc="<strong>�ֻ�</strong>";
    if (result.stock) {     
        if(result.stock.D&&result.stock.D.id){
            pageConfig.product.popInfo = result;
        }
        stockdesc = (result.stock.StockStateName=="ͳ����"|| result.stock.StockStateName=="�޻�")?"<strong class='store-over'>�޻�</strong>":("<strong>"+result.stock.StockStateName+"</strong>");
        var address = currentAreaInfo.currentProvinceName+currentAreaInfo.currentCityName+currentAreaInfo.currentAreaName+currentAreaInfo.currentTownName;
        $("#store-selector .text div").html(currentAreaInfo.currentProvinceName+cleanKuohao(currentAreaInfo.currentCityName)+cleanKuohao(currentAreaInfo.currentAreaName)+cleanKuohao(currentAreaInfo.currentTownName)).attr("title",address);
        pageConfig.product.yfinfo={};
        if(result.stock.D&&result.stock.D.prompt){
            var proarray=result.stock.D.prompt.split("|");
            if (proarray[0]&&new Number(proarray[0])>0){
                pageConfig.product.yfinfo={nofree:true,cash:proarray[0]};
            }
            if(proarray[1]){
                pageConfig.product.yfinfo.service=proarray[1];
            }
        }
        $("#store-prompt").html(getStockDescWords(result.stock.code==2?-1:result.stock.StockState,true,pageConfig.product.skuid,pageConfig.product.skuidkey,result.stock.ArrivalDate,pageConfig.product.isNotice,result.stock.Ext,currentAreaInfo.currentProvinceId,result.stock.rn,result.stock.pr)
            +(pageConfig.product.yfinfo.nofree?"��<span style='cursor:pointer' title='һ�����̹�������Ʒ��ֻ��ȡһ���˷�'>�˷ѣ�<span style='color:#f00;'>��"+pageConfig.product.yfinfo.cash+"</span><span>":""));
        $.getDeliver(result.stock);
        if ( typeof pageConfig.product.onAreaChange === 'function' ) {
            pageConfig.product.onAreaChange(currentAreaInfo.currentProvinceId,currentAreaInfo.currentCityId);
        }
        else{
            pageConfig.product.onAreaChangeExecute = true;
        }
        SetNotifyByNoneStock(result.stock.StockState,result.stock.Ext);
		if(useEasyBuy)newEasyBuyInit();
		setGiftTips(pageConfig.product.giftTipsPros[currentAreaInfo.currentProvinceId+""],pageConfig.product.giftTipsPros[currentAreaInfo.currentProvinceId+""]+"����");
		setOldForNew(currentAreaInfo.currentProvinceId,currentAreaInfo.currentCityId);
    }
    if (pageConfig.product.skuid>1000000000){
            if(!$._ptload){
                $._ptload=true;
                window._showPopTemplete=function(r){
                    if(result.stock.StockState==36){
                        if(r&&r.reserveDeliveryDay){
                            $._ptloadcon=r.reserveDeliveryDay;
                            $("#store-prompt").html(stockdesc+"��"+"����ƷΪԤ����Ʒ���µ�����"+$._ptloadcon);
                        }
                    }
                    if(r&&r.wareTemplateContent)$("<div>"+r.wareTemplateContent+"</div>").insertBefore("#product-detail-1 .detail-content:first");
                    if(r&&r.wareTemplateBottomContent)$("<div>"+r.wareTemplateBottomContent+"</div>").insertAfter("#product-detail-1 .detail-content:last");
                };
                $.getJSONP(rmsurl+"/json/wareTemplate/queryWareTemplateContent.action?skuId="+pageConfig.product.skuid+"&jsoncallback=_showPopTemplete",_showPopTemplete);
            }else{
                if($._ptloadcon)$("#store-prompt").html(stockdesc+"��"+"����ƷΪԤ����Ʒ���µ�����"+$._ptloadcon);
            }
    }
}
/**
�µ�ַ�б����ݼ�ʱ���
**/
function getAreaList(result,idName,level){
    if (idName && level){
        $("#"+idName).html("");
        var html = ["<ul class='area-list'>"];
        var longhtml = [];
        var longerhtml = [];
        if (result&&result.length > 0){
            for (var i=0,j=result.length;i<j ;i++ ){
                result[i].name = result[i].name.replace(" ","");
                if(result[i].name.length > 12){
                    longerhtml.push("<li class='longer-area'><a href='#none' data-value='"+result[i].id+"'>"+result[i].name+"</a></li>");
                }
                else if(result[i].name.length > 5){
                    longhtml.push("<li class='long-area'><a href='#none' data-value='"+result[i].id+"'>"+result[i].name+"</a></li>");
                }
                else{
                    html.push("<li><a href='#none' data-value='"+result[i].id+"'>"+result[i].name+"</a></li>");
                }
            }
        }
        else{
            html.push("<li><a href='#none' data-value='"+currentAreaInfo.currentFid+"'> </a></li>");
        }
        html.push(longhtml.join(""));
        html.push(longerhtml.join(""));
        html.push("</ul>");
        $("#"+idName).html(html.join(""));
        $("#"+idName).find("a").click(function(){
            resetBindMouseEvent();
            var areaId = $(this).attr("data-value");
            var areaName = $(this).html();
            var level = $(this).parent().parent().parent().attr("data-area");
            JdStockTabs.eq(level).find("a").attr("title",areaName).find("em").html(areaName.length>6?areaName.substring(0,6):areaName);
            level = new Number(level)+1;
            if (level=="2"){
                currentAreaInfo.currentCityId = areaId;
                currentAreaInfo.currentCityName = areaName;
                currentAreaInfo.currentAreaId = 0;
                currentAreaInfo.currentAreaName = "";
                currentAreaInfo.currentTownId = 0;
                currentAreaInfo.currentTownName = "";
            }
            else if (level=="3"){
                if (requestLevel == 4 && currentAreaInfo.currentAreaId != areaId){
                    requestLevel = 3;
                }
                currentAreaInfo.currentAreaId = areaId;
                currentAreaInfo.currentAreaName = areaName;
                currentAreaInfo.currentTownId = 0;
                currentAreaInfo.currentTownName = "";
            }
            else if (level=="4"){
                currentAreaInfo.currentTownId = areaId;
                currentAreaInfo.currentTownName = areaName;
            }
            currentLocation = currentAreaInfo.currentProvinceName;
            GetStockInfoOrNextAreas(pageConfig.product.skuidkey,currentAreaInfo.currentProvinceId,currentAreaInfo.currentCityId,currentAreaInfo.currentAreaId,currentAreaInfo.currentTownId,pageConfig.product.cat[2],level);
        });
        //ҳ����μ���
        if (currentPageLoad.isLoad){
            var tempDom = $("#"+idName+" a[data-value='"+currentPageLoad.areaCookie[level-1]+"']");
            if (tempDom.length == 0){
                tempDom = $("#"+idName+" a").eq(0);
            }
            if(currentPageLoad.areaCookie&&currentPageLoad.areaCookie[level-1]&&currentPageLoad.areaCookie[level-1]>0&&tempDom.length>0){
                //����cookie�иü�����ID
                tempDom.click();
            }
            else{
                $("#"+idName+" a:first").click();
            }
        }
    }
}
/**
�¼���ַ�ص�����
**/
function getAreaListcallback(result){
    var level = currentAreaInfo.currentLevel;
    getAreaList(result,getIdNameByLevel(level),level);
}
/**
���ݸ���ַ����ַ�ȼ���ȡ�¼���ַ�б�
**/
function getChildAreaHtml(fid,level){
    var idName = getIdNameByLevel(level);
    if (idName){
        $("#stock_province_item,#stock_city_item,#stock_area_item,#stock_town_item").hide();
        $("#"+idName).show().html("<div class='iloading'>���ڼ����У����Ժ�...</div>");
        JdStockTabs.show().removeClass("curr").eq(level-1).addClass("curr").find("em").html("��ѡ��");
        for (var i=level,j=JdStockTabs.length;i<j ;i++ ){
            JdStockTabs.eq(i).hide();
        }
        currentAreaInfo.currentLevel = level;
        if(level == 2 && provinceCityJson[fid+""]){
            getAreaListcallback(provinceCityJson[fid+""]);
        }
        else{
            currentAreaInfo.currentFid = fid;
            $.getJSONP("http://d.360buy.com/area/get?fid="+fid+"&callback=getAreaListcallback");
        }
    }
}
function getIdNameByLevel(level){
    var idName = "";
    if (level == 1){
        idName = "stock_province_item";
    }
    else if (level == 2){
        idName = "stock_city_item";
    }
    else if (level == 3){
        idName = "stock_area_item";
    }
    else if (level == 4){
        idName = "stock_town_item";
    }
    return idName;
}
//��Ҫ�ĵ�ַ�㼶
var requestLevel = 1;
//�Ƿ������Ʒ
var isAreaProduct = false;
if(!eleRegion) var eleRegion=null;
if(!eleSkuIdKey) var eleSkuIdKey=null;
function initrequestLevel(){
    requestLevel = 3;
    isAreaProduct = false;
    if(eleSkuIdKey){
        requestLevel = 3;
        isAreaProduct = true;
    }
}
//��ǰ������Ϣ
var currentAreaInfo;
//��ʼ����ǰ������Ϣ
function CurrentAreaInfoInit(){
    currentAreaInfo =  {"currentLevel": 1,"currentProvinceId": 1,"currentProvinceName":"����","currentCityId": 0,"currentCityName":"","currentAreaId": 0,"currentAreaName":"","currentTownId":0,"currentTownName":""};
}
//�ص�����
function getStockCallback(result){
    if (result.stock&&(result.stock.code==3||result.stock.code==4)&&result.stock.level>1){
        //��Ҫ��һ�����㣬����Ҫ�����㼶����1
        requestLevel = result.stock.level;
        if (currentAreaInfo.currentRequestLevel<result.stock.level){
            GetStockInfoOrNextAreas(pageConfig.product.skuidkey,currentAreaInfo.currentProvinceId,currentAreaInfo.currentCityId,currentAreaInfo.currentAreaId,currentAreaInfo.currentTownId,pageConfig .product.cat[2],currentAreaInfo.currentRequestLevel);
        }
    }
    else{
        reBindStockEvent();
        for (var i=currentAreaInfo.currentRequestLevel,j=JdStockTabs.length;i<j;i++){
            JdStockTabs.eq(i).hide();
            JdStockContents.eq(i).hide();
        }
        getProvinceStockCallback(result);
    }
}

//��Ӫ���˷�
function aboutSelfDeliveCash(type,flag){
    if((pageConfig.product.skuid+"").length<10||flag){
        if(dCashDescInfo.loadPriceCnt==dCashDescInfo.loadStockCnt&&dCashDescInfo.bigger39&&!dCashDescInfo.dCash){
            if(type == 1){ //stock
                return '<a href="http://help.jd.com/help/question-892.html#help2215" target="_blank" class="free_delivery" title="�˽����ͷ���ȡ��׼"></a>';
            }
            else if (type == 2){ //price
                if($("#promise-ico").length>0){
                    if($("#promise-ico .free_delivery").length==0){
                        $('<a href="http://help.jd.com/help/question-892.html#help2215" target="_blank" class="free_delivery" title="�˽����ͷ���ȡ��׼"></a>').appendTo("#promise-ico");
                    }
                }
                else{
                    $('<span id="promise-ico">֧�֣�<a href="http://help.jd.com/help/question-892.html#help2215" target="_blank" class="free_delivery" title="�˽����ͷ���ȡ��׼"></a></span>').appendTo("#summary-service .dd");
                }
            }
        }
    }
}
function easybuysubmit(r){
	if(r&&r.success&&r.jumpUrl){
		 window.location=r.jumpUrl;
	}
	else if(r&&!r.success&&r.message){
		$.jdThickBox({
			width: 400,
			height: 200,
			title: '��ʾ',
			source: '<div style="padding:10px"><img class="fl" style="margin-right:10px;" src="http://misc.360buyimg.com/jd2008/skin/df/i/remind.png" /><span style="font:bold 16px arial;color:#005ea8">'+r.message+'</span></div>'
		});
		$("#btn-easybuy-submit").show();
		$("#btn-easybuy-submit-ing").hide();
	}
}
var checkLogin = function(cb) {
	if ( typeof cb !== 'function' ) { return; }
	$.getJSON('http://passport.jd.com/loginservice.aspx?method=Login&callback=?', function(r) {
		if ( r.Identity ) {
			cb(r.Identity);
		}
	});
};

function newEasyBuyInit(){
	if(dCashDescInfo.loadPriceCnt==dCashDescInfo.loadStockCnt){
		if(itemEasyBuy.bigger10&&pageConfig.product.isStock&&!pageConfig.product.YuShou
			&&pageConfig.product.cat[1]!=794&&pageConfig.product.cat[1]!=6880&&pageConfig.product.cat[1]!=703&&pageConfig.product.cat[0]!=4938&&pageConfig.product.cat[2]!=6980&&!pageConfig.product.isHeyue&&!pageConfig.product.isLOC&&!pageConfig.product.isXnzt&&!pageConfig.product.isLSP){
			checkLogin(function(r) { 
				if(r&&r.IsAuthenticated){
					$.easybuy_button.html("<a id='btn-easybuy-submit' class='btn-easybuy' href='#none'>���ɹ�<b></b></a>");
					$("#btn-easybuy-submit").click(function () {
						$("#btn-easybuy-submit").hide().after("<a id='btn-easybuy-submit-ing' class='btn-easybuy css3-btn-gray' href='#none'>�ύ��<b></b></a>");
						$.extend(jdModelCallCenter.settings, {
							clstag1: 0,
							clstag2: 0,
							id: pageConfig.product.skuid,
							fn: function () {
								$.login({
									modal: true,
									complete: function (result) {
										if (result != null && result.IsAuthenticated != null && result.IsAuthenticated) {								
											$.getJSONP("http://easybuy.jd.com/skuDetail/submitEasybuyOrder.action?callback=easybuysubmit&skuId="+pageConfig.product.skuid+"&num="+$("#buy-num").val());
										}
										else{
											$("#btn-easybuy-submit").show();
											$("#btn-easybuy-submit-ing").hide();
										}
									}
								})
							}
						});
						jdModelCallCenter.settings.fn();
					});
				}
				else{
					$("#btn-easybuy-submit").remove();
					$("#btn-easybuy-submit-ing").remove();
				}
			});
		}
		else{
			$.easybuy_button.html("");
		}
	}
}
var dCashDescInfo={loadPriceCnt:0,loadStockCnt:0,bigger39:true,dCash:false};
var itemEasyBuy={bigger10:true};
//����sku�۸�
function cnp(r){
    var price = "";
    dCashDescInfo.loadPriceCnt ++;
    if (r&&r.length>0){
        if (new Number(r[0].p)>0){  
            price = "��"+r[0].p;
            pageConfig.product.jp = r[0].p;
            pageConfig.product.mp = r[0].m;
            if(new Number(r[0].p)<39){
                dCashDescInfo.bigger39 = false;
            }else{
                dCashDescInfo.bigger39 = true;
			}
            if(new Number(r[0].p)<10){
                itemEasyBuy.bigger10 = false;
            }else{
                itemEasyBuy.bigger10 = true;
			}
            //aboutSelfDeliveCash(2);
			if(useEasyBuy)newEasyBuyInit();
        }
    }
    if (!price){
        price = "���ޱ���";
    }
    $("#summary-price .p-price,#mini-jd-price").html(price);
	if(new Number(r[0].m)>0){
		$("#summary-market").show();
		$("#page_maprice").html("��"+r[0].m);
	}else{
		$("#summary-market").hide();
	}
    try{
        if(new Number(r[0].p)>0&&new Number(r[0].m)>0){
            var n = new Number(r[0].p)/new Number(r[0].m);
            n = new Number(n).toFixed(2)<n?parseInt(n*100)+1:parseInt(n*100);
            n = new Number(n/10).toFixed(1);
			if(pageConfig.product.isFlashPurchase||((pageConfig.product.skuid+"").length==10&&(pageConfig.product.cat[0]== 1713||pageConfig.product.cat[0]==4051||pageConfig.product.cat[0]==4052||pageConfig.product.cat[0]==4053))){
				$("#red-zhekou").html(n+"��");
			}
        }
    }catch(e){}
}
function setPriceData(skuid,area) {
    $.getJSONP("http://p.3.cn/prices/get?skuid=J_"+skuid+"&type=1"+(area?"&area="+area:"")+"&callback=cnp");
}
function getAreaSkuState(skuid){
    if(!eleSkuIdKey) return warestatus;
    for (var i=0,j=eleSkuIdKey.length;i<j;i++){
        if (eleSkuIdKey[i].SkuId == skuid && eleSkuIdKey[i].state != undefined){
            return eleSkuIdKey[i].state;
        }
    }
    return 1;
}
//���ݵ����任sku����Ӧ��Ϣ
function getSkuId_new(cid,aid){
    if(eleSkuIdKey&&eleSkuIdKey.length>0){
        var areas = null;
        for (var i=0,j=eleSkuIdKey.length;i<j ;i++ ){
            if(eleSkuIdKey[i].area&&eleSkuIdKey[i].area[cid+""]){
                areas = eleSkuIdKey[i].area[cid+""];
                if (areas.length==0||areas[0]+""=="0"){
                    return eleSkuIdKey[i].SkuId;
                }
                else if (areas.length>0){
                    for(var a=0,b=areas.length;a<b;a++){
                        if(areas[a]+""==aid+""){
                            return eleSkuIdKey[i].SkuId;
                        }
                    }
                }
            }
        }
    }
    return 0;
}
function getCurrentSkuId(provinceId,cityId,areaId){
    var currentSkuId = pageConfig.product.skuid;
    if (isAreaProduct && provinceId > 0 && cityId > 0 && areaId > 0){
        currentSkuId = 0;
        if(eleRegion){
            var provinceCitys = eleRegion[provinceId+""];
            if (provinceCitys && provinceCitys.citys && provinceCitys.citys.length>0){
                for (var i=0,j=provinceCitys.citys.length; i<j; i++){
                    if (provinceCitys.citys[i].IdCity == cityId){
                        currentSkuId = provinceCitys.citys[i].SkuId;
                        break;
                    }
                }
            }
        }
        else{
            currentSkuId = getSkuId_new(cityId,areaId);
        }
    }
    return currentSkuId;
}
function chooseSkuToArea(provinceId,cityId,areaId){
    var currentSkuId = pageConfig.product.skuid;
    var currentSkuKey = pageConfig.product.skuidkey;
    if (isAreaProduct && provinceId > 0 && cityId > 0 && areaId > 0){
        currentSkuId = 0;
        currentSkuKey = "";
        if(eleRegion){
            var provinceCitys = eleRegion[provinceId+""];
            if (provinceCitys && provinceCitys.citys && provinceCitys.citys.length>0){
                for (var i=0,j=provinceCitys.citys.length; i<j; i++){
                    if (provinceCitys.citys[i].IdCity == cityId){
                        currentSkuId = provinceCitys.citys[i].SkuId;
                        break;
                    }
                }
            }
        }
        else{
            currentSkuId = getSkuId_new(cityId,areaId);
        }
        if (eleSkuIdKey&&eleSkuIdKey.length>0){
            for (var i=0,j=eleSkuIdKey.length;i<j;i++){
                if (eleSkuIdKey[i].SkuId == currentSkuId){
                    currentSkuKey = eleSkuIdKey[i].Key;
                    break;
                }
            }
        }
    }
    if (currentSkuId && currentSkuKey){
        if (currentSkuId == pageConfig.product.skuid){
            pageConfig.product.isChangeSku = false;
        }
        else{
            //�任������sku��ͬ
            pageConfig.product.isChangeSku = true;
        }
    }
    //�趨����Ʒ���¹�״̬
    warestatus = getAreaSkuState(currentSkuId);
    //��һ��ѡ���sku
    pageConfig.product.prevSku = pageConfig.product.skuid;
    //�任����Ӧ������sku
    pageConfig.product.skuid = currentSkuId;
    pageConfig.product.skuidkey = currentSkuKey;
    if (useAreaPrice&&!pricePageLoad){  //���������ؼ۸��Ҳ��ǳ�ʼ����
        setPriceData(pageConfig.product.skuid,[provinceId,cityId,areaId].join("_")); //�ı�۸�
    }
    pricePageLoad = false;
    return currentSkuKey;
}
function refreshPageInfos(){
    //setCXAdvertisement(pageConfig.product.skuid,pageConfig.product.skuidkey);//����
    try {
        if(window.fq_init)fq_init();
        if($("#Tip_apply").length>0&&fq_serverSite)$("#Tip_apply").attr("href",fq_serverSite + "ShoppingCart_fqInit.aspx?skuId=" + pageConfig.product.skuid + "&skuCount=1");//����   
        $("#choose-btn-divide").html("");
        if(window.setIM)setIM();
    } catch (e) {
    }
}
function getTJAreaSku(r){
	$("#local-seller,#local-seller1,#jd-seller,#jd-seller1").remove();
    if(r&&r.resultCode==1&&r.skuId&&r.skuId!=pageConfig.product.skuid+''){
        //setCommonCookies(currentAreaInfo.currentProvinceId,currentLocation,currentAreaInfo.currentCityId,currentAreaInfo.currentAreaId,0,true);
		if($("#ypds-list").length==0){
			if ($("#brand-bar-pop").length > 0){
				$('<div class="m fr" id="ypds-list"></div>').appendTo("#brand-bar-pop");
			}
			else{
				$('<div class="m fr" id="ypds-list"></div>').appendTo("#brand-bar");
			}
		}
		if((r.skuId+"").length==10){
			if($("#local-seller").length==0){
				$('<div class="mt" id="local-seller"><span class="fl"><b>������������</b></span></div><div class="mc" id="local-seller1"><ul><li id="J_'+r.skuId+'"><div class="fl"><a target="_blank" href="http://item.jd.com/'
				+r.skuId+'.html" clstag="shangpin|keycount|product|yipinduoshang">̫ԭ�ƾô�����</a></div><div class="lh hl_red"></div></li></ul></div>').appendTo("#ypds-list");
				$.ajax({
					url:"http://p.3.cn/prices/get?skuid=J_"+r.skuId+"&type=1&area="+currentAreaInfo.currentProvinceId+"_"+currentAreaInfo.currentCityId+"_"+currentAreaInfo.currentAreaId,
					dataType:"jsonp",
					type:"get",
					success:function(r){
						if(r&&r.length>0){
							var price="���ޱ���";
							if (new Number(r[0].p)>0){  
								price = "��"+r[0].p;
							}
							$("#"+r[0].id+" .hl_red").html(price);
						}
					}
				});
			}
		}
		else{
			if($('#J_'+r.skuId).length>0)return;
			$('<div class="mt" id="jd-seller"><span class="fl"><b>������������</b></span></div><div class="mc" id="jd-seller1"><ul><li id="J_'+r.skuId+'"><div class="fl"><a target="_blank" href="http://item.jd.com/'
			+r.skuId+'.html" clstag="shangpin|keycount|product|yipinduoshang">�����̳�</a></div><div class="lh hl_red"></div></li></ul></div>').appendTo("#ypds-list");
			$.ajax({
				url:"http://p.3.cn/prices/get?skuid=J_"+r.skuId+"&type=1&area="+currentAreaInfo.currentProvinceId+"_"+currentAreaInfo.currentCityId+"_"+currentAreaInfo.currentAreaId,
				dataType:"jsonp",
				type:"get",
				success:function(r){
					if(r&&r.length>0){
						var price="���ޱ���";
						if (new Number(r[0].p)>0){  
							price = "��"+r[0].p;
						}
						$("#"+r[0].id+" .hl_red").html(price);
					}
				}
			});
		}
    }
}
//��ȡ���Ϳ����Ϣ����һ����ַ
function GetStockInfoOrNextAreas(skuKey,provinceId,cityId,areaId,townId,sortId,curLevel){
        try{
            pageConfig.product.currentProvinceId = provinceId;
            currentAreaInfo.currentProvinceId = provinceId;
            currentAreaInfo.currentCityId = cityId;
            currentAreaInfo.currentAreaId = areaId;
            currentAreaInfo.currentTownId = townId;
            curLevel = new Number(curLevel);
            if (curLevel == requestLevel){
                currentAreaInfo.currentLevel = curLevel; //
                currentAreaInfo.currentRequestLevel = curLevel;  // 
                //������Ʒ��Ҫ�ҵ�������Ӧ��sku
                if (areaId > 0&&townId<=0){
                    skuKey = chooseSkuToArea(provinceId,cityId,areaId);
                }
                if(pageConfig.product.TJ=='1'&&provinceId>0&&cityId>0&&areaId>0){
                    $.getJSONP("http://d.360buy.com/goodsrelation/get?callback=getTJAreaSku&skuId="+pageConfig.product.skuid+"&provinceId="+provinceId+"&cityId="+cityId+"&countryId="+areaId);
                }
                pageConfig.product.skuidkey = skuKey;
                JdStockTabs.removeClass("curr").eq(curLevel-1).addClass("curr");
                JdStockTabs.find("a").removeClass("hover").eq(curLevel-1).addClass("hover");
                if (skuKey&&provinceId!=84&&warestatus==1){
					if(pageConfig.product.isLSP){
                    $.getJSONP(stockServiceDomain+"/oto.html?callback=getStockCallback&skuid="+pageConfig.product.skuid+"&provinceid="+provinceId+"&cityid="+cityId+"&areaid="+areaId+"&townid="+townId+"&vid="+pageConfig.product.venderId
						+"&sortid1="+pageConfig .product.cat[0]+"&sortid2="+pageConfig .product.cat[1]+"&sortid3="+pageConfig .product.cat[2]);
					}
					else{
                    $.getJSONP(stockServiceDomain+"/gds.html?callback=getStockCallback&skuid="+skuKey+"&provinceid="+provinceId+"&cityid="+cityId+"&areaid="+areaId+"&townid="
                        +townId+"&sortid1="+pageConfig .product.cat[0]+"&sortid2="+pageConfig .product.cat[1]+"&sortid3="+pageConfig .product.cat[2]);  
					}
                }
                else{
                    getStockCallback({"stock":{"IsPurchase":false,"ArrivalDate":null,"Ext":"","PopType":0,"StockStateName":"�޻�","code":1,"StockState":0}});
                }
				setCXAdvertisement(pageConfig.product.skuid, pageConfig.product.skuidkey);
				checkColorSizeStock(provinceId,cityId,areaId);
            }
            else if (curLevel < requestLevel){ //����Ҫ��ȡ�¼���ַ
                currentAreaInfo.currentLevel = curLevel +1;
                JdStockTabs.removeClass("curr").eq(curLevel).addClass("curr");
                JdStockTabs.find("a").removeClass("hover").eq(curLevel).addClass("hover");
                getChildAreaHtml(arguments[curLevel],curLevel +1);
            }
        }catch(err){
        }
}
function setCommonCookies(provinceId,provinceName,cityId,areaId,townId,isWriteAdds){
    setNewCookie("ipLocation", provinceName, 30, "/", locPageHost, false);
    setNewCookie("areaId", provinceId, 10, "/", locPageHost, false);
    var adds = provinceId+"-"+cityId+"-"+areaId+"-"+townId;
    setNewCookie("ipLoc-djd", adds, 30, "/", locPageHost, false);
    if (!isUseServiceLoc||!isWriteAdds){
    }
    else{
        $.ajax({url:"http://uprofile.jd.com/u/setadds",type:"get",dataType:"jsonp",data:{adds:adds}});
    }
}
//����ʡ��ID��ȡ����
function getNameById(provinceId){
    for(var o in iplocation){
        if (iplocation[o]&&iplocation[o].id==provinceId){
            return o;
        }
    }
    return "����";
}
//��ʼ��
var currentPageLoad = {"isLoad":true,"areaCookie":[1,72,0,0]};
//�л���ǩ�ؼ�
var JdStockTabs = null;
var JdStockContents = null;
var provinceHtml = '<div data-widget="tabs" class="m JD-stock" id="JD-stock">'
                                +'<div class="mt">'
                                +'    <ul class="tab">'
                                +'        <li data-index="0" data-widget="tab-item" class="curr"><a href="#none" class="hover"><em>��ѡ��</em><i></i></a></li>'
                                +'        <li data-index="1" data-widget="tab-item" style="display:none;"><a href="#none" class=""><em>��ѡ��</em><i></i></a></li>'
                                +'        <li data-index="2" data-widget="tab-item" style="display:none;"><a href="#none" class=""><em>��ѡ��</em><i></i></a></li>'
                                +'        <li data-index="3" data-widget="tab-item" style="display:none;"><a href="#none" class=""><em>��ѡ��</em><i></i></a></li>'
                                +'    </ul>'
                                +'    <div class="stock-line"></div>'
                                +'</div>'
                                +'<div class="mc" data-area="0" data-widget="tab-content" id="stock_province_item">'
                                +'    <ul class="area-list">'
                                +'       <li><a href="#none" data-value="1">����</a></li><li><a href="#none" data-value="2">�Ϻ�</a></li><li><a href="#none" data-value="3">���</a></li><li><a href="#none" data-value="4">����</a></li><li><a href="#none" data-value="5">�ӱ�</a></li><li><a href="#none" data-value="6">ɽ��</a></li><li><a href="#none" data-value="7">����</a></li><li><a href="#none" data-value="8">����</a></li><li><a href="#none" data-value="9">����</a></li><li><a href="#none" data-value="10">������</a></li><li><a href="#none" data-value="11">���ɹ�</a></li><li><a href="#none" data-value="12">����</a></li><li><a href="#none" data-value="13">ɽ��</a></li><li><a href="#none" data-value="14">����</a></li><li><a href="#none" data-value="15">�㽭</a></li><li><a href="#none" data-value="16">����</a></li><li><a href="#none" data-value="17">����</a></li><li><a href="#none" data-value="18">����</a></li><li><a href="#none" data-value="19">�㶫</a></li><li><a href="#none" data-value="20">����</a></li><li><a href="#none" data-value="21">����</a></li><li><a href="#none" data-value="22">�Ĵ�</a></li><li><a href="#none" data-value="23">����</a></li><li><a href="#none" data-value="24">����</a></li><li><a href="#none" data-value="25">����</a></li><li><a href="#none" data-value="26">����</a></li><li><a href="#none" data-value="27">����</a></li><li><a href="#none" data-value="28">����</a></li><li><a href="#none" data-value="29">�ຣ</a></li><li><a href="#none" data-value="30">����</a></li><li><a href="#none" data-value="31">�½�</a></li><li><a href="#none" data-value="32">̨��</a></li><li><a href="#none" data-value="42">���</a></li><li><a href="#none" data-value="43">����</a></li><li><a href="#none" data-value="84">���㵺</a></li>'
                                +'    </ul>'
                                +'</div>'
                                +'<div class="mc" data-area="1" data-widget="tab-content" id="stock_city_item"></div>'
                                +'<div class="mc" data-area="2" data-widget="tab-content" id="stock_area_item"></div>'
                                +'<div class="mc" data-area="3" data-widget="tab-content" id="stock_town_item"></div>'
                                +'</div>';
var mouseEventChange = false;
function resetBindMouseEvent(){
    if (!mouseEventChange&&!currentPageLoad.isLoad){
        mouseEventChange = true;
        $("#store-selector").unbind("mouseout");
        $("#store-selector").unbind("mouseover").bind("mouseover",function(){
            $("#store-selector").addClass("hover");
        });
    }
}
function reBindStockEvent(){
    $("#store-selector").removeClass("hover");
    //mouseEventChange = false;
    /*$("#store-selector").unbind("mouseout").bind("mouseout",function(){
        $("#store-selector").removeClass("hover");
    });*/
}
var pricePageLoad = false; //�Ƿ��Ѿ���ʼ�����ؼ۸�
var useAreaPrice = true;
function getStockInfoByArea(ipLoc){//��ȡ�������
    if(!ipLoc){
        ipLoc = getCookie("ipLoc-djd");
    }
    currentPageLoad.notSet = false;
    if (!ipLoc) {
        currentPageLoad.notSet = true;
    }
    ipLoc = ipLoc?ipLoc.split("-"):[1,72,0,0];
    if (useAreaPrice&&ipLoc.length>2&&new Number(ipLoc[2])>0){
        pricePageLoad = true;
        setPriceData(getCurrentSkuId(ipLoc[0],ipLoc[1],ipLoc[2]),[ipLoc[0],ipLoc[1],ipLoc[2]].join("_")); //��ʼ�����ؼ۸�
    }
    currentPageLoad.areaCookie = ipLoc;
    currentAreaInfo.currentProvinceName = getNameById(ipLoc[0]);
    currentLocation = currentAreaInfo.currentProvinceName;
    var province = iplocation[currentLocation];
    province = province?province:{ id: "1", root: 0, djd: 1,c:72 };
    currentAreaInfo.currentProvinceId = province.id;
    JdStockTabs.eq(0).find("em").html(currentAreaInfo.currentProvinceName);
    GetStockInfoOrNextAreas(pageConfig.product.skuidkey,province.id,0,0,0,pageConfig .product.cat[2],1);
}
var isUseServiceLoc = true; //�Ƿ�Ĭ��ʹ�÷���˵�ַ
(function(){
    if($(".product-intro-itemover").length>0){
        if(window.noItemOver)noItemOver.init(pageConfig.product.type);
        return;
    }
    CurrentAreaInfoInit();
    initrequestLevel();
    $(provinceHtml).insertBefore("#store-selector .content .clr");
    $("#store-selector").mouseover(function(){$(this).addClass("hover");}).mouseout(function(){$(this).removeClass("hover");}); 
    JdStockTabs = $("#JD-stock .tab li");
    JdStockContents = $("#JD-stock div[data-widget='tab-content']");
    JdStockTabs.bind('click',function(){
        var level = $(this).attr("data-index");
        level = new Number(level);
        JdStockTabs.removeClass("curr").eq(level).addClass("curr");
        JdStockTabs.find("a").removeClass("hover").eq(level).addClass("hover");
        JdStockContents.hide().eq(level).show();
    });
	var ipLocTmp = getCookie("ipLoc-djd");
	if (ipLocTmp){
		getStockInfoByArea(ipLocTmp);
	}
	else{
		if (isUseServiceLoc){
			try{
				$.ajax({
					url:"http://uprofile.jd.com/u/getadds",
					type:"get",
					dataType:"jsonp",
					timeout:500,
					success:function(r){
						if (r&&r.adds&&r.adds!="null"){
							var ipLoc = r.adds;
							getStockInfoByArea(ipLoc);
							ipLoc = ipLoc.split("-");
							var province=0,city=0,area=0,town=0,proName='';
							if(ipLoc[0]&&new Number(ipLoc[0])>0){
								province = ipLoc[0];
								proName = getNameById(province);
								if(ipLoc[1]&&new Number(ipLoc[1])>0){
									city = ipLoc[1];
									if(ipLoc[2]&&new Number(ipLoc[2])>0){
										area = ipLoc[2];
										if(ipLoc[3]&&new Number(ipLoc[3])>0){
											town = ipLoc[3];
										}
									}
								}
								setCommonCookies(province,proName,city,area,town,false);
							}
						}
						else{
							getStockInfoByArea(null);
						}
					},
					error:function(XMLHttpRequest, textStatus, errorThrown){
						getStockInfoByArea(null);
					}
				});
			}catch(e){}
		}
	}
    $("#stock_province_item a").unbind("click").click(function() {
        currentPageLoad.isLoad = false;
        resetBindMouseEvent();
        try{
            CurrentAreaInfoInit();
            currentAreaInfo.currentProvinceId = $(this).attr("data-value");
            currentAreaInfo.currentProvinceName = $(this).html();
            currentLocation = currentAreaInfo.currentProvinceName;
            JdStockTabs.eq(0).find("em").html(currentAreaInfo.currentProvinceName);
            initrequestLevel();
            GetStockInfoOrNextAreas(pageConfig.product.skuidkey,currentAreaInfo.currentProvinceId,0,0,0,pageConfig .product.cat[2],1);
        }
        catch (err){
        }
    }).end();
    $("#store-selector .close").unbind("click").bind("click",function(){
        reBindStockEvent();
    });
    //������Ϣ
})();
/*#$%#@!%*/
(function(iplocation){
    var serializeUrlCommon=function(url) {
        var sep = url.indexOf('?'),
            link = url.substr( 0, sep),
            params = url.substr( sep+1 ),
            paramArr = params.split('&'),
            len = paramArr.length,i,
            res = {},curr,key,val;

        for ( i=0; i<len; i++) {
            curr = paramArr[i].split('=');
            key = curr[0];
            val = curr[1];

            res[key] = val;
        }

        return {
            url: link,
            param: res
        }
    };
    if ( /storeAddressId/.test(location.href)) {
            // ��url��storeAddressId��ֵ��д��cookie
            var url=serializeUrlCommon(location.href);
            if (url.param['storeAddressId']){
                var pca=url.param['storeAddressId'].split('_');
                if(pca){
                    var proname="";
                    var area="";
                    if(pca[0] && parseInt(pca[0]) == pca[0]) {
                        for(var o in iplocation){
                            if(iplocation[o].id==pca[0]){
                                proname=o;
                                area=pca[0];
                                break;
                            }
                        }
                    }
                    if(pca[1] && parseInt(pca[1]) == pca[1] && parseInt(pca[1])>0) {
                        area += "-"+pca[1];
                    }
                    else if(area){
                        area += "-0";
                    }
                    if(pca[2] && parseInt(pca[2]) == pca[2] && parseInt(pca[2])>0) {
                        area += "-"+pca[2];
                    }
                    else if(area){
                        area += "-0";
                    }
                    if(proname){
                        setNewCookie("ipLocation", proname, 30, "/", locPageHost, false);
                    }
                    if(area){
                        setNewCookie("ipLoc-djd", area, 30, "/", locPageHost, false);
                    }
                }
            }
    }
})(iplocation);
// �������
function setproductad(r){
    if (r&&r.length>0){
        $("#name strong").html(r[0].ad?r[0].ad:"");
    }
}
function setproductadwords(r){
    if (r&&r.AdWordList&&r.AdWordList.length>0&&r.AdWordList[0]){
        $("#name strong").html(r.AdWordList[0].waretitle?r.AdWordList[0].waretitle:"");
    }
}
function setCXAdvertisement(skuid, skuidkey) {  
    $("#name strong").html("");
    $.getJSONP("http://ad.3.cn/ads/mgets?skuids=AD_"+skuid+"&areaCode="+[currentAreaInfo.currentProvinceId,currentAreaInfo.currentCityId,currentAreaInfo.currentAreaId].join("_")+"&callback=setproductad");
}
//setCXAdvertisement(pageConfig.product.skuid, pageConfig.product.skuidkey); 
//��ɫ����
var cur_same_colorsize_stock={};
cur_same_colorsize_stock.check=(pageConfig.product.urlskuid+"").length==10&&"1318|1315".indexOf(pageConfig.product.cat[0]+"")>-1;
cur_same_colorsize_stock.load=0;
cur_same_colorsize_stock.skusinit=0;
cur_same_colorsize_stock.choose=0;
var choose_color=$("#choose-color a");var choose_colori=$("#choose-color .item");
var choose_version=$("#choose-version .item");
var alert_choose_version=$("#choose-version .dt").html();alert_choose_version=alert_choose_version?alert_choose_version.replace("��",""):"";
var alert_choose_color=$("#choose-color .dt").html();alert_choose_color=alert_choose_color?alert_choose_color.replace("��",""):"";
var alert_choose="��ѡ"+alert_choose_color.replace("ѡ��","")+"��"+alert_choose_version.replace("ѡ��","")+"��Ʒ�ڸõ����޻�";
var alert_choose1="��ѡ"+alert_choose_version.replace("ѡ��","")+"��"+alert_choose_color.replace("ѡ��","")+"��Ʒ�ڸõ����޻�";
var csobj={};var scobj={};
var checkColorSize=function(){},changeColorSize=function(){};
var only_one_color=null,only_one_size=null;
if(choose_color.length>0||choose_version.length>0){
    if(ColorSize&&ColorSize.length>0){
        var cs=null;
        for (var i=0,j=ColorSize.length;i<j;i++){
			if(!ColorSize[i].Color){ColorSize[i].Color=" "}
			if(!ColorSize[i].Size){ColorSize[i].Size=" "}
            cs=ColorSize[i];
            if(!csobj[cs.Color])csobj[cs.Color]={};
            csobj[cs.Color][cs.Size]=cs.SkuId;
            if(!scobj[cs.Size])scobj[cs.Size]={};
            scobj[cs.Size][cs.Color]=cs.SkuId;
        }
		if(choose_color.length==0){
			only_one_color=ColorSize[0].Color;
		}
		if(choose_version.length==0){
			only_one_size=ColorSize[0].Size;
		}
    }
    checkColorSize=function(c,s){
        if(csobj[c]&&csobj[c][s]){
			if(cur_same_colorsize_stock[csobj[c][s]+""]&&cur_same_colorsize_stock[csobj[c][s]+""].stock==34){
				return 0;
			}
            return csobj[c][s];
		}
        return 0;
    }
    changeColorSize=function(flag){
        var cur_color=$("#choose-color .selected a").attr("title");
		if(only_one_color){
			cur_color=only_one_color;
		}
        if(cur_color&&csobj[cur_color]){
            var version=null;
            var choose_version_obj=null;
            for(var i=0,j=choose_version.length;i<j;i++){
                choose_version_obj=$(choose_version[i]).find("a").eq(0);
                version=choose_version_obj.text();
                if(!(version&&csobj[cur_color][version])
					||((csobj[cur_color][version]!=pageConfig.product.urlskuid||cur_same_colorsize_stock.choose)
					&&cur_same_colorsize_stock[csobj[cur_color][version]+""]&&cur_same_colorsize_stock[csobj[cur_color][version]+""].stock==34)){
                    $(choose_version[i]).attr("class","item disabled");
                    $(choose_version[i]).find("b").hide();
                    choose_version_obj.css("cursor","not-allowed").attr("title",alert_choose);
                }
                else{
                    if($(choose_version[i]).attr("class")=="item disabled")$(choose_version[i]).attr("class","item");
                    $(choose_version[i]).find("b").show();
                    choose_version_obj.css("cursor","pointer").attr("title",choose_version_obj.text());
                }
                $(choose_version[i]).find("i").remove();
            }
        }
        var cur_version = $("#choose-version .selected a").text();
		if(only_one_size){
			cur_version=only_one_size;
		}
        if(cur_version&&scobj[cur_version]){
            var color=null;
			var choose_color_obj=null;
            for(var i=0,j=choose_colori.length;i<j;i++){
				choose_color_obj=$(choose_colori[i]).find("a").eq(0);
                color=$($(choose_colori[i]).find("a")[0]).attr("title");
                if(!(color&&scobj[cur_version][color])
					||(scobj[cur_version][color]!=pageConfig.product.urlskuid
					&&cur_same_colorsize_stock[scobj[cur_version][color]+""]&&cur_same_colorsize_stock[scobj[cur_version][color]+""].stock==34)){
                    $(choose_colori[i]).attr("class","item disabled");
                    $(choose_colori[i]).find("b").hide();
					if(only_one_size){choose_color_obj.css("cursor","not-allowed").attr("title",alert_choose);}
                }
                else{
                    if($(choose_colori[i]).attr("class")=="item disabled")$(choose_colori[i]).attr("class","item");
                    $(choose_colori[i]).find("b").show();
                }
            }
        }
        else{
            $("#choose-color .disabled").attr("class","item");
        }
        $("<i></i>").insertBefore("#choose-version .disabled a");
		$("#choose-result").show().find(".dd").html("<em>��ѡ��</em>"+(cur_color&&cur_color!=" "?"<strong>��"+cur_color+"��</strong>":"")+(cur_color&&cur_color!=" "&&cur_version&&cur_version!=" "?"��":"")+(cur_version&&cur_version!=" "?"<strong>��"+cur_version+"��</strong>":"")
			+(cur_color?"":"<span class='item-warnning'><s></s>��"+alert_choose_color+"</span>")+(cur_version?"":"<span class='item-warnning'><s></s>��"+alert_choose_version+"</span>"));
		if(!cur_color){
			$("#choose-color").addClass("item-hl-bg");
		}
		else{
			$("#choose-color").removeClass("item-hl-bg");
		}
		if(!cur_version){
			$("#choose-version").addClass("item-hl-bg");
		}
		else{
			$("#choose-version").removeClass("item-hl-bg");
		}
        if(!flag){
            if($("#choose-noresult").length>0){$("#choose-noresult").remove();}
            $.easybuy_button.hide();
            $.divide_button.hide();
            $.notice_button.hide();
            if($.append_button.length>0)$.append_button.attr("href","#none").attr("onclick","").unbind("click"); //���ﳵ
            if($(".nav-minicart-btn").length>0)$(".nav-minicart-btn").hide(); //mini���ﳵ
            $("#choose-btn-subsidy").hide();
        }
    }	
    $("#choose-color a").attr("href","#none").unbind("click").click(function(){
        if($($(this).parent()).attr("class")=="item disabled"&&only_one_size)return;
		cur_same_colorsize_stock.choose=1;
        $("#choose-color .selected").attr("class","item");
        $($(this).parent()).attr("class","item selected");
        var c=$(this).attr("title");
        var s=$("#choose-version .selected a");
        if(s.length>0){s=s.text()}else{s=null}
		if(only_one_size){s=only_one_size}
        var sid=0;
        sid=checkColorSize(c,s);
        if(sid>0){window.location=sid+".html";}else{
            changeColorSize();
        }
    });
    $("#choose-version a").attr("href","#none").unbind("click").click(function(){
        if($($(this).parent()).attr("class")=="item disabled")return;
		cur_same_colorsize_stock.choose=1;
        var s=$(this).text();
        var c=$("#choose-color .selected a");
        if(c.length>0){c=c.attr("title")}else{c=null}
		if(only_one_color){c=only_one_color}
        var sid=0;
        sid=checkColorSize(c,s);
        if(sid>0){window.location=sid+".html";}else{
            changeColorSize();
        }
    });
}
var cur_same_colorsize = [];
function checkColorSizeStock(pid,cid,aid){
	if(window.ColorSize&&ColorSize.length>1){
		if(!cur_same_colorsize_stock.skusinit){
			for(var i=0,j=ColorSize.length;i<j;i++){
				if(ColorSize[i].SkuId+""==pageConfig.product.urlskuid+""){
					if ($("#choose-color .dd .selected").length==0){
						$("#choose-color a[title='"+ColorSize[i].Color+"']").parent().addClass(" selected");
					}
					if ($("#choose-version .dd .selected").length==0){
						$("#choose-version a[title='"+ColorSize[i].Size+"']").parent().addClass(" selected");
					}
				}
				cur_same_colorsize.push(ColorSize[i].SkuId+"");
			}
			cur_same_colorsize = cur_same_colorsize.join("");
			cur_same_colorsize_stock.skusinit=1;
		}
		if (cur_same_colorsize_stock.check){
			$.ajax({type:"get",dataType:"jsonp",url:stockServiceDomain+"/gsis.html",data:{"type":"multistocks","skuids":cur_same_colorsize,"provinceid":pid,"cityid":cid,"areaid":aid},success:function(r){
				for(var i=0,j=ColorSize.length;i<j;i++){
					if(r[ColorSize[i].SkuId+""]){
						ColorSize[i].stock=r[ColorSize[i].SkuId+""];
					}
					else{
						ColorSize[i].stock = 33;
					}
					cur_same_colorsize_stock[ColorSize[i].SkuId+""]=ColorSize[i];
				}
				changeColorSize(true);
				cur_same_colorsize_stock.load=1;
			}});
		}
		else {
			if(!cur_same_colorsize_stock.load){
				changeColorSize(true);
				cur_same_colorsize_stock.load=1;
			}
		}
	}
}
/******************/
var spuSort={"1316":"1-������ױ","1620":"1-�ҾӼ�װ","5025":"1-�ӱ�","6219":"2-ˮ�߾ƾ�","6233":"1-�������","6994":"1-��������","6196":"1-����","1319":"1-ĸӤ","1320":"1-ʳƷ���ϡ�����ʳƷ",
			"1315":"1-��������","4837":"3-�칫�ľ�","1466":"2-��������","1467":"2-������Ʒ","1463":"2-�˶���е","6728":"1-������Ʒ","1713":"1-ͼ��"};
if(true&&(spuSort[pageConfig.product.cat[0]+""]||spuSort[pageConfig.product.cat[1]+""]||spuSort[pageConfig.product.cat[2]+""])){
var spuServiceUrl = "http://spu.jd.com/json.html?cond=";
var spuPageUrl = "http://spu.jd.com/"+pageConfig.product.skuid+".html";
function showProvinceStockDeliver(r){
    if(!r||r.totalCount<2)return;
	if($("#ypds-list").length==0){
		if ($("#brand-bar-pop").length > 0){
			$('<div class="m fr" id="ypds-list"></div>').appendTo("#brand-bar-pop");
		}
		else{
			$('<div class="m fr" id="ypds-list"></div>').appendTo("#brand-bar");
		}
	}
    var spuVenderInfos = '';
    var topCount = 0;
	var cutCount = 0;
    for (var i=0,j=r.skuStockVenders.length;i<j;i++){
        if (pageConfig.product.skuid+"" != r.skuStockVenders[i].skuId && topCount < 3){
			if(r.skuStockVenders[i].venderId==46875){ //����TJ
				cutCount ++;
			}
			else{
				spuVenderInfos += '<li id="J_'+r.skuStockVenders[i].skuId+'"><div class="fl"><a href="http://item.jd.com/'+r.skuStockVenders[i].skuId+'.html" clstag="shangpin|keycount|product|yipinduoshang" target="_blank">'+((r.skuStockVenders[i].venderId&&(r.skuStockVenders[i].skuId+"").length==10)?r.skuStockVenders[i].venderName:'�����̳�')+'</a></div><div class="lh hl_red"></div></li>';				
				if($('#jd-seller1 #J_'+r.skuStockVenders[i].skuId).length>0)$("#jd-seller,#jd-seller1").remove();
				topCount ++;
			}
        }
    }
    $('<div id="ypds-info"><a href="'+spuPageUrl+'" class="hl_blue" target="_blank">'+(r.totalCount-cutCount)+'����������</a><span class="hl_red">\u3000��'+(r.minPrice+"")+'</span> ��</div>').insertAfter("#choose"); 
    spuVenderInfos = '<div class="mt"><span class="fl"><b>'+(pageConfig.product.cat[0]==1713?('<a href="'+spuPageUrl+'" target="_blank"><font style="color:#005EA7">'+(r.totalCount-cutCount)+'����������</font></a>'):'������������')+'</b></span><span class="extra"><a href="'
                          +spuPageUrl+'" class="hl_blue" target="_blank">�鿴ȫ��</a></span></div><div class="mc"><ul>'+spuVenderInfos;
    spuVenderInfos += '</ul></div>';
    $(spuVenderInfos).appendTo("#ypds-list");
    var sellerArray = $("#ypds-list li");
	var skuIds = [];
    for (var i=0,j=sellerArray.length;i<j;i++){
		skuIds.push(sellerArray.eq(i).attr("id"));
    }
	if(skuIds.length>0){
		$.ajax({
				url:"http://p.3.cn/prices/mgets?callback=?",
				data:{skuIds:skuIds.join(","),type:1},
				dataType:"jsonp",
				success:function(r){
					if(r&&r.length>0){
						for (var i=0,j=r.length;i<j;i++){
							$("#"+r[i].id+" .hl_red").html(new Number(r[i].p)>0?("��"+r[i].p):"���ޱ���");
						}
					}
				}
			});
	}
}
(function(){
    $.getJSONP(spuServiceUrl+"1_4_1_0_0_"+(pageConfig.product.cat[0]==1713?"1":"0")+"_"+pageConfig.product.skuid+"_1&callback=showProvinceStockDeliver");
})();
}
(function(){if($("#product-detail-2 table tr").length>0)$("<div class='detail-correction'>"+$("#product-detail-1 .detail-correction").html()+"</div>").insertBefore("#product-detail-2 table");})();
/*****/
function changeSpPrice(id){
    var val=$("#"+id).val();
    var min=$("#sp-price").val();
    var max=$("#sp-price1").val();
    if(parseInt(val)>0&&parseInt(val)+""==val){
    }else{$("#"+id).val("");}
}
function getImgFullPath(skuid,src,type){
    if(src&&src.toUpperCase().indexOf("HTTP:")==-1){
        src = "http://img1"+(new Number(skuid))%5+".360buyimg.com/n"+type+"/"+src;
    }
    return src;
}
(function(){
    if(!window.itemShopJsona&&!window.itemShopJsonb)return;
    var shopTempArray=[];
    var leftDom = $("#related-sorts").parent();
    if(window.itemShopJsona&&itemShopJsona.searchLink){
        var shopSearchHtml='<div id="sp-search" class="m m2" clstag="shangpin|keycount|product|pop-03">'
                    +'<div class="mt"><h2>��������</h2></div>'
                    +'<div class="mc">'
                        +'<p class="sp-form-item1"><label for="sp-keyword">�ؼ��֣�</label><span><input type="text" id="sp-keyword"/ onkeydown="javascript:if(event.keyCode==13){pageConfig.searchClick(1);}"></span></p>'
                        +'<p class="sp-form-item2"><label for="sp-price">��&#x3000;��</label><span><input type="text" id="sp-price" onkeyup="changeSpPrice(\'sp-price\');" onkeydown="javascript:if(event.keyCode==13){pageConfig.searchClick(1);}"/> �� <input type="text" id="sp-price1" onkeyup="changeSpPrice(\'sp-price1\');" onkeydown="javascript:if(event.keyCode==13){pageConfig.searchClick(1);}"/></span></p>'
                        +'<p class="sp-form-item3"><label for="">&#x3000;&#x3000;&#x3000;</label><span><input type="submit" value="����" id="btnShopSearch"/></span></p>'
                    +'</div>'
                +'</div>';
        shopTempArray.push(shopSearchHtml);
    }
    if(window.itemShopJsonb&&itemShopJsonb.shopCategory&&itemShopJsonb.shopCategory.length>0){
        var shopSortsHtml='<div id="sp-category" class="m m2" clstag="shangpin|keycount|product|pop-04">'
                +'<div class="mt"><h2>���ڷ���</h2></div>'
                +'<div class="mc">{content}</div>'
            +'</div>';
        var categoryContent=[];
        for (var i=0,j=itemShopJsonb.shopCategory.length;i<j;i++){
            categoryContent.push("<dl><dt"+((itemShopJsonb.shopCategory[i].childs&&itemShopJsonb.shopCategory[i].childs.length>0)?"":" class='sp-single'")
                +"><a href='"+(itemShopJsonb.shopCategory[i].url?itemShopJsonb.shopCategory[i].url:"#none")+"' target='_blank'><s></s>"+itemShopJsonb.shopCategory[i].title+"</a></dt>");
            if(itemShopJsonb.shopCategory[i].childs&&itemShopJsonb.shopCategory[i].childs.length>0){
                for (var t=0,h=itemShopJsonb.shopCategory[i].childs.length;t<h;t++){
                    categoryContent.push("<dd><a href='"+(itemShopJsonb.shopCategory[i].childs[t].url?itemShopJsonb.shopCategory[i].childs[t].url:"#none")+"' target='_blank'>"+itemShopJsonb.shopCategory[i].childs[t].title+"</a></dd>");
                }
            }
            categoryContent.push("</dl>");
        }
        shopTempArray.push(shopSortsHtml.replace("{content}",categoryContent.join("")));
    }
    if(window.itemShopJsonb&&itemShopJsonb.hotSale&&itemShopJsonb.hotSale.length==5){
        var shopHotSaleHtml='<div id="sp-hot-sale" class="m m2 m3" clstag="shangpin|keycount|product|pop-05">'
                    +'<div class="mt"><h2>��������</h2>'
                    +'</div>'
                    +'<div class="mc"><ul>{content}</ul></div>'
                +'</div>';
        var hotSaleContent=[];
        for (var i=0,j=itemShopJsonb.hotSale.length;i<j;i++){
            hotSaleContent.push('<li class="fore'+(i+1)+'">'
                            +'<div class="p-img"><a href="http://item.jd.com/'+itemShopJsonb.hotSale[i].skuId+'.html" title="'+itemShopJsonb.hotSale[i].goodsName+'" target="_blank"><img alt="'+itemShopJsonb.hotSale[i].goodsName+'" data-lazyload="'+getImgFullPath(itemShopJsonb.hotSale[i].skuId,itemShopJsonb.hotSale[i].goodsImg,2)+'"></a></div>'
                            +'<div class="p-name"><a href="http://item.jd.com/'+itemShopJsonb.hotSale[i].skuId+'.html" target="_blank" title="'+itemShopJsonb.hotSale[i].goodsName+'">'+itemShopJsonb.hotSale[i].goodsName+'</a></div>'
                            +'<div class="p-info p-bfc">'
                                +'<div class="p-count fl"><s>'+(i+1)+'</s><b>����'+itemShopJsonb.hotSale[i].saleCount+'��</b></div>'
                                +'<div class="p-price fr"><strong p="J_'+itemShopJsonb.hotSale[i].skuId+'"></strong></div>'
                            +'</div></li>');
        }
        shopTempArray.push(shopHotSaleHtml.replace("{content}",hotSaleContent.join("")));
    }
    if(window.itemShopJsonb&&itemShopJsonb.hotFocus&&itemShopJsonb.hotFocus.length==5){
        var shopHotFocusHtml='<div id="sp-hot-fo" class="m m2 m3" clstag="shangpin|keycount|product|pop-06">'
                    +'<div class="mt"><h2>���Ź�ע</h2></div>'
                    +'<div class="mc"><ul>{content}</ul></div>'
                +'</div>';
        var hotFocusContent=[];
        for (var i=0,j=itemShopJsonb.hotFocus.length;i<j;i++){
            hotFocusContent.push('<li class="fore'+(i+1)+'">'
                            +'<div class="p-img"><a href="http://item.jd.com/'+itemShopJsonb.hotFocus[i].skuId+'.html" title="'+itemShopJsonb.hotFocus[i].goodsName+'" target="_blank"><img alt="'+itemShopJsonb.hotFocus[i].goodsName+'" data-lazyload="'+getImgFullPath(itemShopJsonb.hotFocus[i].skuId,itemShopJsonb.hotFocus[i].goodsImg,2)+'"></a></div>'
                            +'<div class="p-name"><a href="http://item.jd.com/'+itemShopJsonb.hotFocus[i].skuId+'.html" target="_blank" title="'+itemShopJsonb.hotFocus[i].goodsName+'">'+itemShopJsonb.hotFocus[i].goodsName+'</a></div>'
                            +'<div class="p-info p-bfc">'
                                +'<div class="p-count fl"><s>'+(i+1)+'</s><b>'+itemShopJsonb.hotFocus[i].focusCount+'�˹�ע</b></div>'
                                +'<div class="p-price fr"><strong p="J_'+itemShopJsonb.hotFocus[i].skuId+'"></strong></div>'
                            +'</div></li>');
        }
        shopTempArray.push(shopHotFocusHtml.replace("{content}",hotFocusContent.join("")));
    }
    if(window.itemShopJsona&&itemShopJsona.shopRec&&itemShopJsona.shopRec.length>0){
        var shopRecommHtml='<div id="sp-reco" class="m m2 m3" clstag="shangpin|keycount|product|pop-07">'
                    +'<div class="mt"><h2>�곤�Ƽ�</h2></div>'
                    +'<div class="mc"><ul>{content}</ul></div>'
                +'</div>';
        var shopRecContent=[];
        for (var i=0,j=itemShopJsona.shopRec.length;i<j;i++){
            shopRecContent.push('<li class="fore'+(i+1)+'">'
                            +'<div class="p-img"><a href="http://item.jd.com/'+itemShopJsona.shopRec[i].skuId+'.html" title="'+itemShopJsona.shopRec[i].goodsName+'" target="_blank"><img alt="'+itemShopJsona.shopRec[i].goodsName+'" data-lazyload="'+getImgFullPath(itemShopJsona.shopRec[i].skuId,itemShopJsona.shopRec[i].goodsImg,2)+'"></a></div>'
                            +'<div class="p-name"><a href="http://item.jd.com/'+itemShopJsona.shopRec[i].skuId+'.html" target="_blank" title="'+itemShopJsona.shopRec[i].goodsName+'">'+itemShopJsona.shopRec[i].goodsName+'</a></div>'
                            +'<div class="p-info p-bfc">'
                               // +'<div class="p-count fl"></div>'
                                +'<div class="p-price"><strong p="J_'+itemShopJsona.shopRec[i].skuId+'"></strong></div>'
                            +'</div></li>');
        }
        shopTempArray.push(shopRecommHtml.replace("{content}",shopRecContent.join("")));
    }
    if(window.itemShopJsona&&itemShopJsona.shopAd){
        shopTempArray.push('<div id="sp-ad" class="m" clstag="shangpin|keycount|product|pop-08"><a href="'+itemShopJsona.shopAd.adUrl+'" target="_blank" title="'+itemShopJsona.shopAd.title+'"><img data-lazyload="'+itemShopJsona.shopAd.adImg+'" alt="'+itemShopJsona.shopAd.title+'"/></a></div>');
    }
    if(shopTempArray.length>0){
        leftDom.eq(0).html("").prepend(shopTempArray.join(""));
        pageConfig.searchClick=function(type){
            var keyword=$("#sp-keyword").val();
            if(keyword){keyword=encodeURI(keyword);}
            var minprice=$("#sp-price").val();
            var maxprice=$("#sp-price1").val();
            if (keyword||minprice||maxprice){
                window.open(itemShopJsona.searchLink+"?orderBy=5&keyword="+keyword+"&minPrice="+minprice+"&maxPrice="+maxprice,"_blank");
            }
            else{
                if(type == 1) return;
                window.open(itemShopJsona.searchLink+"?orderBy=5","_blank");
            }
        };
        $("#btnShopSearch").click(pageConfig.searchClick);
        $("#sp-hot-sale img").Jlazyload({type:"image",placeholderClass:"err-product"});
        $("#sp-hot-fo img").Jlazyload({type:"image",placeholderClass:"err-product"});
        $("#sp-reco img").Jlazyload({type:"image",placeholderClass:"err-product"});
        $("#sp-ad img").Jlazyload({type:"image"});
        var containers=$("#sp-hot-sale,#sp-hot-fo,#sp-reco");
        var priceDoms=containers.find(".p-price strong");
        var pids=[];
        for(var i=0,j=priceDoms.length;i<j;i++){
            pids.push(priceDoms.eq(i).attr("p"));
        }
        $.ajax({type:"get",
                dataType:"jsonp",
                url:"http://p.3.cn/prices/mgets",
                data:{type:1,skuIds:pids.join(",")},
                success:function(r){
                    if(r&&r.length>0){
                        for(var i=0,j=r.length;i<j;i++){
                            containers.find("strong[p='"+r[i].id+"']").html(new Number(r[i].p)>0?("��"+r[i].p):"���ޱ���");
                        }
                    }
                }
        });
    }
})();
var turl=$("#product-detail-5 .item-detail a:last").attr("href"); 
if(turl&&$("#product-detail-5 .link_1:last").html()=='���������ѯ......'){$("#product-detail-5 .link_1:last").attr("href",turl);}
if($(".right div[id='comment']").length==2)$(".right div[id='comment']").eq(1).remove();
if(typeof jsf=='undefined'||!jsf)jsf={};
if((pageConfig.product.skuid+"").length==6||(pageConfig.product.skuid+"").length==7){
	jsf.loadScript = function (url, callback){
		var head = document.getElementsByTagName('head')[0];
		var script = document.createElement('script');
		script.type = 'text/javascript';
		script.src = url;
		script.onreadystatechange = callback;
		script.onload = callback;
		head.appendChild(script);
	}
	$.ajax({type:"get",
			dataType:"jsonp",
			url:"http://x.jd.com/ShowInterface?ad_ids=57:1&urlcid3="+pageConfig.product.cat[2]+"&ad_type=8&spread_type=1&debug=0&location_info=0",
			success:function(data){
				 if (data) {
					if (data.errcode == 0) {
						try{
							$('<div id="ad_market_1" class="m"></div>').appendTo(".left:first");
							var el = document.getElementById('ad_market_1');
							var data2 =/<script type=\"text\/javascript\">(.*?)<\/script>/gim.exec(data.data);
							if (data2) {
								var data3 = data2[1];
								var dataHtml = data.data.replace(/<script type=\"text\/javascript\">.*?<\/script>/gmi,'');
								el.innerHTML = dataHtml;
								eval(data3);
							}else {
								el.innerHTML = data.data;
							}
							if (data.scriptsrc) {
								jsf.loadScript(data.scriptsrc);
							}
						}catch (e){}
					}
				}
			}
	});
}
