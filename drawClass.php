<?php
const FILENAME = 'fileToModify.txt';
const COLOR_DEPTH = 1;

$assignedDates = [
    '"24 Feb 2020"',
    '"25 Feb 2020"',
    '"1 Mar 2020"',
    '"4 Mar 2020"',
//    '"8 Mar 2020"',
//    '"12 Mar 2020"',
//    '"16 Mar 2020"',
//    '"20 Mar 2020"',
//    '"24 Mar 2020"',
//    '"28 Mar 2020"',
//    '"30 Mar 2020"',
//    '"3 Apr 2020"',
//    '"5 Apr 2020"',
//    '"9 Apr 2020"',
//    '"12 Apr 2020"',
//    '"15 Apr 2020"',
//    '"20 Apr 2020"',
//    '"21 Apr 2020"',
];

foreach ($assignedDates as $item) {
    for ($i = 0; $i < COLOR_DEPTH; ++$i) {
        file_put_contents(FILENAME, "$item$i");
        shell_exec("git add .");
        shell_exec("git commit -m $item$i");
        shell_exec("git commit --amend --no-edit --date $item$i");
        shell_exec("git pull --rebase");
        shell_exec("git push origin master");
    }
}