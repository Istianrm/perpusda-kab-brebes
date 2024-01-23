<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Nama Kategori tidak boleh Kosong</div>');
                redirect('buku/ubahkategori/' . $k['id']);
            } ?>
            <?php foreach ($kategori as $k) { ?>


                <form action="<?= base_url('buku/ubahkategori') ?>" method='post'>
                    <div class='form_group'>
                        <input name='id' type='hidden' class='form-control' value="<?= $kategori['id'] ?>">
                        <input name='kategori' class='form-control' value="<?= $kategori['kategori'] ?>">
                        <?= form_error('kategori'); ?>
                    </div>
                    <div class="form-group row justify-content-left mt-2">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btnprimary">Ubah</button>
                            <button class="btn btn-dark" onclick="window.history.go(-1)"> Kembali</button>
                        </div>
                    </div>
                </form>

            <?php } ?>
        </div>
    </div>
</div>