<?php header('Content-Type: text/xml'); ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">  
    @foreach ($documents as $document)
        <url>
            <loc>{{route('documents-show', ['category' => $document->category()->first()->family_category()->first()->slug,'subcategory' => $document->category()->first()->slug,'slug' => $document->slug ])}}</loc>
            <lastmod>{{ $document->updated_at->tz('GMT')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>1</priority>
        </url>
    @endforeach
    @foreach ($npa as $zakon)
        <url>
            <loc>{{route('zakon-show', ['id'=>$zakon])}}</loc>
            <changefreq>monthly</changefreq>
            <priority>1</priority>
        </url>
    @endforeach
    @foreach ($questions as $question)
        <url>
            <loc>{{route('forum-discission', ['slug'=>$question])}}</loc>
            <changefreq>monthly</changefreq>
            <priority>1</priority>
        </url>
    @endforeach

</urlset>