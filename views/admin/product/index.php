<?php if (empty($products)): ?>
There is no product
<?php else: ?>
    <div id="product-list">
    <?php foreach($products as $product): ?>
        <div>
            <strong><?= htmlspecialchars($product['name']) ?></strong>
            <span><?= htmlspecialchars($product['price']) ?></span>
        </div>
    <?php endforeach; ?>
    </div>
<?php endif; ?>
