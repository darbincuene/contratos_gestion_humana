document.addEventListener("DOMContentLoaded", function () {
    let documentosSubidos = [];
    let maxDocumentos = 28;

    document.getElementById("uploadForm").addEventListener("submit", function (event) {
        event.preventDefault();

        let tipoDocumento = document.getElementById("tipoDocumento");
        let tipoSeleccionado = tipoDocumento.options[tipoDocumento.selectedIndex];

        if (tipoSeleccionado.value === "") {
            alert("Por favor, selecciona un tipo de documento.");
            return;
        }

        let fileInput = document.getElementById("fileInput");
        if (fileInput.files.length === 0) {
            alert("Debe seleccionar al menos un archivo.");
            return;
        }

        // Simular la subida de archivos (enviar al backend)
        let formData = new FormData(this);

        fetch("{{ route('subir.archivos') }}", {
            method: "POST",
            body: formData
        })

        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Archivos subidos correctamente");

                // Marcar documento como subido
                documentosSubidos.push(tipoSeleccionado.value);
                tipoSeleccionado.disabled = true;

                // Actualizar lista de documentos subidos
                let lista = document.getElementById("documentosSubidos");
                let li = document.createElement("li");
                li.textContent = tipoSeleccionado.text;
                lista.appendChild(li);

                // Actualizar contador de documentos restantes
                let restantes = maxDocumentos - documentosSubidos.length;
                document.getElementById("restantes").textContent = restantes;

                if (restantes === 0) {
                    document.getElementById("submitButton").disabled = true;
                    alert("Se han subido los 28 documentos.");
                }
            } else {
                alert("Error al subir archivos.");
            }
        })
        .catch(error => console.log(error));
    });
});
