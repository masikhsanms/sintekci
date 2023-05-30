<style>
    span.diskon.bg-red {
    font-size: 14px;
    background: red;
    border-radius: 5px;
    padding: 2px 4px;
    color: white;
}
</style>
<main>
    <div class="row">
        <div class="col-md-6">
            <div class="banner-utama">
                <img width="100%" src="<?= $rowdata->thumbnail; ?>" class="img-rounded" alt="products">
            </div>
            <div class="related-banner">
                <?php 
                $unserialize = unserialize( $rowdata->images );
                foreach($unserialize as $img){
                    echo '<img width="20%" src="'.$img.'" class="img-thumbnail" alt="products">';
                } 
                ?>
            </div>
            
        </div>
        <div class="col-md-6">
                <div class="content-detail">
                    <div class="title">
                        <h3><?= $rowdata->title; ?></h3>
                    </div>
                    <div class="price">
                        <h4><?= '$'.$rowdata->price; ?> <span class="diskon bg-red">-<?= $rowdata->discountPercentage.'%';?></span></h4>
                    </div>
                    <div class="rating">
                        <p style="font-style:italic;">Rating : <?= $rowdata->rating; ?></p>
                    </div>
                    <div class="stock">
                        <h5>STOK : <?= $rowdata->stock; ?></h5>
                    </div>
                    <div class="description">
                        <div class="card">
                            <div class="card-header">Detail Products :</div>
                            <div class="card-body">
                                <p><?= $rowdata->description; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="brand mt-4">
                        <p><small>Brand : <?= $rowdata->brand; ?></small><p>
                        <p style="font-style:italic;"><small>Category : <?= $rowdata->category; ?></small><p>
                    </div>
                </div>
        </div>
    </div>
</main>