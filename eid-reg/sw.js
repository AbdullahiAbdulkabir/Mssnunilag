self.addEventListener('install', function(event) {
	// console.log('[Service Worker] installing Service worker.....', event);
event.waitUntil(caches.open('cohimssnlagos')
	.then(function(cache) {
	 cache.add('/')
	 cache.add('index.php')
	 cache.add('css/main.css')
	 cache.add('js/app.js')
	 cache.add('imgs/bg-mobile-fallback.jpg')
	 cache.add('imgs/mssnlogos')
	 cache.add('js/jquery-3.2.1.min.js')
	 cache.add('css/bootstrap.min.css')
	 cache.add('js/bootstrap.min.js')

	})

)	

});
self.addEventListener('activate', function(event) {
	// console.log('[Service Worker] activating Service worker.....', event);

});
self.addEventListener('fetch', function(event) {
	// console.log('[Service Worker] activating Service worker.....', event);
	event.respondWith(
		caches.match(event.request)
		.then(function(response) {
			if (response) {
				return response;
			}else{
				return fetch(event.request);
			}
			})
		);
});