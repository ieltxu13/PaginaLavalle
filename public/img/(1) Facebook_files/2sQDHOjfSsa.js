/*!CK:2044641297!*//*1382392511,173199715*/

if (self.CavalryLogger) { CavalryLogger.start_js(["kqhSr"]); }

__d("XUIButton.react",["AbstractButton.react","ReactPropTypes","React","cx"],function(a,b,c,d,e,f){var g=b('AbstractButton.react'),h=b('ReactPropTypes'),i=b('React'),j=b('cx'),k='medium',l=i.createClass({displayName:'XUIButton',propTypes:{use:h.oneOf(['default','special','confirm']),size:h.oneOf(['small','medium','large','xlarge','xxlarge']),suppressed:h.bool},getDefaultProps:function(){return {use:'default',size:k,suppressed:false};},getButtonSize:function(){return this.props.size||k;},render:function(){var m=this.props.use,n=this.getButtonSize(),o=this.props.suppressed,p=(("_4jy0")+(n==='small'?' '+"_517i":'')+(n==='medium'?' '+"_4jy3":'')+(n==='large'?' '+"_4jy4":'')+(n==='xlarge'?' '+"_4jy5":'')+(n==='xxlarge'?' '+"_4jy6":'')+(m==='default'?' '+"_517h":'')+(m==='confirm'?' '+"_4jy1":'')+(m==='special'?' '+"_4jy2":'')+(o?' '+"_59pe":'')+(m==='confirm'||m==='special'?' '+"selected":''));return this.transferPropsTo(g({className:p}));}});e.exports=l;});
__d("CacheStorage",["ErrorUtils","EventListener","FBJSON","WebStorage","startsWith"],function(a,b,c,d,e,f){var g=b('ErrorUtils'),h=b('EventListener'),i=b('FBJSON'),j=b('WebStorage'),k=b('startsWith'),l={memory:u,localstorage:s,sessionstorage:t},m='_@_',n='3b',o='CacheStorageVersion';function p(w){this._store=w;}p.prototype.getStore=function(){return this._store;};p.prototype.keys=function(){var w=[];for(var x=0;x<this._store.length;x++)w.push(this._store.key(x));return w;};p.prototype.get=function(w){return this._store.getItem(w);};p.prototype.set=function(w,x){this._store.setItem(w,x);};p.prototype.remove=function(w){this._store.removeItem(w);};p.prototype.clear=function(){this._store.clear();};for(var q in p)if(p.hasOwnProperty(q))s[q]=p[q];var r=p===null?null:p.prototype;s.prototype=Object.create(r);s.prototype.constructor=s;s.__superConstructor__=p;function s(){p.call(this,j.getLocalStorage());}s.available=function(){return !!j.getLocalStorage();};for(q in p)if(p.hasOwnProperty(q))t[q]=p[q];t.prototype=Object.create(r);t.prototype.constructor=t;t.__superConstructor__=p;function t(){p.call(this,j.getSessionStorage());}t.available=function(){return !!j.getSessionStorage();};function u(){this._store={};}u.prototype.getStore=function(){return this._store;};u.prototype.keys=function(){return Object.keys(this._store);};u.prototype.get=function(w){if(this._store[w]===undefined)return null;return this._store[w];};u.prototype.set=function(w,x){this._store[w]=x;};u.prototype.remove=function(w){if(w in this._store)delete this._store[w];};u.prototype.clear=function(){this._store={};};u.available=function(){return true;};function v(w,x){this._key_prefix=x||'_cs_';if(w=='AUTO'||!w)for(var y in l){var z=l[y];if(z.available()){w=y;break;}}if(w)if(!l[w]||!l[w].available()){this._backend=new u();}else this._backend=new l[w]();var aa=this.useBrowserStorage();if(aa)h.listen(window,'storage',this._onBrowserValueChanged.bind(this));var ba=aa?this._backend.getStore().getItem(o):this._backend.getStore()[o];if(ba!==n)this.clear();}v.prototype.useBrowserStorage=function(){return this._backend.getStore()===j.getLocalStorage()||this._backend.getStore()===j.getSessionStorage();};v.prototype.addValueChangeCallback=function(w){this._changeCallbacks=this._changeCallbacks||[];this._changeCallbacks.push(w);return {remove:function(){this._changeCallbacks.slice(this._changeCallbacks.indexOf(w),1);}.bind(this)};};v.prototype._onBrowserValueChanged=function(w){if(this._changeCallbacks&&k(w.key,this._key_prefix))this._changeCallbacks.forEach(function(x){x(w.key,w.oldValue,w.newValue);});};v.prototype.keys=function(){var w=[];g.guard(function(){if(this._backend){var x=this._backend.keys(),y=this._key_prefix.length;for(var z=0;z<x.length;z++)if(x[z].substr(0,y)==this._key_prefix)w.push(x[z].substr(y));}}.bind(this),'CacheStorage')();return w;};v.prototype.set=function(w,x,y){if(this._backend){var z;if(typeof x=='string'){z=m+x;}else if(!y){z={__t:Date.now(),__v:x};z=i.stringify(z);}else z=i.stringify(x);var aa=this._backend,ba=this._key_prefix+w,ca=true;while(ca)try{aa.set(ba,z);ca=false;}catch(da){var ea=aa.keys().length;this._evictCacheEntries();ca=aa.keys().length<ea;}}};v.prototype._evictCacheEntries=function(){var w=[],x=this._backend;x.keys().forEach(function(z){if(z===o)return;var aa=x.get(z);if(aa===undefined){x.remove(z);return;}if(v._hasMagicPrefix(aa))return;try{aa=i.parse(aa,e.id);}catch(ba){x.remove(z);return;}if(aa&&aa.__t!==undefined&&aa.__v!==undefined)w.push([z,aa.__t]);});w.sort(function(z,aa){return z[1]-aa[1];});for(var y=0;y<Math.ceil(w.length/2);y++)x.remove(w[y][0]);};v.prototype.get=function(w,x){var y;if(this._backend){g.applyWithGuard(function(){y=this._backend.get(this._key_prefix+w);},this,null,function(){y=null;},'CacheStorage:get');if(y!==null){if(v._hasMagicPrefix(y)){y=y.substr(m.length);}else try{y=i.parse(y,e.id);if(y&&y.__t!==undefined&&y.__v!==undefined)y=y.__v;}catch(z){y=undefined;}}else y=undefined;}if(y===undefined&&x!==undefined){y=x;this.set(w,y);}return y;};v.prototype.remove=function(w){if(this._backend)g.applyWithGuard(this._backend.remove,this._backend,[this._key_prefix+w],null,'CacheStorage:remove');};v.prototype.clear=function(){if(this._backend){g.applyWithGuard(this._backend.clear,this._backend,null,null,null,'CacheStorage:clear');if(this.useBrowserStorage()){this._backend.getStore().setItem(o,n);}else this._backend.getStore()[o]=n;}};v.getAllStorageTypes=function(){return Object.keys(l);};v._hasMagicPrefix=function(w){return w.substr(0,m.length)===m;};e.exports=v;});
__d("DropdownContextualHelpLink",["DOM","ge"],function(a,b,c,d,e,f){var g=b('DOM'),h=b('ge'),i={set:function(j){var k=h('navHelpCenter');if(k!==null)g.replace(k,j);}};e.exports=i;});
__d("ModalMask",["DOM"],function(a,b,c,d,e,f){var g=b('DOM'),h=null,i=0,j={show:function(){i++;if(!h){h=g.create('div',{id:'modalMaskOverlay'});g.appendContent(document.body,h);}},hide:function(){if(i){i--;if(!i&&h){g.remove(h);h=null;}}}};e.exports=j;});
__d("ChatApp",["CSS","JSLogger"],function(a,b,c,d,e,f){var g=b('CSS'),h=b('JSLogger'),i=null;function j(k,l,m){if(i){h.create('chat_app').error('repeated_init');return;}i=this;this.$ChatApp0=k;d(['TabsViewport','ChatTabController','ChatTabViewCoordinator','MercuryServerRequests','MercuryChannelHandler','MercuryStateCheck'],function(n,o,p,q,r,s){q.get().handleUpdate(m);this.tabsViewport=new n(l);this.tabController=new o(this.tabsViewport);this.tabViewCoordinator=new p(l,this.tabsViewport);this.$ChatApp1=this.$ChatApp2=true;}.bind(this));}j.getInstance=function(){return i;};j.hide=function(){if(j.getInstance())j.getInstance().hide();};j.unhide=function(){if(j.getInstance())j.getInstance().unhide();};j.prototype.isHidden=function(){return this.$ChatApp3;};j.prototype.hide=function(){if(!this.$ChatApp1||this.$ChatApp3)return;g.hide(this.$ChatApp0);this.$ChatApp3=true;};j.prototype.unhide=function(){if(this.$ChatApp1){if(this.$ChatApp3){g.show(this.$ChatApp0);this.tabsViewport.checkWidth();d(['Dock'],function(k){k.resizeAllFlyouts();});this.$ChatApp3=false;}}else if(!this.$ChatApp2){d(['UIPagelet'],function(k){k.loadFromEndpoint('ChatTabsPagelet','ChatTabsPagelet');k.loadFromEndpoint('BuddylistPagelet','BuddylistPagelet');});this.$ChatApp2=true;}};e.exports=j;});
__d("MercuryFilters",["MessagingTag","arrayContains"],function(a,b,c,d,e,f){var g=b('MessagingTag'),h=b('arrayContains'),i=[g.UNREAD],j={ALL:'all',getSupportedFilters:function(){return i.concat();},isSupportedFilter:function(k){return h(i,k);}};e.exports=j;});