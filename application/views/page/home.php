<main>
    <div class="row">
        <div class="col-md-12">
            <div class="content">
                <table class="table table-bordered table-hover dt-table">
                    <thead>
                        <tr>
                            <th>Thumbail</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Diskon</th>
                            <th>Rating</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Images</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach($data as $row):
                        ?>
                        <tr>
                            <td><img src="<?= $row->thumbnail; ?>" class="img-thumbnail" alt="products"></td>
                            <td><?= $row->title; ?></td>
                            <td><?= $row->description; ?></td>
                            <td><?= $row->price; ?></td>
                            <td><?= $row->discountPercentage; ?></td>
                            <td><?= $row->rating; ?></td>
                            <td><?= $row->brand; ?></td>
                            <td><?= $row->category; ?></td>
                            <td>
                                <?php
                                    $unserialize = unserialize( $row->images );
                                    foreach($unserialize as $img){
                                        echo '<img width="50%" src="'.$img.'" class="img-thumbnail" alt="products">';
                                    } 
                                ?>
                             </td>
                            <td >
                                <a href="<?= base_url('chome/edit/').$row->id; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= base_url('chome/lihat/').$row->id; ?>" class="btn btn-danger btn-sm btn-lihatdata">Lihat</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>