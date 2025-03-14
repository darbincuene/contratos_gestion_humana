document.addEventListener('DOMContentLoaded', function () {
    const tablaCarpetas = document.getElementById('tablaCarpetas').getElementsByTagName('tbody')[0];

    // Función para actualizar la tabla
    function actualizarTabla() {
        fetch('obtener_carpetas.php')
            .then(response => response.json())
            .then(data => {
                // Limpiar la tabla
                tablaCarpetas.innerHTML = '';

                // Agregar las carpetas a la tabla
                data.forEach(carpeta => {
                    const nuevaFila = document.createElement('tr');
                    nuevaFila.innerHTML = `
                        <td>${carpeta}</td>
                    `;
                    tablaCarpetas.appendChild(nuevaFila);
                });
            })
            .catch(error => console.error('Error:', error));
    }

    // Actualizar la tabla cada 5 segundos (opcional)
    setInterval(actualizarTabla, 5000);
});