<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<div class="page">
    <div class="main">
        <header>
            <div class="black"></div>
            <a href="<?php print $front_page; ?>"><img src="/images/logo.png"
                                                       width="187" height="99"
                                                       alt="" class="logo"/></a>
            <nav>
              <?php print render($page['first_menu']); ?>
            </nav>
            <h2>научно- исследовательский центр</h2>
            <address>
              <?php print CONTACTS_ADDRESS[0] ?><br>
              <?php print CONTACTS_ADDRESS[1] ?><br>
              <?php print CONTACTS_PHONE ?><br>
                <a target="_blank"
                   href="mailto://<?php print CONTACTS_EMAIL; ?>"
                ><?php print CONTACTS_EMAIL ?></a>
            </address>
        </header>
        <div class="black">
        </div>
        <div class="img"></div>
      <?php print render($page['s_search']); ?>
      <?php if (!empty($page['portfolio'])) : ?>
          <div id="mycarousel">
            <?php print render($page['portfolio']); ?>
          </div>
      <?php endif; ?>
        <div
                id="content"
                class="wrap"
        >
          <?php print render($title_prefix); ?>
            <h1><?php print render($title); ?></h1>
          <?php print render($title_suffix); ?>
          <?php print $messages; ?>
          <?php print render($tabs); ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?>
              <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
        </div>
      <?php if ($page['highlighted']) : ?>
          <div class="wrap">
            <?php print render($page['highlighted']); ?>
          </div>
      <?php endif; ?>
        <div class="wrap">
          <?php if (!empty($page['sidebar'])) : ?>
              <div id="mycarousel-aside">
                <?php print render($page['sidebar']); ?>
              </div>
          <?php endif; ?>
            <div class="content">
              <?php print render($page['content']); ?>
            </div>
        </div>
    </div>
</div>
<footer>
    <img src="/images/footer.png" width="229" height="388" alt=""
         class="footer-img"/>
    <div class="footer">
        <b style="float:right;padding:8px 12px;cursor: pointer"
           onclick="window.open('//dev.'+location.hostname,'_blank')">&copy;&nbsp;2017</b>
        <div class="footer-wrap">
            <div class="fl">
                <div>
                  <?php print render($page['second_menu']); ?>
                </div>
            </div>
            <div class="fl">
                <div>
                  <?php print render($page['third_menu']); ?>
                </div>
            </div>
        </div>
    </div>
  <?php print render($page['footer']); ?>
</footer>
