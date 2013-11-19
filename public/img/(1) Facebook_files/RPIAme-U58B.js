/*!CK:2989632869!*//*1382404744,173213499*/

if (self.CavalryLogger) { CavalryLogger.start_js(["a5DmL"]); }

__d("ComposerXAttachmentBootstrap",["CSS","Form","Parent","URI","cx"],function(a,b,c,d,e,f){var g=b('CSS'),h=b('Form'),i=b('Parent'),j=b('URI'),k=b('cx'),l=[],m={bootstrap:function(n){m.load(i.byTag(n,'form'),n.getAttribute('data-endpoint'));},load:function(n,o,p){var q=j(o).addQueryData({composerurihash:m.getURIHash(o)});g.conditionClass(n,"_fu",p);var r=i.byClass(n,"_2_4");g.removeClass(r,'async_saving');h.setDisabled(n,false);n.action=q.toString();h.bootstrap(n);},getURIHash:function(n){if(n==='initial')return 'initial';var o=l.indexOf(n);if(o!==-1){return o+'';}else{o=l.length;l[o]=n;return o+'';}}};e.exports=m;});
__d("ComposerXStore",["function-extensions","Arbiter","ge"],function(a,b,c,d,e,f){b('function-extensions');var g=b('Arbiter'),h=b('ge'),i={};function j(l,m){return 'ComposerX/'+l+'/'+m;}var k={set:function(l,m,n){if(!i[l])i[l]={};i[l][m]=n;g.inform(j(l,m),{},g.BEHAVIOR_STATE);},get:function(l,m){if(i[l])return i[l][m];return null;},getAllForComposer:function(l){return i[l]||{};},waitForComponents:function(l,m,n){g.registerCallback(n,m.map(j.curry(l)));}};g.subscribe('page_transition',function(){for(var l in i)if(!h(l))delete i[l];});e.exports=k;});
__d("ComposerX",["Arbiter","ComposerXAttachmentBootstrap","ComposerXStore","CSS","DOM","DOMQuery","arrayContains","copyProperties","csx","cx","getObjectValues","removeFromArray"],function(a,b,c,d,e,f){var g=b('Arbiter'),h=b('ComposerXAttachmentBootstrap'),i=b('ComposerXStore'),j=b('CSS'),k=b('DOM'),l=b('DOMQuery'),m=b('arrayContains'),n=b('copyProperties'),o=b('csx'),p=b('cx'),q=b('getObjectValues'),r=b('removeFromArray'),s='any';function t(u){this._root=u;this._composerID=u.id;this._attachments={};this._attachmentFetchForm=l.find(u,"._2_4");this._resetSubscription=g.subscribe('composer/publish',function(v,w){if(w.composer_id===this._composerID)this.reset();}.bind(this));}t.prototype.getAttachment=function(u,v,w){var x=h.getURIHash(u);this._endpointHashToShow=x;var y=this._attachments[x];if(y){this._showAttachmentAfterComponentsLoaded(x,w);}else this.fetchAttachmentData(u,v);};t.prototype.fetchAttachmentData=function(u,v){var w=h.getURIHash(u);if(this._attachments[w])return;if(!m(this._currentFetchEndpoints,w)){h.load(this._attachmentFetchForm,u,v);this._currentFetchEndpoints.push(w);}};t.prototype.setAttachment=function(u,v,w,x){r(this._currentFetchEndpoints,u);this._setupAttachment(u,v,w,x);this._showAttachmentAfterComponentsLoaded(u,false);};t.prototype.setInitialAttachment=function(u,v,w,x){var y=h.getURIHash(u);this._setupAttachment(y,v,w,x);this._initialAttachmentEndpoint=u;if(!this._currentInstance)this._showAttachmentAfterComponentsLoaded(y,true);};t.prototype.setComponent=function(u,v){if(!i.get(this._composerID,u)){i.set(this._composerID,u,v);k.appendContent(this._attachmentFetchForm,k.create('input',{type:'hidden',name:'loaded_components[]',value:u}));}};t.prototype.reset=function(){if(this._currentInstance){this._currentInstance.cleanup();this._currentInstance=null;}for(var u in this._attachments)this._attachments[u].instance.reset();var v=i.getAllForComposer(this._composerID);q(v).forEach(function(w){if(w.reset)w.reset(w);});this.getAttachment(this._initialAttachmentEndpoint,false,true);g.inform('composer/reset');};t.prototype.destroy=function(){if(this._resetSubscription){this._resetSubscription.unsubscribe();this._resetSubscription=null;}};t.prototype.addPlaceholders=function(u,v){var w;for(var x in this._attachments){w=this._attachments[x];if(w.instance===u){v.forEach(function(y){w.placeholders.push(y);w.required_components.push(y.component_name);});break;}}if(this._currentInstance===u)this._fillPlaceholders(v);};t.prototype.hasAttachmentWithClassName=function(u){return l.scry(this._root,'.'+u).length>0;};t.prototype._setupAttachment=function(u,v,w,x){v.setComposerID(this._composerID);this._attachments[u]={instance:v,placeholders:w,required_components:x};var y=l.find(this._root,"div._55d0"),z=v.getRoot();if(z.parentNode!==y){j.hide(z);k.appendContent(y,z);}};t.prototype._showAttachment=function(u,v,w,x){if(this._currentInstance===u)return;if(this._endpointHashToShow===s){this._endpointHashToShow=null;}else if(this._endpointHashToShow!==v)return;if(this._currentInstance){if(!this._currentInstance.canSwitchAway())return;this._currentInstance.cleanup();}this._currentInstance=u;var y=l.find(this._root,"div._55d0"),z=y.childNodes,aa=u.getRoot();for(var ba=0;ba<z.length;ba++)if(z[ba]!==aa)j.hide(z[ba]);j.show(aa);this._fillPlaceholders(w);u.initWithComponents(x);this._setAttachmentSelectedClass(u.attachmentClassName);g.inform('composer/initializedAttachment',{composerRoot:this._root,isInitial:x});};t.prototype._showAttachmentAfterComponentsLoaded=function(u,v){var w=this._attachments[u];i.waitForComponents(this._composerID,w.required_components,this._showAttachment.bind(this,w.instance,u,w.placeholders,v));};t.prototype._fillPlaceholders=function(u){u.forEach(function(v){var w=i.get(this._composerID,v.component_name);if(v.element!==w.element.parentNode)k.setContent(v.element,w.element);}.bind(this));};t.prototype._setAttachmentSelectedClass=function(u){var v=l.scry(this._root,"._519b")[0],w;if(v){j.removeClass(v,"_519b");w=l.scry(v,'*[aria-pressed="true"]')[0];if(w)w.setAttribute('aria-pressed','false');}if(u){var x=l.scry(this._root,'.'+u)[0];if(x){j.addClass(x,"_519b");w=l.scry(x,'*[aria-pressed="false"]')[0];if(w)w.setAttribute('aria-pressed','true');}}};n(t.prototype,{_endpointHashToShow:s,_currentFetchEndpoints:[],_initialAttachmentEndpoint:''});e.exports=t;});
__d("ComposerXAttachment",["ComposerXStore","copyProperties"],function(a,b,c,d,e,f){var g=b('ComposerXStore'),h=b('copyProperties');function i(){}i.prototype.getRoot=function(){};i.prototype.initWithComponents=function(j){};i.prototype.cleanup=function(){};i.prototype.reset=function(){};i.prototype.getComponent=function(j){return g.get(this._composerID,j);};i.prototype.getComponentInstance=function(j){var k=g.get(this._composerID,j);return k&&k.instance;};i.prototype.canSwitchAway=function(){return true;};i.prototype.setComposerID=function(j){this._composerID=j;};i.prototype.getComposerID=function(){return this._composerID;};i.prototype.allowOGTagPreview=function(){return false;};h(i.prototype,{attachmentClassName:''});e.exports=i;});
__d("ComposerXController",["Arbiter","ComposerX","ComposerXAttachmentBootstrap","Parent","$","cx","emptyFunction","ge","invariant"],function(a,b,c,d,e,f){var g=b('Arbiter'),h=b('ComposerX'),i=b('ComposerXAttachmentBootstrap'),j=b('Parent'),k=b('$'),l=b('cx'),m=b('emptyFunction'),n=b('ge'),o=b('invariant'),p={};function q(t){var u=n(t);if(!u)return null;var v=j.byClass(k(t),"_119"),w=v.id;if(!p[w])p[w]=new h(v);return p[w];}function r(t){var u=q(t);o(u!==null);return u;}var s={getAttachment:function(t,u,v){var w=r(t);w.getAttachment(u,v);},fetchAttachmentData:function(t,u,v){r(t).fetchAttachmentData(u,v);},setAttachment:function(t,u,v,w,x){var y=q(t);if(y)y.setAttachment(u,v,w,x);},setInitialAttachment:function(t,u,v,w,x){var y=r(t);y.setInitialAttachment(u,v,w,x);},setComponent:function(t,u,v){var w=q(t);if(w)w.setComponent(u,v);},reset:function(t){var u=r(t);u.reset();},holdTheMarkup:m,getEndpoint:function(t,u,v){var w=r(t);i.load(w._attachmentFetchForm,u,v);},addPlaceholders:function(t,u,v){var w=r(t);w.addPlaceholders(u,v);},hasAttachmentWithClassName:function(t,u){var v=r(t);return v.hasAttachmentWithClassName(u);}};i.bootstrap=function(t){s.getAttachment(t,t.getAttribute('data-endpoint'));};g.subscribe('page_transition',function(){for(var t in p)if(!n(t)){p[t].destroy();delete p[t];}});e.exports=s;});
__d("DragDropFileUpload",[],function(a,b,c,d,e,f){f.isSupported=function(){return typeof(FileList)!=="undefined";};});
__d("DocumentDragDrop",["Event","Arbiter","CSS","DOM","DOMQuery","DragDropFileUpload","emptyFunction","getObjectValues"],function(a,b,c,d,e,f){var g=b('Event'),h=b('Arbiter'),i=b('CSS'),j=b('DOM'),k=b('DOMQuery'),l=b('DragDropFileUpload'),m=b('emptyFunction'),n=b('getObjectValues'),o={},p=0;function q(){p=0;n(o).forEach(function(t){i.removeClass(t.element,t.className);h.inform('dragleave',{element:t.element});});}function r(){if(!l.isSupported())return;g.listen(document,'dragenter',function(u){if(p===0)n(o).forEach(function(v){i.addClass(v.element,v.className);h.inform('dragenter',{element:v.element,event:u});});p++;});g.listen(document,'dragleave',function(u){p--;if(p===0)q();});g.listen(document,'drop',function(u){var v=u.getTarget();if(k.isNodeOfType(u.getTarget(),'input'))if(v.type==='file')return;u.prevent();});g.listen(document,'dragover',g.prevent);var t=null;document.addEventListener('dragover',function(){t&&clearTimeout(t);t=setTimeout(q,839);},true);r=m;}var s={registerStatusElement:function(t,u){r();o[j.getID(t)]={element:t,className:u};},removeStatusElement:function(t){var u=j.getID(t),v=o[u];if(v){i.removeClass(v.element,v.className);delete o[u];}}};e.exports=s;});
__d("DragDropTarget",["Event","CSS","DocumentDragDrop","DragDropFileUpload","copyProperties","emptyFunction"],function(a,b,c,d,e,f){var g=b('Event'),h=b('CSS'),i=b('DocumentDragDrop'),j=b('DragDropFileUpload'),k=b('copyProperties'),l=b('emptyFunction');function m(n){this._element=n;this._listeners=[];this._statusElem=n;this._dragEnterCount=0;this._enabled=false;}k(m.prototype,{_onFilesDropCallback:l,_onURLDropCallback:l,_onPlainTextDropCallback:l,_onDropCallback:l,_fileFilterFn:l.thatReturnsArgument,setOnFilesDropCallback:function(n){this._onFilesDropCallback=n;return this;},setOnURLDropCallback:function(n){this._onURLDropCallback=n;return this;},setOnPlainTextDropCallback:function(n){this._onPlainTextDropCallback=n;return this;},setOnDropCallback:function(n){this._onDropCallback=n;return this;},enable:function(){if(!j.isSupported())return this;i.registerStatusElement(this._statusElem,'fbWantsDragDrop');this._listeners.push(g.listen(this._element,'dragenter',this._onDragEnter.bind(this)));this._listeners.push(g.listen(this._element,'dragleave',this._onDragLeave.bind(this)));this._listeners.push(g.listen(this._element,'dragover',g.kill));this._listeners.push(g.listen(this._element,'drop',function(n){this._dragEnterCount=0;h.removeClass(this._statusElem,'fbDropReady');h.removeClass(this._statusElem,'fbDropReadyPhoto');h.removeClass(this._statusElem,'fbDropReadyPhotos');h.removeClass(this._statusElem,'fbDropReadyLink');var o={},p=false,q=this._fileFilterFn(n.dataTransfer.files);if(q.length){this._onFilesDropCallback(q,n);o.files=q;p=true;}var r=n.dataTransfer.getData('url')||n.dataTransfer.getData('text/uri-list');if(r){this._onURLDropCallback(r,n);o.url=r;p=true;}var s=n.dataTransfer.getData('text/plain');if(s){this._onPlainTextDropCallback(s,n);o.plainText=s;p=true;}if(p)this._onDropCallback(o,n);n.kill();}.bind(this)));this._enabled=true;return this;},disable:function(){if(!this._enabled)return this;i.removeStatusElement(this._statusElem,'fbWantsDragDrop');h.removeClass(this._statusElem,'fbDropReady');h.removeClass(this._statusElem,'fbDropReadyPhoto');h.removeClass(this._statusElem,'fbDropReadyPhotos');h.removeClass(this._statusElem,'fbDropReadyLink');while(this._listeners.length)this._listeners.pop().remove();this._enabled=false;return this;},setFileFilter:function(n){this._fileFilterFn=n;return this;},setStatusElement:function(n){this._statusElem=n;return this;},_onDragEnter:function(n){if(this._dragEnterCount===0){var o=n.dataTransfer.items,p=false;for(var q=0;q<o.length;q++)if(!o[q].type.match('image/*')){p=true;break;}h.addClass(this._statusElem,'fbDropReady');if(p){h.addClass(this._statusElem,'fbDropReadyLink');}else if(o.length>1){h.addClass(this._statusElem,'fbDropReadyPhotos');}else h.addClass(this._statusElem,'fbDropReadyPhoto');}this._dragEnterCount++;},_onDragLeave:function(){this._dragEnterCount=Math.max(this._dragEnterCount-1,0);if(this._dragEnterCount===0){h.removeClass(this._statusElem,'fbDropReady');h.removeClass(this._statusElem,'fbDropReadyPhoto');h.removeClass(this._statusElem,'fbDropReadyPhotos');h.removeClass(this._statusElem,'fbDropReadyLink');}}});e.exports=m;});
__d("ComposerXDragDrop",["Arbiter","ComposerXController","CSS","DOMQuery","DragDropTarget","Parent","URI","csx","cx"],function(a,b,c,d,e,f){var g=b('Arbiter'),h=b('ComposerXController'),i=b('CSS'),j=b('DOMQuery'),k=b('DragDropTarget'),l=b('Parent'),m=b('URI'),n=b('csx'),o=b('cx'),p='/ajax/composerx/attachment/media/upload/',q='/ajax/composerx/attachment/link/scraper/',r=function(t){t();};function s(t,u,v,w){this._root=t;this._composerID=u;this._targetID=v;w=w||r;this._dragdrop=new k(t).setOnFilesDropCallback(function(x){w(this._uploadFiles.bind(this,x));}.bind(this)).setFileFilter(s.filterImages).enable();s.handleDragEnterAndLeave(t);g.subscribe('composer/deactivateDragdrop',function(){this.deactivate();}.bind(this));g.subscribe('composer/reactivateDragdrop',function(){this.reactivate();}.bind(this));}s.prototype.enableURLDropping=function(){this._dragdrop.setOnURLDropCallback(this._onURLDrop.bind(this));};s.prototype.deactivate=function(){this._dragdrop.disable();};s.prototype.reactivate=function(){this._dragdrop.enable();};s.prototype._uploadFiles=function(t){h.getAttachment(this._root,p);g.inform('ComposerXFilesStore/filesDropped/'+this._composerID+'/mediaupload',{files:t},g.BEHAVIOR_PERSISTENT);};s.prototype._onURLDrop=function(t){var u=new m(q);u.addQueryData({scrape_url:encodeURIComponent(t)});h.getAttachment(this._root,u.toString());};s.handleDragEnterAndLeave=function(t){var u=j.scry(l.byClass(t,"_119"),"._2wr");g.subscribe('dragenter',function(v,w){if(t==w.element)u.forEach(i.hide);});g.subscribe('dragleave',function(v,w){if(t==w.element)u.forEach(i.show);});};s.filterImages=function(t){var u=[];for(var v=0;v<t.length;v++)if(t[v].type.match('image/*'))u.push(t[v]);return u;};e.exports=s;});