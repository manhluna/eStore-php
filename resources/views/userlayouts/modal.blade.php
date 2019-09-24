<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('order') }}" method="post" id="orderForm">
            @csrf()
            <div class="modal-content">
                <div class="modal-header" style="background-color: #84c639;">
                    <h5 style="font-size: 22px;" class="modal-title" id="exampleModalLabel">Giỏ hàng của bạn</h5>
                    <button style="margin-top: -52px;font-size: 36px;margin-right: -14px;" type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="item"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Giỏ hàng</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>