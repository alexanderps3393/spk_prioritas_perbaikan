<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Laporan Data Kerusakan</div>
            <div class="panel-body">
                <h3 class="text-danger">Cetak Laporan Kerusakan</h3><hr>
                <form class="form-inline" action="<?php echo base_url('ka_instalasi/laporan/cetak');?>" method="post" target="_blank">
                    <div class="input-group mb">
                        <input type="date" name="dari" class="form-control" required>
                    </div>
                    <div class="input-group mb"><h3>s.d</h3></div>
                    <div class="input-group mb">
                        <input type="date" name="sampai" class="form-control" required>
                    </div>
                    <div class="input-group mb">
                        <button type="submit" class="btn btn-danger">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
