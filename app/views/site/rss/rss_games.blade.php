<?php $seoMeta = CommonSite::getMetaSeo('Type', $type->id); ?>
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

		@if(isset($games))
			@foreach($games as $value)
				<?php $url = CommonGame::getUrlGame($value); ?>
				<item>
					<title>
						<![CDATA[
						{{ $value->name }}
						]]>
					</title>
					<description>
						<![CDATA[
						<a href="{{ $url }}">
							<img width="80px" border="0" src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $value->image_url) }}" align="left" hspace="5" />
						</a>
							{{ $value->sapo }}
						]]>
					</description>
					<link>
						{{ $url }}
					</link>
					<pubDate>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->start_date)->format('Y-m-d H:i') }}</pubDate>
					<guid>
						{{ $url }}
					</guid>
					<atom:link href="{{ $url }}" rel="self" type="application/rss+xml"/>
						<category>{{ $type->name }}</category>
					<dc:creator></dc:creator>
				</item>
			@endforeach
		@endif
	</channel>
</rss>