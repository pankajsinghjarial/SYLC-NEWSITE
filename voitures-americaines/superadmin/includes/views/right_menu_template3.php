<script type="text/javascript" src="<?= DEFAULT_ADMIN_URL; ?>/js/ddaccordion.js"></script>

<script type="text/javascript">

ddaccordion.init({

	headerclass: "submenuheader", //Shared CSS class name of headers group

	contentclass: "submenu", //Shared CSS class name of contents group

	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"

	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover

	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 

	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content

	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)

	animatedefault: false, //Should contents open by default be animated into view?

	persiststate: true, //persist state of opened contents within browser session?

	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]

	togglehtml: ["suffix", "<img src='../images/plus.gif' class='statusicon' />", "<img src='../images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)

	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"

	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized

		//do nothing

	},

	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed

		//do nothing

	}

})





</script>


<div id="sidebar" class="right">

<div class="glossymenu">

<a class="menuitem" href="<?= DEFAULT_ADMIN_URL; ?>/banner_template/update.php">Top Banner Manager</a>

 <a class="menuitem" href="<?= DEFAULT_ADMIN_URL; ?>/htmltemplate">Car Template</a>

<a class="menuitem" href="<?= DEFAULT_ADMIN_URL; ?>/htmlpage/update.php">Html Page Manager</a>
<a class="menuitem" href="<?= DEFAULT_ADMIN_URL; ?>/newsletter_content">Newsletter Content</a>

<!--<a class="menuitem" href="<?= DEFAULT_ADMIN_URL; ?>/news_letter_latest">Newsletter Content</a>

<a class="menuitem" href="<?= DEFAULT_ADMIN_URL; ?>/user_setting/settings.php" style="border-bottom-width: 0">Account Information</a> -->

</div>

</div>