<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerLQZoieJ\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerLQZoieJ/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerLQZoieJ.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerLQZoieJ\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerLQZoieJ\App_KernelDevDebugContainer([
    'container.build_hash' => 'LQZoieJ',
    'container.build_id' => '46666f9f',
    'container.build_time' => 1618935578,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerLQZoieJ');
