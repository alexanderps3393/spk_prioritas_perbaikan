<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
            <h3 class="text-danger">Data Indikator</h3><hr>
            <form class="form-inline" id="kriteria">
                <div class="form-group">
                    <select class="form-control" name="kode_kriteria" onchange="this.form.submit()">
                        <option value="" >Pilih Kriteria</option>
                        <?php foreach($kriteria as $key => $row): ?>
                        <?php if($kode_kriteria==$row['kode_kriteria']){
                        echo "<option value=$row[kode_kriteria] selected='selected'>$row[nama_kriteria]</option>";
                        }else{
                        echo "<option value=$row[kode_kriteria]>$row[nama_kriteria]</option>";
                        }
                        ?>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                     <?php echo anchor('admin/indikator/form_tambah/'.$kode_kriteria,'Tambah',array('class'=>'btn btn-primary')); ?>
                </div>
            </form><br>
            <div id="select_periode"></div>
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Kriteria</th>
                        <th>Indikator</th>
                        <th>Nilai</th>
                        <th>Opsi Aksi</th>
                    </tr>
                    <?php $no = 0; foreach($relasi as $val){?>
                    <tr>
                        <td><?=++$no?></td>
                        <td><?=$val['kode_kriteria']?></td>
                        <td><?=$val['nama_indikator']?></td>
                        <td><?=$val['nilai']?></td>
                        <td>
                            <?php echo anchor('admin/indikator/form_ubah/'.$val['kode_indikator'].'/'.$kode_kriteria,'Ubah',array('class'=>'btn btn-warning')); ?>
                            <a class="btn btn-danger delete_lead" href="<?php echo base_url('admin/indikator/hapus/'.$val['kode_indikator'].'/'.$kode_kriteria);?>"> Hapus </a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
        </div>
        <div class="col-lg-1">
        </div>
   </div>
<script>
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
    $(document).ready(function() {
        $('#kriteria').validate({
            rules:{
                kode_kriteria : {
                    required : true,
                }
            },messages : {
                kode_kriteria : {
                    required : ' Kriteria belum dipilih'
                }
            },highlight : function(elm){
                $(elm).closest('.form-group').addClass('has-error');
            },unhighlight:function(elm){
                $(elm).closest('.form-group').removeClass('has-error');
            }
        });
    });
</script>
