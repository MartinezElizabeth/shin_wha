<?php
// Incluye la configuración correctamente, asegurando que la ruta sea la adecuada
require 'bdconfig/config.php'; // Ruta relativa desde /acciones a /config/config.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Personas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body style="background-color: black; color: white;">

<div class="container my-5">
    <h1 class="text-center">Registro Para Reservaas</h1>
    <div class="text-center my-3">
        <!-- Botón para abrir el modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registroModal">
            Registrar Persona
        </button>
    </div>
</div>

<!-- Modal de registro -->
<div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: rgba(255, 255, 255, 0.8);">
            <div class="modal-header">
                <h5 class="modal-title" id="registroModalLabel">Registro de Persona</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Aquí se cambia la ruta en el action a 'acciones/register_person.php' -->
            <form action="register_person.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre_persona" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombre_persona" name="nombre_persona" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label for="cargo" class="form-label">Cargo (opcional)</label>
                        <input type="text" class="form-control" id="cargo" name="cargo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
