<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appdevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       '_wdt' => true,
       '_profiler_search' => true,
       '_profiler_purge' => true,
       '_profiler_import' => true,
       '_profiler_export' => true,
       '_profiler_search_results' => true,
       '_profiler' => true,
       '_configurator_home' => true,
       '_configurator_step' => true,
       '_configurator_final' => true,
       '_exception' => true,
       '_stats_general' => true,
       '_stats_invites' => true,
       '_stats_posts' => true,
       '_stats_comments' => true,
       '_stats_notifs' => true,
       '_stats_ologies' => true,
       '_stats_users' => true,
       '_stats_all_users' => true,
       '_stats_labels' => true,
       '_stats_follow' => true,
       '_stats_followees' => true,
       '_stats_followers' => true,
       '_website_old_group' => true,
       '_editors_post_form' => true,
       '_editors_post_edit_form' => true,
       '_editors_post_edit_pp_form' => true,
       '_editors_post_list' => true,
       '_editors_post_pic_form' => true,
       '_editors_post_store' => true,
       '_editors_post_pic_store' => true,
       '_pro_post_delete' => true,
       '_editors_channel_list' => true,
       '_editors_channel_edit_form' => true,
       '_editors_channel_store' => true,
       '_editors_channel_add_post' => true,
       '_editors_channel_remove_post' => true,
       '_sponsor_store' => true,
       '_sponsor_display' => true,
       '_website_post' => true,
       '_website_post_ajax_comments' => true,
       '_website_postajaxcomments' => true,
       '_website_post_ajax_grab' => true,
       '_website_create' => true,
       '_website_create_ology' => true,
       '_website_create_ology_byname' => true,
       '_website_create_stash' => true,
       '_website_update_ology' => true,
       '_website_terms' => true,
       '_website_faq' => true,
       '_website_ologist' => true,
       '_website_post_by_old_id' => true,
       '_website_post_by_old_alias' => true,
       '_website_post_by_old_alias1' => true,
       '_website_post_by_old_alias2' => true,
       '_website_manual_log_out' => true,
       '_post_up_pic' => true,
       '_website_tip_stop' => true,
       '_website_tip' => true,
       '_post_reologize_popup' => true,
       '_post_reologize_success_popup' => true,
       '_post_reologize_ologies_stashes' => true,
       '_website_ology_invite' => true,
       '_website_ology' => true,
       '_website_ology_pag' => true,
       '_website_stash' => true,
       '_website_stash_pag' => true,
       '_stash_unstash' => true,
       '_stash_delete' => true,
       '_website_channel' => true,
       '_website_channel_pag' => true,
       '_website_channel_subscription' => true,
       '_remember_core_ology_offline' => true,
       '_website_channel_unsubscription' => true,
       '_website_home' => true,
       '_website_undo_auto_join' => true,
       '_website_home_pag' => true,
       '_website_search' => true,
       '_search_all_link' => true,
       '_website_splash' => true,
       '_website_splash_invite_general' => true,
       '_website_splash_2' => true,
       '_website_splash_pag' => true,
       '_ologies_autocomplete_ajax' => true,
       '_website_splash_ology_pag' => true,
       '_website_explore' => true,
       '_website_explore_you_pag' => true,
       '_website_explore_pag' => true,
       '_website_explore_recent_pag' => true,
       '_website_invite' => true,
       '_website_invite_fb' => true,
       '_website_invite_fb_redirect' => true,
       '_website_invite_gmail' => true,
       '_website_invite_fb_send' => true,
       '_website_invite_gmail_send' => true,
       '_website_invite_send' => true,
       '_website_invite_from_ology' => true,
       '_website_profile' => true,
       '_website_user_ologies' => true,
       '_website_user_stashes' => true,
       '_website_user_posts_pag' => true,
       '_website_settings' => true,
       '_user_update' => true,
       '_user_update_notification' => true,
       '_website_fb_likes' => true,
       '_website_fb_pic' => true,
       '_website_onboarding' => true,
       '_website_follow_user_popup' => true,
       '_website_follow_user_tooltip' => true,
       '_website_follow_user_everywhere' => true,
       '_website_unfollow_user_everywhere' => true,
       '_website_register_redir' => true,
       '_website_register' => true,
       '_website_register_invite_general' => true,
       '_website_register_invite' => true,
       '_website_register_join' => true,
       '_website_reset' => true,
       '_website_facebook_check' => true,
       '_website_facebook_redirect' => true,
       '_website_merge_facebook' => true,
       '_website_facebook_register' => true,
       '_website_login_redirect' => true,
       '_website_twitter_redirect' => true,
       '_website_merge_twitter' => true,
       '_website_twitter_register' => true,
       '_website_twitter_check' => true,
       '_ologize_post' => true,
       '_admin_home' => true,
       '_cache_subscriptions' => true,
       '_cache_inv' => true,
       '_cache_ology_stats' => true,
       '_cache_all_posts' => true,
       '_cache_all_users' => true,
       '_reset_topologist_redis' => true,
       '_cache_posts_cards' => true,
       '_cache_pc' => true,
       '_cache_related_posts' => true,
       '_cache_splash_posts' => true,
       '_cache_most_viewed_posts' => true,
       '_cache_post' => true,
       '_cache_ology_posts' => true,
       '_cache_usersId_usersImg' => true,
       '_email_missyou' => true,
       '_adm_post_publish' => true,
       '_adm_set_su' => true,
       '_adm_set_editor' => true,
       '_adm_delete_user' => true,
       '_adm_disable_user' => true,
       '_featured_display' => true,
       '_mostviewed_display' => true,
       '_blacklisted_display' => true,
       '_featured_store' => true,
       '_blacklisted_store' => true,
       '_mostviewed_store' => true,
       '_resize_sma' => true,
       '_all_import' => true,
       '_user_import' => true,
       '_user_ologies_import' => true,
       '_postology_import' => true,
       '_post_import' => true,
       '_comment_import' => true,
       '_comment_son_import' => true,
       '_membership_import' => true,
       '_move_all_' => true,
       '_move_user_' => true,
       '_move_posts_' => true,
       '_move_ology_' => true,
       '_move_post_' => true,
       '_ology_debug' => true,
       '_ology_form' => true,
       '_ology_store' => true,
       '_ology_edit' => true,
       '_ology_get' => true,
       '_ology_delete' => true,
       '_ology_getologies' => true,
       '_ology_tag' => true,
       '_ology_labels_recent' => true,
       '_ology_label_recent' => true,
       '_ology_most_users' => true,
       '_ology_recent' => true,
       '_ology_join' => true,
       '_remember_join_offline' => true,
       '_ology_leave' => true,
       '_ology_users' => true,
       '_ology_isauthorized' => true,
       '_user_create' => true,
       '_user_delete' => true,
       '_user_get' => true,
       '_user_ologies' => true,
       '_stash_create' => true,
       '_ajax_stash_edit' => true,
       '_tags_autocomplete_ajax' => true,
       '_text_post_form' => true,
       '_audio_post_form' => true,
       '_image_post_form' => true,
       '_video_post_form' => true,
       '_post_store_obj' => true,
       '_post_store_id' => true,
       '_remember_post_offline' => true,
       '_post_store_text' => true,
       '_post_store_image' => true,
       '_post_store_audio' => true,
       '_post_store_video' => true,
       '_post_edit_id' => true,
       '_post_reologize' => true,
       '_post_unreologize' => true,
       '_post_delete' => true,
       '_post_get' => true,
       '_post_comm_get' => true,
       '_post_recent' => true,
       '_post_mostcommented' => true,
       '_post_getbyuser' => true,
       'svc_post_getbyologies' => true,
       'svc_post_getforology' => true,
       '_post_isauthorized' => true,
       '_store_ologize_post' => true,
       '_store_ologize_thanks' => true,
       '_post_love' => true,
       '_post_unlove' => true,
       '_post_hate' => true,
       '_post_unhate' => true,
       '_post_hmm' => true,
       '_post_unhmm' => true,
       '_post_offline_love' => true,
       '_post_offline_hate' => true,
       '_post_offline_hmm' => true,
       '_comment_on_post_form' => true,
       '_remember_comment_offline' => true,
       '_comment_store_ajax' => true,
       '_comment_store' => true,
       '_comment_update' => true,
       '_comment_delete' => true,
       '_comment_get' => true,
       '_comment_getcommentforpost' => true,
       '_comment_getcommentforuser' => true,
       '_comment_isauthorized' => true,
       '_website_last_page' => true,
       '_all_search' => true,
       '_ology_search' => true,
       '_post_search' => true,
       '_user_search' => true,
       '_get_all_search' => true,
       '_get_user_search' => true,
       '_get_ology_search' => true,
       '_get_post_search' => true,
       '_follow_no_stashes' => true,
       '_follow_stashes' => true,
       '_follow_no_ologies' => true,
       '_follow_ologies' => true,
       '_followees_page' => true,
       '_followers_page' => true,
       'fos_user_security_login' => true,
       'fos_user_security_check' => true,
       'fos_user_security_logout' => true,
       'fos_user_profile_show' => true,
       'fos_user_profile_edit' => true,
       'fos_user_registration_register' => true,
       'fos_user_registration_check_email' => true,
       'fos_user_registration_confirm' => true,
       'fos_user_registration_confirmed' => true,
       'fos_user_resetting_request' => true,
       'fos_user_resetting_send_email' => true,
       'fos_user_resetting_check_email' => true,
       'fos_user_resetting_reset' => true,
       'fos_user_change_password' => true,
       '_security_check' => true,
       '_security_logout' => true,
       '_login_check' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    private function get_wdtRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_wdt',  ),));
    }

    private function get_profiler_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/search',  ),));
    }

    private function get_profiler_purgeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/purge',  ),));
    }

    private function get_profiler_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/import',  ),));
    }

    private function get_profiler_exportRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.txt',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler/export',  ),));
    }

    private function get_profiler_search_resultsRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/results',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_profilerRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_configurator_homeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/',  ),));
    }

    private function get_configurator_stepRouteInfo()
    {
        return array(array (  0 => 'index',), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'index',  ),  1 =>   array (    0 => 'text',    1 => '/_configurator/step',  ),));
    }

    private function get_configurator_finalRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/final',  ),));
    }

    private function get_exceptionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Exception\\ExceptionController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/error',  ),));
    }

    private function get_stats_generalRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getGeneralPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stats/',  ),));
    }

    private function get_stats_invitesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getInvitePage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stats/inv',  ),));
    }

    private function get_stats_postsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getPostsPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stats/posts',  ),));
    }

    private function get_stats_commentsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getCommentsPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stats/comments',  ),));
    }

    private function get_stats_notifsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getNotifsPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stats/notifs',  ),));
    }

    private function get_stats_ologiesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getOlogiesPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stats/ologies',  ),));
    }

    private function get_stats_usersRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getUsersPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stats/users',  ),));
    }

    private function get_stats_all_usersRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getAllUsersPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stats/users/all',  ),));
    }

    private function get_stats_labelsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getLabelsPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stats/labels',  ),));
    }

    private function get_stats_followRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getFollowPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stats/follow',  ),));
    }

    private function get_stats_followeesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getTopUsersFollowees',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stats/follow/followees',  ),));
    }

    private function get_stats_followersRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getTopUsersFollowers',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stats/follow/followers',  ),));
    }

    private function get_website_old_groupRouteInfo()
    {
        return array(array (  0 => 'groupId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\OldGroupController::getOldGroup',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'groupId',  ),  1 =>   array (    0 => 'text',    1 => '/groups',  ),));
    }

    private function get_editors_post_formRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::getCreatePostPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/editors/post/',  ),));
    }

    private function get_editors_post_edit_formRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::getCreatePostPage',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/editors/post/edit',  ),));
    }

    private function get_editors_post_edit_pp_formRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'postPublish',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::getCreatePostPage',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'postPublish',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/editors/post/edit',  ),));
    }

    private function get_editors_post_listRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::getPostListPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/editors/post/list',  ),));
    }

    private function get_editors_post_pic_formRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::getCreatePicForm',), array (), array (  0 =>   array (    0 => 'text',    1 => '/editors/post/pic',  ),));
    }

    private function get_editors_post_storeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::storePost',), array (), array (  0 =>   array (    0 => 'text',    1 => '/editors/post/save',  ),));
    }

    private function get_editors_post_pic_storeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::storePic',), array (), array (  0 =>   array (    0 => 'text',    1 => '/editors/post/pic/save',  ),));
    }

    private function get_pro_post_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::deletePost',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/editors/post/del',  ),));
    }

    private function get_editors_channel_listRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\ChannelController::getListChannelPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/editors/channel/list',  ),));
    }

    private function get_editors_channel_edit_formRouteInfo()
    {
        return array(array (  0 => 'stub',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\ChannelController::getEditChannelPage',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'stub',  ),  1 =>   array (    0 => 'text',    1 => '/editors/channel/edit',  ),));
    }

    private function get_editors_channel_storeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\ChannelController::storeChannel',), array (), array (  0 =>   array (    0 => 'text',    1 => '/editors/channel/save',  ),));
    }

    private function get_editors_channel_add_postRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\ChannelController::curatePost',), array (), array (  0 =>   array (    0 => 'text',    1 => '/editors/channel/curate/',  ),));
    }

    private function get_editors_channel_remove_postRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\ChannelController::unCuratePost',), array (), array (  0 =>   array (    0 => 'text',    1 => '/editors/channel/uncurate/',  ),));
    }

    private function get_sponsor_storeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\ChannelController::storeSponsor',), array (), array (  0 =>   array (    0 => 'text',    1 => '/editors/channel/sponsor/store',  ),));
    }

    private function get_sponsor_displayRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\ChannelController::displaySponsorPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/editors/channel/sponsor',  ),));
    }

    private function get_website_postRouteInfo()
    {
        return array(array (  0 => 'postId',  1 => 'slug',), array (  'slug' => '',  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getPostPage',), array (  'postId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'slug',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'postId',  ),  2 =>   array (    0 => 'text',    1 => '/post',  ),));
    }

    private function get_website_post_ajax_commentsRouteInfo()
    {
        return array(array (  0 => 'postId',  1 => 'slug',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::ajaxGetComments',), array (  'postId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'slug',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'postId',  ),  2 =>   array (    0 => 'text',    1 => '/post-comments',  ),));
    }

    private function get_website_postajaxcommentsRouteInfo()
    {
        return array(array (  0 => 'postId',  1 => 'slug',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::ajaxGetPostComments',), array (  'postId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'slug',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'postId',  ),  2 =>   array (    0 => 'text',    1 => '/postComments',  ),));
    }

    private function get_website_post_ajax_grabRouteInfo()
    {
        return array(array (  0 => 'url',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::ajaxGrabImage',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'url',  ),  1 =>   array (    0 => 'text',    1 => '/gi',  ),));
    }

    private function get_website_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getCreatePage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/create',  ),));
    }

    private function get_website_create_ologyRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getCreateOlogyPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/create/ology',  ),));
    }

    private function get_website_create_ology_bynameRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getCreateOlogyPage',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/create/ology',  ),));
    }

    private function get_website_create_stashRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getCreateStashPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/create/stash',  ),));
    }

    private function get_website_update_ologyRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getUpdateOlogyPage',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/update',  ),));
    }

    private function get_website_termsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getTerms',), array (), array (  0 =>   array (    0 => 'text',    1 => '/terms',  ),));
    }

    private function get_website_faqRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getfaq',), array (), array (  0 =>   array (    0 => 'text',    1 => '/faq',  ),));
    }

    private function get_website_ologistRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getOlogist',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/ologist',  ),));
    }

    private function get_website_post_by_old_idRouteInfo()
    {
        return array(array (  0 => 'old_id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getPostPageByOldId',), array (  'nid' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'old_id',  ),  1 =>   array (    0 => 'text',    1 => '/node',  ),));
    }

    private function get_website_post_by_old_aliasRouteInfo()
    {
        return array(array (  0 => 'channel',  1 => 'slug',  2 => 'date',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getPostPageByOldAlias',), array (  'date' => '[\\d-]+',  'channel' => 'arts|breaking-dawn|cheese|dew|first|gifts|humor|politics|shake-things|sports|summer|summer-test|truth|tv|vampire|screen|music|celebs-and-gossip|fashion-and-beauty|technology|\\[field_channel-term-raw\\]',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[\\d-]+',    3 => 'date',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'slug',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => 'arts|breaking-dawn|cheese|dew|first|gifts|humor|politics|shake-things|sports|summer|summer-test|truth|tv|vampire|screen|music|celebs-and-gossip|fashion-and-beauty|technology|\\[field_channel-term-raw\\]',    3 => 'channel',  ),));
    }

    private function get_website_post_by_old_alias1RouteInfo()
    {
        return array(array (  0 => 'slug',  1 => 'date',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getPostPageByOldAlias1',), array (  'date' => '[\\d]{8}',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[\\d]{8}',    3 => 'date',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'slug',  ),));
    }

    private function get_website_post_by_old_alias2RouteInfo()
    {
        return array(array (  0 => 'channel',  1 => 'slug',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getPostPageByOldAlias2',), array (  'channel' => 'movie-reviews|arts|breaking-dawn|cheese|dew|first|gifts|humor|politics|shake-things|sports|summer|summer-test|truth|tv|vampire|screen|music|celebs-and-gossip|fashion-and-beauty|technology|\\[field_channel-term-raw\\]',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'slug',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => 'movie-reviews|arts|breaking-dawn|cheese|dew|first|gifts|humor|politics|shake-things|sports|summer|summer-test|truth|tv|vampire|screen|music|celebs-and-gossip|fashion-and-beauty|technology|\\[field_channel-term-raw\\]',    3 => 'channel',  ),));
    }

    private function get_website_manual_log_outRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::logOut',), array (), array (  0 =>   array (    0 => 'text',    1 => '/lgot',  ),));
    }

    private function get_post_up_picRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::uploadPicForPost',), array (), array (  0 =>   array (    0 => 'text',    1 => '/post/up/pic/',  ),));
    }

    private function get_website_tip_stopRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::stopTipsPrompt',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/tip/stop',  ),));
    }

    private function get_website_tipRouteInfo()
    {
        return array(array (  0 => 'page',  1 => 'currentTipId',), array (  '_format' => 'json',  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getNextTipId',), array (  'page' => 'home|ology|settings|profile|post|media|edit',  'currentTipId' => '\\d+',  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'currentTipId',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => 'home|ology|settings|profile|post|media|edit',    3 => 'page',  ),  2 =>   array (    0 => 'text',    1 => '/tip',  ),));
    }

    private function get_post_reologize_popupRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getReOlogizePopup',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/reologize/popup',  ),));
    }

    private function get_post_reologize_success_popupRouteInfo()
    {
        return array(array (  0 => 'postId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getReOlogizeSuccessPopup',), array (  'postId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'postId',  ),  1 =>   array (    0 => 'text',    1 => '/reologize/popup/success',  ),));
    }

    private function get_post_reologize_ologies_stashesRouteInfo()
    {
        return array(array (  0 => 'postId',  1 => 'stashesIds',  2 => 'ologiesIds',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::reOlogizeStashesAndOlogies',), array (  'postId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'ologiesIds',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'stashesIds',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'postId',  ),  3 =>   array (    0 => 'text',    1 => '/reologize',  ),));
    }

    private function get_website_ology_inviteRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'inviteId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\OlogyPageController::getOlogyPage',), array (  'inviteId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'inviteId',  ),  1 =>   array (    0 => 'text',    1 => '/inv',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  3 =>   array (    0 => 'text',    1 => '/ology',  ),));
    }

    private function get_website_ologyRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'slug',), array (  'slug' => 'ology',  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\OlogyPageController::getOlogyPage',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'slug',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/ology',  ),));
    }

    private function get_website_ology_pagRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'slug',  2 => 'offset',  3 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\OlogyPageController::getOlogyPagePaginated',), array (  'id' => '\\d+',  'offset' => '\\d+',  'n' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'offset',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'slug',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  4 =>   array (    0 => 'text',    1 => '/ology',  ),));
    }

    private function get_website_stashRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\StashPageController::getStashPage',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/stash',  ),));
    }

    private function get_website_stash_pagRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'offset',  2 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\StashPageController::getStashPagePaginated',), array (  'id' => '\\d+',  'offset' => '\\d+',  'n' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'offset',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  3 =>   array (    0 => 'text',    1 => '/stash',  ),));
    }

    private function get_stash_unstashRouteInfo()
    {
        return array(array (  0 => 'stashId',  1 => 'postId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\StashPageController::unStash',), array (  'postId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'postId',  ),  1 =>   array (    0 => 'text',    1 => '/unstash',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'stashId',  ),  3 =>   array (    0 => 'text',    1 => '/stash',  ),));
    }

    private function get_stash_deleteRouteInfo()
    {
        return array(array (  0 => 'stashId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\StashPageController::deleteStash',), array (  'stashId' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'stashId',  ),  2 =>   array (    0 => 'text',    1 => '/stash',  ),));
    }

    private function get_website_channelRouteInfo()
    {
        return array(array (  0 => 'stub',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ChannelPageController::getChannelPage',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'stub',  ),  1 =>   array (    0 => 'text',    1 => '/channel',  ),));
    }

    private function get_website_channel_pagRouteInfo()
    {
        return array(array (  0 => 'stub',  1 => 'offset',  2 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ChannelPageController::getChannelPagePaginated',), array (  'n' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offset',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'stub',  ),  3 =>   array (    0 => 'text',    1 => '/channel',  ),));
    }

    private function get_website_channel_subscriptionRouteInfo()
    {
        return array(array (  0 => 'channelId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ChannelPageController::ajaxSubscribesToChannel',), array (  'channelId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'channelId',  ),  1 =>   array (    0 => 'text',    1 => '/channel/subscription',  ),));
    }

    private function get_remember_core_ology_offlineRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ChannelPageController::ajaxSubscribesToChannelOffline',), array (), array (  0 =>   array (    0 => 'text',    1 => '/offlineCoreOlogyJoin',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),));
    }

    private function get_website_channel_unsubscriptionRouteInfo()
    {
        return array(array (  0 => 'channelId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ChannelPageController::ajaxUnsubscribesToChannel',), array (  'channelId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'channelId',  ),  1 =>   array (    0 => 'text',    1 => '/channel/unsubscription',  ),));
    }

    private function get_website_homeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\HomePageController::getHomePage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/home',  ),));
    }

    private function get_website_undo_auto_joinRouteInfo()
    {
        return array(array (  0 => 'ids',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\HomePageController::undoAutoJoin',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'ids',  ),  1 =>   array (    0 => 'text',    1 => '/home/undo',  ),));
    }

    private function get_website_home_pagRouteInfo()
    {
        return array(array (  0 => 'offset',  1 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\HomePageController::getHomePagePaginated',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offset',  ),  2 =>   array (    0 => 'text',    1 => '/home',  ),));
    }

    private function get_website_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SearchController::getSearchPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search',  ),));
    }

    private function get_search_all_linkRouteInfo()
    {
        return array(array (  0 => 'term',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SearchController::searchViaLinks',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'term',  ),  1 =>   array (    0 => 'text',    1 => '/all',  ),));
    }

    private function get_website_splashRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SplashPageController::getSplashPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/splash',  ),));
    }

    private function get_website_splash_invite_generalRouteInfo()
    {
        return array(array (  0 => 'inviteId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SplashPageController::getSplashPage',), array (  'inviteId' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'inviteId',  ),  2 =>   array (    0 => 'text',    1 => '/splash',  ),));
    }

    private function get_website_splash_2RouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SplashPageController::getSplashPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function get_website_splash_pagRouteInfo()
    {
        return array(array (  0 => 'offset',  1 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SplashPageController::getSplashPagePaginated',), array (  'n' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offset',  ),  2 =>   array (    0 => 'text',    1 => '/splash',  ),));
    }

    private function get_ologies_autocomplete_ajaxRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SplashPageController::autoCompleteOlogies',), array (), array (  0 =>   array (    0 => 'text',    1 => '/ologies',  ),));
    }

    private function get_website_splash_ology_pagRouteInfo()
    {
        return array(array (  0 => 'offset',  1 => 'n',  2 => 'ologyPrefix',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SplashPageController::getSplashPageByOlogyPaginated',), array (  'n' => '\\d+',  'offset' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'ologyPrefix',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'n',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'offset',  ),  3 =>   array (    0 => 'text',    1 => '/splash',  ),));
    }

    private function get_website_exploreRouteInfo()
    {
        return array(array (  0 => 'sort',), array (  'sort' => 'recent',  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ExplorePageController::getExplorePage',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'sort',  ),  1 =>   array (    0 => 'text',    1 => '/explore',  ),));
    }

    private function get_website_explore_you_pagRouteInfo()
    {
        return array(array (  0 => 'offset',  1 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ExplorePageController::getPostsPaginatedYouForExplore',), array (  'n' => '\\d+',  'offset' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/you',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'n',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'offset',  ),  3 =>   array (    0 => 'text',    1 => '/explore',  ),));
    }

    private function get_website_explore_pagRouteInfo()
    {
        return array(array (  0 => 'offset',  1 => 'n',  2 => 'labels',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ExplorePageController::getPostsPaginatedLabelsForExplore',), array (  'n' => '\\d+',  'offset' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'labels',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'n',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'offset',  ),  3 =>   array (    0 => 'text',    1 => '/explore',  ),));
    }

    private function get_website_explore_recent_pagRouteInfo()
    {
        return array(array (  0 => 'offset',  1 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ExplorePageController::getPostsPaginatedRecentForExplore',), array (  'n' => '\\d+',  'offset' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'offset',  ),  2 =>   array (    0 => 'text',    1 => '/explore',  ),));
    }

    private function get_website_inviteRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::getInvitePage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/invite',  ),));
    }

    private function get_website_invite_fbRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::getFacebookFriendsPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/invite/fb',  ),));
    }

    private function get_website_invite_fb_redirectRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::updateUserToken',), array (), array (  0 =>   array (    0 => 'text',    1 => '/invite/fb/red',  ),));
    }

    private function get_website_invite_gmailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::getGmailFriendsPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/invite/gmail',  ),));
    }

    private function get_website_invite_fb_sendRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::sendFbInvites',), array (), array (  0 =>   array (    0 => 'text',    1 => '/invite/fb/send',  ),));
    }

    private function get_website_invite_gmail_sendRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::sendGmailInvites',), array (), array (  0 =>   array (    0 => 'text',    1 => '/invite/gmail/send',  ),));
    }

    private function get_website_invite_sendRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::sendOlogyInvites',), array (), array (  0 =>   array (    0 => 'text',    1 => '/invite/send',  ),));
    }

    private function get_website_invite_from_ologyRouteInfo()
    {
        return array(array (  0 => 'ologyId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::getOlogyInvitePage',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'ologyId',  ),  1 =>   array (    0 => 'text',    1 => '/invite',  ),));
    }

    private function get_website_profileRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::getProfilePage',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/profile',  ),));
    }

    private function get_website_user_ologiesRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxGetOlogies',), array (), array (  0 =>   array (    0 => 'text',    1 => '/ologies',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/profile',  ),));
    }

    private function get_website_user_stashesRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxGetStashes',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stashes',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/profile',  ),));
    }

    private function get_website_user_posts_pagRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'offset',  2 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxGetPostsPaginated',), array (  'n' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offset',  ),  2 =>   array (    0 => 'text',    1 => '/posts',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  4 =>   array (    0 => 'text',    1 => '/profile',  ),));
    }

    private function get_website_settingsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::getSettingsPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/settings',  ),));
    }

    private function get_user_updateRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::updateSettings',), array (), array (  0 =>   array (    0 => 'text',    1 => '/settings/g/update',  ),));
    }

    private function get_user_update_notificationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::updateNotification',), array (), array (  0 =>   array (    0 => 'text',    1 => '/settings/n/update',  ),));
    }

    private function get_website_fb_likesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxImportFbData',), array (), array (  0 =>   array (    0 => 'text',    1 => '/fblikes/load',  ),));
    }

    private function get_website_fb_picRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxImportFbPic',), array (), array (  0 =>   array (    0 => 'text',    1 => '/settings/fbpic',  ),));
    }

    private function get_website_onboardingRouteInfo()
    {
        return array(array (  0 => 'step',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::onboardingAction',), array (  'step' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'step',  ),  1 =>   array (    0 => 'text',    1 => '/onboarding',  ),));
    }

    private function get_website_follow_user_popupRouteInfo()
    {
        return array(array (  0 => 'userId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxGetUserFollowPopup',), array (  'userId' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/popup',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'userId',  ),  2 =>   array (    0 => 'text',    1 => '/follow',  ),));
    }

    private function get_website_follow_user_tooltipRouteInfo()
    {
        return array(array (  0 => 'userId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxGetUserTooltip',), array (  'userId' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/tooltip',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'userId',  ),  2 =>   array (    0 => 'text',    1 => '/follow',  ),));
    }

    private function get_website_follow_user_everywhereRouteInfo()
    {
        return array(array (  0 => 'userId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxFollowUserEverywhere',), array (  'userId' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/everywhere',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'userId',  ),  2 =>   array (    0 => 'text',    1 => '/follow',  ),));
    }

    private function get_website_unfollow_user_everywhereRouteInfo()
    {
        return array(array (  0 => 'userId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxUnfollowEverything',), array (  'userId' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/everywhere',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'userId',  ),  2 =>   array (    0 => 'text',    1 => '/unfollow',  ),));
    }

    private function get_website_register_redirRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::getRegister',), array (), array (  0 =>   array (    0 => 'text',    1 => '/registerRedir',  ),));
    }

    private function get_website_registerRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::getregisterForm',), array (), array (  0 =>   array (    0 => 'text',    1 => '/register',  ),));
    }

    private function get_website_register_invite_generalRouteInfo()
    {
        return array(array (  0 => 'inviteId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::getregisterForm',), array (  'inviteId' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'inviteId',  ),  2 =>   array (    0 => 'text',    1 => '/register/general',  ),));
    }

    private function get_website_register_inviteRouteInfo()
    {
        return array(array (  0 => 'inviteId',  1 => 'ologyId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::getregisterForm',), array (  'inviteId' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'ologyId',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'inviteId',  ),  3 =>   array (    0 => 'text',    1 => '/register',  ),));
    }

    private function get_website_register_joinRouteInfo()
    {
        return array(array (  0 => 'ologyId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::getregisterForm',), array (  'ologyId' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'ologyId',  ),  2 =>   array (    0 => 'text',    1 => '/register/follow',  ),));
    }

    private function get_website_resetRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::getResetForm',), array (), array (  0 =>   array (    0 => 'text',    1 => '/reset',  ),));
    }

    private function get_website_facebook_checkRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::facebookCheck',), array (), array (  0 =>   array (    0 => 'text',    1 => '/facebook/check',  ),));
    }

    private function get_website_facebook_redirectRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::facebookRedirect',), array (), array (  0 =>   array (    0 => 'text',    1 => '/facebook/redirect',  ),));
    }

    private function get_website_merge_facebookRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::facebookMerge',), array (), array (  0 =>   array (    0 => 'text',    1 => '/facebook/merge',  ),));
    }

    private function get_website_facebook_registerRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::facebookRegisterEmail',), array (), array (  0 =>   array (    0 => 'text',    1 => '/facebook/register',  ),));
    }

    private function get_website_login_redirectRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::regularLoginRedirect',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login/redirect',  ),));
    }

    private function get_website_twitter_redirectRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::twitterRedirect',), array (), array (  0 =>   array (    0 => 'text',    1 => '/twitter/redirect',  ),));
    }

    private function get_website_merge_twitterRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::twitterMerge',), array (), array (  0 =>   array (    0 => 'text',    1 => '/twitter/merge',  ),));
    }

    private function get_website_twitter_registerRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::twitterRegisterEmail',), array (), array (  0 =>   array (    0 => 'text',    1 => '/twitter/register',  ),));
    }

    private function get_website_twitter_checkRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::twitterLoginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/twitter/login',  ),));
    }

    private function get_ologize_postRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::ologizePost',), array (), array (  0 =>   array (    0 => 'text',    1 => '/ologize_post',  ),));
    }

    private function get_admin_homeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\AdminPageController::getHomePage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admhome/',  ),));
    }

    private function get_cache_subscriptionsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::computeSubscriptions',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/cache/sub',  ),));
    }

    private function get_cache_invRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::invalidateAll',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/cache/invalidate',  ),));
    }

    private function get_cache_ology_statsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::computeStats',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/cache/stats',  ),));
    }

    private function get_cache_all_postsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheAllNecessaryPostInfo',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/cache/allposts',  ),));
    }

    private function get_cache_all_usersRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheAllNecessaryUserInfo',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/cache/allusers',  ),));
    }

    private function get_reset_topologist_redisRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::resetTopOlogistsRedis',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/cache/resetTopRedis',  ),));
    }

    private function get_cache_posts_cardsRouteInfo()
    {
        return array(array (  0 => 'offset',  1 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cachePostsForCards',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offset',  ),  2 =>   array (    0 => 'text',    1 => '/adm/cache/posts',  ),));
    }

    private function get_cache_pcRouteInfo()
    {
        return array(array (  0 => 'offset',  1 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheChannelPosts',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offset',  ),  2 =>   array (    0 => 'text',    1 => '/adm/cache/pc',  ),));
    }

    private function get_cache_related_postsRouteInfo()
    {
        return array(array (  0 => 'offset',  1 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheRelatedProPosts',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offset',  ),  2 =>   array (    0 => 'text',    1 => '/adm/cache/rp',  ),));
    }

    private function get_cache_splash_postsRouteInfo()
    {
        return array(array (  0 => 'offset',  1 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheSplashPosts',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offset',  ),  2 =>   array (    0 => 'text',    1 => '/adm/cache/splash',  ),));
    }

    private function get_cache_most_viewed_postsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheMostViewed',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/cache/mostviewed',  ),));
    }

    private function get_cache_postRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cachePost',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/adm/cache/post',  ),));
    }

    private function get_cache_ology_postsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheOlogyAndPosts',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/cache/ologies',  ),));
    }

    private function get_cache_usersId_usersImgRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheUsers',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/cache/usersIdandImg',  ),));
    }

    private function get_email_missyouRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\EmailController::sendWeMissYouEmails',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/mail/missyou',  ),));
    }

    private function get_adm_post_publishRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\PostController::publishScheduled',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/post/publish',  ),));
    }

    private function get_adm_set_suRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\UserController::putAdmin',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/adm/user/su',  ),));
    }

    private function get_adm_set_editorRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\UserController::putEditor',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/adm/user/editor',  ),));
    }

    private function get_adm_delete_userRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\UserController::deleteUser',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/adm/user/delete',  ),));
    }

    private function get_adm_disable_userRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\UserController::disableUser',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/adm/user/disable',  ),));
    }

    private function get_featured_displayRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\FeaturedController::displayFeaturedOlogies',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/ologies/featured',  ),));
    }

    private function get_mostviewed_displayRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\FeaturedController::displayMostViewedPosts',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/ologies/mostviewed',  ),));
    }

    private function get_blacklisted_displayRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\FeaturedController::displayBlacklistedOlogies',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/ologies/blacklisted',  ),));
    }

    private function get_featured_storeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\FeaturedController::storeFeaturedOlogies',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/ologies/featured/store',  ),));
    }

    private function get_blacklisted_storeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\FeaturedController::storeBlacklistedOlogies',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/ologies/blacklisted/store',  ),));
    }

    private function get_mostviewed_storeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\FeaturedController::storeMostViewedPosts',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/ologies/mostviewed/store',  ),));
    }

    private function get_resize_smaRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::resizeImgSmall',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/import/resize/img/sma',  ),));
    }

    private function get_all_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importAll',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/import/all',  ),));
    }

    private function get_user_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importUsers',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/import/user',  ),));
    }

    private function get_user_ologies_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importOlogy',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/import/ology',  ),));
    }

    private function get_postology_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importPostOlogy',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/import/postology',  ),));
    }

    private function get_post_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importPostOnly',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/import/post',  ),));
    }

    private function get_comment_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importComment',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/import/comment',  ),));
    }

    private function get_comment_son_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importCommentSon',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/import/comment_son',  ),));
    }

    private function get_membership_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importMembership',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/import/membership',  ),));
    }

    private function get_move_all_RouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::move_files',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/import/move/all',  ),));
    }

    private function get_move_user_RouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::move_user_files',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/import/move/user',  ),));
    }

    private function get_move_posts_RouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::move_post_files',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/import/move/post',  ),));
    }

    private function get_move_ology_RouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::move_ology_files',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/import/move/ology',  ),));
    }

    private function get_move_post_RouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::move_post_audio_files',), array (), array (  0 =>   array (    0 => 'text',    1 => '/adm/import/move/post/audio',  ),));
    }

    private function get_ology_debugRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::debug',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/ology/debug',  ),));
    }

    private function get_ology_formRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::displayOlogyForm',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/ology/form',  ),));
    }

    private function get_ology_storeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::storeOlogy',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/ology/create',  ),));
    }

    private function get_ology_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::editAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/ology',  ),));
    }

    private function get_ology_getRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::getOlogy',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/get',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/ology',  ),));
    }

    private function get_ology_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::deleteOlogy',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/ology',  ),));
    }

    private function get_ology_getologiesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::getOlogies',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/ology/all/get',  ),));
    }

    private function get_ology_tagRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'label_name',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::tagOlogy',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'label_name',  ),  1 =>   array (    0 => 'text',    1 => '/tag',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  3 =>   array (    0 => 'text',    1 => '/svc/ology/admin',  ),));
    }

    private function get_ology_labels_recentRouteInfo()
    {
        return array(array (  0 => 'offset',  1 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::getRecentOlogiesByLabels',), array (), array (  0 =>   array (    0 => 'text',    1 => '/labels',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'n',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offset',  ),  3 =>   array (    0 => 'text',    1 => '/svc/ology/get/recent',  ),));
    }

    private function get_ology_label_recentRouteInfo()
    {
        return array(array (  0 => 'offset',  1 => 'n',  2 => 'label_id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::getRecentOlogiesByLabel',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'label_id',  ),  1 =>   array (    0 => 'text',    1 => '/label',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'n',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offset',  ),  4 =>   array (    0 => 'text',    1 => '/svc/ology/get/recent',  ),));
    }

    private function get_ology_most_usersRouteInfo()
    {
        return array(array (  0 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::getMostOlogists',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'n',  ),  1 =>   array (    0 => 'text',    1 => '/svc/ology/get/mostusers',  ),));
    }

    private function get_ology_recentRouteInfo()
    {
        return array(array (  0 => 'offset',  1 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::getRecentOlogies',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offset',  ),  2 =>   array (    0 => 'text',    1 => '/svc/ology/get/recent',  ),));
    }

    private function get_ology_joinRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::joinOlogy',), array (), array (  0 =>   array (    0 => 'text',    1 => '/join',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/ology',  ),));
    }

    private function get_remember_join_offlineRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::ajaxStoreJoinOlogy',), array (), array (  0 =>   array (    0 => 'text',    1 => '/rjoin',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/ology',  ),));
    }

    private function get_ology_leaveRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::leaveOlogy',), array (), array (  0 =>   array (    0 => 'text',    1 => '/leave',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/ology',  ),));
    }

    private function get_ology_usersRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::getUsers',), array (  'id' => '\\d+',  'n' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'n',  ),  1 =>   array (    0 => 'text',    1 => '/users',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  3 =>   array (    0 => 'text',    1 => '/svc/ology',  ),));
    }

    private function get_ology_isauthorizedRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::isAuthorizedToEditOrDelete',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/canEdit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/ology',  ),));
    }

    private function get_user_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\UserController::createAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/user/create',  ),));
    }

    private function get_user_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\UserController::deleteAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/svc/user/delete',  ),));
    }

    private function get_user_getRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\UserController::getAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/svc/user/get',  ),));
    }

    private function get_user_ologiesRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\UserController::getOlogies',), array (  'id' => '\\d+',  'n' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'n',  ),  1 =>   array (    0 => 'text',    1 => '/ologies',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  3 =>   array (    0 => 'text',    1 => '/svc/user',  ),));
    }

    private function get_stash_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\StashController::createStash',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/stash/create',  ),));
    }

    private function get_ajax_stash_editRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'newName',  2 => 'newTags',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\StashController::ajaxEditStash',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'newTags',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'newName',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  3 =>   array (    0 => 'text',    1 => '/svc/stash/edit',  ),));
    }

    private function get_tags_autocomplete_ajaxRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\TagController::autoCompleteTags',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/tag/getAjaxTags',  ),));
    }

    private function get_text_post_formRouteInfo()
    {
        return array(array (  0 => 'ologyId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::displayTextPostForm',), array (  'ologyId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'ologyId',  ),  1 =>   array (    0 => 'text',    1 => '/svc/post/form/text',  ),));
    }

    private function get_audio_post_formRouteInfo()
    {
        return array(array (  0 => 'ologyId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::displayAudioPostForm',), array (  'ologyId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'ologyId',  ),  1 =>   array (    0 => 'text',    1 => '/svc/post/form/audio',  ),));
    }

    private function get_image_post_formRouteInfo()
    {
        return array(array (  0 => 'ologyId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::displayImagePostForm',), array (  'ologyId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'ologyId',  ),  1 =>   array (    0 => 'text',    1 => '/svc/post/form/image',  ),));
    }

    private function get_video_post_formRouteInfo()
    {
        return array(array (  0 => 'ologyId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::displayVideoPostForm',), array (  'ologyId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'ologyId',  ),  1 =>   array (    0 => 'text',    1 => '/svc/post/form/video',  ),));
    }

    private function get_post_store_objRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storePostWithOlogyObject',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/post/storeo',  ),));
    }

    private function get_post_store_idRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storePostWithOlogyId',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/post/storei',  ),));
    }

    private function get_remember_post_offlineRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::ajaxStorePostContent',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/post/rpost',  ),));
    }

    private function get_post_store_textRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storeTextPost',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/post/store/text',  ),));
    }

    private function get_post_store_imageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storeImagePost',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/post/store/image',  ),));
    }

    private function get_post_store_audioRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storeAudioPost',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/post/store/audio',  ),));
    }

    private function get_post_store_videoRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storeVideoPost',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/post/store/video',  ),));
    }

    private function get_post_edit_idRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::editPostWithOlogyId',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/editi',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/post',  ),));
    }

    private function get_post_reologizeRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::reOlogize',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/reologize',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/post',  ),));
    }

    private function get_post_unreologizeRouteInfo()
    {
        return array(array (  0 => 'postId',  1 => 'ologyId',  2 => 'userId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::unReOlogize',), array (  'postId' => '\\d+',  'ologyId' => '\\d+',  'userId' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/unreologize',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'userId',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'ologyId',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'postId',  ),  4 =>   array (    0 => 'text',    1 => '/svc/post',  ),));
    }

    private function get_post_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::deletePost',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/post',  ),));
    }

    private function get_post_getRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::getPost',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/get',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/post',  ),));
    }

    private function get_post_comm_getRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::getPostWithComments',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/get/c',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/post',  ),));
    }

    private function get_post_recentRouteInfo()
    {
        return array(array (  0 => 'offset',  1 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::getMostRecent',), array (  'n' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offset',  ),  2 =>   array (    0 => 'text',    1 => '/svc/post/get/recent',  ),));
    }

    private function get_post_mostcommentedRouteInfo()
    {
        return array(array (  0 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::getMostCommented',), array (  'n' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'n',  ),  2 =>   array (    0 => 'text',    1 => '/svc/post/get/mostcom',  ),));
    }

    private function get_post_getbyuserRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'offset',  2 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::getPostsWrittenByUser',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offset',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  3 =>   array (    0 => 'text',    1 => '/svc/post/get/user',  ),));
    }

    private function getsvc_post_getbyologiesRouteInfo()
    {
        return array(array (  0 => 'ologyIds',  1 => 'offset',  2 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::getPostsForOlogiesHomePage',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offset',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'ologyIds',  ),  3 =>   array (    0 => 'text',    1 => '/svc/post/get/ologies',  ),));
    }

    private function getsvc_post_getforologyRouteInfo()
    {
        return array(array (  0 => 'id',  1 => 'offset',  2 => 'n',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::getPostsForOlogy',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'n',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offset',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  3 =>   array (    0 => 'text',    1 => '/svc/post/get/ology',  ),));
    }

    private function get_post_isauthorizedRouteInfo()
    {
        return array(array (  0 => 'postId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::isAuthorizedToEditOrDelete',), array (  'postId' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/canEdit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'postId',  ),  2 =>   array (    0 => 'text',    1 => '/svc/post',  ),));
    }

    private function get_store_ologize_postRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storeOlogizePost',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/post/store_ologize_post',  ),));
    }

    private function get_store_ologize_thanksRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storeOlogizeThanks',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/svc/post/store_ologize_thanks',  ),));
    }

    private function get_post_loveRouteInfo()
    {
        return array(array (  0 => 'postId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostLove',), array (  'postId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'postId',  ),  1 =>   array (    0 => 'text',    1 => '/svc/likes/love',  ),));
    }

    private function get_post_unloveRouteInfo()
    {
        return array(array (  0 => 'postId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostUnLove',), array (  'postId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'postId',  ),  1 =>   array (    0 => 'text',    1 => '/svc/likes/unlove',  ),));
    }

    private function get_post_hateRouteInfo()
    {
        return array(array (  0 => 'postId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostHate',), array (  'postId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'postId',  ),  1 =>   array (    0 => 'text',    1 => '/svc/likes/hate',  ),));
    }

    private function get_post_unhateRouteInfo()
    {
        return array(array (  0 => 'postId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostUnHate',), array (  'postId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'postId',  ),  1 =>   array (    0 => 'text',    1 => '/svc/likes/unhate',  ),));
    }

    private function get_post_hmmRouteInfo()
    {
        return array(array (  0 => 'postId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostHmm',), array (  'postId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'postId',  ),  1 =>   array (    0 => 'text',    1 => '/svc/likes/hmm',  ),));
    }

    private function get_post_unhmmRouteInfo()
    {
        return array(array (  0 => 'postId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostUnHmm',), array (  'postId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'postId',  ),  1 =>   array (    0 => 'text',    1 => '/svc/likes/unhmm',  ),));
    }

    private function get_post_offline_loveRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostOfflineLove',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/likes/offline_love',  ),));
    }

    private function get_post_offline_hateRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostOfflineHate',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/likes/offline_hate',  ),));
    }

    private function get_post_offline_hmmRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostOfflineHmm',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/likes/offline_hmm',  ),));
    }

    private function get_comment_on_post_formRouteInfo()
    {
        return array(array (  0 => 'postId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::displayCommentOnPostForm',), array (  'postId' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'postId',  ),  1 =>   array (    0 => 'text',    1 => '/svc/comment/form',  ),));
    }

    private function get_remember_comment_offlineRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::ajaxStoreCommentContent',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/comment/rcom',  ),));
    }

    private function get_comment_store_ajaxRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::storeCommentInline',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/comment/store_ajax',  ),));
    }

    private function get_comment_storeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::storeCommentPostPage',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/comment/store',  ),));
    }

    private function get_comment_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::updateAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/comment',  ),));
    }

    private function get_comment_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::deleteComment',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/comment',  ),));
    }

    private function get_comment_getRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::getComment',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/get',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/comment',  ),));
    }

    private function get_comment_getcommentforpostRouteInfo()
    {
        return array(array (  0 => 'n',  1 => 'postId',  2 => 'offet',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::getCommentForPost',), array (  'offset' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'offet',  ),  1 =>   array (    0 => 'text',    1 => '/post/starting',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'postId',  ),  3 =>   array (    0 => 'text',    1 => '/comment/for',  ),  4 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'n',  ),  5 =>   array (    0 => 'text',    1 => '/svc/comment/get',  ),));
    }

    private function get_comment_getcommentforuserRouteInfo()
    {
        return array(array (  0 => 'n',  1 => 'userId',  2 => 'offset',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::getCommentForUser',), array (  'offset' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'offset',  ),  1 =>   array (    0 => 'text',    1 => '/user/staring',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'userId',  ),  3 =>   array (    0 => 'text',    1 => '/comment/for',  ),  4 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'n',  ),  5 =>   array (    0 => 'text',    1 => '/svc/comment/get',  ),));
    }

    private function get_comment_isauthorizedRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::isAuthorizedToEditOrDelete',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/canEdit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/svc/comment',  ),));
    }

    private function get_website_last_pageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::redirectToPageIdInSession',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/comment/lastPage',  ),));
    }

    private function get_all_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::searchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/search/all',  ),));
    }

    private function get_ology_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::searchOlogyAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/search/ology',  ),));
    }

    private function get_post_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::searchPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/search/post',  ),));
    }

    private function get_user_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::searchUserAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/search/user',  ),));
    }

    private function get_get_all_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::makeSearchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/search/get',  ),));
    }

    private function get_get_user_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::makeSearchUser',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/search/get/user',  ),));
    }

    private function get_get_ology_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::makeSearchOlogy',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/search/get/ology',  ),));
    }

    private function get_get_post_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::makeSearchPost',), array (), array (  0 =>   array (    0 => 'text',    1 => '/svc/search/get/post',  ),));
    }

    private function get_follow_no_stashesRouteInfo()
    {
        return array(array (  0 => 'followeeID',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\FollowController::followStashes',), array (), array (  0 =>   array (    0 => 'text',    1 => '/stashes/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'followeeID',  ),  2 =>   array (    0 => 'text',    1 => '/svc/follow',  ),));
    }

    private function get_follow_stashesRouteInfo()
    {
        return array(array (  0 => 'followeeID',  1 => 'stashesIds',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\FollowController::followStashes',), array (  'followeeID' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'stashesIds',  ),  1 =>   array (    0 => 'text',    1 => '/stashes',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'followeeID',  ),  3 =>   array (    0 => 'text',    1 => '/svc/follow',  ),));
    }

    private function get_follow_no_ologiesRouteInfo()
    {
        return array(array (  0 => 'followeeID',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\FollowController::followOlogies',), array (), array (  0 =>   array (    0 => 'text',    1 => '/ologies/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'followeeID',  ),  2 =>   array (    0 => 'text',    1 => '/svc/follow',  ),));
    }

    private function get_follow_ologiesRouteInfo()
    {
        return array(array (  0 => 'followeeID',  1 => 'ologiesIds',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\FollowController::followOlogies',), array (  'followeeID' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'ologiesIds',  ),  1 =>   array (    0 => 'text',    1 => '/ologies',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'followeeID',  ),  3 =>   array (    0 => 'text',    1 => '/svc/follow',  ),));
    }

    private function get_followees_pageRouteInfo()
    {
        return array(array (  0 => 'userId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\FollowController::getFolloweesPage',), array (  'userId' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/followees',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'userId',  ),  2 =>   array (    0 => 'text',    1 => '/svc/follow',  ),));
    }

    private function get_followers_pageRouteInfo()
    {
        return array(array (  0 => 'userId',), array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\FollowController::getFollowersPage',), array (  'userId' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/followers',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'userId',  ),  2 =>   array (    0 => 'text',    1 => '/svc/follow',  ),));
    }

    private function getfos_user_security_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login',  ),));
    }

    private function getfos_user_security_checkRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login_check',  ),));
    }

    private function getfos_user_security_logoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/logout',  ),));
    }

    private function getfos_user_profile_showRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/profile/',  ),));
    }

    private function getfos_user_profile_editRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/profile/edit',  ),));
    }

    private function getfos_user_registration_registerRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\UserBundle\\Controller\\RegistrationController::registerAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/register/',  ),));
    }

    private function getfos_user_registration_check_emailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\UserBundle\\Controller\\RegistrationController::checkEmailAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/register/check-email',  ),));
    }

    private function getfos_user_registration_confirmRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Ology\\UserBundle\\Controller\\RegistrationController::confirmAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/register/confirm',  ),));
    }

    private function getfos_user_registration_confirmedRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\UserBundle\\Controller\\RegistrationController::confirmedAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/register/confirmed',  ),));
    }

    private function getfos_user_resetting_requestRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\UserBundle\\Controller\\ResettingController::requestAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/resetting/request',  ),));
    }

    private function getfos_user_resetting_send_emailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\UserBundle\\Controller\\ResettingController::sendEmailAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/resetting/send-email',  ),));
    }

    private function getfos_user_resetting_check_emailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Ology\\UserBundle\\Controller\\ResettingController::checkEmailAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/resetting/check-email',  ),));
    }

    private function getfos_user_resetting_resetRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Ology\\UserBundle\\Controller\\ResettingController::resetAction',), array (  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/resetting/reset',  ),));
    }

    private function getfos_user_change_passwordRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',), array (  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'text',    1 => '/change-password/change-password',  ),));
    }

    private function get_security_checkRouteInfo()
    {
        return array(array (), array (), array (), array (  0 =>   array (    0 => 'text',    1 => '/facebook/check',  ),));
    }

    private function get_security_logoutRouteInfo()
    {
        return array(array (), array (), array (), array (  0 =>   array (    0 => 'text',    1 => '/logout',  ),));
    }

    private function get_login_checkRouteInfo()
    {
        return array(array (), array (), array (), array (  0 =>   array (    0 => 'text',    1 => '/login_check',  ),));
    }
}
