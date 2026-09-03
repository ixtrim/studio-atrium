<section class="bg-[var(--brand-blue)]" id="featured-video">
    <div class="max-w-[1280px] mx-auto px-12 py-16 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <h2 class="text-[34px] font-bold text-[var(--brand-darker)] leading-[1.25]">{$featured_video.title|escape|nl2br}</h2>
        </div>
        <div
            class="relative aspect-video w-full overflow-hidden cursor-pointer"
            id="featured-video-player"
            data-youtube-id="{$featured_video.youtube_id|escape}"
            data-video-url="{$featured_video.video_url|escape}"
        >
            <div class="absolute inset-0" data-yt-host></div>
            <div class="absolute inset-0 z-10" data-yt-poster>
                <img alt="{$featured_video.image_alt|escape}" class="w-full h-full object-cover" src="{$featured_video.thumbnail_url|escape}">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-20 h-20 bg-[var(--brand-red)] flex items-center justify-center shadow-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-play w-8 h-8 text-white fill-white ml-1" aria-hidden="true">
                            <path d="M5 5a2 2 0 0 1 3.008-1.728l11.997 6.998a2 2 0 0 1 .003 3.458l-12 7A2 2 0 0 1 5 19z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-[var(--brand-red)] text-white px-4 py-2 flex items-center justify-between z-10">
                    <div class="font-black text-[22px] tracking-wide">{$featured_video.badge_name|escape} <span
                            class="text-[16px] font-normal align-middle">{$featured_video.badge_area|escape}</span></div>
                    <div class="text-[13px]">{$featured_video.badge_site|escape}</div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
(function () {
    var root = document.getElementById('featured-video-player');
    if (!root) return;

    var poster = root.querySelector('[data-yt-poster]');
    var host = root.querySelector('[data-yt-host]');
    var youtubeId = (root.getAttribute('data-youtube-id') || '').trim();
    var videoUrl = (root.getAttribute('data-video-url') || '').trim();
    var iframe = null;
    var hoverTimer = null;

    if (!youtubeId && videoUrl) {
        var match = videoUrl.match(/(?:youtu\.be\/|v=|embed\/)([A-Za-z0-9_-]{11})/);
        if (match) youtubeId = match[1];
    }

    function embedSrc() {
        return 'https://www.youtube-nocookie.com/embed/' + encodeURIComponent(youtubeId)
            + '?autoplay=1&mute=1&controls=0&rel=0&modestbranding=1&playsinline=1&disablekb=1'
            + '&fs=0&iv_load_policy=3&loop=1&playlist=' + encodeURIComponent(youtubeId);
    }

    function play() {
        if (!youtubeId || iframe) return;
        iframe = document.createElement('iframe');
        iframe.setAttribute('src', embedSrc());
        iframe.setAttribute('title', 'YouTube video');
        iframe.setAttribute('allow', 'autoplay; encrypted-media; picture-in-picture');
        iframe.setAttribute('allowfullscreen', 'true');
        iframe.setAttribute('frameborder', '0');
        iframe.className = 'absolute inset-0 w-full h-full';
        host.appendChild(iframe);
        if (poster) poster.style.display = 'none';
    }

    function stop() {
        if (hoverTimer) {
            clearTimeout(hoverTimer);
            hoverTimer = null;
        }
        if (iframe && iframe.parentNode) {
            iframe.parentNode.removeChild(iframe);
        }
        iframe = null;
        if (host) host.innerHTML = '';
        if (poster) poster.style.display = '';
    }

    root.addEventListener('mouseenter', function () {
        hoverTimer = setTimeout(play, 80);
    });
    root.addEventListener('mouseleave', stop);

    root.addEventListener('click', function (e) {
        if (iframe) {
            e.preventDefault();
            return;
        }
        if (videoUrl) {
            window.open(videoUrl, '_blank', 'noopener');
        }
    });
})();
</script>
