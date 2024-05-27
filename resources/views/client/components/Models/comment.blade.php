<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentModalLabel">Đánh giá</h5>
                {{-- <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <form style="margin: 8px 12px" id="commentForm" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name" />
                    </div> --}}
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nhận xét:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                    <div class="mb-1">
                        <label for="fileInput" class="fileLabel mb-0">
                            <div class="d-flex justify-content-center alight-itemscenter">Đăng ảnh <i class="fa-solid fa-camera ml-2"></i></div>
                        </label>
                        <input type="file" id="fileInput" class="fileInput" multiple />
                    </div>
                
                    <div class="imagePreview carousel slide">
                        <div class="carousel-inner">
                            <!-- Các ảnh sẽ được thêm vào đây -->
                        </div>
                        <a class="carousel-control-prev d-none" href=".imagePreview" role="button" data-slide="prev">
                            <span class="icon"><i class="fa-solid fa-angle-left"></i></span>
                        </a>
                        <a class="carousel-control-next d-none" href=".imagePreview" role="button" data-slide="next">
                            <span class="icon"><i class="fa-solid fa-angle-right"></i></span>
                        </a>
                    </div>
                    
                    <label for="input-radio" class="col-form-label">Rating:</label>
                    <div class="star-rating">
                        <input type="radio" id="star1" name="rating" value="5" checked><label for="star1">&#9733;</label>
                        <input type="radio" id="star2" name="rating" value="4"><label for="star2">&#9733;</label>
                        <input type="radio" id="star3" name="rating" value="3"><label for="star3">&#9733;</label>
                        <input type="radio" id="star4" name="rating" value="2"><label for="star4">&#9733;</label>
                        <input type="radio" id="star5" name="rating" value="1"><label for="star5">&#9733;</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModalComment" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </div>
</div>
</div>
