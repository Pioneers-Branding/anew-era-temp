<?php
/**
 * Site footer component — closes <main>, renders the footer and the scripts.
 * Include it at the bottom of any page:
 *
 *   require __DIR__ . '/includes/footer.php';
 */

require_once __DIR__ . '/init.php';

$footer_link = 'text-sm text-white/75 transition-colors hover:text-white';
?>
</main>

<footer class="bg-night bg-footer-glow text-white">
  <div class="mx-auto max-w-[1280px] px-5 py-14 sm:px-10 lg:py-16">

    <?php /* Brand, the three link columns and Visit share one grid. They used
             to be a masthead band plus a four-column grid holding five
             children, so Visit wrapped onto a row of its own and left three
             empty cells and a lot of dead height under the colour bar. */ ?>
    <div class="grid grid-cols-1 gap-x-10 gap-y-11 sm:grid-cols-2 lg:grid-cols-4 lg:gap-x-8">

      <div class="sm:col-span-2 lg:col-span-1">
        <?= brand_logo($site['name'], 'h-9 w-auto', true) ?>
        <p class="m-0 mt-4 max-w-[34ch] text-[14.5px] leading-[1.6] text-white/60"><?= e($site['tagline']) ?></p>
        <div class="mt-5 flex gap-1.5" aria-hidden="true">
          <span class="h-1 w-[26px] bg-brand-blue"></span>
          <span class="h-1 w-[26px] bg-brand-orange"></span>
          <span class="h-1 w-[26px] bg-brand-green"></span>
        </div>
        <a href="contact.php" class="mt-6 inline-flex items-center gap-2.5 whitespace-nowrap rounded-full bg-white px-6 py-3.5 text-[14.5px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">
          Book a Consultation <?= arrow_icon(15) ?>
        </a>
      </div>

      <?php foreach ($site['footer_nav'] as $heading => $links): ?>
        <div>
          <p class="m-0 mb-3.5 text-[11px] font-extrabold uppercase tracking-[0.14em] text-white/40"><?= e($heading) ?></p>
          <ul class="m-0 flex list-none flex-col gap-2.5 p-0">
            <?php foreach ($links as $link): ?>
              <?php $away = !empty($link['external']); ?>
              <li>
                <a href="<?= e($link['href']) ?>" class="<?= $footer_link ?> <?= $away ? 'inline-flex items-center gap-1.5' : '' ?>"<?= $away ? ' target="_blank" rel="noopener"' : '' ?>>
                  <?= e($link['label']) ?>
                  <?php if ($away): ?>
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7M9 7h8v8"/></svg>
                    <span class="sr-only">(opens in a new tab)</span>
                  <?php endif; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>

      <div>
        <p class="m-0 mb-3.5 text-[11px] font-extrabold uppercase tracking-[0.14em] text-white/40">Visit</p>
        <p class="m-0 text-sm leading-[1.6] text-white/75"><?= implode('<br>', array_map('e', $site['hours'])) ?></p>
        <ul class="m-0 mt-2.5 flex list-none flex-col gap-2.5 p-0">
          <li><a href="#footer-clinics" class="<?= $footer_link ?> underline decoration-white/25 underline-offset-4 hover:decoration-white">Find your nearest clinic</a></li>
          <li><a href="<?= e($site['phone_href']) ?>" class="<?= $footer_link ?>"><?= e($site['phone']) ?></a></li>
          <li><a href="contact.php" class="<?= $footer_link ?>">Send us a message</a></li>
        </ul>
      </div>
    </div>

    <?php /* Every clinic, from the same menu the header's Locations dropdown
             reads, so the two can never disagree. This is the only place the
             location pages are linked from every page on the site. */ ?>
    <div id="footer-clinics" class="mt-12 scroll-mt-[110px] border-t border-white/12 pt-9">
      <div class="mb-6 flex flex-wrap items-baseline justify-between gap-x-6 gap-y-1.5">
        <p class="m-0 text-[11px] font-extrabold uppercase tracking-[0.14em] text-white/40">Our clinics</p>
        <?php // On a phone it takes its own line; squeezed beside the label it clipped. ?>
        <p class="m-0 w-full text-[13px] leading-[1.5] text-white/40 sm:w-auto sm:max-w-[46ch] sm:text-right"><?= e($site['menus']['locations']['note']) ?></p>
      </div>

      <div class="grid grid-cols-2 gap-x-8 gap-y-7 sm:grid-cols-3 lg:grid-cols-4">
        <?php foreach ($site['menus']['locations']['groups'] as $group): ?>
          <div>
            <p class="m-0 text-[13.5px] font-extrabold text-white"><?= e($group['name']) ?></p>
            <p class="m-0 mb-2.5 text-[11.5px] leading-[1.45] text-white/40"><?= e($group['desc']) ?></p>
            <ul class="m-0 flex list-none flex-col gap-2 p-0">
              <?php foreach ($group['items'] as $item): ?>
                <li><a href="contact.php#clinics" class="<?= $footer_link ?>"><?= e($item['label']) ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="mt-12 flex flex-wrap items-center justify-between gap-x-6 gap-y-4 border-t border-white/12 pt-6">
      <div class="flex flex-wrap gap-x-6 gap-y-2">
        <?php foreach ($site['legal_nav'] as $link): ?>
          <a href="<?= e($link['href']) ?>" class="text-xs text-white/40 transition-colors hover:text-white"><?= e($link['label']) ?></a>
        <?php endforeach; ?>
      </div>
      <div class="flex flex-wrap gap-2">
        <?php foreach ($site['badges'] as $badge): ?>
          <span class="rounded-full border border-white/25 px-3 py-[6px] text-[11.5px] font-bold text-white/70"><?= e($badge) ?></span>
        <?php endforeach; ?>
        <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-green px-3 py-[6px] text-[11.5px] font-bold text-ink"><?= e($site['rating']) ?></span>
      </div>
    </div>

    <?php /* Brand sign-off. Decorative — the same logo is announced at the top
             of the footer — so it is sized to close the page, not to fill it. */ ?>
    <div class="mt-11 flex justify-center">
      <?= brand_logo($site['name'], 'w-[min(52vw,340px)] select-none opacity-90', true, true) ?>
    </div>

    <p class="m-0 mt-9 max-w-[900px] text-[11.5px] leading-[1.65] text-white/30"><?= e($site['legal']) ?></p>
  </div>
</footer>

<!-- Phone action bar. Fixed to the bottom below lg, where the header's own
     "Get started" is folded into the menu — so calling or booking is always
     one tap away rather than a scroll back to the top. -->
<div class="action-bar fixed inset-x-0 bottom-0 z-40 flex gap-2 border-t border-ink/10 bg-white/95 px-3 pt-3 backdrop-blur-md lg:hidden">
  <a href="<?= e($site['phone_href']) ?>" class="flex flex-1 items-center justify-center gap-2 rounded-full border-2 border-brand-blue px-5 py-3.5 text-sm font-extrabold text-brand-blue">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6.5 3.5h3l1.5 4-2 1.5a12 12 0 0 0 6 6l1.5-2 4 1.5v3a2 2 0 0 1-2.2 2A17 17 0 0 1 4.5 5.7 2 2 0 0 1 6.5 3.5Z"/></svg>
    Call
  </a>
  <a href="contact.php" class="flex flex-1 items-center justify-center rounded-full bg-brand-orange px-5 py-3.5 text-sm font-extrabold text-white">Book a Visit</a>
</div>

<script>
(function () {
  var acsbScript = document.createElement('script');
  var acsbHost = document.querySelector('head') || document.body;
  acsbScript.src = 'https://acsbapp.com/apps/app/dist/js/app.js';
  acsbScript.async = true;
  acsbScript.onload = function () {
    acsbJS.init({
      statementLink: '',
      footerHtml: '',
      hideMobile: false,
      hideTrigger: false,
      disableBgProcess: false,
      language: 'en',
      position: 'left',
      leadColor: '#787878',
      triggerColor: '#dddddd',
      triggerRadius: '50%',
      triggerPositionX: 'left',
      triggerPositionY: 'bottom',
      triggerIcon: 'people',
      triggerSize: 'small',
      triggerOffsetX: 20,
      triggerOffsetY: 20,
      mobile: {
        triggerSize: 'small',
        triggerPositionX: 'left',
        triggerPositionY: 'bottom',
        triggerOffsetX: 10,
        triggerOffsetY: 0,
        triggerRadius: '50%'
      }
    });
  };
  acsbHost.appendChild(acsbScript);
})();
</script>
<script>
(function () {
  var talkFurther = document.createElement('script');
  talkFurther.type = 'text/javascript';
  talkFurther.src = 'https://js.talkfurther.com/talkfurther_init.min.js';
  talkFurther.async = true;
  document.head.appendChild(talkFurther);
})();
</script>
<script src="<?= e(asset('assets/js/main.js')) ?>" defer></script>
</body>
</html>
