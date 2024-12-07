$(document).ready(function () {
    $('#id_mesa, #fecha_reserva').on('change', function () {
        const id_mesa = $('#id_mesa').val();
        const fecha_reserva = $('#fecha_reserva').val();

        if (id_mesa && fecha_reserva) {
            $.ajax({
                url: 'reservas_crud.php',
                type: 'POST',
                data: {action: 'check_availability', id_mesa, fecha_reserva},
                success: function (response) {
                    if (response === 'occupied') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Mesa Ocupada',
                            text: 'La mesa ya está reservada en esta fecha y hora. Intente otra hora.',
                        });
                    }
                }
            });
        }
    });
});
