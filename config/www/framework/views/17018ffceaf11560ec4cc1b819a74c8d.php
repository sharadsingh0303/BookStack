<header id="header" component="header-mobile-toggle" class="primary-background px-xl grid print-hidden">
    <div class="flex-container-row justify-space-between gap-s items-center">
        <?php echo $__env->make('layouts.parts.header-logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="hide-over-l py-s">
            <button type="button"
                    refs="header-mobile-toggle@toggle"
                    title="<?php echo e(trans('common.header_menu_expand')); ?>"
                    aria-expanded="false"
                    class="mobile-menu-toggle"><?php echo (new \BookStack\Util\SvgIcon('more'))->toHtml(); ?></button>
        </div>
    </div>

    <div class="flex-container-column items-center justify-center hide-under-l">
    <?php if(user()->hasAppAccess()): ?>
        <?php echo $__env->make('layouts.parts.header-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    </div>

    <nav refs="header-mobile-toggle@menu" class="header-links">
        <div class="links text-center">
            <?php echo $__env->make('layouts.parts.header-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php if(!user()->isGuest()): ?>
            <?php echo $__env->make('layouts.parts.header-user-menu', ['user' => user()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </nav>
</header>
<?php /**PATH /app/www/resources/views/layouts/parts/header.blade.php ENDPATH**/ ?>