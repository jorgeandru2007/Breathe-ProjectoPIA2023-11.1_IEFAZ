<!DOCTYPE html>
<html>
<head>
    <title>Subir imagen</title>
    <style>
        .drop-area {
            width: 300px;
            height: 200px;
            border: 2px dashed #ccc;
            border-radius: 5px;
            padding: 25px;
            text-align: center;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h1>Subir imagen</h1>
    <div class="drop-area" id="dropArea" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">
        Arrastra y suelta aquí la imagen para subirla.
    </div>

    <script>
        function dragOverHandler(event) {
            event.preventDefault();
            event.dataTransfer.dropEffect = "copy";
        }

        function dropHandler(event) {
            event.preventDefault();

            var file = event.dataTransfer.files[0];
            var formData = new FormData();
            formData.append('imagen', file);


            document.write("<h2>Contenido de FormData:</h2>");

            for (var pair of formData.entries()) {
                var value = pair[1];
                if (value instanceof File) {
                    value = value.name; // Obtener el nombre del archivo
                }
                document.write(pair[0] + ": " + value + "<br>");
            }

            
            var reader = new FileReader();
            reader.onload = function(event) {
                var imageDataUrl = event.target.result;
                var imgElement = document.createElement('img');
                imgElement.src = imageDataUrl;
                document.body.appendChild(imgElement);
            };

            
            reader.readAsDataURL(file);


            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'subir_imagen.php', true);

            xhr.onload = function () {
                if (xhr.status === 200) {
                    alert("La imagen se ha subido correctamente.");
                } else {
                    alert("Error al subir la imagen.");
                }
            };

            xhr.send(formData);

            
        }
    </script>
</body>
</html>
