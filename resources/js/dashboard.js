
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

new DataTable('#tb_filtro', {
    scrollX: true,
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.1.3/i18n/es-ES.json',
        
    },
    columnDefs: [
        {orderable: false, targets:[2]}
    ],

    
});

