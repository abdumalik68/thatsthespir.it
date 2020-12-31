<script>
    import { onMount, afterUpdate } from "svelte";

    export let quote = {};
</script>

<style lang="scss">
    blockquote {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 1rem;
        max-width: 600px;
        margin: auto;
    }
</style>

<blockquote>
    <p>{quote.body} - {quote.fullname}</p>
    <img src={quote.photo} alt="" />
    link:
    {quote.slug}
</blockquote>
