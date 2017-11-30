function resultados() {
     var btn = document.getElementById('buscar');
     var instrumento = document.getElementById('instrumentos').value;
     var generos = document.getElementById('generos').value;

     var base_url = window.location.origin + '/' + window.location.pathname.split('/')[1] + '/';
     $.post(base_url + "application/ajax/consultasMarcadores.php", {instrumento: instrumento,genero:generos}, function (mensaje) {
                 lista = JSON.parse(mensaje);
                

                document.getElementById 
             });
}

 window.addEventListener('load', resultados, false);
