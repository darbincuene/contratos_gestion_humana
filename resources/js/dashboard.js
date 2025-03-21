
// console.log("si funcioneichon")
new DataTable('#tb_carpetas', {
    scrollX: true,
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.1.3/i18n/es-ES.json',
        
    },
    columnDefs: [
        {orderable: false, targets:[1]}
    ],

    
});  
new DataTable('#tb_detalle', {
    scrollX: true,
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.1.3/i18n/es-ES.json',
        
    },
    columnDefs: [
        {orderable: false, targets:[2]}
    ],

    
}); 

$(document).ready(function() {
    $(".btn-compartir").click(function() {
        let carpetaId = $(this).data("id");

        $.ajax({
            url: `/compartir/carpeta/${carpetaId}`,
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.success) {
                    let link = window.location.origin + "/compartir/" + response.token;
                    alert("📂 Enlace generado: " + link);
                } else {
                    alert("❌ Error al generar el enlace");
                }
            },
            error: function() {
                alert("❌ Ocurrió un error al intentar compartir la carpeta");
            }
        });
    });
});