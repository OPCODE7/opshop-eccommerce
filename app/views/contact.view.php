<?php

$to = "";
$subject = "";
$message = "";
$headers = "";

if (isset($_POST["sendEmail"])) {
    $to = "op.azoz@gmail.com";
    $subject = "Formulario de Contacto OPSHOP";
    $message = "De: {$_POST["name"]} {$_POST["email"]} {$_POST["mensaje"]}";
    $headers = "From: Formulario Contacto<op.azoz@gmail.com>";
}
?>


<div class="row">
    <div class="col-12 col-lg-7 col-md-8 m-auto mt-3">
        <div class="card">
            <div class="card-header">
                <h5>Contacto</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Mensaje</label>
                        <textarea name="message" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <?php
                    if (mail($to, $subject, $message, $headers)) {
                    ?>
                        <div class="row my-2">
                            <div class="col-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Correo Enviado</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="text-center">
                        <button type="sendEmail" class="btn btn-primary w-25">Enviar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>