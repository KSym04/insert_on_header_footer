<?php
/**
 * Insert on Header & Footer Admin Panel
 */
?>
<h2 class="render-title"><?php _e( 'Insert on Header & Footer', 'insert_on_header_footer' ); ?></h2>
<form id="insert_on_header_footer-form" action="<?php echo osc_admin_render_plugin_url( 'insert_on_header_footer/admin.php' ); ?>" method="post">
    <input type="hidden" name="option" value="settings_saved" />
    <fieldset>
        <div class="form-horizontal">
            <div class="form-row">
                <div class="form-label">
                    <?php _e( 'Header Code', 'insert_on_header_footer' ); ?>
                </div>
                <div class="form-controls">
                    <textarea name="header_code" class="iohf-textarea"><?php echo osc_get_preference( 'header_code', 'plugin-insert_on_header_footer' ); ?></textarea>
                    <p class="iohf-helpinfo"><?php _e( 'This code/script will appear inside head tag', 'insert_on_header_footer' ); ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">
                    <?php _e( 'Footer Code', 'insert_on_header_footer' ); ?>
                </div>
                <div class="form-controls">
                    <textarea name="footer_code" class="iohf-textarea"><?php echo osc_get_preference( 'footer_code', 'plugin-insert_on_header_footer' ); ?></textarea>
                    <p class="iohf-helpinfo"><?php _e( 'This code/script will appear before closing body tag', 'insert_on_header_footer' ); ?></p>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" value="Save" class="btn btn-submit">
            </div>
        </div><!-- form-horizontal -->
    </fieldset>
</form>
