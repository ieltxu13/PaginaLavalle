/*!CK:1718120606!*//*1382537238,173209391*/

if (self.CavalryLogger) { CavalryLogger.start_js(["Hpotd"]); }

__d("OGAggregationBling",["React","NumberFormat","cx","fbt"],function(a,b,c,d,e,f){var g=b('React'),h=b('NumberFormat'),i=b('cx'),j=b('fbt'),k=g.createClass({displayName:'OGAggregationBling',render:function(){var l=[];if(this.props.likes)l.push(g.DOM.span({className:"_14a_"},g.DOM.i({className:"_4fx"}),g.DOM.span(null,h.formatIntegerWithDelimiter(this.props.likes,this.props.numberDelimiter)),g.DOM.span({className:"accessible_elem"},"p\u00e1ginas que me gustan")));if(this.props.comments){l.push(g.DOM.span({className:"_14a_"},g.DOM.i({className:"_4fy"}),g.DOM.span(null,h.formatIntegerWithDelimiter(this.props.comments,this.props.numberDelimiter)),g.DOM.span({className:"accessible_elem"},"comentarios")));}else{var m=!(this.props.mini&&this.props.likes),n=!this.props.likes&&this.props.alwaysVisible,o=(("_14a_")+(m?' '+"_4fz":'')+(n?' '+"_55n8":''));l.push(g.DOM.span({className:o},g.DOM.i({className:"_4fy"})));}return (g.DOM.span({className:"_4f-"},l));}});e.exports=k;});
__d("OGAggregationUFI",["DOM","CSS","OGAggregationBling","React","UFICentralUpdates","UFIToplevelCommentList","UFIConstants","UFIFeedbackTargets","UFILikeLink.react","UFIUserActions","copyProperties","csx","cx"],function(a,b,c,d,e,f){var g=b('DOM'),h=b('CSS'),i=b('OGAggregationBling'),j=b('React'),k=b('UFICentralUpdates'),l=b('UFIToplevelCommentList'),m=b('UFIConstants'),n=b('UFIFeedbackTargets'),o=b('UFILikeLink.react'),p=b('UFIUserActions'),q=b('copyProperties'),r=b('csx'),s=b('cx');function t(u,v,w){this._root=u;this._id=v.ftentidentifier;this._source=v.source;this._numberDelimiter=v.numberdelimiter||',';this._mini=v.mini;this._alwaysVisible=v.alwaysvisible;this._bling=g.scry(this._root,"._4f-")[0];this._initializeLikeLink();k.handleUpdate(m.UFIPayloadSourceType.INITIAL_SERVER,w);k.subscribe('feedback-updated',function(x,y){if(this._id in y.updates)this.render();}.bind(this));this.render();}q(t.prototype,{_initializeLikeLink:function(){if(this._likeLink)throw new Error('OGAggregationUFI attempted to initialize the like link when the like'+' link was already present');var u=g.scry(this._root,'.like_link')[0];if(u){var v=document.createElement('span');u.parentNode.replaceChild(v,u);this._likeLink=v;v.appendChild(u);}},render:function(){n.getFeedbackTarget(this._id,function(u){if(this._likeLink){var v=!u.hasviewerliked,w=function(event){p.changeLike(this._id,v,{source:this._source,target:event.target});}.bind(this),x=o({onClick:w,likeAction:v});j.renderComponent(x,this._likeLink);}if(this._bling){var y=l.getCommentListForFeedbackTargetID_UNSAFE(this._id).getDisplayedCommentCount();h.conditionClass(this._root,"_93n",this._mini&&(u.likecount||y));var z=i({alwaysVisible:this._alwaysVisible,mini:this._mini,likes:u.likecount,comments:y,numberDelimiter:this._numberDelimiter});j.renderComponent(z,this._bling);}}.bind(this));}});e.exports=t;});
__d("OGAggregationPeek",["Event","Animation","CSS","DOM","Style","Vector","copyProperties","csx","cx"],function(a,b,c,d,e,f){var g=b('Event'),h=b('Animation'),i=b('CSS'),j=b('DOM'),k=b('Style'),l=b('Vector'),m=b('copyProperties'),n=b('csx'),o=b('cx');function p(q){this._root=q;this._wrap=j.find(this._root,"._4dy");this._content=j.find(this._wrap,"._4dz");this._listener=g.listen(q,'click',this._expand.bind(this));}m(p.prototype,{_expand:function(){var q=l.getElementDimensions(this._wrap).y,r=l.getElementDimensions(this._content).y;new h(this._wrap).from('height',q).to('height',r).duration(200).ondone(k.set.curry(this._wrap,'height','')).go();i.removeClass(this._root,"_4dx");this._listener.remove();this._listener=null;return false;}});e.exports=p;});