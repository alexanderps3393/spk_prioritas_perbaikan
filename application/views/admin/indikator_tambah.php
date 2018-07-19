<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-6">
        <h3 class="text-danger">Input Indikator</h3><hr>
            <form method="POST" action="<?php echo base_url('admin/indikator/tambah');?>" id="form_indikator">
                <div class="form-group">
                    <select class="form-control" name="kode_kriteria">
                        <option value="" >Pilih Kriteria</option>
                            <?php foreach($kriteria as $key => $row): ?>
                            <?php if($this->uri->segment(4)==$row['kode_kriteria']){
                                echo "<option value=$row[kode_kriteria] selected='selected'>$row[nama_kriteria]</option>";
                            }else{
                                echo "<option value=$row[kode_kriteria]>$row[nama_kriteria]</option>";
                            }
                            ?>
                            <?php endforeach;?>
                    </select>
                </div>
                <input type="hidden" name="kode_indikator" >
                <div class="form-group">
                    <label>Indikator</label>
                    <input type="text" name="nama_indikator" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Nilai</label>
                    <input type="text" name="nilai" class="form-control" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <?php echo anchor('admin/indikator','Kembali',array('class'=>'btn btn-default')); ?>
                </div>
            </form>
    </div>
    <div class="col-lg-5"></div>
</div>
<script>
    $(document).ready(function() {
        $('#form_indikator').validate({
            rules:{
                kode_kriteria : {
                    required : true,
                },
                nama_indikator : {
                    required : true,
                    maxlength: 50,
                    minlength: 2
                },
                nilai : {
                    required : true,
                    double : true
                }
            },messages : {
                kode_kriteria : {
                    required : ' Kriteria harus dipilih',
                },
                nama_indikator : {
                    required : 'Nama Indikator harus diisi',
                    maxlength: 'Indikator maksimal 50 karakter',
                    minlength: 'Indikator minimal 2 karakter'
                },
                nilai : {
                    required : 'Nilai harus diisi',
                    double : 'Nilai harus angka'
                }
            },highlight : function(elm){
                $(elm).closest('.form-group').addClass('has-error');
            },unhighlight:function(elm){
                $(elm).closest('.form-group').removeClass('has-error');
            }
        });
    });
</script>
