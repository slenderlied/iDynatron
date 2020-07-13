var campos_max = 4;   //max de 4 campos

        var x = 0;
        $('#add_field').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (x < campos_max) {
                        $('#listas').append('<div class="form-row">\
                        <div class="form-group col-md-3">\
                        <label for="inputEmail4">Procesador</label>\
                        <input type="number" class="form-control" name="servidorprocesador[]" value="1">\
                        </div>\
                        <div class="form-group col-md-3">\
                        <label for="inputEmail4">Cores</label>\
                        <input type="number" class="form-control" name="coreservidor[]" value="1">\
                        </div>\
                        <div class="form-group col-md-3">\
                        <label for="inputEmail4">N° Servidores</label>\
                        <input type="number" class="form-control" name="numeroservidor[]" value="1">\
                        </div>\
                        <div class="form-group col-md-3">\
                        <label for="inputEmail4">Memoria</label>\
                        <input type="number" class="form-control" name="memoriaservidor[]" value="1">\
                        </div>\
                        <a href="#" class="remover_campo">Remover</a>\
                        </div>');
                        x++;
                }
        });
        // Remover o div anterior
        $('#listas').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
        });

