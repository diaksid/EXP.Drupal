<?php

/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be 'block-user'.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see template_process()
 *
 * @ingroup themeable
 */
function getClass( $path, $class = '' )
{
	$class .= $class ? ' ' : '';
	switch ( true )
	{
	  case $_SERVER['REQUEST_URI'] === $path :
	    $class .= 'active';
	    break;
	  case strpos( $_SERVER['REQUEST_URI'], $path ) === 0 :
	    $class .= 'parent';
	    break;
	  default:
	    $class = trim( $class );
	}
	return $class ? ' class="' . $class . '"' : '';
}

?>

<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <nav id="navline">
    <ul class="menu">
      <li<?php echo getClass( '/tolerances', 'expend' ) ?>>
        <a href="/tolerances">Допуски &nbsp;&#9660;</a>

        <ul class="menu">
          <li class="expend<?php echo $_SERVER['REQUEST_URI'] == '/tolerances' ? ' active' : '' ?>">
            <a href="/tolerances">Допуски</a>
          </li>
          <li<?php echo $_SERVER['REQUEST_URI'] == '/tolerances/certificates' ? ' class="active"' : '' ?>>
            <a href="/tolerances/certificates">Сертификаты</a>
          </li>
          <li<?php echo $_SERVER['REQUEST_URI'] == '/tolerances/attestations' ? ' class="active"' : '' ?>>
            <a href="/tolerances/attestations">Аттестаты</a>
          </li>
          <li<?php echo $_SERVER['REQUEST_URI'] == '/tolerances/experts' ? ' class="active"' : '' ?>>
            <a href="/tolerances/experts">Эксперты</a>
          </li>
          <li<?php echo $_SERVER['REQUEST_URI'] == '/tolerances/patents' ? ' class="active"' : '' ?>>
            <a href="/tolerances/patents">Патенты</a>
          </li>
        </ul>
      </li>

      <li<?php echo getClass( '/work' ) ?>>
        <a href="/work">Портфолио</a>
      </li>

        <li<?php echo getClass( '/article' ) ?>>
        <a href="/article">Новости</a>
      </li>

      <!--li<?php echo getClass( '/publications' ) ?>>
        <a href="/publications">Публикации</a>
      </li-->

      <li<?php echo $_SERVER['REQUEST_URI'] == '/partners' ? ' class="active"' : '' ?>>
        <a href="/partners">Партнёры</a>
      </li>

        <li<?php echo getClass( '/feedback' ) ?>>
            <a href="/feedback">Отзывы</a>
        </li>

      <li<?php echo $_SERVER['REQUEST_URI'] == '/contact' ? ' class="active"' : '' ?>>
        <a href="/contact">Контакты</a><br>
      </li>
    </ul>
  </nav>

  <?php print render($title_prefix); ?>
<?php if ($block->subject): ?>
  <h2<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
<?php endif;?>
  <?php print render($title_suffix); ?>
  <?php print $content ?>
</div>

