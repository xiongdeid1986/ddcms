/*
	熊@
	针对bootstrap
	name : ajaxxy
	ajaxxy.t(调用翻译事件)
	ajaxxy.submit(自动提交事件)
	@github.com
*/
(function(jQuery){
    if (typeof jQuery === 'undefined') { throw new Error('ajax-xy request jQuery') }else{var $ = jQuery}


    /*JQuery 扩展md5加密*/
    var rotateLeft = function (lValue, iShiftBits) {
        return (lValue << iShiftBits) | (lValue >>> (32 - iShiftBits));
    }
    var addUnsigned = function (lX, lY) {
        var lX4, lY4, lX8, lY8, lResult;
        lX8 = (lX & 0x80000000);
        lY8 = (lY & 0x80000000);
        lX4 = (lX & 0x40000000);
        lY4 = (lY & 0x40000000);
        lResult = (lX & 0x3FFFFFFF) + (lY & 0x3FFFFFFF);
        if (lX4 & lY4) return (lResult ^ 0x80000000 ^ lX8 ^ lY8);
        if (lX4 | lY4) {
            if (lResult & 0x40000000) return (lResult ^ 0xC0000000 ^ lX8 ^ lY8);
            else return (lResult ^ 0x40000000 ^ lX8 ^ lY8);
        } else {
            return (lResult ^ lX8 ^ lY8);
        }
    }
    var F = function (x, y, z) {
        return (x & y) | ((~x) & z);
    }
    var G = function (x, y, z) {
        return (x & z) | (y & (~z));
    }
    var H = function (x, y, z) {
        return (x ^ y ^ z);
    }
    var I = function (x, y, z) {
        return (y ^ (x | (~z)));
    }
    var FF = function (a, b, c, d, x, s, ac) {
        a = addUnsigned(a, addUnsigned(addUnsigned(F(b, c, d), x), ac));
        return addUnsigned(rotateLeft(a, s), b);
    };
    var GG = function (a, b, c, d, x, s, ac) {
        a = addUnsigned(a, addUnsigned(addUnsigned(G(b, c, d), x), ac));
        return addUnsigned(rotateLeft(a, s), b);
    };
    var HH = function (a, b, c, d, x, s, ac) {
        a = addUnsigned(a, addUnsigned(addUnsigned(H(b, c, d), x), ac));
        return addUnsigned(rotateLeft(a, s), b);
    };
    var II = function (a, b, c, d, x, s, ac) {
        a = addUnsigned(a, addUnsigned(addUnsigned(I(b, c, d), x), ac));
        return addUnsigned(rotateLeft(a, s), b);
    };
    var convertToWordArray = function (string) {
        var lWordCount;
        var lMessageLength = string.length;
        var lNumberOfWordsTempOne = lMessageLength + 8;
        var lNumberOfWordsTempTwo = (lNumberOfWordsTempOne - (lNumberOfWordsTempOne % 64)) / 64;
        var lNumberOfWords = (lNumberOfWordsTempTwo + 1) * 16;
        var lWordArray = Array(lNumberOfWords - 1);
        var lBytePosition = 0;
        var lByteCount = 0;
        while (lByteCount < lMessageLength) {
            lWordCount = (lByteCount - (lByteCount % 4)) / 4;
            lBytePosition = (lByteCount % 4) * 8;
            lWordArray[lWordCount] = (lWordArray[lWordCount] | (string.charCodeAt(lByteCount) << lBytePosition));
            lByteCount++;
        }
        lWordCount = (lByteCount - (lByteCount % 4)) / 4;
        lBytePosition = (lByteCount % 4) * 8;
        lWordArray[lWordCount] = lWordArray[lWordCount] | (0x80 << lBytePosition);
        lWordArray[lNumberOfWords - 2] = lMessageLength << 3;
        lWordArray[lNumberOfWords - 1] = lMessageLength >>> 29;
        return lWordArray;
    };
    var wordToHex = function (lValue) {
        var WordToHexValue = "", WordToHexValueTemp = "", lByte, lCount;
        for (lCount = 0; lCount <= 3; lCount++) {
            lByte = (lValue >>> (lCount * 8)) & 255;
            WordToHexValueTemp = "0" + lByte.toString(16);
            WordToHexValue = WordToHexValue + WordToHexValueTemp.substr(WordToHexValueTemp.length - 2, 2);
        }
        return WordToHexValue;
    };
    var uTF8Encode = function (string) {
        string = string.replace(/\x0d\x0a/g, "\x0a");
        var output = "";
        for (var n = 0; n < string.length; n++) {
            var c = string.charCodeAt(n);
            if (c < 128) {
                output += String.fromCharCode(c);
            } else if ((c > 127) && (c < 2048)) {
                output += String.fromCharCode((c >> 6) | 192);
                output += String.fromCharCode((c & 63) | 128);
            } else {
                output += String.fromCharCode((c >> 12) | 224);
                output += String.fromCharCode(((c >> 6) & 63) | 128);
                output += String.fromCharCode((c & 63) | 128);
            }
        }
        return output;
    };
    $.extend({
        md5: function (string) {
            var x = Array();
            var k, AA, BB, CC, DD, a, b, c, d;
            var S11 = 7, S12 = 12, S13 = 17, S14 = 22;
            var S21 = 5, S22 = 9, S23 = 14, S24 = 20;
            var S31 = 4, S32 = 11, S33 = 16, S34 = 23;
            var S41 = 6, S42 = 10, S43 = 15, S44 = 21;
            string = uTF8Encode(string);
            x = convertToWordArray(string);
            a = 0x67452301; b = 0xEFCDAB89; c = 0x98BADCFE; d = 0x10325476;
            for (k = 0; k < x.length; k += 16) {
                AA = a; BB = b; CC = c; DD = d;
                a = FF(a, b, c, d, x[k + 0], S11, 0xD76AA478);
                d = FF(d, a, b, c, x[k + 1], S12, 0xE8C7B756);
                c = FF(c, d, a, b, x[k + 2], S13, 0x242070DB);
                b = FF(b, c, d, a, x[k + 3], S14, 0xC1BDCEEE);
                a = FF(a, b, c, d, x[k + 4], S11, 0xF57C0FAF);
                d = FF(d, a, b, c, x[k + 5], S12, 0x4787C62A);
                c = FF(c, d, a, b, x[k + 6], S13, 0xA8304613);
                b = FF(b, c, d, a, x[k + 7], S14, 0xFD469501);
                a = FF(a, b, c, d, x[k + 8], S11, 0x698098D8);
                d = FF(d, a, b, c, x[k + 9], S12, 0x8B44F7AF);
                c = FF(c, d, a, b, x[k + 10], S13, 0xFFFF5BB1);
                b = FF(b, c, d, a, x[k + 11], S14, 0x895CD7BE);
                a = FF(a, b, c, d, x[k + 12], S11, 0x6B901122);
                d = FF(d, a, b, c, x[k + 13], S12, 0xFD987193);
                c = FF(c, d, a, b, x[k + 14], S13, 0xA679438E);
                b = FF(b, c, d, a, x[k + 15], S14, 0x49B40821);
                a = GG(a, b, c, d, x[k + 1], S21, 0xF61E2562);
                d = GG(d, a, b, c, x[k + 6], S22, 0xC040B340);
                c = GG(c, d, a, b, x[k + 11], S23, 0x265E5A51);
                b = GG(b, c, d, a, x[k + 0], S24, 0xE9B6C7AA);
                a = GG(a, b, c, d, x[k + 5], S21, 0xD62F105D);
                d = GG(d, a, b, c, x[k + 10], S22, 0x2441453);
                c = GG(c, d, a, b, x[k + 15], S23, 0xD8A1E681);
                b = GG(b, c, d, a, x[k + 4], S24, 0xE7D3FBC8);
                a = GG(a, b, c, d, x[k + 9], S21, 0x21E1CDE6);
                d = GG(d, a, b, c, x[k + 14], S22, 0xC33707D6);
                c = GG(c, d, a, b, x[k + 3], S23, 0xF4D50D87);
                b = GG(b, c, d, a, x[k + 8], S24, 0x455A14ED);
                a = GG(a, b, c, d, x[k + 13], S21, 0xA9E3E905);
                d = GG(d, a, b, c, x[k + 2], S22, 0xFCEFA3F8);
                c = GG(c, d, a, b, x[k + 7], S23, 0x676F02D9);
                b = GG(b, c, d, a, x[k + 12], S24, 0x8D2A4C8A);
                a = HH(a, b, c, d, x[k + 5], S31, 0xFFFA3942);
                d = HH(d, a, b, c, x[k + 8], S32, 0x8771F681);
                c = HH(c, d, a, b, x[k + 11], S33, 0x6D9D6122);
                b = HH(b, c, d, a, x[k + 14], S34, 0xFDE5380C);
                a = HH(a, b, c, d, x[k + 1], S31, 0xA4BEEA44);
                d = HH(d, a, b, c, x[k + 4], S32, 0x4BDECFA9);
                c = HH(c, d, a, b, x[k + 7], S33, 0xF6BB4B60);
                b = HH(b, c, d, a, x[k + 10], S34, 0xBEBFBC70);
                a = HH(a, b, c, d, x[k + 13], S31, 0x289B7EC6);
                d = HH(d, a, b, c, x[k + 0], S32, 0xEAA127FA);
                c = HH(c, d, a, b, x[k + 3], S33, 0xD4EF3085);
                b = HH(b, c, d, a, x[k + 6], S34, 0x4881D05);
                a = HH(a, b, c, d, x[k + 9], S31, 0xD9D4D039);
                d = HH(d, a, b, c, x[k + 12], S32, 0xE6DB99E5);
                c = HH(c, d, a, b, x[k + 15], S33, 0x1FA27CF8);
                b = HH(b, c, d, a, x[k + 2], S34, 0xC4AC5665);
                a = II(a, b, c, d, x[k + 0], S41, 0xF4292244);
                d = II(d, a, b, c, x[k + 7], S42, 0x432AFF97);
                c = II(c, d, a, b, x[k + 14], S43, 0xAB9423A7);
                b = II(b, c, d, a, x[k + 5], S44, 0xFC93A039);
                a = II(a, b, c, d, x[k + 12], S41, 0x655B59C3);
                d = II(d, a, b, c, x[k + 3], S42, 0x8F0CCC92);
                c = II(c, d, a, b, x[k + 10], S43, 0xFFEFF47D);
                b = II(b, c, d, a, x[k + 1], S44, 0x85845DD1);
                a = II(a, b, c, d, x[k + 8], S41, 0x6FA87E4F);
                d = II(d, a, b, c, x[k + 15], S42, 0xFE2CE6E0);
                c = II(c, d, a, b, x[k + 6], S43, 0xA3014314);
                b = II(b, c, d, a, x[k + 13], S44, 0x4E0811A1);
                a = II(a, b, c, d, x[k + 4], S41, 0xF7537E82);
                d = II(d, a, b, c, x[k + 11], S42, 0xBD3AF235);
                c = II(c, d, a, b, x[k + 2], S43, 0x2AD7D2BB);
                b = II(b, c, d, a, x[k + 9], S44, 0xEB86D391);
                a = addUnsigned(a, AA);
                b = addUnsigned(b, BB);
                c = addUnsigned(c, CC);
                d = addUnsigned(d, DD);
            }
            var tempValue = wordToHex(a) + wordToHex(b) + wordToHex(c) + wordToHex(d);
            return tempValue.toLowerCase();
        },
        random_string: function (len) {
            len = len || 32;
            var $chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678'; /* 默认去掉了容易混淆的字符oOLl,9gq,Vv,Uu,I1 */
            var maxPos = $chars.length;
            var pwd = '';
            for (i = 0; i < len; i++) {
                pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
            }
            return pwd;
        }
    });

    /*
    * ajaxxy 代码开始 ----------------------------------------------
    * */

    $(document).ready(function(){
        $("form").find("button[type='submit']").bind("click",function(){
            auto_submit(this);
        });
    });
    /*定义的初始变量*/
    var form_ele;
    ajaxxy = function (f){
        f = $(f).get(0);
        if(f){
            form_ele = f;
            return getPrimaryFn(f);
        }
    }
    getPrimaryFn(ajaxxy);
    function getPrimaryFn(e){/*给初始属性*/
        if( e && e._ajaxxy){
            return e;
        }
        if( e ){
            e._ajaxxy = $.md5($.random_string(32));
            e.submit = auto_submit;
            e.t = Translate;
            e.set = set;
            e.get = get;
            e.info = Info;
            e.error = Info;
            e.remove = function (name){
                switch (name){
                    case 'error':
                        removeError();
                        break;
                }
            }
            return e;
        }
        return getPrimaryFn(ajaxxy);
    }
    function get(display){
        if(display){
            console.log("-----------==get==-------------");
            console.log(this.primaryInterior);
        }
        if(!this.primaryInterior){
            return createInterior(this);
        }else{
            return this.primaryInterior
        }
    }
    /*设置提交参数*/
    function set(a,b,c){
        var help =  !a || b || c || ( typeof a == "object" && b) ;
        if(help){
            console.log("------------ajaxxy设置帮助------------");
            createInterior(true);
        }
        var primaryInterior = createInterior(this);
        if(typeof a == "object" ||a instanceof Object){
            for(var p in a){
                if(p in primaryInterior){
                    primaryInterior[p] = a[p];
                }
            }
            this.primaryInterior = primaryInterior;
        }else{
            if(a && b){
                if(a in this.primaryInterior){
                    this.primaryInterior[a] = b;
                }
            }
        }
    }
    function _debug(){/*一个被调用的符加函数*/
        var arg = Array.prototype.slice.call(arguments);
        if(!arg)return _debug._this_debug;/*便于了解debug是否被设置为true*/
        if(_debug._this_debug === true){
            //console.log(arg);
            //arg.splice(0,1);
            var t = "";
            for(var i =0;i<arg.length;i++){
                if(typeof arg[i] == "string"){
                    if(t){
                        t += " --> "+arg[i];
                    }else{
                        t += arg[i];
                    }

                }else{
                    if(t){
                        console.log(t);
                        t="";
                    }
                    console.log(arg[i]);
                }
            }
        }
    }
    function is_edit(name){
        /*根据class值判断该元素是否edit编辑器.*/
        /*如果class有包含数组中的值,则该元素为编辑器*/
        var j = {
            "editClass":['wysiwyg-editor']
        }
        if(name in j){
            return j[name];
        }
        return [];
    }

    function createInterior(e){
        var help=false,ele=ajaxxy;
        if( typeof e == "boolean" )
            help = e;
        else
        if(e)ele = e;
        /*创建一个传入auto_submit的默认JSON,若在提交时对Submit传入的JSON会自动覆盖该JSON.之所有用外置函数,是因为该数组在其他函数也有调用*/
        var interior={
            "functionName":{
                "value":false,
                "comment":"回调函数 -> 以window[functionName]()形式调用"
            },
            "callback":{
                "value":false,
                "comment":"回调执行函数"
            },
            "prefixback":{
                "value":null,
                "comment":"前置函数,在没有提交时执行."
            },
            "unique":{
                "value":[],
                "comment":"必须校验的表单(id或name),即input不能为空值"
            },
            "skip":{
                "value":[],
                "comment":"需要跳过的表单(id或name),优先级不如 unique"
            },
            "abandon":{
                "value":false,
                "comment":"是否跳过所有的表单验证,优先级不如 unique"
            },
            "alert":{
                "value":true,
                "comment":"是否显示返回的警告信息"
            },
            "alertStyle":{
                "value":"info",
                "comment":"显示的警告信息的样式 warning | success | dismissable | danger"
            },
            "alertTo":{
                "value":"default",
                "comment":"警告内容的显示元素 #xxx | .xxx 字符串,由$ 获取"
            },
            "alertLocation":{
                "value":"before",
                "comment":"显示在元素的位置 before | after | self(内部)"
            },
            "alertMax":{
                "value":1,
                "comment":"警告最多显示多少条"
            },
            "debug":{
                "value":false,
                "comment":"是否开启调试"
            },
            "callbackScroll":{
                "value":true,
                "comment":"执行完回调函数后scroll是否运动"
            },
            "scrollTop":{
                "value":"0px",
                "comment":"scroll运动到那个px"
            },
            "confirm":{
                "value":false,
                "comment":"提交时是否二次确认"
            },
            "confirmText":{
                "value":"",
                "comment":"提交时是否二次确认文字"
            },
            "jsonp":{
                "value":false,
                "comment":"是否跨域请求"
            },
            "jsoncallback":{
                "value":"jsoncallback",
                "comment":"跨域回调函数名"
            },
            "ajaxErrorCallback":{
                "value":null,
                "comment":"ajax错误回调函数"
            },
            "timeout":{
                "value":2000,
                "comment":"Ajax超时时间"
            }
            /*
            ,"form":{
                "value":"",
                "comment":"表单的值 如$("#from")"
            }*/
        };
        if(help){
            var n = 0;
            for(var p in interior){
                n++;
                console.log('('+n+') '+p+':'+interior[p].comment);
            }
        }
        if( !ele.primaryInterior ){
            var a = {}
            for(var p in interior){
                a[p] = interior[p].value;
            }
            ele.primaryInterior = a;
        }
        return ele.primaryInterior;
    }
    function auto_submit(e,j,ev_){
        /*
            e:提交按钮button本身.会根据button自动父级递归,找到from表单
            j:提交的行为JSON 默认则createInterior() 生成
            ev_:event事件,可不传入,只做预留
        */
        $(e).attr({
            "type":"button"
        });
        var f=IsForm(e,7);
        if( !f ){
            return;
        }
        var source_form_ele = $(f).get(0);
        var interior= source_form_ele.primaryInterior ? source_form_ele.primaryInterior : createInterior(f);
        _debug('----------======interior======---------',interior);
        auto_submit['interior'] = interior;
        if( !j ){
            j={};
        }
        _debug._this_debug = ("debug" in j) ? j["debug"] : interior['debug'];/*通过bind 返回一个修改过的函数*/
        for( var p in j ){
            interior[p] = j[p];/*内部值替换为传入值*/
            _debug(p);
            _debug(j[p]);
        }
        if( interior["confirm"] ){
            var confirmText = interior["confirmText"] ? interior["confirmText"] : '是否确认提交?';
            if( !confirm( confirmText ) ){
                return false;
            }
        }
        if(typeof interior.prefixback == "function"){
            /*执行前置函数*/
            interior.prefixback();
        }
        _debug('-------from start--------');

        var form_ = $(f).get(0);
        var submit_ = true,
            sendtype = ( $(form_).attr('method') ? $(form_).attr('method') : "post" ).toLowerCase();
        var pwd='',
            repwd='',
            repwdObj = null,
            names_ = $(f).find('[name]').toArray().reverse(),
            form_data = ( sendtype == 'post' ) ? new FormData() : {},
            lastEle = null,
            editClass = is_edit('editClass');//带有class值的 div为编辑器.
        _debug(form_);
        interior['form'] = form_;/*报错时需要用到,默认在表单上面报错.*/
        $(names_).each(function(a,b){
            /*判断未填写*/
            var is_skip = !InArr(interior.skip,$(b).attr('name')) && !InArr(interior.skip,$(b).attr('id')),/*跳过*/
                is_unique = InArr(interior.unique,$(b).attr('name')),/*强制检查*/
                is_abandon = interior.abandon !== true,/*跳过所有*/
                is_checked = is_unique || (is_abandon && is_skip);/*跳过此项*/
            if( is_checked ){
                if($(b).attr('type') == 'password'){
                    if(pwd== '' ){
                        pwd = $(b).val();
                    } else {
                        repwd = $(b).val();
                        repwdObj = b;
                    }
                }
                if($(b).attr('type') != 'file'){
                    if( !$(b).val() || $(b).val().length < 1){
                        $(b).focus();
                        lastEle = b;
                        submit_ = false;
                    }
                }
            }

            /*post 和 get的取值方式,
            1.如果是从带有编辑器的元素中取值, 则检测该元素的编辑class标签,该标签会把普通元素变成editor
            2.如果不是编辑器,则分别取值,POST的值添加到new FormData()中.主要是为了提交给POST时不失去一些元素,比如文件.
            3.get提交则直接取各元素的value则可.
            */
            var name_tmp = $(b).attr('name');
            if(InArr(editClass,$(b).attr('class'))){//编辑器取值
                _debug('有个性编辑器...',$(b).attr('name'));
                if(sendtype == 'post'){
                    form_data.append($(b).attr('name'), $(b).html());
                }
                if(sendtype == 'get'){
                    form_data[$(b).attr('name')] = $(b).html();
                }
            }else{//非编辑器
                var tmptype_input = $(b).attr('type');
                if(sendtype == 'post'){
                    _debug('---------post开始获取数据----------');
                    if( tmptype_input == 'file' ){
                        _debug(name_tmp);
                        if($(b)[0].files[0]){
                            form_data.append(name_tmp, $(b)[0].files[0]);
                        }
                    }else{
                        /*------------加入对hceckbox的判断------------*/
                        switch(tmptype_input){
                            case 'checkbox':/*复选框取值方式不同*/
                                if ($(b).get(0).checked) {
                                    var v_tmp = $(b).val();
                                }else{
                                    var v_tmp = '';
                                }
                                _debug('---------提取checkbox值'+name_tmp+'--'+v_tmp+'--');
                                form_data.append(name_tmp, v_tmp);
                                break;
                            case 'radio':/*复选框取值方式不同*/
                                var v_tmp = $("input:radio[name='"+name_tmp+"']:checked").val();
                                _debug('---------提取radio值'+name_tmp+'--'+v_tmp+'--');
                                form_data.append(name_tmp, v_tmp);
                                break;
                            default:
                                var v_tmp = $(b).val();
                                _debug('---------提取input值'+name_tmp+'--'+v_tmp+'--');
                                form_data.append(name_tmp, v_tmp);
                                break;
                        }
                        /*------------加入对hceckbox的判断------------*/
                    }
                }
                if(sendtype == 'get'){
                        /*------------加入对hceckbox的判断------------*/
                            _debug('---------get开始获取数据----------');
                switch(tmptype_input){
                    case 'checkbox':/*复选框取值方式不同*/
                        if ($(b).get(0).checked) {
                                form_data[name_tmp] = $(b).val();
                            }else{
                                form_data[name_tmp] = '';
                            }
                        break;
                    case 'radio':/*复选框取值方式不同*/
                        form_data[name_tmp] = $("input:radio[name='"+name_tmp+"']:checked").val();
                        break;
                    default:
                        form_data[name_tmp] = $(b).val();
                        break;
                }
            }
        });

        if(!submit_){
            _debug('---------表单值需要验证,为空无法提交----------',lastEle);
            var name_ = $(lastEle).attr('name'),alert_;
            try{
                alert_ = $('[for="'+name_+'"]').html();
            }catch(_e){
                console.log(_e);
                alert_ = '';
            }
            if(!alert_){
              alert_ = $(lastEle).attr('placeholder');
              if(!alert_){
                alert_= name_;
              }
              if(!alert_){
                alert_="该表单不允许为空.";
              }
            }
            PrivateONECreateInfo('请先填写 : '+alert_);
            return false;
        }

        if( repwd != '' && pwd != repwd ){
            _debug(pwd);
            _debug(repwd);
            $(repwdObj).focus();
            alert('---------两次密码不一样---------');
        }else{
            _debug('-------------From 表单名称-------------',form_);
            _debug('请求类型 : '+sendtype);
            var url = $(form_).attr('action');
            if(!url){
                throw new Error("ajaxxy : the form not action address");
            }
            _debug('请求url : '+url);
            var ajaxOption = {
                async:false,
                url: url,
                type: sendtype,
                dataType: 'json',
                data:form_data,
                timeout: interior["timeout"] ? interior["timeout"] : 2500,
                success: function (data){
                    _debug("Ajax请求结束",data);
                    CallBackFn(interior,data);
                },
                error:function(err){//报错后自动处理
                    console.log(err);
                    interior["ajaxErrorCallback"] ? interior["ajaxErrorCallback"](err) : (function(){
                        Info(err,'danger');
                    })();
                }
            };
            var submit_qeust = {};
            /*GET POST提交判断*/

            submit_qeust["up_data_name"] = sendtype;
            submit_qeust["data"] = form_data;

            /*是否跨域判断*/
            if( interior['jsonp'] ){
                ajaxOption["dataType"] = "jsonp";
                ajaxOption["jsonp"] = interior['jsoncallback'] ? interior['jsoncallback'] : "jsoncallback";
                submit_qeust["text"] = "*跨域*";
            }else{
                submit_qeust["text"] = "非跨域";

            }
            _debug('------------'+sendtype+'提交 ['+submit_qeust["text"]+'][提交数据:'+submit_qeust["up_data_name"]+']-------------',submit_qeust["data"]);
            console.log("-------------test--------------------");
            console.log(ajaxOption);
            $('[data-alertinfo="true"]').remove();
            $.ajax(ajaxOption);
            return false;
        }


        function InArr(arr,str){
            for(var i=0; i < arr.length;i++) {
                if (arr[i] == str) {
                    return true;
                }
            }
            return false;
        }
        function IsForm(e,n){
            if(!n)n = 6;
            if(n <= 0){
                console.warn('-------------'+n+'个上级查找不到Form,取消提交-----------------');
                return false;
            }
            if( $(e).parent().get(0).tagName.toLowerCase() == 'form' ){
                return $(e).parent();
            }else{
                n--;
                return IsForm($(e).parent(),n);
            }
        }


        function IsEle(e,name,value,max,n){
            /*查找元素的父级指定元素*/
            if(!n){
                var n = 0;
            }
            if(max){
                if(n > max){
                    return false;
                }
            }else{
                var max = false;
                if(n > 6){
                    return false;
                }
            }
            if( $(e).parent().attr(name) == value ){
                return $(e).parent();
            }else{
                n++;
                return IsEle($(e).parent(),name,value,max,n);
            }
        }
        /*-------------回调执行函数---------------*/
        function CallBackFn(interior,data){
            try{
                _debug('-------------执行try-------------');
                var j = data;/*如果已经是直接返回JSON,则不用JSON.parse()*/
                if(typeof j == "Object" || j instanceof Object){

                }else{
                    j = JSON.parse(data);
                }
                _debug('-------------parseJSON结果-------------',j);
                var infotype = "";
                if('type' in j){
                    infotype = j["type"];
                }
                if('info' in j){
                    var alertHTML =j.info;
                }else{
                    var alertHTML =data;
                }

                if('info' in j){
                    if(typeof j.info == "object"){
                        GetJavaScriptCode(j.info,data,interior['debug']);
                    }
                }
                _debug('----------执行私有CreateInfo信息-----------',infotype);
                Info(alertHTML,infotype,interior);
                _debug('----------开始GETJavaScriptCode-----------',infotype);
                GetJavaScriptCode(j,data,interior['debug']);/*自动请求JAVASCRIPTCODE后台事件驱动*/
                _debug('-------------try完毕-------------');
            }catch(e){
                console.log('-------------执行catch-------------',e);
                try{
                    data = eval("'" + data + "'");
                    data = unescape(data.replace(/\u/g, "%u"));
                }catch(er){
                    console.log(er);
                }
                var html_ = '<i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>'+data;
                Info(html_,'warning',interior);
                _debug('-------------catch完毕-------------');
            }


            if(interior.functionName){
                _debug('-------------通过window[name]执行回调-------------',data);
                window[interior.functionName](data);
            };
            if(interior.callback){
                _debug('-------------通过callback执行回调-------------',data);
                interior.callback(data);
            };

        }
        /*-------------------------------------------------*/
        function PrivateONECreateInfo(text,infotype){
            if(!infotype){
                infotype = 'danger';
            }
            var text_ = '<i class="ace-icon fa '+infotype+' bigger-120"></i>'+text;
            Info(text_,infotype);
        }
        /*-------------------------------------------------*/
    }
    function Info(info_text,info_type,interior,from_element,debug){
        if(!interior){
            interior = $(from_element).get(0) ? $(from_element).get(0).primaryInterior : auto_submit.interior;
            if(!interior) interior = createInterior(ajaxxy);
        }
        /*得到显示的元素*/
        if(!from_element){
            from_element = interior['form'] ? interior['form'] : (  ('interior' in auto_submit) ? auto_submit.interior['form'] : null  );
        }
        /*提示类型*/
        if(!info_type){
            info_type = 'warning';/*显示类型*/
        }
        if(!from_element){
            if(form_ele){
                removeError(form_ele);
                $(form_ele).before('<div data-infoToken="'+Getajaxxy(form_ele)+'" class="alert alert-'+info_type+'">\n' +
                    '\t<a href="#" class="close" data-dismiss="alert">\n' +
                    '\t\t&times;\n' +
                    '\t</a>\n' +
                    '\t<strong>'+info_text+'</strong>\n' +
                    '</div>');
            }else{
                alert(info_text);
            }
            return;
        }
        if(typeof info_type  === 'boolean'){
            debug = info_type;
        }
        if(debug || _debug._this_debug ){
            console.log("----------======Info DeBug======---------");
            console.log(info_text);
            console.log(info_type);
            console.log(interior);
            console.log(from_element);
        }
        /*服务端返回样式
            {
            'type':'warning',
            'info':{
                'a':'b',
                }
            }
        */
        interior.alertLocation = interior.alertLocation.replace(/\s/g,'').toLowerCase();
        /*info => fa-comment  | warning => fa-exclamation-triangle | success =>fa-check | dismissable(不理会) +> fa-info-circle | danger(危险) fa-times*/
        var icon = 'fa-times';
        var infoTitle = '错误 : ';
        switch(info_type){
            case 'info':
                infoTitle = '信息 : ';
                icon = 'fa-comment';
                break;
            case 'success':
                infoTitle = '成功 : ';
                icon = 'fa-check';
                break;
            case 'dismissable':
                infoTitle = '提示 : ';
                icon = 'fa-info-circle';
                break;
            case 'warning':
                infoTitle = '警告 : ';
                icon = 'fa-exclamation-triangle';
                break;
        }
        _debug('-------------infotype1-------------',info_type);

        var alertHTML = '';
        if(typeof info_text == "object"){
            for(var p in info_text){
                alertHTML +='<p>';
                alertHTML +='<strong>';
                alertHTML +='<i class="ace-icon fa '+icon+'"></i>';
                alertHTML +=p+' ';
                alertHTML +='</strong>';
                alertHTML +=info_text[p];
                alertHTML +='</p>';
            };
        }else{
            alertHTML +='<p>';
            alertHTML +='<strong>';
            alertHTML +='<i class="ace-icon fa '+icon+'"></i>';
            alertHTML +='提示:';
            alertHTML +='</strong>';
            alertHTML +=info_text;
            alertHTML +='</p>';
        }
        _debug(info_type);
        var after_html = '';
        after_html += '<div data-infoToken="'+Getajaxxy(from_element)+'" class="clearfix" data-alertinfo="true" >';
        after_html += '<div class="pull alert alert-'+info_type+'" '+( (interior.alertLocation != 'before') ? 'style="margin-top: 10px;margin-bottom: 0px;"' : '' )+'>';
        after_html += '<button type="button" class="close" data-dismiss="alert">';
        after_html += '<i class="ace-icon fa fa-times"></i>';
        after_html += '</button>';
        after_html += alertHTML;
        after_html += '</div>';
        after_html += '</div>';
        _debug(after_html);
        /*得到显示的元素*/
        var alertTo = $(from_element);
        _debug(alertTo);

        if(interior.alertTo != 'default'){
            alertTo = $(interior.alertTo);
        }
        _debug(alertTo);
        var alerts = $('[data-alertinfo="true"]');

        _debug(alerts);
        if(alerts.length >= interior.alertMax){
            _debug('--------移除多余警告---------');
            _debug(alerts.eq(0));
            alerts.eq(0).remove();
        }
        switch( interior.alertLocation ){
            case 'before':
                $(alertTo).before(after_html);
                break;
            case 'after':
                $(alertTo).after(after_html);
                break;
            case 'self':
                $(alertTo).html(after_html+$(alertTo).html());
                break;
        }
        if(interior.callbackScroll === true){
            var ScrollTop = parseInt(interior.scrollTop);
            if(ScrollTop > $(document).height()){
                interior.scrollTop = $(document).height();
            }
            $('html,body').animate({scrollTop: interior.scrollTop}, 300);
        }
    }

    function SetVale(){
        /*批量设置默认的值,该值在于元素的data-value上,由模版文件或后端给,该函数只是对select,radio,编辑器等进行设置.*/
        $('select').each(function(a,b){
            var $v= $(b).attr('data-value');
            if($v){
                $(b).find("option[value='"+$v+"']").attr("selected",true);
            }
        });
        $('[type="radio"]').each(function(a,b){
            $("input:radio[value='"+$(b).attr('data-value')+"']").attr('checked','true');
        });
    }

    function SaveRadio(nameName,v){
        $('[name="'+nameName+'"]').each(function(a,b){
            if($(b).val() == v){
                $(b).attr('checked','true');
            }
        });
    }

    function PrivateHTMLencode(str){
        /*给HTML编码*/
        var s = "";
        if(str.length == 0){
            return ""
        };
        s = str.replace(/&/g,"&amp;");
        s = s.replace(/</g,"&lt;");
        s = s.replace(/>/g,"&gt;");
        s = s.replace(/ /g,"&nbsp;");
        s = s.replace(/\'/g,"&#39;");
        s = s.replace(/\"/g,"&quot;");
        return s;
    }
    function PrivateHTMLdecode(str){
        /*给HTML解码*/
        var s = "";
        if(str.length == 0) return "";
        s = str.replace(/&amp;/g,"&");
        s = s.replace(/&lt;/g,"<");
        s = s.replace(/&gt;/g,">");
        s = s.replace(/&nbsp;/g," ");
        s = s.replace(/&#39;/g,"\'");
        s = s.replace(/&quot;/g,"\"");
        return s;
    }

    function AotuHeight(o) {
        /*textarea自适应高度*/
        o = $(o).get(0);
        o.style.height = o.scrollTop + o.scrollHeight + "px";
    }


    function Translate(q,fn,deb){
        /*调用翻译事件*/
        var obj={
            'from':'zh',
            'to':'en',
            'q':'',
            'key':'dt'
        }
        if(q instanceof Object || typeof q == "Object"){
            for(var a in q){
                obj[a] = q[a];
            }
        }else{
            obj['q'] = q;
        }
        if(deb){
            console.log(obj);
        }
        /*使用AJAX跨域来访问翻译*/
        $.ajax(
            {
                type:'get',
                url : 'http://api.ddweb.com.cn/index.php/Api/translate/act/translate',
                dataType : 'jsonp',
                jsonp:"JSON_Callback",
                data:obj,
                success:function(d) {
                    if(deb){
                        console.log(d);
                    }
                    try{
                        if(typeof d == "Object" || d instanceof Object){
                            var j = d;
                        }else{
                            var j = JSON.parse(d);
                        }
                        if(j.trans_result.dst){
                            /*得到翻译结果*/
                            var dst=j.trans_result.dst.replace(/[^a-zA-Z0-9]/g,' ');
                            dst = dst.replace(/\s+/,' ');
                            var a = dst.split(' ');
                            var reStr = '';
                            var firstArr = [];
                            for(var i=0;i<a.length;i++){
                                if(a[i]){
                                    var first = a[i].substr(0,1);
                                    var last = a[i].slice(1);
                                    first = first.toUpperCase();
                                    firstArr.push(first);
                                    var newStr = first+last;
                                    newStr = newStr.replace(/\s/,'');
                                    reStr += newStr;
                                }
                            }
                            if(reStr.length > 64){/*如果长度大于64位,只取前面的首字母+最后的结尾*/
                                reStr = firstArr.join('')+last;
                            }
                            if(reStr.length > 64){/*如果仍然大于64位,则只取前面的所有首字母*/
                                reStr = firstArr.join('');
                            }
                            if(reStr.length > 64){/*如果仍然大于64位,则强制截取*/
                                reStr = firstArr.join('');
                                reStr = reStr.substr(0,64);
                            }
                            if(reStr.length > 1){
                                var reStrFirst = reStr.substr(0,1);
                                var reStrLast = reStr.substr(1);
                                reStrFirst = reStrFirst.toUpperCase();
                                reStrLast = reStrLast.toLowerCase();
                                reStr = reStrFirst + reStrLast;
                            }
                            if(deb){
                                console.log(reStr);
                            }
                            if(fn){
                                fn(reStr);
                            }
                        }
                    }catch(e){
                        console.log(e);
                        if(deb){
                            console.log(reStr);
                        }
                        if(fn){
                            fn(d);
                        }
                    }
                },
                error : function() {
                    console.log('翻译失败!');
                }
            }
        );
    }
    function GetJavaScriptCode(j,data,bug){
        _debug._debug = bug;
        if(!data){
            console.log(data);
            console.log('javascriptCode模块有错误,没有传入data');
        }
        /*自动请求后端JS事件驱动.*/
        var u = '/index.php/Api/Get/javascriptCode?id=';
        if(j instanceof Object){
            if('javascriptCode' in j){
                $.get(u+j.javascriptCode,function(code){
                    _debug('-------------javascriptCode-------------',code);
                    code = code.replace(/\#data\#/,data);
                    _debug('-------------javascriptCode-------------',code);
                    eval(code);
                })
            }else{
                if('info' in j){
                    j = j.info;
                    if(j instanceof Object){
                        GetJavaScriptCode(j,bug);
                    }
                }
            }
        }
    }

    /*移除一个报错信息*/
    function removeError(e){
        if(!e)e=form_ele;
        var id = Getajaxxy(e);
        if(id){
            $('[data-infoToken="'+id+'"]').remove();
        }
    }
    function Getajaxxy(e){
        try{
            return e._ajaxxy;
        }catch(_e){
            console.log(_e);
            console.log(e);
            return '';
        }
        return '';
    }
})(jQuery);
