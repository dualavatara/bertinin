set_include_path(get_include_path().':<?php echo $path; ?>');
get_include_path();

require_once("config/config.php");

$user = DB_USER;
$password = DB_PASS;
$dbname = DB_NAME;

$testuser = "<?php echo $testdbuser; ?>";
$testpassword = "<?php echo $testdbpass; ?>";
$testdbname = "<?php echo $testdbname; ?>"; //database should exist before running tests

$out = `mysql -u $testuser -p$testpassword $testdbname -e "show tables" | grep -v Tables_in | grep -v "+" | awk '{print "drop table " $1 ";"}' | mysql -u $testuser -p$testpassword $testdbname`;
$out = `mysqldump -u$user -p$password --no-data $dbname > tmp/copytotest.sql`;
$out = `mysql -u $testuser -p$testpassword $testdbname < tmp/copytotest.sql`;

print $out;
