<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerExIwtRu\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerExIwtRu/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerExIwtRu.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerExIwtRu\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerExIwtRu\App_KernelDevDebugContainer([
    'container.build_hash' => 'ExIwtRu',
    'container.build_id' => '92db62ff',
    'container.build_time' => 1619108896,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerExIwtRu');
