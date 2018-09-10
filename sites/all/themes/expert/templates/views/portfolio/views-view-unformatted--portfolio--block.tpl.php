<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<div id="mycarousel">
    <div class="black"></div>
    <ul>
        <?php foreach ($rows as $id => $row): ?>
            <?php print $row; ?>
        <?php endforeach; ?>
    </ul>
    <div class="jcarousel-scroll">
        <a href="#" id="mycarousel-prev">Prev</a>
        <a href="#" id="mycarousel-next">Next</a>
    </div>
</div>

