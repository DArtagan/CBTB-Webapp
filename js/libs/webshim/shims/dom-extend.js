(function(e){if(!Modernizr.genericDOM){var f=e.webshims,s=document,g,i,q=/<([\w:]+)/,m={option:1,optgroup:1,legend:1,thead:1,tr:1,td:1,col:1,area:1},j=/^(?:[^<]*(<[\w\W]+>)[^>]*$)/;f.fixHTML5=function(e){if(typeof e!="string"||m[(q.exec(e)||["",""])[1].toLowerCase()])return e;if(!i){g=s.body;if(!g)return e;i=s.createElement("div");i.style.display="none"}var f=i.cloneNode(!1);g.appendChild(f);f.innerHTML=e;g.removeChild(f);return f.childNodes};if(f.fn&&f.fn.init){var o=f.fn.init;f.fn.init=function(e){e&&
j.exec(e)&&(arguments[0]=f.fixHTML5(e));return o.apply(this,arguments)};f.fn.init.prototype=o.prototype}}})(jQuery);
jQuery.webshims.register("dom-extend",function(e,f,s,g,i){var q=f.modules,m=/\s*,\s*/,j={},o={},k={},B={},r={},x=e.fn.val,C=function(c,a,b,d,h){return h?x.call(e(c)):x.call(e(c),b)};e.fn.val=function(c){var a=this[0];arguments.length&&c==null&&(c="");if(!arguments.length)return!a||a.nodeType!==1?x.call(this):e.prop(a,"value",c,"val",!0);if(e.isArray(c))return x.apply(this,arguments);var b=e.isFunction(c);return this.each(function(d){a=this;a.nodeType===1&&(b?(d=c.call(a,d,e.prop(a,"value",i,"val",
!0)),d==null&&(d=""),e.prop(a,"value",d,"val")):e.prop(a,"value",c,"val"))})};var u="_webshimsLib"+Math.round(Math.random()*1E3),w=function(c,a,b){c=c.jquery?c[0]:c;if(!c)return b||{};var d=e.data(c,u);b!==i&&(d||(d=e.data(c,u,{})),a&&(d[a]=b));return a?d&&d[a]:d};[{name:"getNativeElement",prop:"nativeElement"},{name:"getShadowElement",prop:"shadowElement"},{name:"getShadowFocusElement",prop:"shadowFocusElement"}].forEach(function(c){e.fn[c.name]=function(){return this.map(function(){var a=w(this,
"shadowData");return a&&a[c.prop]||this})}});["removeAttr","prop","attr"].forEach(function(c){j[c]=e[c];e[c]=function(a,b,d,h,p){var f=h=="val",n=!f?j[c]:C;if(!a||!o[b]||a.nodeType!==1||!f&&h&&c=="attr"&&e.attrFn[b])return n(a,b,d,h,p);var y=(a.nodeName||"").toLowerCase(),t=k[y],v=c=="attr"&&(d===!1||d===null)?"removeAttr":c,g,l,m;t||(t=k["*"]);t&&(t=t[b]);t&&(g=t[v]);if(g){if(b=="value")l=g.isVal,g.isVal=f;if(v==="removeAttr")return g.value.call(a);else if(d===i)return g.get?g.get.call(a):g.value;
else g.set&&(c=="attr"&&d===!0&&(d=b),m=g.set.call(a,d));if(b=="value")g.isVal=l}else m=n(a,b,d,h,p);if((d!==i||v==="removeAttr")&&r[y]&&r[y][b]){var q;q=v=="removeAttr"?!1:v=="prop"?!!d:!0;r[y][b].forEach(function(b){if(!b.only||(b.only=c=="prop")||b.only=="attr"&&c!="prop")b.call(a,d,q,f?"val":v,c)})}return m};B[c]=function(a,b,d){k[a]||(k[a]={});k[a][b]||(k[a][b]={});var h=k[a][b][c],p=function(a,e,h){return e&&e[a]?e[a]:h&&h[a]?h[a]:c=="prop"&&b=="value"?function(a){return d.isVal?C(this,b,a,
!1,arguments.length===0):j[c](this,b,a)}:c=="prop"&&a=="value"&&d.value.apply?function(a){var d=j[c](this,b);d&&d.apply&&(d=d.apply(this,arguments));return d}:function(a){return j[c](this,b,a)}};k[a][b][c]=d;if(d.value===i){if(!d.set)d.set=d.writeable?p("set",d,h):f.cfg.useStrict&&b=="prop"?function(){throw b+" is readonly on "+a;}:e.noop;if(!d.get)d.get=p("get",d,h)}["value","get","set"].forEach(function(a){d[a]&&(d["_sup"+a]=p(a,h))})}});var D=!e.browser.msie||parseInt(e.browser.version,10)>8,E=
function(){var c=f.getPrototypeOf(g.createElement("foobar")),a=Object.prototype.hasOwnProperty;return function(b,d,e){var p=g.createElement(b),z=f.getPrototypeOf(p);if(D&&z&&c!==z&&(!p[d]||!a.call(p,d))){var n=p[d];e._supvalue=function(){return n&&n.apply?n.apply(this,arguments):n};z[d]=e.value}else e._supvalue=function(){var a=w(this,"propValue");return a&&a[d]&&a[d].apply?a[d].apply(this,arguments):a&&a[d]},l.extendValue(b,d,e.value);e.value._supvalue=e._supvalue}}(),l=function(){var c={};f.addReady(function(a,
b){var d={},g=function(c){d[c]||(d[c]=e(a.getElementsByTagName(c)),b[0]&&e.nodeName(b[0],c)&&(d[c]=d[c].add(b)))};e.each(c,function(a,b){g(a);!b||!b.forEach?f.warn("Error: with "+a+"-property. methods: "+b):b.forEach(function(b){d[a].each(b)})});d=null});var a,b=e([]),d=function(b,d){c[b]?c[b].push(d):c[b]=[d];e.isDOMReady&&(a||e(g.getElementsByTagName(b))).each(d)};return{createTmpCache:function(c){e.isDOMReady&&(a=a||e(g.getElementsByTagName(c)));return a||b},flushTmpCache:function(){a=null},content:function(a,
b){d(a,function(){e(this).filter("["+b+"]").attr(b,function(a,b){return b})})},createElement:function(a,b){d(a,b)},extendValue:function(a,b,c){d(a,function(){e(this).each(function(){w(this,"propValue",{})[b]=this[b];this[b]=c})})}}}(),A=function(c,a){if(c.defaultValue===i)c.defaultValue="";if(!c.removeAttr)c.removeAttr={value:function(){c[a||"prop"].set.call(this,c.defaultValue);c.removeAttr._supvalue.call(this)}}};e.extend(f,{getID:function(){var c=(new Date).getTime();return function(a){var a=e(a),
b=a.attr("id");b||(c++,b="ID-"+c,a.attr("id",b));return b}}(),extendUNDEFProp:function(c,a){e.each(a,function(a,d){a in c||(c[a]=d)})},createPropDefault:A,data:w,moveToFirstEvent:function(){var c=e._data?"_data":"data";return function(a,b,d){if((a=(e[c](a,"events")||{})[b])&&a.length>1)b=a.pop(),d||(d="bind"),d=="bind"&&a.delegateCount?a.splice(a.delegateCount,0,b):a.unshift(b)}}(),addShadowDom:function(c,a,b){b=b||{};c.jquery&&(c=c[0]);a.jquery&&(a=a[0]);if(!b.shadowFocusElement)b.shadowFocusElement=
a;var d=e.data(c,u)||e.data(c,u,{}),h=e.data(a,u)||e.data(a,u,{});d.hasShadow=a;h.nativeElement=c;h.shadowData=d.shadowData={nativeElement:c,shadowElement:a,shadowFocusElement:b.shadowFocusElement};b.shadowChilds&&b.shadowChilds.each(function(){w(this,"shadowData",h.shadowData)});if(b.data)d.shadowData.data=b.data,h.shadowData.data=b.data;b=null},propTypes:{standard:function(c){A(c);if(!c.prop)c.prop={set:function(a){c.attr.set.call(this,""+a)},get:function(){return c.attr.get.call(this)||c.defaultValue}}},
"boolean":function(c){A(c);if(!c.prop)c.prop={set:function(a){a?c.attr.set.call(this,""):c.removeAttr.value.call(this)},get:function(){return c.attr.get.call(this)!=null}}}},reflectProperties:function(c,a){typeof a=="string"&&(a=a.split(m));a.forEach(function(a){f.defineNodeNamesProperty(c,a,{prop:{set:function(c){e.attr(this,a,c)},get:function(){return e.attr(this,a)||""}}})})},defineNodeNameProperty:function(c,a,b){o[a]=!0;if(b.reflect)f.propTypes[b.propType||"standard"](b);["prop","attr","removeAttr"].forEach(function(d){var h=
b[d];h&&(h=d==="prop"?e.extend({writeable:!0},h):e.extend({},h,{writeable:!0}),B[d](c,a,h),c!="*"&&f.cfg.extendNative&&d=="prop"&&h.value&&e.isFunction(h.value)&&E(c,a,h),b[d]=h)});b.initAttr&&l.content(c,a);return b},defineNodeNameProperties:function(c,a,b,d){for(var e in a)!d&&a[e].initAttr&&l.createTmpCache(c),b&&(a[e][b]?f.log("override: "+c+"["+e+"] for "+b):(a[e][b]={},["value","set","get"].forEach(function(c){c in a[e]&&(a[e][b][c]=a[e][c],delete a[e][c])}))),a[e]=f.defineNodeNameProperty(c,
e,a[e]);d||l.flushTmpCache();return a},createElement:function(c,a,b){var d;e.isFunction(a)&&(a={after:a});l.createTmpCache(c);a.before&&l.createElement(c,a.before);b&&(d=f.defineNodeNameProperties(c,b,!1,!0));a.after&&l.createElement(c,a.after);l.flushTmpCache();return d},onNodeNamesPropertyModify:function(c,a,b,d){typeof c=="string"&&(c=c.split(m));e.isFunction(b)&&(b={set:b});c.forEach(function(c){r[c]||(r[c]={});typeof a=="string"&&(a=a.split(m));b.initAttr&&l.createTmpCache(c);a.forEach(function(a){r[c][a]||
(r[c][a]=[],o[a]=!0);if(b.set){if(d)b.set.only=d;r[c][a].push(b.set)}b.initAttr&&l.content(c,a)});l.flushTmpCache()})},defineNodeNamesBooleanProperty:function(c,a,b){b||(b={});if(e.isFunction(b))b.set=b;f.defineNodeNamesProperty(c,a,{attr:{set:function(c){this.setAttribute(a,c);b.set&&b.set.call(this,!0)},get:function(){return this.getAttribute(a)==null?i:a}},removeAttr:{value:function(){this.removeAttribute(a);b.set&&b.set.call(this,!1)}},reflect:!0,propType:"boolean",initAttr:b.initAttr||!1})},
contentAttr:function(c,a,b){if(c.nodeName){if(b===i)return b=(c.attributes[a]||{}).value,b==null?i:b;typeof b=="boolean"?b?c.setAttribute(a,a):c.removeAttribute(a):c.setAttribute(a,b)}},activeLang:function(){var c=[],a={},b,d,h=/:\/\/|^\.*\//,g=function(a,b,c){return b&&c&&e.inArray(b,c.availabeLangs||[])!==-1?(a.loading=!0,c=c.langSrc,h.test(c)||(c=f.cfg.basePath+c),f.loader.loadScript(c+b+".js",function(){a.langObj[b]?(a.loading=!1,n(a,!0)):e(function(){a.langObj[b]&&n(a,!0);a.loading=!1})}),!0):
!1},i=function(b){a[b]&&a[b].forEach(function(a){a.callback()})},n=function(a,c){if(a.activeLang!=b&&a.activeLang!==d){var e=q[a.module].options;if(a.langObj[b]||d&&a.langObj[d])a.activeLang=b,a.callback(a.langObj[b]||a.langObj[d],b),i(a.module);else if(!c&&!g(a,b,e)&&!g(a,d,e)&&a.langObj[""]&&a.activeLang!=="")a.activeLang="",a.callback(a.langObj[""],b),i(a.module)}};return function(f){if(typeof f=="string"&&f!==b)b=f,d=b.split("-")[0],b==d&&(d=!1),e.each(c,function(a,b){n(b)});else if(typeof f==
"object")if(f.register)a[f.register]||(a[f.register]=[]),a[f.register].push(f),f.callback();else{if(!f.activeLang)f.activeLang="";c.push(f);n(f)}return b}}()});e.each({defineNodeNamesProperty:"defineNodeNameProperty",defineNodeNamesProperties:"defineNodeNameProperties",createElements:"createElement"},function(c,a){f[c]=function(b,c,e,g){typeof b=="string"&&(b=b.split(m));var i={};b.forEach(function(b){i[b]=f[a](b,c,e,g)});return i}});f.isReady("webshimLocalization",!0)});
(function(e,f){var s=e.webshims.browserVersion;if(!(e.browser.mozilla&&s>5)&&(!e.browser.msie||s<12&&s>7)){var g={article:"article",aside:"complementary",section:"region",nav:"navigation",address:"contentinfo"},i=function(e,f){e.getAttribute("role")||e.setAttribute("role",f)};e.webshims.addReady(function(q,m){e.each(g,function(f,g){for(var j=e(f,q).add(m.filter(f)),k=0,o=j.length;k<o;k++)i(j[k],g)});if(q===f){var j=f.getElementsByTagName("header")[0],o=f.getElementsByTagName("footer"),k=o.length;
j&&!e(j).closest("section, article")[0]&&i(j,"banner");k&&(j=o[k-1],e(j).closest("section, article")[0]||i(j,"contentinfo"))}})}})(jQuery,document);
