<table class="table align-middle">
    <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th colspan="2">In cart</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['books'] as $book) : ?>
            <tr <?php if($book->isInCart) { ?> class="table-active" <?php } ?>>
                <td><?php $htmlOut($book->title); ?></td>
                <td><?php $htmlOut($book->author); ?></td>
                <td><?php $htmlOut($book->price); ?></td>
                <td><?php $htmlOut($book->cartCount) ?></td>
                <td>
                    <div class="d-flex">
                        <?php $beginForm('Cart', 'Add', ['bid' => $book->id, 'ctx' => $data['context']], 'post', 'form-inline'); ?>
                            <button class="btn btn-link">Add</button>
                        <?php $endForm(); ?>

                        <?php $beginForm('Cart', 'Remove', ['bid' => $book->id, 'ctx' => $data['context']], 'post', 'form-inline'); ?>
                        <button class="btn btn-link" <?php if(!$book->isInCart){?> disabled <?php } ?>>Remove</button>
                        <?php $endForm(); ?>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
