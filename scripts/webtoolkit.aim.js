AIM = { 
	frame : function(c) { 
		var n = 'f' + Math.floor(Math.random() * 99999);
		var d = document.createElement('DIV');
		d.innerHTML = '<iframe style="display:none" '
                      + 'src="about:blank" id="'+n+'" '
                      + 'name="'+n+'"' 
                      + 'onload="AIM.loaded(\''+n+'\')"></iframe>';
		document.body.appendChild(d);
 
		var i = document.getElementById(n);
		if (c && typeof(c.onComplete) == 'function') {
			i.onComplete = c.onComplete;
		} 
		return n;
	},
 
	form : function(f, name) {
		f.setAttribute('target', name);
	}, 
	submit : function(f, c) {
		AIM.form(f, AIM.frame(c));
		if (c && typeof(c.onStart) == 'function') {
			return c.onStart();
		} else {
			return true;
		}
	}, 
	loaded : function(id) {
		var i = document.getElementById(id);
        //alert(i.parentNode.innerHTML);
		if (i.contentDocument) {
			var d = i.contentDocument;
		} else if (i.contentWindow) {
			var d = i.contentWindow.document;
		} else {
			var d = window.frames[id].document;
		}
        //alert(d.location.href);        
		if (d.location.href == "about:blank")  return; 
		if (typeof(i.onComplete) == 'function') {
			i.onComplete(d.body.innerHTML);
		}
	}
}
AIMEDIT = { 
	frame : function(c) { 
		var n = 'f' + Math.floor(Math.random() * 99999);
		var d = document.createElement('DIV');
		d.innerHTML = '<iframe style="display:none" '
                      + 'src="about:blank" id="'+n+'" '
                      + 'name="'+n+'"' 
                      + 'onload="AIMEDIT.loaded(\''+n+'\')"></iframe>';
		document.body.appendChild(d);
 
		var i = document.getElementById(n);
		if (c && typeof(c.onComplete) == 'function') {
			i.onComplete = c.onComplete;
		} 
		return n;
	},
 
	form : function(f, name) {
		f.setAttribute('target', name);
	}, 
	submit : function(f, c) {
		AIMEDIT.form(f, AIMEDIT.frame(c));
		if (c && typeof(c.onStart) == 'function') {
			return c.onStart();
		} else {
			return true;
		}
	}, 
	loaded : function(id) {
		var i = document.getElementById(id);
        //alert(i.parentNode.innerHTML);
		if (i.contentDocument) {
			var d = i.contentDocument;
		} else if (i.contentWindow) {
			var d = i.contentWindow.document;
		} else {
			var d = window.frames[id].document;
		}
        //alert(d.location.href);        
		if (d.location.href == "about:blank")  return; 
		if (typeof(i.onComplete) == 'function') {
			i.onComplete(d.body.innerHTML);
		}
	}
}