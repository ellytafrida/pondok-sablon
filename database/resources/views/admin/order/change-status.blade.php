<div class="modal fade" id="changeStatusModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div id="modalHeader" class="modal-header">
                <h4 class="modal-title fs-5" id="modalTitle"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="changeStatusForm" action="orders/change-status" method="POST">
                <input type="hidden" id="id" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-2">
                                <select id="status" class="form-control" name="status">
                                    <option value="Belum Dibayar">Belum Dibayar</option>
                                    <option value="Sudah Dibayar">Sudah Dibayar</option>
                                    <option value="Sedang Diproses">Sedang Diproses</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                                <span id="statusError" class="invalid-feedback"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                    <button id="button" type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
