<?php
    $topicsName='';
    $table_data='';
    session_start(); 

    if(!defined('OSTCLIENTINC')) die('Access Denied!');
    $info=array();
    if($thisclient && $thisclient->isValid()) {
        $info=array('name'=>$thisclient->getName(),
                'email'=>$thisclient->getEmail(),
                'location'=>$thisclient->getLocation(),
                'phone'=>$thisclient->getPhoneNumber());
    }

    $info=($_POST && $errors)?Format::htmlchars($_POST):$info;

    $form = null;
    if (!$info['topicId']) {
        if (array_key_exists('topicId',$_GET) && preg_match('/^\d+$/',$_GET['topicId']) && Topic::lookup($_GET['topicId']))
            $info['topicId'] = intval($_GET['topicId']);
        else
            $info['topicId'] = $cfg->getDefaultTopicId();
    }

    $forms = array();
    if ($info['topicId'] && ($topic=Topic::lookup($info['topicId']))) {
        foreach ($topic->getForms() as $F) {
            if (!$F->hasAnyVisibleFields())
                continue;
            if ($_POST) {
                $F = $F->instanciate();
                $F->isValidForClient();

            }
            $forms[] = $F;

        }
    }

?>

<head>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/filedrop.field.js?901e5ea"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!--<script>
$('#topicId').on('change', function(){
    alert(11111);
var topic_id = this.value;
$.ajax({
type: "POST",
url: "issuecategories.php",
data:'topic_id='+topiv_id,
success: function(result){
$("#issuecategory").html(result);
}
});
});
</script> -->
</head>

<?php  $user=$thisclient->getName();?>

<h1><?php echo __("Open New Request");?></h1>
<p><?php echo __('Dear '. $user .', please fill all the details below to provide timely and consistent Service by Support Groups.');?></p>
<form id="ticketForm" method="post" action="open.php" enctype="multipart/form-data">
    <?php csrf_token(); ?>
    <input type="hidden" name="a" value="open">
    <input type="hidden" name="issuecategory" value="">
    <input type="hidden" name="others" value="">

    <table width="800" cellpadding="1" cellspacing="0" border="0">
        <tbody>
            <?php
                if (!$thisclient) {
                    $uform = UserForm::getUserForm()->getForm($_POST);
                    if ($_POST) $uform->isValid();
                    $uform->render(false);
                }
            else { ?>
                <tr><td colspan="1"><hr /></td><td><hr /></td></tr>
                <tr><td colspan="1"><?php echo __('Email'); ?>:</td>
                    <td><?php echo $thisclient->getEmail(); ?></td>
                </tr>
                <tr><td colspan="1"><?php echo __('User'); ?>:</td>
                    <td><?php echo Format::htmlchars($thisclient->getName()); ?></td>
                </tr>

                <tr><td colspan="1"><?php echo __('Location'); ?>:</td>
                    <td><?php echo Format::htmlchars($thisclient->getLocation()); ?></td>
                </tr>


                <tr><td colspan="1"><?php echo __('Assets'); ?>:</td>
                    <td><a href="include/client/assetsdetails.php?user=<?php echo $thisclient->getName(); ?>" target="_blank" title="HI"><?php echo __('Your IT Asset Details'); ?></a></td>
                </tr>

            <?php } ?>
        </tbody>

        <tbody>
            <?php 
                //include( 'include/client/assetsdetails.php'); 
                //include(CLIENTINC_DIR . 'webdata.php');
            ?> 
        </tbody>

        <tbody>
            <tr>
                <td colspan="2"><hr />
                    <div class="form-header" style="margin-bottom:0.5em">
                        <b><?php echo __('Support Group'); ?></b>
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <select id="topicId" name="topicId" onchange="javascript:

                    var data = $(':input[name]', '#dynamic-form').serialize();
                            $.ajax(
                                'ajax.php/form/help-topic/' + this.value,
                                {
                                    data: data,
                                    dataType: 'json',
                                    success: function(json) {
                                        $('#dynamic-form').empty().append(json.html);
                                        $(document.head).append(json.media);
                                    }
                                                       
                                }
                            );


                    var topic_id = this.value;
                    //alert(topic_id);
                    $.ajax({
                        type:'POST',
                        url:'include/client/issuecategories.php',
                        //data:'topic_id',
                            data:{topic: topic_id},
                        async:'true',
                        success: function(options){
                            //alert(222222);
                        $('#issuecategory').append(options);
                        }




                    });

">
                        <option value="" selected="selected">&mdash; 
                            <?php echo __('Select Department');?> &mdash;
                        </option>
                        <?php
                        if($topics=Topic::getPublicHelpTopics()) {

                            foreach($topics as $id =>$name) {

                                echo sprintf('<option value="%d" %s>%s</option>',
                                    $id, ($info['topicId']==$id)?'selected="selected"':'', $name);
                            }
                        } else { ?>
                            <option value="0" ><?php echo __('General Inquiry');?>
                            </option>
                        <?php
                        } ?>
                    </select>
                    <font class="error">*&nbsp;<?php echo $errors['topicId']; ?>
                    </font>
                </td>
            </tr>

            <tr>
                <td colspan="2"><hr />
                <div class="form-header" style="margin-bottom:0.5em">
                        <b><?php echo __('Select Issue'); ?></b>
                </div>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <select id="issuecategory" name="issuecategory"  style="width:350px" onchange="javascript:

                    var issuecategory_id = this.value;
                    //alert(issuecategory_id);
                    if(issuecategory_id=='Others'){
                    //alert(22222); 

                    $('#others').removeAttr('disabled');
    }
    else {
    $('#others').attr('disabled', true);
    }
                   

                    

                    



                    ">
                    <option value="">--- Select Issue ---</option>
                        </select>
                    </div>
                </td>
            </tr>

          <!-- <tr>
                <td colspan="2"><hr />
                <div class="form-header" style="margin-bottom:0.5em">
                        <b><?php echo __('Other issue'); ?></b>
                </div>
                </td>
            </tr> -->


            <tr>
                <td colspan="2">
                

                <input size="20" disabled="disabled" type="text" id= "others" name="others" value=""/>

                
                </td>
            </tr> 





           <!-- <tr>
                <td colspan="1">
                    <?php echo __('Others'); ?>:
                </td>
                

            </tr> -->
<!-- <script type="text/javascript">
<?php echo "alert('message1');"; ?>
$( "select[name='topicId']" ).change(function () {
    var topicId = $(this).val();

    if(topicId) {

        $.ajax({
            url: "include/client/issuecategories.php",
            dataType: 'Json',
            data: {'topic_id':topicId},
            success: function(data) {
                $('select[name="issuecategory"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="issuecategory"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            }
        });

    }else{
        $('select[name="issuecategory"]').empty();
    }
});
</script> -->

       
        <!--<tr><th><hr /><b><?php print_r(  $topicsName ); ?></b></th></tr>-->
        </tbody>
        
        <tbody id="dynamic-form">
        
            <?php foreach ($forms as $form) {
             include(CLIENTINC_DIR . 'templates/dynamic-form.tmpl.php');
            } ?>
        </tbody>
    
       

        <tbody>
        <?php
            if($cfg && $cfg->isCaptchaEnabled() && (!$thisclient || !$thisclient->isValid())) {
                if($_POST && $errors && !$errors['captcha'])
                    $errors['captcha']=__('Please re-enter the text again');
            ?>
            <tr class="captchaRow">
                <td class="required"><?php echo __('CAPTCHA Text');?>:</td>
                <td>
                    <span class="captcha"><img src="captcha.php" border="0" align="left"></span>
                    &nbsp;&nbsp;
                    <input id="captcha" type="text" name="captcha" size="6" autocomplete="off">
                    <em><?php echo __('Enter the text shown on the image.');?></em>
                    <font class="error">*&nbsp;<?php echo $errors['captcha']; ?></font>
                </td>
            </tr>
            <?php
        } ?>
        <tr><td colspan=2>&nbsp;</td></tr>
        </tbody>
    </table>
    <hr/>
    <p class="buttons" style="text-align:center;">
        <input type="submit" value="<?php echo __('Submit Request');?>">
        <input type="reset" name="reset" value="<?php echo __('Reset');?>">
        <input type="button" name="cancel" value="<?php echo __('Cancel'); ?>" onclick="javascript:
            $('.richtext').each(function() {
                var redactor = $(this).data('redactor');
                if (redactor && redactor.opts.draftDelete)
                    redactor.deleteDraft();
            });
            window.location.href='index.php';">
    </p>
</form>
