<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
   <?php print $title; ?>
<?php endif; ?>
<div id="mycarousel-foto">
    <ul>
        <?php foreach ($rows as $id => $row): ?>
            <?php print $row; ?>
        <?php endforeach; ?>
    </ul>
    <div class="jcarousel-scroll">
        <a href="#" id="mycarousel-prev" class="noact">Prev</a>
        <a href="#" id="mycarousel-next">Next</a>
    </div>
</div>