<?php
	header("Content-Type: text/xml;charset=iso-8859-1");
	echo '<?xml version="1.0" encoding="UTF-8"?>
			<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
	echo '<url>
		  <loc>http://choinhanh.vn/</loc>
		  <changefreq>daily</changefreq>
		  <priority>1.0</priority>
		</url>';
	echo '' ;

	echo '</urlset>' ;
	var_dump(Type::all()->toArray());
	
?>