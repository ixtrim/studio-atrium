<?php
namespace StudioAtrium\Entity\Extras;

/**
 * Maps the `extras_listing` table's `type`/`status` enum columns.
 */
class Listing
{
    const TYPE_NORMAL  = 'normal';
    const TYPE_PACKAGE = 'package';

    const STATUS_ENABLED  = 'enabled';
    const STATUS_DISABLED = 'disabled';
}
