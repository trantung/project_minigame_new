<?php $seoMeta = CommonSite::getMetaSeo(SEO_META); ?>
<?xml version="1.0" encoding="UTF-8" ?>
<rss xmlns:atom="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/" version="2.0">
	<channel>
		<title>{{ $seoMeta->title_site }}</title>
		<copyright>
			Copyright 2016
		</copyright>
		<link>{{ url() }}</link>
		<description>{{ $seoMeta->description_site }}</description>
		<language>vi-vn</language>
		<pubDate>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Carbon\Carbon::now())->format('Y-m-d H:i') }}</pubDate>
		<lastBuildDate>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Carbon\Carbon::now())->format('Y-m-d H:i') }}</lastBuildDate>
		<docs>{{ action('SiteRssController@index') }}</docs>
		<managingEditor>({{ url() }})</managingEditor>
		<webMaster>({{ url() }})</webMaster>
		<ttl>5</ttl>	
		<image>
			<url>
				{{ url(UPLOADIMG . '/avatar-game.jpg') }}
			</url>
			<title>{{ $seoMeta->title_site }}</title>
			<link>{{ url() }}</link>
		</image>
		<atom:link href="{{ action('SiteRssController@index') }}" rel="self" type="application/rss+xml"/>

		@foreach(SiteMap::getNewUrlSiteMap() as $new)
		<?php $typeSlug = TypeNew::find($new->type_new_id)->slug; ?>
		<item>
			<title>
				<![CDATA[
				{{ $new->title }}
				]]>
			</title>
			<description>
				<![CDATA[
				<a href="{{ url().'/'.$typeSlug.'/'.$new->slug }}">
					<img width="80px" border="0" src="{{ url(UPLOADIMG . '/news'.'/'. $new->id . '/' . $new->image_url) }}" align="left" hspace="5" />
				</a>
					{{ $new->sapo }}
				]]>
			</description>
			<link>
				{{ url().'/'.$typeSlug.'/'.$new->slug }}
			</link>
			<pubDate>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $new->start_date)->format('Y-m-d H:i') }}</pubDate>
			<guid>
				{{ url().'/'.$typeSlug.'/'.$new->slug }}
			</guid>
			<atom:link href="{{ url().'/'.$typeSlug.'/'.$new->slug }}" rel="self" type="application/rss+xml"/>
				<category>{{ TypeNew::find($new->type_new_id)->name }}</category>
			<dc:creator></dc:creator>
		</item>
		@endforeach

	</channel>
</rss>