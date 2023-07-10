<?php
const FILENAME = 'fileToModify.txt';
const COLOR_DEPTH = 3;

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
        file_put_contents(FILENAME, "$item$i");
        shell_exec("git add .");
        shell_exec("git commit -m $item$i");
        shell_exec("git commit --amend --no-edit --date $item$i");
    }
}

shell_exec("git pull --rebase");
shell_exec("git push origin master");