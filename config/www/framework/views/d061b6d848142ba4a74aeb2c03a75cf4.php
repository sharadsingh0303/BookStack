<!DOCTYPE html>
<html lang="<?php echo e(isset($locale) ? $locale->htmlLang() : config('app.default_locale')); ?>"
      dir="<?php echo e(isset($locale) ? $locale->htmlDirection() : 'auto'); ?>"
      class="<?php echo e(setting()->getForCurrentUser('dark-mode-enabled') ? 'dark-mode ' : ''); ?>">
<head>
    <title><?php echo e(isset($pageTitle) ? $pageTitle . ' | ' : ''); ?><?php echo e(setting('app-name')); ?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="token" content="<?php echo e(csrf_token()); ?>">
    <meta name="base-url" content="<?php echo e(url('/')); ?>">
    <meta name="theme-color" content="<?php echo e((setting()->getForCurrentUser('dark-mode-enabled') ? setting('app-color-dark') : setting('app-color'))); ?>"/>

    <!-- Social Cards Meta -->
    <meta property="og:title" content="<?php echo e(isset($pageTitle) ? $pageTitle . ' | ' : ''); ?><?php echo e(setting('app-name')); ?>">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <?php echo $__env->yieldPushContent('social-meta'); ?>

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(versioned_asset('dist/styles.css')); ?>">

    <!-- Icons -->
    <link rel="icon" type="image/png" sizes="256x256" href="<?php echo e(setting('app-icon') ?: url('/icon.png')); ?>">
    <link rel="icon" type="image/png" sizes="180x180" href="<?php echo e(setting('app-icon-180') ?: url('/icon-180.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(setting('app-icon-180') ?: url('/icon-180.png')); ?>">
    <link rel="icon" type="image/png" sizes="128x128" href="<?php echo e(setting('app-icon-128') ?: url('/icon-128.png')); ?>">
    <link rel="icon" type="image/png" sizes="64x64" href="<?php echo e(setting('app-icon-64') ?: url('/icon-64.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(setting('app-icon-32') ?: url('/icon-32.png')); ?>">

    <!-- PWA -->
    <link rel="manifest" href="<?php echo e(url('/manifest.json')); ?>">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- OpenSearch -->
    <link rel="search" type="application/opensearchdescription+xml" title="<?php echo e(setting('app-name')); ?>" href="<?php echo e(url('/opensearch.xml')); ?>">

    <!-- Custom Styles & Head Content -->
    <?php echo $__env->make('layouts.parts.custom-styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.parts.custom-head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldPushContent('head'); ?>

    <!-- Translations for JS -->
    <?php echo $__env->yieldPushContent('translations'); ?>
</head>
<body
    <?php if(setting()->getForCurrentUser('ui-shortcuts-enabled', false)): ?>
        component="shortcuts"
        option:shortcuts:key-map="<?php echo e(\BookStack\Settings\UserShortcutMap::fromUserPreferences()->toJson()); ?>"
    <?php endif; ?>
      class="<?php echo $__env->yieldPushContent('body-class'); ?>">

    <?php echo $__env->make('layouts.parts.base-body-start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.parts.skip-to-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.parts.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="content" components="<?php echo $__env->yieldContent('content-components'); ?>" class="block">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make('layouts.parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div component="back-to-top" class="back-to-top print-hidden">
        <div class="inner">
            <?php echo (new \BookStack\Util\SvgIcon('chevron-up'))->toHtml(); ?> <span><?php echo e(trans('common.back_to_top')); ?></span>
        </div>
    </div>

    <?php if($cspNonce ?? false): ?>
        <script src="<?php echo e(versioned_asset('dist/app.js')); ?>" type="module" nonce="<?php echo e($cspNonce); ?>"></script>
    <?php endif; ?>
    <?php echo $__env->yieldPushContent('body-end'); ?>

    <?php echo $__env->make('layouts.parts.base-body-end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /app/www/resources/views/layouts/base.blade.php ENDPATH**/ ?>