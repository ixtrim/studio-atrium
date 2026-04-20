<?php
/* Smarty version 3.1.48, created on 2026-08-24 15:40:57
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/FeaturedVideo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a8c49e9799f77_29078001',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c79ee1b69841d335bf301b734e7dacd00b0e784f' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/FeaturedVideo.tpl',
      1 => 1787578831,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a8c49e9799f77_29078001 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="bg-[var(--brand-blue)]" id="featured-video">
    <div class="max-w-[1280px] mx-auto px-12 py-16 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <h2 class="text-[34px] font-bold text-[var(--brand-darker)] leading-[1.25]"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['featured_video']->value['title'], ENT_QUOTES, 'UTF-8', true) ));?>
</h2>
        </div>
        <div
            class="featured-video-player relative aspect-video w-full overflow-hidden cursor-pointer bg-black group"
            data-youtube-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['featured_video']->value['youtube_id'], ENT_QUOTES, 'UTF-8', true);?>
"
            data-video-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['featured_video']->value['video_url'], ENT_QUOTES, 'UTF-8', true);?>
"
            role="button"
            tabindex="0"
            aria-label="Odtwórz film: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['featured_video']->value['image_alt'], ENT_QUOTES, 'UTF-8', true);?>
"
        >
            <img
                alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['featured_video']->value['image_alt'], ENT_QUOTES, 'UTF-8', true);?>
"
                class="featured-video-poster absolute inset-0 w-full h-full object-cover transition-opacity duration-300"
                src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['featured_video']->value['thumbnail_url'], ENT_QUOTES, 'UTF-8', true);?>
"
            >
            <div class="featured-video-frame absolute inset-0 opacity-0 pointer-events-none" aria-hidden="true"></div>
            <div class="featured-video-play absolute inset-0 flex items-center justify-center transition-opacity duration-300">
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
                <div class="font-black text-[22px] tracking-wide"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['featured_video']->value['badge_name'], ENT_QUOTES, 'UTF-8', true);?>
 <span
                        class="text-[14px] font-normal align-middle"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['featured_video']->value['badge_area'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                <div class="text-[13px]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['featured_video']->value['badge_site'], ENT_QUOTES, 'UTF-8', true);?>
</div>
            </div>
        </div>
    </div>
</section>


<?php echo '<script'; ?>
>
(function () {
    var root = document.querySelector('#featured-video .featured-video-player');
    if (!root) return;

    var youtubeId = (root.getAttribute('data-youtube-id') || '').trim();
    var videoUrl = (root.getAttribute('data-video-url') || '').trim();
    var poster = root.querySelector('.featured-video-poster');
    var frameHost = root.querySelector('.featured-video-frame');
    var playBtn = root.querySelector('.featured-video-play');
    var canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var iframe = null;
    var playing = false;
    var leaveTimer = null;

    function youtubeSrc(autoplay) {
        var params = [
            'autoplay=' + (autoplay ? '1' : '0'),
            'mute=1',
            'controls=0',
            'modestbranding=1',
            'rel=0',
            'playsinline=1',
            'disablekb=1',
            'iv_load_policy=3',
            'fs=0',
            'loop=1',
            'playlist=' + encodeURIComponent(youtubeId)
        ].join('&');
        return 'https://www.youtube-nocookie.com/embed/' + encodeURIComponent(youtubeId) + '?' + params;
    }

    function setPlaying(on) {
        playing = on;
        root.classList.toggle('is-playing', on);
        if (poster) poster.style.opacity = on ? '0' : '1';
        if (playBtn) playBtn.style.opacity = on ? '0' : '1';
        if (frameHost) {
            frameHost.style.opacity = on ? '1' : '0';
            frameHost.style.pointerEvents = 'none';
        }
    }

    function ensureIframe(autoplay) {
        if (!youtubeId || !frameHost) return null;
        if (!iframe) {
            iframe = document.createElement('iframe');
            iframe.setAttribute('title', root.getAttribute('aria-label') || 'YouTube video');
            iframe.setAttribute('allow', 'autoplay; encrypted-media; picture-in-picture');
            iframe.setAttribute('allowfullscreen', '');
            iframe.setAttribute('tabindex', '-1');
            iframe.style.cssText = 'position:absolute;inset:0;width:100%;height:100%;border:0;';
            frameHost.appendChild(iframe);
        }
        var next = youtubeSrc(autoplay);
        if (iframe.getAttribute('src') !== next) {
            iframe.setAttribute('src', next);
        }
        return iframe;
    }

    function play() {
        if (!youtubeId || reduceMotion) return;
        if (leaveTimer) {
            clearTimeout(leaveTimer);
            leaveTimer = null;
        }
        ensureIframe(true);
        setPlaying(true);
    }

    function stop() {
        leaveTimer = setTimeout(function () {
            setPlaying(false);
            if (iframe) {
                iframe.removeAttribute('src');
            }
        }, 80);
    }

    function openFallback() {
        if (videoUrl) {
            window.open(videoUrl, '_blank', 'noopener');
        }
    }

    if (canHover && !reduceMotion) {
        root.addEventListener('pointerenter', play);
        root.addEventListener('pointerleave', stop);
        root.addEventListener('focus', play);
        root.addEventListener('blur', stop);
    }

    root.addEventListener('click', function (e) {
        e.preventDefault();
        if (canHover && playing) {
            openFallback();
            return;
        }
        if (playing) {
            stop();
        } else {
            play();
        }
    });

    root.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            if (playing) stop(); else play();
        }
    });
})();
<?php echo '</script'; ?>
>

<?php }
}
