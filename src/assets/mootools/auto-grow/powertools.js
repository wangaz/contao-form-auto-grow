/* Class.Binds, MIT-style license.*/
Class.Binds=new Class({$bound:{},bound:function(n){return this.$bound[n]?this.$bound[n]:this.$bound[n]=this[n].bind(this)}});
/* Class.Singleton, MIT-style license. */
!function(){var e={storage:{},store:function(e,t){this.storage[e]=t},retrieve:function(e){return this.storage[e]||null}};Class.Singleton=function(){this.$className=String.uniqueID()},Class.Singleton.prototype.check=function(t){t||(t=e);var n=t.retrieve("single:"+this.$className);return n||t.store("single:"+this.$className,this),n};var t=function(e){var t=e.prototype.$className;return t?this.retrieve("single:"+t):null};"Element"in this&&Element.implement&&Element.implement({getInstanceOf:t}),Class.getInstanceOf=t.bind(e)}();
/* Form.AutoGrow, MIT-style license.*/
(function(){var t=new Element("div").setStyles({overflowX:"hidden",position:"absolute",top:0,left:-9999}),e=function(t){return t.replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;")};this.Form||(this.Form={});var i=this.Form.AutoGrow=new Class({Implements:[Options,Class.Singleton,Class.Binds],options:{minHeightFactor:2,margin:0},initialize:function(t,e){return this.setOptions(e),t=this.element=$(t),this.check(t)||this.setup()},setup:function(){this.attach().focus().resize()},toElement:function(){return this.element},attach:function(){return this.element.addEvents({focus:this.bound("focus"),keydown:this.bound("keydown"),scroll:this.bound("scroll")}),this},detach:function(){return this.element.removeEvents({focus:this.bound("focus"),keydown:this.bound("keydown"),scroll:this.bound("scroll")}),this},focus:function(){return t.setStyles(this.element.getStyles("fontSize","fontFamily","width","lineHeight","padding")).inject(document.body),this.minHeight=(t.set("html","A").getHeight()+this.options.margin)*this.options.minHeightFactor,this},keydown:function(){this.resize.delay(15,this)},resize:function(){var n=this.element,s=e(n.get("value")).replace(/\n|\r\n/g,"<br/>A");if(t.get("html")==s)return this;t.set("html",s);var o=t.getHeight()+this.options.margin;return n.getHeight()!=o&&(n.setStyle("height",this.minHeight.max(o)),i.fireEvent("resize",[this])),this},scroll:function(){this.element.scrollTo(0,0)}});i.extend(new Events)}).call(this);