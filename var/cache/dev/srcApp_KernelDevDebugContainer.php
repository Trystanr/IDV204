<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerXFxN6FH\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerXFxN6FH/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerXFxN6FH.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerXFxN6FH\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerXFxN6FH\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'XFxN6FH',
    'container.build_id' => 'bc01f993',
    'container.build_time' => 1573455173,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerXFxN6FH');
