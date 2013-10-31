<?php
    $message = '';
    if (!empty($_POST['aam_submitted'])) {
        $aam_pid = (!empty($_POST['aam_pid'])) ? $_POST['aam_pid'] : '';
        if (!$aam_pid) {
            $message = _("ERROR:  You must enter a value for Publisher Key!", 'aam');
        } else {
            update_option('aam_pid', $aam_pid);
            $message = 'Settings updated';
        }


    }
    if ($message) {
        print '<div id="message" class="updated below-h2">'. $message . '</div>';
    }

    $aam_api_server = (!empty($_POST['aam_api_server'])) ? $_POST['aam_api_server'] : '';
        if (update_option('aam_api_server', $aam_api_server)) {
            $message = 'Settings updated';
        }

    $aam_pid = get_option('aam_pid');
    $aam_api_server = get_option('aam_api_server');

?>
<form name="aam_form" method="post" action="<?php print str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
<div class='wrap'>   
    <h2><?php _e('AdsNative Analytics', 'aam'); ?></h2>
    <ul>
        <li>
            <label for='aam_api_server'>Analytics Script URL:</label>
            <input type="text" name="aam_api_server" value="<?php print $aam_api_server; ?>" style="width:200px;" />
        </li>
        <li>
            <div id="aam_controls">
                <input type="hidden" name="aam_submitted" value="1" />
                <label for="aam_submitted"><?php _e('Enter your Publisher Key (Key): ', 'aam'); ?></label>
                <input type="text" name="aam_pid" value="<?php print $aam_pid; ?>" style="width:200px;" />
                <?php if (!empty($aam_pid) && isset($aam_pid)) { ?>
                    <br />
                    <span style="color:red;font-size:14px;">
                        * Do not change this unless you are absolutely sure you know what you are doing!
                    </span>
                <?php } ?>
            </div>
        </li>

        <li><input class='button-primary' type="submit" name="Submit" value="<?php _e('Save', 'aam'); ?>" /></li>
    </ul>
</div>
</form>
