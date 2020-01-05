<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\Adapter\Profiler;

interface ProfilerAwareInterface
{
    /**
     * @param ProfilerInterface $profiler
     * @return ProfilerAwareInterface
     */
    public function setProfiler(ProfilerInterface $profiler): ProfilerAwareInterface;
}
