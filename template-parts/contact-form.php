
<section class="contact">

    <div class="contact-title">
        <img src="<?= get_template_directory_uri(); ?>/assets/images/icons/lapiz.svg" alt="icon blog">
    </div>

    <span class="contact-description">
        Contamos con el mejor equipo para optimizar tu negocio. <strong>Cuéntanos en que podemos ayudarte</strong>
    </span>

    <div class="contact-form">
        <div class="alert alert-success">Se ha enviado el formulario satisfactoriamente</div>
        <form class="kulturai-form">
            <div class="kulturai-form-group">
                <input required name="name" type="text" placeholder="Nombre" class="kulturai-form-control" />
            </div>
            <div class="kulturai-form-group">
                <input required name="email" type="email" placeholder="Email" class="kulturai-form-control" />
            </div>
            <div class="kulturai-form-group">
                <input required name="subject" type="text" placeholder="Asunto" class="kulturai-form-control" />
            </div>
            <div class="kulturai-form-group">
                <textarea required name="message" rows="5" placeholder="Mensaje" class="kulturai-form-control"></textarea>
            </div>
            <div>
                <input type="submit" placeholder="Asunto" class="btn btn-red" />
            </div>
        </form>
    </div>
</section>