// @codekit-prepend "jquery.1.10.2.min.js", "jquery.autocomplete.min.js", "headhesive.js";


// SHARE: OPEN POPUPS


function pop(url)
{
	window.open(url, 'pixeline_share', 'height=220,width=500');
	return false;
}

$('a.social').bind('click', function(e)
{
	var url = $(this).attr('href');
	pop(url, 'pixeline_share', 'height=220,width=500');
	e.preventDefault();
	return false;
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
// Conditions to be met to actually go fetch.
$('.photo').each(function() {
	var $this = $(this);
	var condition1 = ($('body.quote-view').length && $this.data('photo') === 'none');
	var condition2 = ($('body.of-author').length && $this.data('photo') === 'none');
	var condition3 = ($('body.home').length && $this.data('photo') === 'none');
	var condition4 = ($('body.latest').length && $this.data('photo') === 'none');

	if (condition1 || condition2 || condition3 || condition4)
	{
		var author_name = $this.data('author');
		var imageSearch;
		google.load('search', '1');
		var url = '';
		google.setOnLoadCallback(function()
		{
			// Create an Image Search instance.
			imageSearch = new google.search.ImageSearch();
			imageSearch.setRestriction(
			google.search.Search.RESTRICT_SAFESEARCH, google.search.Search.SAFESEARCH_OFF);
			imageSearch.setRestriction(
			google.search.ImageSearch.RESTRICT_IMAGESIZE, google.search.ImageSearch.IMAGESIZE_MEDIUM);
			imageSearch.setRestriction(
			google.search.ImageSearch.RESTRICT_COLORIZATION, google.search.ImageSearch.COLORIZATION_GRAYSCALE);
			imageSearch.setRestriction(
			google.search.ImageSearch.RESTRICT_IMAGETYPE, google.search.ImageSearch.IMAGETYPE_FACES);
			// Set searchComplete as the callback function when a search is
			// complete.  The imageSearch object will have results in it.
			imageSearch.setSearchCompleteCallback(this, function()
			{
				// Check that we got results
				if (imageSearch.results && imageSearch.results.length > 0)
				{
					// Loop through our results, printing them to the page.
					var result = imageSearch.results[0];
					url = result.unescapedUrl; //result.url | result.tbUrl | result.unescapedUrl;
					// console.log("image url " + url);
					$this.css('background-image', 'url(' + url + ')');
					$this.parents('figcaption').append('<p class="image-provided-by-google">"Best guess" image provided by <a target="_blank" href="https://www.google.com/search?q=' + author_name + '&es_sm=91&source=lnms&tbm=isch&sa=X&ei=okNEVJeuIMqwPLChgaAL&ved=0CAgQ_AUoAQ&biw=1279&bih=679#q=' + author_name + '&tbs=ic:gray,itp:face,islt:vga,isz:m&tbm=isch">Google Images</a></p>');
				}
			}, null);

			imageSearch.execute(author_name);
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


