<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container7TXSA5r\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container7TXSA5r/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container7TXSA5r.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container7TXSA5r\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container7TXSA5r\App_KernelDevDebugContainer([
    'container.build_hash' => '7TXSA5r',
    'container.build_id' => 'e4ec29a2',
    'container.build_time' => 1619448424,
], __DIR__.\DIRECTORY_SEPARATOR.'Container7TXSA5r');
