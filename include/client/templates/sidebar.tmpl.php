<?php
$BUTTONS = isset($BUTTONS) ? $BUTTONS : true;
?>
    <div class="sidebar pull-right">
<?php /*if ($BUTTONS) { ?>
        <div class="front-page-button flush-right">
<p>
<?php
    if ($cfg->getClientRegistrationMode() != 'disabled'
        || !$cfg->isClientLoginRequired()) { ?>
            <a href="open.php" style="display:block" class="blue button"><?php
                echo __('Open New Request');?></a>
</p>
<?php } ?>
<p>
            <a href="view.php" style="display:block" class="green button"><?php
                echo __('Check Request Status');?></a>
</p>
        </div>
<?php } */

if ($cfg->getClientRegistrationMode() != 'disabled') { ?>
                    <a href="<?php echo $signin_url; ?>" style="display:block" class="blue button"><?php echo __('User Sign In'); ?></a><br/><br/><br/>

                    <a href="include/IT APPROVAL FROM NEW.pdf" target="_blank" style="display:block" class="green button"><?php echo __('IT Asset Form Template'); ?></a><br/>

                    <!-- <a href="include/Hyd_Business Cards_ Request form.pdf" target="_blank" style="display:block" class="green button"><?php echo __('Business Card Template'); ?></a><br/> -->

                    <a href="/mrr/form_visiting.php" target="_blank" style="display:block" class="green button"><?php echo __('Business Card Template'); ?></a><br/>

                    <a href="meetingRoomRequest.php" target="_blank" style="display:block" class="green button"><?php echo __('Meeting Room Request'); ?></a><br/>

                    <!-- <a href="http://192.168.4.9:8080/myportal/control/main" target="_blank" style="display:block" class="green button"><?php echo __('SFPL Intranet portal'); ?></a><br/> -->



             <?php   }
 ?>
        <div class="content"><?php
    $faqs = FAQ::getFeatured()->select_related('category')->limit(5);
    if ($faqs->all()) { ?>
            <section><div class="header"><?php echo __('Featured Questions'); ?></div>
<?php   foreach ($faqs as $F) { ?>
            <div><a href="<?php echo ROOT_PATH; ?>kb/faq.php?id=<?php
                echo urlencode($F->getId());
                ?>"><?php echo $F->getLocalQuestion(); ?></a></div>
<?php   } ?>
            </section>
<?php
    }
    $resources = Page::getActivePages()->filter(array('type'=>'other'));
    if ($resources->all()) { ?>
            <section><div class="header"><?php echo __('Other Resources'); ?></div>
<?php   foreach ($resources as $page) { ?>
            <div><a href="<?php echo ROOT_PATH; ?>pages/<?php echo $page->getNameAsSlug();
            ?>"><?php echo $page->getLocalName(); ?></a></div>
<?php   } ?>
            </section>
<?php
    }
        ?></div>
    </div>

