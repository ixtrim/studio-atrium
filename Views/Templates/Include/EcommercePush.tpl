{* Server-side GA4 ecommerce events — rendered once before ecommerce.js *}
{if $ecommerce_events}
<script>
window.__saEcommerceEvents = {$ecommerce_events|json_encode nofilter};
</script>
{/if}
