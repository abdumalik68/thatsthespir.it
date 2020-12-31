<script>
	import { quotes } from "$components/store.js";
	//import Quote from "$components/Quote.svelte";

	// async function getQuote() {
	// 	const res = await fetch(apiURL);
	// 	the_quote = await res.json();
	// }

	// onMount(async function getQuote() {
	// 	const res = await fetch(apiURL);
	// 	the_quote = await res.json();
	// 	console.log(the_quote);
	// });
	function swipe(e) {}
</script>

<style lang="scss">
	:root {
		font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
			Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
	}

	main {
		text-align: center;
		padding: 1em;
		margin: 0 auto;
	}

	h1 {
		color: #ff3e00;
		text-transform: uppercase;
		font-size: 4rem;
		font-weight: 100;
		line-height: 1.1;
		margin: 4rem auto;
		max-width: 14rem;
	}

	p {
		max-width: 14rem;
		margin: 2rem auto;
		line-height: 1.35;
	}

	@media (min-width: 480px) {
		h1 {
			max-width: none;
		}

		p {
			max-width: none;
		}
	}
</style>

<main>
	{#each $quotes as quote}
		<div>
			<!-- <Quote {...quote} /> -->
			{quote.quote}
		</div>
	{/each}

	<nav>
		<button on:click={() => swipe('left')}> A random quote </button>
		<button on:click={() => swipe('right')}>
			Another quote by this person</button>
	</nav>
	<!--
	{#if process.browser}<script>
			let supportsWebShareAPI = false;
			if (navigator && navigator.share) {
				// we can use web share!
				supportsWebShareAPI = true;
			}
		</script><div>this devise support the Web Share API</div>
	{/if} -->
</main>
