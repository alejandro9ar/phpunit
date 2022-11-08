--TEST--
TestDox: Verbose output; TestDox metadata
--XFAIL--
TestDox logging has not been migrated to events yet.
See https://github.com/sebastianbergmann/phpunit/issues/5040 for details.
--FILE--
<?php declare(strict_types=1);
$_SERVER['argv'][] = '--do-not-cache-result';
$_SERVER['argv'][] = '--no-configuration';
$_SERVER['argv'][] = '--testdox';
$_SERVER['argv'][] = '--colors=never';
$_SERVER['argv'][] = '--verbose';
$_SERVER['argv'][] = __DIR__ . '/_files/MetadataTest.php';

require_once __DIR__ . '/../../bootstrap.php';

PHPUnit\TextUI\Application::main();
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

Runtime:       %s

Text from class-level TestDox metadata
 ✔ Text from method-level TestDox metadata for successful test [%s]
 ✘ Text from method-level TestDox metadata for failing test [%s]
   │
   │ Failed asserting that false is true.
   │
   │ %s:%d
   │

Time: %s, Memory: %s

Summary of non-successful tests:

Text from class-level TestDox metadata
 ✘ Text from method-level TestDox metadata for failing test [%s]
   │
   │ Failed asserting that false is true.
   │
   │ %s:%d
   │

FAILURES!
Tests: 2, Assertions: 2, Failures: 1.
