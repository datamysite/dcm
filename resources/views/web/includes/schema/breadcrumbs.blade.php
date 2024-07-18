<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "BreadcrumbList", 
  "itemListElement": [{
    "@type": "ListItem", 
    "position": 1, 
    "name": "Home",
    "item": "{{URL::to('/'.app()->getLocale())}}"  
  },{
    "@type": "ListItem", 
    "position": 2, 
    "name": "{{@$metaTags->title}}",
    "item": "{{$actual_link}}"  
  }]
}
</script>
