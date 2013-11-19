/*!CK:1475894696!*//*1382404744,173220919*/

if (self.CavalryLogger) { CavalryLogger.start_js(["MUeU7"]); }

__d("CalendarUI",["Event","Arbiter","AsyncRequest","CSS","DOM","DOMQuery","DOMScroll","Hovercard","Parent","Run","ScrollAwareDOM","Style","UIPagelet","Vector","ViewportBounds","$","copyProperties","ge","goURI"],function(a,b,c,d,e,f){var g=b('Event'),h=b('Arbiter'),i=b('AsyncRequest'),j=b('CSS'),k=b('DOM'),l=b('DOMQuery'),m=b('DOMScroll'),n=b('Hovercard'),o=b('Parent'),p=b('Run'),q=b('ScrollAwareDOM'),r=b('Style'),s=b('UIPagelet'),t=b('Vector'),u=b('ViewportBounds'),v=b('$'),w=b('copyProperties'),x=b('ge'),y=b('goURI');function z(){}w(z,{EVENT_ACTION:'EVENT_ACTION',SUGGESTIONS_LOADED:'SUGGESTIONS_LOADED',HIDE_SUGGESTED_EVENT:'HIDE_SUGGESTED_EVENT',_todayButton:null,_todayElement:null,_registeredReminders:false,init:function(){h.subscribe(this.EVENT_ACTION,function(ba,ca){s.loadFromEndpoint('CalendarHeaderPagelet','pagelet_calendar_header',JSON.parse(ca.actioncontext));if(x('pagelet_calendar_invites'))s.loadFromEndpoint('CalendarInvitesPagelet','pagelet_calendar_invites',JSON.parse(ca.actioncontext));});var aa=u.addTop(function(){var ba=x('pagelet_calendar_header');if(ba&&r.isFixed(ba.firstChild)){var ca=ba.firstChild.getBoundingClientRect();return ca.bottom;}return 0;});p.onLeave(function(){aa.remove();});},initGridItem:function(aa,ba){g.listen(aa,'click',function(event){if(o.byTag(event.getTarget(),'a'))return;i.bootstrap(ba,aa.firstChild);return;});},initGridItemList:function(aa,ba,ca){h.subscribe(this.SUGGESTIONS_LOADED,function(da,ea){if(ba==ea.timestamp)for(var fa=0;fa<ca&&fa<ea.content.length;fa++)k.appendContent(aa,ea.content[fa]);});},initScrollItem:function(aa,ba){g.listen(aa,'click',this.scrollTo.bind(this,ba));},scrollTo:function(aa,ba){aa=l.isNode(aa)?aa:x(aa);var ca=0;if(aa){var da=t.getElementPosition(v('fbCalendarWrapper')).y,ea=t.getElementPosition(aa).y;ca=ea-da;}else ca=t.getElementPosition(v('bottomContent')).y;m.scrollTo(new t(0,ca,'document'),ba!==false);},initUnhide:function(aa,ba){g.listen(aa,'click',function(event){var ca=o.byClass(ba,'fbCalendarItem');k.remove(ba);j.removeClass(k.find(ca,'.fbHiddenCalendarItem'),'fbHiddenCalendarItem');});},registerHomepageReminders:function(){if(!this._registeredReminders){h.subscribe(this.EVENT_ACTION,function(aa,ba){if(x('pagelet_reminders'))s.loadFromEndpoint('RemindersPagelet','pagelet_reminders');});this._registeredReminders=true;}},registerTodayClickHandler:function(){this._todayButton.onclick=null;g.listen(this._todayButton,'click',this.scrollTo.bind(this,this._todayElement));},registerTodayElement:function(aa){this._todayElement=l.isNode(aa)?aa:x(aa);this._todayButton&&this.registerTodayClickHandler();},registerTodayButton:function(aa){this._todayButton=aa;this._todayElement&&this.registerTodayClickHandler();},registerEventLink:function(aa,ba){h.subscribe(this.EVENT_ACTION,function(ca,da){if(da.eid===ba){var ea=l.scry(v("facebook"),".fbCalendarSuggestedLabel");if(ea.length>0)j.addClass(ea[0],"hidden_elem");switch(da.action){case 'GOING':j.removeClass(aa.parentNode,"hidden_elem");j.removeClass(aa,"fbCalendarEventSuggested");j.addClass(aa,"fbCalendarEventGoing");break;case 'MAYBE':j.removeClass(aa.parentNode,"hidden_elem");j.removeClass(aa,"fbCalendarEventSuggested");j.removeClass(aa,"fbCalendarEventGoing");break;case 'DECLINED':case 'HIDDEN':n.hide(true);j.addClass(aa.parentNode,"hidden_elem");break;case 'EDITED':if(da.name)k.setContent(aa,da.name);if(da.day){var fa=x("pagelet_calendar_day_"+da.day);if(fa){var ga=l.find(fa,".fbCalendarGridEventList");if(l.scry(ga,"li").length>=4){j.addClass(aa.parentNode,"hidden_elem");s.loadFromEndpoint("CalendarDayPagelet","pagelet_calendar_day_"+da.day,{day:da.timestamp});}else k.prependContent(ga,aa.parentNode);}else j.addClass(aa.parentNode,"hidden_elem");}break;}}});},informEventGoing:function(aa,ba){h.inform(this.EVENT_ACTION,{eid:aa,action:'GOING',actioncontext:ba});},informEventMaybe:function(aa,ba){h.inform(this.EVENT_ACTION,{eid:aa,action:'MAYBE',actioncontext:ba});},informEventDeclined:function(aa,ba){h.inform(this.EVENT_ACTION,{eid:aa,action:'DECLINED',actioncontext:ba});},informEventHidden:function(aa,ba){h.inform(this.EVENT_ACTION,{eid:aa,action:'HIDDEN',actioncontext:ba});},informEventEdited:function(aa,ba,ca,da){h.inform(this.EVENT_ACTION,{eid:aa,action:'EDITED',name:ba,day:ca,timestamp:da});},informSuggestionsAdded:function(aa,ba){h.inform(this.SUGGESTIONS_LOADED,{timestamp:aa,content:ba});},removeCalendarListHeader:function(aa){var ba=k.scry(aa,"^.fbCalendarList .fbCalendarItem"),ca=k.find(aa,"^.fbCalendarItem");if(ba.length==1)ca=k.find(aa,"^.fbCalendarList");k.remove(ca);},reloadPage:function(){y(window.location);},unhide:function(aa){!function(){q.monitor(aa.nextSibling,j.show.curry(aa));}.defer();}});e.exports=z;});
__d("TooltipLink",["Parent","Tooltip"],function(a,b,c,d,e,f){var g=b('Parent'),h=b('Tooltip'),i={setTooltipText:function(j,k){j=g.byTag(j,'a');j&&h.set(j,k);}};e.exports=i;});
__d("ChatOnlineFriends",["ChatTypeaheadBehavior","ChatTypeaheadCore","ChatTypeaheadDataSource","ChatTypeaheadRenderer","Typeahead","AvailableList","AvailableListConstants","ChannelConnection","Chat","ChatConfig","ChatUnreadCount","ChatVisibility","CSS","DataStore","Dock","DOM","Event","JSXDOM","MercuryParticipantTypes","OrderedFriendsList","Parent","PresenceStatus","Run","ShortProfiles","TooltipLink","XHPTemplate","$","createObjectFrom","csx","cx","fbt","shield"],function(a,b,c,d,e,f){b('ChatTypeaheadBehavior');b('ChatTypeaheadCore');b('ChatTypeaheadDataSource');b('ChatTypeaheadRenderer');b('Typeahead');var g=b('AvailableList'),h=b('AvailableListConstants'),i=b('ChannelConnection'),j=b('Chat'),k=b('ChatConfig'),l=b('ChatUnreadCount'),m=b('ChatVisibility'),n=b('CSS'),o=b('DataStore'),p=b('Dock'),q=b('DOM'),r=b('Event'),s=b('JSXDOM'),t=b('MercuryParticipantTypes'),u=b('OrderedFriendsList'),v=b('Parent'),w=b('PresenceStatus'),x=b('Run'),y=b('ShortProfiles'),z=b('TooltipLink'),aa=b('XHPTemplate'),ba=b('$'),ca=b('createObjectFrom'),da=b('csx'),ea=b('cx'),fa=b('fbt'),ga=b('shield'),ha=['chatOnline','chatIdle','chatMobile','chatOffline'],ia="Ver todos";function ja(la){switch(la){case h.OFFLINE:return 'chatOffline';case h.IDLE:return 'chatIdle';case h.ACTIVE:return 'chatOnline';case h.MOBILE:return 'chatMobile';}}function ka(la,ma,na,oa,pa,qa,ra){var sa=(oa&&pa)||(qa&&ra);if(!la||!ma||!na||!sa)return;this.maxElements=la;this._faceTmpl=pa;this._arbiterTokens=[];this._root=na;this._renderedUsers=[];this._isBadgedLitestandFacepile=k.get('badge_facepile');x.onLeave(this.onunload.bind(this));var ta=q.scry(na,'.chatUpgradeLink');this.initTypeahead(ma,oa||qa,ta[0]);var ua=q.find(na,'.sidebarBtn');r.listen(ua,'click',function(event){j.toggleSidebar();event.kill();});this._faceFutures&&this._hideAllFaces();this._faceFutures=[];this._orderedFriends=u.getList();this._hashedFriends=ca(this._orderedFriends);this._availableListSubscribe(h.ON_AVAILABILITY_CHANGED,ga(this.update,this));this.update.bind(this).defer();this._channelSubscribe(i.CONNECTED,ga(this.update,this));this._channelSubscribe(i.RECONNECTING,this._handleChannelReconnecting.bind(this));this._channelSubscribe(i.SHUTDOWN,this._handleChannelShutdown.bind(this));this._channelSubscribe([i.MUTE_WARNING,i.UNMUTE_WARNING],ga(this.update,this));if(oa){this._facepile=oa.firstChild;r.listen(oa,'click',this.clickHandler.bind(this));if(this._isBadgedLitestandFacepile)this._arbiterTokens.push(l.subscribe('unread-changed',function(va,wa){if(this._renderedUsers.indexOf(wa)===-1)return;l.getUnreadCountForUID(wa,function(xa){for(var ya=0;ya<this._faceFutures.length;ya++)if(this._orderedFriends[ya]===wa)this._setCount(this._faceFutures[ya],xa);}.bind(this));}.bind(this)));}else{this._miniDivebar=qa;this._divebarTmpl=ra;}r.listen(q.find(na,'.fbChatGoOnlineLink'),'click',function(event){if(i.disconnected()){j.openBuddyList();}else m.goOnline(j.openBuddyList);event.kill();}.bind(this));r.listen(q.find(na,'.fbChatReconnectLink'),'click',function(event){if(i.disconnected())i.reconnect();event.kill();}.bind(this));g.update();}ka.prototype._availableListSubscribe=function(event,la){this._arbiterTokens.push(g.subscribe(event,la));};ka.prototype._channelSubscribe=function(event,la){this._arbiterTokens.push(i.subscribe(event,la));};ka.prototype.onunload=function(){this._arbiterTokens.forEach(function(la){la.unsubscribe();});};ka.prototype._setStatus=function(la,ma){if(n.hasClass(la,ma))return;ha.forEach(function(na){n.conditionClass(la,na,na==ma);});};ka.prototype.initTypeahead=function(la,ma,na){la.subscribe('reset',function(){n.show(ma);});la.subscribe('query',function(oa,pa){n.conditionShow(ma,!pa.value);});if(na)la.subscribe(['query','reset'],function(oa){n.conditionShow(na,oa==='reset');});};ka.prototype._updateMiniDivebar=function(){var la=Math.min(this._orderedFriends.length,10),ma=[];for(var na=0;na<la;na++)ma.push(this._renderDivebarItem(this._orderedFriends[na]));q.setContent(this._miniDivebar,ma);};ka.prototype._renderDivebarItem=function(la){var ma=this._divebarTmpl.build(),na=ma.getNode('anchor'),oa=ma.getNode('status'),pa=g.get(la);if(pa===h.ACTIVE){n.addClass(oa,'active');}else if(pa===h.MOBILE)n.addClass(oa,'mobile');y.get(la,function(qa){ma.setNodeContent('name',qa.name).setNodeProperty('profile-photo','src',qa.thumbSrc);r.listen(na,'click',function(){var ra={source:'online_friends',mode:'miniDivebar'};j.openTab(la,t.FRIEND,ra);return false;});});return ma.getRoot();};ka.prototype._handleChannelReconnecting=function(la,ma){var na=(ma<1000),oa=q.find(this._root,'.fbChatReconnectLink'),pa=q.find(this._root,'.fbChatReconnecting');n.conditionShow(oa,!na);n.conditionShow(pa,na);};ka.prototype._handleChannelShutdown=function(){var la=q.find(this._root,'.fbChatReconnectLink'),ma=q.find(this._root,'.fbChatReconnecting');n.hide(la);n.hide(ma);};ka.prototype.update=function(){var la=i.disconnected(),ma=m.isOnline();n.conditionClass(this._root,'disconnected',la);if(this._facepile){n.conditionShow(this._facepile,ma);ma&&this._updateFacepile(la);}else ma&&this._updateMiniDivebar();var na=q.find(this._root,'.typeaheadContainer');n.conditionShow(na,ma);if(k.get('chat_upgrade_link')){var oa=q.find(this._root,'.chatUpgradeLink');n.conditionShow(oa,ma);}var pa=q.find(this._root,'.chatGoOnlineLink');n.conditionShow(pa,!ma);var qa=q.find(this._root,'.chatReconnectLink');n.conditionShow(qa,ma&&la);};ka.prototype._updateFacepile=function(la){g.getAvailableIDs().forEach(function(va){if(!this._hashedFriends[va]){this._orderedFriends.push(va);this._hashedFriends[va]=true;}}.bind(this));var ma=this.maxElements,na=this._isBadgedLitestandFacepile&&this._orderedFriends.length>this.maxElements;if(na)ma=ma-1;var oa=[],pa=0;for(var qa=0;qa<this._orderedFriends.length;qa++){var ra=this._orderedFriends[qa],sa=g.get(ra),ta=this._faceFutures[qa],ua=pa<ma&&(la||sa!==h.OFFLINE);if(ua){if(!ta){ta=this._makeFace(qa);this._faceFutures[qa]=ta;}if(this._isBadgedLitestandFacepile&&this._renderedUsers.indexOf(ra)===-1)l.getUnreadCountForUID(ra,function(va){this._setCount(ta,va);}.bind(this));oa.push(ra);pa++;}this._updateFace(ta,ua,ja(sa));}this._renderedUsers=oa;if(na)q.appendContent(this._facepile,this._renderPlusNBox(w.getOnlineCount()-ma));};ka.prototype._setCount=function(la,ma){la(function(na){var oa=q.scry(na,"._5hou")[0];if(!ma){oa&&q.remove(oa);return;}if(!oa){oa=s.div({className:"_5hou"});q.appendContent(q.find(na,'a'),oa);}if(ma>9)ma='9+';q.setContent(oa,ma);});};ka.prototype._renderPlusNBox=function(la){if(!this._plusNBox){this._plusNBox=s.a({'aria-label':ia,className:"_5hov",'data-hover':"tooltip"});r.listen(this._plusNBox,'click',function(){p.show.bind(p,ba('fbDockChatBuddylistNub')).defer();});}q.setContent(this._plusNBox,'+'+la);return this._plusNBox;};ka.prototype._updateFace=function(la,ma,na){la&&la(function(oa){this._setStatus(oa,na);n.conditionShow(oa,ma);}.bind(this));};ka.prototype._makeFace=function(la){var ma=null,na=null,oa=this._orderedFriends[la];y.get(oa,function(pa){na=this._faceTmpl.render();o.set(na,'friendID',oa);var qa=aa.getNode(na,'img'),ra=qa.cloneNode(false);ra.setAttribute('src',pa.thumbSrc);q.replace(qa,ra);var sa=aa.getNode(na,'anchor');z.setTooltipText(sa,pa.name);if(ma)ma.forEach(function(xa){xa(na);});var ta=false;for(var ua=la+1;ua<this._orderedFriends.length&&!ta;ua++){var va=this._faceFutures[ua],wa=va&&va();if(wa){this._facepile.insertBefore(na,wa);ta=true;}}if(!ta)q.appendContent(this._facepile,na);}.bind(this));return function pa(qa){if(qa)if(na){qa(na);}else{ma=ma||[];ma.push(qa);}return na;};};ka.prototype.clickHandler=function(event){var la=event.getTarget(),ma=v.byClass(la,"_43q7");if(ma){var na=o.get(ma,'friendID');if(na&&m.isOnline()){var oa={source:'online_friends',mode:'miniDivebar'};j.openTab(na,t.FRIEND,oa);return false;}}};ka.prototype._hideAllFaces=function(){this._faceFutures.forEach(function(la){la&&la(function(ma){q.remove(ma);});});};e.exports=ka;});
__d("AppRequestReminders",["AsyncRequest","CSS","DOM","ge"],function(a,b,c,d,e,f){var g=b('AsyncRequest'),h=b('CSS'),i=b('DOM'),j=b('ge'),k=0,l={},m=1,n=j('OtherAppReqReminder'),o=function(u,v,w){l[v]={node:u,seq:m++,reqCount:w};},p=function(u){k=u;},q=function(u){return u.id.split('_')[1];},r=function(u){var v=j(u),w=v.nextSibling;if(w!==n){h.show(w);k-=l[q(w)].reqCount;}s(k);},s=function(u){new g().setURI('/ajax/reminders/update_count.php').setData({new_count:u}).setMethod('POST').send();},t=function(u,v){if(n&&v&&u>0){i.setContent(j('OtherAppReqLabel'),v);}else if(n){h.hide(n);}else h.hide(j('OtherAppReqReminder'));};f.initNode=o;f.handleRemove=r;f.updateCount=t;f.setTotalOtherCount=p;});
__d("LikeAllLink",["Event","AsyncRequest"],function(a,b,c,d,e,f){var g=b('Event'),h=b('AsyncRequest'),i={init:function(j,k){g.listen(j,'click',function(){new h('/ajax/reminders/like_all.php').setData({page_ids:k,origin:'reminder_box_invite_like_all'}).send();});}};e.exports=i;});
__d("LoadRecommendations",["Event","AsyncRequest"],function(a,b,c,d,e,f){var g=b('Event'),h=b('AsyncRequest'),i={loadOnClick:function(j){g.listen(j,'click',function(){new h().setURI('/ajax/pages/reminder/recommendations').send();});}};e.exports=i;});
__d("ReminderStory",["AsyncRequest","DOMQuery","Event","LayerAutoFocus","ScrollableArea","SubscriptionsHandler","UIPagelet","endsWith"],function(a,b,c,d,e,f){var g=b('AsyncRequest'),h=b('DOMQuery'),i=b('Event'),j=b('LayerAutoFocus'),k=b('ScrollableArea'),l=b('SubscriptionsHandler'),m=b('UIPagelet'),n=b('endsWith');function o(p,q,r,s){this.$ReminderStory0=false;i.listen(p,'click',function(){q.show();if(r)new g('/growth/reminder/logging.php').setData({context_data:r,first_click:!this.$ReminderStory0}).send();this.$ReminderStory0=true;}.bind(this));if(s)q.subscribeOnce('show',function(){m.loadFromEndpoint(s,q.getContent());});q.disableBehavior(j);q.subscribe('aftershow',function(){var t=q.getRoot(),u=h.scry(t,'#SuggestBelowInvite')[0];if(u)new g('/ajax/pages/reminder/recommendations').send();var v=q.hide.bind(q);this.$ReminderStory1=new l();this.$ReminderStory1.addSubscriptions(i.listen(window,'resize',v),i.listen(window,'scroll',v));var w=h.scry(t,'.inlineReplyTextArea')[0];w&&w.focus();var x=h.scry(t,'.jewelItemNew'),y=[];for(var z in x){var aa=x[z].getAttribute('id');if(aa&&n(aa,'_1_req'))y=y.concat(aa.replace('_1_req',''));}if(y.length>0)new g('/friends/requests/log_impressions').setData({ids:y.join(','),ref:'reminder_box'}).send();var ba=k.getInstance(h.scry(q.getRoot(),'.uiScrollableArea')[0]);if(ba){ba.poke();i.fire(h.scry(q.getRoot(),'.scrollable')[0],'scroll');}}.bind(this));q.subscribe('beforehide',function(){if(this.$ReminderStory1){this.$ReminderStory1.release();this.$ReminderStory1=null;}}.bind(this));}e.exports=o;});