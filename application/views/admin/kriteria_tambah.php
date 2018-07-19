<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-6">
        <h3 class="text-danger">Input Kriteria</h3><hr>
            <form method="POST" action="<?php echo base_url('admin/kriteria/tambah');?>" id="form_input_kriteria">
                <div class="form-group">
                    <label>Kode Kriteria</label>
                    <input type="text" name="kode_kriteria" class="form-control" disabled value="<?php echo $kode_kriteria;?>">
                </div>
                <div class="form-group">
                    <label>Nama Kriteria</label>
                    <input type="text" name="nama_kriteria" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Atribut</label>
                    <select class="form-control" name="atribut">
                        <option value='' selected>Pilih Atribut</option>
                        <?php
                        $atribut = array('benefit'=>'benefit','cost'=>'cost');
                        foreach($atribut as $key => $value){
                        if($atribut==$key){
                            echo "<option value='$key' selected>$value</option>";
                        }else{
                            echo "<option value='$key'>$value</option>";
                        }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Bobot</label>
                    <input type="text" name="bobot" class="form-control" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <?php echo anchor('admin/kriteria','Kembali',array('class'=>'btn btn-default')); ?>
                </div>
            </form>
        </div>
        <div class="col-lg-5"></div>
    </div>
<script>
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
    $(document).ready(function() {
        $('#form_input_kriteria').validate({
            rules:{
                nama_kriteria : {
                    required : true,
                    maxlength : 20,
                    minlength : 1
                },
                atribut : {
                    required : true
                },
                bobot : {
                    required : true,
                    double : true
                }
            },messages : {
                nama_kriteria : {
                    required : 'Nama kriteria harus diisi',
                    maxlength : 'Panjang maksimal 20 karakter',
                    minlength : 'Panjang minimal 2 karakter'
                },
                atribut : {
                    required : 'Atribut harus dipilih dulu'
                },
                bobot : {
                    required : 'Bobot harus diisi',
                    double : 'Bobot harus angka'
                }
            },highlight : function(elm){
                $(elm).closest('.form-group').addClass('has-error');
            },unhighlight:function(elm){
                $(elm).closest('.form-group').removeClass('has-error');
            }
        });
    });
</script>
