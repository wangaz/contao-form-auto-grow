/* Class.Binds, MIT-style license.*/
Class.Binds=new Class({$bound:{},bound:function(n){return this.$bound[n]?this.$bound[n]:this.$bound[n]=this[n].bind(this)}});