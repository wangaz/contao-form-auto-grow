/* Class.Singleton, MIT-style license. */
!function(){var e={storage:{},store:function(e,t){this.storage[e]=t},retrieve:function(e){return this.storage[e]||null}};Class.Singleton=function(){this.$className=String.uniqueID()},Class.Singleton.prototype.check=function(t){t||(t=e);var n=t.retrieve("single:"+this.$className);return n||t.store("single:"+this.$className,this),n};var t=function(e){var t=e.prototype.$className;return t?this.retrieve("single:"+t):null};"Element"in this&&Element.implement&&Element.implement({getInstanceOf:t}),Class.getInstanceOf=t.bind(e)}();