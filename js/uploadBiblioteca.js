function upload_archivo(){//Funcion encargada de enviar el archivo via AJAX
				$("#content").html("<div align='center'><img src='./img/load.gif'/><br/>Un momento, por favor...</div>");
				var archivo = document.getElementById("archivo");
				//var carpeta =  $("#carpeta").val();
				//alert(carpeta); 
				var file    = archivo.files[0];
				var data    = new FormData();
			     	data.append("archivo",file);	
			     //data.append('carpeta',carpeta);						
				
				$.ajax({
					url: "./upload/subirArchivoBiblioteca.php",        // Url to which the request is send
					type: "POST",             // Type of request to be send, called as method
					data: data,	  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data){   // A function to be called if request succeeds
                  //Cargamos finalmente el contenido deseado
                $("#content").fadeIn(1000).html(data);
                 //alert("ARCHIVO SUBIDO A LA BIBILIOTECA ..."); 
            }, error: function (data){ // Si hay algún error.
	         alert("OCURRIO UN ERROR AL SUBIR EL ARCHIVO AL SERVIDOR!!");
						}			
				});
				
				//limpiaFichaDocumento();
				 //var loader ("#archivoLoad").val()=1; 
				 return false;
			}