<div x-data="{ open: false, content: '' }" 
     @open-modal.window="
        content = $event.detail;
        open = true;
        setTimeout(() => { 
            $('#transaksiModal').modal('show'); 
        }, 100);
     "
     x-ref="modal"
     x-cloak>

    <!-- Modal Bootstrap -->
    <div class="modal fade show" 
         tabindex="-1" 
         x-show="open"
         x-transition 
         x-init="$watch('open', value => value ? $('#transaksiModal').modal('show') : $('#transaksiModal').modal('hide'))"
         id="transaksiModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" @click="open = false">&times;</button>
                </div>
                <div class="modal-body">
                    <div x-html="content"></div>
                </div>
                <div class="modal-footer">                  
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
