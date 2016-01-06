// @codekit-prepend "jquery.1.10.2.min.js", "jquery.autocomplete.min.js", "headhesive.js", "modal.js", "_pure-menu.js";


// SHARE: OPEN POPUPS
function pop(url)
{
	window.open(url, 'pixeline_share', 'height=220,width=500');
	return false;
}

$('a.social:not(.favourite)').on('click', function(e)
{
	var url = $(this).attr('href');
	pop(url, 'pixeline_share', 'height=220,width=500');
	e.preventDefault();
	return false;
});

// FAVOURITE
var logged_in = ($('#login-ui').length<1);

$('body').on('click.favourite','.favourite',function(e){
	
	//
	var $this = $(this);
	$this.addClass('loading');
	if (logged_in){
		e.preventDefault();
		$.post($this.attr('href'),{quote: $this.data('quote')},function(result){
			$this.removeClass('loading');
			switch(result.action){
				case 'created':
				$this.addClass('liked');
				break;
				
				case 'deleted':
				$this.removeClass('liked');
				break;
				
				case 'not-logged-in':
				$this.removeClass('error');
				break;
				
			}
			$this.find('.total_likes').text(result.total_likes);
		}, "json");
	}else{
		// We show the Login screen with the quote id so we can do the like right after the login is successful.
		var append_vars_string = 'next_action=like&quote_id='+ $(this).data('quote') ;

		$('.single-signon-providers a').each(function(){
			this.href= this.href.split(/[?#]/)[0];
			this.href += (this.href.indexOf("?") > 0) ?  '&'+append_vars_string : '/?'+append_vars_string;
		});
	}
});


// Bind CTRL+F (or CMD+F) to focus on search input field.
$(document).keydown(function(event)
{
	if ((event.ctrlKey || event.metaKey) && event.which === 70)
	{
		// Save Function
		event.preventDefault();
		$('#autocomplete-ajax').focus();
		return false;
	}
});

// Search _ autocomplete
$('#autocomplete-ajax, .autocomplete-ajax').autocomplete(
{
	serviceUrl: '/search',
	minChars: 3,
	onSelect: function(suggestion)
	{
		var table = suggestion.data.split(":")[0];
		var id = suggestion.data.split(":")[1];
		var url = (table === 'authors') ? '/of/' : '/quote/view/';
		url += id;
		window.location.href = url;
	},
	onHint: function(hint)
	{
		$('#autocomplete-ajax-x').val(hint);
	}
});

// on Author page Sticky Menu

$('body.of-author').each(function(){
	//$('.sticky').sticky({topSpacing:0});

	var header = new Headhesive('.sticky', { offset: 500});
});

// FETCH GOOGLE IMAGE WHEREVER NECESSARY
/*
	API Key AIzaSyAYmkJ_zGi5di66aia-wjzslCaY3hpOd4A
	
	url = https://www.googleapis.com/customsearch/v1?key=AIzaSyAYmkJ_zGi5di66aia-wjzslCaY3hpOd4A
	cx = 001445870329049885378:2xrk1tlw22u
	
	example url (found via generator https://developers.google.com/apis-explorer/?hl=en_US#p/customsearch/v1/search.cse.list )
	
	https://www.googleapis.com/customsearch/v1?q=SEARCH_TERM&cx=001445870329049885378%3A2xrk1tlw22u&fileType=png%2Cjpg%2Cgif&imgColorType=gray&imgSize=medium&imgType=face&num=1&searchType=image&fields=items(formattedUrl%2ChtmlFormattedUrl%2Cimage(byteSize%2Cheight%2CthumbnailHeight%2CthumbnailLink%2CthumbnailWidth%2Cwidth)%2Clink)&key={YOUR_API_KEY}
	
	or simpler (only returns items.link
	https://www.googleapis.com/customsearch/v1?q=Albert+Einstein&cx=001445870329049885378%3A2xrk1tlw22u&fileType=png%2Cjpg%2Cgif&imgColorType=gray&imgSize=medium&imgType=face&num=1&searchType=image&fields=items(formattedUrl%2ChtmlFormattedUrl%2Clink)&key={YOUR_API_KEY}
	
	
*/
// Conditions to be met to actually go fetch.
$('.photo').each(function() {
	var $this = $(this);
	var condition1 = ($('body.quote-view').length && $this.data('photo') === 'none');
	var condition2 = ($('body.of-author').length && $this.data('photo') === 'none');
	var condition3 = ($('body.home').length && $this.data('photo') === 'none');
	var condition4 = ($('body.latest').length && $this.data('photo') === 'none');
	console.log("fetch image? "+ (condition1 || condition2 || condition3 || condition4));
	if (condition1 || condition2 || condition3 || condition4)
	{
		var author_name = $this.data('author');
		var apiKey ='AIzaSyAYmkJ_zGi5di66aia-wjzslCaY3hpOd4A';
		
		var url = 'https://www.googleapis.com/customsearch/v1?q='+author_name+'&cx=001445870329049885378%3A2xrk1tlw22u&fileType=png%2Cjpg%2Cgif&imgColorType=gray&imgSize=medium&imgType=face&num=1&searchType=image&fields=items(formattedUrl%2ChtmlFormattedUrl%2Cimage%2FthumbnailLink%2Clink)&key='+ apiKey;
		
		$.ajax({
			url: url,
			success: function(imageSearch){
				// Check that we got results
				if (imageSearch.items && imageSearch.items.length > 0)
				{
					// Loop through our results, printing them to the page.
					var url = imageSearch.items[0].link;
					url = imageSearch.items[0].image.thumbnailLink;
				 console.log("image url " + url);
					$this.css('background-image', 'url(' + url + ')');
					$this.parents('figcaption').append('<p class="image-provided-by-google">"Best guess" image provided by <a target="_blank" href="https://www.google.com/search?q=' + author_name + '&es_sm=91&source=lnms&tbm=isch&sa=X&ei=okNEVJeuIMqwPLChgaAL&ved=0CAgQ_AUoAQ&biw=1279&bih=679#q=' + author_name + '&tbs=ic:gray,itp:face,islt:vga,isz:m&tbm=isch">Google Images</a></p>');
				}
			},
			dataType: 'jsonp',
			error: function(){
				$this.parents('figcaption').append('<p class="image-provided-by-google">Could not retrieve Google image :-(</p>');
			}
		}).fail(function() { 
			$this.parents('figcaption').append('<p class="image-provided-by-google">Could not retrieve Google image :-(</p>');
		}).error(function() {
			$this.parents('figcaption').append('<p class="image-provided-by-google">Could not retrieve Google image :-(</p>');

		});
	}
});




// GOOGLE ANALYTICS
(function(i, s, o, g, r, a, m)
{
	i['GoogleAnalyticsObject'] = r;
	i[r] = i[r] ||
	function()
	{
		(i[r].q = i[r].q || []).push(arguments);
	}, i[r].l = 1 * new Date();
	a = s.createElement(o), m = s.getElementsByTagName(o)[0];
	a.async = 1;
	a.src = g;
	m.parentNode.insertBefore(a, m);
})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

ga('create', 'UA-162823-28', 'auto');
ga('send', 'pageview');


