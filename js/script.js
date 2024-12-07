// script.js
function clearForm() {
    $('#mesaForm')[0].reset();
    $('#id_mesa').val('');
}

function editMesa(data) {
    $('#id_mesa').val(data.id_mesa);
    $('#numero_mesa').val(data.numero_mesa);
    $('#id_categoria').val(data.id_categoria);
    $('#capacidad').val(data.capacidad);
    $('#ubicacion').val(data.ubicacion);
    $('#estado').val(data.estado);
}
