// include ("database/mongodb.php");
var campos_max = 4;   //max de 4 campos
        var x = 0;
        $('#add_field').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (x < campos_max) {
                        $('#listas').append('<div class="form-row">\
                        <div class="form-group col-md-3">\
                        <label for="inputEmail4">Memoria</label>\
                        <select name="nombrehardware[]" lass="form-control" >\
                         <?php  foreach ($cursor as $row) { ?>\
                       <option value="<?php echo $row -> nombrehardware; ?>"\
                       "<?php echo $row -> nombrehardware; ?>" \
                       </option> \
                       "<?php } ?>"\
                       </select> \
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

       