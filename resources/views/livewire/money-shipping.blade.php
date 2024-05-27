<div>
    <table class="table table-summary">
        <tbody>
            <tr class="summary-subtotal">
                <td>Tổng tiền:</td>
                <td>{{number_format($total, 0, ',' , '.')}}đ</td>
            </tr><!-- End .summary-subtotal -->
            <tr class="summary-shipping">
                <td>Vận chuyển:</td>
                <td>&nbsp;</td>
            </tr>

            <tr class="summary-shipping-row">
                <td>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="free-shipping" name="shipping" wire:click="finalTotal(0)" @if(session('type_shipping') == 'Free Shipping') checked @endif class="custom-control-input">
                        <label class="custom-control-label" for="free-shipping">Miễn phí vận chuyển</label>
                    </div><!-- End .custom-control -->
                </td>
                <td>0đ</td>
            </tr>

            {{-- <tr class="summary-shipping-row">
                <td>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="standart-shipping" name="shipping" wire:click="finalTotal(10000)" @if(session('type_shipping') == 'Standart') checked @endif class="custom-control-input">
                        <label class="custom-control-label" for="standart-shipping">Bình thường</label>
                    </div><!-- End .custom-control -->
                </td>
                <td>10.000đ</td>
            </tr> --}}

            <tr class="summary-shipping-row">
                <td>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="express-shipping" name="shipping" wire:click="finalTotal(20000)" @if(session('type_shipping') == 'Express') checked @endif class="custom-control-input">
                        <label class="custom-control-label" for="express-shipping">Hỏa tốc</label>
                    </div><!-- End .custom-control -->
                </td>
                <td>20.000đ</td>
            </tr>

            

            <tr class="summary-total">
                <td>Tổng cộng: </td>
                <td>{{number_format($fnTotal, 0, ',', '.')}}đ</td>
            </tr><!-- End .summary-total -->
        </tbody>
    </table>
</div>
