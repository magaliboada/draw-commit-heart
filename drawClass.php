<?php
const FILENAME = 'fileToModify.txt';
const COLOR_DEPTH = 6;

$assignedDates = [
    '"10 Jul 2023"',
    '"11 Jul 2023"',
    '"19 Jul 2023"',
    '"27 Jul 2023"',
    '"4 Aug 2023"',
    '"12 Aug 2023"',
    '"18 Aug 2023"',
    '"24 Aug 2023"',
    '"30 Aug 2023"',
    '"5 Sep 2023"',
    '"4 Sep 2023"',
    '"27 Aug 2023"',
    '"20 Aug 2023"',
    '"14 Aug 2023"',
    '"8 Aug 2023"',
    '"31 Jul 2023"',
    '"23 Jul 2023"',
    '"16 Jul 2023"',


];

foreach ($assignedDates as $item) {
    for ($i = 0; $i < COLOR_DEPTH; ++$i) {
        if (file_put_contents(FILENAME, "$item$i") === false) {
            echo "Error writing to file: " . FILENAME . "\n";
            exit(1);
        }
        $output = shell_exec("git add .");
        if ($output === null) {
            echo "Error executing command: git add .\n";
            exit(1);
        }
        $output = shell_exec("git commit -m $item$i");
        if ($output === null) {
            echo "Error executing command: git commit -m $item$i\n";
            exit(1);
        }
        $output = shell_exec("git commit --amend --no-edit --date $item$i");
        if ($output === null) {
            echo "Error executing command: git commit --amend --no-edit --date $item$i\n";
            exit(1);
        }
    }
}

$output = shell_exec("git pull --rebase");
if ($output === null) {
    echo "Error executing command: git pull --rebase\n";
    exit(1);
}
$output = shell_exec("git push origin master");
if ($output === null) {
    echo "Error executing command: git push origin master\n";
    exit(1);
}