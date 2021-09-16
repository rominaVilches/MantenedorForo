
function validaLogin(){
	var usuario = document.getElementById('usuario');
	var clave = document.getElementById('clave');

	if(usuario.value == ''){
		alert('Debe ingresar el Usuario');
		usuario.focus();
		return false;
    }
    
    if(clave.value == ''){
		alert('Debe ingresar la Clave');
		clave.focus();
		return false;
	}

	return true;
}

function obligatorioLogin(campo, error){
	var campo = document.getElementById(campo);
	if(campo.value == ''){
		document.getElementById(error).innerHTML = 'Campo Obligatorio';
		campo.style.cssText = 'border: 3px solid #FF0000; border-radius: 3px;';
	} else {
		document.getElementById(error).innerHTML = '';
		campo.style.cssText = 'backgroundColor= #fff';
	}
}


function validaRegistro(){
	var usuario = document.getElementById('usuario');
	var clave = document.getElementById('clave');
    var nombre = document.getElementById('nombre');
    var apellido = document.getElementById('apellido');
    var imagen = document.getElementById('imagen');
    var nacionalidad = document.getElementById('nacionalidad');
    
	if(usuario.value == ''){
		alert('Debe ingresar el Usuario');
		usuario.focus();
		return false;
    }
    
    if(clave.value == ''){
		alert('Debe ingresar la Clave');
		clave.focus();
		return false;
    }
    
    if(nombre.value == ''){
		alert('Debe ingresar el Nombre');
		nombre.focus();
		return false;
    }
    
    if(apellido.value == ''){
		alert('Debe ingresar el Apellido');
		apellido.focus();
		return false;
    }
    
    if(imagen.value == ''){
		alert('Debe ingresar la Imagen');
		imagen.focus();
		return false;
    }
    
    if(nacionalidad.value == ''){
		alert('Debe ingresar la Nacionalidad');
		nacionalidad.focus();
		return false;
	}

	return true;
}

function obligatorioRegistro(campo, error){
	var campo = document.getElementById(campo);
	if(campo.value == ''){
		document.getElementById(error).innerHTML = 'Campo Obligatorio';
		campo.style.cssText = 'border: 3px solid #FF0000; border-radius: 3px;';
	} else {
		document.getElementById(error).innerHTML = '';
		campo.style.cssText = 'backgroundColor= #fff';
	}
}


function validaPost(){
	var usuario = document.getElementsByName('mensaje');

	if(mensaje.value == ''){
		alert('Debe ingresar un mensaje, no puede postear mensajes vacíos');
		mensaje.focus();
		return false;
    }

	return true;
}

function obligatorioPost(campo, error){
	var campo = document.getElementById(campo);
	if(campo.value == ''){
		document.getElementById(error).innerHTML = 'Debe ingresar un mensaje';
		campo.style.cssText = 'border: 3px solid #FF0000; border-radius: 3px;';
	} else {
		document.getElementById(error).innerHTML = '';
		campo.style.cssText = 'backgroundColor= #fff';
	}
}
