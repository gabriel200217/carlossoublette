$(document).ready(function() {
  

  $("#tablas").DataTable({
 
    responsive: true,
    
    lengthMenu: [3, 5, 10, 15, 20, 100, 200, 500],
    columnDefs: [
      { className: 'centered', targets: [0, 1, 2, 3, 4, 5] },
      { orderable: false, targets: [2] },
      { searchable: false, targets: [1] },
      { width: '20%', targets: [1] },
      
    ],

    
    
    columnDefs: [
      {
        responsivePriority: 1,
        targets: 0
      },
      {
        responsivePriority: 2,
        targets: -1
      }
    ],
    pageLength: 5,
    destroy: true,
    language: {
      processing: 'Procesando...',
      lengthMenu: 'Mostrar _MENU_ registros',
      zeroRecords: 'No se encontraron resultados',
      emptyTable: 'Ningún dato disponible en esta tabla',
      infoEmpty: 'Mostrando registros del 0 al 0 de un total de 0 registros',
      infoFiltered: '(filtrado de un total de _MAX_ registros)',
      search: 'Buscar:',
      infoThousands: ',',
      loadingRecords: 'Cargando...',
      paginate: {
        first: 'Primero',
        last: 'Último',
        next: 'Sig',
        previous: 'Ant',
      },
      aria: {
        sortAscending: ': Activar para ordenar la columna de manera ascendente',
        sortDescending: ': Activar para ordenar la columna de manera descendente',
      },
    }
    
    
  });
  

  $(".dataTables_filter input")
    .attr("placeholder", "Search here...")


  $('[data-toggle="tooltip"]').tooltip();


  window.addEventListener('load', async () => {
    await initDataTable();
  });
  

  
});