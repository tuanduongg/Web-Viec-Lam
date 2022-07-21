<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-default">
        <div class="modal-content" style="margin-top: 20%;">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" >
                <div class="content-profile">
                    <form action="" id="form-update" method="POST">
                        @csrf
                        @method('PUT')
                        <p> <b>Họ Tên:</b>
                            <span id="span-name"></span>
                            <input class="single-input" type="text" name="name">
                        </p>
                        <p> <b>Email:</b>
                            <span id="span-email"></span>
                            <input class="single-input" style="display: none;" type="text" id=""
                                name="email">
                        </p>
                        <p> <b>SĐT:</b>
                            <span id="span-phone"></span>
                            <input class="single-input" type="number" id="" name="phone">
                        </p>
                        <p> <b>Địa Chỉ:</b>
                            <span id="span-address"></span>
                            <input class="single-input" type="text" id="" name="address">
                        </p>
                        <p> <b>Ngày Tham Gia:</b>
                            <span id="span-created"></span>
                        </p>
                        <p><button class="genric-btn primary-border">Đổi Mật Khẩu</button></p>
                    </form>
                </div>
                <div id="modal-job-items">
                    
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="genric-btn default" data-dismiss="modal">Đóng</button>
                <button type="button" id="btn-edit" class="genric-btn primary">Sửa Thông Tin</button>
                <button type="button" id="btn-update" class="genric-btn primary">Lưu</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
