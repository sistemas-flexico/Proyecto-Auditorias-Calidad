const CACHE_NAME = 'miapp-cache-v1';
const urlsToCache = [
  'index.html',
  'estilos.css',
  'css/fondo0.jpg',
  'css/fondo1.jpg'
];

self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => cache.addAll(urlsToCache))
  );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => response || fetch(event.request))
  );
});
