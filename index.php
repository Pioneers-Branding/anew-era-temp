<?php
/**
 * Anew Era Health — homepage.
 * Header and footer come from includes/; all copy comes from includes/data.php.
 */
require __DIR__ . '/includes/header.php';

$btn_white  = 'inline-flex items-center gap-2.5 rounded-full bg-white px-7 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white';
$eyebrow    = 'm-0 text-xs font-extrabold uppercase tracking-[0.16em]';
?>

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<section id="top" class="relative flex min-h-[720px] flex-col overflow-hidden bg-night pt-[92px] sm:pt-[114px] lg:min-h-[840px]">
  <div class="absolute inset-0">
    <!-- Background video, with a poster frame that shows first and stands in
         wherever autoplay is refused. Drop in a different file and update the
         two paths below; remove the video and the slot falls back to
         assets/img/hero.jpg on its own. -->
    <?= video_slot('homepage/Create_a_realistic_warm_upli.mp4', 'homepage/hero-poster.jpg', 'hero', 'A group of friends laughing together outdoors') ?>
  </div>
  <div class="pointer-events-none absolute inset-0 bg-hero-veil"></div>

  <div class="pointer-events-none relative z-10 flex flex-1 flex-col items-center justify-center px-6 py-16 text-center sm:px-10 lg:py-24">
    <p class="on-footage m-0 mb-6 text-[13px] font-extrabold uppercase tracking-[0.16em] text-white/75">In-network with most major plans</p>

    <h1 class="on-footage m-0 max-w-[17ch] text-balance text-[40px] leading-[1.04] tracking-[-0.035em] text-white sm:text-[56px] lg:text-[74px]">A new era of mental health care.</h1>

    <p class="on-footage mb-9 mt-6 max-w-[54ch] text-base leading-relaxed text-white/85 sm:text-[19px]">Evidence-based psychiatry, therapy and TMS — delivered by clinicians who take the time to know you. In-person and telehealth, most insurance accepted.</p>

    <div class="pointer-events-auto flex flex-wrap justify-center gap-3">
      <a href="contact.php" class="inline-flex items-center gap-2.5 rounded-full bg-white px-7 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">Get Started</a>
      <a href="<?= e($site['phone_href']) ?>" class="inline-flex items-center gap-2.5 rounded-full border-2 border-white/55 px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-white/15"><?= e($site['phone']) ?></a>
    </div>

    <a href="#tms" class="pointer-events-auto mt-8 inline-flex items-center gap-2 text-sm font-extrabold text-white transition-colors hover:text-brand-green">
      Learn About TMS
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M7 17 17 7M9 7h8v8"></path></svg>
    </a>
  </div>
</section>

<!-- ─── Insurer marquee ──────────────────────────────────────────────── -->
<section id="insurance" class="border-b-2 border-ink/10">
  <?php // On a phone the label and the coverage link leave the marquee about
        // 50px to run in, so it reads as empty. Below lg the three parts
        // stack and the logos get the full width. ?>
  <div class="mx-auto flex max-w-[1280px] flex-col items-center gap-4 px-5 py-7 sm:px-10 lg:flex-row lg:gap-12 lg:py-9">
    <p class="m-0 whitespace-nowrap text-xs font-extrabold uppercase tracking-[0.16em] text-ink/50">In-network with</p>
    <div class="marquee-mask w-full min-w-0 flex-1 overflow-hidden">
      <div class="flex w-max animate-marquee items-center gap-14">
        <?php for ($copy = 0; $copy < 2; $copy++): ?>
          <?php foreach ($data['insurers'] as $insurer): ?>
            <?= insurer_mark($insurer, $copy > 0) ?>
          <?php endforeach; ?>
        <?php endfor; ?>
      </div>
    </div>
    <a href="contact.php" class="whitespace-nowrap text-[13px] font-extrabold text-brand-blue transition-colors hover:text-brand-blue-dark">Verify My Coverage →</a>
  </div>
</section>

<!-- ─── Results ──────────────────────────────────────────────────────── -->
<?php $results = $data['results']; ?>
<section id="results" class="bg-surface px-5 py-14 sm:px-10 lg:py-[72px]">
  <div class="mx-auto max-w-[1280px]">
    <p class="<?= $eyebrow ?> mb-4 text-center text-brand-blue">Outcomes</p>
    <h2 data-reveal class="m-0 mb-9 text-center text-[32px] leading-[1.06] tracking-[-0.03em] sm:text-[44px] lg:mb-12">
      <em class="italic text-brand-blue"><?= e($results['heading_accent']) ?></em><?= e($results['heading_rest']) ?>
    </h2>

    <div class="grid items-stretch gap-6 lg:grid-cols-2">
      <div data-reveal class="relative min-h-[300px] overflow-hidden rounded-[20px] bg-night sm:min-h-[380px] lg:min-h-[520px]">
        <?= image_slot($results['photo'], 'Drop a supporting photo', $results['photo_alt']) ?>
      </div>

      <div class="grid grid-cols-2 gap-3 sm:gap-6">
        <?php foreach ($results['stats'] as $stat): ?>
          <div data-reveal class="lift flex min-h-[168px] flex-col justify-center rounded-[20px] border border-ink/30 px-5 py-6 sm:px-7 sm:py-8 sm:min-h-[220px]">
            <p class="display-mark m-0 text-[40px] font-medium leading-none tracking-[-0.02em] text-ink sm:text-[76px]" data-count="<?= e($stat['value']) ?>"><?= e($stat['value']) ?></p>
            <p class="m-0 mt-4 text-[15px] font-medium leading-7 text-ink/80"><?= e($stat['label']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ─── Conditions ───────────────────────────────────────────────────── -->
<section id="conditions" class="mx-auto max-w-[1280px] px-5 py-14 sm:px-10 lg:py-[72px]">
  <div data-reveal class="mb-9 flex flex-wrap items-end justify-between gap-10 border-b-2 border-ink/15 pb-6">
    <div>
      <p class="<?= $eyebrow ?> mb-4 text-brand-blue">Conditions We Treat</p>
      <h2 class="m-0 max-w-[20ch] text-[32px] leading-[1.06] tracking-[-0.03em] sm:text-[44px]">Care for the whole range of what you're carrying.</h2>
    </div>
    <p class="m-0 max-w-[34ch] text-[15px] font-medium leading-relaxed text-ink/70">Every plan starts with a full diagnostic assessment — never a fifteen-minute script.</p>
  </div>

  <?php // Below lg the tab column dissolves (display:contents) so the tabs
      // and the detail panel become siblings in one flow. The panel then
      // takes an order that puts it right beneath the selected tab — an
      // accordion, without a second copy of the content in the markup. ?>
  <div class="flex flex-col gap-2.5 lg:grid lg:items-stretch lg:gap-10 lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)]" data-conditions>
    <div class="contents lg:flex lg:flex-col lg:gap-2.5">
      <?php foreach ($data['conditions'] as $i => $condition): ?>
        <button type="button"
                data-cond-tab="<?= $i ?>"
                data-active="<?= $i === 0 ? 'true' : 'false' ?>"
                aria-controls="cond-panel-<?= $i ?>"
                style="--tab-order:<?= $i * 2 ?>"
                class="cond-tab grid w-full flex-1 cursor-pointer group grid-cols-[auto_minmax(0,1fr)_auto] items-center gap-4 rounded-2xl border-0 border-l-4 border-ink/15 bg-white px-6 py-5 text-left font-sans transition-colors data-[active=true]:border-brand-orange data-[active=true]:bg-psych">
          <?= condition_mark($condition, 'h-9 w-9 shrink-0 [filter:brightness(0.62)_saturate(1.25)]') ?>
          <span class="min-w-0 text-lg font-extrabold tracking-[-0.02em] text-ink sm:text-xl"><?= e($condition['name']) ?></span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true" class="text-brand-blue transition-transform duration-200 group-hover:translate-x-1"><path d="M5 12h14M13 6l6 6-6 6"></path></svg>
        </button>
      <?php endforeach; ?>
      <a href="contact.php" class="cond-tail mt-6 inline-flex items-center gap-2 text-sm font-extrabold text-brand-blue transition-colors hover:text-brand-blue-dark">
        See All Conditions We Treat <?= arrow_icon(15) ?>
      </a>
    </div>

    <div class="cond-panelbox relative min-h-[420px] min-w-0 overflow-hidden rounded-[28px] bg-night sm:min-h-[520px] lg:min-h-[620px]">
      <?php foreach ($data['conditions'] as $i => $condition): ?>
        <div id="cond-panel-<?= $i ?>"
             data-cond-panel="<?= $i ?>"
             data-active="<?= $i === 0 ? 'true' : 'false' ?>"
             class="invisible absolute inset-0 opacity-0 transition-opacity duration-300 data-[active=true]:visible data-[active=true]:opacity-100">
          <div class="absolute inset-0">
            <?= image_slot($condition['slot'], $condition['name'] . ' photo', $condition['alt'], false, $condition['focus'] ?? '') ?>
          </div>
          <div class="pointer-events-none absolute inset-0 bg-cond-veil"></div>
          <div class="absolute left-4 top-4 w-[calc(100%-2rem)] rounded-[20px] bg-night/60 p-6 backdrop-blur-[14px] sm:left-8 sm:top-8 sm:w-[min(400px,calc(100%-64px))] sm:p-[30px]">
            <div class="mb-3.5 flex items-center gap-2.5">
              <span class="h-1 w-7 bg-brand-sky"></span>
              <h3 class="m-0 text-[26px] tracking-[-0.025em] text-white"><?= e($condition['name']) ?></h3>
            </div>
            <p class="m-0 mb-[22px] text-[15px] font-medium leading-relaxed text-white/85"><?= e($condition['blurb']) ?></p>
            <div class="border-t border-white/25 pt-5">
              <p class="m-0 mb-3 text-[13px] font-semibold text-white/70">How we treat it:</p>
              <div class="mb-6 flex flex-wrap gap-2">
                <?php foreach ($condition['chips'] as $chip): ?>
                  <span class="rounded-full border border-white/40 px-3 py-2 text-[13px] font-semibold text-white"><?= e($chip) ?></span>
                <?php endforeach; ?>
              </div>
              <div class="flex flex-wrap gap-0.5">
                <a href="contact.php" class="inline-flex items-center gap-2 rounded-full bg-white px-[18px] py-3.5 text-sm font-extrabold text-ink transition-colors hover:bg-brand-orange hover:text-white">
                  Get Care <?= arrow_icon(15) ?>
                </a>
                <a href="#treatments" class="inline-flex items-center gap-2 rounded-full bg-white/15 px-[18px] py-3.5 text-sm font-extrabold text-white transition-colors hover:bg-white/30">Explore Treatments</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ─── Our focus ────────────────────────────────────────────────────── -->
<section id="focus" class="px-5 py-3 sm:px-10 sm:py-5">
  <div class="mx-auto max-w-[1280px] rounded-[28px] bg-brand-blue px-6 py-12 sm:px-10 lg:px-14 lg:py-16">
    <?php // The column keeps its left-aligned text but sits centred in the
          // panel, so the space either side of it matches. ?>
    <div data-reveal class="mx-auto max-w-[1140px]">
      <p class="m-0 mb-11 text-[15px] font-semibold text-white/70">Our mission</p>
      <div class="flex flex-col gap-10 border-l border-white/35 pl-6 sm:pl-14">
        <?php foreach ($data['focus_paragraphs'] as $paragraph): ?>
          <p class="m-0 cursor-default text-pretty font-serif text-[22px] font-medium leading-[1.38] tracking-[-0.015em] text-white/80 transition-colors duration-300 hover:text-[#fbd9b0] sm:text-[26px] lg:text-[32px]"><?= e($paragraph) ?></p>
        <?php endforeach; ?>
        <a href="contact.php" class="mt-2 inline-flex items-center gap-2.5 self-start rounded-full bg-white px-7 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">
          Talk to Our Team <?= arrow_icon(15) ?>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ─── Treatments ───────────────────────────────────────────────────── -->
<section id="treatments" class="bg-surface px-5 py-14 sm:px-10 lg:py-[72px]">
  <div class="mx-auto max-w-[1280px]">
    <div data-reveal class="mb-10 text-center">
      <p class="<?= $eyebrow ?> mb-4 text-brand-blue">Treatments</p>
      <h2 class="m-0 text-[32px] leading-[1.06] tracking-[-0.03em] sm:text-[44px]">A full spectrum of care, under one roof.</h2>
    </div>

    <div class="-mx-5 flex snap-x snap-mandatory gap-4 overflow-x-auto scroll-pl-5 px-5 pb-3 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden sm:mx-0 sm:grid sm:snap-none sm:grid-cols-4 sm:gap-6 sm:overflow-visible sm:px-0 sm:pb-0 lg:grid-cols-6">
      <?php foreach ($data['treatments'] as $i => $treatment): ?>
        <?php
              // With five cards: the fourth opens the last desktop row and the
              // fifth opens the last tablet row, so each is nudged half a
              // column in to centre what remains.
              $offset = ($i === 3 ? ' lg:col-start-2' : '') . ($i === 4 ? ' sm:col-start-2 lg:col-start-auto' : '');
        ?>
        <a href="contact.php" data-reveal class="lift flex w-[82%] shrink-0 snap-center flex-col rounded-[20px] sm:w-auto sm:shrink sm:col-span-2<?= $offset ?> bg-white px-8 pb-8 pt-9 no-underline">
          <div class="relative mb-6 min-h-[210px] overflow-hidden rounded-2xl bg-night">
            <?= image_slot($treatment['slot'], $treatment['name'] . ' photo', $treatment['alt'], false, $treatment['focus'] ?? '') ?>
            <div class="pointer-events-none absolute inset-0 bg-card-veil"></div>
            <div class="absolute inset-x-3 bottom-3 flex flex-wrap gap-2">
              <?php foreach ($treatment['chips'] as $chip): ?>
                <span class="chip-glass"><?= e($chip) ?></span>
              <?php endforeach; ?>
            </div>
          </div>
          <h3 class="m-0 mb-2 text-center text-2xl tracking-[-0.02em] text-brand-blue"><?= e($treatment['name']) ?></h3>
          <p class="m-0 mb-0 text-center text-[15px] font-medium leading-[1.55] text-ink/70"><?= e($treatment['detail']) ?></p>
        </a>
      <?php endforeach; ?>
    </div>

    <div class="mt-12 text-center">
      <a href="contact.php" class="inline-flex items-center rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark">Get Care Today</a>
    </div>
  </div>
</section>

<!-- ─── PHQ-9 strip ──────────────────────────────────────────────────── -->
<?php // A thin band at the midpoint of the page: same cream-and-glow treatment
      // as the closing CTA, at a fraction of the height, so it reads as a nudge
      // rather than another section. ?>
<section class="mx-auto max-w-[1280px] px-5 py-3 sm:px-10 sm:py-5">
  <div data-reveal class="flex flex-col items-center gap-4 rounded-[28px] border border-ink/10 bg-cream bg-aurora px-6 py-5 text-center sm:flex-row sm:justify-between sm:gap-8 sm:px-10 sm:text-left">
    <div class="flex items-center gap-4">
      <span class="hidden h-11 w-11 shrink-0 items-center justify-center rounded-full bg-brand-blue/10 text-brand-blue sm:flex">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M9 4.5H7.5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-12a2 2 0 0 0-2-2H15"/>
          <path d="M9.6 3h4.8a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H9.6a.6.6 0 0 1-.6-.6V3.6a.6.6 0 0 1 .6-.6Z"/>
          <path d="m9 13 1.8 1.8L15 10.6"/>
        </svg>
      </span>
      <div>
        <p class="m-0 text-[17px] font-extrabold tracking-[-0.01em] text-ink">Not sure how you are really doing?</p>
        <p class="m-0 mt-0.5 text-sm leading-relaxed text-ink/65">Talk to our team about how you are feeling and the next steps for your care.</p>
      </div>
    </div>
    <a href="contact.php#message" class="inline-flex shrink-0 items-center gap-2 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark">
      Talk to Our Team <?= arrow_icon(15) ?>
    </a>
  </div>
</section>

<!-- ─── TMS ──────────────────────────────────────────────────────────── -->
<section id="tms" class="px-5 py-3 sm:px-10 sm:py-5">
  <div class="relative mx-auto flex min-h-[560px] max-w-[1280px] items-end overflow-hidden rounded-[28px] bg-night lg:min-h-[640px]">
    <div class="absolute inset-0">
      <?= image_slot('homepage/tms-new-era.webp', 'TMS treatment room photo', 'A smiling patient in the TMS chair, coil positioned, with a clinician talking her through the session') ?>
    </div>
    <div class="pointer-events-none absolute inset-0 bg-tms-veil"></div>

    <div data-reveal class="relative flex w-full flex-col gap-8 p-6 sm:p-12 lg:px-16 lg:pb-14 lg:pt-16">
      <div class="max-w-[640px]">
        <p class="<?= $eyebrow ?> mb-4 text-brand-green">TMS Therapy</p>
        <h2 class="m-0 mb-4 text-[28px] leading-[1.1] tracking-[-0.03em] text-white sm:text-[38px]">When medication hasn't been enough.</h2>
        <p class="m-0 text-base font-medium leading-relaxed text-white/85">Non-invasive, FDA-cleared magnetic stimulation for depression and OCD. No anesthesia, no sedation — you drive yourself home and go back to your day.</p>
      </div>

      <div class="flex flex-wrap items-center justify-between gap-8 border-t border-white/25 pt-7">
        <div class="flex flex-wrap gap-10">
          <?php foreach ($data['tms_stats'] as $stat): ?>
            <div>
              <p class="display-mark m-0 text-[32px] font-extrabold tracking-[-0.03em]" style="color:<?= e($stat['color']) ?>" data-count="<?= e($stat['value']) ?>"><?= e($stat['value']) ?></p>
              <p class="m-0 mt-0.5 text-[13px] text-white/75"><?= e($stat['label']) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
        <a href="contact.php" class="inline-flex items-center gap-2.5 whitespace-nowrap rounded-full bg-white px-7 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">
          See If TMS Is Right for You <?= arrow_icon(16) ?>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ─── Therapy vs psychiatry ────────────────────────────────────────── -->
<section class="bg-white px-5 py-14 sm:px-10 lg:py-[72px]">
  <div class="mx-auto max-w-[1280px]">
    <div data-reveal class="mb-10 text-center">
      <p class="<?= $eyebrow ?> mb-4 text-brand-blue">Choosing care</p>
      <h2 class="m-0 mb-4 text-[32px] leading-[1.06] tracking-[-0.03em] sm:text-[44px]">Therapy, psychiatry, or both?</h2>
      <p class="m-0 text-[17px] font-medium text-ink/70">Most people start with one and add the other when it helps. Here is the plain difference between them.</p>
    </div>

    <div class="lg:grid lg:grid-cols-[minmax(160px,0.7fr)_minmax(0,1fr)_minmax(0,1fr)] lg:gap-x-6">
      <div class="hidden lg:block"></div>
      <div class="hidden rounded-t-[20px] bg-therapy px-8 pb-6 pt-9 lg:block">
        <h3 class="m-0 text-[28px] tracking-[-0.02em] text-brand-blue-dark">Therapy</h3>
      </div>
      <div class="hidden rounded-t-[20px] bg-psych px-8 pb-6 pt-9 lg:block">
        <h3 class="m-0 text-[28px] tracking-[-0.02em] text-clay">Psychiatry</h3>
      </div>

      <?php foreach ($data['compare_rows'] as $row): ?>
        <div class="mb-4 overflow-hidden rounded-2xl border border-ink/10 lg:mb-0 lg:contents">
          <div class="flex items-center border-ink/15 px-5 py-5 text-base font-extrabold text-ink lg:border-t lg:px-0 lg:py-6 lg:pr-4"><?= e($row['label']) ?></div>
          <div class="bg-therapy px-5 py-5 sm:px-8 lg:border-t lg:border-brand-blue/20 lg:py-6">
            <span class="mb-1.5 block text-[11px] font-extrabold uppercase tracking-[0.14em] text-brand-blue/70 lg:hidden">Therapy</span>
            <p class="m-0 text-[15px] font-medium leading-relaxed text-brand-blue-dark"><?= e($row['therapy']) ?></p>
          </div>
          <div class="bg-psych px-5 py-5 sm:px-8 lg:border-t lg:border-brand-orange/30 lg:py-6">
            <span class="mb-1.5 block text-[11px] font-extrabold uppercase tracking-[0.14em] text-clay/70 lg:hidden">Psychiatry</span>
            <p class="m-0 text-[15px] font-medium leading-relaxed text-clay-deep"><?= e($row['psychiatry']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>

      <div class="hidden lg:block"></div>
      <div class="rounded-b-[20px] bg-therapy px-5 pb-10 pt-7 sm:px-8">
        <a href="contact.php" class="inline-flex items-center gap-2 rounded-full bg-brand-blue px-6 py-3.5 text-sm font-extrabold text-white transition-colors hover:bg-brand-blue-dark">
          Get Started <?= arrow_icon(15) ?>
        </a>
      </div>
      <div class="mt-4 rounded-b-[20px] bg-psych px-5 pb-10 pt-7 sm:px-8 lg:mt-0">
        <a href="contact.php" class="inline-flex items-center gap-2 rounded-full bg-brand-orange px-6 py-3.5 text-sm font-extrabold text-white transition-colors hover:bg-brand-orange-dark">
          Get Started <?= arrow_icon(15) ?>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ─── Reviews ──────────────────────────────────────────────────────── -->
<?php $review_pages = array_chunk($data['reviews'], 6); ?>
<section id="reviews" class="px-5 py-3 sm:px-10 sm:py-5">
  <div class="mx-auto max-w-[1280px] rounded-[28px] bg-[#10202c] bg-reviews-glow px-6 py-12 sm:px-16 lg:py-[56px]" data-reviews>
    <div class="mb-8 flex items-center justify-between gap-6">
      <div>
        <p class="<?= $eyebrow ?> mb-4 text-brand-green">Reviews</p>
        <h2 class="m-0 text-[28px] leading-[1.1] tracking-[-0.02em] text-white sm:text-4xl">In their words.</h2>
          <div class="mt-3 flex items-center gap-2.5">
            <span class="text-[15px] leading-none tracking-[0.12em] text-brand-orange" aria-hidden="true">★★★★★</span>
            <span class="text-sm font-semibold text-white/70"><?= e(ltrim($site['rating'], '★ ')) ?></span>
          </div>
      </div>
      <div class="flex gap-2.5">
        <button type="button" data-review-prev aria-label="Previous reviews" class="flex h-12 w-12 cursor-pointer items-center justify-center rounded-full border-2 border-white/40 bg-transparent text-white transition duration-200 active:scale-90 hover:bg-white/15">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true" class="text-brand-blue transition-transform duration-200 group-hover:translate-x-1"><path d="M15 6l-6 6 6 6"></path></svg>
        </button>
        <button type="button" data-review-next aria-label="Next reviews" class="flex h-12 w-12 cursor-pointer items-center justify-center rounded-full border-2 border-white/40 bg-transparent text-white transition duration-200 active:scale-90 hover:bg-white/15">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true" class="text-brand-blue transition-transform duration-200 group-hover:translate-x-1"><path d="M9 6l6 6-6 6"></path></svg>
        </button>
      </div>
    </div>

    <?php foreach ($review_pages as $page => $reviews): ?>
      <div data-review-page="<?= $page ?>" class="flex snap-x snap-mandatory gap-4 overflow-x-auto pb-3 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden sm:grid sm:snap-none sm:grid-cols-2 sm:gap-5 sm:overflow-visible sm:pb-0 lg:grid-cols-3<?= $page > 0 ? ' review-off' : '' ?>">
        <?php foreach ($reviews as $i => $review): ?>
          <figure class="m-0 flex h-[260px] w-[86%] shrink-0 snap-center flex-col justify-between rounded-[20px] px-7 py-8 sm:w-auto sm:shrink <?= $i % 2 === 0 ? 'bg-surface' : 'bg-white' ?>">
            <blockquote class="m-0 line-clamp-5 text-[17px] leading-[1.5] tracking-[-0.01em] text-ink"><?= e($review['quote']) ?></blockquote>
            <figcaption class="m-0 mt-5 text-sm font-extrabold text-ink"><?= e($review['who']) ?></figcaption>
          </figure>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>

    <div class="mt-10 text-center">
      <a href="contact.php" class="inline-flex items-center rounded-full bg-white px-7 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">Get Care Today</a>
    </div>
  </div>
</section>

<!-- ─── FAQ ──────────────────────────────────────────────────────────── -->
<section id="faq" class="bg-mist">
  <div class="mx-auto max-w-[1280px] px-5 py-14 sm:px-10 lg:py-[72px]">
    <p class="<?= $eyebrow ?> mb-4 text-brand-blue">Questions</p>
    <h2 class="m-0 mb-3.5 text-[32px] leading-[1.06] tracking-[-0.03em] text-brand-blue-dark sm:text-[44px]">Any questions?</h2>
    <p class="m-0 mb-10 text-base font-medium text-brand-blue">Find trust-worthy answers on everything we treat and how we treat it.</p>

    <div class="grid items-start gap-10 lg:grid-cols-[minmax(0,1.15fr)_minmax(0,0.85fr)] lg:gap-[72px]">
      <div data-reveal class="relative order-2 h-[280px] overflow-hidden rounded-[20px] bg-night lg:h-[420px]">
        <?= image_slot('homepage/home-ambience-nera.webp', 'Drop a supporting photo', 'A quiet Anew Era treatment room, with a reclining chair and a clinician’s desk') ?>
      </div>

      <div data-faq class="order-1">
        <div class="mb-9 flex flex-wrap gap-2.5">
          <?php foreach ($data['faq_categories'] as $i => $category): ?>
            <button type="button"
                    data-faq-tab="<?= $i ?>"
                    data-active="<?= $i === 0 ? 'true' : 'false' ?>"
                    aria-controls="faq-group-<?= $i ?>"
                    class="cursor-pointer rounded-full border-2 border-brand-blue-dark/35 bg-transparent px-5 py-3.5 font-sans text-[13px] font-extrabold uppercase tracking-[0.04em] text-brand-blue-dark transition-colors data-[active=true]:border-brand-blue-dark data-[active=true]:bg-brand-blue-dark data-[active=true]:text-white">
              <?= e($category['name']) ?>
            </button>
          <?php endforeach; ?>
        </div>

        <?php foreach ($data['faq_categories'] as $i => $category): ?>
          <div id="faq-group-<?= $i ?>" data-faq-group="<?= $i ?>"<?= $i > 0 ? ' hidden' : '' ?>>
            <?php foreach ($category['faqs'] as $j => $faq): ?>
              <details class="group border-b border-brand-blue/30"<?= $j === 0 ? ' open' : '' ?>>
                <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-6 text-lg font-extrabold tracking-[-0.015em] text-brand-blue-dark [&::-webkit-details-marker]:hidden sm:text-xl">
                  <span><?= e($faq['q']) ?></span>
                  <span class="shrink-0 text-[22px] font-normal leading-none text-brand-blue" aria-hidden="true">
                    <span class="group-open:hidden">+</span><span class="hidden group-open:inline">−</span>
                  </span>
                </summary>
                <p class="m-0 max-w-[62ch] pb-[26px] pr-0 text-[15px] font-medium leading-[1.7] text-brand-blue-dark/80 sm:pr-[60px]"><?= e($faq['a']) ?></p>
              </details>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>

        <?php // Direct additional questions to the contact team. ?>
        <a href="contact.php#message" class="mt-9 inline-flex items-center gap-2.5 rounded-full border-2 border-brand-blue-dark/35 bg-transparent px-6 py-3.5 text-[14px] font-extrabold text-brand-blue-dark transition-colors hover:border-brand-blue-dark hover:bg-brand-blue-dark hover:text-white">
          Ask Our Team <?= arrow_icon(15) ?>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ─── Booking CTA ──────────────────────────────────────────────────── -->
<section id="book" class="mx-auto max-w-[1280px] px-5 py-3 sm:px-10 sm:py-8">
  <div data-reveal class="relative overflow-hidden rounded-[28px] bg-cream bg-cta-glow px-6 py-12 text-center sm:px-16 lg:py-[52px]">
    <h2 class="m-0 mb-3 text-[28px] leading-[1.1] tracking-[-0.03em] text-ink sm:text-[38px]">
      Ready when you are <em class="font-serif font-normal italic">— and sooner than you think</em>
    </h2>
    <p class="mx-auto m-0 mb-6 max-w-[52ch] text-base font-medium text-ink/75">Most new patients are seen inside a week. We check your benefits first, so you know what a visit costs before you walk in.</p>
    <a href="contact.php" class="inline-flex items-center rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark">Book a Consultation</a>
    <p class="m-0 mt-[18px] text-xs text-ink/55">In crisis? Call or text 988 any time.</p>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
