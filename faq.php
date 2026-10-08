<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$faqs = [
    [
        'q' => 'What is the best herbal shampoo in Pakistan?',
        'a' => 'Kyravia Premium Herbal Shampoo is built as a single focused formula for everyday silky, strong hair across Pakistan — with online retail and wholesale supply from Rawalpindi, Kashmir, and Karachi.',
    ],
    [
        'q' => 'What is Kyravia shampoo?',
        'a' => 'Kyravia is a premium herbal shampoo brand (Pakistan ke baalon ki pehchaan). Our hero product is a 400 ml daily restore shampoo designed for a clean, soft finish.',
    ],
    [
        'q' => 'How much does Kyravia shampoo cost?',
        'a' => 'Kyravia Premium Herbal Shampoo (400 ml) is priced at ' . format_price(PRODUCT_PRICE) . ' with cash on delivery available on online orders.',
    ],
    [
        'q' => 'Can I buy Kyravia shampoo online in Pakistan?',
        'a' => 'Yes. Order on the Shop page. We confirm by phone/WhatsApp before dispatch across Pakistan.',
    ],
    [
        'q' => 'Do you offer shampoo wholesale in Pakistan?',
        'a' => 'Yes. Kyravia supplies wholesale from Rawalpindi, Kashmir, and Karachi for shops and salons. Send an inquiry on the Wholesale page or call ' . FOUNDER_PHONE . '.',
    ],
    [
        'q' => 'Who founded Kyravia?',
        'a' => 'Kyravia was founded by ' . FOUNDER_NAME . '. Contact: ' . FOUNDER_PHONE . ' / ' . SITE_EMAIL . '.',
    ],
];

$extraJsonLd = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array_map(static function (array $item): array {
        return [
            '@type' => 'Question',
            'name' => $item['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $item['a'],
            ],
        ];
    }, $faqs),
];

require_once __DIR__ . '/includes/header.php';
?>

  <main>
    <section class="page-hero">
      <div class="container">
        <p class="eyebrow">FAQ</p>
        <h1>Kyravia shampoo — frequently asked questions</h1>
        <p>Answers about Kyravia, herbal shampoo in Pakistan, pricing, delivery, and wholesale.</p>
      </div>
    </section>

    <section class="section">
      <div class="container-narrow">
        <?php foreach ($faqs as $i => $item): ?>
          <article class="step reveal" style="margin-bottom: 0.5rem;">
            <span class="step-num">Q<?= $i + 1 ?></span>
            <h2 class="section-title" style="font-size: 1.45rem;"><?= e($item['q']) ?></h2>
            <p class="section-lead"><?= e($item['a']) ?></p>
          </article>
        <?php endforeach; ?>

        <div class="cta-row" style="margin-top: 2rem;">
          <a class="btn btn-primary" href="/shop">Buy Kyravia online</a>
          <a class="btn btn-ghost" href="/product">View product</a>
        </div>
      </div>
    </section>
  </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
