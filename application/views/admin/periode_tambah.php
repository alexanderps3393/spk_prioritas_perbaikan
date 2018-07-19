<div class="row">
    <div class="col-lg-1"></div>
        <div class="col-lg-6">
            <h3 class="text-danger">Input Periode</h3><hr>
                <form method="POST" action="<?php echo base_url('admin/periode/tambah');?>" id="form_input_periode">
                    <div class="form-group">
                        <label>Kode Periode</label>
                        <input type="text" name="kode_periode" class="form-control" disabled value="<?php echo $kode_periode;?>">
                    </div>
                    <div class="form-group">
                        <label>Periode</label>
                        <input id="tgl" name="tanggal" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <?php echo anchor('admin/periode','Kembali',array('class'=>'btn btn-default')); ?>
                    </div>
                </form>
        </div>
    <div class="col-lg-5"></div>
</div>
<script>
    $(document).ready(function() {
        $('#form_input_periode').validate({
            rules:{
                tanggal: {
                    required: true
                }
            },messages:{
                tanggal:{
                    required:'tanggal harus diisi'
                }
            },highlight:function(elm){
                $(elm).closest('.form-group').addClass('has-error');
            },unhighlight:function(elm){
                $(elm).closest('.form-group').removeClass('has-error');
            }
        });
    });
</script>

<!-- form tambah periode  -->
