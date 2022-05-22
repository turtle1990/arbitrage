
<?php
$api_url = "https://mihanblockchain.com/wp-content/cache/min/1/9069ab69b4e0f726bcdb58de3e9a2130.js";

// $response_data = json_decode(file_get_contents($api_url));
$response_data = file_get_contents($api_url);
echo "<pre>";
var_dump ($response_data);
echo "</pre>";

if ($response_data){
    echo "Find It";
}


// print_r  (strcasecmp('ramzinex' , "Ramzinex"));

?>
<script src="https://code.jquery.com/jquery-3.0.0.js" ></script>
<script src="https://code.jquery.com/jquery-migrate-3.3.0.js" ></script>

<script type="text/javascript" id="wpdiscuz-combo-js-js-extra">
/* <![CDATA[ */
var wpdiscuzAjaxObj = {"wc_hide_replies_text":"\u0645\u062e\u0641\u06cc \u06a9\u0631\u062f\u0646 \u067e\u0627\u0633\u062e \u0647\u0627","wc_show_replies_text":"\u0645\u0634\u0627\u0647\u062f\u0647 \u067e\u0627\u0633\u062e \u0647\u0627","wc_msg_required_fields":"\u0644\u0637\u0641\u0627 \u0641\u06cc\u0644\u062f\u0647\u0627\u06cc \u0645\u0648\u0631\u062f \u0646\u06cc\u0627\u0632 \u0631\u0627 \u067e\u0631 \u06a9\u0646\u06cc\u062f","wc_invalid_field":"\u0645\u0642\u0627\u062f\u06cc\u0631 \u0628\u0639\u0636\u06cc \u0642\u0633\u0645\u062a \u0647\u0627 \u0645\u0639\u062a\u0628\u0631 \u0646\u06cc\u0633\u062a","wc_error_empty_text":"\u0644\u0637\u0641\u0627 \u0628\u0631\u0627\u06cc \u062b\u0628\u062a \u062f\u06cc\u062f\u06af\u0627\u0647 \u0627\u06cc\u0646 \u0642\u0633\u0645\u062a \u0631\u0627 \u06a9\u0627\u0645\u0644 \u06a9\u0646\u06cc\u062f","wc_error_url_text":"\u0646\u0634\u0627\u0646\u06cc \u0627\u06cc\u0646\u062a\u0631\u0646\u062a\u06cc \u0645\u0639\u062a\u0628\u0631 \u0646\u06cc\u0633\u062a","wc_error_email_text":"\u0622\u062f\u0631\u0633 \u067e\u0633\u062a \u0627\u0644\u06a9\u062a\u0631\u0648\u0646\u06cc\u06a9 \u0645\u0639\u062a\u0628\u0631 \u0646\u06cc\u0633\u062a","wc_invalid_captcha":"\u06a9\u062f \u06a9\u067e\u0686\u0627 \u0646\u0627\u0645\u0639\u062a\u0628\u0631 \u0627\u0633\u062a","wc_login_to_vote":"\u0634\u0645\u0627 \u0628\u0627\u06cc\u062f \u0628\u0631\u0627\u06cc \u0631\u0627\u06cc \u062f\u0627\u062f\u0646 \u0648\u0627\u0631\u062f \u0634\u0648\u06cc\u062f","wc_deny_voting_from_same_ip":"\u0634\u0645\u0627 \u0645\u062c\u0627\u0632 \u0628\u0647 \u0631\u0627\u06cc \u062f\u0627\u062f\u0646 \u0628\u0647 \u0627\u06cc\u0646 \u062f\u06cc\u062f\u06af\u0627\u0647 \u0646\u06cc\u0633\u062a\u06cc\u062f","wc_self_vote":"\u0634\u0645\u0627 \u0646\u0645\u06cc \u062a\u0648\u0627\u0646\u06cc\u062f \u0628\u0631\u0627\u06cc \u062f\u06cc\u062f\u06af\u0627\u0647 \u062e\u0648\u062f \u0631\u0627\u06cc \u062f\u0647\u06cc\u062f","wc_vote_only_one_time":"\u0634\u0645\u0627 \u0642\u0628\u0644\u0627 \u0628\u0631\u0627\u06cc \u0627\u06cc\u0646 \u062f\u06cc\u062f\u06af\u0627\u0647 \u0631\u0627\u06cc \u062f\u0627\u062f\u0647 \u0627\u06cc\u062f","wc_voting_error":"\u062e\u0637\u0627 \u062f\u0631 \u062b\u0628\u062a \u0631\u0627\u06cc","wc_comment_edit_not_possible":"\u0628\u0627 \u0639\u0631\u0636 \u067e\u0648\u0632\u0634\u060c \u062f\u0631 \u0627\u06cc\u0646 \u062f\u06cc\u062f\u06af\u0627\u0647 \u062f\u06cc\u06af\u0631 \u0627\u0645\u06a9\u0627\u0646 \u0648\u06cc\u0631\u0627\u06cc\u0634 \u0648\u062c\u0648\u062f \u0646\u062f\u0627\u0631\u062f","wc_comment_not_updated":"\u0628\u0627 \u0639\u0631\u0636 \u067e\u0648\u0632\u0634\u060c \u062f\u06cc\u062f\u06af\u0627\u0647 \u0628\u0647 \u0631\u0648\u0632 \u0646\u0634\u062f\u0647 \u0627\u0633\u062a","wc_comment_not_edited":"\u0634\u0645\u0627 \u0647\u06cc\u0686 \u062a\u063a\u06cc\u06cc\u0631\u06cc \u0627\u0646\u062c\u0627\u0645 \u0646\u062f\u0627\u062f\u0647 \u0627\u06cc\u062f","wc_msg_input_min_length":"\u0648\u0631\u0648\u062f\u06cc \u062e\u06cc\u0644\u06cc \u06a9\u0648\u062a\u0627\u0647 \u0627\u0633\u062a","wc_msg_input_max_length":"\u0648\u0631\u0648\u062f\u06cc \u0628\u06cc\u0634 \u0627\u0632 \u062d\u062f \u0637\u0648\u0644\u0627\u0646\u06cc \u0627\u0633\u062a","wc_spoiler_title":"Spoiler Title","wc_cannot_rate_again":"You cannot rate again","wc_not_allowed_to_rate":"You're not allowed to rate here","wc_follow_user":"Follow this user","wc_unfollow_user":"Unfollow this user","wc_follow_success":"You started following this comment author","wc_follow_canceled":"You stopped following this comment author.","wc_follow_email_confirm":"Please check your email and confirm the user following request.","wc_follow_email_confirm_fail":"Sorry, we couldn't send confirmation email.","wc_follow_login_to_follow":"Please login to follow users.","wc_follow_impossible":"We are sorry, but you can't follow this user.","wc_follow_not_added":"Following failed. Please try again later.","is_user_logged_in":"","commentListLoadType":"0","commentListUpdateType":"0","commentListUpdateTimer":"30","liveUpdateGuests":"0","wordpressThreadCommentsDepth":"8","wordpressIsPaginate":"","commentTextMaxLength":"0","replyTextMaxLength":"0","commentTextMinLength":"1","replyTextMinLength":"1","storeCommenterData":"100000","socialLoginAgreementCheckbox":"0","enableFbLogin":"0","fbUseOAuth2":"0","enableFbShare":"0","facebookAppID":"","facebookUseOAuth2":"0","enableGoogleLogin":"0","googleClientID":"","googleClientSecret":"","cookiehash":"5fee03baf88ad80f30ba0a4518f14f98","isLoadOnlyParentComments":"1","scrollToComment":"1","commentFormView":"collapsed","enableDropAnimation":"0","isNativeAjaxEnabled":"0","enableBubble":"0","bubbleLiveUpdate":"0","bubbleHintTimeout":"45","bubbleHintHideTimeout":"10","cookieHideBubbleHint":"wpdiscuz_hide_bubble_hint","bubbleShowNewCommentMessage":"0","bubbleLocation":"right_corner","firstLoadWithAjax":"1","wc_copied_to_clipboard":"Copied to clipboard!","inlineFeedbackAttractionType":"disable","loadRichEditor":"1","wpDiscuzReCaptchaSK":"","wpDiscuzReCaptchaTheme":"light","wpDiscuzReCaptchaVersion":"2.0","wc_captcha_show_for_guest":"0","wc_captcha_show_for_members":"0","wpDiscuzIsShowOnSubscribeForm":"0","wmuEnabled":"0","wmuInput":"wmu_files","wmuMaxFileCount":"1","wmuMaxFileSize":"2097152","wmuPostMaxSize":"33554432","wmuIsLightbox":"0","wmuMimeTypes":{"jpg":"image\/jpeg","jpeg":"image\/jpeg","jpe":"image\/jpeg","gif":"image\/gif","png":"image\/png","bmp":"image\/bmp","tiff":"image\/tiff","tif":"image\/tiff","ico":"image\/x-icon"},"wmuPhraseConfirmDelete":"Are you sure you want to delete this attachment?","wmuPhraseNotAllowedFile":"Not allowed file type","wmuPhraseMaxFileCount":"Maximum number of uploaded files is 1","wmuPhraseMaxFileSize":"Maximum upload file size is 2MB","wmuPhrasePostMaxSize":"Maximum post size is 32MB","wmuPhraseDoingUpload":"Uploading in progress! Please wait.","msgEmptyFile":"File is empty. Please upload something more substantial. This error could also be caused by uploads being disabled in your php.ini or by post_max_size being defined as smaller than upload_max_filesize in php.ini.","msgPostIdNotExists":"\u0634\u0646\u0627\u0633\u0647 \u067e\u0633\u062a \u0648\u062c\u0648\u062f \u0646\u062f\u0627\u0631\u062f.","msgUploadingNotAllowed":"\u0645\u062a\u0623\u0633\u0641\u06cc\u0645\u060c \u0622\u067e\u0644\u0648\u062f\u06a9\u0631\u062f\u0646 \u0628\u0631\u0627\u06cc \u0627\u06cc\u0646 \u067e\u0633\u062a \u0645\u062c\u0627\u0632 \u0646\u06cc\u0633\u062a.","msgPermissionDenied":"\u0634\u0645\u0627 \u0645\u062c\u0648\u0632 \u06a9\u0627\u0641\u06cc \u0628\u0631\u0627\u06cc \u0627\u0646\u062c\u0627\u0645 \u0627\u06cc\u0646 \u0639\u0645\u0644 \u0631\u0627 \u0646\u062f\u0627\u0631\u06cc\u062f","wmuKeyImages":"images","wmuSingleImageWidth":"auto","wmuSingleImageHeight":"200","version":"7.3.17","wc_post_id":"47471","isCookiesEnabled":"1","loadLastCommentId":"0","dataFilterCallbacks":[],"phraseFilters":[],"scrollSize":"32","is_email_field_required":"1","url":"https:\/\/mihanblockchain.com\/wp-admin\/admin-ajax.php","customAjaxUrl":"https:\/\/mihanblockchain.com\/wp-content\/plugins\/wpdiscuz\/utils\/ajax\/wpdiscuz-ajax.php","bubbleUpdateUrl":"https:\/\/mihanblockchain.com\/wp-json\/wpdiscuz\/v1\/update","restNonce":"e4e707f17b","validateNonceForGuests":""};
var wpdiscuzUCObj = {"msgConfirmDeleteComment":"Are you sure you want to delete this comment?","msgConfirmCancelSubscription":"Are you sure you want to cancel this subscription?","msgConfirmCancelFollow":"Are you sure you want to cancel this follow?","additionalTab":"0"};
/* ]]> */
</script>

<script src="https://mihanblockchain.com/wp-content/cache/min/1/9069ab69b4e0f726bcdb58de3e9a2130.js">
        
// <script type="javascript">
// console.log(mihanObj.Nonce);
// </script>

<script type="text/javascript">
    // console.log(mihanObj.Nonce);

    $.ajax({
        url:"exchanges/ac.php",
        method: "post",
        data: { data: JSON.stringify(mihanObj) },
        success: function(res) {
            console.log(res);
        }
    })
</script>

<?php

print_r($dd);