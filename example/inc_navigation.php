<?
/*
The navigation for the entire site, top nav and side nav in sidebar is defined in this one list.
PHP code utilizing simple_html_dom parses this list and then
manipulates it for use in top nav or in side nav. ($navDOM).
For side nav specifically you request a sub-section of the list via css selector.
*/

//----------------------------- 
// First we need to pull all the dynamic categories from the database for use in the html later.
//----------------------------- 
include 'inc_navigation_categories.php';

//----------------------------- 

ob_start();
?>
<ul>
	<li class="n1 menu-financial-industry"><a href="advantages.php">The Financial Industry</a>
		<ul>
			<li><a href="advantages.php">Advantage</a></li>
			<li><a href="legislation.php">Legislation</a></li>
			<li><a href="about.php">About Us</a>
				<ul >
					<li><a href="about-membership.php">Membership</a></li>
					<li><a href="about-board.php">Board of Directors</a></li>
				</ul>
			</li>
			<li><a href="news.php?cat=events">Events</a></li>
			<li><a href="about-regulation.php">Regulation</a>
				<ul>
					<li><a href="regulators.php">Regulators</a></li>
				</ul>
			</li>
			<li><a href="about-resources.php">Resources</a></li>
			<li><a href="about-faq.php">FAQs</a></li>
		</ul>
	</li>
	<li class="n2 menu-wealth-management"><a href="wealth-management.php">Wealth Management</a>
		<ul>
			<li><a href="wealth-management.php">Overview</a></li>
			<li><a href="wealth-management-guides.php">Guides</a></li>
			<li><a href="wealth-management-foundations.php">Foundations</a></li>
		</ul>
	</li>
	<li class="n3 menu-asset-management"><a href="asset-management.php">Asset Management</a>
		<ul>
			<li><a href="asset-management.php">Overview</a></li>
			<li><a href="asset-management-guides.php">Guides</a></li>
			<li><a href="asset-management-funds.php">Funds</a></li>
		</ul>
	</li>
	<li class="n5 menu-business"><a href="business.php">Business</a>
		<ul>
			<li><a href="business.php">Overview</a></li>
			<li><a href="business.php?cat=ebusiness">E-Business</a>
			<li><a href="business.php?cat=Insurance">Insurance</a>
			<li><a href="business.php?cat=maritime">Maritime</a></li>
		</ul>
	</li>
	<li class="n6 menu-life"><a href="life.php">Life</a>
		<ul>
			<li><a href="life.php">Overview</a></li>
			<li><a href="life.php?cat=immigration">Immigration</a>
			<li><a href="life.php?cat=real estate">Real Estate</a>
			<li><a href="life.php?cat=culture">Culture</a></li>
		</ul>
	</li>
	<li class="n7 menu-media"><a href="news.php">Media Centre</a>
		<ul>
			<li><a href="news.php">Industry News</a> <?=$ul_news_categories?> </li>
			<li><a href="download.php">Press Releases</a> <?=$ul_downloads_categories?></li>
			<li><a href="events.php">Events</a> <?=$ul_events_categories?></li>
			<li><a href="reports.php">Reports</a> <?=$ul_reports_categories?></li>
			<li><a href="community.php">Community Corner</a> <?=$ul_comminitycorner_categories?></li>
			<li><a href="news.php?cmd=newsletters">Newsletters</a> </li>
			<li><a href="video.php">Video</a> <?=$ul_video_categories?></li>
		</ul>
	</li>
</ul>

<?
//---------------------------
$navigation = ob_get_clean();

include 'simple_html_dom.php';
$navDOM = new simple_html_dom();
// Load HTML from string
$navDOM->load($navigation);

// Assign id and class for top navigation bar.
$navDOM->firstChild()->setAttr('id','topnav');
$navDOM->firstChild()->setAttr('class','menu menu-root');

// Assign special classes for each sub-level of navigation in top menu - if needed.
// Sadly, simple_html_dom doesn't support css > selector.
// --wasn't needed. disabled.
// foreach($navDOM->find('.menu-root ul')       as $ul)  { $ul->class =' menu-lvl-1 '; }
// foreach($navDOM->find('.menu-root ul ul')    as $ul)  { $ul->class =' menu-lvl-2 '; }
// foreach($navDOM->find('.menu-root ul ul ul') as $ul)  { $ul->class =' menu-lvl-3 '; }

// show top navigation:
echo $navDOM;

// @todo Make $navDOM available in global Config object in case I need 
// to access it from within a controller.
?>