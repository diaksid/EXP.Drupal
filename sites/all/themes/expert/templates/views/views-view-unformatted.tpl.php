<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
    <header class="pal-lightgreen">
        <h2><a class="h2title" href=""><?php print $title; ?> <span class="p11"><?php print t('view all >'); ?></span></a></h2>
    </header>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>
