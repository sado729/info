<!-- Edit Product Modal -->
<div class="modal fade form-make-standard" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content form-container">
            <div class="modal-header">
                <h5 class="modal-title">Elana Düzəliş Edin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="main-container" action="{{ route('product.edit',$product->slug) }}" method="post">
                    {{ csrf_field() }}
                    <label for="code">Davam etmək üçün elanınızın PIN-şifrəsini qeyd edin.
                        PIN-şifrəni, elan saytda dərc edilərkən <a href="{{ route('index') }}" title="{{ config('app.name') }}" target="_blank">{{ config('app.name') }}</a>-dan Sizə göndərilən məktubdan əldə edə bilərsiniz.</label>
                    <input type="text" placeholder="123456" name="code" id="code" value="{{ old('code') }}" maxlength="6">
                    <button type="submit" class="btn btn-success">Göndər</button>
                </form>
            </div>
        </div>
    </div>
</div>