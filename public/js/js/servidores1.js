var campos_max = 10;   //max de 10 campos

        var x = 0;
        $('#add_field1').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (x < campos_max) {
                        $('#listas1').append('<div class="form-row">\
                        <div class="form-group col-md-3">\
                        <label for="inputEmail4">Procesador</label>\
                        <input type="number" class="form-control" name="procesadorstorage[]">\
                        </div>\
                        <div class="form-group col-md-3">\
                        <label for="inputEmail4">Cores</label>\
                        <input type="number" class="form-control" name="corestorage[]">\
                        </div>\
                        <div class="form-group col-md-3">\
                        <label for="inputEmail4">N° Servidores</label>\
                        <input type="number" class="form-control" name="numerostorage[]">\
                        </div>\
                        <div class="form-group col-md-3">\
                        <label for="inputEmail4">Memoria</label>\
                        <input type="number" class="form-control" name="memoriastorage[]">\
                        </div>\
                        <a href="#" class="remover_campo">Remover</a>\
                        </div>');
                        x++;
                }
        });
        // Remover o div anterior
        $('#listas1').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
        });
