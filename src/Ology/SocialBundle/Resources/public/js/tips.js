/*
 * This file is loaded only if there is a tips variable in session.
 * Here is computed parameters to send to TipsManager.
 *
 * @author raphael
 */

// Simple call to TipsManager controller with correct parameters.
// It's returning JSON.
function getNextTipId(currentTipId, page) {
    if (page != null){
        var request = '/tip/' + page + '/'+ currentTipId;
        //alert('@GET = ' + request);
        
        $.getJSON(request, function(data) {
            //alert('@RESPONSE : ID = ' + data.tipId);
            if (additionnalChecks(data.tipId) == true) {
                
                $('#tip' + currentTipId).fadeOut(500).hide("fast");  // Hide current tip
                $('#tip' + data.tipId).fadeIn(500).show("fast");    // Show next tip
            
                // This will scroll the page to see the current tip
                $('html,body').animate({
                    scrollTop: $('#tip' + data.tipId).offset().top - 200
                }, 'slow', 'easeInOutQuint');
            }
            
        });     
    }
}

// Extract the id number from the id name
// Ex: idName = 'tip42' returns '42'
function getTipId(idName){
    return idName.substring(3);
}

// We display different tips in different order in function to the page visited.
// So we must send it to the TipsManager.
// This is analysing the current URL and if its matching some key words, we return it.
function getCurrentPageName() {
    var allowedValues = ['home', 'profile', 'settings', 'post', 'ology'];
    pathArray = window.location.pathname.split( '/' );
    var i;
    
    for (i in allowedValues){
        if (jQuery.inArray(allowedValues[i], pathArray) != -1){
            return allowedValues[i];
        }
    }

    return null;
}

// Here is one some specific action in function to the tip id
// Return true to continue execution at upper level, false if not.
function additionnalChecks(tipId) {
    if (tipId == 12) {              // #tip12 = FAQ
        $('.account-box').show();   // Open the account box to see the FAQ tip
    }
    else if (tipId == 13) {
        return allNotificationsAreUnchecked();
    }
    
    return true;
}

// We display the tip only if all checkboxes are unchecked and if tips are enabled.
function allNotificationsAreUnchecked() {
    if (!userNotificationForm_acceptsNotifNewMember.checked &&
        !userNotificationForm_acceptsNotifNewCommentOtherPost.checked &&
        !userNotificationForm_acceptsNotifNewCommentOwnPost.checked) {

        return true;
    }
    
    return false;
}

// Stop showing tips by clearing session
$(".tip-close").click(function(){
    $(this).parent().fadeOut(500).hide("fast");  // Hide current tip
    $.get('/tip/stop'); // Send request to the server saying to stop showing tips
});
    
// Asynchronus call to /tip/{currentId} returns the next tipId to show
$('.next-tip').click(function() {
    var currentTipId = getTipId(this.parentNode.id);
    
    getNextTipId(currentTipId, getCurrentPageName());
});

// Get the first tip
getNextTipId(0, getCurrentPageName());

// Here gets the edit tip. Call this way because it's difficult 
// to identify as its the same page as 'post' which already exists
if ( $('#tip4').length > 0 ){
    getNextTipId(0, 'edit');
}

// For live notification tip
$('#userNotificationForm_acceptsNotifNewMember, #userNotificationForm_acceptsNotifNewCommentOtherPost, #userNotificationForm_acceptsNotifNewCommentOwnPost').live('click', function(){
    if (allNotificationsAreUnchecked()) {
        getNextTipId(0, getCurrentPageName());
    }
});

// Here gets the media tip. Call this way because it's difficult 
// to identify as its the same page as 'ology' which already exists
$(".post-something, .post-ology").click( function() {
    $('.post-ology, .post-something').css('overflow', 'visible');
    getNextTipId(0, 'media');
});

// Here overflow is dynamically added/deleted
$(".cancel").click(function(){
    $('.post-ology, .post-something').css('overflow', 'hidden');
    $('#tip6').fadeOut(0)
});