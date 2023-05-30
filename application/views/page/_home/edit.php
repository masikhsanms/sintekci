<style>
    .required{
        color:red;
    }
</style>
<main>
    <div class="row">
        <div class="col-md-12">
            <form id="frm-editproduct">
                
                <input type="hidden" name="hiddenid" value="<?= $rowdata->id; ?>">

                <div class="form-group mb-3">
                    <label>Title <span class="required">*</span></label>
                    <input value="<?= $rowdata->title ?? ''; ?>" type="text" placeholder="Ketikan disini ... " autocomplete="off" class="form-control" name="title" required>
                </div>
                <div class="form-group mb-3">
                    <label>Stock <span class="required">*</span></label>
                    <input value="<?= $rowdata->stock ?? ''; ?>" type="number" placeholder="Ketikan disini ... " autocomplete="off" class="form-control" name="stock" required>
                </div>
                <div class="form-group mb-3">
                    <label>Price <span class="required">*</span></label>
                    <input value="<?= $rowdata->price ?? ''; ?>" type="number" step="any" min="0" placeholder="Ketikan disini ... " autocomplete="off" class="form-control" name="price" required>
                </div>
                <div class="form-group mb-3">
                    <label>Disount <span class="required">*</span></label>
                    <input value="<?= $rowdata->discountPercentage ?? ''; ?>" type="number" step="any" min="0" placeholder="Ketikan disini ... " autocomplete="off" class="form-control" name="discountPercentage" required>
                </div>
                <div class="form-group mb-3">
                    <label>Brand <span class="required">*</span></label>
                    <input value="<?= $rowdata->brand ?? ''; ?>" type="text" placeholder="Ketikan disini ... " autocomplete="off" class="form-control" name="brand" required>
                </div>
                <div class="form-group mb-3">
                    <label>Category <span class="required">*</span></label>
                    <input type="text" value="<?= $rowdata->category ?? ''; ?>" placeholder="Ketikan disini ... " autocomplete="off" class="form-control" name="category" required>
                </div>
                <div class="form-group mb-3">
                    <label>Description <span class="required">*</span></label>
                    <textarea value="<?= $rowdata->description ?? ''; ?>" required name="description" cols="30" rows="5" class="form-control"><?= $rowdata->description ?? ''; ?></textarea>
                </div>
                <div class="form-group" style="text-align:right;">
                    <button type="button" onclick="history.back()" class="btn btn-warning" >Batal</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</main>