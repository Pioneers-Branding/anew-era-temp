<?php
/** Anew Era Health — confirmation after a contact form submission. */
$page_title = 'Thank you';
$page_description = 'Thank you for contacting Anew Era Health. Our team will be in touch about the next steps for your care.';
$header_solid = true;
require __DIR__ . '/includes/header.php';
?>
<section id="top" class="bg-cream bg-aurora px-5 py-14 sm:px-10 lg:py-[72px]">
  <div class="mx-auto max-w-[1280px]">
    <div class="mx-auto max-w-[680px] rounded-[28px] border border-ink/10 bg-white px-6 py-10 text-center sm:px-10">
      <span class="mx-auto flex h-11 w-11 items-center justify-center rounded-full bg-brand-green text-white">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m5 12 4 4L19 6"/></svg>
      </span>
      <p class="m-0 mt-6 text-sm font-extrabold uppercase tracking-[0.14em] text-brand-blue">Message sent</p>
      <h1 class="m-0 mt-4 text-[46px] leading-[1.06] tracking-[-0.03em] text-brand-blue-dark sm:text-[56px]">Thank you for<br>reaching out.</h1>
      <p class="m-0 mt-6 text-base leading-relaxed text-ink/70">We have received your message. Our team will contact you, usually the same working day, to answer your questions and help with the next steps.</p>
      <p class="m-0 mt-4 text-sm leading-relaxed text-ink/70">Need to speak with us sooner? Call <a href="<?= e($site['phone_href']) ?>" class="font-extrabold text-brand-blue underline underline-offset-4"><?= e($site['phone']) ?></a>.</p>
      <div class="mt-8 flex flex-wrap justify-center gap-4">
        <a href="index.php" class="inline-flex items-center gap-2 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark">Back to Home <?= arrow_icon(15) ?></a>
        <a href="contact.php" class="inline-flex items-center rounded-full border-2 border-brand-blue px-7 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-blue hover:text-white">Contact Details</a>
      </div>
      <p class="m-0 mt-8 border-t border-ink/10 pt-6 text-sm leading-relaxed text-ink/60">This form is not monitored out of hours. If you are in crisis, call or text <a href="tel:988" class="font-extrabold text-brand-blue underline underline-offset-4">988</a>.</p>
    </div>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
