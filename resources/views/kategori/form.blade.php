<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="Modal-form">
    <div class="modal-dialog" role="document">
       <form action="" method="POST" class="form-horizontal">
        @csrf
        @method('post')
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="from-group row">
                    <label for="nama_kategori" class="col-md-2 col-md-offset-1 control-label" >Kategori</label>
                    <div class="col md-6">
                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required autofocus>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button  class="btn btn-sm btn-flat btn-primary">Simpan</button>
                <button type="button" class="btn btn-sm btn-flat btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
       </form>
    </div>
</div>
