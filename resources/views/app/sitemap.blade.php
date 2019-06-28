<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	@foreach(config('translatable.locales') as $code)
		<url>
			<loc>
				{{ localize($code, route('index')) }}
			</loc>

			<changefreq>
				weekly
			</changefreq>

			<priority>
				1.0
			</priority>
		</url>

		@foreach ($posts as $post)
			<url>
				<loc>
					{{ localize($code, route('post', ['slug' => $post->translate($code)->slug])) }}
				</loc>

				<lastmod>
					{{ $post->updated_at->tz('UTC')->toAtomString() }}
				</lastmod>

				<changefreq>
					weekly
				</changefreq>

				<priority>
					1.0
				</priority>
			</url>
		@endforeach
	@endforeach
</urlset>