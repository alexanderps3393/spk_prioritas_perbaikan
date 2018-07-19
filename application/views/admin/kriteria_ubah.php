<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-6">
        <h3 class="text-danger">Ubah Kriteria</h3><hr>
            <form method="POST" action="<?php echo base_url('admin/kriteria/ubah')?>" id="form_ubah_kriteria">
                <div class="form-group">
                    <label>Kode Kriteria</label>
                    <input type="text" name="kode_kriteria" class="form-control" value="<?php echo $row['kode_kriteria']?>">
                </div>
                <div class="form-group">
                    <label>Nama Kriteria</label>
                    <input type="text" name="nama_kriteria" class="form-control" value="<?php echo $row['nama_kriteria']?>">
                </div>
                <div class="form-group">
                    <label>Atribut</label>
                    <select class="form-control" name="atribut">
                        <option value=''>Pilih Atribut</option>
                            <?php
                                foreach($atribut as $key => $value){
                                    if($row['atribut']==$key){
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
                    <input type="text" name="bobot" class="form-control" value="<?php echo $row['bobot']?>">
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
        $('#form_ubah_kriteria').validate({
            rules:{
                nama_kriteria : {
                    required : true,
                    maxlength : 20,
                    minlength : 2
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
