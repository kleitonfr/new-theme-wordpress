var Prefeitura = Prefeitura || {};

Prefeitura.Cookie = (function() {
	
	function Cookie() {}
	
	Cookie.prototype.create = function(name, value, days) {

		var expires = '';

		if (days) {

			var time = new Date();

			time.setTime(time.getTime() + (days*24*60*60*1000));

			expires = `expires=${time.toUTCString()};`;
		}

		document.cookie = `${name}=${value};${expires}path=/`;
	}
	
	Cookie.prototype.get = function(name) {

		var nameEQ = `${name}=`;

		var ca = document.cookie.split(';');

		for (var i = 0; i < ca.length; i++) {

			var c = ca[i];

			while (c.charAt(0) == ' ') c = c.substring(1, c.length);

			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}

		return '';
	}
	
	Cookie.prototype.delete = function(name) {

		this.create(name, '', -1);
	}

	Cookie.prototype.check = function(name) {

		var check = this.get(name);

		if(check != "")
			return true;

		return false;
	}
	
	return Cookie;
	
}());