<?php

/* OlogySocialBundle:FrontEnd:faq.html.twig */
class __TwigTemplate_05e95e2c1473a79b8e71831361daf2fe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("OlogySocialBundle:FrontEnd:base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "OlogySocialBundle:FrontEnd:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Home | Ology";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<a name=\"faqtop\"></a>
<div id=\"container\">
\t<div id=\"faq\">\t\t
            <h1>Frequently Asked Questions</h1>

            <a href=\"#ology\" class=\"scroll\">What is Ology?</a>
            <a href=\"#start\">Where do I start?</a>
            <a href=\"#whatis\">What is an ology?</a>
            <a href=\"#follow\">How do I follow an ology?</a>
            <a href=\"#unfollow\">How do I unfollow an ology?</a>
            <a href=\"#member\">How do I know if I'm a member of an ology?</a>
            <a href=\"#post\">How do I post?</a>
            <a href=\"#pic\">How do I add a picture, video, or audio to a post?</a>
            <a href=\"#youtube\">Do you support any videos that are not from YouTube?</a>
            <a href=\"#bookmarklet\">Is there a way to post when I'm not on Ology?</a>
            <a href=\"#comment\">How do I comment?</a>
            <a href=\"#media\">Can I add a photo, video, or audio to a comment?</a>
            <a href=\"#reactions\">What are the love it, hate it, and hmm buttons?</a>
            <a href=\"#reologize\">What does ReOlogize mean?</a>
            <a href=\"#unreologize\">How can I undo a ReOlogized post?</a>
            <a href=\"#ologize\">What is the Ologize Button?</a>
            <a href=\"#install\">How do I install the Ologize Button?</a>
            <a href=\"#create\">How do I create an ology?</a>
            <a href=\"#edit\">How do I edit an ology I created?</a>
            <a href=\"#private\">Can I make a private ology?</a>
            <a href=\"#leave\">Can I leave an ology I created?</a>
            <a href=\"#stash\">What is a stash?</a>
            <a href=\"#createstash\">How do I create a stash?</a>
            <a href=\"#poststash\">How do I add a post to my stash?</a>
            <a href=\"#removepoststash\">How do I remove a post from my stash?</a>
            <a href=\"#active\">How do I see activity in my ologies?</a>
            <a href=\"#dock\">Why can't I see all my ologies in my dock?</a>
            <a href=\"#invite\">How do I invite my friends?</a>
            <a href=\"#search\">How do I search for ologies, posts, or people?</a>
            <a href=\"#profile\">How do I update my profile?</a>
            <a href=\"#pass\">How do I change my password?</a>
            <a href=\"#note\">How do I change my notifications and email settings?</a>
            <a href=\"#editors\">Who are your professional editors?</a>
            <a href=\"#hiring\">Are you hiring?</a>
            <a href=\"#feedback\">How can I ask a specific question or give feedback?</a>
            <a href=\"#cool\">Is it difficult to be this cool?</a>

            <a name=\"ology\"></a>
            <h2>What is Ology?</h2>
            <p>Ology is a place to discover, share, and connect with others around particular interests. This video should sum it up:</p>
            <p><iframe width=\"560\" height=\"315\" src=\"http://www.youtube.com/embed/y2e_1KpZFvo?wmode=transparent\" frameborder=\"0\" allowfullscreen></iframe></p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"start\"></a>
            <h2>Where do I start?</h2>
            <p>Once you sign up the best way to get started is to follow some ologies that interest you. Once you follow an ology, posts from that group will be displayed in the feed on your home page so you’ll always have cool content to interact with. When you find an ology you like, post something! Or, if you’re not sure what to post, comment on someone else’s post. A good place to find awesome content is under the “News” drop down in the navigation bar, where you’ll see our nine core ologies filled with posts written by our team of professional editors. And if you feel especially ambitious, why not create your own ology? And remember, don’t forget to fill out your profile!</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"whatis\"></a>
            <h2>What is an ology?</h2>
            <p>An ology is a community for people who are all passionate about the same thing, whether it’s very specific like a particular TV show, or something more general like music. Most ologies are created by users like you, though we also offer core ologies which feature posts by our team of professional editors. Ologies exist so that you can connect with others who share your interests and so that you can get the latest info about the things that matter to you. When you follow an ology, all of the posts from that group will be served up in the feed on your home page, so you never miss a thing. And if you don’t see an ology about something you love, create one yourself by clicking the “Create” link in the navigation bar.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"follow\"></a>
            <h2>How do I follow an ology?</h2>
            <p>When you go to a particular ology page there will be a green follow button in the top left corner. If you click it, you will immediately become a member of that ology and its icon will be added to your dock on the top of your screen.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"unfollow\"></a>
            <h2>How do I unfollow an ology?</h2>
            <p>If you are a member of an ology, the green follow button in the top left corner on the ology page will instead say “Following” and will be gray. Upon mouse-over, you’ll see the button gets darker and says “Unfollow.” Simply click that button and you will no longer be a member of that ology and it will be removed from your dock.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"member\"></a>
            <h2>How do I know if I'm a member of an ology?</h2>
            <p>If you are a member of an ology the green follow button in the top left corner on the ology page will instead say \"Following\" and will be gray.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"post\"></a>
            <h2>How do I post?</h2>
            <div id=\"faq-body\">
            <p>To post in an ology simply click inside the box at the top that says \"Post (Ologize)\" and the box will slide down, allowing you to easily write your post and attach pictures, video, or audio as desired. Or if you want to post while you're not on the site, you can use the <a class=\"noblock\" href=\"#ologize\">Ologize Button</a>!</p>
            </div>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"pic\"></a>
            <h2>How do I add a picture, video, or audio to a post?</h2>
            <p>Once the post box is open, there are three choices below the text field: photo, video, and audio. Click the one you want to attach: for photos, upload an image from your computer or paste the URL; for video, paste the YouTube URL; and for audio, upload the file from your computer.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"youtube\"></a>
            <h2>Do you support any videos that are not from YouTube?</h2>
            <p>Unfortunately, not right now. We are working on it though! Be sure to tell us that it's important to you in our feedback section and maybe we can push that to the front of our list. </p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"bookmarklet\"></a>
            <h2>Is there a way to post when I'm not on Ology?</h2>
            <p>Yes!  You can now post pictures from anywhere on the web with a single click of the Ologize Button, our awesome bookmarklet that you can install into your browser.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>
            
            <a name=\"comment\"></a>
            <h2>How do I comment?</h2>
            <p>At the bottom of all posts there is a comment field where you can type your response. Once you write it out, simply click the red \"Comment\" button to submit it.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"media\"></a>
            <h2>Can I add a photo, video, or audio to a comment?</h2>
            <p>Right now, you cannot. Instead, link out to your photo/video/audio in the comment, or start a new post which includes that piece of media. If this ability is important to you, let us know in our feedback section and we'll try to make it happen sooner!</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"reactions\"></a>
            <h2>What are the love it, hate it, and hmm buttons?</h2>
            <p>Those are reaction buttons--an easy way for you to say what you thought about a particular post. Both Ology members and anonymous users can react to posts so you'll see a mix of people reacting to everything on the site. You can see what reactions your posts are getting by checking the reaction bar on the bottom of your profile.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>            

            <a name=\"reologize\"></a>
            <h2>What does ReOlogize mean?</h2>
            <p>To post something is to Ologize, so ReOlogizing just means re-posting. It's a way of copying a post you like from one ology into another ology you follow, or into one of your stashes. </p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"unreologize\"></a>
            <h2>How can I undo a ReOlogized post?</h2>
            <p>If you are the one who ReOlogized the post when you mouse-over \"ReOlogized\" it will change to \"undo ReOlogize\" - simply click it to have the ReOlogized post removed from the ology.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>
            
            <a name=\"ologize\"></a>
            <h2>What is the Ologize Button?</h2>
            <p>The Ologize Button is a bookmarklet tool that lets you post pictures to any of your ologies from anywhere on the web. And don’t worry, we give credit where credit is due. When you ologize from another website, we always copy the source link so everyone knows where to find the original post. To get the bookmarklet, go to your Settings page to the \"Ologize Button\" tab and follow the instructions for installing it in your browser.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>
            
            <a name=\"install\"></a>
            <h2>How do I install the Ologize Button?</h2>
            <p>First of all, go to the \"Ologize Button\" tab of the Settings page. There you will see detailed instructions for installing it in Chrome, but the gist is that you are going to drag and drop the button image up to the bookmarks bar in your browser. Once it's there the button will say \"Ologize it.\" Simply click that whenever you're browsing the web and you'll be able to pull any images you see and create a new post.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"create\"></a>
            <h2>How do I create an ology?</h2>
            <p>Click the \"Create\" link in the nav bar and then select ology from the two options given. You can also click the \"Create New Ology\" link when viewing your profile. You will give your ology a name, a brief description, a group icon, and categorize it. Once you click the red \"Create Ology\" button, the group will come into existence and you will automatically be listed as its founder. Its icon will automatically appear in your dock at the top of the page. (And be sure to start posting so others want to join!)</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"edit\"></a>
            <h2>How do I edit an ology I created?</h2>
            <p>Go to the ology that you want to edit. If you created it, next to the group's icon in the upper left corner there will be a tiny gray \"edit\" button. Once you click this you will be able to edit the ology's name, description, icon image, and category. Remember to save your changes by clicking the red \"Update Ology\" button on the bottom. </p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"private\"></a>
            <h2>Can I make a private ology?</h2>
            <p>For now all ologies are public. However, we are developing private ologies for the future so if they are something that you want, tell us it is important to you in our feedback section.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"leave\"></a>
            <h2>Can I leave an ology I created?</h2>
            <p>Yep, you can unfollow the ology like normal by clicking the gray button. However, the icon for that ology will remain in the founded section of your profile. </p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"stash\"></a>
            <h2>What is a stash?</h2>
            <p>A stash is a personal collection of posts to keep for later. Only you can add posts to it! To add a post to a stash, click the ReOlogize button and select the stash(es) where you want it to go.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>  

            <a name=\"createstash\"></a>
            <h2>How do I create a stash?</h2>
            <p>Click the \"Create\" link in the nav bar and then select stash from the two options given. You can also click the \"Create Stash\" link when viewing your profile. You will need to give your stash a name and a few descriptive tags (for instance a stash of rock songs I like might be tagged \"music,\" \"songs,\" and \"rock\"). Once you click the red \"Create Stash\" button, the stash will come into existence and it will show up on your profile.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a> 

            <a name=\"poststash\"></a>
            <h2>How do I add a post to my stash?</h2>
            <p>On any post, click the ReOlogize button and select the stash(es) where you want it to go. Click the red ReOlogize button to submit and it will be there.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a> 

            <a name=\"removepoststash\"></a>
            <h2>How do I remove a post from my stash?</h2>
            <p>When you're viewing your stash, if you mouse over any post a black circle with an X will appear in the top right corner of the post. Click that button and the post will be removed from the stash. Don't worry though, it's not deleted completely, just from your collection.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>           

            <a name=\"active\"></a>
            <h2>How do I see activity in my ologies?</h2>
            <p>For now, the best way to see what’s going on in your ologies is by using the “What’s New” widget on the right side of your Home page. This handy box shows you when someone is posting in one of your ologies or commenting on one of your posts. The other way to see what’s been posted in your ologies is just by browsing the feed on your home page. All of that content is curated from the ologies you follow, so it’s a great way to catch up quickly and get an overview of what’s been going on.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"dock\"></a>
            <h2>Why can't I see all of my ologies in my dock?</h2>
            <p>For now, the dock can only display 20 ology icons at a time. However, the rest of your ologies are still there! We are currently working to allow the dock to hold an unlimited number of ologies and for you to be able to organize and prioritize them as you want. If this feature is important to you, let us know in the feedback section!</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"invite\"></a>
            <h2>How do I invite my friends?</h2>
            <p>To invite friends to join Ology, click the \"Invite\" link on the top navigation bar. From there you'll be able to import friends from Facebook or Gmail, or invite them manually by entering their email addresses. You also have the option of inviting them to the entire site or to a specific one of your ologies. Add in a personal message to give the invitation a friendly touch and then click the red \"Send\" button at the bottom to complete the process.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"search\"></a>
            <h2>How do I search for ologies, posts, or people?</h2>
            <p>If you know the name of what you’re looking to find, use the search field in the navigation bar next to the Ology logo. The search results will include any ologies that mention your search term in the name or description, any members who mention your search term in their name or interests, and any posts that include your search term in their title or text.  If you don’t have something particularly in mind and would prefer to browse ologies, click the “Explore” link in the navigation bar. There you will be able to view all of the ologies on the site, along with a quick look at that group’s stats and founder. You can get more specific while browsing by clicking a category at the top.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"profile\"></a>
            <h2>How do I update my profile?</h2>
            <p>Go to your Settings page--it’s the first option under “Account” in the top navigation bar.  Click that to edit your name, email address, password, birthday, sex, location, occupation, self summary, interests, websites, and photo. When you’re done, be sure to click the red “Update” button at the bottom to save your changes.  You will then be routed to your profile so you can check out the changes you made.  To view your profile later on, you can click your name or picture in the navigation bar or click “Profile” under the “Account” link.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"pass\"></a>
            <h2>How do I change my password?</h2>
            <p>Go to your Settings page.  Under \"Change Password\" you will need to enter your new password and again under \"Confirm Password.\" Once you click \"Update\" at the bottom of the page your password will be changed.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"note\"></a>
            <h2>How do I change my notifications and email settings?</h2>
            <p>Go to your Settings page.  Click the button in the top right labeled \"Manage Notifications\" and then you can check or uncheck various options in order to receive email alerts about those actions.  If you want to turn off all emails from Ology you can check the box under your email address on the \"Account Info\" tab of your Settings page.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"editors\"></a>
            <h2>Who are your professional editors?</h2>
            <div id=\"faq-body\">
            <p>We have an amazing team of professional in-house editors and writers who are experts in each of their particular fields. These are the people who manage our nine core ologies (film, TV, celebrity gossip, geek culture, fashion, music, sports, politics, and humor), where you can find the latest news, reviews, interviews, and opinions. You can check out their profiles to learn more about them, or you can get in touch with Managing Editor Sharon Tharp by emailing <a class=\"noblock\" href=\"mailto:editorial@ology.com\">editorial@ology.com</a></p>
            </div>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"hiring\"></a>
            <h2>Are you hiring?</h2>
            <div id=\"faq-body\">
            <p>Yes, we are always looking for talented people to join our diverse and creative team. We also have a range of internships available if that’s more your speed. You can find more information about a career at Ology <a class=\"noblock\" href=\"http://ologycorp.com/content/careers\">here</a>.</p>
            </div>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"feedback\"></a>
            <h2>How can I ask a specific question or give feedback?</h2>
            <p>On the right hand side of your browser there is a black box that says \"Feedback.\" Click it and submit your problem/question/idea/praise. We love hearing from you!</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>

            <a name=\"cool\"></a>
            <h2>Is it difficult to be this cool?</h2>
            <p>You know, it is a burden at times, but we have no regrets.</p>
            <a href=\"#faqtop\" class=\"top\">Back to top</a>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "OlogySocialBundle:FrontEnd:faq.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 4,  33 => 3,  27 => 2,);
    }
}
