<?php

/**
 * Contains the \DrupalNote\Filesystem\FileInterface interface.
 */

// Use strict type-checking for any type-hinted scalar values passed into and
// returned from the functions defined in this file (introduced in PHP 7.0).
declare(strict_types=1);

// Declare the PSR-4-compliant namespace for this file.
namespace DrupalNote\Filesystem;

use DrupalNote\Filesystem\FilesystemInterface;

/**
 * Defines the methods for interacting with a FileInterface object.
 */
interface DirectoryInterface extends FilesystemObjectInterface
{
    /**
     * Returns true if the FilesystemInterface object is a directory.
     *
     * @return bool [description]
     */
    public function isDirectory(
        FilesystemObjectInterface $filesystemObject
        ): bool;
}

/**
 * Defines an abstract class for interacting with a filesystem directory.
 */
abstract class DirectoryBase implements DirectoryInterface
{
    /** {@inheritDoc} */
    abstract public function isDirectory(
        FilesystemObjectInterface $filesystemObject
        ): bool;
}