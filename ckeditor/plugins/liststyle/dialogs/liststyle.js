﻿/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function(){function a(d,e){var f;try{f=d.getSelection().getRanges()[0];}catch(g){return null;}f.shrink(CKEDITOR.SHRINK_TEXT);return f.getCommonAncestor().getAscendant(e,true);};var b={a:'lower-alpha',A:'upper-alpha',i:'lower-roman',I:'upper-roman',1:'decimal',disc:'disc',circle:'circle',square:'square'};function c(d,e){if(e=='bulletedListStyle')return{title:d.lang.list.bulletedTitle,minWidth:300,minHeight:50,contents:[{elements:[{type:'select',label:d.lang.list.type,id:'type',style:'width: 150px; margin: auto;',items:[[d.lang.list.notset,''],[d.lang.list.circle,'circle'],[d.lang.list.disc,'disc'],[d.lang.list.square,'square']],setup:function(f){var g=f.getStyle('list-style-type')||b[f.getAttribute('type')]||f.getAttribute('type')||'';this.setValue(g);},commit:function(f){var g=this.getValue();if(g)f.setStyle('list-style-type',g);else f.removeStyle('list-style-type');}}]}],onShow:function(){var f=this.getParentEditor(),g=a(f,'ul');g&&this.setupContent(g);},onOk:function(){var f=this.getParentEditor(),g=a(f,'ul');g&&this.commitContent(g);}};else if(e=='numberedListStyle')return{title:d.lang.list.numberedTitle,minWidth:300,minHeight:50,contents:[{elements:[{type:'hbox',widths:['25%','75%'],children:[{label:d.lang.list.start,type:'text',id:'start',setup:function(f){var g=f.getAttribute('start')||1;g&&this.setValue(g);},commit:function(f){f.setAttribute('start',this.getValue());}},{type:'select',label:d.lang.list.type,id:'type',style:'width: 100%;',items:[[d.lang.list.notset,''],[d.lang.list.armenian,'armenian'],[d.lang.list.georgian,'georgian'],[d.lang.list.lowerRoman,'lower-roman'],[d.lang.list.upperRoman,'upper-roman'],[d.lang.list.lowerAlpha,'lower-alpha'],[d.lang.list.upperAlpha,'upper-alpha'],[d.lang.list.lowerGreek,'lower-greek'],[d.lang.list.decimal,'decimal'],[d.lang.list.decimalLeadingZero,'decimal-leading-zero']],setup:function(f){var g=f.getStyle('list-style-type')||b[f.getAttribute('type')]||f.getAttribute('type')||'';this.setValue(g);},commit:function(f){var g=this.getValue();if(g)f.setStyle('list-style-type',g);else f.removeStyle('list-style-type');}}]}]}],onShow:function(){var f=this.getParentEditor(),g=a(f,'ol');g&&this.setupContent(g);},onOk:function(){var f=this.getParentEditor(),g=a(f,'ol');g&&this.commitContent(g);}};};CKEDITOR.dialog.add('numberedListStyle',function(d){return c(d,'numberedListStyle');});CKEDITOR.dialog.add('bulletedListStyle',function(d){return c(d,'bulletedListStyle');});})();