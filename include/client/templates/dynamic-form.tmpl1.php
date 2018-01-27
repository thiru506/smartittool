<?php
    // Form headline and deck with a horizontal divider above and an extra
    // space below.
    // XXX: Would be nice to handle the decoration with a CSS class
    ?>
    <tr><td colspan="2"><hr />
    <div class="form-header" style="margin-bottom:0.5em">
    <h3><?php echo Format::htmlchars($form->getTitle()); ?></h3>
    <div><?php echo Format::display($form->getInstructions()); ?></div>
    </div>
    </td></tr>
<tr><hr /><b><?php echo __('acts'); ?></b></tr>
    <tr><th><hr /><b><?php echo __('Issue Category-ACTS'); ?></b></th>

            <td colspan="2"><hr />
                <select id="issuecategory" name="issuecategory" onchange="alert(this.value)">
                    <option value="" selected="selected">&mdash; 
                        <?php echo __('Select Category');?> &mdash;
                    </option>
                
                    

                    <option value="1"><?php echo __('Printer Issue');?></option>
                    <option value="2"><?php echo __('OS Issue');?></option>
                    <option value="3"><?php echo __('Mouse Issue');?></option>
                    <option value="4"><?php echo __('Keyboard Issue');?></option>
                    <option value="5"><?php echo __('Tally Issue');?></option>
                    <option value="6"><?php echo __('MS Office Issue');?></option>
                    <option value="7"><?php echo __('Kingsoft Issue');?></option>
                    <option value="8"><?php echo __('Outlook Issue');?></option>
                    <option value="9"><?php echo __('New Software Installation');?></option>
                    <option value="10"><?php echo __('Network Issue');?></option>

                    <option value="11"><?php echo __('SR - Punching issue');?></option>
                    <option value="12"><?php echo __('SR - Attendance related issues');?></option>
                    <option value="13"><?php echo __('SR - Not applying leaves');?></option>
                    <option value="14"><?php echo __('SR - Pay slip');?></option>
                    <option value="15"><?php echo __('SR - Request  letter from HR for Employees loan');?></option>
                    <option value="16"><?php echo __('SR - Biometric issues');?></option>
                    <option value="17"><?php echo __('SR - Leave Balance, LOP’s');?></option>
                    <option value="18"><?php echo __('SR - For Late coming deduction');?></option>
                    <option value="19"><?php echo __('SR - New mobile sim issue');?></option>
                    <option value="20"><?php echo __('SR - Personal information change request');?></option>
                    <option value="21"><?php echo __('SR - Claims – Group mediclaim and group personal accident');?></option>
                    <option value="22"><?php echo __('SR - New business card request');?></option>

                    <option value="23"><?php echo __('AC repair and maintenance');?></option>
                    <option value="24"><?php echo __('Manpower  related issues of admin staff');?></option>
                    <option value="25"><?php echo __('Plumbing issues');?></option>
                    <option value="26"><?php echo __('Electrical issues');?></option>
                    <option value="27"><?php echo __('Wash room issues');?></option>
                    <option value="28"><?php echo __('Carpentry issues');?></option>
                    <option value="29"><?php echo __('CCTV not clear');?></option>
                    <option value="30"><?php echo __('Guest house issues');?></option>
                    <option value="31"><?php echo __('Telephones & intercom');?></option>
                    <option value="32"><?php echo __('Coffee and tea vending machines');?></option>
                    <option value="33"><?php echo __('Office upkeep');?></option>
                    <option value="34"><?php echo __('Generator issues');?></option>
                    <option value="35"><?php echo __('Vehicle issues');?></option>
                    <option value="36"><?php echo __('First Aid');?></option>
                    <option value="37"><?php echo __('Intercom extension to audit team');?></option>
                    
                    <option value="38"><?php echo __('others');?></option>
                    
                
                </select>
                <font class="error">*&nbsp;<?php echo $errors['topicId']; ?></font>
            </td>
        </tr>

    <?php
    // Form fields, each with corresponding errors follows. Fields marked
    // 'private' are not included in the output for clients
    global $thisclient;
    //if(this.value=='38'){
    foreach ($form->getFields() as $field) {
        if (isset($options['mode']) && $options['mode'] == 'create') {
            if (!$field->isVisibleToUsers() && !$field->isRequiredForUsers())
                continue;
        }
        elseif (!$field->isVisibleToUsers() && !$field->isEditableToUsers()) {
            continue;
        }
        ?>

        
        <tr>
            <td colspan="2" style="padding-top:10px;">
            <?php if (!$field->isBlockLevel()) { ?>
                <label for="<?php echo $field->getFormName(); ?>">

                <span class="<?php
                    if ($field->isRequiredForUsers()) echo 'required'; ?>">
                <?php echo Format::htmlchars($field->getLocal('label'));
                 ?>
            <?php if ($field->isRequiredForUsers()) { ?>
                <span class="error">*</span>
            <?php }
            ?></span>

            <?php
                if ($field->get('notes')) { ?>
                    <br /><em style="color:gray;display:inline-block"><?php
                        echo Format::viewableImages($field->getLocal('notes')); ?></em>
                <?php
                } ?>
            <br/>
            <?php
            }
            $field->render(array('client'=>true));
            ?></label><?php
            foreach ($field->errors() as $e) { ?>
                <div class="error"><?php echo $e; ?></div>
            <?php }
            $field->renderExtras(array('client'=>true));
            ?>
            </td>
        </tr>

        

        

        <?php
    }

//}
?>
