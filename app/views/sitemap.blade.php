<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{url()}}</loc>
        <priority>0.5</priority>
    </url>
    @foreach(SiteMap::getTypeUrlSiteMap() as $type)
    <url>
    	<loc>{{ url().'/'.$type->slug }}</loc>
		<changefreq>weekly</changefreq>
		<priority>0.8</priority>
    </url>
	    @foreach(SiteMap::getGameUrlSiteMap($type->slug) as $game)
	    <url>
	    	<loc>{{ url().'/'.$type->slug.'/'.$game->slug }}</loc>
			<lastmod>{{ $game->start_date }}</lastmod>
			<changefreq>weekly</changefreq>
			<priority>0.5</priority>
	    </url>
	    @endforeach
    @endforeach
</urlset>