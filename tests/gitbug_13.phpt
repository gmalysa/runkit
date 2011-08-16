--TEST--
Github Bug #13 - Emancipate/Adopt do not alter class heirarchy
--SKIPIF--
<?php if (!extension_loaded("runkit") || !RUNKIT_FEATURE_MANIPULATION) print "skip"; ?>
--INI--
error_reporting=E_ALL
display_errors=on
--FILE--
<?php
class myParent {}
class myUncle {}
class myChild extends myParent {}
echo get_parent_class('myChild')."\n";
runkit_class_emancipate('myChild');
echo get_parent_class('myChild')."\n";
runkit_class_adopt('myChild', 'myUncle');
echo get_parent_class('myChild')."\n";
--EXPECTF--
myParent

myUncle
