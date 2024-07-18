<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "WebPage",
  "name": "{{@$metaTags->title}}",
  "speakable":
  {
      "@type": "SpeakableSpecification",
      "xpath": [
          "/html/head/title",
            "/html/head/meta[@name='description']/@content"
      ]
  },
  "url": "{{$actual_link}}"
}
</script>