<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <?php if($this->session->flashdata('pesan')):?>
        <div class="alert alert-success alert-dismissible">
                <a href="<?php echo site_url('periode');?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $this->session->flashdata('pesan');?></strong>
            </div>
            <?php endif;?>
            <h3 class="text-danger">Data Periode</h3><hr>
            <?php echo anchor('admin/periode/form_tambah','Tambah Data',array('class'=>'btn btn-primary')); ?>
            <br><br>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Kode Indikator</th>
                    <th>Tanggal</th>
                    <th>Opsi Aksi</th>
                </tr>
                <?php $no = 0; foreach($periode as $val){?>
                <tr>
                    <td><?=++$no?></td>
                    <td><?=$val['kode_periode']?></td>
                    <td><?=$val['tanggal']?></td>
                    <td>
                        <?php echo anchor('admin/periode/form_ubah/'.$val['kode_periode'],'Ubah',array('class'=>'btn btn-warning')); ?>
                        <a class="btn btn-danger delete_lead" href="<?php echo base_url('admin/periode/hapus/'.$val['kode_periode']);?>"> Hapus </a>
                    </td>
                </tr>
                <?php } ?>
            </table>
    </div>
    <div class="col-lg-1"></div>
 </div>



<!-- daftar periode -->
