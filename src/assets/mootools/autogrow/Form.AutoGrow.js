/*
---

name: Form.AutoGrow

description: Automatically resizes textareas based on their content.

authors: Christoph Pojer (@cpojer)

credits: Based on a script by Gary Glass (www.bookballoon.com)

license: MIT-style license.

requires: [Core/Class.Extras, Core/Element, Core/Element.Event, Core/Element.Style, Core/Element.Dimensions, Class-Extras/Class.Binds, Class-Extras/Class.Singleton]

provides: Form.AutoGrow

...
*/

Class.Binds = new Class({

$bound: {},

bound: function(name){
return this.$bound[name] ? this.$bound[name] : this.$bound[name] = this[name].bind(this);
}

});

(function(){

var storage = {

storage: {},

store: function(key, value){
this.storage[key] = value;
},

retrieve: function(key){
return this.storage[key] || null;
}

};

Class.Singleton = function(){
this.$className = String.uniqueID();
};

Class.Singleton.prototype.check = function(item){
if (!item) item = storage;

var instance = item.retrieve('single:' + this.$className);
if (!instance) item.store('single:' + this.$className, this);

return instance;
};

var gIO = function(klass){

var name = klass.prototype.$className;

return name ? this.retrieve('single:' + name) : null;

};

if (('Element' in this) && Element.implement) Element.implement({getInstanceOf: gIO});

Class.getInstanceOf = gIO.bind(storage);

})();
















(function(){

var wrapper = new Element('div').setStyles({
	overflowX: 'hidden',
	position: 'absolute',
	top: 0,
	left: -9999
});

var escapeHTML = function(string){
	return string.replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
};

if (!this.Form) this.Form = {};

var AutoGrow = this.Form.AutoGrow = new Class({

	Implements: [Options, Class.Singleton, Class.Binds],

	options: {
		minHeightFactor: 2,
		margin: 0
	},

	initialize: function(element, options){
		this.setOptions(options);
		element = this.element = $(element);
		
		return this.check(element) || this.setup();
	},

	setup: function(){
		this.attach().focus().resize();
	},

	toElement: function(){
		return this.element;
	},

	attach: function(){
		this.element.addEvents({
			focus: this.bound('focus'),
			keydown: this.bound('keydown'),
			scroll: this.bound('scroll')
		});

		return this;
	},

	detach: function(){
		this.element.removeEvents({
			focus: this.bound('focus'),
			keydown: this.bound('keydown'),
			scroll: this.bound('scroll')
		});

		return this;
	},

	focus: function(){
		wrapper.setStyles(this.element.getStyles('fontSize', 'fontFamily', 'width', 'lineHeight', 'padding')).inject(document.body);

		this.minHeight = (wrapper.set('html', 'A').getHeight() + this.options.margin) * this.options.minHeightFactor;

		return this;
	},

	keydown: function(){
		this.resize.delay(15, this);
	},

	resize: function(){
		var element = this.element,
			html = escapeHTML(element.get('value')).replace(/\n|\r\n/g, '<br/>A');
		
		if (wrapper.get('html') == html) return this;

		wrapper.set('html', html);
		var height = wrapper.getHeight() + this.options.margin;
		if (element.getHeight() != height){
			element.setStyle('height', this.minHeight.max(height));

			AutoGrow.fireEvent('resize', [this]);
		}
		
		return this;
	},

	scroll: function(){
		this.element.scrollTo(0, 0);
	}

});

AutoGrow.extend(new Events);

}).call(this);
