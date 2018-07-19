<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
    <?php if($this->session->flashdata('pesan')):?>
            <div class="alert alert-success alert-dismissible">
                <a href="<?php echo site_url('kriteria');?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $this->session->flashdata('pesan');?></strong>
            </div>
            <?php endif;?>
            <h3 class="text-danger">Data Kriteria</h3><hr>
            <?php echo anchor('admin/kriteria/form_tambah','Tambah Data',array('class'=>'btn btn-primary')); ?>
            <br><br>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Kode Kriteria</th>
                    <th>Nama Kriteria</th>
                    <th>Atribut</th>
                    <th>Bobot</th>
                    <th>Opsi Aksi</th>
                </tr>
                <?php $no = 0; foreach($kriteria as $val){?>
                <tr>
                    <td><?=++$no?></td>
                    <td><?=$val['kode_kriteria']?></td>
                    <td><?=$val['nama_kriteria']?></td>
                    <td><?=$val['atribut']?></td>
                    <td><?=$val['bobot']?></td>
                    <td>
                        <?php echo anchor('admin/kriteria/form_ubah/'.$val['kode_kriteria'],'Ubah',array('class'=>'btn btn-warning')); ?>
                        <a class="btn btn-danger delete_lead" href="<?php echo base_url('admin/kriteria/hapus/'.$val['kode_kriteria']);?>"> Hapus </a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="col-lg-1"></div>
</div>
