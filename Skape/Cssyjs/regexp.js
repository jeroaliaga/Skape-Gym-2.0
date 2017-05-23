
		var input = document.getElementsByTagName('input');
		
	//For para declarar funcion
		
		var form = document.getElementsByTagName('form')[0];
			
			var validacion = [];
			
			function valid(){
				var regexps = validacion;
				validacion[0] = /^[a-z]{2,20}(\s|\s[a-z]{2,20})?$/ig;
				validacion[1] = /^[a-z]{2,20}(\s|\s[a-z]{2,20})*$/ig;
				validacion[2] = /^([a-z0-9]{3,}((\_|\-|\.){1,2})?[a-z0-9]*@[a-z0-9_-]{3,}\.{1}[a-z]{2,4}(\.[a-z]{2})?)?$/ig;
				validacion[3] = /^((011|11|15)?[0-9]{6,8})?$/g;
				validacion[4] = /^([a-z]{2,20}(\s|\s[a-z]{2,20})*)?$/ig;
				validacion[5] = /^([a-z]{2,20}(\s|\s[a-z]{2,20})*)?$/ig;
				
				return regexps;
			}

			form.onsubmit = function(){
				
				var regexps = valid();
				var fal = true;
				for(var i = 0; i < input.length - 1; i++){
					if(validacion[i].test(input[i].value)){
							input[i].style.border = '';
						}else{
							input[i].style.border = 'red 1px solid';
							return false;
							}
				}
			}