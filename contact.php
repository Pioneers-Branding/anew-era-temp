<?php
/**
 * Anew Era Health — contact us.
 *
 * The site's first real form, so a few notes on how it is wired:
 *
 *   · It posts directly to the configured Formester submissions endpoint.
 *   · It asks for a carrier so the intake team can verify benefits before the
 *     first visit, which is what the rest of the site promises.
 *   · It explicitly tells people NOT to put medical detail in it. A web form
 *     is not a secure channel and this practice handles PHI — that note is
 *     not decoration.
 *   · The crisis panel sits above the form, not below it. Somebody in trouble
 *     should not have to scroll past a marketing form to find 988.
 *
 * ⚠ $site['phone'] is still the (555) placeholder. The per-clinic numbers in
 * includes/data-locations.php are real, so this page leads on those and on the
 * admissions line rather than on the placeholder.
 */
$page_title        = 'Contact us';
$page_description  = 'Call, email or send us a message. We answer, check your insurance before your first visit, and book you in — usually within five business days. In crisis, call or text 988.';
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/includes/header.php';

$locations = require __DIR__ . '/includes/data-locations.php';

// The admissions line every clinic page publishes. Kept here rather than in
// config.php because config's number is still a placeholder.
$admissions      = '(866) 826-2061';
$admissions_href = 'tel:+18668262061';
$records_email   = 'medicalrecords@discoverybh.com';

$wrap     = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';
$eyebrow  = 'm-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/55 md:mb-[26px]';
$dot      = '<span class="h-[7px] w-[7px] shrink-0 rounded-full bg-[#b0ce87]" aria-hidden="true"></span>';
$h2       = 'm-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(33px,3.9vw,52px)]';
$btn_blue = 'inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark';

// Shared field styling, so the form reads as one thing.
$label = 'mb-1.5 block text-[12.5px] font-extrabold tracking-[-0.01em] text-ink';
$field = 'w-full rounded-[14px] border border-ink/15 bg-white px-4 py-3 text-[15px] text-ink transition-colors placeholder:text-ink/35 focus:border-brand-blue focus:outline-none focus:ring-2 focus:ring-brand-blue/20';
$req   = '<span aria-hidden="true" class="text-brand-orange">*</span>';

$interests = ['Psychiatry and medication', 'Therapy', 'TMS therapy', 'Spravato® (Texas only)', 'Not sure yet'];

$next_steps = [
    ['name' => 'We call you back',      'copy' => 'Usually the same working day. If you would rather we emailed, say so in the message.'],
    ['name' => 'We check your benefits','copy' => 'Before your first appointment, not after it — so you know what a visit costs before you walk in.'],
    ['name' => 'We offer you times',    'copy' => 'New patient consultations are usually available within five business days.'],
];
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-7 pt-[108px] text-white sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="background-color: #0d1a21">
    <?php // Flipped so the subject sits clear of the copy column. ?>
    <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10 scale-x-[-1]" style="background-image:url('<?= e(asset('assets/img/contact/hero.jpg')) ?>')"></div>
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 bg-place-veil"></div>

    <div class="mx-auto flex min-h-[280px] max-w-[1160px] items-center lg:min-h-[320px]">
      <div class="max-w-[600px] py-1">
        <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
          <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-white/65">
            <li><a href="index.php#top" class="transition-colors hover:text-white">Home</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li aria-current="page" class="text-brand-sky">Contact</li>
          </ol>
        </nav>

        <h1 class="on-footage m-0 font-serif font-normal leading-[1.05] tracking-[-0.04em] text-white text-[36px] sm:text-[52px] lg:text-[58px]">
          Talk to<br class="hidden sm:inline"> <em class="not-italic text-brand-sky">someone.</em>
        </h1>

        <p class="m-0 mt-5 max-w-[48ch] text-[15px] leading-[1.75] text-white/80 sm:mt-6 sm:text-base">
          Call and a person answers. Or send the form below and we will call you back, usually the
          same working day — with your insurance already checked.
        </p>

        <div class="mt-6 flex flex-wrap gap-3 sm:mt-8">
          <a href="<?= e($admissions_href) ?>" class="<?= $btn_blue ?>">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6.5 3.5h3l1.5 4-2 1.5a12 12 0 0 0 6 6l1.5-2 4 1.5v3a2 2 0 0 1-2.2 2A17 17 0 0 1 4.5 5.7 2 2 0 0 1 6.5 3.5Z"/></svg>
            <?= e($admissions) ?>
          </a>
          <a href="#message" class="inline-flex items-center gap-2.5 rounded-full border-2 border-white/45 bg-white/10 px-7 py-[14px] text-[15px] font-extrabold text-white backdrop-blur-sm transition-colors hover:border-white/80 hover:bg-white/20">Send a Message</a>
        </div>
      </div>
    </div>

    <div class="mx-auto mt-6 flex max-w-[1160px] flex-wrap items-center justify-between gap-3 border-t border-white/30 pt-4 text-[11px] text-white/85 sm:mt-8">
      <span>Admissions 6:00am – 6:00pm, Monday to Friday</span>
      <span><?= e(count($locations)) ?> clinics across California and Texas</span>
    </div>
  </section>
</div>

<!-- ─── In a crisis ──────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pt-8 sm:pt-10">
  <div class="flex flex-col gap-4 rounded-[22px] border-2 border-brand-orange/35 bg-[#fdf1e4] px-7 py-6 sm:flex-row sm:items-center sm:justify-between sm:px-9">
    <div>
      <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-clay">If this is urgent</p>
      <p class="m-0 mt-2 max-w-[70ch] text-[15px] leading-[1.7] text-ink/80">
        We are an outpatient practice, not a crisis service, and nobody watches this form out of hours.
        If you are in crisis, call or text <strong>988</strong> — the Suicide and Crisis Lifeline, any
        time. If someone is in immediate danger, call <strong>911</strong>.
      </p>
    </div>
    <div class="flex shrink-0 gap-2.5">
      <a href="tel:988" class="inline-flex items-center rounded-full bg-ink px-6 py-3.5 text-[14px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark">Call 988</a>
      <a href="sms:988" class="inline-flex items-center rounded-full border-2 border-ink/25 px-6 py-3 text-[14px] font-extrabold text-ink transition-colors hover:border-ink/50">Text 988</a>
    </div>
  </div>
</section>

<!-- ─── Form and details ─────────────────────────────────────────────── -->
<section id="message" class="<?= $wrap ?> scroll-mt-[110px] py-10 sm:py-14 md:py-[76px]">
  <div class="lg:grid lg:grid-cols-[minmax(0,1.25fr)_minmax(0,0.75fr)] lg:gap-14 xl:gap-20">

    <div>
      <?php // If Formester redirects back to this page with ?sent=1; the page is static HTML
            // by then, so the acknowledgement is revealed in the browser. ?>
      <?php // The wrapper carries no display utility: a Tailwind `flex` class
            // would beat the `hidden` attribute's display:none and the panel
            // would show on every visit. The flex lives on the inner div. ?>
      <div data-sent hidden class="mb-8">
       <div class="flex items-start gap-4 rounded-[22px] border-2 border-brand-green/45 bg-grove px-7 py-6">
        <svg aria-hidden="true" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 shrink-0 text-brand-green-dark"><path d="m5 12.5 4.5 4.5L19 7.5"></path></svg>
        <div>
          <p class="m-0 text-[16px] font-extrabold text-ink">Thank you — that reached us.</p>
          <p class="m-0 mt-1.5 max-w-[60ch] text-[14px] leading-[1.7] text-ink/70">
            Someone will call you back, usually the same working day. If it is urgent in the meantime,
            call <a href="<?= e($admissions_href) ?>" class="font-extrabold text-brand-blue underline underline-offset-4"><?= e($admissions) ?></a>.
          </p>
        </div>
       </div>
      </div>

      <p class="<?= $eyebrow ?>"><?= $dot ?> Send a Message</p>
      <h2 class="<?= $h2 ?>">Tell us how<br><em class="italic font-normal text-brand-blue">to reach you.</em></h2>
      <p class="m-0 mt-5 max-w-[56ch] text-base leading-[1.75] text-[#58616a]">
        Everything marked <?= $req ?> we need; the rest helps us come back to you with something
        useful rather than a request for more details.
      </p>

      <form name="contact" accept-charset="UTF-8" method="POST"
            action="https://app.formester.com/forms/oEa63wrld/submissions" class="mt-8 grid gap-5 sm:grid-cols-2">

        <div>
          <label for="first-name" class="<?= $label ?>">First name <?= $req ?></label>
          <input id="first-name" name="first-name" type="text" required autocomplete="given-name" class="<?= $field ?>">
        </div>
        <div>
          <label for="last-name" class="<?= $label ?>">Last name <?= $req ?></label>
          <input id="last-name" name="last-name" type="text" required autocomplete="family-name" class="<?= $field ?>">
        </div>

        <div>
          <label for="email" class="<?= $label ?>">Email <?= $req ?></label>
          <input id="email" name="email" type="email" required autocomplete="email" class="<?= $field ?>">
        </div>
        <div>
          <label for="phone" class="<?= $label ?>">Phone <?= $req ?></label>
          <input id="phone" name="phone" type="tel" required autocomplete="tel" class="<?= $field ?>">
        </div>

        <div>
          <label for="clinic" class="<?= $label ?>">Nearest clinic</label>
          <select id="clinic" name="clinic" class="<?= $field ?> cursor-pointer">
            <option value="">I am not sure yet</option>
            <?php foreach (['ca' => 'California', 'tx' => 'Texas'] as $state => $state_name): ?>
              <optgroup label="<?= e($state_name) ?>">
                <?php foreach ($locations as $loc): ?>
                  <?php if ($loc['state'] !== $state) continue; ?>
                  <option value="<?= e($loc['name']) ?>"><?= e($loc['name']) ?></option>
                <?php endforeach; ?>
              </optgroup>
            <?php endforeach; ?>
            <option value="Telehealth">Telehealth, wherever I am</option>
          </select>
        </div>
        <div>
          <label for="interest" class="<?= $label ?>">What you are asking about <?= $req ?></label>
          <select id="interest" name="interest" required class="<?= $field ?> cursor-pointer">
            <option value="">Choose one</option>
            <?php foreach ($interests as $item): ?>
              <option value="<?= e($item) ?>"><?= e($item) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="sm:col-span-2">
          <label for="insurer" class="<?= $label ?>">Who are you insured with?</label>
          <input id="insurer" name="insurer" type="text" placeholder="Aetna, Blue Cross, Tricare — or leave blank" class="<?= $field ?>">
          <p class="m-0 mt-1.5 text-[12.5px] leading-[1.6] text-ink/55">
            Tell us and we can check your benefits before we call you back.
            <a href="index.php#insurance" class="font-extrabold text-brand-blue underline underline-offset-4">See Who We Are In-Network With</a>.
          </p>
        </div>

        <div class="sm:col-span-2">
          <label for="message" class="<?= $label ?>">Anything else</label>
          <textarea id="message" name="message" rows="4" class="<?= $field ?> resize-y" placeholder="When you are free to talk, who you would like to see, what you have already tried."></textarea>
          <p class="m-0 mt-1.5 text-[12.5px] leading-[1.6] text-ink/55">
            Please keep medical detail out of this box. A web form is not a secure channel — save it
            for the call or your first appointment.
          </p>
        </div>

        <div class="sm:col-span-2">
          <label class="flex cursor-pointer items-start gap-3 text-[13.5px] leading-[1.6] text-ink/75">
            <input type="checkbox" name="consent" required class="mt-0.5 h-[18px] w-[18px] shrink-0 cursor-pointer rounded border-ink/30 text-brand-blue focus:ring-brand-blue/30">
            <span>I am happy for Anew Era Health to contact me about my enquiry by phone or email. <?= $req ?></span>
          </label>
        </div>

        <div class="sm:col-span-2">
          <button type="submit" class="<?= $btn_blue ?> w-full cursor-pointer justify-center sm:w-auto">
            Send Message <?= arrow_icon(16) ?>
          </button>
          <p class="m-0 mt-3.5 text-[12.5px] leading-[1.6] text-ink/55">
            This form is not monitored out of hours and is not for emergencies. In a crisis, call or
            text <a href="tel:988" class="font-extrabold text-brand-blue underline underline-offset-4">988</a>.
          </p>
        </div>
      </form>
    </div>

    <?php // The sidebar: the ways to reach us that do not involve a form. ?>
    <aside class="mt-10 lg:mt-0">
      <div class="lg:sticky lg:top-[104px]">
        <div class="rounded-[22px] bg-[#10202c] bg-reviews-glow p-7 text-white">
          <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-brand-green">Call us</p>
          <a href="<?= e($admissions_href) ?>" class="mt-3 block font-serif text-[30px] leading-none tracking-[-0.02em] text-white transition-colors hover:text-brand-sky sm:text-[34px]"><?= e($admissions) ?></a>
          <p class="m-0 mt-3 text-[13.5px] leading-[1.65] text-white/70">
            Admissions, 6:00am – 6:00pm Monday to Friday. Every clinic also has its own front desk —
            the numbers are below.
          </p>
        </div>

        <div class="mt-3 rounded-[22px] border border-[#e3e7ea] bg-white p-7">
          <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/45">What happens next</p>
          <ol class="m-0 mt-4 list-none p-0">
            <?php foreach ($next_steps as $i => $step): ?>
              <li class="flex items-start gap-3.5 border-b border-ink/[0.07] py-3.5 first:pt-0 last:border-b-0 last:pb-0">
                <span aria-hidden="true" class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-mist text-[11px] font-extrabold text-brand-blue"><?= e((string) ($i + 1)) ?></span>
                <span>
                  <span class="block text-[14px] font-extrabold text-ink"><?= e($step['name']) ?></span>
                  <span class="mt-1 block text-[13px] leading-[1.6] text-[#58616a]"><?= e($step['copy']) ?></span>
                </span>
              </li>
            <?php endforeach; ?>
          </ol>
        </div>

        <div class="mt-3 rounded-[22px] border border-[#e3e7ea] bg-white p-7">
          <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/45">Other enquiries</p>
          <dl class="m-0 mt-4">
            <div class="border-b border-ink/[0.07] pb-3.5">
              <dt class="m-0 text-[14px] font-extrabold text-ink">Medical records</dt>
              <dd class="m-0 mt-1"><a href="mailto:<?= e($records_email) ?>" class="break-all text-[13.5px] font-semibold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark"><?= e($records_email) ?></a></dd>
            </div>
            <div class="pt-3.5">
              <dt class="m-0 text-[14px] font-extrabold text-ink">Already a patient?</dt>
              <dd class="m-0 mt-1 text-[13px] leading-[1.6] text-[#58616a]">
                Call your clinic directly rather than this line — they have your chart in front of them.
              </dd>
            </div>
          </dl>
        </div>
      </div>
    </aside>
  </div>
</section>

<!-- ─── Clinic numbers ───────────────────────────────────────────────── -->
<section id="clinics" class="<?= $wrap ?> scroll-mt-[110px] pb-10 sm:pb-[60px] md:pb-[76px]">
  <div class="mb-7 sm:mb-9 md:flex md:items-end md:justify-between md:gap-10">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> Every clinic</p>
      <h2 class="<?= $h2 ?>">Or call the one<br><em class="italic font-normal text-brand-blue">nearest you.</em></h2>
    </div>
    <p class="m-0 mt-[22px] max-w-[380px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[330px]">
      Several clinics share the admissions line; the rest have their own front desk. Either way you
      will reach a person.
    </p>
  </div>

  <?php foreach (['ca' => 'California', 'tx' => 'Texas'] as $state => $state_name): ?>
    <h3 class="m-0 mb-3 mt-7 text-[13px] font-bold uppercase tracking-[0.14em] text-ink first:mt-0"><?= e($state_name) ?></h3>
    <ul class="m-0 grid list-none gap-2.5 p-0 sm:grid-cols-2 md:gap-3 lg:grid-cols-3">
      <?php foreach ($locations as $key => $loc): ?>
        <?php if ($loc['state'] !== $state) continue; ?>
        <li>
          <div class="flex h-full flex-col rounded-[18px] border border-[#e3e7ea] bg-white px-5 py-4">
            <span class="text-[14.5px] font-extrabold text-ink"><?= e($loc['name']) ?></span>
            <span class="mt-0.5 text-[12px] leading-snug text-ink/50"><?= e($loc['address']['street']) ?></span>
            <a href="<?= e($loc['phone_href']) ?>" class="mt-2.5 inline-flex items-center gap-2 text-[13.5px] font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M6.5 3.5h3l1.5 4-2 1.5a12 12 0 0 0 6 6l1.5-2 4 1.5v3a2 2 0 0 1-2.2 2A17 17 0 0 1 4.5 5.7 2 2 0 0 1 6.5 3.5Z"/></svg>
              <?= e($loc['phone']) ?>
            </a>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endforeach; ?>

  <p class="m-0 mt-6 text-[13.5px] leading-[1.7] text-ink/60">
    Questions about cost, referrals or what a first visit involves are answered in the
    <a href="index.php#faq" class="font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">FAQ</a>.
  </p>
</section>

</div>

<script>
/* The page Netlify returns to is static HTML, so the acknowledgement is
   revealed here rather than rendered server-side. Nothing else on the form
   needs JavaScript — it posts and works without this. */
(function () {
  if (!/[?&]sent=1\b/.test(location.search)) { return; }
  var panel = document.querySelector('[data-sent]');
  if (!panel) { return; }
  panel.hidden = false;
  panel.scrollIntoView({
    behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth',
    block: 'center'
  });
}());
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>
