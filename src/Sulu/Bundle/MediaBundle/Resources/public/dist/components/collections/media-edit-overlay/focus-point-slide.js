define(["services/sulumedia/media-manager","text!./toolbar-slide.html"],function(a,b){"use strict";var c=function(){this.$el.find(".back").on("click",this.onBack)},d=function(){this.sandbox.on("sulu.area-selection."+this.instanceName+".tile-selected",e.bind(this))},e=function(a,b){this.focusPointX=a,this.focusPointY=b,this.sandbox.emit("husky.toolbar."+this.instanceName+".item.enable","save",!1)},f=function(){this.sandbox.start([{name:"area-selection@sulumedia",options:{el:this.$el.find(".area-selection"),instanceName:this.instanceName,image:this.media.url,resizeable:!1,draggable:!1,tileSelectable:!0,tileColumn:this.media.focusPointX,tileRow:this.media.focusPointY}}]),this.sandbox.once("sulu.area-selection.focus-point-"+this.media.id+".initialized",function(a,b){this.sandbox.emit("sulu.area-selection.focus-point-"+this.media.id+".set-area-guide-dimensions",a,b,{width:a,height:b,x:0,y:0})}.bind(this))},g=function(){this.sandbox.start([{name:"toolbar@husky",options:{el:this.$el.find(".toolbar"),instanceName:this.instanceName,skin:"big",buttons:[{id:"save",icon:"floppy-o",title:"sulu-media.save-and-recrop",disabled:!0,callback:h.bind(this)}]}}])},h=function(){this.sandbox.emit("husky.toolbar."+this.instanceName+".item.loading","save"),this.media.focusPointX=this.focusPointX,this.media.focusPointY=this.focusPointY,a.save(this.media).then(function(){this.sandbox.emit("husky.toolbar."+this.instanceName+".item.disable","save")}.bind(this)),this.sandbox.emit("sulu.media-edit.preview.loading",this.sandbox.translate("sulu-media.saved-crops-not-visible")),this.sandbox.emit("sulu.media-edit.formats.update")};return{initialize:function(a,c,d){this.sandbox=a,this.media=c,this.onBack=d,this.$el=$(_.template(b,{})),this.focusPointX=this.media.focusPointX,this.focusPointY=this.media.focusPointY,this.instanceName="focus-point-"+this.media.id},getSlideDefinition:function(){return{displayHeader:!1,data:this.$el,buttons:[],cancelCallback:function(){this.sandbox.stop()}.bind(this)}},start:function(){c.call(this),d.call(this),f.call(this),g.call(this)}}});