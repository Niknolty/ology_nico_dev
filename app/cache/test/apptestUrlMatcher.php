<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * apptestUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class apptestUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = urldecode($pathinfo);

        // _wdt
        if (preg_match('#^/_wdt/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+?)\\.txt$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)/search/results$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        // _exception
        if ($pathinfo === '/error') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Exception\\ExceptionController::showAction',  '_route' => '_exception',);
        }

        if (0 === strpos($pathinfo, '/stats')) {
            // _stats_general
            if (rtrim($pathinfo, '/') === '/stats') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_stats_general');
                }
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getGeneralPage',  '_route' => '_stats_general',);
            }

            // _stats_invites
            if ($pathinfo === '/stats/inv') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getInvitePage',  '_route' => '_stats_invites',);
            }

            // _stats_posts
            if ($pathinfo === '/stats/posts') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getPostsPage',  '_route' => '_stats_posts',);
            }

            // _stats_comments
            if ($pathinfo === '/stats/comments') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getCommentsPage',  '_route' => '_stats_comments',);
            }

            // _stats_notifs
            if ($pathinfo === '/stats/notifs') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getNotifsPage',  '_route' => '_stats_notifs',);
            }

            // _stats_ologies
            if ($pathinfo === '/stats/ologies') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getOlogiesPage',  '_route' => '_stats_ologies',);
            }

            // _stats_users
            if ($pathinfo === '/stats/users') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getUsersPage',  '_route' => '_stats_users',);
            }

            // _stats_all_users
            if ($pathinfo === '/stats/users/all') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getAllUsersPage',  '_route' => '_stats_all_users',);
            }

            // _stats_labels
            if ($pathinfo === '/stats/labels') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getLabelsPage',  '_route' => '_stats_labels',);
            }

            // _stats_follow
            if ($pathinfo === '/stats/follow') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getFollowPage',  '_route' => '_stats_follow',);
            }

            // _stats_followees
            if ($pathinfo === '/stats/follow/followees') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getTopUsersFollowees',  '_route' => '_stats_followees',);
            }

            // _stats_followers
            if ($pathinfo === '/stats/follow/followers') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Stats\\StatsController::getTopUsersFollowers',  '_route' => '_stats_followers',);
            }

        }

        // _website_old_group
        if (preg_match('#^/groups/(?P<groupId>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\OldGroupController::getOldGroup',)), array('_route' => '_website_old_group'));
        }

        if (0 === strpos($pathinfo, '/editors/post')) {
            // _editors_post_form
            if (rtrim($pathinfo, '/') === '/editors/post') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_editors_post_form');
                }
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::getCreatePostPage',  '_route' => '_editors_post_form',);
            }

            // _editors_post_edit_form
            if (0 === strpos($pathinfo, '/editors/post/edit') && preg_match('#^/editors/post/edit/(?P<id>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::getCreatePostPage',)), array('_route' => '_editors_post_edit_form'));
            }

            // _editors_post_edit_pp_form
            if (0 === strpos($pathinfo, '/editors/post/edit') && preg_match('#^/editors/post/edit/(?P<id>[^/]+?)/(?P<postPublish>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::getCreatePostPage',)), array('_route' => '_editors_post_edit_pp_form'));
            }

            // _editors_post_list
            if ($pathinfo === '/editors/post/list') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::getPostListPage',  '_route' => '_editors_post_list',);
            }

            // _editors_post_pic_form
            if ($pathinfo === '/editors/post/pic') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::getCreatePicForm',  '_route' => '_editors_post_pic_form',);
            }

            // _editors_post_store
            if ($pathinfo === '/editors/post/save') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::storePost',  '_route' => '_editors_post_store',);
            }

            // _editors_post_pic_store
            if ($pathinfo === '/editors/post/pic/save') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::storePic',  '_route' => '_editors_post_pic_store',);
            }

            // _pro_post_delete
            if (0 === strpos($pathinfo, '/editors/post/del') && preg_match('#^/editors/post/del/(?P<id>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\PostController::deletePost',)), array('_route' => '_pro_post_delete'));
            }

        }

        if (0 === strpos($pathinfo, '/editors/channel')) {
            // _editors_channel_list
            if ($pathinfo === '/editors/channel/list') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\ChannelController::getListChannelPage',  '_route' => '_editors_channel_list',);
            }

            // _editors_channel_edit_form
            if (0 === strpos($pathinfo, '/editors/channel/edit') && preg_match('#^/editors/channel/edit/(?P<stub>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\ChannelController::getEditChannelPage',)), array('_route' => '_editors_channel_edit_form'));
            }

            // _editors_channel_store
            if ($pathinfo === '/editors/channel/save') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\ChannelController::storeChannel',  '_route' => '_editors_channel_store',);
            }

            // _editors_channel_add_post
            if (rtrim($pathinfo, '/') === '/editors/channel/curate') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_editors_channel_add_post');
                }
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\ChannelController::curatePost',  '_route' => '_editors_channel_add_post',);
            }

            // _editors_channel_remove_post
            if (rtrim($pathinfo, '/') === '/editors/channel/uncurate') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_editors_channel_remove_post');
                }
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\ChannelController::unCuratePost',  '_route' => '_editors_channel_remove_post',);
            }

            // _sponsor_store
            if ($pathinfo === '/editors/channel/sponsor/store') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\ChannelController::storeSponsor',  '_route' => '_sponsor_store',);
            }

            // _sponsor_display
            if ($pathinfo === '/editors/channel/sponsor') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Editorial\\ChannelController::displaySponsorPage',  '_route' => '_sponsor_display',);
            }

        }

        // _website_post
        if (0 === strpos($pathinfo, '/post') && preg_match('#^/post/(?P<postId>\\d+)(?:/(?P<slug>[^/]+?))?$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  'slug' => '',  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getPostPage',)), array('_route' => '_website_post'));
        }

        // _website_post_ajax_comments
        if (0 === strpos($pathinfo, '/post-comments') && preg_match('#^/post\\-comments/(?P<postId>\\d+)/(?P<slug>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::ajaxGetComments',)), array('_route' => '_website_post_ajax_comments'));
        }

        // _website_postajaxcomments
        if (0 === strpos($pathinfo, '/postComments') && preg_match('#^/postComments/(?P<postId>\\d+)/(?P<slug>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::ajaxGetPostComments',)), array('_route' => '_website_postajaxcomments'));
        }

        // _website_post_ajax_grab
        if (0 === strpos($pathinfo, '/gi') && preg_match('#^/gi/(?P<url>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::ajaxGrabImage',)), array('_route' => '_website_post_ajax_grab'));
        }

        // _website_create
        if ($pathinfo === '/create') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getCreatePage',  '_route' => '_website_create',);
        }

        // _website_create_ology
        if ($pathinfo === '/create/ology') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getCreateOlogyPage',  '_route' => '_website_create_ology',);
        }

        // _website_create_ology_byname
        if (0 === strpos($pathinfo, '/create/ology') && preg_match('#^/create/ology/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getCreateOlogyPage',)), array('_route' => '_website_create_ology_byname'));
        }

        // _website_create_stash
        if ($pathinfo === '/create/stash') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getCreateStashPage',  '_route' => '_website_create_stash',);
        }

        // _website_update_ology
        if (0 === strpos($pathinfo, '/update') && preg_match('#^/update/(?P<id>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getUpdateOlogyPage',)), array('_route' => '_website_update_ology'));
        }

        // _website_terms
        if ($pathinfo === '/terms') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getTerms',  '_route' => '_website_terms',);
        }

        // _website_faq
        if ($pathinfo === '/faq') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getfaq',  '_route' => '_website_faq',);
        }

        // _website_ologist
        if (0 === strpos($pathinfo, '/ologist') && preg_match('#^/ologist/(?P<id>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getOlogist',)), array('_route' => '_website_ologist'));
        }

        // _website_post_by_old_id
        if (0 === strpos($pathinfo, '/node') && preg_match('#^/node/(?P<old_id>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getPostPageByOldId',)), array('_route' => '_website_post_by_old_id'));
        }

        // _website_post_by_old_alias
        if (preg_match('#^/(?P<channel>arts|breaking-dawn|cheese|dew|first|gifts|humor|politics|shake-things|sports|summer|summer-test|truth|tv|vampire|screen|music|celebs-and-gossip|fashion-and-beauty|technology|\\[field_channel-term-raw\\])/(?P<slug>[^/]+?)/(?P<date>[\\d-]+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getPostPageByOldAlias',)), array('_route' => '_website_post_by_old_alias'));
        }

        // _website_post_by_old_alias1
        if (preg_match('#^/(?P<slug>[^/]+?)/(?P<date>[\\d]{8})$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getPostPageByOldAlias1',)), array('_route' => '_website_post_by_old_alias1'));
        }

        // _website_post_by_old_alias2
        if (preg_match('#^/(?P<channel>movie-reviews|arts|breaking-dawn|cheese|dew|first|gifts|humor|politics|shake-things|sports|summer|summer-test|truth|tv|vampire|screen|music|celebs-and-gossip|fashion-and-beauty|technology|\\[field_channel-term-raw\\])/(?P<slug>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getPostPageByOldAlias2',)), array('_route' => '_website_post_by_old_alias2'));
        }

        // _website_manual_log_out
        if ($pathinfo === '/lgot') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::logOut',  '_route' => '_website_manual_log_out',);
        }

        // _post_up_pic
        if (rtrim($pathinfo, '/') === '/post/up/pic') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_post_up_pic');
            }
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::uploadPicForPost',  '_route' => '_post_up_pic',);
        }

        // _website_tip_stop
        if ($pathinfo === '/tip/stop') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not__website_tip_stop;
            }
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::stopTipsPrompt',  '_route' => '_website_tip_stop',);
        }
        not__website_tip_stop:

        // _website_tip
        if (0 === strpos($pathinfo, '/tip') && preg_match('#^/tip/(?P<page>home|ology|settings|profile|post|media|edit)/(?P<currentTipId>\\d+)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not__website_tip;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_format' => 'json',  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getNextTipId',)), array('_route' => '_website_tip'));
        }
        not__website_tip:

        // _post_reologize_popup
        if (0 === strpos($pathinfo, '/reologize/popup') && preg_match('#^/reologize/popup/(?P<id>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getReOlogizePopup',)), array('_route' => '_post_reologize_popup'));
        }

        // _post_reologize_success_popup
        if (0 === strpos($pathinfo, '/reologize/popup/success') && preg_match('#^/reologize/popup/success/(?P<postId>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::getReOlogizeSuccessPopup',)), array('_route' => '_post_reologize_success_popup'));
        }

        // _post_reologize_ologies_stashes
        if (0 === strpos($pathinfo, '/reologize') && preg_match('#^/reologize/(?P<postId>\\d+)/(?P<stashesIds>[^/]+?)/(?P<ologiesIds>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\WebsiteController::reOlogizeStashesAndOlogies',)), array('_route' => '_post_reologize_ologies_stashes'));
        }

        // _website_ology_invite
        if (0 === strpos($pathinfo, '/ology') && preg_match('#^/ology/(?P<id>[^/]+?)/inv/(?P<inviteId>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\OlogyPageController::getOlogyPage',)), array('_route' => '_website_ology_invite'));
        }

        // _website_ology
        if (0 === strpos($pathinfo, '/ology') && preg_match('#^/ology/(?P<id>\\d+)(?:/(?P<slug>[^/]+?))?$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  'slug' => 'ology',  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\OlogyPageController::getOlogyPage',)), array('_route' => '_website_ology'));
        }

        // _website_ology_pag
        if (0 === strpos($pathinfo, '/ology') && preg_match('#^/ology/(?P<id>\\d+)/(?P<slug>[^/]+?)/(?P<offset>\\d+)/(?P<n>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\OlogyPageController::getOlogyPagePaginated',)), array('_route' => '_website_ology_pag'));
        }

        // _website_stash
        if (0 === strpos($pathinfo, '/stash') && preg_match('#^/stash/(?P<id>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\StashPageController::getStashPage',)), array('_route' => '_website_stash'));
        }

        // _website_stash_pag
        if (0 === strpos($pathinfo, '/stash') && preg_match('#^/stash/(?P<id>\\d+)/(?P<offset>\\d+)/(?P<n>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\StashPageController::getStashPagePaginated',)), array('_route' => '_website_stash_pag'));
        }

        // _stash_unstash
        if (0 === strpos($pathinfo, '/stash') && preg_match('#^/stash/(?P<stashId>[^/]+?)/unstash/(?P<postId>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\StashPageController::unStash',)), array('_route' => '_stash_unstash'));
        }

        // _stash_delete
        if (0 === strpos($pathinfo, '/stash') && preg_match('#^/stash/(?P<stashId>\\d+)/delete$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\StashPageController::deleteStash',)), array('_route' => '_stash_delete'));
        }

        // _website_channel
        if (0 === strpos($pathinfo, '/channel') && preg_match('#^/channel/(?P<stub>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ChannelPageController::getChannelPage',)), array('_route' => '_website_channel'));
        }

        // _website_channel_pag
        if (0 === strpos($pathinfo, '/channel') && preg_match('#^/channel/(?P<stub>[^/]+?)/(?P<offset>[^/]+?)/(?P<n>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ChannelPageController::getChannelPagePaginated',)), array('_route' => '_website_channel_pag'));
        }

        // _website_channel_subscription
        if (0 === strpos($pathinfo, '/channel/subscription') && preg_match('#^/channel/subscription/(?P<channelId>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ChannelPageController::ajaxSubscribesToChannel',)), array('_route' => '_website_channel_subscription'));
        }

        // _remember_core_ology_offline
        if (preg_match('#^/(?P<id>[^/]+?)/offlineCoreOlogyJoin$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ChannelPageController::ajaxSubscribesToChannelOffline',)), array('_route' => '_remember_core_ology_offline'));
        }

        // _website_channel_unsubscription
        if (0 === strpos($pathinfo, '/channel/unsubscription') && preg_match('#^/channel/unsubscription/(?P<channelId>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ChannelPageController::ajaxUnsubscribesToChannel',)), array('_route' => '_website_channel_unsubscription'));
        }

        // _website_home
        if ($pathinfo === '/home') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\HomePageController::getHomePage',  '_route' => '_website_home',);
        }

        // _website_undo_auto_join
        if (0 === strpos($pathinfo, '/home/undo') && preg_match('#^/home/undo/(?P<ids>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\HomePageController::undoAutoJoin',)), array('_route' => '_website_undo_auto_join'));
        }

        // _website_home_pag
        if (0 === strpos($pathinfo, '/home') && preg_match('#^/home/(?P<offset>[^/]+?)/(?P<n>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\HomePageController::getHomePagePaginated',)), array('_route' => '_website_home_pag'));
        }

        // _website_search
        if ($pathinfo === '/search') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SearchController::getSearchPage',  '_route' => '_website_search',);
        }

        // _search_all_link
        if (0 === strpos($pathinfo, '/all') && preg_match('#^/all/(?P<term>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SearchController::searchViaLinks',)), array('_route' => '_search_all_link'));
        }

        // _website_splash
        if ($pathinfo === '/splash') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SplashPageController::getSplashPage',  '_route' => '_website_splash',);
        }

        // _website_splash_invite_general
        if (0 === strpos($pathinfo, '/splash') && preg_match('#^/splash/(?P<inviteId>\\d+)/?$#xs', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_website_splash_invite_general');
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SplashPageController::getSplashPage',)), array('_route' => '_website_splash_invite_general'));
        }

        // _website_splash_2
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_website_splash_2');
            }
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SplashPageController::getSplashPage',  '_route' => '_website_splash_2',);
        }

        // _website_splash_pag
        if (0 === strpos($pathinfo, '/splash') && preg_match('#^/splash/(?P<offset>[^/]+?)/(?P<n>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SplashPageController::getSplashPagePaginated',)), array('_route' => '_website_splash_pag'));
        }

        // _ologies_autocomplete_ajax
        if ($pathinfo === '/ologies') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SplashPageController::autoCompleteOlogies',  '_route' => '_ologies_autocomplete_ajax',);
        }

        // _website_splash_ology_pag
        if (0 === strpos($pathinfo, '/splash') && preg_match('#^/splash/(?P<offset>\\d+)/(?P<n>\\d+)/(?P<ologyPrefix>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\SplashPageController::getSplashPageByOlogyPaginated',)), array('_route' => '_website_splash_ology_pag'));
        }

        // _website_explore
        if (0 === strpos($pathinfo, '/explore') && preg_match('#^/explore(?:/(?P<sort>[^/]+?))?$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  'sort' => 'recent',  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ExplorePageController::getExplorePage',)), array('_route' => '_website_explore'));
        }

        // _website_explore_you_pag
        if (0 === strpos($pathinfo, '/explore') && preg_match('#^/explore/(?P<offset>\\d+)/(?P<n>\\d+)/you$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ExplorePageController::getPostsPaginatedYouForExplore',)), array('_route' => '_website_explore_you_pag'));
        }

        // _website_explore_pag
        if (0 === strpos($pathinfo, '/explore') && preg_match('#^/explore/(?P<offset>\\d+)/(?P<n>\\d+)/(?P<labels>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ExplorePageController::getPostsPaginatedLabelsForExplore',)), array('_route' => '_website_explore_pag'));
        }

        // _website_explore_recent_pag
        if (0 === strpos($pathinfo, '/explore') && preg_match('#^/explore/(?P<offset>\\d+)/(?P<n>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\ExplorePageController::getPostsPaginatedRecentForExplore',)), array('_route' => '_website_explore_recent_pag'));
        }

        // _website_invite
        if ($pathinfo === '/invite') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::getInvitePage',  '_route' => '_website_invite',);
        }

        // _website_invite_fb
        if ($pathinfo === '/invite/fb') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::getFacebookFriendsPage',  '_route' => '_website_invite_fb',);
        }

        // _website_invite_fb_redirect
        if ($pathinfo === '/invite/fb/red') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::updateUserToken',  '_route' => '_website_invite_fb_redirect',);
        }

        // _website_invite_gmail
        if ($pathinfo === '/invite/gmail') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::getGmailFriendsPage',  '_route' => '_website_invite_gmail',);
        }

        // _website_invite_fb_send
        if ($pathinfo === '/invite/fb/send') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::sendFbInvites',  '_route' => '_website_invite_fb_send',);
        }

        // _website_invite_gmail_send
        if ($pathinfo === '/invite/gmail/send') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::sendGmailInvites',  '_route' => '_website_invite_gmail_send',);
        }

        // _website_invite_send
        if ($pathinfo === '/invite/send') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::sendOlogyInvites',  '_route' => '_website_invite_send',);
        }

        // _website_invite_from_ology
        if (0 === strpos($pathinfo, '/invite') && preg_match('#^/invite/(?P<ologyId>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\InviteController::getOlogyInvitePage',)), array('_route' => '_website_invite_from_ology'));
        }

        // _website_profile
        if (0 === strpos($pathinfo, '/profile') && preg_match('#^/profile/(?P<id>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::getProfilePage',)), array('_route' => '_website_profile'));
        }

        // _website_user_ologies
        if (0 === strpos($pathinfo, '/profile') && preg_match('#^/profile/(?P<id>[^/]+?)/ologies$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxGetOlogies',)), array('_route' => '_website_user_ologies'));
        }

        // _website_user_stashes
        if (0 === strpos($pathinfo, '/profile') && preg_match('#^/profile/(?P<id>[^/]+?)/stashes$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxGetStashes',)), array('_route' => '_website_user_stashes'));
        }

        // _website_user_posts_pag
        if (0 === strpos($pathinfo, '/profile') && preg_match('#^/profile/(?P<id>[^/]+?)/posts/(?P<offset>[^/]+?)/(?P<n>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxGetPostsPaginated',)), array('_route' => '_website_user_posts_pag'));
        }

        // _website_settings
        if ($pathinfo === '/settings') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::getSettingsPage',  '_route' => '_website_settings',);
        }

        // _user_update
        if ($pathinfo === '/settings/g/update') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::updateSettings',  '_route' => '_user_update',);
        }

        // _user_update_notification
        if ($pathinfo === '/settings/n/update') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::updateNotification',  '_route' => '_user_update_notification',);
        }

        // _website_fb_likes
        if ($pathinfo === '/fblikes/load') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxImportFbData',  '_route' => '_website_fb_likes',);
        }

        // _website_fb_pic
        if ($pathinfo === '/settings/fbpic') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxImportFbPic',  '_route' => '_website_fb_pic',);
        }

        // _website_onboarding
        if (0 === strpos($pathinfo, '/onboarding') && preg_match('#^/onboarding/(?P<step>\\d+)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::onboardingAction',)), array('_route' => '_website_onboarding'));
        }

        // _website_follow_user_popup
        if (0 === strpos($pathinfo, '/follow') && preg_match('#^/follow/(?P<userId>\\d+)/popup$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxGetUserFollowPopup',)), array('_route' => '_website_follow_user_popup'));
        }

        // _website_follow_user_tooltip
        if (0 === strpos($pathinfo, '/follow') && preg_match('#^/follow/(?P<userId>\\d+)/tooltip$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxGetUserTooltip',)), array('_route' => '_website_follow_user_tooltip'));
        }

        // _website_follow_user_everywhere
        if (0 === strpos($pathinfo, '/follow') && preg_match('#^/follow/(?P<userId>\\d+)/everywhere$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxFollowUserEverywhere',)), array('_route' => '_website_follow_user_everywhere'));
        }

        // _website_unfollow_user_everywhere
        if (0 === strpos($pathinfo, '/unfollow') && preg_match('#^/unfollow/(?P<userId>\\d+)/everywhere$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\UserPageController::ajaxUnfollowEverything',)), array('_route' => '_website_unfollow_user_everywhere'));
        }

        // _website_register_redir
        if ($pathinfo === '/registerRedir') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::getRegister',  '_route' => '_website_register_redir',);
        }

        // _website_register
        if ($pathinfo === '/register') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::getregisterForm',  '_route' => '_website_register',);
        }

        // _website_register_invite_general
        if (0 === strpos($pathinfo, '/register/general') && preg_match('#^/register/general/(?P<inviteId>\\d+)/?$#xs', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_website_register_invite_general');
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::getregisterForm',)), array('_route' => '_website_register_invite_general'));
        }

        // _website_register_invite
        if (0 === strpos($pathinfo, '/register') && preg_match('#^/register/(?P<inviteId>\\d+)/(?P<ologyId>[^/]+?)/?$#xs', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_website_register_invite');
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::getregisterForm',)), array('_route' => '_website_register_invite'));
        }

        // _website_register_join
        if (0 === strpos($pathinfo, '/register/follow') && preg_match('#^/register/follow/(?P<ologyId>\\d+)/?$#xs', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_website_register_join');
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::getregisterForm',)), array('_route' => '_website_register_join'));
        }

        // _website_reset
        if ($pathinfo === '/reset') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::getResetForm',  '_route' => '_website_reset',);
        }

        // _website_facebook_check
        if ($pathinfo === '/facebook/check') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::facebookCheck',  '_route' => '_website_facebook_check',);
        }

        // _website_facebook_redirect
        if ($pathinfo === '/facebook/redirect') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::facebookRedirect',  '_route' => '_website_facebook_redirect',);
        }

        // _website_merge_facebook
        if ($pathinfo === '/facebook/merge') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::facebookMerge',  '_route' => '_website_merge_facebook',);
        }

        // _website_facebook_register
        if ($pathinfo === '/facebook/register') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::facebookRegisterEmail',  '_route' => '_website_facebook_register',);
        }

        // _website_login_redirect
        if ($pathinfo === '/login/redirect') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::regularLoginRedirect',  '_route' => '_website_login_redirect',);
        }

        // _website_twitter_redirect
        if ($pathinfo === '/twitter/redirect') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::twitterRedirect',  '_route' => '_website_twitter_redirect',);
        }

        // _website_merge_twitter
        if ($pathinfo === '/twitter/merge') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::twitterMerge',  '_route' => '_website_merge_twitter',);
        }

        // _website_twitter_register
        if ($pathinfo === '/twitter/register') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::twitterRegisterEmail',  '_route' => '_website_twitter_register',);
        }

        // _website_twitter_check
        if ($pathinfo === '/twitter/login') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::twitterLoginAction',  '_route' => '_website_twitter_check',);
        }

        // _ologize_post
        if ($pathinfo === '/ologize_post') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Website\\RegistrationController::ologizePost',  '_route' => '_ologize_post',);
        }

        // _admin_home
        if (rtrim($pathinfo, '/') === '/admhome') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_admin_home');
            }
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\AdminPageController::getHomePage',  '_route' => '_admin_home',);
        }

        if (0 === strpos($pathinfo, '/adm/cache')) {
            // _cache_subscriptions
            if ($pathinfo === '/adm/cache/sub') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::computeSubscriptions',  '_route' => '_cache_subscriptions',);
            }

            // _cache_inv
            if ($pathinfo === '/adm/cache/invalidate') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::invalidateAll',  '_route' => '_cache_inv',);
            }

            // _cache_ology_stats
            if ($pathinfo === '/adm/cache/stats') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::computeStats',  '_route' => '_cache_ology_stats',);
            }

            // _cache_all_posts
            if ($pathinfo === '/adm/cache/allposts') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheAllNecessaryPostInfo',  '_route' => '_cache_all_posts',);
            }

            // _cache_all_users
            if ($pathinfo === '/adm/cache/allusers') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheAllNecessaryUserInfo',  '_route' => '_cache_all_users',);
            }

            // _reset_topologist_redis
            if ($pathinfo === '/adm/cache/resetTopRedis') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::resetTopOlogistsRedis',  '_route' => '_reset_topologist_redis',);
            }

            // _cache_posts_cards
            if (0 === strpos($pathinfo, '/adm/cache/posts') && preg_match('#^/adm/cache/posts/(?P<offset>[^/]+?)/(?P<n>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cachePostsForCards',)), array('_route' => '_cache_posts_cards'));
            }

            // _cache_pc
            if (0 === strpos($pathinfo, '/adm/cache/pc') && preg_match('#^/adm/cache/pc/(?P<offset>[^/]+?)/(?P<n>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheChannelPosts',)), array('_route' => '_cache_pc'));
            }

            // _cache_related_posts
            if (0 === strpos($pathinfo, '/adm/cache/rp') && preg_match('#^/adm/cache/rp/(?P<offset>[^/]+?)/(?P<n>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheRelatedProPosts',)), array('_route' => '_cache_related_posts'));
            }

            // _cache_splash_posts
            if (0 === strpos($pathinfo, '/adm/cache/splash') && preg_match('#^/adm/cache/splash/(?P<offset>[^/]+?)/(?P<n>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheSplashPosts',)), array('_route' => '_cache_splash_posts'));
            }

            // _cache_most_viewed_posts
            if ($pathinfo === '/adm/cache/mostviewed') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheMostViewed',  '_route' => '_cache_most_viewed_posts',);
            }

            // _cache_post
            if (0 === strpos($pathinfo, '/adm/cache/post') && preg_match('#^/adm/cache/post/(?P<id>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cachePost',)), array('_route' => '_cache_post'));
            }

            // _cache_ology_posts
            if ($pathinfo === '/adm/cache/ologies') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheOlogyAndPosts',  '_route' => '_cache_ology_posts',);
            }

            // _cache_usersId_usersImg
            if ($pathinfo === '/adm/cache/usersIdandImg') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\CacheController::cacheUsers',  '_route' => '_cache_usersId_usersImg',);
            }

        }

        // _email_missyou
        if ($pathinfo === '/adm/mail/missyou') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\EmailController::sendWeMissYouEmails',  '_route' => '_email_missyou',);
        }

        // _adm_post_publish
        if ($pathinfo === '/adm/post/publish') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\PostController::publishScheduled',  '_route' => '_adm_post_publish',);
        }

        if (0 === strpos($pathinfo, '/adm/user')) {
            // _adm_set_su
            if (0 === strpos($pathinfo, '/adm/user/su') && preg_match('#^/adm/user/su/(?P<id>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\UserController::putAdmin',)), array('_route' => '_adm_set_su'));
            }

            // _adm_set_editor
            if (0 === strpos($pathinfo, '/adm/user/editor') && preg_match('#^/adm/user/editor/(?P<id>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\UserController::putEditor',)), array('_route' => '_adm_set_editor'));
            }

            // _adm_delete_user
            if (0 === strpos($pathinfo, '/adm/user/delete') && preg_match('#^/adm/user/delete/(?P<id>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\UserController::deleteUser',)), array('_route' => '_adm_delete_user'));
            }

            // _adm_disable_user
            if (0 === strpos($pathinfo, '/adm/user/disable') && preg_match('#^/adm/user/disable/(?P<id>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\UserController::disableUser',)), array('_route' => '_adm_disable_user'));
            }

        }

        if (0 === strpos($pathinfo, '/adm/ologies')) {
            // _featured_display
            if ($pathinfo === '/adm/ologies/featured') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\FeaturedController::displayFeaturedOlogies',  '_route' => '_featured_display',);
            }

            // _mostviewed_display
            if ($pathinfo === '/adm/ologies/mostviewed') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\FeaturedController::displayMostViewedPosts',  '_route' => '_mostviewed_display',);
            }

            // _blacklisted_display
            if ($pathinfo === '/adm/ologies/blacklisted') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\FeaturedController::displayBlacklistedOlogies',  '_route' => '_blacklisted_display',);
            }

            // _featured_store
            if ($pathinfo === '/adm/ologies/featured/store') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\FeaturedController::storeFeaturedOlogies',  '_route' => '_featured_store',);
            }

            // _blacklisted_store
            if ($pathinfo === '/adm/ologies/blacklisted/store') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\FeaturedController::storeBlacklistedOlogies',  '_route' => '_blacklisted_store',);
            }

            // _mostviewed_store
            if ($pathinfo === '/adm/ologies/mostviewed/store') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\FeaturedController::storeMostViewedPosts',  '_route' => '_mostviewed_store',);
            }

        }

        if (0 === strpos($pathinfo, '/adm/import')) {
            // _resize_sma
            if ($pathinfo === '/adm/import/resize/img/sma') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::resizeImgSmall',  '_route' => '_resize_sma',);
            }

            // _all_import
            if ($pathinfo === '/adm/import/all') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importAll',  '_route' => '_all_import',);
            }

            // _user_import
            if ($pathinfo === '/adm/import/user') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importUsers',  '_route' => '_user_import',);
            }

            // _user_ologies_import
            if ($pathinfo === '/adm/import/ology') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importOlogy',  '_route' => '_user_ologies_import',);
            }

            // _postology_import
            if ($pathinfo === '/adm/import/postology') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importPostOlogy',  '_route' => '_postology_import',);
            }

            // _post_import
            if ($pathinfo === '/adm/import/post') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importPostOnly',  '_route' => '_post_import',);
            }

            // _comment_import
            if ($pathinfo === '/adm/import/comment') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importComment',  '_route' => '_comment_import',);
            }

            // _comment_son_import
            if ($pathinfo === '/adm/import/comment_son') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importCommentSon',  '_route' => '_comment_son_import',);
            }

            // _membership_import
            if ($pathinfo === '/adm/import/membership') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::importMembership',  '_route' => '_membership_import',);
            }

            // _move_all_
            if ($pathinfo === '/adm/import/move/all') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::move_files',  '_route' => '_move_all_',);
            }

            // _move_user_
            if ($pathinfo === '/adm/import/move/user') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::move_user_files',  '_route' => '_move_user_',);
            }

            // _move_posts_
            if ($pathinfo === '/adm/import/move/post') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::move_post_files',  '_route' => '_move_posts_',);
            }

            // _move_ology_
            if ($pathinfo === '/adm/import/move/ology') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::move_ology_files',  '_route' => '_move_ology_',);
            }

            // _move_post_
            if ($pathinfo === '/adm/import/move/post/audio') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\Admin\\ImportController::move_post_audio_files',  '_route' => '_move_post_',);
            }

        }

        if (0 === strpos($pathinfo, '/svc/ology')) {
            // _ology_debug
            if ($pathinfo === '/svc/ology/debug') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::debug',  '_route' => '_ology_debug',);
            }

            // _ology_form
            if ($pathinfo === '/svc/ology/form') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::displayOlogyForm',  '_route' => '_ology_form',);
            }

            // _ology_store
            if ($pathinfo === '/svc/ology/create') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::storeOlogy',  '_route' => '_ology_store',);
            }

            // _ology_edit
            if (preg_match('#^/svc/ology/(?P<id>\\d+)/edit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::editAction',)), array('_route' => '_ology_edit'));
            }

            // _ology_get
            if (preg_match('#^/svc/ology/(?P<id>\\d+)/get$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::getOlogy',)), array('_route' => '_ology_get'));
            }

            // _ology_delete
            if (preg_match('#^/svc/ology/(?P<id>\\d+)/delete$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::deleteOlogy',)), array('_route' => '_ology_delete'));
            }

            // _ology_getologies
            if ($pathinfo === '/svc/ology/all/get') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::getOlogies',  '_route' => '_ology_getologies',);
            }

            // _ology_tag
            if (0 === strpos($pathinfo, '/svc/ology/admin') && preg_match('#^/svc/ology/admin/(?P<id>\\d+)/tag/(?P<label_name>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::tagOlogy',)), array('_route' => '_ology_tag'));
            }

            // _ology_labels_recent
            if (0 === strpos($pathinfo, '/svc/ology/get/recent') && preg_match('#^/svc/ology/get/recent/(?P<offset>[^/]+?)/(?P<n>[^/]+?)/labels$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::getRecentOlogiesByLabels',)), array('_route' => '_ology_labels_recent'));
            }

            // _ology_label_recent
            if (0 === strpos($pathinfo, '/svc/ology/get/recent') && preg_match('#^/svc/ology/get/recent/(?P<offset>[^/]+?)/(?P<n>[^/]+?)/label/(?P<label_id>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::getRecentOlogiesByLabel',)), array('_route' => '_ology_label_recent'));
            }

            // _ology_most_users
            if (0 === strpos($pathinfo, '/svc/ology/get/mostusers') && preg_match('#^/svc/ology/get/mostusers/(?P<n>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::getMostOlogists',)), array('_route' => '_ology_most_users'));
            }

            // _ology_recent
            if (0 === strpos($pathinfo, '/svc/ology/get/recent') && preg_match('#^/svc/ology/get/recent/(?P<offset>[^/]+?)/(?P<n>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::getRecentOlogies',)), array('_route' => '_ology_recent'));
            }

            // _ology_join
            if (preg_match('#^/svc/ology/(?P<id>[^/]+?)/join$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::joinOlogy',)), array('_route' => '_ology_join'));
            }

            // _remember_join_offline
            if (preg_match('#^/svc/ology/(?P<id>[^/]+?)/rjoin$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::ajaxStoreJoinOlogy',)), array('_route' => '_remember_join_offline'));
            }

            // _ology_leave
            if (preg_match('#^/svc/ology/(?P<id>[^/]+?)/leave$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::leaveOlogy',)), array('_route' => '_ology_leave'));
            }

            // _ology_users
            if (preg_match('#^/svc/ology/(?P<id>\\d+)/users/(?P<n>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::getUsers',)), array('_route' => '_ology_users'));
            }

            // _ology_isauthorized
            if (preg_match('#^/svc/ology/(?P<id>\\d+)/canEdit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\OlogyController::isAuthorizedToEditOrDelete',)), array('_route' => '_ology_isauthorized'));
            }

        }

        if (0 === strpos($pathinfo, '/svc/user')) {
            // _user_create
            if ($pathinfo === '/svc/user/create') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\UserController::createAction',  '_route' => '_user_create',);
            }

            // _user_delete
            if (0 === strpos($pathinfo, '/svc/user/delete') && preg_match('#^/svc/user/delete/(?P<id>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\UserController::deleteAction',)), array('_route' => '_user_delete'));
            }

            // _user_get
            if (0 === strpos($pathinfo, '/svc/user/get') && preg_match('#^/svc/user/get/(?P<id>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\UserController::getAction',)), array('_route' => '_user_get'));
            }

            // _user_ologies
            if (preg_match('#^/svc/user/(?P<id>\\d+)/ologies/(?P<n>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\UserController::getOlogies',)), array('_route' => '_user_ologies'));
            }

        }

        if (0 === strpos($pathinfo, '/svc/stash')) {
            // _stash_create
            if ($pathinfo === '/svc/stash/create') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\StashController::createStash',  '_route' => '_stash_create',);
            }

            // _ajax_stash_edit
            if (0 === strpos($pathinfo, '/svc/stash/edit') && preg_match('#^/svc/stash/edit/(?P<id>[^/]+?)/(?P<newName>[^/]+?)/(?P<newTags>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\StashController::ajaxEditStash',)), array('_route' => '_ajax_stash_edit'));
            }

        }

        // _tags_autocomplete_ajax
        if ($pathinfo === '/svc/tag/getAjaxTags') {
            return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\TagController::autoCompleteTags',  '_route' => '_tags_autocomplete_ajax',);
        }

        if (0 === strpos($pathinfo, '/svc/post')) {
            // _text_post_form
            if (0 === strpos($pathinfo, '/svc/post/form/text') && preg_match('#^/svc/post/form/text/(?P<ologyId>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::displayTextPostForm',)), array('_route' => '_text_post_form'));
            }

            // _audio_post_form
            if (0 === strpos($pathinfo, '/svc/post/form/audio') && preg_match('#^/svc/post/form/audio/(?P<ologyId>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::displayAudioPostForm',)), array('_route' => '_audio_post_form'));
            }

            // _image_post_form
            if (0 === strpos($pathinfo, '/svc/post/form/image') && preg_match('#^/svc/post/form/image/(?P<ologyId>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::displayImagePostForm',)), array('_route' => '_image_post_form'));
            }

            // _video_post_form
            if (0 === strpos($pathinfo, '/svc/post/form/video') && preg_match('#^/svc/post/form/video/(?P<ologyId>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::displayVideoPostForm',)), array('_route' => '_video_post_form'));
            }

            // _post_store_obj
            if ($pathinfo === '/svc/post/storeo') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storePostWithOlogyObject',  '_route' => '_post_store_obj',);
            }

            // _post_store_id
            if ($pathinfo === '/svc/post/storei') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storePostWithOlogyId',  '_route' => '_post_store_id',);
            }

            // _remember_post_offline
            if ($pathinfo === '/svc/post/rpost') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::ajaxStorePostContent',  '_route' => '_remember_post_offline',);
            }

            // _post_store_text
            if ($pathinfo === '/svc/post/store/text') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storeTextPost',  '_route' => '_post_store_text',);
            }

            // _post_store_image
            if ($pathinfo === '/svc/post/store/image') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storeImagePost',  '_route' => '_post_store_image',);
            }

            // _post_store_audio
            if ($pathinfo === '/svc/post/store/audio') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storeAudioPost',  '_route' => '_post_store_audio',);
            }

            // _post_store_video
            if ($pathinfo === '/svc/post/store/video') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storeVideoPost',  '_route' => '_post_store_video',);
            }

            // _post_edit_id
            if (preg_match('#^/svc/post/(?P<id>\\d+)/editi$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::editPostWithOlogyId',)), array('_route' => '_post_edit_id'));
            }

            // _post_reologize
            if (preg_match('#^/svc/post/(?P<id>\\d+)/reologize$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::reOlogize',)), array('_route' => '_post_reologize'));
            }

            // _post_unreologize
            if (preg_match('#^/svc/post/(?P<postId>\\d+)/(?P<ologyId>\\d+)/(?P<userId>\\d+)/unreologize$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::unReOlogize',)), array('_route' => '_post_unreologize'));
            }

            // _post_delete
            if (preg_match('#^/svc/post/(?P<id>\\d+)/delete$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::deletePost',)), array('_route' => '_post_delete'));
            }

            // _post_get
            if (preg_match('#^/svc/post/(?P<id>\\d+)/get$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::getPost',)), array('_route' => '_post_get'));
            }

            // _post_comm_get
            if (preg_match('#^/svc/post/(?P<id>\\d+)/get/c$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::getPostWithComments',)), array('_route' => '_post_comm_get'));
            }

            // _post_recent
            if (0 === strpos($pathinfo, '/svc/post/get/recent') && preg_match('#^/svc/post/get/recent/(?P<offset>[^/]+?)/(?P<n>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::getMostRecent',)), array('_route' => '_post_recent'));
            }

            // _post_mostcommented
            if (0 === strpos($pathinfo, '/svc/post/get/mostcom') && preg_match('#^/svc/post/get/mostcom/(?P<n>\\d+)/?$#xs', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_post_mostcommented');
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::getMostCommented',)), array('_route' => '_post_mostcommented'));
            }

            // _post_getbyuser
            if (0 === strpos($pathinfo, '/svc/post/get/user') && preg_match('#^/svc/post/get/user/(?P<id>\\d+)/(?P<offset>[^/]+?)/(?P<n>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::getPostsWrittenByUser',)), array('_route' => '_post_getbyuser'));
            }

            // svc_post_getbyologies
            if (0 === strpos($pathinfo, '/svc/post/get/ologies') && preg_match('#^/svc/post/get/ologies/(?P<ologyIds>[^/]+?)/(?P<offset>[^/]+?)/(?P<n>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::getPostsForOlogiesHomePage',)), array('_route' => 'svc_post_getbyologies'));
            }

            // svc_post_getforology
            if (0 === strpos($pathinfo, '/svc/post/get/ology') && preg_match('#^/svc/post/get/ology/(?P<id>\\d+)/(?P<offset>[^/]+?)/(?P<n>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::getPostsForOlogy',)), array('_route' => 'svc_post_getforology'));
            }

            // _post_isauthorized
            if (preg_match('#^/svc/post/(?P<postId>\\d+)/canEdit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::isAuthorizedToEditOrDelete',)), array('_route' => '_post_isauthorized'));
            }

            // _store_ologize_post
            if ($pathinfo === '/svc/post/store_ologize_post') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storeOlogizePost',  '_route' => '_store_ologize_post',);
            }

            // _store_ologize_thanks
            if (0 === strpos($pathinfo, '/svc/post/store_ologize_thanks') && preg_match('#^/svc/post/store_ologize_thanks/(?P<id>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\PostController::storeOlogizeThanks',)), array('_route' => '_store_ologize_thanks'));
            }

        }

        if (0 === strpos($pathinfo, '/svc/likes')) {
            // _post_love
            if (0 === strpos($pathinfo, '/svc/likes/love') && preg_match('#^/svc/likes/love/(?P<postId>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostLove',)), array('_route' => '_post_love'));
            }

            // _post_unlove
            if (0 === strpos($pathinfo, '/svc/likes/unlove') && preg_match('#^/svc/likes/unlove/(?P<postId>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostUnLove',)), array('_route' => '_post_unlove'));
            }

            // _post_hate
            if (0 === strpos($pathinfo, '/svc/likes/hate') && preg_match('#^/svc/likes/hate/(?P<postId>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostHate',)), array('_route' => '_post_hate'));
            }

            // _post_unhate
            if (0 === strpos($pathinfo, '/svc/likes/unhate') && preg_match('#^/svc/likes/unhate/(?P<postId>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostUnHate',)), array('_route' => '_post_unhate'));
            }

            // _post_hmm
            if (0 === strpos($pathinfo, '/svc/likes/hmm') && preg_match('#^/svc/likes/hmm/(?P<postId>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostHmm',)), array('_route' => '_post_hmm'));
            }

            // _post_unhmm
            if (0 === strpos($pathinfo, '/svc/likes/unhmm') && preg_match('#^/svc/likes/unhmm/(?P<postId>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostUnHmm',)), array('_route' => '_post_unhmm'));
            }

            // _post_offline_love
            if ($pathinfo === '/svc/likes/offline_love') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostOfflineLove',  '_route' => '_post_offline_love',);
            }

            // _post_offline_hate
            if ($pathinfo === '/svc/likes/offline_hate') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostOfflineHate',  '_route' => '_post_offline_hate',);
            }

            // _post_offline_hmm
            if ($pathinfo === '/svc/likes/offline_hmm') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\LikesController::PostOfflineHmm',  '_route' => '_post_offline_hmm',);
            }

        }

        if (0 === strpos($pathinfo, '/svc/comment')) {
            // _comment_on_post_form
            if (0 === strpos($pathinfo, '/svc/comment/form') && preg_match('#^/svc/comment/form/(?P<postId>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::displayCommentOnPostForm',)), array('_route' => '_comment_on_post_form'));
            }

            // _remember_comment_offline
            if ($pathinfo === '/svc/comment/rcom') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::ajaxStoreCommentContent',  '_route' => '_remember_comment_offline',);
            }

            // _comment_store_ajax
            if ($pathinfo === '/svc/comment/store_ajax') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::storeCommentInline',  '_route' => '_comment_store_ajax',);
            }

            // _comment_store
            if ($pathinfo === '/svc/comment/store') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::storeCommentPostPage',  '_route' => '_comment_store',);
            }

            // _comment_update
            if (preg_match('#^/svc/comment/(?P<id>\\d+)/update$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::updateAction',)), array('_route' => '_comment_update'));
            }

            // _comment_delete
            if (preg_match('#^/svc/comment/(?P<id>\\d+)/delete$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::deleteComment',)), array('_route' => '_comment_delete'));
            }

            // _comment_get
            if (preg_match('#^/svc/comment/(?P<id>\\d+)/get$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::getComment',)), array('_route' => '_comment_get'));
            }

            // _comment_getcommentforpost
            if (0 === strpos($pathinfo, '/svc/comment/get') && preg_match('#^/svc/comment/get/(?P<n>[^/]+?)/comment/for/(?P<postId>[^/]+?)/post/starting/(?P<offet>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::getCommentForPost',)), array('_route' => '_comment_getcommentforpost'));
            }

            // _comment_getcommentforuser
            if (0 === strpos($pathinfo, '/svc/comment/get') && preg_match('#^/svc/comment/get/(?P<n>[^/]+?)/comment/for/(?P<userId>[^/]+?)/user/staring/(?P<offset>\\d+)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::getCommentForUser',)), array('_route' => '_comment_getcommentforuser'));
            }

            // _comment_isauthorized
            if (preg_match('#^/svc/comment/(?P<id>\\d+)/canEdit$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::isAuthorizedToEditOrDelete',)), array('_route' => '_comment_isauthorized'));
            }

            // _website_last_page
            if ($pathinfo === '/svc/comment/lastPage') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\CommentController::redirectToPageIdInSession',  '_route' => '_website_last_page',);
            }

        }

        if (0 === strpos($pathinfo, '/svc/search')) {
            // _all_search
            if ($pathinfo === '/svc/search/all') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::searchAction',  '_route' => '_all_search',);
            }

            // _ology_search
            if ($pathinfo === '/svc/search/ology') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::searchOlogyAction',  '_route' => '_ology_search',);
            }

            // _post_search
            if ($pathinfo === '/svc/search/post') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::searchPostAction',  '_route' => '_post_search',);
            }

            // _user_search
            if ($pathinfo === '/svc/search/user') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::searchUserAction',  '_route' => '_user_search',);
            }

            // _get_all_search
            if ($pathinfo === '/svc/search/get') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::makeSearchAction',  '_route' => '_get_all_search',);
            }

            // _get_user_search
            if ($pathinfo === '/svc/search/get/user') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::makeSearchUser',  '_route' => '_get_user_search',);
            }

            // _get_ology_search
            if ($pathinfo === '/svc/search/get/ology') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::makeSearchOlogy',  '_route' => '_get_ology_search',);
            }

            // _get_post_search
            if ($pathinfo === '/svc/search/get/post') {
                return array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\SearchController::makeSearchPost',  '_route' => '_get_post_search',);
            }

        }

        if (0 === strpos($pathinfo, '/svc/follow')) {
            // _follow_no_stashes
            if (preg_match('#^/svc/follow/(?P<followeeID>[^/]+?)/stashes/?$#xs', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_follow_no_stashes');
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\FollowController::followStashes',)), array('_route' => '_follow_no_stashes'));
            }

            // _follow_stashes
            if (preg_match('#^/svc/follow/(?P<followeeID>\\d+)/stashes/(?P<stashesIds>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\FollowController::followStashes',)), array('_route' => '_follow_stashes'));
            }

            // _follow_no_ologies
            if (preg_match('#^/svc/follow/(?P<followeeID>[^/]+?)/ologies/?$#xs', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_follow_no_ologies');
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\FollowController::followOlogies',)), array('_route' => '_follow_no_ologies'));
            }

            // _follow_ologies
            if (preg_match('#^/svc/follow/(?P<followeeID>\\d+)/ologies/(?P<ologiesIds>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\FollowController::followOlogies',)), array('_route' => '_follow_ologies'));
            }

            // _followees_page
            if (preg_match('#^/svc/follow/(?P<userId>\\d+)/followees$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\FollowController::getFolloweesPage',)), array('_route' => '_followees_page'));
            }

            // _followers_page
            if (preg_match('#^/svc/follow/(?P<userId>\\d+)/followers$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\SocialBundle\\Controller\\FrontEnd\\FollowController::getFollowersPage',)), array('_route' => '_followers_page'));
            }

        }

        // fos_user_security_login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
        }

        // fos_user_security_check
        if ($pathinfo === '/login_check') {
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
        }

        // fos_user_security_logout
        if ($pathinfo === '/logout') {
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/register')) {
            // fos_user_registration_register
            if (rtrim($pathinfo, '/') === '/register') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                }
                return array (  '_controller' => 'Ology\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
            }

            // fos_user_registration_check_email
            if ($pathinfo === '/register/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_check_email;
                }
                return array (  '_controller' => 'Ology\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
            }
            not_fos_user_registration_check_email:

            // fos_user_registration_confirm
            if (0 === strpos($pathinfo, '/register/confirm') && preg_match('#^/register/confirm/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_confirm;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\UserBundle\\Controller\\RegistrationController::confirmAction',)), array('_route' => 'fos_user_registration_confirm'));
            }
            not_fos_user_registration_confirm:

            // fos_user_registration_confirmed
            if ($pathinfo === '/register/confirmed') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_confirmed;
                }
                return array (  '_controller' => 'Ology\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
            }
            not_fos_user_registration_confirmed:

        }

        if (0 === strpos($pathinfo, '/resetting')) {
            // fos_user_resetting_request
            if ($pathinfo === '/resetting/request') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_request;
                }
                return array (  '_controller' => 'Ology\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
            }
            not_fos_user_resetting_request:

            // fos_user_resetting_send_email
            if ($pathinfo === '/resetting/send-email') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_fos_user_resetting_send_email;
                }
                return array (  '_controller' => 'Ology\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
            }
            not_fos_user_resetting_send_email:

            // fos_user_resetting_check_email
            if ($pathinfo === '/resetting/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_check_email;
                }
                return array (  '_controller' => 'Ology\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
            }
            not_fos_user_resetting_check_email:

            // fos_user_resetting_reset
            if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_resetting_reset;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ology\\UserBundle\\Controller\\ResettingController::resetAction',)), array('_route' => 'fos_user_resetting_reset'));
            }
            not_fos_user_resetting_reset:

        }

        // fos_user_change_password
        if ($pathinfo === '/change-password/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }
            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        // _security_check
        if ($pathinfo === '/facebook/check') {
            return array('_route' => '_security_check');
        }

        // _security_logout
        if ($pathinfo === '/logout') {
            return array('_route' => '_security_logout');
        }

        // _login_check
        if ($pathinfo === '/login_check') {
            return array('_route' => '_login_check');
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
