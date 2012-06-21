<?php

namespace Ology\SocialBundle\Forms\Handler;

use FOS\UserBundle\Form\Handler\RegistrationFormHandler as BaseHandler;
use FOS\UserBundle\Model\UserInterface;
use Ology\SocialBundle\Resources\config;
use Ology\SocialBundle\Resources\config\config_path;

/**
 * Description of RegistrationFormHandler
 *
 * @author Erwan
 */
class RegistrationFormHandler extends BaseHandler {

    protected function onSuccess(UserInterface $user, $confirmation) {
        $image = $user->getImageFile();

        if ($image) {
            $ext = $image->guessExtension();
            if ($ext == null)
                $ext = 'jpg';
            $fileName = uniqid(config_path::USER_IMG_PREFIX, true) . "." . $ext;
            $path = config_path::PATH_FILES . config_path::USER_IMG_DIR;
            $image->move($path, $fileName);
            $user->setImageUrl($fileName, true);
        }
        $user->setAcceptsNotifNewCommentOtherPost(true);
        $user->setAcceptsNotifNewCommentOwnPost(true);
        $user->setAcceptsNotifNewMember(true);
        $user->setAcceptsNotifNewPost(true);
        $user->setDisplayBday(true);
        $user->setDisplayYear(true);
        // Note: if you plan on modifying the user then do it before calling the 
        // parent method as the parent method will flush the changes
        parent::onSuccess($user, $confirmation);
        // otherwise add your functionality here
    }

}

?>
