$(function () {
    // Alternar contraseña en texto sin formato si la casilla de verificación está seleccionada
    $("#show-password").click(function () {
        $(this).is(":checked") ? $("#password").prop("type", "text") : $("#Contraseña").prop("type", "Contraseña");
    });

    // Vista  para validar para la imagen y tamaño con un limite 5MB
    var _URL = window.URL || window.webkitURL;
    $("input:file[nombre='imagen']").change(function (e) {
        e.preventDefault();
        $preview = $('#' + e.target.name + '_preview');
        var file, img, reader;
        var maxWidth = $(this).attr('data-max-width');
        var maxHeight = $(this).attr('data-max-height');

        // Compruebe si el archivo de imagen está seleccionado o no en el cuadro de diálogo 
        if (e.target.files[0]) {
            file = e.target.files[0],
                reader = new FileReader();

            //  Comprobación del tamaño del archivo
            if ((file.size / 1024) / 1024 > 5) {
                // Sobre el tamaño del archivo
                alert('El límite superior de archivos que se pueden adjuntar es 5 MB.');
                cancelImage();
            } else {
                // Comprobar el ancho y el alto de la imagen
                img = new Image();
                img.onload = function () {
                    var width  = img.naturalWidth  || img.width;
                    var height = img.naturalHeight || img.height;
                    console.log(width + ':' + height);

                    if (width > maxWidth || height > maxHeight)
                    {
                        alert('Por favor cargue la imagen (tamaño recomendado : 160px × 160px)');
                        cancelImage();
                    }
                };
                img.src = _URL.createObjectURL(file);

                // Vista previa
                reader.onload = (function(file) {
                    return function(e) {
                        $preview.empty();
                        $preview.append($('<img>').attr({
                            src:   e.target.result,
                            width: '200px',
                            title: file.name,
                            class: 'img-circle elevation-2'
                        }));
                        $preview.next('p').addClass('show');
                    };
                }) (file);
                reader.readAsDataURL(file);
            }
        } else {
            // Abrir archivo, seleccionar modelo y no seleccionada
            cancelImage();
        }

        // Eliminar vista previa y valor a vacío
        function cancelImage() {
            $preview.empty();
            $('[name="' + e.target.name + '"]').val('');
            $preview.next('.delete-image-preview').removeClass('show');
            return false;
        }
    });
});

function deleteImagePreview(element) {
    $(element).parent('.image-preview-area').prevAll('input').val('');
    // $(element).prev('div').html('');
    $('#image_preview img.img-circle').attr("src", baseUrl + "/img/default-user.png");
    $(element).next('input').val(1);
    $(element).removeClass('show');
}
