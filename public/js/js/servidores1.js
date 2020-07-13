var campos_max1 = 4;   //max de 4 campos

        var y = 0;
        $('#add_field1').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (y < campos_max1) {
                        $('#listas1').append('<div class="form-row">\
                        <div class="form-group col-md-3">\
                        <label for="inputEmail4">Procesador</label>\
                        <input type="number" class="form-control" name="procesadorstorage[]" value="1">\
                        </div>\
                        <div class="form-group col-md-3">\
                        <label for="inputEmail4">Cores</label>\
                        <input type="number" class="form-control" name="corestorage[]" value="1">\
                        </div>\
                        <div class="form-group col-md-3">\
                        <label for="inputEmail4">N° Servidores</label>\
                        <input type="number" class="form-control" name="numerostorage[]" value="1">\
                        </div>\
                        <div class="form-group col-md-3">\
                        <label for="inputEmail4">Memoria</label>\
                        <input type="number" class="form-control" name="memoriastorage[]" value="1">\
                        </div>\
                        <a href="#" class="remover_campo">Remover</a>\
                        </div>');
                        y++;
                }
        });
        // Remover o div anterior
        $('#listas1').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
        });
